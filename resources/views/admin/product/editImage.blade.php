@extends('admin.master')
@section('content')
    <section id="admin" class="container-fluid">
        <div class="row product">
            <div class="col-md-2 col-lg-2 pt-3">
                @include('admin.includes.sidenav')
            </div>
            <hr>
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <hr>
            <div class="col-sm-12 ml-sm-auto col-md-9 col-lg-9 pt-3">
                <h2>@lang('admin.products.editImg'): </h2>
                <hr>
                <br>
                {!! Form::model($product, ['method'=>'post', 'action'=> ['ProductsController@editProductImage', $product->id], 'files'=>true]) !!}
                <input type="hidden" name="id" class="form-control" value="{{$product->id}}">
                <div class="form-group">
                    <label for=''>Related To
                        <input type="text" class="form-control" value="{{$product->product_name}}" readonly="readonly">
                    </label>
                </div>
                <div class="form-group">
                    {{ Form::label('gallery', 'Select Galleries') }}
                    {{ Form::file('gallery[]',array('class' => 'form-control', 'multiple')) }}
                </div>
                <br/>
                <a class="link" href="{{url('/admin/products')}}">
                    <i class="fa fa-backward"></i> @lang('admin.products.backToProds')
                </a>
                <button type="submit" class="pull-right float-right"><i class="fa fa-upload"></i> @lang('admin.products.import')</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {!! Form::close() !!}
            </div>
        </div>
        <br>
        <hr>
        <div class="back">
            <a href="{{url('/admin/products')}}" class="link"><i class="fa fa-backward"></i> @lang('admin.products.backToProds')</a>
        </div>
    </section>
@endsection
