@extends('front.helpers.master')
@section('content')
    <section id="product-details">
        <div class="container">
            <div class="row">
                <div class="quick-access">
                    <ul>
                        <li><a href="{{url('/')}}"><i class="fa fa-home"> </i>@lang('productDetail.homeMenu') <i class="fa fa-caret-right"></i></a></li>
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
                                                    <img src="{{url('images', $image->gallery)}}" class="card-img h-50" alt="photo">
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
                                        <div class="d-flex justify-content-between">
                                            <h2>{{ucwords($product->product_name)}}</h2>
                                            @if($product->new_arrival)<img src="{{URL::asset('dist/images/shop/new.png')}}" alt="photo"  style="width:60px">@endif
                                        </div>
                                        <div class="general-rated">
                                            @if($rated)
                                                @for($i=1;$i<=$rated;$i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                                <strong>({{$rated}}/5)</strong>
                                            @endif
                                        </div>
                                        <hr>
                                        <br>
                                        <p><strong class="text-dark">Description: </strong><br> {{$product->product_info}}</p>
                                        <hr>
                                        <br>
                                        <div class="">
                                            <strong class="text-dark">@lang('commun.price')</strong>
                                            <div class="d-flex justify-content-between">
                                                @if(!$product->product_price)
                                                    <p class="card-text text-success"><strong>@lang('commun.free')</strong></p>
                                                @elseif(($product->sold_price))
                                                    <p class="" style="text-decoration:line-through; color:#333">{{$product->product_price}} EUR</p>
                                                    <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="photo"  style="width:60px">
                                                    <p class="">{{$product->sold_price}} EUR</p>
                                                @else
                                                    <p class="">{{$product->product_price}} EUR</p>
                                                @endif
                                            </div>
                                        </div>
                                        @foreach($productProp as $one)
                                            <p><strong class="text-dark">Mark</strong> <b class="text-success"></b>{{$one->mark}}</p>
                                            <p><strong class="text-dark">@lang('productDetail.color')</strong> <b class="text-success"></b>{{$one->color}}</p>
                                            <p><strong class="text-dark">@lang('productDetail.size')</strong> <b class="text-success"></b>{{$one->size}}</p>
                                        @endforeach
                                        <p><strong class="text-dark">@lang('productDetail.ava')</strong> <b class="text-success">{{$product->stock}}</b> @lang('productDetail.inStock')</p>
                                        <p><strong class="text-dark"></strong>@lang('productDetail.cost')<b class="text-success">{{!$product->shopping_cost || $product->shopping_cost == 0?"0":$product->shopping_cost}} EUR</b></p>
                                        <hr>
                                        <br>
                                        <div class="controls">
                                            <a href="{{url('/shop')}}" class="text-dark">
                                                <button>
                                                    <strong><i class="fa fa-backward"></i> @lang('commun.back')</strong>
                                                </button>
                                            </a>
                                            <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark">
                                                <button class="float-right">
                                                    <strong>@lang('commun.addToCart')<i class="fa fa-shopping-cart"></i></strong>
                                                </button>
                                            </a>
                                        </div>
                                        <hr>
                                        <br>
                                        @if(Auth::check() && (Auth::user()->id == $userId))
                                            <h3>
                                                <a href="{{url('/wishlist')}}">
                                                    <i class="fa fa-check-circle"></i> @lang('productDetail.addedWish')
                                                </a>
                                            </h3>
                                        @else
                                            {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
                                            <input type="hidden" value="{{$product->id}}" name="product_id"/>
                                            <button type="submit">
                                                <i class="fa fa-plus-circle"></i> @lang('productDetail.addToWish')
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
    <hr>
    @include('front.helpers.review')
    <section id="recommends">
        <div class="container">
        </div>
    </section>
@endsection
