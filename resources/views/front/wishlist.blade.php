@extends('front.helpers.master')
@section('content')
    <section id="wishlist">
        <div class="container">
            <div class="row">
                <div class="quick-access">
                    <ul>
                        <li><a href="{{url('/')}}"><i class="fa fa-home"> </i> <i class="fa fa-caret-right"></i></a></li>
                        <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"> </i> Shop <i class="fa fa-caret-right"></i></a></li>
                        <li><a ><i class="fa fa-info-circle"> </i> Wish List</a></li>
                    </ul>
                </div>
                <hr>
                <div class="col-sm-9 padding-right">
                    <br>
                    <div class="features_items"><!--features_items-->
                        <h2>Wishlist: </h2>
                        <br>
                        <hr>
                        @if (isset($removed))
                            <h2 class="title text-center">{{$removed}}</h2>
                        @endif

                        @if($products->isEmpty())
                            <h2 class="text-danger">@lang('cart.wishListEmpty')</h2>
                        @else
                           <div class="d-flex flex-wrap products">
                               @foreach($products as $product)
                                   <div class="col-sm-6 product">
                                       <div class="product-image-wrapper">
                                           <div class="single-products">
                                               <div class="text-center">
                                                   <div class="text-center">
                                                       <a href="{{url('/product_details/'.$product->id)}}">
                                                           <img src="{{url('images',$product->image)}}" class="w-100" alt="" />
                                                       </a>
                                                       <h5>{{ $product->product_name }}</h5>
                                                       <p><b>{{ $product->product_price }} EUR</b></p>
                                                       <div class="control d-flex justify-content-between">
                                                           <a href="{{url('/cart/addItem'). '/' .$product->id}}" class="link">
                                                               <i class="fa fa-shopping-cart"></i> @lang('cart.pass')
                                                           </a>
                                                           <a href="{{url('/removeFromWishlist').'/'.$product->id}}" class="link-danger">
                                                               <i class="fa fa-minus-square"></i> @lang('cart.remove')
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
                        <div>
                            <a class="link" href="{{url('/shop')}}"><i class="fa fa-backward"></i> @lang('commun.back')</a>
                        </div>
                    </div>
                    <br>
                </div><!--features_items-->
            </div>
        </div>
    </section>
@endsection
