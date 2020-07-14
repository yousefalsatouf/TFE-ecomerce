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
                    <h1>No Pain No Gain</h1>
                    <h3>Suffering is needed to make progress, as in I've worked for hours on those irregular French verbs, but no pain, no gain. Although this idiom is often associated with athletic coaches who urge athletes to train harder, it dates from the 1500s and was already in John Ray's proverb collection of 1670 as "Without pains, no gains." </h3>
                    <a class="link" href="{{url('/shop')}}" role="button">See All Products</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide h-100" src="{{URL::asset('dist/images/home/gymGirl.jpg')}}" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Always Smile </h1>
                    <h3>Many see smiling simply as an involuntary response to things that bring you joy or laughter. While this observation is certainly true, what most people overlook is that smiling can be just as much a voluntary response as a conscious and powerful choice. </h3>
                    <a class="link" href="{{url('/register')}}" role="button">Not Member Yet? Register here</a>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slider" src="{{URL::asset('dist/images/home/vitamins.jpg')}}" alt="Third slide">
            <div class="container">
                <div class="carousel-caption text-center">
                    <h1>Why Vitamins ??</h1>
                    <h4>Vitamins are substances that are found in many of the foods we eat. Your body needs vitamins to work properly, which makes them some really important substances! Your body uses vitamins to do many things, like help you grow and develop. It needs vitamins to help your blood clot when you get a cut. Some vitamins help us make energy. Vitamins are even involved in making sure you can see in color, the world would look black and white without them! And if you've ever wondered what helps make your teeth healthy and strong, then you'll be sure to smile when you find out it's, guess what, vitamins!></h4>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="fourth-slide" src="{{URL::asset('dist/images/home/olivia.jpg')}}" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-center">
                    <h1>Take Care Of Your Beauty</h1>
                    <h3>You may suspect you have dry, oily, or sensitive skin, but do you really know your skin type? Knowing your true skin type can help the next time you’re in the cosmetics aisle. In fact, using the wrong products — or even popularized Internet hacks — for your skin type could worsen acne, dryness, or other skin problems.</h3>
                    <a class="link" href="{{url('/contect')}}" role="button">Any Question Cross your mind? Contact Us</a>
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
