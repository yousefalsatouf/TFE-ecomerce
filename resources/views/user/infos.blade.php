@extends('front.helpers.master')
@section('content')
    <section id="cart_items infos">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><b class="text-success">Hello {{ucwords(Auth::user()->name)}},</b></li>
                    <li><b class="text-info">Manage your infos</b></li>
                </ol>
            </div>
            @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}, <a href="{{url('/user')}}">See it Here</a></div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    @include('user.helpers.quickMenu')
                </div>
                <div class="col-md-8">
                    <div class="container">
                        <hr>
                        <h3 class="text-danger"> Edit Your information</h3>
                        <hr>
                        {!! Form::open(['url' => 'updateInfos',  'method' => 'post']) !!}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="first-name" class="form-label">First Name</label>
                                    <input id="first-name" type="text" name="first_name" value="{{ old('first_name') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('first_name') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last-name" class="form-label">Last Name</label>
                                    <input id="last-name" type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('last_name') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="text" name="email" value="{{ old('email') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input id="phone" type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('phone_number') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state" class="form-label">State Name</label>
                                    <input id="state" type="text" name="state" value="{{ old('state') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('state') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city" class="form-label">City Name</label>
                                    <input id="city" type="text" name="city" value="{{ old('city') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('city') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="postal-code" class="form-label">Postal code</label>
                                    <input id="postal-code" type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('postal_code') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="street" class="form-label">Street</label>
                                    <input id="street" type="text" name="street" value="{{ old('street') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('street') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="street-number" class="form-label">Street Number</label>
                                    <input id="street-number" type="text" name="street_number" value="{{ old('street_number') }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('street_number') }}</span>
                                </div>
                            </div>
                        <input type="submit" value="Update" class="btn btn-outline-success">
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </section>






@endsection
