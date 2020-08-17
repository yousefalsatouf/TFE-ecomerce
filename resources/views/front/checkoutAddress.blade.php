@extends('front.helpers.master')
@section('content')
    <main id="checkout">
        <section class="head">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <div class="col-lg-9 order-2 order-lg-1">
                            <h1>Check-out</h1>
                        </div>
                        <div class="quick-access">
                            <ol class="breadcrumb">
                                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"></i> Shop <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i> Cart <i class="fa fa-angle-right"></i></a></li>
                                <li class="active"><i class="fa fa-info"></i> Checkout</li>
                            </ol>
                        </div>
                    </div>
                    <div class="order-summary">
                        <div class="block-body">
                            <h2 class="text-uppercase">Récapitulatif de la commande</h2>
                            <hr>
                            <p>Les frais d'expédition et supplémentaires sont calculés en fonction des valeurs que vous avez saisies</p>
                            <table class="table table-striped">
                                <thead>
                                <tr class="cart_menu">
                                    <th class="image">Shipping and handling</th>
                                    <th class="title">Tax</th>
                                    <th class="description">Order Subtotal</th>
                                    <th class="description">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><b class="text-success">FREE</b></td>
                                    <td>{{Cart::tax()}} EUR</td>
                                    <td>{{Cart::subtotal()}} EUR</td>
                                    <td>{{Cart::total()}} EUR</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="checkout">
            <div class="container">
                <div class="quick-checkout">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><b>Informations sur l'acheteur<i class="fa fa-angle-double-right"></i></b></li>
                        <li class="nav-item text-white"><b>méthode de livraison<i class="fa fa-angle-double-right"></i></b></li>
                        <li class="nav-item text-white"><b>Paiement: Paypal<i class="fa fa-angle-double-right"></i></b></li>
                        <li class="nav-item text-white"><b>Terminer la commande</b></li>
                    </ul>
                    <hr>
                </div>
                <div class="address">
                    <div class="tab-content">
                        <div id="address" class="active tab-block">
                            <h3>Shopper Information</h3>
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
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <form action="{{url('/formValidate')}}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row">
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
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input id="phone" type="text" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" class="form-control">
                                                <br>
                                                <span style="color:red">{{ $errors->first('phone_number') }}</span>
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
                                            <div class="form-group">
                                                <label for="pay" class="form-label">
                                                    <input type="radio" name="pay" value="paypal" checked>
                                                    PayPal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <br>
                <div>
                    <a href="{{url('/shop')}}" class="text-dark">
                        <button>
                            <b><i class="fa fa-backward"></i> Ajouter plus de la boutique</b>
                        </button>
                    </a>
                    <a href="{{url('/checkout')}}" class="text-dark">
                        <button class="float-right">
                            <b>Suivant <i class="fa fa-eye"></i></b>
                        </button>
                    </a>
                </div>
                <br>
            </div>
        </section>
    </main>
@endsection
