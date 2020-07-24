@extends('admin.master')
@section('content')
    <div id="edit-product" class="col-sm-9 ml-sm-auto col-md-10 pt-3 edit-product" role="main">
        <ul>
            <div class="row">
                <div>
                    @include('admin.includes.sidenav')
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-between">
                        <h2>Modifier le produit</h2>
                    </div>
                    <hr>
                    @if(session('msg'))
                        <div class="alert alert-success">{{session('msg')}}</div>
                    @endif
                    <hr>
                    <br>
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    {!! Form::model($products, ['method'=>'post', 'action'=> ['ProductsController@editProduct', $products->id], 'files'=>true]) !!}
                    <strong class="text-warning"><i class="fa fa-warning"></i>Assurez-vous que la première image se remplit</strong>
                    <div class="form-group">
                        <label for="category_id">
                            Categorie:
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
                        {!! Form::label('product_name', 'Nom:') !!}
                        {!! Form::text('product_name', null, ['class'=>'form-control'], 'require')!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('product_price', 'Prix:') !!}
                        {!! Form::text('product_price', null, ['class'=>'form-control'], 'require')!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('product_code', 'Code:') !!}
                        {!! Form::text('product_code', null, ['class'=>'form-control'], 'require')!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('sold_price', 'Promo prix:') !!}
                        {!! Form::text('sold_price', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('stock', 'Stock:') !!}
                        {!! Form::text('stock', null, ['class'=>'form-control'], 'require')!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('shopping_cost', 'Coût d\'achat:') !!}
                        {!! Form::text('shopping_cost', null, ['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Première image') }}
                        {{ Form::file('image',array('class' => 'form-control'), 'require') }}
                    </div>
                    <div class="form-group">
                        {!! Form::label('product_info', 'Info:') !!}
                        {!! Form::textarea('product_info', null, ['class'=>'form-control'], 'require')!!}
                    </div>
                    <div class="form-group">
                        <label class="pull-right">Nouvelle arrivee: <input type="checkbox" name="new_arrival"></label>
                    </div>
                    <div class="form-group">
                        <button type="submit">Modifier</button>
                    </div>

                    {!! Form::close() !!}
                </div>
                <div class="col-md-3">
                    <div class="content-box-large">
                        <div class="content-box-large">
                            <div class="d-flex justify-content-between">
                                <h5>Modifier les propriétés</h5>
                                <a href="{{route('addProperty',$products->id)}}" class="link">Ajouter une propriété</a>
                            </div>
                            <br>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Taille</th>
                                        <th>Mark</th>
                                        <th>Coleur</th>
                                        <th>Action</th>
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
                                        <td class="d-flex">
                                            <button type="submit"><i class="fa fa-edit"></i></button>
                                        {!! Form::close() !!}
                                            {!! Form::open(['method'=>'delete', 'action'=> ['ProductsController@removeProperty', $prop->id]])  !!}
                                                <button type="submit"><i class="fa fa-trash-o"></i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div>
                                <div>
                                    <h5>Changer les images de la galerie</h5>
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
                                    <a href="{{route('editImage',$products->id)}}" class="link">Change maintenant</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </div>
@endsection
