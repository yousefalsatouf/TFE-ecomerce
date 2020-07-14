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
                        <h2>Livration</h2>
                        <p>
                            Par précaution et pour protéger la santé de tous,
                            nos magasins resteront fermés jusqu'à nouvel ordre.
                            Voulez-vous faire un achat? Nous restons disponibles 24/7 sur shopclub.be. Vos commandes seront livrées à votre domicile, en toute sécurité et gratuitement.
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
                            quoi que ce soit à l'esprit, des questions, vous avez besoin de réponses sur nos services, ou peut-être vous devez signaler
                            un problème, contactez-nous et parlons.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <div>
                        <h2>Aprops de nous</h2>
                        <p>
                            La petite histoire de nous, de nos services durant toutes les 10 années d'existence et de service à nos clients.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
