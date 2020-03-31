<?php

namespace App\Http\Controllers;

use App\Category;
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

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('admin.product.create', compact('categories'));
    }

    public function store( Request $request)
    {
        $formInput = $request->except('image');
        $this->validate($request, [
            'product_name' => 'required',
            'product_code' => 'required',
            'product_price' => 'required',
            'stock' => 'required',
            'product_info' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        $image = $request->image;
        if ($image)
        {
            $imageName = $image->getClientOriginalName();
            $image->move('images', $imageName);
            $formInput['image']=$imageName;
        }
        $categories = Category::all();
        Product::create($formInput);

        return redirect('/admin/products');
    }

    public function editProductForm($id) {
        $products = Product::findOrFail($id);
        $categories = Category::all();

        $props = DB::table('products_properties')->where('product_id', '=', $id)->get();

        //dd($props);

        return view('admin.product.edit', compact('products', 'categories', 'props'));
    }


    public function editProduct(Request $request, $id)
    {
        $products = DB::table('products')->where('id', '=', $id)->get();

        $productId = $request->id;
        $product_name = $request->product_name;
        $category_id = $request->category_id;
        $product_code = $request->product_code;
        $product_price = $request->product_price;
        $stock = $request->stock;
        $product_info = $request->product_info;
        $sale_price = $request->sale_price;

        /*if($request->new_arrival =='NULL')
        {
            $new_arrival = '1';
        }else {
            $new_arrival = $request->new_arrival;
        }*/
        DB::table('products')->where('id', $productId)->update([
            'product_name' => $product_name,
            'category_id' => $category_id,
            'product_code' => $product_code,
            'product_price' => $product_price,
            'product_info' => $product_info,
            'stock' => $stock,
            'sale_price' => $sale_price,
            //'new_arrival' => $new_arrival

        ]);

        return redirect('admin/products')->with(compact('products'));
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function editImage($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.product.editImage', compact('product'));
    }

    public function editProductImage(Request $request) {
        $produtId = $request->id;

        $image = $request->image;

        if($image)
        {
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image'] = $imageName;

            DB::table('products')->where('id', $produtId)->update(['image' => $imageName]);
        }

        return redirect()->back();
    }

    public function addProperty($id)
    {
        $products = Product::findOrFail($id);

        return view('admin.product.addProperty', compact('products'));
    }

    public function submitProperty(Request $request)
    {
        $property = new products_properties;
        //dd($request->productId);
        $property->product_id = $request->productId;
        $property->size = $request->size;
        $property->color = $request->color;
        $property->save();

        return redirect('admin/products');
    }

    public function editProperty(Request $request)
    {
        $id = $request->id;
        $size = $request->size;
        $color = $request->color;
        //dd($id);

        DB::table('products_properties')->where('id', $id)->update([
            'size' => $size,
            'color' => $color,
        ]);

        return back();


    }
}
