<section id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="first-slide" src="{{URL::asset('dist/images/home/nice.jpg')}}" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-center">
                    <h1>Every suit is created with love</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <a class="btn btn-lg btn-light" href="{{url('/shop')}}" role="button">See Products</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide h-100" src="{{URL::asset('dist/images/home/boss.jpg')}}" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Because you are the BOSS.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <a class="btn btn-lg btn-light" href="{{url('/cart')}}" role="button">GO To Cart</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slider" src="{{URL::asset('dist/images/home/suitangila.jpg')}}" alt="Third slide">
            <div class="container">
                <div class="carousel-caption text-center">
                    <h1>You are the one choosing the color as you wish.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <a class="btn btn-lg btn-light" href="{{'/shop'}}" role="button">Go to shop</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="fourth-slide" src="{{URL::asset('dist/images/home/suitdrow.jpg')}}" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-center">
                    <h1>Register yourself to be one of our client</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <a class="btn btn-lg btn-light" href="{{url('/register')}}" role="button">Sing up now</a>
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
