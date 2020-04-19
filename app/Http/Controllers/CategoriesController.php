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
        $products = Product::all();

        return view('admin.category.index',compact(['categories','products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->name;
        $des = $request->description;
        $image = $request->image;

        //dd($image);
        if($image)
        {
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image'] = $imageName;
        }

        DB::table('categories')->insert([
            'name' => $name,
            'description' => $des,
            'image' => $imageName
        ]);

        return back()->with('msg','Category added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Category::find($id)->products;
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
    public function update(Request $request, $id)
    {
        Category::findOrFail($id)->update();

        return back()->with('msg','Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Category::findOrFail($id)->delete();

        return back()->with('msg','Category removed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list($name)
    {
        //echo $name;
        $products = DB::table('categories')->rightJoin('products', 'products.category_id', '=', 'categories.id')->where('name', '=', $name)->get();
        $category = DB::table('categories')->where('name', '=', $name)->get();
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
                ->whereNotNull('sale_price')
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
                ->whereNotNull('sale_price')
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
