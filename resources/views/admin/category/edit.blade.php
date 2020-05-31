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
                        <h3>Edit Category</h3>
                    </div>
                    <hr>
                    <strong class="text-warning"><i class="fa fa-warning"></i>Fields must be full out</strong>
                    <br>
                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                    @endif
                    {!! Form::model($category, ['method'=>'post', 'action'=> ['CategoriesController@update', $category->id], 'files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control', 'value' => $category->name])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control', 'value' => $category->description])!!}
                    </div>
                    <div class="form-group">
                        Select Image:
                        {{ Form::file('image', ['class' => 'form-control']) }}
                    </div>
                    {{ Form::submit('Update', array('class' => 'btn btn-outline-success')) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </ul>
    </main>
@endsection
