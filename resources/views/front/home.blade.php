@extends('front.helpers.master')
@section('content')
    <main role="main">
        @include('front/helpers/slider')
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
                                    @if($product->product_price == 0)
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text text-success"><strong>FREE</strong></p>
                                        </div>
                                    @elseif(($product->sale_price != null))
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="" style="text-decoration:line-through; color:#333">{{$product->product_price}} $</p>
                                            <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
                                            <p class="">${{$product->sale_price}}</p>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="">{{$product->product_price}} $</p>
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
