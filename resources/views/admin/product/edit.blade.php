@extends('admin.master')
@section('content')
    <main id="edit-product" class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <ul>
            <div class="row">
                <div>
                    @include('admin.includes.sidenav')
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-between">
                        <h3>Edit Product</h3>
                    </div>
                    <hr>
                    @if(session('msg'))
                        <div class="alert alert-success">{{session('msg')}}</div>
                    @endif
                    <hr>
                    <br>
                    {!! Form::model($products, ['method'=>'post', 'action'=> ['ProductsController@editProduct', $products->id], 'files'=>true]) !!}
                    <div class="form-group">
                        <label for="category_id">
                            Category:
                            <Select class="form-control" name="category_id">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $products->category_id == $cat->id ? "selected" : "" }}>
                                        {{ ucwords($cat->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
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
                        {!! Form::label('sold_price', 'Sold Price:') !!}
                        {!! Form::text('sold_price', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('stock', 'In Stock:') !!}
                        {!! Form::text('stock', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('shopping_cost', 'Shopping Cost:') !!}
                        {!! Form::text('shopping_cost', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Select First Image') }}
                        {{ Form::file('image',array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group">
                        {!! Form::label('product_info', 'Product Info:') !!}
                        {!! Form::textarea('product_info', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        <label class="pull-right">New Arrival: <input type="checkbox" name="new_arrival"></label>
                    </div>
                    {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

                    {!! Form::close() !!}
                </div>
                <div class="col-md-3">
                    <div class="content-box-large">
                        <div class="content-box-large">
                            <div class="d-flex justify-content-between">
                                <h3>Change Prorerties </h3>
                                <a href="{{route('addProperty',$products->id)}}" class="btn btn-sm btn-outline-success" style="margin:5px">Add Property</a>
                            </div>
                            <br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Size</th>
                                        <th>Mark</th>
                                        <th>Color</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($props as $prop)
                                    <tr>
                                        {!! Form::model($props, ['method'=>'post', 'action'=> ['ProductsController@editProperty', $prop->id]])  !!}
                                        <input type="hidden" name="product_id" value="{{$prop->product_id}}" size="6"/> <!-- products_properties pro_id -->
                                        <input type="hidden" name="id" value="{{$prop->id}}" size="6"/> <!--// products_properties id -->
                                        <td>
                                            <input type="text" name="size" value="{{$prop->size}}" size="6"/>
                                        </td>
                                        <td>
                                            <input type="text" name="mark" value="{{$prop->mark}}" size="6"/>
                                        </td>
                                        <td>
                                            <input type="text" name="color" value="{{$prop->color}}" size="15"/>
                                        </td>
                                        <td>
                                            <input type="submit" class="btn btn-outline-success" value="Update"/>
                                        </td>
                                        {!! Form::close() !!}
                                        {!! Form::open(['method'=>'delete', 'action'=> ['ProductsController@removeProperty', $prop->id]])  !!}
                                        <td>
                                            {!! Form::submit('Delete', ['class'=>'btn btn-outline-danger']) !!}
                                        </td>
                                        {!! Form::close() !!}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div>
                                <div>
                                    <h3>Change Gallery Images</h3>
                                    <div class="galleries d-flex justify-content-around">
                                        @foreach($galleries as $image)
                                            <div style="width: 50px;">
                                                <img class="card-img-top img-fluid w-100" src="{{url('images',$image->gallery)}}" style="width:200px" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <p>
                                    <a href="{{route('editImage',$products->id)}}"  class="btn btn-outline-success">Change Now!</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </main>
@endsection
