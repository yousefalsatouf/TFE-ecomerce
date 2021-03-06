<section class="top-products">
    <div class="container">
        <h3>@lang('shop.topTitle')</h3>
        <br>
        <div class="articles">
            @foreach($recommends as $product)
                <div class="card">
                    <a href="{{url('/product_details')}}/{{$product->id}}">
                        <img src="{{url('images',$product->image)}}" class="card-img w-100 h-100" alt="photo">
                    </a>
                    <a href="{{url('/cart/addItem').'/'.$product->id}}" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#38c172" class="bi bi-plus-circle-fill add-cart" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                    </a>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-text iphone">{{$product->product_name}}</h3>
                            @if($product->new_arrival)<img src="{{asset('dist/images/shop/new.png')}}" alt="photo" style="width: 50px">@endif
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
                                <strong>({{$rated}}/5)</strong>
                            @endif
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            @if(!$product->product_price)
                                <p class="card-text text-success"><strong>FREE</strong></p>
                            @elseif(($product->sold_price && ($product->sold_price < $product->product_price)))
                                <p class="" style="text-decoration:line-through; color:#333">{{$product->product_price}} EUR</p>
                                <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="photo"  style="width:60px">
                                <p class="">{{$product->sold_price}} EUR</p>
                            @else
                                <p class="">{{$product->product_price}} EUR</p>
                            @endif
                        </div>
                       <div class="d-flex justify-content-between">
                                <a href="{{url('/product_details').'/'.$product->id}}" class=" link">
                                    <strong> <i class="fa fa-eye"></i></strong>
                                </a>
                                <a href="{{url('/cart/addItem').'/'.$product->id}}" class=" link">
                                    <strong> <i class="fa fa-shopping-cart"></i></strong>
                                </a>
                       </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>