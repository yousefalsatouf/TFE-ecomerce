@extends('admin.master')
@section('content')
    <section class="container-fluid">
        <div class="row">
            @include('admin.includes.sidenav')
        </div>
        <div class="col-sm-9 ml-sm-auto col-md-10 pt-3 categories">
            <div class="row">
                <div class="col-md-10">
                    <h2>Create Category</h2>
                    <hr>
                    <div class="card card-body py-5">
                        {!! Form::open(['route' => 'categories.store', 'method' => 'post']) !!}
                        <div class="form-group">
                            {{ Form::label('name', 'Category Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        <button type="submit" class="btn btn-outline-success">Add Category</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-10">
                    <h2>List of Categories</h2>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>image</td>
                                <td>
                                    <strong>{{strtoupper($category->name)}}</strong>
                                </td>
                                <td>some content</td>
                                <td>@if($category->status=='0')
                                        Enable
                                    @else
                                        Disable
                                    @endif
                                </td>
                                {!! Form::open(['method'=>'DELETE', 'action'=> ['CategoriesController@destroy', $category->id]]) !!}
                                    <td>
                                        {!! Form::submit('Edit', ['class'=>'btn btn-outline-success col-sm-6']) !!}
                                    </td>
                                {!! Form::close() !!}
                                {!! Form::open(['method'=>'DELETE', 'action'=> ['CategoriesController@destroy', $category->id]]) !!}
                                <td>
                                    {!! Form::submit('Delete', ['class'=>'btn btn-outline-danger col-sm-6']) !!}
                                </td>
                                {!! Form::close() !!}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
