@extends('front.helpers.master')
@section('content')
    <main role="main" id="home">
        @include('front/helpers/slider')
        @include('front/helpers/lastProducts')
        @include('front/helpers/categoriesList')

        <section class="quick-access">
            <div class="articles container">
                <div class="col-lg-4">
                    <div>
                        <i class="fa fa-truck"></i>
                    </div>
                    <div>
                        <h2>Delivery</h2>
                        <p>
                            As a precaution and to protect everyone's health,
                            our stores will remain closed until further notice.
                            Do you want to make a purchase? We remain available 24/7 on shopclub.be. Your orders will be delivered to your home, safely and free of charge.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <i class="fa fa-mobile-phone"></i>
                    </div>
                    <div>
                        <h2>Contact</h2>
                        <p>
                            anything on your mind, any questions, you need answers about our services, or maybe you need to report
                            a problem, please contact us and let's talk.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <div>
                        <h2>About Us</h2>
                        <p>
                            The short story about us, about our services during all the 10 years of existing and serving ou costumers .
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
