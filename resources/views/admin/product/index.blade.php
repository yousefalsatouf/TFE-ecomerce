@extends('admin.master')

@section('content')
    <main id="products">
        <section id="admin" class="container-fluid">
            <div class="row">
                <div class="nav-products">
                    @include('admin.includes.sidenav')
                </div>
                <div class="col-sm-12 ml-sm-auto col-md-12 col-lg-10 pt-3">
                    <div class="d-flex justify-content-around">
                        <h2>Liste de produits</h2>
                        <button class="float-right">
                            <a class="nav-link text-dark" href="{{route('products.create')}}"><b><i class="fa fa-plus-circle"></i> Ajouter des produits</b></a>
                        </button>
                    </div>
                    @if(session('msg'))
                        <div class="alert alert-success">{{session('msg')}}</div>
                    @endif
                    <hr>
                    <br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Sold</th>
                            <th>Stock</th>
                            <th>Shopping Cost</th>
                            <th>New</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}} </td>
                                <td style="width: 20px"><img src="{{url('images', $product->image)}}" class="w-100" alt=""></td>
                                <td>{{$product->product_name}} </td>
                                <td>{{$product->product_code}} </td>
                                <td>{{$product->product_price}} $</td>
                                <td>{{($product->sold_price == null ? 'No sale on this': $product->sold_price.' $')}}</td>
                                <td>{{$product->stock}} </td>
                                <td>{{$product->shopping_cost? $product->shopping_cost : "Free"}} </td>
                                <td>{{$product->new_arrival?"Yes":"No"}}</td>
                                <td>{{ isset($product->name)? $product->name : '' }}</td>
                                <td class="d-flex">
                                    <a class="link" href="{{route('editProductForm', $product->id)}}"><i class="fa fa-edit"></i></a>
                                    {!! Form::open(['method'=>'DELETE', 'action'=> ['ProductsController@destroy', $product->id]]) !!}
                                    <button type="submit"><i class="fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
@endsection
