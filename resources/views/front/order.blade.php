@extends('front.helpers.master')
@section('content')
    <main role="main" id="home">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong class="d-flex justify-content-around">
                        @lang('cart.success')
                        <span   onclick="this.parentElement.style.display='none'"
                                class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                    </strong>
                </div>
                <?php Session::forget('success');?>
                <br>
                <h2 class="text-center">@lang('cart.billTitle')</h2>
                <div class="bill card">
                    <div class="card-body">
                        <strong class="text-success">@lang('cart.name'): {{Auth::user()->name}}</strong>
                        <br>
                        <hr>
                        <b class="text-info">Total : {{$order->total}}</b>
                        <br/>
                        <b class="text-info">date : {{$order->created_at}}</b>
                    </div>
                    <div class="card-footer text-center">
                        <strong class="text-success">
                            <i class="fa fa-check-circle"></i>
                            @lang('cart.billEmail')
                        </strong>
                    </div>
                </div>
                <br>
        </div>
            @endif
            @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <strong class="d-flex justify-content-around">
                            @lang('cart.denied')
                            <span   onclick="this.parentElement.style.display='none'"
                                    class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                        </strong>
                    </div>
                <?php Session::forget('error');?>
            @endif
    </main>
@endsection



{{--



--}}

























{{--

@php($count = 0)
@foreach($cartItems as $cartItem)
    @php($count++)
    <input type="hidden" name="item_name_{{$count}}" value="{{$cartItem->name}}">
    <input type="hidden" name="item_number_{{$count}}" value="{{$cartItem->id}}">
    <input type="hidden" name="quantity_{{$count}}" value="{{$cartItem->qty}}">
    <input type="hidden" name="amount_{{$count}}" value="{{$cartItem->price}}">
    <input type="hidden" name="shipping_{{$count}}" value="0">
    <input type="hidden" name="tax_{{$count}}" value="{{Cart::tax()}}">
    <br>
@endforeach

--}}
