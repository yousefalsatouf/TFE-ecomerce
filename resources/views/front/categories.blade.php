@extends('front.helpers.master')
@section('content')
    <main role="main" id="single-category">
        <section class="bg-single-category">
            <div class="carousel-inner">
                @if(isset($category))
                    @foreach($category as $cat)
                        @php ($categoryName = $cat->name)
                        <div>
                            <input type="hidden">
                            <img class="first-slide" src="{{url('images/tv.jpg')}}" alt="slide">
                            <div class="container">
                                <div class="carousel-caption text-center">
                                    <h1>{{strtoupper($cat->name)}}</h1>
                                    <p>here is some static content will be replaced by other one</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        <section class="info">
            <div class="container">
                <div class="text-center">
                    <h1>Search for products ...</h1>
                    <div class="search-area">
                        <form action='{{('/searchSingleCategory')}}' class="form-inline ml-auto" method="post">
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control mr-2" placeholder="Search">
                                <input type="hidden" name="categoryName" value="{{(isset($categoryName))? $categoryName: ''}}">
                                <label for="price">
                                    Max Price:
                                    <input type="number" name="price" class="form-control mr-2" placeholder="Great Price" required>
                                </label>
                                <label for="sold">
                                    Products On Sold:
                                    <input type="checkbox" name="sold" class="form-control mr-2" required>
                                </label>
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="album text-muted">
                <div class="container">
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
                            <div class="empty">
                                <h3 class="text-danger">No Products for now ...</h3>
                                <a href="{{url('/category/list/'.$categoryName)}}" class="text-dark">
                                    <button class="btn bg-success btn-sm text-dark">
                                        <i class="fa fa-backward"></i>
                                        <b>Back</b>
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
