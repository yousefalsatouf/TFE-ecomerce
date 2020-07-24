@extends('front.helpers.master')
@section('content')
    <section id="gMap">
        <GMap></GMap>
    </section>
    <section id="contact">
        <div class="container">
            <h1>Questions?</h1>
            <h2>Veilliez nous contacter à tout moment pour toute question!</h2>
            <hr>
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <br>
            <strong class="text-warning"><i class="fa fa-warning"></i>Les champs doivent être remplis</strong>
            <hr>
            {!! Form::open(['method'=>'post', 'action'=> ['ContactController@submitForm']]) !!}
            <div class="form-group">
                {{ Form::label('name', 'Name *') }}
                {{ Form::text('name', null, array('class' => 'form-control', 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email *') }}
                {{ Form::text('email', null, array('class' => 'form-control', 'required')) }}
            </div>
            <div class="form-group">
                {{ Form::label('sub', 'Subject') }}
                {{ Form::text('stock', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('message', 'Message *') }}
                {{ Form::textarea('message', null, array('class' => 'form-control', 'required')) }}
            </div>
            {{ Form::submit('Submit', array('class' => 'link')) }}
            <br>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
