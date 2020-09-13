@extends('admin.master')
@section('content')
    <section id="admin" class="container-fluid ads-sec">
        <div class="row">
            @include('admin.includes.sidenav')
        </div>
        <div class="col-sm-9 ml-sm-auto col-md-10 pt-3 categories">
            <div class="row">
                <div class="col-md-10">
                    <h2>créer une publicité</h2>
                    <hr>
                    <div class="card card-body py-5">
                        @if(session('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                        {!! Form::open(['route' => 'ads.store', 'method' => 'post', 'files'=>true]) !!}
                            <div class="form-group">
                                {{ Form::label('title', 'Titre') }}
                                {{ Form::text('title', null, array('class' => 'form-control'), 'require') }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('link', 'Lien Vers La publicité') }}
                                {{ Form::text('link', null, array('class' => 'form-control'), 'require') }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('description', 'Description') }}
                                {{ Form::textarea('description', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                Select Image:
                                {{ Form::label('image', 'Image') }}
                                {{ Form::file('image',array('class' => 'form-control')) }}
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                    <h2>Liste des annonces</h2>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ads as $ad)
                            <tr>
                                <td style="width:50px; border: 1px solid #333;">
                                    <img class="card-img-top img-fluid" src="{{url('images',$ad->image)}}" width="50px" alt="Card image cap">
                                </td>
                                <td>
                                    <strong>{{strtoupper($ad->title)}}</strong>
                                </td>
                                <td>{{$ad->description}}</td>
                                <td>{{$ad->link}}</td>
                                {!! Form::open(['method'=>'DELETE', 'action'=> ['AdsController@destroy', $ad->id]]) !!}
                                <td>
                                    <button type="submit"><i class="fa fa-trash-o"></i></button>
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
