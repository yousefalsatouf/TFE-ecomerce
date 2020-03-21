@extends('front.helpers.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <b>Hello {{ucwords(Auth::user()->name)}},</b>
                <ol class="breadcrumb">
                    <li class="active"><b class="text-success">Manage your password</b></li>
                </ol>
            </div>
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <h1><span class="text-primary">Dashboard</span></h1>
            <div class="row">
                <div class="col-md-4 well well-sm">
                    @include('user.helpers.quickMenu')
                </div>
                <div class="col-md-8">
                    <h3 ><span style='color:green'>Change Password</span></h3>
                    {!! Form::open(['url' => 'updatePassword',  'method' => 'post']) !!}
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input" >Current Password</label>
                                <input class="form-control" type="password"  name="oldPassword">
                                <span style="color:red">{{ $errors->first('old_password') }}</span>
                            </div>
                            <br>
                            <div class="form-group col-md-6">
                                <label for="example-text-input" >New Password</label>
                                <input class="form-control" type="password"  name="newPassword">
                                <span style="color:red">{{ $errors->first('newPassword') }}</span>
                            </div>
                            <div class="form-group col-md-6" align="right">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
