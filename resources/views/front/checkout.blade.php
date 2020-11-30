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
                                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"></i> Shop <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i>@lang('cart.cart') <i class="fa fa-angle-right"></i></a></li>
                                <li class="active"><i class="fa fa-info"></i> Check-out</li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="checkout">
            <div class="container">
                <div class="quick-checkout">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="{{url('/checkoutaddress')}}" class="text-white"><strong>@lang('cart.shopperInfo')<i class="fa fa-angle-double-right"></i></strong></a></li>
                        <li class="nav-item"><strong>@lang('cart.payment'): Paypal<i class="fa fa-angle-double-right"></i></strong></li>
                        <li class="nav-item text-white"><strong>@lang('cart.pay')</strong></li>
                    </ul>
                    <hr>
                </div>
                <div class="container">
                    <div class="payment">
                        <div class="form-payment">
                            <form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form"
                                  action="{!! URL::to('paypal') !!}">
                                {{ csrf_field() }}
                                <div class="order-summary">
                                    <div class="block-body">
                                        <h2 class="text-uppercase">@lang('cart.order')</h2>
                                        <hr>
                                        <p>@lang('cart.desCost')</p>
                                        <table class="table table-striped">
                                            <thead>
                                            <tr class="cart_menu">
                                                <th class="image">@lang('cart.cost')</th>
                                                <th class="title">Tax</th>
                                                <th class="description">Subtotal</th>
                                                <th class="description">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><b class="text-success">@lang('cart.free')</b></td>
                                                <td>{{Cart::tax()}} EUR</td>
                                                <td>{{Cart::subtotal()}} EUR</td>
                                                <td>{{Cart::total()}} EUR</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="payment-details">
                                    <input type="hidden" name="item_name" value="{{$names}}">
                                    <input type="hidden" name="item_qty" value={{$qty}}>
                                    <input type="hidden" name="item_amount" value={{$amount}}>
                                    <input type="hidden" name="itemsSize" value={{$counter}}>
                                    <br>
                                </div>
                                <button class="w3-btn w3-blue">Pay with PayPal</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div>
                        <div>
                            <a href="{{url('/checkoutaddress')}}" class="text-dark">
                                <button>
                                    <strong>@lang('cart.shopperInfo') <i class="fa fa-eye"></i></strong>
                                </button>
                            </a>
                            <a href="{{url('/shop')}}" class="text-dark">
                                <button class="float-right">
                                    <strong><i class="fa fa-backward"></i> @lang('cart.addMore')</strong>
                                </button>
                            </a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </section>
    </main>
@endsection
