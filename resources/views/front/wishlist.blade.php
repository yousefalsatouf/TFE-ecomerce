@extends('front.helpers.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h1 class="text-success">Wishlist Items: </h1>
                        <br>
                        <hr>
                        @if (isset($removed))
                            <h2 class="title text-center">{{$removed}}</h2>
                        @endif

                        @if($products->isEmpty())
                            <h2 class="text-danger">Wish list is empty !</h2>
                        @else
                           <div class="d-flex flex-wrap">
                               @foreach($products as $product)
                                   <div class="col-sm-6">
                                       <div class="product-image-wrapper">
                                           <div class="single-products">
                                               <div class="productinfo text-center">
                                                   <div class="w-50">
                                                       <a href="{{url('/product_details')}}">
                                                           <img src="{{url('images',$product->image)}}" class="w-100" alt="" />
                                                       </a>
                                                       <h2>{{ $product->product_price }}$</h2>
                                                       <p>{{ $product->product_name }}</p>
                                                       <a href="{{url('/cart/addItem'). '/' .$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Move to cart</a>
                                                       <a href="{{url('/removeFromWishlist').'/'.$product->id}}" style="color:red" class="btn btn-default btn-block"><i class="fa fa-minus-square"></i>Remove from wishlist</a>
                                                   </div>
                                               </div>
                                               <hr>
                                           </div>
                                       </div>
                                   </div>
                               @endforeach
                           </div>
                        @endif
                        <br>
                        <hr>
                        <div>
                            <a class="btn btn-primary" href="{{url('/shop')}}"><i class="fa fa-backward"></i> Back to Shop</a>
                        </div>
                    </div>
                </div><!--features_items-->
            </div>
        </div>
    </section>
@endsection
