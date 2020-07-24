@extends('admin.master')
@section('content')
    <section class="container-fluid categories-sec">
        <div class="row">
            @include('admin.includes.sidenav')
        </div>
        <div class="col-sm-9 ml-sm-auto col-md-10 pt-3 categories">
            <div class="row">
                <div class="col-md-10">
                    <h2>Créer une catégorie</h2>
                    <hr>
                    <div class="card card-body py-5">
                        @if(session('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                        {!! Form::open(['route' => 'categories.store','files' => true, 'method' => 'post']) !!}
                        <div class="form-group">
                            {{ Form::label('name', 'Nom de catégorie') }}
                            {{ Form::text('name', null, array('class' => 'form-control'), 'require') }}
                        </div>
                        <div class="form-group">

                            {{ Form::label('image', 'Sélectionnez la première image:') }}
                            {{ Form::file('image',array('class' => 'form-control'), 'require') }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Description de la catégorie') }}
                            {{ Form::textarea('description', null, array('class' => 'form-control'), 'require') }}
                        </div>
                        <button type="submit">Ajouter</button>
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
                    <h2>Liste des catégories</h2>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
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
                                <td class="d-flex">
                                    {!! Form::open(['method'=>'get', 'action'=> ['CategoriesController@editCategoryForm', $category->id]]) !!}
                                        <button type="submit"><i class="fa fa-edit"></i></button>
                                    {!! Form::close() !!}
                                    {!! Form::open(['method'=>'DELETE', 'action'=> ['CategoriesController@destroy', $category->id]]) !!}
                                         <button type="submit"><i class="fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}
                                </td>
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
