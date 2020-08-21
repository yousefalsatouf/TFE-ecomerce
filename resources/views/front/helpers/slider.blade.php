<section id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="first-slide" src="{{URL::asset('dist/images/home/guyGym.jpg')}}" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-center">
                    <h1>{{__('home.firstSlide')}}</h1>
                    <br>
                    <h4>{{__('home.firstContent')}}</h4>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide h-100" src="{{URL::asset('dist/images/home/gymGirl.jpg')}}" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>{{__('home.secondSlide')}}</h1>
                    <br>
                    <h4>{{__('home.secondContent')}}</h4>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slider" src="{{URL::asset('dist/images/home/vitamins.jpg')}}" alt="Third slide">
            <div class="container">
                <div class="carousel-caption text-center">
                    <h1>{{__('home.thirdSlide')}}</h1>
                    <br>
                    <h4>{{__('home.thirdContent')}}</h4>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="fourth-slide" src="{{URL::asset('dist/images/home/olivia.jpg')}}" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-center">
                    <h1>{{__('home.fourthSlide')}}</h1>
                    <br>
                    <h4>{{__('home.fourthContent')}}</h4>
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
