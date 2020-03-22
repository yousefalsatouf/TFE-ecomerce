@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                @include('admin.includes.sidenav')
            </nav>
        </div>
        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
            <div class="row">
                <div class="col-md-6">
                    <h2>Categories</h2>
                    <hr>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <strong>{{$category->name}}</strong>
                                </td>
                                <td>@if($category->status=='0')
                                        Enable
                                    @else
                                        Disable
                                    @endif
                                </td>
                                {!! Form::open(['method'=>'DELETE', 'action'=> ['CategoriesController@destroy', $category->id]]) !!}
                                    <td>
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger col-sm-6']) !!}
                                    </td>
                                {!! Form::close() !!}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="w-50">
                    <h2>Create Category</h2>
                    <hr>
                    <div class="card card-body bg-dark text-white py-5">
                        {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                            <div class="form-group">
                                {{ Form::label('name', 'Category Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        {!! Form::close() !!}
                    </div>
                    {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </main>
    </div>
</div>
@endsection
