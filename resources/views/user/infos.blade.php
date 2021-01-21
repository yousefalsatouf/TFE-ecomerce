@extends('front.helpers.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><b class="text-success">@lang('commun.greeting') {{ucwords(Auth::user()->name)}},</b></li>
                    <li><b class="text-info">@lang('cart.shopperInfo')</b></li>
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
                        <h2>@lang('cart.infos')</h2>
                        <hr>
                        {!! Form::open(['url' => 'updateInfos',  'method' => 'post', 'files'=>true]) !!}
                        @foreach($users as $user)

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="image" class="form-label font-weight-bolder">
                                        @if(isset($user->image))
                                            <img class="card-img-top img-fluid" src="{{url('images',$user->image)}}" style="width:200px" alt="photo">
                                        @else
                                            <i class="fa fa-user" style="font-size: 18px"></i>
                                        @endif
                                    </label>
                                    <input id="image" type="file" name="image" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('image') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name" class="form-label font-weight-bolder">@lang('cart.name')</label>
                                    <input id="name" type="text" name="name" value="{{ isset($user->name)?$user->name:'' }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('first_name') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="first-name" class="form-label font-weight-bolder">@lang('cart.fname')</label>
                                    <input id="first-name" type="text" name="first_name" value="{{ isset($user->first_name)?$user->first_name:'' }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('first_name') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last-name" class="form-label font-weight-bolder">@lang('cart.lname')</label>
                                    <input id="last-name" type="text" name="last_name" value="{{ isset($user->last_name)?$user->last_name:''  }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('last_name') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email" class="form-label font-weight-bolder">@lang('cart.email')</label>
                                    <input id="email" type="text" name="email" value="{{ isset($user->email)?$user->email:'' }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone" class="form-label font-weight-bolder">@lang('cart.phone')</label>
                                    <input id="phone" type="text" name="phone_number" value="{{ isset($user->phone_number)?$user->phone_number:''  }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('phone_number') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state" class="form-label font-weight-bolder">@lang('cart.state')</label>
                                    <input id="state" type="text" name="state" value="{{ isset($user->state)?$user->state:''  }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('state') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city" class="form-label font-weight-bolder">@lang('cart.city')</label>
                                    <input id="city" type="text" name="city" value="{{ isset($user->city)?$user->city:''  }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('city') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="postal-code" class="form-label font-weight-bolder">@lang('cart.pc')</label>
                                    <input id="postal-code" type="text" name="postal_code" value="{{ isset($user->postal_code)?$user->postal_code:''  }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('postal_code') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="street" class="form-label font-weight-bolder">@lang('cart.street')</label>
                                    <input id="street" type="text" name="street" value="{{ isset($user->street)?$user->street:''  }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('street') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="street-number" class="form-label font-weight-bolder">@lang('cart.stNber')</label>
                                    <input id="street-number" type="text" name="street_number" value="{{ isset($user->street_number)?$user->street_number:''  }}" class="form-control">
                                    <br>
                                    <span style="color:red">{{ $errors->first('street_number') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="payment_type" class="form-label">
                                            <input type="radio" name="payment_type" value="paypal" checked>
                                            PayPal
                                        </label>
                                    </div>
                                    <br>
                                    <span style="color:red">{{ $errors->first('payment_type') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <button type="submit">@lang('cart.update')</button>
                                    </div>
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
