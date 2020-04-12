@extends('front.helpers.master')
@section('content')
    <section id="wishlist">
        <div class="container">
            <div class="row">
                <div class="quick-access">
                    <ul>
                        <li><a href="{{url('/')}}"><i class="fa fa-home"> </i> Home <i class="fa fa-caret-right"></i></a></li>
                        <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"> </i> Shop <i class="fa fa-caret-right"></i></a></li>
                        <li><a ><i class="fa fa-info-circle"> </i> Wish List</a></li>
                    </ul>
                </div>
                <hr>
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
                                               <div class="text-center">
                                                   <div class="text-center">
                                                       <a href="{{url('/product_details/'.$product->id)}}">
                                                           <img src="{{url('images',$product->image)}}" class="w-100" alt="" />
                                                       </a>
                                                       <h2>{{ $product->product_name }}</h2>
                                                       <p><b>{{ $product->product_price }} $</b></p>
                                                       <div class="control d-flex justify-content-between">
                                                           <a href="{{url('/cart/addItem'). '/' .$product->id}}" class="btn btn-success">
                                                               <i class="fa fa-shopping-cart"></i> Move to cart
                                                           </a>
                                                           <a href="{{url('/removeFromWishlist').'/'.$product->id}}" class="btn btn-danger">
                                                               <i class="fa fa-minus-square"></i> Remove from wishlist
                                                           </a>
                                                       </div>
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
                            <a class="btn btn-outline-dark" href="{{url('/shop')}}"><i class="fa fa-backward"></i> Back to Shop</a>
                        </div>
                    </div>
                </div><!--features_items-->
            </div>
        </div>
    </section>
@endsection
