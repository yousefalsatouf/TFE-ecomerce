@extends('admin.master')
@section('content')
    <section class="container-fluid create-product">
        <div class="row">
            <div>
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
                <div class="col-lg-8">
                    <div>
                        <button class="float-right">
                            <a class="link" href="{{url('/admin/products')}}"><b><i class="fa fa-backward"></i> Gérer les produits</b></a>
                        </button>
                    </div>
                    <h2>Ajouter un nouveau produit</h2>
                    <hr>
                    <strong class="text-warning"><i class="fa fa-warning"></i> Les champs doivent être remplis</strong>
                    <br>
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    <div class="panel-body">
                        {!! Form::open(['route' => 'products.store', 'method' => 'post', 'files' => true]) !!}
                        <div class="form-group">
                            {{ Form::label('product_name', 'Product Name') }}
                            {{ Form::text('product_name', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('product_code', 'Product Code') }}
                            {{ Form::text('product_code', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('stock', 'In stock') }}
                            {{ Form::text('stock', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('product_price', 'Price') }}
                            {{ Form::text('product_price', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('sold_price', 'Sold Price') }}
                            {{ Form::text('sold_price', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('shopping_cost', 'Shopping Cost') }}
                            {{ Form::text('shopping_cost', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('category_id', 'Categories') }}
                            {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'SelectCategory']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('image', 'Select First Image') }}
                            {{ Form::file('image', array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('product_info', 'Description') }}
                            {{ Form::textarea('product_info', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            <button type="submit">Submit</button>
                        </div>
                        <br>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
