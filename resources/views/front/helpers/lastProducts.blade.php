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
            <div class="see-more">
                <a href="{{url('/shop')}}" class="last">
                    <button class="btn btn-outline-success">
                        See More
                        <i class="fa fa-forward"></i>
                        <i class="fa fa-backward"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>