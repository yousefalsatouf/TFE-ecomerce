@extends('admin.master')
@section('content')
    <section id="admin-message" class="col-sm-9 ml-sm-auto col-md-10" style="margin-top: 5rem">
        <div class="row">
            <div>
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-9 ml-sm-auto col-md-10">
                @if(session('msg'))
                    <div class="alert alert-success"><i class="fa fa-check-circle"></i> {{session('msg')}}</div>
                @endif
                {!! Form::open(['method'=>'delete', 'action'=> 'AdminController@clearAllMessages'])  !!}
                    {!! Form::submit('Clear All', ['class'=>'btn btn-outline-danger']) !!}
                 {!! Form::close() !!}
                <hr>
                <h2>Unread Emails: ( {{$countUnreadMessages}} )</h2>
                <hr>
                <div>
                    <ul class="">
                        @forelse($unreadMessages as $one)
                            <li>
                                <h5>
                                    <strong class="text-dark">From: <a href="{{url('admin/inbox/'.$one->id)}}">{{$one->name}}</a></strong>
                                </h5>
                            </li>
                        @empty
                            <h6 class="text-danger">Inbox is empty !</h6>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-sm-9 ml-sm-auto col-md-10">
                <h2 class="text-dark">Emails: ( {{$countReadMessages}} )</h2>
                <hr>
                <div>
                    <ul class="">
                        @forelse($readMessages as $one)
                            <li class="text-light">
                                <a class="text-secondary" href="{{url('admin/inbox/'.$one->id)}}">From: {{$one->name}}</a>
                            </li>
                        @empty
                            <h6 class="text-danger">Inbox is empty !</h6>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
