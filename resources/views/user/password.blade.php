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
            <h1><span class="text-primary">Dashboard</span></h1>
            <div class="row">
                <div class="col-md-4 well well-sm">
                    @include('user.helpers.quickMenu')
                </div>
                <div class="col-md-8">
                    <h3 ><span style='color:green'>Change Password</span></h3>
                </div>
            </div>
        </div>
    </section>
@endsection
