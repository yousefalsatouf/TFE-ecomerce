@extends('admin.master')

@section('content')
    <section id="products" class="container-fluid">
        <div class="row">
            <div class="nav-products">
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-12 ml-sm-auto col-md-12 col-lg-10 pt-3">
                <div>
                    <h3>Products</h3>
                    <button class="btn bg-success float-right">
                        <a class="nav-link text-dark" href="{{route('products.create')}}"><b>Add One</b></a>
                    </button>
                </div>
                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Price</th>
                        <th>sold</th>
                        <th>stock</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td style="width:50px; border: 1px solid #333;"><img class="card-img-top img-fluid" src="{{url('images',$product->image)}}" width="50px" alt="Card image cap"></td>
                            <td>{{$product->id}} </td>
                            <td>{{$product->product_name}} </td>
                            <td>{{$product->product_code}} </td>
                            <td>{{$product->product_price}} $</td>
                            <td>{{($product->sale_price == null ? 'No sale on this': $product->sale_price.' $')}}</td>
                            <td>{{$product->stock}} </td>
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
