@extends('front.helpers.master')
@section('content')
   <main id="cart">
           <section id="cart_items">
               <div class="container">
                   <div class="quick-access bg-info">
                       <ol class="breadcrumb">
                           <li><a href="{{url('/')}}"><i class="fa fa-home"></i> <i class="fa fa-angle-right"></i></a></li>
                           <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"></i> Shop <i class="fa fa-angle-right"></i></a></li>
                           <li class="active"><i class="fa fa-info"></i>@lang('cart.cart')</li>
                       </ol>
                   </div>
                   <div id="app">
                        <Cart 
                            v-bind:items="{{json_encode($cartItems)}}" 
                            sum="{{Cart::total()}}" 
                            tax="{{Cart::tax()}}"
                            size="{{Cart::count()}}"
                            empty="{{$cartItems->isEmpty()}}"    
                            checkout="{{url('/checkoutaddress')}}"
                            shop="{{url('/shop')}}"
                        />
                   </div>    
               </div>
           </section>
   </main>
@endsection
