@extends('admin.master')
@section('content')
    <section class="container-fluid create-product">
        <div class="row">
            <div>
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
                <div class="col-lg-8">
                    <div>
                        <button class="btn bg-light float-right">
                            <a class="nav-link text-dark" href="{{url('/admin/products')}}"><b><i class="fa fa-backward"></i> Manage Products</b></a>
                        </button>
                    </div>
                    <h1>Add New Product</h1>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'products.store', 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {{ Form::label('Product name', 'Product Name') }}
                            {{ Form::text('product_name', null, array('class' => 'form-control','required'=>'','minlength'=>'5')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Code', 'Product Code') }}
                            {{ Form::text('product_code', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('stock', 'In stock') }}
                            {{ Form::text('stock', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('price', 'Price') }}
                            {{ Form::text('product_price', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Sale Price', 'Sale Price') }}
                            {{ Form::text('sale_price', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('category_id', 'Categories') }}
                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'SelectCategory']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('image',array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('Description', 'Description') }}
                            {{ Form::textarea('product_info', null, array('class' => 'form-control')) }}
                        </div>
                        {{ Form::submit('Submit', array('class' => 'btn btn-outline-success')) }}
                        <br>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
