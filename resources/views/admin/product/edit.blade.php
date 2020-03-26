@extends('admin.master')
@section('content')
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <h3>Edit</h3>
        <ul>
            <div class="row">
                <div class="col-md-4">
                    {!! Form::model($products, ['method'=>'post', 'action'=> ['ProductsController@editProduct', $products->id], 'files'=>true]) !!}

                    <Select class="form-control" name="cat_id">
                        @foreach($categories as $cat)
                            Category:  <option value="{{ $cat->id }}"  <?php
                            if($products->category_id == $cat->id) {?> selected="selected"<?php }?>
                            >{{ ucwords($cat->name) }}</option>
                        @endforeach
                    </select>
                    <br>
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
                    <img class="card-img-top img-fluid" src="{{url('images',$products->image)}}" style="width:50px" alt="Card image cap">
                    <div class="form-group">
                        {!! Form::label('spl_price', 'Spl Price:') !!}
                        {!! Form::text('spl_price', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('product_info', 'Product Info:') !!}
                        {!! Form::text('product_info', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        New Arrival: <p class="pull-right"><input type="checkbox" name="new_arrival" value="1"></p>
                    </div>
                    {{ Form::submit('Update', array('class' => 'btn btn-default')) }}

                    {!! Form::close() !!}

                </div>
                <div class="col-md-3">
                    <div class="content-box-large">
                        <?php {?>
                        <div class="panel-heading">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username">
                                <div class="input-group-append">
                                    <a href="" class="btn btn-info pull-right"
                                       style="margin:-6px; color:#fff">Add more</a>
                                </div>
                            </div>
                        </div>

                        <div class="content-box-large">

                            <table class="table table-responsive">
                                <tr>
                                    <td>Size</td>
                                    <td>Color</td>
                                    <td>price</td>
                                    <td>Update</td>
                                </tr>
                                @foreach($props as $prop)
                                    {!! Form::open(['url' => 'admin/editProperty',  'method' => 'post']) !!}
                                    <tr>
                                        <input type="hidden" name="pro_id" value="{{$prop->product_id}}" size="6"/> <!-- products_properties pro_id -->
                                        <input type="hidden" name="id" value="{{$prop->id}}" size="6"/> <!--// products_properties id -->
                                        <td><input type="text" name="size" value="{{$prop->size}}" size="6"/></td>
                                        <td><input type="text" name="color" value="{{$prop->color}}" size="15"/></td>
                                        <td><input type="text" name="p_price" value="{{$prop->p_price}}" size="6"/></td>
                                        <td colspan="3" align="right"><input type="submit" class="btn btn-success"
                                                                             value="Save" style="margin:-6px; color:#fff"></td>
                                    </tr>
                                    {!! Form::close() !!}
                                @endforeach
                            </table>
                            <div>
                            <?php }?>
                            <!-- End Update Attributes -->
                                <div align="center">
                                    <a href="{{route('addProperty',$products->id)}}" class="btn btn-sm btn-info" style="margin:5px">Add Property</a>
                                    <br>
                                </div>
                                <h1>Change Image</h1>
                                <img class="card-img-top img-fluid" src="{{url('images',$products->image)}}" style="width:200px" alt="Card image cap">
                                <p><a href="{{route('editImage',$products->id)}}"
                                      class="btn btn-info">Save</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </main>
@endsection
