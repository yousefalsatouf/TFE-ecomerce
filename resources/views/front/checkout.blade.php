@extends('front.helpers.master')
@section('content')
    <section class="hero hero-page gray-bg padding-small">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-9 order-2 order-lg-1">
                    <h1>Checkout</h1>
                    <p class="lead text-muted">You currently have {{Cart::count()}}  item(s) in your basket</p>
                </div>
                <ul class="breadcrumb d-flex justify-content-start justify-content-lg-center col-lg-3 text-right order-1 order-lg-2">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="container">
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
                        <td class="cart_product w-25 ">
                            <a href="{{url('/product_details')}}/{{$cartItem->id}}">
                                <img src="{{url('images/'.$cartItem->options->img)}}" alt="" class="w-50">
                            </a>
                        </td>
                        <td class="cart_product">
                            <h5>{{$cartItem->id}}</h5>
                        </td>
                        {!! Form::open(['url' => ['cart/updateItem',$cartItem->rowId], 'method'=>'put']) !!}
                        <td class="cart_description">
                            <h4><a href="{{url('/product_details')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a></h4>
                            <!--<p>Only {{$cartItem->options->stock}} left</p>-->
                        </td>
                        <td class="cart_price">
                            <p>{{$cartItem->price}}$</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                                <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>
                                <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                       autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="30">
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$cartItem->subtotal}}$</p>
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
                    </tbody>  @endforeach
            </table>
        </div>
    </section>
    <hr>
    <section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="block-body order-summary" style="margin: 1.3rem">
                        <h6 class="text-uppercase">Order Summary</h6>
                        <hr>
                        <p>Shipping and additional costs are calculated based on values you have entered</p>
                        <ul class="order-menu list-unstyled">
                            <li class="d-flex justify-content-between"><span>Order Subtotal </span><strong>${{Cart::subtotal()}}</strong></li>
                            <li class="d-flex justify-content-between"><span>Shipping and handling</span><strong>$10.00</strong></li>
                            <li class="d-flex justify-content-between"><span>Tax</span><strong>${{Cart::tax()}}</strong></li>
                            <li class="d-flex justify-content-between"><span>Total</span><strong class="text-primary price-total">${{Cart::total()}}</strong></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="{{url('/checkout')}}" class="nav-link active">Address</a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Delivery Method </a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Payment Method </a></li>
                        <li class="nav-item"><a href="#" class="nav-link disabled">Order Review</a></li>
                    </ul>
                    <hr>
                    <div class="tab-content">
                        <div id="address" class="active tab-block">
                            <form action="{{url('/formValidate')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <h1>Shopper Information</h1>
                                    <div class="form-group col-md-6">
                                        <label for="first-name" class="form-label">First Name</label>
                                        <input id="first-name" type="text" name="first_name" placeholder="First Name"  value="{{ old('first_name') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('first_name') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last-name" class="form-label">Last Name</label>
                                        <input id="last-name" type="text" name="last_name" placeholder="Last Name"  value="{{ old('last_name') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('last_name') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input id="phone" type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('phone') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="state" class="form-label">State Name</label>
                                        <input id="state" type="text" name="state" placeholder="State" value="{{ old('state') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('state') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city" class="form-label">City Name</label>
                                        <input id="city" type="text" name="city" placeholder="City Name" value="{{ old('city') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('city') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="postal-code" class="form-label">Postal code</label>
                                        <input id="postal-code" type="text" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('postal_code') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="street" class="form-label">Street</label>
                                        <input id="street" type="text" name="street" placeholder="Street" value="{{ old('street') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('street') }}</span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="street-number" class="form-label">Street Number</label>
                                        <input id="street-number" type="text" name="street_number" placeholder="Street Number" value="{{ old('street_number') }}" class="form-control">
                                        <br>
                                        <span style="color:red">{{ $errors->first('street_number') }}</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="pay" class="form-label">PayPal
                                            <input type="radio" name="pay" value="paypal" checked>
                                        </label>
                                        @include('front.paypal')
                                    </div>
                                    <div class="float-right">
                                        <input type="submit" value="Continue" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <br>
                            <div>
                                <a href="{{url('/cart')}}" class="btn btn-template-outlined wide prev">
                                    <button class="btn btn-light">
                                        <i class="fa fa-backward"></i> Back to Cart
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php  // form start here ?>
@endsection
