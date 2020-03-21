@extends('front.helpers.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <strong>Hello {{ucwords(Auth::user()->name)}}, </strong>
                <ol class="breadcrumb">
                    <li class="active"><b class="text-success">Your Profile</b></li>
                </ol>
            </div>
            @if(session('msg'))
                <div class="alert alert-info">{{session('msg')}}</div>
            @endif
            <h1><span class="text-primary">Dashboard</span></h1>
            <div class="row">
                @include('user.helpers.quickMenu')
                <div class="col-md-8">
                    <div class="container">
                        <div class="">
                            <table class="table w-100">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Street</th>
                                    <th>Street Number</th>
                                    <th>Postal Code</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($address_data as $value)
                                        <tr>
                                            <td>{{$value->first_name}}</td>
                                            <td>{{$value->last_name}}</td>
                                            <td>{{$value->state}}</td>
                                            <td>{{$value->city}}</td>
                                            <td>{{$value->street}}</td>
                                            <td>{{$value->street_number}}</td>
                                            <td>{{$value->postal_code}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
