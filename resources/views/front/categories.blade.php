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
        <section>
            <div class="album text-muted">
                <div class="container">
                   @if(isset($msg))
                        <div class="empty">
                            <h3 class="text-success">{{$msg}}</h3>
                            <a href="{{url('/category/list/'.$categoryName)}}" class="text-dark">
                                <button>
                                    <i class="fa fa-backward"></i>
                                    <strong>@lang('commun.justBack')</strong>
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
                                        @if($product->new_arrival)<img src="{{asset('dist/images/shop/new.png')}}" style="width: 50px" alt="photo">@endif
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
                                            <strong>({{$rated}}/5)</strong>
                                        @endif
                                    </div>
                                    @if(($product->sold_price && ($product->sold_price < $product->product_price)))
                                        <div class="d-flex justify-content-between">
                                            <p class="" style="text-decoration:line-through; color:#333">{{$product->product_price}} EUR</p>
                                            <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="photo"  style="width:60px">
                                            <p class="">{{$product->sold_price}} EUR</p>
                                        </div>
                                    @else
                                        <p class="">{{$product->product_price}} EUR</p>
                                    @endif
                                    <a href="{{url('/product_details').'/'.$product->id}}" class="text-dark">
                                        <button >
                                            <strong><i class="fa fa-eye"></i></strong>
                                        </button>
                                    </a>
                                    <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark">
                                        <button class=" float-right">
                                            <strong><i class="fa fa-shopping-cart"></i></strong>
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
