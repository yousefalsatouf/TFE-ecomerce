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
                    <div id="app" class="payment">
                        <h2 class="text-uppercase">@lang('cart.order')</h2>
                        <hr>
                        <Paypal amount="{{$amount}}" price="{{$price}}" tax="{{$tax}}" v-bind:cartitems="{{json_encode($cartItems)}}"  />
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
