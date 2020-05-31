@extends('front.helpers.master')
@section('content')
    <section id="cart_items profile">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><b class="text-success">Hello {{ucwords(Auth::user()->name)}},</b></li>
                    <li><b class="text-info">See your Profile</b></li>
                </ol>
            </div>
            @if(session('msg'))
                <div class="alert alert-info">{{session('msg')}}</div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    @include('user.helpers.quickMenu')
                </div>
                <div class="col-md-8">
                    <div class="container a">
                        <div class="user-info card">
                            @foreach($user_data as $info)
                            <div class="card-header m-auto">
                                @if(isset($info->image))
                                    <div class="w-25">
                                        <img class="card-img-top img-fluid w-100" src="{{url('images',$info->image)}}" alt="">
                                    </div>
                                @else
                                    <div class="w-25">
                                        <i class="fa fa-user"></i>
                                    </div>
                                @endif
                                <h4 style="margin-left: 1rem">{{strtoupper(Auth::user()->name)}}</h4>
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>
                                        <h5>First Name</h5>
                                        <p>{{$info->first_name}}</p>
                                    </li>
                                    <li>
                                        <h5>Last Name</h5>
                                        <p>{{$info->last_name}}</p>
                                    </li>
                                    <li>
                                        <h5>Email</h5>
                                        <p>{{$info->email}}</p>
                                    </li>
                                    <li>
                                        <h5>Phone</h5>
                                        <p>{{$info->phone_number}}</p>
                                    </li>
                                    <li>
                                        <h5>State</h5>
                                        <p>{{$info->state}}</p>
                                    </li>
                                    <li>
                                        <h5>City</h5>
                                        <p>{{$info->city}}</p>
                                    </li>
                                    <li>
                                        <h5>Street</h5>
                                        <p>{{$info->street}}</p>
                                    </li>
                                    <li>
                                        <h5>Street Number</h5>
                                        <p>{{$info->street_number}}</p>
                                    </li>
                                    <li>
                                        <h5>Postal Code</h5>
                                        <p>{{$info->postal_code}}</p>
                                    </li>
                                    <li>
                                        <h5>Payment Method</h5>
                                        <p>{{$info->payment_type}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
