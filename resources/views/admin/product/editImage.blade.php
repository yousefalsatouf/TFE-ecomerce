@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>Edit Image</h1>
            </div>
            <div class="col-md-6">
                {!! Form::model($product, ['method'=>'post', 'action'=> ['ProductsController@editProductImage', $product->id], 'files'=>true]) !!}
                <input type="hidden" name="id" class="form-control" value="{{$product->id}}">
                <input type="text" class="form-control" value="{{$product->product_name}}" readonly="readonly">
                <br/>
                <img class="card-img-top img-fluid" src="{{url('images',$product->image)}}" width="150px" alt="Card image cap"/>
                <br/>
                Select Image:
                {{ Form::label('image', 'Image') }}
                {{ Form::file('image',array('class' => 'form-control')) }}
                <br/>
                <a class="btn btn-primary" href="{{url('/admin/products')}}">
                    <i class="fa fa-backward"></i> GO back
                </a>
                <input type="submit" value="Upload Image" class="btn btn-success pull-right float-right">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
