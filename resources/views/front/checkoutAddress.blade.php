@extends('front.helpers.master')
@section('content')
    <main id="checkout">
        <section class="checkout">
            <div class="container">
                <div class="quick-checkout">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><b>@lang('cart.shopperInfo')<i class="fa fa-angle-double-right"></i></b></li>
                        <li class="nav-item text-white"><b>@lang('cart.payment'): Paypal<i class="fa fa-angle-double-right"></i></b></li>
                        <li class="nav-item text-white"><b>@lang('cart.finish')</b></li>
                    </ul>
                    <hr>
                </div>
                <div class="address">
                    <div class="tab-content">
                        <div id="address" class="active tab-block">
                            <h3>@lang('cart.shopperInfo')</h3>
                            <hr>
                            @foreach($addressInfos as $check)
                                @if($check->first_name)
                                    <div class="user-info card">
                                        @foreach($addressInfos as $info)
                                            <div class="card-header">
                                                @if($info->image)
                                                    <img class="card-img-top img-fluid" src="{{url('images',$info->image)}}" style="width:40px; border-radius: 50%" alt="Card image cap">
                                                @else
                                                    <i class="fa fa-user"></i>
                                                @endif
                                                <h4>{{strtoupper(Auth::user()->name)}}</h4>
                                            </div>
                                            <div class="card-body">
                                                <ul>
                                                    <li>
                                                        <h5>@lang('cart.fname')</h5>
                                                        <p>{{$info->first_name}}</p>
                                                    </li>
                                                    <li>
                                                        <h5>@lang('cart.lname')</h5>
                                                        <p>{{$info->last_name}}</p>
                                                    </li>
                                                    <li>
                                                        <h5>@lang('cart.email')</h5>
                                                        <p>{{$info->email}}</p>
                                                    </li>
                                                    <li>
                                                        <h5>@lang('cart.phone')</h5>
                                                        <p>{{$info->phone_number}}</p>
                                                    </li>
                                                    <li>
                                                        <h5>@lang('cart.state')</h5>
                                                        <p>{{$info->state}}</p>
                                                    </li>
                                                    <li>
                                                        <h5>@lang('cart.city')</h5>
                                                        <p>{{$info->city}}</p>
                                                    </li>
                                                    <li>
                                                        <h5>@lang('cart.street')</h5>
                                                        <p>{{$info->street}}</p>
                                                    </li>
                                                    <li>
                                                        <h5>@lang('cart.stNber')</h5>
                                                        <p>{{$info->street_number}}</p>
                                                    </li>
                                                    <li>
                                                        <h5>@lang('cart.pc')</h5>
                                                        <p>{{$info->postal_code}}</p>
                                                    </li>
                                                    <li>
                                                        <h5>@lang('cart.pMethod')</h5>
                                                        <p>{{$info->payment_type}}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach
                                            <hr>
                                            <div>
                                                <a href="{{url('/shop')}}" class="text-dark">
                                                    <button>
                                                        <b><i class="fa fa-backward"></i> @lang('cart.addMore')</b>
                                                    </button>
                                                </a>
                                                <a href="{{url('/checkout')}}" class="text-dark">
                                                    <button class="float-right" type="submit">
                                                        <b>@lang('cart.next') <i class="fa fa-eye"></i></b>
                                                    </button>
                                                </a>
                                            </div>
                                            <br>
                                    </div>
                                @else
                                    <form action="{{url('/formValidate')}}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="first-name" class="form-label">@lang('cart.fname')</label>
                                                <input id="first-name" type="text" name="first_name" placeholder="First Name"  value="{{ old('first_name') }}" class="form-control">
                                                <br>
                                                <span style="color:red">{{ $errors->first('first_name') }}</span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="last-name" class="form-label">@lang('cart.lname')</label>
                                                <input id="last-name" type="text" name="last_name" placeholder="Last Name"  value="{{ old('last_name') }}" class="form-control">
                                                <br>
                                                <span style="color:red">{{ $errors->first('last_name') }}</span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="phone" class="form-label">@lang('cart.phone')</label>
                                                <input id="phone" type="text" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" class="form-control">
                                                <br>
                                                <span style="color:red">{{ $errors->first('phone_number') }}</span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="state" class="form-label">@lang('cart.state')</label>
                                                <input id="state" type="text" name="state" placeholder="State" value="{{ old('state') }}" class="form-control">
                                                <br>
                                                <span style="color:red">{{ $errors->first('state') }}</span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="city" class="form-label">@lang('cart.city')</label>
                                                <input id="city" type="text" name="city" placeholder="City Name" value="{{ old('city') }}" class="form-control">
                                                <br>
                                                <span style="color:red">{{ $errors->first('city') }}</span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="postal-code" class="form-label">@lang('cart.pc')</label>
                                                <input id="postal-code" type="text" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code') }}" class="form-control">
                                                <br>
                                                <span style="color:red">{{ $errors->first('postal_code') }}</span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="street" class="form-label">@lang('cart.street')</label>
                                                <input id="street" type="text" name="street" placeholder="Street" value="{{ old('street') }}" class="form-control">
                                                <br>
                                                <span style="color:red">{{ $errors->first('street') }}</span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="street-number" class="form-label">@lang('cart.stNber')</label>
                                                <input id="street-number" type="text" name="street_number" placeholder="Street Number" value="{{ old('street_number') }}" class="form-control">
                                                <br>
                                                <span style="color:red">{{ $errors->first('street_number') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="pay" class="form-label">
                                                    <input type="radio" name="pay" value="paypal" checked>
                                                    PayPal
                                                </label>
                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <a href="{{url('/shop')}}" class="text-dark">
                                                <button>
                                                    <b><i class="fa fa-backward"></i> @lang('cart.addMore')</b>
                                                </button>
                                            </a>
                                            <a href="{{url('/checkout')}}" class="text-dark">
                                                <button class="float-right" type="submit">
                                                    <b>@lang('cart.next') <i class="fa fa-eye"></i></b>
                                                </button>
                                            </a>
                                        </div>
                                    </form>
                                    <br>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
