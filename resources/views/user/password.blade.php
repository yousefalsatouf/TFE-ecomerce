@extends('front.helpers.master')
@section('content')
    <section id="cart_items" style="margin-bottom: 22rem;">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><b class="text-info">@lang('commun.greeting') {{ucwords(Auth::user()->name)}},</b></li>
                </ol>
            </div>
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @elseif(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="row">
                <div class="col-md-4 well well-sm">
                    @include('user.helpers.quickMenu')
                </div>
                <div class="col-md-8">
                    <h2>@lang('auth.changePass')</h2>
                    <br>
                    <hr>
                    {!! Form::open(['url' => 'updatePassword',  'method' => 'post']) !!}
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input">@lang('auth.currPass')</label>
                                <input class="form-control" type="password"  name="oldPassword">
                                <span style="color:red">{{ $errors->first('old_password') }}</span>
                            </div>
                            <br>
                            <div class="form-group col-md-6">
                                <label for="example-text-input">@lang('auth.newPass')</label>
                                <input class="form-control" type="password"  name="newPassword">
                                <span style="color:red">{{ $errors->first('newPassword') }}</span>
                            </div>
                            <div class="form-group col-md-6" align="right">
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
