@extends('front.helpers.master')
@section('content')
    <main role="main" id="home">
        @include('front/helpers/slider')
        <section id="categories">
            <div class="container">
                <h2>Last Products in our store?</h2>
                    <div class="articles">
                        @foreach($products as $product)
                            <div class="card col-lg-2">
                                <a href="{{url('/product_details')}}/{{$product->id}}">
                                    <img src="{{url('images',$product->image)}}" class="images card-img w-100 h-100">
                                </a>
                                <div class="card-body">
                                    <h3 class="card-text iphone">{{$product->product_name}}</h3>
                                    @if($product->product_price == 0)
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text text-success"><strong>FREE</strong></p>
                                        </div>
                                    @elseif(($product->sale_price != null))
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="" style="text-decoration:line-through; color:#333">{{$product->product_price}} $</p>
                                            <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
                                            <p class="">{{$product->sale_price}} $</p>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="">{{$product->product_price}} $</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                            <div>
                                <a href="{{url('/shop')}}" class="last">
                                    See More
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                    </div>
            </div>
        </section>
        <hr>
        <br>
        <section class="quick-access">
            <div class="container">
                <div class="col-lg-4">
                    <div>
                        <i class="fa fa-truck"></i>
                    </div>
                    <div>
                        <h2>Delivery</h2>
                        <p>
                            As a precaution and to protect everyone's health, our stores will remain closed until further notice. Do you want to make a purchase? We remain available 24/7 on mediamarkt.be. Your orders will be delivered to your home, safely and free of charge.
                        </p>
                    </div>
                    <div>
                        <a href=""><b class="fa fa-toggle-right btn btn-outline-success"></b></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <i class="fa fa-mobile-phone"></i>
                    </div>
                    <div>
                        <h2>Contact</h2>
                        <p>
                            anything on your mind, any questions, you need answers about our services, or maybe you need to report
                            a problem, please contact us and let's talk.
                        </p>
                    </div>
                    <div>
                        <a href="{{url('/contact')}}"><b class="fa fa-toggle-right  btn btn-outline-success"></b></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <div>
                        <h2>About Us</h2>
                        <p>
                            The short story about us, about our services during all the 10 years of existing and serving ou costumers .
                        </p>
                    </div>
                    <div>
                        <a href="{{url('/about')}}"><b class="fa fa-toggle-right btn btn-outline-success"></b></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
