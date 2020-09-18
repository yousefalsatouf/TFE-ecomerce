@extends('admin.master')
@section('content')
    <section id="admin" class="container-fluid">
        <div class="row products">
            <div class="col-md-2 col-lg-2 pt-3">
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-12 ml-sm-auto col-md-9 col-lg-9 pt-3">
                @if(session('msg'))
                    <div class="alert alert-success">{{session('msg')}}</div>
                @endif
                <hr>
                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <h2>@lang('admin.products.add')</h2>
                <hr>
                <h5>{{$products->product_name}}</h5>
                <br>
                {!! Form::model($products, ['method'=>'post', 'action'=> ['ProductsController@submitProperty', $products->id], 'files'=>true]) !!}
                <input type="hidden" name="productId" class="form-control" value="{{$products->id}}">
                <label for="size">@lang('admin.products.size'):
                    <input type="text" class="form-control" name="size">
                </label>
                <label for="mark">Mark:
                    <input type="text" class="form-control" name="mark">
                </label>
                <label for="color">@lang('admin.products.color'):
                    <input type="text" class="form-control" name="color">
                </label>
                <br>
                <button type="submit">@lang('admin.save')</button>
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

