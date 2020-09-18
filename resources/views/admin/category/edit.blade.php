@extends('admin.master')
@section('content')
    <section id="admin" class="container-fluid">
        <div class="row categories">
            <div class="col-md-2 col-lg-2 pt-3">
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-12 ml-sm-auto col-md-10 col-lg-9 pt-3">
                <div class="d-flex justify-content-between">
                    <h2>@lang('admin.categories.edit')</h2>
                </div>
                <hr>
                <br>
                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                {!! Form::model($category, ['method'=>'post', 'action'=> ['CategoriesController@update', $category->id], 'files'=>true]) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nom:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'value' => $category->name])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class'=>'form-control', 'value' => $category->description])!!}
                </div>
                <div class="form-group">
                    Image:
                    {{ Form::file('image', ['class' => 'form-control']) }}
                </div>
                <button type="submit"><i class="fa fa-edit"></i> @lang('admin.categories.update')</button>
                {!! Form::close() !!}
            </div>
        </div>
        <br>
        <hr>
        <div class="back">
            <a href="{{url('/admin/products')}}" class="link"><i class="fa fa-backward"></i> @lang('admin.products.backToProds')</a>
        </div>
    </section>
@endsection
