@extends('front.helpers.master')
@section('content')
    <section id="product-details">
        <div class="container">
            <div class="row">
                <div class="quick-access">
                    <ul>
                        <li><a href="{{url('/')}}"><i class="fa fa-home"> </i> Home <i class="fa fa-caret-right"></i></a></li>
                        <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"> </i> Shop <i class="fa fa-caret-right"></i></a></li>
                        <li><a ><i class="fa fa-info-circle"> </i> {{$product->product_name}}</a></li>
                    </ul>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="product">
                        <div class="row">
                            <div class="col-md-6 col-xs-12 gallery">
                                <div class="thumbnail">
                                    <!--Carousel Wrapper-->
                                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                                        <!--Slides-->
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($images as $image)
                                                @php($count++)
                                                <div class="carousel-item {{$count == 1?"active": ""}}">
                                                    <img src="{{url('images', $image->gallery)}}" class="card-img h-50">
                                                </div>
                                            @endforeach
                                        </div>
                                        <!--/.Slides-->
                                        <!--Controls-->
                                        <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        <ol class="carousel-indicators">

                                            @foreach($images as $i => $one)
                                                <li data-target="#carousel-thumb" data-slide-to={{$i}} class={{$i == 0?"active": ""}}>
                                                    <img src="{{url('images', $one->gallery)}}">
                                                </li>
                                            @endforeach
                                        </ol>
                                        <!--/.Controls-->
                                    </div>
                                    <!--/.Carousel Wrapper-->
                                </div>
                            </div>
                            <div class="col-md-5 col-md-offset-1">
                                <div class="product-details">
                                    <div class="product-title">
                                        <div class="d-flex justify-content-between">
                                            <h2>{{ucwords($product->product_name)}}</h2>
                                            @if($product->new_arrival)<img src="{{URL::asset('dist/images/home/new.png')}}" alt="..."  style="width:60px">@endif
                                        </div>
                                        <div class="general-rated">
                                            @if($rated)
                                                @for($i=1;$i<=$rated;$i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                                <b>({{$rated}}/5)</b>
                                            @endif
                                        </div>
                                        <hr>
                                        <br>
                                        <p><strong class="text-dark">Description: </strong><br> {{$product->product_info}}</p>
                                        <hr>
                                        <br>
                                        <div class="">
                                            <strong class="text-dark">Price</strong>
                                            <div class="d-flex justify-content-between">
                                                @if(!$product->product_price)
                                                    <p class="card-text text-success"><strong>FREE</strong></p>
                                                @elseif(($product->sold_price))
                                                    <p class="" style="text-decoration:line-through; color:#333">{{$product->product_price}} EUR</p>
                                                    <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
                                                    <p class="">{{$product->sold_price}} EUR</p>
                                                @else
                                                    <p class="">{{$product->product_price}} EUR</p>
                                                @endif
                                            </div>
                                        </div>
                                        @foreach($productProp as $one)
                                            <p><strong class="text-dark">Mark</strong> <b class="text-success"></b>{{$one->mark}}</p>
                                            <p><strong class="text-dark">Color</strong> <b class="text-success"></b>{{$one->color}}</p>
                                            <p><strong class="text-dark">Size</strong> <b class="text-success"></b>{{$one->size}}</p>
                                        @endforeach
                                        <p><strong class="text-dark">Available</strong> <b class="text-success">{{$product->stock}}</b> In Stock</p>
                                        <p><strong class="text-dark">Shopping Cost</strong> <b class="text-success">{{!$product->shopping_cost || $product->shopping_cost == 0?"Free":$product->shopping_cost}}</b></p>
                                        <hr>
                                        <br>
                                        <div class="controls">
                                            <a href="{{url('/shop')}}" class="text-dark">
                                                <button>
                                                    <b><i class="fa fa-backward"></i> Back to Shop</b>
                                                </button>
                                            </a>
                                            <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark">
                                                <button class="float-right">
                                                    <b>Add to Cart<i class="fa fa-shopping-cart"></i></b>
                                                </button>
                                            </a>
                                        </div>
                                        <hr>
                                        <br>
                                        @if(Auth::check() && (Auth::user()->id == $userId))
                                            <h3>
                                                <a href="{{url('/wishlist')}}">
                                                    <i class="fa fa-check-circle"></i> Added to Wish list
                                                </a>
                                            </h3>
                                        @else
                                            {!! Form::open(['route' => 'addToWishList', 'method' => 'post']) !!}
                                            <input type="hidden" value="{{$product->id}}" name="product_id"/>
                                            <button type="submit">
                                                <i class="fa fa-plus-circle"></i>Add to Wishlist
                                            </button>
                                            {!! Form::close() !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </section>
    <hr>
    <section id="reviews">
        <div class="container d-flex justify-content-between flex-wrap">
            <div class="new col-sm-12 col-md-5 col-lg-3">
                @if(session('msg'))
                    <div class="alert alert-success">{{session('msg')}}</div>
                @endif
                @guest
                    <h5>Hello Stranger,</h5>
                    <strong> Help others know about this product</strong>
                    <hr>
                    {!! Form::open(['route' => 'addReview', 'method' => 'post']) !!}
                    <input type="hidden" name="product_id" value={{$product->id}}>
                    <div class="form-group">
                        {{ Form::label('client_name', 'Name *') }}
                        {{ Form::text('client_name', null, array('class' => 'form-control', 'required')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('client_email', 'Email') }}
                        {{ Form::text('client_email', null, array('class' => 'form-control')) }}
                    </div>
                    <div class="form-group rating">
                        <label for="rating">Rating</label>
                        <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                        <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                        <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                        <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                        <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                    </div>
                    <div class="form-group">
                        {{ Form::label('review_content', 'Write something *') }}
                        {{ Form::textarea('review_content', null, array('class' => 'form-control', 'required')) }}
                    </div>
                    {{ Form::submit('Post', array('class' => 'post')) }}
                    <br>
                    {!! Form::close() !!}
                @else
                    <h5>Hello {{Auth::user()->name}}, </h5>
                    <strong> Help others know about this product</strong>
                    <hr>
                    {!! Form::open(['route' => 'addReview', 'method' => 'post']) !!}
                        <input type="hidden" name="product_id" value={{$product->id}}>
                        <div class="form-group rating">
                            <label for="rating">Rating </label>
                            <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                            <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                            <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                            <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                            <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                        </div>
                        <div class="form-group">
                            {{ Form::label('review_content', 'Write something *') }}
                            {{ Form::textarea('review_content', null, array('class' => 'form-control', 'required')) }}
                        </div>
                            {{ Form::submit('Post', array('class' => 'post')) }}
                        <br>
                    {!! Form::close() !!}
                @endguest
            </div>
            <div class="reviews col-sm-12 col-md-6 col-lg-8">
                <h5>All reviews</h5>
                <hr>
                @if(!$reviews->isEmpty())
                    @foreach($reviews as $one)
                        <div class="review">
                            <div class="head">
                                <div class="d-flex align-items-center">
                                    <?php
                                        $images = DB::table('users')->where('id', '=', $one->user_id)->get();
                                    ?>
                                        @foreach($images as $image)
                                            @if($image->image)
                                                <img class="card-img-top img-fluid" src="{{url('images',$image->image)}}" alt="Card image cap">
                                            @else
                                                <i class="fa fa-user"></i>
                                            @endif
                                        @endforeach
                                    @if(!$one->user_id)
                                            <i class="fa fa-user"></i>
                                    @endif
                                    <div>
                                        <strong>{{(Auth::check()&&(Auth::user()->name==$one->client_name))?"You":$one->client_name}}</strong>
                                        <br>
                                        <small>{{$one->created_at}}</small>
                                    </div>
                                    <small class="rated">
                                        @if($one->rating)
                                            @for($i=1;$i<=$one->rating;$i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            <b>({{$one->rating}}/5)</b>
                                        @endif
                                    </small>
                                </div>
                            </div>
                            <br>
                            <b class="content">{{$one->review_content}}</b>
                        </div>
                        <hr>
                    @endforeach
                @else
                    <div class="review">
                        <div class="text-danger">
                            No reviews on this product
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <br>
    <section id="recommends">
        <div class="container">

        </div>
    </section>
@endsection
