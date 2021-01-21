@extends('front.helpers.master')
@section('content')
    <main id="home">
        @include('front/helpers/slider')
        @include('front/helpers/lastProducts')
        @include('front/helpers/categoriesList')
        <section class="quick-access">
            <div class="articles">
                <div class="col-lg-4">
                    <div>
                        <i class="fa fa-truck"></i>
                    </div>
                    <div>
                        <h2>{{__('home.delivery')}}</h2>
                        <p>
                            {{__('home.deliveryContent')}}
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
                            {{__('home.contactContent')}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <div>
                        <h2>{{__('home.about')}}</h2>
                        <p>{{__('home.aboutContent')}}</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
