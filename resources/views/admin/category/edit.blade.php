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
                    <strong class="text-warning">Sorry, you cannot change category's name because there are might products related to this category;</strong>
                    <br>
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
                    {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </ul>
    </main>
@endsection
