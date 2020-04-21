@extends('admin.master')

@section('content')
    <section id="products" class="container-fluid">
        <div class="row">
            <div class="nav-products">
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-12 ml-sm-auto col-md-12 col-lg-10 pt-3">
                <div class="d-flex justify-content-around">
                    <h2>List Of Products</h2>
                    <button class="btn btn-outline-success float-right">
                        <a class="nav-link text-dark" href="{{route('products.create')}}"><b>Add One</b></a>
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
                        <th>Edit</th>
                        <th>Delete</th>
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
                            <td>{{$product->shopping_cost}} </td>
                            <td>{{$product->new_arrival?"Yes":"No"}}</td>
                            <td>{{ isset($product->name)? $product->name : '' }}</td>
                            <td>
                                <a class="btn btn-outline-success" href="{{route('editProductForm', $product->id)}}">Edit</a>
                            </td>
                            {!! Form::open(['method'=>'DELETE', 'action'=> ['ProductsController@destroy', $product->id]]) !!}
                            <td>
                                {!! Form::submit('Delete', ['class'=>'btn btn-outline-danger']) !!}
                            </td>
                            {!! Form::close() !!}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
