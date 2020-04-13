@extends('front.helpers.master')
@section('content')
    <main role="main" id="shop">
        <section class="shop-bg">
            <div>
                <img src="{{URL::asset('dist/img/watch.jpg')}}" alt="First slide">
                <div class="container">
                    <div class="text-center">
                        <h1>watch is one of our products</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <a class="btn btn-lg btn-light" href="{{url('/register')}}" role="button">Sing up now</a>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <br>
        <section class="last-products-carousel">
        </section>
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
                                <h3 class="text-danger">Sorry, No Products Match Your Search ...</h3>
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
