@extends('admin.master')
@section('content')
    <section id="admin-message" class="col-sm-9 ml-sm-auto col-md-10" style="margin-top: 5rem">
        <div class="row">
            <div>
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-9 ml-sm-auto col-md-10">
                <h2>message:</h2>
                <hr>
                <div>
                    @foreach($message as $one)
                        {!! Form::open(['method'=>'delete', 'action'=> ['AdminController@clearMessage', $one->id]])  !!}
                            {!! Form::submit('remove', ['class'=>'btn btn-outline-danger']) !!}
                        {!! Form::close() !!}
                        <hr>
                        <ul>
                            <li class="text-light">
                                <strong class="text-dark">From: {{$one->name}}</strong>
                            </li>
                            <li class="text-light">
                                <strong class="text-dark">Subject: {{$one->sub}}</strong>
                            </li>
                            <hr>
                            <li class="text-light">
                                <p class="text-dark"> {{$one->message}}</p>
                            </li>
                        </ul>
                    @endforeach
                    <a href="{{url('admin/inbox')}}">
                        <i class="fa fa-backward"> Back to inbox</i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
