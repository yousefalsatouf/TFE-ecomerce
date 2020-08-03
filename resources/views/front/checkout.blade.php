@extends('front.helpers.master')
@section('content')
    <main id="checkout">
        <section class="head">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <div class="col-lg-9 order-2 order-lg-1">
                            <h1>Check-out</h1>
                        </div>
                        <div class="quick-access">
                            <ol class="breadcrumb">
                                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"></i> Shop <i class="fa fa-angle-right"></i></a></li>
                                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i> Cart <i class="fa fa-angle-right"></i></a></li>
                                <li class="active"><i class="fa fa-info"></i> Checkout</li>
                            </ol>
                        </div>
                    </div>
                    <div class="order-summary">
                        <div class="block-body">
                            <h2 class="text-uppercase">Récapitulatif de la commande</h2>
                            <hr>
                            <p>Les frais d'expédition et supplémentaires sont calculés en fonction des valeurs que vous avez saisies</p>
                            <table class="table table-striped">
                                <thead>
                                <tr class="cart_menu">
                                    <th class="image">Shipping and handling</th>
                                    <th class="title">Tax</th>
                                    <th class="description">Order Subtotal</th>
                                    <th class="description">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><b class="text-success">FREE</b></td>
                                    <td>{{Cart::tax()}} EUR</td>
                                    <td>{{Cart::subtotal()}} EUR</td>
                                    <td>{{Cart::total()}} EUR</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="checkout">
            <div class="container">
                <div class="quick-checkout">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="{{url('/checkoutaddress')}}" class="text-white"><b>Informations sur l'acheteur<i class="fa fa-angle-double-right"></i></b></a></li>
                        <li class="nav-item"><b>méthode de livraison<i class="fa fa-angle-double-right"></i></b></li>
                        <li class="nav-item"><b>Paiement: Paypal<i class="fa fa-angle-double-right"></i></b></li>
                        <li class="nav-item text-white"><b>Terminer la commande</b></li>
                    </ul>
                    <hr>
                </div>
                <div class="container">
                    <div class="delivery">
                        <h3>méthode de livraison</h3>
                        <hr>
                        <div>
                            <i class="fa fa-truck"></i>
                            <p>
                                Par précaution et pour protéger la santé de chacun,
                                nos magasins resteront fermés jusqu'à nouvel ordre.
                                Voulez-vous effectuer un achat? Nous restons disponibles 24/7 sur sportClub.be. Vos commandes seront livrées à votre domicile, en toute sécurité et gratuitement.
                            </p>
                        </div>
                    </div>
                    <div class="payment">
                        <h3>Mode de paiement</h3>
                        <hr>
                        <strong>Pour terminer votre commande, veuillez effectuer le paiement.</strong>
                        <form action="{{url('/finishOrder')}}" method="get">
                            <div class="form-group">
                                @include('front/paypal')
                            </div>
                        </form>
                        <a href="{{url('/finishOrder')}}" class="text-dark">
                            <button class="float-right">
                                <b>Terminer </b>
                            </button>
                        </a>
                    </div>
                    <hr>
                    <br>
                    <div>
                        <a href="{{url('/cart')}}" class="link wide prev">
                            <i class="fa fa-backward"></i> Back to Cart
                        </a>
                    </div>
                    <br>
                </div>
            </div>
        </section>
    </main>
@endsection
