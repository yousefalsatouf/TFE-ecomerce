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
            @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h2>Add Properties: </h2>
                <hr>
                <strong class="text-warning"><i class="fa fa-warning"></i>Fields must be fill out</strong>
                <br>
                {!! Form::model($products, ['method'=>'post', 'action'=> ['ProductsController@submitProperty', $products->id], 'files'=>true]) !!}
                <label for="productId">
                    <select class="form-control" name="productId">
                        <option  value="{{$products->id}}">{{$products->product_name}}</option>
                    </select><br>
                </label>
                <br>
                <label for="size">Size:
                    <input type="text" class="form-control" name="size">
                </label>
                <br>
                <label for="mark">Mark:
                    <input type="text" class="form-control" name="mark">
                </label>
                <br>
                <label for="color">Color:
                    <input type="text" class="form-control" name="color">
                </label>
                <br>
                <br>
                <label class="panel-title">
                    <input type="submit" class="btn btn-success pull-right" value="Submit Property" style="margin:-4px"/>
                </label>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

