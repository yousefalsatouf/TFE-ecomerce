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
                    <strong class="text-warning"><i class="fa fa-warning"></i>Fields must be fill out</strong>
                    <div class="card card-body py-5">
                        @if(session('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                        {!! Form::open(['route' => 'categories.store','files' => true, 'method' => 'post']) !!}
                        <div class="form-group">
                            {{ Form::label('name', 'Category Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            Select Image:
                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('image',array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Category Description') }}
                            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
                        </div>

                        <button type="submit" class="btn btn-outline-success">Add Category</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <hr>
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
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
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td style="width:50px; border: 1px solid #333;">
                                    <img class="card-img-top img-fluid" src="{{url('images',$category->image)}}" width="50px" alt="Card image cap">
                                </td>
                                <td>
                                    <strong>{{strtoupper($category->name)}}</strong>
                                </td>
                                <td>{{$category->description}}</td>
                                {!! Form::open(['method'=>'get', 'action'=> ['CategoriesController@editCategoryForm', $category->id]]) !!}
                                    <td>
                                        {!! Form::submit('Edit', ['class'=>'btn btn-outline-success']) !!}
                                    </td>
                                {!! Form::close() !!}
                                {!! Form::open(['method'=>'DELETE', 'action'=> ['CategoriesController@destroy', $category->id]]) !!}
                                <td>
                                    {!! Form::submit('Delete', ['class'=>'btn btn-outline-danger']) !!}
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
