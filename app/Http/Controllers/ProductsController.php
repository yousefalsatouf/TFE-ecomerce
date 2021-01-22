<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product_images;
use App\products_properties;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    //
    public function index()
    {
        $products = DB::table('categories')->rightJoin('products', 'products.category_id', '=', 'categories.id')->get();
        //dd($products);
        return response()->json($products);
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.product.create', compact('categories'));
    }

    public function store( Request $request)
    {

        $formInput = $request->except('image');

        if (!$request->product_name || !$request->product_code || !$request->product_price || !$request->stock || !$request->product_info ||!$request->image)
            return back()->with('error','Fields can not be empty');

        //dd($request->all());
        // create first image
        $image = $request->image;

        if($request->hasfile('image'))
        {
            $imageName = $image->getClientOriginalName();
            $image->move('image', $imageName);
            $formInput['image'] = $imageName;
        }
        // create gallery images

        Product::create($formInput);


        return redirect('/admin/products')->with('msg', 'Product created !');
    }

    public function editProductForm($id) {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        $galleries = DB::table('product_images')
            ->where('product_id', '=', $id)
            ->get();
        //dd($id);

        $props = DB::table('products_properties')->where('product_id', '=', $id)->get();

        //dd($props);

        return view('admin.product.edit', compact('products', 'categories', 'props', 'galleries'));
    }

    public function removeProduct(Request $request)
    {
        //
        Product::findOrFail($request->id)->delete();
        $products= Product::all();

        return response()->json($products);
    }


    public function editProduct(Request $request, $id)
    {
        $products = DB::table('products')->where('id', '=', $id)->get();

        $productId = $request->id;
        $productName = $request->product_name;
        $categoryId = $request->category_id;
        $productCode = $request->product_code;
        $productPrice = $request->product_price;
        $stock = $request->stock;
        $productInfo = $request->product_info;
        $cost = $request->shopping_cost;
        $soldPrice = $request->sold_price;
        $image = $request->image;

        if (!$image)
            return back()->with('error','image can not be empty');

        if($request->new_arrival == null)
            $new_arrival = null;
        else
            $new_arrival = true;

        //upload First Image

        if ($request->file('image'))
        {
            $imageName = $image->getClientOriginalName();
            $image->move('image', $imageName);
        }

        DB::table('products')->where('id', $productId)->update([
            'product_name' => $productName,
            'category_id' => $categoryId,
            'product_code' => $productCode,
            'product_price' => $productPrice,
            'product_info' => $productInfo,
            'stock' => $stock,
            'sold_price' => $soldPrice,
            'shopping_cost' => $cost,
            'image' => $imageName,
            'new_arrival' => $new_arrival
        ]);

        return redirect('admin/products')->with(compact('products'));
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return back()->with('msg', 'Product removed !');
    }

    public function editImage($id)
    {
        $product = Product::findOrFail($id);
        //dd($id);
        DB::table('product_images')->where('product_id', '=', $id)->delete();

        return view('admin.product.editImage', compact('product'));
    }

    public function editProductImage(Request $request)
    {
        $productId = $request->id;
        //dd($productId);

        // upload Galleries
        $images = array();

        if($files = $request->file('gallery'))
        {
            foreach($files as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move('images', $name);
                $images[] = $name;
            }
        }
        //Insert  data
        //dd($images);

        foreach ($images as $one)
        {
            DB::table('product_images')
                ->updateOrInsert( [
                    'product_id' => $productId,
                    'gallery'=>  $one
                ]);
        }

        return redirect('admin/editProductForm/'.$productId)->with('msg', 'Image changed !');
    }

    public function addProperty($id)
    {
        $products = Product::findOrFail($id);

        return view('admin.product.addProperty', compact('products'));
    }

    public function submitProperty(Request $request)
    {
        if (!$request->size || !$request->color)
            return back()->with('error','fields can not be empty');


        $property = new products_properties;
        //dd($request->productId);
        $property->product_id = $request->productId;
        $property->size = $request->size;
        $property->mark = $request->mark;
        $property->color = $request->color;
        $property->save();

        return redirect('admin/products')->with('msg', 'Property added !');
    }

    public function editProperty(Request $request)
    {
        $id = $request->id;
        $mark = $request->mark;
        $size = $request->size;
        $color = $request->color;
        //dd($id);

        DB::table('products_properties')->where('id', $id)->update([
            'size' => $size,
            'mark' => $mark,
            'color' => $color,
        ]);

        return back()->with('msg', 'Property updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function removeProperty($id)
    {
        Products_properties::findOrFail($id)->delete();

        return back()->with('msg', 'Property removed !');
    }
}
