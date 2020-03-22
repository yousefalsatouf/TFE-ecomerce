@extends('front.helpers.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">
                            <?php if (isset($msg)) {
                                echo $msg;
                            } else { ?> WishList Item <?php } ?> </h2>

                        <?php if ($products->isEmpty()) { ?>
                            Wish list is empty !
                        <?php } else { ?>
                        @foreach($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div class="w-50">
                                                <a href="{{url('/product_details')}}">
                                                    <img src="{{url('images',$product->image)}}" class="w-100" alt="" />
                                                </a>
                                            </div>
                                            <h2><?php echo $product->product_price; ?>$</h2>
                                            <p><a href="{{url('/product_details')}}"><?php echo $product->product_name; ?></a></p>
                                            <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Move to cart</a>
                                        </div>
                                    </div>
                                    <a href="{{url('/removeFromWishlist').'/'.$product->id}}" style="color:red" class="btn btn-default btn-block"><i class="fa fa-minus-square"></i>Remove from wishlist</a></li>
                                </div>
                            </div>
                        @endforeach
                        <?php } ?>
                    </div>
                    <ul class="pagination">
                        {{ $products}}
                    </ul>
                </div><!--features_items-->
            </div>
        </div>
    </section>
@endsection
