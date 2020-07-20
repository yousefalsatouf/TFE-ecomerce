<section class="last-products">
    <div class="container">
        <h2>Some of last products ...</h2>
        <br>
        <div class="articles">
            @foreach($products as $product)
                <div class="card">
                    <a href="{{url('/product_details')}}/{{$product->id}}">
                        <img src="{{url('images',$product->image)}}" class="images card-img w-100 h-100">
                    </a>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-text iphone">{{$product->product_name}}</h6>
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
                                @for($i=1;$i<=$rated;$i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                                <b>({{$rated}}/5)</b>
                            @endif
                        </div>
                        <hr>
                        @if($product->product_price == 0)
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="card-text text-success"><strong>FREE</strong></p>
                            </div>
                        @elseif(($product->sold_price != null))
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="" style="text-decoration:line-through; color:#333">{{$product->product_price}} $</p>
                                <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
                                <p class="">{{$product->sold_price}} $</p>
                            </div>
                        @else
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="">{{$product->product_price}} $</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="see-more">
                <a href="{{url('/shop')}}" class="last">
                    <button>
                        See More
                        <i class="fa fa-forward"></i>
                        <i class="fa fa-backward"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>
