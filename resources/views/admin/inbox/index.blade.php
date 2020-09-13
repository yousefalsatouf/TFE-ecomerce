@extends('admin.master')
@section('content')
    <section id="admin" class="col-sm-9 ml-sm-auto col-md-10" style="margin-top: 5rem">
        @include('admin.includes.sidenav')
        <div class="row inbox">
            <div class="inbox-container">
                <div class="inbox-side">
                    @if(session('msg'))
                        <P class="alert alert-success"><i class="fa fa-check-circle"></i> {{session('msg')}}</P>
                    @endif
                    {!! Form::open(['method'=>'delete', 'action'=> 'AdminController@clearAllMessages'])  !!}
                    {!! Form::submit('Clear All', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    <div class=" new-msg">
                        <hr>
                        <h6>@lang('admin.newMails'): ( {{$countUnreadMessages}} )</h6>
                        <hr>
                        <div>
                            <ul class="">
                                @forelse($unreadMessages as $one)
                                    <li>
                                        <h5>
                                            <strong class="text-dark">@lang('admin.from'): <a href="{{url('admin/inbox/'.$one->id)}}">{{$one->name}}</a></strong>
                                        </h5>
                                    </li>
                                @empty
                                    <h6 class="text-danger">@lang('admin.emptyNewMsg')</h6>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                        <br>
                    <div class=" old-msg">
                        <h6 class="text-dark">Emails: ( {{$countReadMessages}} )</h6>
                        <hr>
                        <div>
                            <ul class="">
                                @forelse($readMessages as $one)
                                    <li class="text-light">
                                        <a class="text-secondary" href="{{url('admin/inbox/'.$one->id)}}">@lang('admin.from'): {{$one->name}}</a>
                                        <b class="">date</b>
                                    </li>
                                    <hr>
                                @empty
                                    <h6 class="text-danger">@lang('admin.emptyInb')</h6>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="message-content">
                    @if(isset($message))
                        <div class="col-sm-9 ml-sm-auto col-md-10">
                            <h2>message:</h2>
                            <hr>
                            <div>
                                @foreach($message as $one)
                                    {!! Form::open(['method'=>'delete', 'action'=> ['AdminController@clearMessage', $one->id]])  !!}
                                    {!! Form::submit('Clear', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <hr>
                                    <ul>
                                        <li class="text-light">
                                            <strong class="text-dark">@lang('admin.from'): {{$one->name}}</strong>
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
                            </div>
                        </div>
                    @else
                        <b class="text-warning">@lang('admin.warSelectedMsg')</b>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div>
            <a href="{{url('/admin')}}" class="link"><i class="fa fa-backward"></i> Admin</a>
        </div>
    </section>
@endsection
