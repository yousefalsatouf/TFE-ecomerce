@extends('front.helpers.master')
@section('content')
    <section id="cart_items" >
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><b class="text-success">Hello {{ucwords(Auth::user()->name)}},</b></li>
                    <li><b class="text-info">Manage your password</b></li>
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
                    <h3 ><span class="text-danger">Change Password</span></h3>
                    <br>
                    <hr>
                    {!! Form::open(['url' => 'updatePassword',  'method' => 'post']) !!}
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="text-success">Current Password</label>
                                <input class="form-control" type="password"  name="oldPassword">
                                <span style="color:red">{{ $errors->first('old_password') }}</span>
                            </div>
                            <br>
                            <div class="form-group col-md-6">
                                <label for="example-text-input" class="text-success">New Password</label>
                                <input class="form-control" type="password"  name="newPassword">
                                <span style="color:red">{{ $errors->first('newPassword') }}</span>
                            </div>
                            <div class="form-group col-md-6" align="right">
                                <input type="submit" value="Update" class="btn btn-outline-success">
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@endsection
