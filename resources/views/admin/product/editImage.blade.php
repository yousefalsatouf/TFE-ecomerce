@extends('admin.master')
@section('content')
    <div class="container add-property">
        <div class="row">
            <div>
                @include('admin.includes.sidenav')
            </div>
            <hr>
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <hr>
            <div class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h2>Edit Image: </h2>
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
                    <i class="fa fa-backward"></i> GO back
                </a>
                <button type="submit" class="pull-right float-right"><i class="fa fa-upload"></i>Importer des images</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
