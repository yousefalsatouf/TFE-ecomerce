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
                        <h3>Edit</h3>
                        <img class="card-img-top img-fluid" src="{{url('images',$products->image)}}" style="width:50px" alt="Card image cap">
                    </div>
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
                        {!! Form::label('sale_price', 'Sold Price:') !!}
                        {!! Form::text('sale_price', null, ['class'=>'form-control'])!!}
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
                        <label class="pull-right">New Arrival: <input type="checkbox" name="new_arrival" value="1"></label>
                    </div>
                    {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

                    {!! Form::close() !!}
                </div>
                <div class="col-md-3">
                    <div class="content-box-large">
                        <div class="content-box-large">
                        @if(!$props->isEmpty())
                            <table class="table table-responsive">
                                <tr>
                                    <td>Size</td>
                                    <td>Color</td>
                                    <td>Action</td>
                                </tr>
                                    @foreach($props as $prop)
                                    {!! Form::model($props, ['method'=>'post', 'action'=> ['ProductsController@editProperty', $prop->id]])  !!}
                                    <tr>
                                            <input type="hidden" name="product_id" value="{{$prop->product_id}}" size="6"/> <!-- products_properties pro_id -->
                                            <input type="hidden" name="id" value="{{$prop->id}}" size="6"/> <!--// products_properties id -->
                                            <td>
                                                <input type="text" name="size" value="{{$prop->size}}" size="6"/>
                                            </td>
                                            <td>
                                                <input type="text" name="color" value="{{$prop->color}}" size="15"/>
                                            </td>
                                            <td>
                                                <input type="submit" class="btn btn-success" value="Done"/>
                                            </td>
                                        </tr>
                                    {!! Form::close() !!}
                                    @endforeach
                            </table>
                            @else
                            <h3 class="text-info">Add Properties such as color size ...</h3>
                            <div>
                                <a href="{{route('addProperty',$products->id)}}" class="btn btn-sm btn-outline-success" style="margin:5px">Add Property</a>
                                <br>
                            </div>
                            @endif
                            <div>
                                <h1>Change Image</h1>
                                <img class="card-img-top img-fluid" src="{{url('images',$products->image)}}" style="width:200px" alt="">
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
