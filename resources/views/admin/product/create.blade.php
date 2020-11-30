@extends('admin.master')
@section('content')
    <section id="admin" class="container-fluid">
        <div class="row products">
            <div class="col-md-2 col-lg-2 pt-3">
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-12 ml-sm-auto col-md-10 col-lg-10 pt-3" role="main">
                <div class="col-lg-8">
                    <div>
                        <button class="float-right">
                            <a class="link" href="{{url('/admin/products')}}"><strong><i class="fa fa-backward"></i> @lang('admin.products.manage')</strong></a>
                        </button>
                    </div>
                    <h2>@lang('admin.products.addNew')</h2>
                    <hr>
                    <strong class="text-warning"><i class="fa fa-warning"></i> @lang('admin.products.mustComplete')</strong>
                    <br>
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    <div class="panel-body">
                        {!! Form::open(['route' => 'products.store', 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {{ Form::label('product_name', 'Product Name') }}
                            {{ Form::text('product_name', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('product_code', 'Product Code') }}
                            {{ Form::text('product_code', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('stock', 'In stock') }}
                            {{ Form::text('stock', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('product_price', 'Price') }}
                            {{ Form::text('product_price', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('sold_price', 'Sold Price') }}
                            {{ Form::text('sold_price', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('shopping_cost', 'Shopping Cost') }}
                            {{ Form::text('shopping_cost', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('category_id', 'Categories') }}
                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'SelectCategory']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('image', 'Select First Image') }}
                            {{ Form::file('image', array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('product_info', 'Description') }}
                            {{ Form::textarea('product_info', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            <button type="submit">Submit</button>
                        </div>
                        <br>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="back">
            <a href="{{url('/admin')}}" class="link"><i class="fa fa-backward"></i> Admin</a>
        </div>
    </section>
@endsection
