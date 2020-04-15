@extends('front.helpers.master')
@section('content')
    <script>
        $(document).ready(function(){
            @for($i=1;$i<20;$i++)
                $('#upCart{{$i}}').on('change keyup', function(){
                    let newQty = $('#upCart{{$i}}').val();
                    let rowId = $('#rowId{{$i}}').val();
                    let proId = $('#proId{{$i}}').val();
                    if(newQty <= 0)
                    {
                        alert('enter only valid quantity')
                    } else
                        {
                        // start of ajax
                        $.ajax({
                            type: 'get',
                            dataType: 'html',
                            url: {{url('/cart/update')}}+'/'+proId,
                            data: "qty = " + newQty + "& rowId=" + rowId + "& proId=" + proId,
                            success: function (response) {
                                console.log(response);
                                $('#updateDiv').html(response);
                            }
                        });
                        // End of Ajax
                    }
                });
            @endfor
        });
    </script>
   <main id="cart">
       @if($cartItems->isEmpty())
           <section id="cart_items">
               <div class="container">
                   <div class="quick-access">
                       <ol class="breadcrumb">
                           <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home <i class="fa fa-angle-right"></i></a></li>
                           <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"></i> Shop <i class="fa fa-angle-right"></i></a></li>
                           <li class="active"><i class="fa fa-info"></i> Shopping Cart</li>
                       </ol>
                   </div>
                   <div align="center">
                       <img src="{{asset('dist/img/empty-cart.png')}}"/>
                   </div>
                   <a href="{{url('/shop')}}" class="btn btn-outline-success"><i class="fa fa-backward"></i> Back To Shop</a>
               </div>
           </section> <!--/#cart_items-->
       @else
           <section id="cart_items">
               <div class="container">
                   <div class="quick-access">
                       <ol class="breadcrumb">
                           <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home <i class="fa fa-angle-right"></i></a></li>
                           <li><a href="{{url('/shop')}}"><i class="fa fa-shopping-cart"></i> Shop <i class="fa fa-angle-right"></i></a></li>
                           <li class="active"><i class="fa fa-info"></i> Shopping Cart</li>
                       </ol>
                   </div>
                   <div id="updateDiv">
                       @if(session('status'))
                           <div class="alert alert-success">
                               {{session('status')}}
                           </div>
                       @endif
                       @if(session('error'))

                           <div class="alert alert-danger">
                               {{session('error')}}
                           </div>
                       @endif
                       <h1 class="text-success">Cart Content </h1>
                       <div class="table-responsive">
                           <table class="table table-striped">
                               <thead>
                                   <tr class="cart_menu">
                                       <th class="image">Image</th>
                                       <th class="title">Product ID</th>
                                       <th class="description">Product Name</th>
                                       <th class="description">only left</th>
                                       <th class="quantity">Quantity</th>
                                       <th class="price">Price</th>
                                       <th class="total">Subtotal</th>
                                       <th>Action</th>
                                   </tr>
                               </thead>
                               @php($count = 1)
                               @foreach($cartItems as $cartItem)
                                   <tbody>
                                       <tr>
                                           <td class="cart_product w-25 h-25">
                                               <p class="w-50 h-50"><img src="{{url('images',$cartItem->options->img)}}" class="card-img-top w-100" ></p>
                                           </td>
                                           <td class="cart_title">
                                               <h5>{{$cartItem->id}}</h5>
                                           </td>
                                           {!! Form::open(['url'=> ['cart/updateItem', $cartItem->rowId], 'method'=> 'put']) !!}
                                           <td class="cart_description">
                                               <h4>{{$cartItem->name}}</h4>
                                           </td>
                                           <td>
                                               <p>{{($cartItem->options->stock - $cartItem->qty)}} item(s)</p>
                                           </td>
                                           <td class="cart_quantity">
                                               <div class="cart_quantity_button">
                                                   <input type="hidden" name="rowId" value="{{$cartItem->rowId}}"/>
                                                   <input type="hidden" name="productId" value="{{$cartItem->id}}"/>
                                                   <input type="number" size="2" value="{{  $cartItem->qty<$cartItem->options->stock?  $cartItem->qty : $cartItem->options->stock}}" name="qty" id="upCart"
                                                          autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                                               </div>
                                           </td>
                                           <td class="cart_price">
                                               <p>{{$cartItem->price}} $</p>
                                           </td>
                                           <td class="cart_total">
                                               <p class="cart_total_price">{{$cartItem->subtotal}} $</p>
                                           </td>
                                           <td>
                                               <a class="cart_quantity_delete" href="{{url('/product_details/'.$cartItem->id)}}">
                                                   <button class="btn btn-outline-info">
                                                       <i class="fa fa-eye"></i>
                                                   </button>
                                               </a>
                                               <button type="submit" class="btn btn-outline-success">
                                                   <i class="fa fa-edit"></i>
                                               </button>
                                               {!! Form::close() !!}
                                               <a class="cart_quantity_delete" href="{{url('/cart/removeItem')}}/{{$cartItem->rowId}}">
                                                   <button class="btn btn-outline-danger">
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
                               <h2 class="text-success">Your Order</h2>
                               <hr>
                               <table class="table table-striped">
                                   <thead>
                                       <tr class="cart_menu">
                                           <th class="description">Tax</th>
                                           <th class="description">Shipping Cost</th>
                                           <th class="image">SubTotal</th>
                                           <th class="title">Total</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr>
                                           <td>{{Cart::tax()}} $</td>
                                           <td><span class="text-success">Free</span></td>
                                           <td>{{$cartItem->subtotal}} $</td>
                                           <td>{{$cartItem->total}} $</td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                       <div class="side">
                           <div class="next-area">
                               <div class="heading">
                                   <h2>What would you like to do next?</h2>
                                   <hr>
                                   <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                               </div>
                               <div>
                                   <a href="{{url('/shop')}}" class="text-dark">
                                       <button class="btn btn-success">
                                           <b><i class="fa fa-backward"></i> Add More From Shop</b>
                                       </button>
                                   </a>
                                   <a href="{{url('/checkout')}}" class="text-dark">
                                       <button class="btn btn-info float-right">
                                           <b>Checkout <i class="fa fa-eye"></i></b>
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
