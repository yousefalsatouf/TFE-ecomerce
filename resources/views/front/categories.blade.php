@extends('front.helpers.master')
@section('content')
    <main role="main">
        <section id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for ($i = 0; $i < sizeof($products); $i++)
                    <li data-target="#myCarousel" data-slide-to={{$i}}></li>
                @endfor
                <li data-target="#myCarousel" data-slide-to="0"></li>
            </ol>
            <div class="carousel-inner h-50">
                @foreach($products as $product)
                    <div class="carousel-item active">
                        <img class="first-slide h-50" src="{{url('images',$product->image)}}" alt="First slide">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>{{$product->product_name}}</h1>
                                <p>{{$product->product_info}}</p>
                                <p><a class="btn btn-lg btn-primary" href="{{url('/register')}}" role="button">Sign up today</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <section>
            <div class="album text-muted">
                <div class="container">
                    <div class="row d-flex justify-content-around">
                        @forelse($products as $product)
                            <div class="card w-25">
                                <a href="{{url('/product_details')}}/{{$product->id}}">
                                    <img src="{{url('images',$product->image)}}" class="card-img w-100 h-100">
                                </a>
                                <div class="card-body">
                                    <h3 class="card-text iphone">{{$product->product_name}}</h3>
                                    @if($product->spl_price==0)
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text">${{$product->product_price}}</p>
                                            <p class="card-text text-success"><strong>FREE</strong></p>
                                        </div>
                                    @elseif(($product->product_price > $product->spl_price))
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="" style="text-decoration:line-through; color:#333">${{$product->product_price}}</p>
                                            <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
                                            <p class="">${{$product->spl_price}}</p>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="">${{$product->product_price}}</p>
                                        </div>
                                    @endif
                                    <a href="{{url('/product_details').'/'.$product->id}}" class="text-dark">
                                        <button class="btn btn-primary btn-sm">
                                            <b>View <i class="fa fa-eye"></i></b>
                                        </button>
                                    </a>
                                    <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark">
                                        <button class="btn btn-primary btn-sm float-right">
                                            <b>Add <i class="fa fa-shopping-cart"></i></b>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <h3>No Products for now ...</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        @include('front.recommends')
    </main>
@endsection
