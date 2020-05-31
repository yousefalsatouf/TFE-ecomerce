@extends('front.helpers.master')
@section('content')
    <main id="checkout">
        <section class="head">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <div class="col-lg-9 order-2 order-lg-1">
                            <h1>Checkout</h1>
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
                            <h2 class="text-uppercase">Order Summary</h2>
                            <hr>
                            <p>Shipping and additional costs are calculated based on values you have entered</p>
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
                                    <td>{{Cart::tax()}} $</td>
                                    <td>{{Cart::subtotal()}} $</td>
                                    <td>{{Cart::total()}} $</td>
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
                        <li class="nav-item"><b>Shopper Information<i class="fa fa-angle-double-right"></i></b></li>
                        <li class="nav-item"><b>Delivery Method<i class="fa fa-angle-double-right"></i></b></li>
                        <li class="nav-item"><b>Payment PayPal</b></li>
                    </ul>
                    <hr>
                </div>
                @include('front/helpers/checkoutAddress')
                <div class="delivery">
                    <h3>Delivery Method</h3>
                    <hr>
                    <div>
                        <i class="fa fa-truck"></i>
                        <p>
                            As a precaution and to protect everyone's health,
                            our stores will remain closed until further notice.
                            Do you want to make a purchase? We remain available 24/7 on shopclub.be. Your orders will be delivered to your home, safely and free of charge.
                        </p>
                    </div>
                </div>
                <div class="payment">
                    <h3>Payment Method</h3>
                    <hr>
                    <strong class="text-warning">To finish your order please checkout to pay ..</strong>
                    <form action="{{url('/finishOrder')}}" method="get">
                        {{--
                            <div class="form-group">
                                <label for="pay" class="form-label">PayPal
                                    <input type="radio" name="pay" value="paypal" checked>
                                </label>
                                @include('front/paypal')
                            </div>
                        --}}
                        <button type="submit" class="btn btn-success">Test</button>
                    </form>
                </div>
            </div>
        </section>
        <div>
            <a href="{{url('/cart')}}" class="btn btn-template-outlined wide prev">
                <button class="btn btn-outline-dark">
                    <i class="fa fa-backward"></i> Back to Cart
                </button>
            </a>
        </div>
    </main>
@endsection
