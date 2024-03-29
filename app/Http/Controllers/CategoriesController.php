<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        //dd($categories);

        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
         ]);
  
         if($request->file()) {
             $imageName = time().'_'.$request->file->getClientOriginalName();
             $request->file->move('images',$imageName);
         }

        DB::table('categories')->updateOrInsert(
            [ 'name' => $request->name],
            [
                'name' => $request->name,
                'image' => $imageName,
                'description' => $request->description,
            ]);
        
        $categories= Category::all();

        return response()->json($categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Category::find($id);
        $categories = Category::all();

        return view('admin.category.index',compact(['categories','products']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $name = $request->name;
        $description = $request->description;
        $image = $request->image;

        if (!$name || !$description || !$image)
            return back()->with('error','Fields can not be empty');

        if($image)
        {
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image'] = $imageName;
        }

        DB::table('categories')->update([
            'name' => $name,
            'description' => $description,
            'image' => $imageName
        ]);

        return redirect('/admin/categories/index')->with('msg','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeCategory(Request $request)
    {
        //
        Category::findOrFail($request->id)->delete();
        $categories= Category::all();

        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        //echo $name;
        $products = DB::table('categories')->rightJoin('products', 'products.category_id', '=', 'categories.id')->where('category_id', '=', $id)->get();
        $category = DB::table('categories')->where('id', '=', $id)->get();
        //dd($products);

        return view('front.categories', compact(['products', 'category']));
    }

    public function searchSingleCategory(Request $request)
    {
        $categoryName = $request->categoryName;
        $price = $request->price;
        $sold = $request->sold;

        $msg = 'Result ...';

        //dd($sold);

        if ($price && $sold)
            $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', 'products.category_id')
                ->where('name', 'like', $categoryName)
                ->where('product_price', "<=", $price)
                ->whereNotNull('sold_price')
                ->get();
        elseif ($price)
            $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', 'products.category_id')
                ->where('name', 'like', $categoryName)
                ->where('product_price', "<=", $price)
                ->get();
        elseif ($sold)
            $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', 'products.category_id')
                ->where('name', 'like', $categoryName)
                ->whereNotNull('sold_price')
                ->get();
        else
            $products = DB::table('products')
                ->leftJoin('categories', 'categories.id', 'products.category_id')
                ->where('name', 'like', $categoryName)
                ->get();

        //dd($products);
        return view('front.categories', compact(['products', 'categoryName', 'msg']));
    }
}
