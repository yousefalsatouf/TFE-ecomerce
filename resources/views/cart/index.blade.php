@extends('front.helpers.master')
@section('content')
   <main id="cart">
       @if($cartItems->isEmpty())
           <section id="cart_items">
               <div class="container">
                   <div class="quick-access bg-info">
                       <ol class="breadcrumb">
                           <li><a href="{{url('/')}}"><i class="fa fa-home"></i> <i class="fa fa-angle-right"></i></a></li>
                           <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"></i> Shop <i class="fa fa-angle-right"></i></a></li>
                           <li class="active"><i class="fa fa-info"></i>@lang('cart.cart')</li>
                       </ol>
                   </div>
                   <div align="center">
                       <img src="{{asset('dist/img/empty-cart.png')}}" alt="photo"/>
                   </div>
                   <a href="{{url('/shop')}}" class="link"><i class="fa fa-backward"></i>@lang('commun.back')</a>
               </div>
           </section> <!--/#cart_items-->
       @else
           <section id="cart_items">
               <div class="container">
                   <div class="quick-access bg-info">
                       <ol class="breadcrumb">
                           <li><a href="{{url('/')}}"><i class="fa fa-home"></i> <i class="fa fa-angle-right"></i></a></li>
                           <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"></i> Shop <i class="fa fa-angle-right"></i></a></li>
                           <li class="active"><i class="fa fa-info"></i>@lang('cart.cart')</li>
                       </ol>
                   </div>
                   <div id="updateDiv">
                       @if(session('status'))
                           <div class="alert alert-info">
                               {{session('status')}}
                           </div>
                       @endif
                       @if(session('error'))

                           <div class="alert alert-danger">
                               {{session('error')}}
                           </div>
                       @endif
                       <h1>@lang('cart.cart')</h1>
                       <p class="lead text-muted"><b class="text-success">{{Cart::count()}}</b> @lang('cart.nber')</p>
                       <div class="table-responsive">
                           <table class="table">
                               <thead>
                                   <tr class="cart_menu">
                                       <th class="image">Image</th>
                                       <th class="title">ID</th>
                                       <th class="description">@lang('cart.prod')</th>
                                       <th class="description">@lang('cart.left')</th>
                                       <th class="quantity">@lang('cart.qty')</th>
                                       <th class="price">@lang('cart.price')</th>
                                       <th class="total">Subtotal</th>
                                       <th>Action</th>
                                   </tr>
                               </thead>
                               @php($count = 1)
                               @foreach($cartItems as $cartItem)
                                   <tbody>
                                       <tr>
                                           <td class="cart_product w-25 h-25">
                                               <p class="w-50 h-50"><img src="{{url('images',$cartItem->options->img)}}" alt="photo" class="card-img-top w-100" ></p>
                                           </td>
                                           <td class="cart_title">
                                               <h5>{{$cartItem->id}}</h5>
                                           </td>
                                           <td class="cart_description">
                                               <h4>{{$cartItem->name}}</h4>
                                           </td>
                                           <td>
                                               <p><b class="text-danger">{{($cartItem->options->stock - $cartItem->qty)}}</b> @lang('cart.item')</p>
                                           </td>
                                           {!! Form::open(['url'=> ['cart/updateItem', $cartItem->rowId], 'method'=> 'put']) !!}
                                           <td class="cart_quantity">
                                               <div class="cart_quantity_button">
                                                   <input type="hidden" name="rowId" value="{{$cartItem->rowId}}"/>
                                                   <input type="hidden" name="productId" value="{{$cartItem->id}}"/>
                                                   <input type="number" size="2" value="{{  $cartItem->qty<$cartItem->options->stock?  $cartItem->qty : $cartItem->options->stock}}" name="qty" id="upCart"
                                                          autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="{{$cartItem->options->stock}}">
                                               </div>
                                           </td>
                                           <td class="cart_price">
                                               <p><strong>{{$cartItem->price}}</strong> EUR</p>
                                           </td>
                                           <td class="cart_total">
                                               <p class="cart_total_price"><strong>{{$cartItem->subtotal}}</strong> EUR</p>
                                           </td>
                                           <td class="d-flex justify-content-between">
                                               <button type="submit">
                                                   <i class="fa fa-save"></i>
                                               </button>
                                               {!! Form::close() !!}
                                               <a class="cart_quantity_delete" href="{{url('/product_details/'.$cartItem->id)}}">
                                                   <button>
                                                       <i class="fa fa-eye"></i>
                                                   </button>
                                               </a>
                                               <a class="cart_quantity_delete" href="{{url('/cart/removeItem')}}/{{$cartItem->rowId}}">
                                                   <button>
                                                       <i class="fa fa-trash-o"></i>
                                                   </button>
                                               </a>
                                           </td>
                                       </tr>
                                   @php($count++)
                                   </tbody>
                               @endforeach
                           </table>
                       </div>
                   </div>
               </div>
           </section>
           <section id="do_action" class="resume">
               <div class="container">
                   <div class="row">
                       <div class="side">
                           <div class="total_area">
                               <h2>@lang('cart.order')</h2>
                               <hr>
                               <table class="table table-striped">
                                   <thead>
                                       <tr class="cart_menu">
                                           <th class="description">@lang('cart.cost')</th>
                                           <th class="description">Tax</th>
                                           <th class="image">SubTotal</th>
                                           <th class="title">Total</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr>
                                           <td><span class="text-success">@lang('cart.free')</span></td>
                                           <td>{{Cart::tax()}} EUR</td>
                                           <td>{{Cart::subtotal()}} EUR</td>
                                           <td>{{Cart::total()}} EUR</td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                       <div class="side">
                           <div class="next-area">
                               <div class="heading">
                                   <h2>@lang('cart.whatNext')</h2>
                                   <hr>
                                   <p>@lang('cart.nextDes')</p>
                               </div>
                               <div>
                                   <a href="{{url('/shop')}}" class="text-dark">
                                       <button>
                                           <strong><i class="fa fa-backward"></i>@lang('cart.addMore')</strong>
                                       </button>
                                   </a>
                                   <a href="{{url('/checkoutaddress')}}" class="text-dark">
                                       <button class="float-right">
                                           <strong>@lang('cart.next') <i class="fa fa-eye"></i></strong>
                                       </button>
                                   </a>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section><!--/#do_action-->
       @endif
   </main>
@endsection
