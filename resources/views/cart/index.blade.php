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
                                <th class="price">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php $count =1;?>
                        @foreach($cartItems as $cartItem)
                            <tbody>
                            <tr>
                                <td class="cart_product">
                                    <p><img src="{{url('images',$cartItem->image)}}" class="card-img-top bmw" ></p>
                                </td>
                                <td class="cart_title">
                                    <h5>{{$cartItem->name}}</h5>
                                </td>
                                {!! Form::open(['url'=> ['cart/updateItem', $cartItem->rowId], 'method'=> 'put']) !!}
                                <td class="cart_description">
                                        <h4>
                                            <a href="{{url('/product_details/'.$cartItem->name)}}" style="color:blue">{{$cartItem->id}}</a>
                                        </h4>
                                <!--<p>Only {{$cartItem->options->stock}} left</p>-->
                                </td>
                                <td class="cart_price">
                                    <p>${{$cartItem->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                                        <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>
                                        <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                               autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="1000">
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">${{$cartItem->subtotal}}</p>
                                </td>
                                <td class="">
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
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>${{$cartItem->subtotal}}</span></li>
                            <li>Eco Tax <span>${{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>${{$cartItem->total}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{url('/')}}/checkout">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
    <?php } ?>
@endsection
