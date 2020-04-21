@extends('front.helpers.master')
@section('content')
    <section id="product-details">
        <div class="container">
            <div class="row">
                <div class="quick-access">
                    <ul>
                        <li><a href="{{url('/')}}"><i class="fa fa-home"> </i> Home <i class="fa fa-caret-right"></i></a></li>
                        <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"> </i> Shop <i class="fa fa-caret-right"></i></a></li>
                        <li><a ><i class="fa fa-info-circle"> </i> {{$product->product_name}}</a></li>
                    </ul>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="product">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 gallery">
                                <div class="thumbnail">
                                    <!--Carousel Wrapper-->
                                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                                        <!--Slides-->
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($images as $image)
                                                @php($count++)
                                                <div class="carousel-item {{$count == 1?"active": ""}}">
                                                    <img src="{{url('images', $image->gallery)}}" class="card-img h-50">
                                                </div>
                                            @endforeach
                                        </div>
                                        <!--/.Slides-->
                                        <!--Controls-->
                                        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        <ol class="carousel-indicators">

                                            @foreach($images as $i => $one)
                                                <li data-target="#carousel-thumb" data-slide-to={{$i}} class={{$i == 0?"active": ""}}>
                                                    <img src="{{url('images', $one->gallery)}}">
                                                </li>
                                            @endforeach
                                        </ol>
                                        <!--/.Controls-->
                                    </div>
                                    <!--/.Carousel Wrapper-->
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="product-details">
                                    <div class="product-title">
                                        <h2 class="text-success">{{ucwords($product->product_name)}}</h2>
                                        <hr>
                                        <br>
                                        <h4>Description: </h4>
                                        <p>{{$product->product_info}}</p>
                                        <hr>
                                        <br>
                                        <form action="{{url('/cart/addItem/'.$product->id)}}">
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
                                            <p><b>Available: </b>{{$product->stock}} In Stock</p>
                                        </form>
                                        <hr>
                                        <br>
                                        <div class="controls">
                                            <a href="{{url('/shop')}}" class="text-dark">
                                                <button class="btn btn-outline-dark">
                                                    <b><i class="fa fa-backward"></i> Back to Shop</b>
                                                </button>
                                            </a>
                                            <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark">
                                                <button class="btn btn-outline-success float-right">
                                                    <b>Add to Cart<i class="fa fa-shopping-cart"></i></b>
                                                </button>
                                            </a>
                                        </div>
                                        <hr>
                                        <br>
                                        @if(Auth::check() && (Auth::user()->id == $userId))
                                            <h3>
                                                <a href="{{url('/wishlist')}}" class="text-success">
                                                    <i class="fa fa-check-circle"></i> Added to Wish list
                                                </a>
                                            </h3>
                                        @else
                                            {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
                                            <input type="hidden" value="{{$product->id}}" name="product_id"/>
                                            <button class="btn btn-outline-success" type="submit">
                                                <i class="fa fa-plus-circle"></i>Add to Wishlist
                                            </button>
                                            {!! Form::close() !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </section>
    <section id="reviews">
        <div class="container">

        </div>
    </section>
    <section id="recommends">
        <div class="container">

        </div>
    </section>
@endsection
