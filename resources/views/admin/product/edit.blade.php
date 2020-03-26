@extends('admin.master')
@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h3>Edit</h3>
        <ul>
            <div class="row">
                <div class="col-md-4">
                    {!! Form::model($products, ['method'=>'post', 'action'=> ['ProductsController@editProduct', $products->id], 'files'=>true]) !!}
                    <div class="form-group">
                        <img class="card-img-top img-fluid" src="{{url('images',$products->image)}}" style="width:50px" alt="Card image cap">
                    </div>
                    <div class="form-group">
                        <Select class="form-control" name="category_id">
                            @foreach($categories as $cat)
                                Category:
                                <option value="{{ $cat->id }}" {{ $products->category_id == $cat->id ? "selected" : "" }}>
                                    {{ ucwords($cat->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! Form::label('product_name', 'Name:') !!}
                        {!! Form::text('product_name', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('product_price', 'Product Price:') !!}
                        {!! Form::text('product_price', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('product_code', 'Product Code:') !!}
                        {!! Form::text('product_code', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('spl_price', 'Sale Price:') !!}
                        {!! Form::text('spl_price', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('stock', 'In Stock:') !!}
                        {!! Form::text('stock', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('product_info', 'Product Info:') !!}
                        {!! Form::textarea('product_info', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        New Arrival: <p class="pull-right"><input type="checkbox" name="new_arrival" value="1"></p>
                    </div>
                    {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

                    {!! Form::close() !!}

                </div>
                <div class="col-md-3">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username">
                                <div class="input-group-append">
                                    <a href="" class="btn btn-info pull-right"
                                       style="margin:-6px; color:#fff">Add more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </main>
@endsection
