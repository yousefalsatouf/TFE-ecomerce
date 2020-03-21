@extends('front.helpers.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/user')}}">Profile</a></li>
                    <li class="active">My Address</li>
                </ol>
            </div>
            @if(session('msg'))
                <div class="alert alert-info">{{session('msg')}}</div>
            @endif
            <div class="row">
                @include('user.helpers.menu')
                <div class="col-md-8">
                    <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Your Address</h3>
                    <div class="container" >
                        {!! Form::open(['url' => 'updateAddress',  'method' => 'post']) !!}
                        @foreach($address_data as $value)
                            <div class="row">
                                <h1>Shopper Information</h1>
                                <div class="form-group col-md-6">
                                    <label for="first-name" class="form-label">First Name</label>
                                    <input id="first-name" type="text" name="first_name" placeholder="First Name"  value="{{ old('first_name') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('first_name') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last-name" class="form-label">Last Name</label>
                                    <input id="last-name" type="text" name="last_name" placeholder="Last Name"  value="{{ old('last_name') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('last_name') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state" class="form-label">State Name</label>
                                    <input id="state" type="text" name="state" placeholder="State" value="{{ old('state') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('state') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city" class="form-label">City Name</label>
                                    <input id="city" type="text" name="city" placeholder="City Name" value="{{ old('city') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('city') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="postal-code" class="form-label">Postal code</label>
                                    <input id="postal-code" type="text" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('postal_code') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="street" class="form-label">Street</label>
                                    <input id="street" type="text" name="street" placeholder="Street" value="{{ old('street') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('street') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="street-number" class="form-label">Street Number</label>
                                    <input id="street-number" type="text" name="street_number" placeholder="Street Number" value="{{ old('street_number') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('street_number') }}</span>
                                </div>
                            </div>
                        @endforeach
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </section>






@endsection
