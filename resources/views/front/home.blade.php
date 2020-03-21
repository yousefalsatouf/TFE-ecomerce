@extends('front.helpers.master')
@section('content')
    <main role="main">
        <section id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner h-50">
                <div class="carousel-item active">
                    <img class="first-slide h-50" src="{{URL::asset('dist/img/create-section1.jpg')}}" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Example headline.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide h-50" src="{{URL::asset('dist/img/explore-section1.jpg')}}" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-50">
                    <img class="third-slide" src="{{URL::asset('dist/img/rollsroysemain.jpg')}}" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-right">
                            <h1>One more for good measure.</h1>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </section>
        <section>
            <div class="album text-muted">
                <div class="container">
                    <div class="row">
                        <?php  $cats = DB::table('products')->get(); ?>
                        @forelse($cats as $product)
                            <div class="card" style="width:30rem height: 20rem">
                                <img src="{{url('images',$product->image)}}" class="card-img-top">
                                <div class="card-body">
                                    <div class="pricetext">
                                        <del>${{$product->product_price}}</del>
                                        <span class="price text-muted float-right">${{$product->spl_price}}</span>
                                    </div>
                                    <button class="btn btn-primary btn-sm">
                                        <a href="{{url('/product_details').'/'.$product->id}}" class="text-dark"><b>View <i class="fa fa-eye"></i></b></a>
                                    </button>
                                    <button class="btn btn-primary btn-sm float-right">
                                        <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark"><b>Add <i class="fa fa-shopping-cart"></i></b></a>
                                    </button>
                                </div>
                            </div>
                        @empty
                            <h3>No Products for now ...</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
