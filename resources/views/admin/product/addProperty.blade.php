@extends('admin.master')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5 pull-right">
                    <h2 class="text-dark">Add Properties: </h2>
                    <hr>
                    <br>
                    {!! Form::model($products, ['method'=>'post', 'action'=> ['ProductsController@submitProperty', $products->id], 'files'=>true]) !!}
                    <label for="productId">
                        <select class="form-control" name="productId">
                            <option  value="{{$products->id}}">{{$products->product_name}}</option>
                        </select><br>
                    </label>
                    <br>
                    <label for="size">Size:
                        <select class="form-control" name="size">
                            <option  value="L">L</option>
                            <option  value="XL">XL</option>
                            <option  value="XXL">XXL</option>
                        </select>
                    </label>
                    <br>
                    <label for="color">Color:
                        <select class="form-control" name="color">
                            <option  value="blue">Blue</option>
                            <option  value="green">Green</option>
                            <option  value="black">Black</option>
                        </select>
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
    </div>
@endsection

