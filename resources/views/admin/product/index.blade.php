@extends('admin.master')

@section('content')
    <section id="admin" class="container-fluid">
        <div class="row products">
            <div class="col-md-2 col-lg-2 pt-3">
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-12 ml-sm-auto col-md-9 col-lg-9 pt-3">
                <div class="d-flex justify-content-around">
                    <h2>@lang('admin.products.list')</h2>
                    <button class="float-right">
                        <a class="nav-link text-dark" href="{{route('products.create')}}"><strong><i class="fa fa-plus-circle"></i> @lang('admin.products.addNew')</strong></a>
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
                        <th>@lang('cart.name')</th>
                        <th>Code</th>
                        <th>@lang('cart.price')</th>
                        <th>Sold</th>
                        <th>Stock</th>
                        <th>@lang('cart.cost')</th>
                        <th>@lang('cart.new')</th>
                        <th>@lang('cart.cat')</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}} </td>
                            <td style="width: 20px"><img src="{{url('images', $product->image)}}" class="w-100" alt="photo"></td>
                            <td>{{$product->product_name}} </td>
                            <td>{{$product->product_code}} </td>
                            <td>{{$product->product_price}} $</td>
                            <td>{{($product->sold_price == null ? 'No sale on this': $product->sold_price.' EUR')}}</td>
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
        <br>
        <hr>
        <div class="back">
            <a href="{{url('/admin')}}" class="link"><i class="fa fa-backward"></i> Admin</a>
        </div>
    </section>
@endsection
