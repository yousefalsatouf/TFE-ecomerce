@extends('front.helpers.master')
@section('content')
    <main role="main" id="single-category">
        <section class="bg-single-category">
            <div class="carousel-inner">
                @if(isset($category))
                    @foreach($category as $cat)
                        @php $categoryName = $cat->name @endphp
                        <div>
                            <img style="height: 45rem" src="{{url('images', $cat->image)}}" alt="slide">
                            <div class="container">
                                <div class="carousel-caption text-center">
                                    <h1>{{strtoupper($cat->name)}}</h1>
                                    <p>{{$cat->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <section class="info">
            <div class="container">
                <div class="text-center">
                    <h1>@lang('shop.advancedSearch')</h1>
                    <div class="search-area">
                        <form action='{{('/searchSingleCategory')}}' class="form-inline ml-auto" method="post">
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control mr-2" placeholder="Search">
                                <input type="hidden" name="categoryName" value="{{(isset($categoryName))? $categoryName: ''}}">
                                <label for="price">
                                    @lang('shop.price')
                                    <input type="number" name="price" class="form-control mr-2" placeholder="Great Price">
                                </label>
                                <label for="sold">
                                    Promo
                                    <input type="checkbox" name="sold" class="form-control mr-2" >
                                </label>
                                <button type="submit">@lang('header.justSearch')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="album text-muted">
                <div class="container">
                   @if(isset($msg))
                        <div class="empty">
                            <h3 class="text-success">{{$msg}}</h3>
                            <a href="{{url('/category/list/'.$categoryName)}}" class="text-dark">
                                <button>
                                    <i class="fa fa-backward"></i>
                                    <b>@lang('commun.justBack')</b>
                                </button>
                            </a>
                        </div>
                    @endif
                    <div class="row d-flex justify-content-around">
                        @forelse($products as $product)
                            <div class="card">
                                <a href="{{url('/product_details')}}/{{$product->id}}">
                                    <img src="{{url('images',$product->image)}}" class="card-img w-100 h-100" alt="photo">
                                </a>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="card-text iphone">{{$product->product_name}}</h5>
                                        @if($product->new_arrival)<img src="{{asset('dist/images/home/new.png')}}" style="width: 50px" alt="photo">@endif
                                    </div>
                                    <div class="general-rated text-success">
                                        @php
                                            $ratingSum = DB::table('reviews')->where('product_id', '=', $product->id)->whereNotNull('rating')->sum('rating');
                                            $ratingCount = DB::table('reviews')->where('product_id', '=', $product->id)->whereNotNull('rating')->pluck('rating')->count();
                                            if ($ratingSum == 0 || $ratingCount == 0)
                                                $rated = null;
                                            else
                                                $rated =  $ratingSum / $ratingCount;
                                        @endphp
                                        @if($rated)
                                            @for($i=1;$i<=$rated;$i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            <b>({{$rated}}/5)</b>
                                        @endif
                                    </div>
                                    @if(!$product->product_price)
                                        <p class="card-text text-success"><strong>FREE</strong></p>
                                    @elseif(($product->sold_price && ($product->sold_price < $product->product_price)))
                                        <p class="" style="text-decoration:line-through; color:#333">{{$product->product_price}} EUR</p>
                                        <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="photo"  style="width:60px">
                                        <p class="">{{$product->sold_price}} EUR</p>
                                    @else
                                        <p class="">{{$product->product_price}} EUR</p>
                                    @endif
                                    <a href="{{url('/product_details').'/'.$product->id}}" class="text-dark">
                                        <button >
                                            <b><i class="fa fa-eye"></i></b>
                                        </button>
                                    </a>
                                    <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark">
                                        <button class=" float-right">
                                            <b><i class="fa fa-shopping-cart"></i></b>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="empty">
                                <h3 class="text-danger">@lang('category.noProd')</h3>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
