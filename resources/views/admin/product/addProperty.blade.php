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
                <h2>Ajouter des propriétés:</h2>
                <hr>
                <h5>{{$products->product_name}}</h5>
                <br>
                {!! Form::model($products, ['method'=>'post', 'action'=> ['ProductsController@submitProperty', $products->id], 'files'=>true]) !!}
                <input type="hidden" name="productId"" class="form-control" value="{{$products->id}}">
                <label for="size">Size:
                    <input type="text" class="form-control" name="size">
                </label>
                <label for="mark">Mark:
                    <input type="text" class="form-control" name="mark">
                </label>
                <label for="color">Color:
                    <input type="text" class="form-control" name="color">
                </label>
                <br>
                <button type="submit">Sauvgarder</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

