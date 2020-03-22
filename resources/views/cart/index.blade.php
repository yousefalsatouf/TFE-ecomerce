@extends('front.helpers.master')
@section('content')
    <script>
        $(document).ready(function(){
            <?php for($i=1;$i<20;$i++){?>
            $('#upCart<?php echo $i;?>').on('change keyup', function(){
                var newqty = $('#upCart<?php echo $i;?>').val();
                var rowId = $('#rowId<?php echo $i;?>').val();
                var proId = $('#proId<?php echo $i;?>').val();
                if(newqty <=0){ alert('enter only valid quantity')
                }
                else {
                    // start of ajax
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/cart/update');?>/'+proId,
                        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                        success: function (response) {
                            console.log(response);
                            $('#updateDiv').html(response);
                        }
                    });

                    // End of Aajx
                }
            });
            <?php } ?>
        });
    </script>
    <?php if ($cartItems->isEmpty()) { ?>
    <br>
    <br>
    <br>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div align="center">  <img src="{{asset('dist/img/empty-cart.png')}}"/></div>
        </div>
    </section> <!--/#cart_items-->
    <?php } else { ?>
    <br>
    <br>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}"></a></li>
                    <li class="active">Shopping Cart</li>
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
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
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
                        <?php $count =1;?>
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
                                            <h4>
                                                <a href="{{url('/product_details/'.$cartItem->id)}}" style="color:blue">{{$cartItem->name}}</a>
                                            </h4>
                                    </td>
                                    <td>
                                        <p>{{$cartItem->options->stock}} item(s)</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <input type="hidden" name="rowId" value="{{$cartItem->rowId}}"/>
                                            <input type="hidden" name="productId" value="{{$cartItem->id}}"/>
                                            <input type="number" size="2" value="{{  $cartItem->qty<$cartItem->options->stock?  $cartItem->qty : $cartItem->options->stock}}" name="qty" id="upCart<?php echo $count;?>"
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
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    {!! Form::close() !!}
                                    <a class="cart_quantity_delete" style="background-color:red" href="{{url('/cart/removeItem')}}/{{$cartItem->rowId}}">
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </a>
                                    </td>
                            </tr>
                            <?php $count++;?>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <h3 class="text-success">Your Order</h3>
                        <hr>
                        <ul>
                            <li><b>SubTotal</b> <span> {{$cartItem->subtotal}}$</span></li>
                            <li><b>Tax </b><span>{{Cart::tax()}}$</span></li>
                            <li><b>Shipping Cost </b> <span>Free</span></li>
                            <li><b>Total </b><span>{{$cartItem->total}}$</span></li>
                        </ul>
                        <div class="heading">
                            <h3>What would you like to do next?</h3>
                            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                        </div>
                        <div>
                            <a href="{{url('/shop')}}" class="text-dark">
                                <button class="btn btn-primary">
                                    <b><i class="fa fa-backward"></i> Add More From Shop</b>
                                </button>
                            </a>
                            <a href="{{url('/checkout')}}" class="text-dark">
                                <button class="btn btn-primary float-right">
                                    <b>Checkout <i class="fa fa-eye"></i></b>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
    <?php } ?>
@endsection
