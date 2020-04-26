@extends('front.helpers.master')
@section('content')
    <main role="main" id="shop">
        <section class="shop-bg">
            <div>
                <img src="{{URL::asset('dist/images/shop/bg-shop.jpg')}}" class="bg" alt="First slide">
                <div class="container">
                    @foreach($ads as $ad)
                        <div class="text-center ad">
                           <div>
                               <div>
                                   <img src="{{url('images', $ad->image)}}" style="width: 50px" alt="">
                                   <h1>{{$ad->title}}</h1>
                               </div>
                               <div class="content">
                                   <strong class="text-warning">This is an ad</strong>
                                   <p>{{$ad->description}}</p>
                               </div>
                           </div>
                            <a class="btn btn-outline-info" href={{$ad->link}} role="button">Learn more ...</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <hr>
        <br>
        @include('front.helpers.topProducts')
        <section class="productsSearch container">
            <div class="advanced-search">
                <h3 class="text-center">Advanced Search: </h3>
                <hr>
                <br>
                <div class="container">
                    <h6>Search for products with the desire name ...</h6>
                    <hr>
                    <div class="search">
                        <div class="search-input">
                            <form action='{{('/search')}}' class="form-inline ml-auto" method="post">
                                <div class="d-flex justify-content-between align-items-center">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control mr-2" placeholder="Search">
                                    <label for="search">
                                        <input type="text" name="search" class="form-control mr-2" placeholder="Search">
                                    </label>
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                        <br>
                        <div class="search-specific">
                            <h6>Search for product with category, price, sale ...</h6>
                            <hr>
                            <div class="search-area">
                                {!! Form::open(['url' => '/advancedSearch']) !!}
                                <div class="form-group">
                                    <label for="category">Category <br>
                                        <select name="category" class="browser-default custom-select" id="category">
                                            <option></option>
                                            @if(isset($categories))
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->name}}">{{ucwords($cat->name)}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="maxPrice">Great Price
                                        <input type="number" class="form-control" id="greater-than" name="maxPrice" placeholder="Max Price">
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="onSold">Products on sold
                                        <input type="checkbox" class="form-control" id="greater-than" name="onSold">
                                        YES
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-outline-success">Submit</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="album text-muted products">
                <div class="container">
                    <h3 class="text-center">
                        @if(isset($msg))
                            {{$msg}}
                        @else
                            Featured Items
                        @endif
                    </h3>
                    <hr>
                    <br>
                    <div class="row d-flex justify-content-around">
                        @forelse($products as $product)
                            <div class="card">
                                <a href="{{url('/product_details')}}/{{$product->id}}">
                                    <img src="{{url('images',$product->image)}}" class="card-img w-100 h-100">
                                </a>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-text iphone">{{$product->product_name}}</h3>
                                        @if($product->new_arrival)<img src="{{asset('dist/images/home/new.png')}}" style="width: 50px">@endif
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
                                            @for($i=0;$i<$rated;$i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            <b>({{$rated}}/5)</b>
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center">
                                        @if(!$product->product_price)
                                                <p class="card-text text-success"><strong>FREE</strong></p>
                                        @elseif(($product->sold_price))
                                                <p class="" style="text-decoration:line-through; color:#333">{{$product->product_price}} $</p>
                                                <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
                                                <p class="">{{$product->sold_price}} $</p>
                                        @else
                                                <p class="">{{$product->product_price}} $</p>
                                        @endif
                                    </div>
                                    <a href="{{url('/product_details').'/'.$product->id}}" class="text-dark">
                                        <button class="btn btn-outline-dark btn-sm">
                                            <b>View <i class="fa fa-eye"></i></b>
                                        </button>
                                    </a>
                                    <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark">
                                        <button class="btn btn-outline-success btn-sm float-right">
                                            <b>Add <i class="fa fa-shopping-cart"></i></b>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div>
                                <h3 class="text-danger">Sorry, No Products ...</h3>
                                <a href="{{url('/shop')}}" class="text-dark">
                                    <button class="btn btn-outline-danger btn-sm float-right">
                                        <b><i class="fa fa-toggle-left"></i> Back to Shop</b>
                                    </button>
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
