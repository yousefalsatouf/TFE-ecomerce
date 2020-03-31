@extends('front.helpers.master')
@section('content')
    <script>
        $(document).ready(function(){
            $('#size').change(function(){
                var size = $('#size').val();
                var proDum = $('#proDum').val();
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url('/selectSize');?>',
                    data: "size=" + size + "& proDum=" + proDum,
                    success: function (response) {
                        console.log(response);
                        $('#price').html(response);
                    }
                });

            });
        });
    </script>
    <br>
    <div class="container align-vertical hero">
        <div class="row">
            <div class="col-md-5 text-left">
            </div>
        </div><!--end of row-->
    </div><!--end of container-->
    <section id="index-amazon">
        <div class="amazon">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="thumbnail">
                                        <img src="{{url('images', $product->image)}}" class="card-img">
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="product-details">
                                        <div class="product-title">
                                            <h2>{{ucwords($product->product_name)}}</h2>
                                            <hr>
                                            <br>
                                            <h5><b>Description: </b>{{$product->product_info}}</h5>
                                            <hr>
                                            <br>
                                            <form action="{{url('/cart/addItem/'.$product->id)}}">
                                                @if($product->sale_price == 0)
                                                    <span id="price">
                                                        <b>Price: </b>{{$product->product_price}} $
                                                    </span>
                                                    <input type="hidden" value="{{$product->product_price}}" name="newPrice"/>
                                                @else
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <input type="hidden" value="{{$product->sale_price}}" name="newPrice"/>
                                                        <p class="" style="text-decoration:line-through; color:#333"><b>Sale Price</b>{{$product->sale_price}} $</p>
                                                         <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
                                                         <p class=""><b>Price: </b>{{$product->product_price}}$</p>
                                                    </div>
                                                @endif
                                                <p><b>Available: </b>{{$product->stock}} In Stock</p>
                                            </form>
                                            <hr>
                                            <br>
                                            <a href="{{url('/shop')}}" class="text-dark">
                                                <button class="btn btn-primary">
                                                    <b><i class="fa fa-backward"></i> Shop</b>
                                                </button>
                                            </a>
                                            <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark">
                                                <button class="btn btn-primary float-right">
                                                    <b>Add <i class="fa fa-shopping-cart"></i></b>
                                                </button>
                                            </a>
                                            <hr>
                                            <br>
                                            <?php
                                            $wishData = DB::table('wishlist')->rightJoin('products','wishlist.product_id', '=', 'products.id')->where('wishlist.product_id', '=', $product->id)->get();
                                            $count = App\wishlist::where(['product_id' => $product->id])->count();
                                            ?>
                                            @if($count=="0")
                                            {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
                                                <input type="hidden" value="{{$product->id}}" name="product_id"/>
                                                <input type="submit" value="Add to Wishlist" class="btn btn-primary"/>
                                            {!! Form::close() !!}
                                            @else
                                                <h3 style="color:green">Already Added to Wishlist <a href="{{url('/wishlist')}}">wishlist</a></h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="category-tab shop-details-tab"><!--category-tab-->
                                    <div class="col-sm-12">
                                        <ul class="nav nav-tabs">
                                            <li><a href="#details" data-toggle="tab">Details</a></li>
                                            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                                            <li><a href="#tag" data-toggle="tab">Tag</a></li>
                                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews ({{count($reviews)}})</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade" id="details" >
                                            {{$product->product_info}}
                                        </div>
                                        <div class="tab-pane fade" id="companyprofile" >
                                        </div>
                                        <div class="tab-pane fade active in" id="reviews" >
                                            <div class="col-sm-12">
                                                @foreach($reviews as $review)
                                                    <ul>
                                                        <li><a href=""><i class="fa fa-user"></i>{{$review->client_name}}</a></li>
                                                        <li><a href=""><i class="fa fa-user"></i>{{$review->rating}}</a></li>
                                                        <li><a href=""><i class="fa fa-clock-o"></i>{{date('H: i', strtotime($review->created_at))}}</a></li>
                                                        <li><a href=""><i class="fa fa-calendar-o"></i>{{date('F j, Y', strtotime($review->created_at))}}</a></li>
                                                    </ul>
                                                    <p>{{$review->review_content}}</p>
                                                @endforeach
                                                <p><b>Write Your Review</b></p>
                                                <form action="{{url('/addReview'.$product->id)}}" method="post">
                                                    {{ csrf_field() }}
                                                    <span>
                                                      <label for="clientName">Name:
                                                          <input type="text" name="clientName" placeholder="Your Name"/>
                                                      </label>
                                                      <label for="clientEmail">Email:
                                                          <input type="email" name="clientEmail" placeholder="Email Address"/>
                                                      </label>
                                                    </span>
                                                    <label for="reviewContent">What Would you like to say?
                                                        <textarea name="reviewContent" ></textarea>
                                                    </label>
                                                    <label for="rating">Rating:
                                                        <input type="checkbox" name="rating" value="1">Bad <br>
                                                        <input type="checkbox" name="rating" value="3">Good <br>
                                                        <input type="checkbox" name="rating" value="5">Excellent
                                                    </label>
                                                    <button type="submit" class="btn btn-default pull-right">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--/category-tab-->
                                <!-- End of Review -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>
        </div>
    </section>
    <div class="no-padding-top section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="load-more"><i class="fa fa-ellipsis-h"></i></a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>
        @include('front.recommends')
    </div>
@endsection
