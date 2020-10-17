@extends('front.helpers.master')
@section('content')
    <section id="gmap">
        {{--<gmap-map
            :center="{lat:10,lng:10}"
            :zoom="7"
            style="width: 100%; height: 500px"
        >
        </gmap-map>--}}
        <iframe src="https://www.google.com/maps/d/embed?mid=1cWzykfq-y4XYmcuZz5tXmZc9CFPr5C3R" width="100%" height="480"></iframe>
    </section>
    <section id="contact">
        <div class="container">
            <div class="quick-access">
                <ul>
                    <li><a href="{{url('/')}}"><i class="fa fa-home"> </i>@lang('productDetail.homeMenu') <i class="fa fa-caret-right"></i></a></li>
                    <li><b><i class="fa fa-mobile-phone"> </i> Contact</b></li>
                </ul>
            </div>
            <hr>
            <div class="address-phone">
                <div class="address">
                    <b>Address:</b>
                    <p>
                        SportClub Sportsnutrition B.V.
                        Mars 10 8448 CP Heerenveen (Pays-Bas)
                        <br>
                        Register du Commerce et des Sociétés: 52492052
                        TVA : FR 24 883281131
                    </p>
                </div>
                <div class="phone">
                    <b>@lang('contact.phoneEmail')</b>
                    <br>
                    <b>@lang('contact.phone'): </b> 032 932 606
                    <br>
                    <b>@lang('contact.email'): </b> <a href="mailto:yousef.alsatouf94@gmail.com">contact@sportClub.be</a>
                </div>
            </div>
            <br>
            <h2>@lang('contact.title')</h2>
            <hr>
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <br>
            <div class="form">
                <strong class="text-warning"><i class="fa fa-warning"></i> @lang('contact.fieldsWarning')</strong>
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
                <div class="form-group">
                    <button type="submit"><i class="fa fa-paper-plane "></i></button>
                </div>
                <br>
                {!! Form::close() !!}
            </div>
        </div>
        <br>
    </section>
@endsection
