@extends('front.helpers.master')
@section('content')
    <main  id="shop">
        <section class="shop-bg">
            <div class="bg-ad">
                <img src="{{URL::asset('dist/images/home/gymGirl.jpg')}}" class="bg" alt="First slide">
            </div>
            <div class="ad-container">
                @foreach($ads as $ad)
                    <div class="text-center ad">
                        <div>
                            <div>
                                <img src="{{url('images', $ad->image)}}" style="width: 50px" alt="photo">
                                <h1>{{$ad->title}}</h1>
                            </div>
                            <div class="content">
                                <strong class="text-warning">@lang('shop.adTitle')</strong>
                                <p>{{$ad->description}}</p>
                            </div>
                        </div>
                        <a class="link" href={{$ad->link}} role="button">@lang('shop.adBtn')</a>
                    </div>
                @endforeach
            </div>
        </section>
        <br>
        @include('front.helpers.topProducts')
        <br>
        @if(isset($products))
        <section class=" container">
            <div class="album text-muted products">
                <div class="container">
                    <h3 class="text-center">
                        @if(isset($msg))
                            {{$msg}}
                        @else
                            @lang('shop.result')
                        @endif
                    </h3>
                    <button class="float-right">
                        <a href="{{url('/shop')}}" class="text-dark">
                            <strong><i class="fa fa-toggle-left"></i> Back to Shop</strong>
                            </a>
                    </button>
                    <hr>
                    <br>
                    <div class="row d-flex justify-content-around">
                        @forelse($products as $product)
                        <div class="card">
                            <a href="{{url('/product_details')}}/{{$product->id}}">
                                <img src="{{url('images',$product->image)}}" class="card-img w-100 h-100" alt="photo">
                            </a>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-text iphone">{{$product->product_name}}</h6>
                                    @if($product->new_arrival)<img src="{{asset('dist/images/shop/new.png')}}" style="width: 50px" alt="photo">@endif
                                </div>
                                <div class="general-rated text-success">
                                    @php
                                        $ratingSum   = DB::table('reviews')->where('product_id', '=', $product->id)->whereNotNull('rating')->sum('rating');
                                        $ratingCount = DB::table('reviews')->where('product_id', '=', $product->id)->whereNotNull('rating')->pluck('rating')->count();
                                        if ($ratingSum == 0 || $ratingCount == 0)
                                            $rated = null;
                                        else
                                            $rated =  $ratingSum / $ratingCount;
                                    @endphp
                                    @if($rated)
                                        @for($i=0;$i<$rated;$i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                        <strong>({{$rated}}/5)</strong>
                                    @endif
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    @if(!$product->product_price)
                                        <p class="card-text text-success"><strong>FREE</strong></p>
                                    @elseif(($product->sold_price && ($product->sold_price < $product->product_price)))
                                        <p class="" style="text-decoration:line-through; color:#333">{{$product->product_price}} EUR</p>
                                        <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="photo" style="width:60px">
                                        <p class="">{{$product->sold_price}} EUR</p>
                                    @else
                                        <p class="">{{$product->product_price}} EUR</p>
                                    @endif
                                </div>
                                <br>
                                <div>
                                    <button>
                                        <a href="{{url('/product_details').'/'.$product->id}}" class="text-dark">
                                            <strong> <i class="fa fa-eye"></i></strong>
                                        </a>
                                    </button>
                                     <button class="float-right">
                                        <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark">
                                            <strong> <i class="fa fa-shopping-cart"></i></strong>
                                        </a>
                                     </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>
                            <h3 class="text-danger">Ooops!! ...</h3>
                                <button class="float-right">
                                    <a href="{{url('/shop')}}" class="text-dark">
                                        <strong><i class="fa fa-toggle-left"></i> Back to Shop</strong>
                                    </a>
                                </button>
                        </div>
                </div>
                @endforelse
            </div>
        </div>
         </div>
        </section>
        @else
        <section id="app">
            <shop url="{{ url('/') }}" />
        </section>
        @endif
    </main>
@endsection
