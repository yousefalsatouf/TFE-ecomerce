@extends('front.helpers.master')
@section('content')
    <main role="main" id="home">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <span   onclick="this.parentElement.style.display='none'"
                            class="w3-button w3-green w3-large w3-display-topright">
                        &times;</span>
                    <p>{!! $message !!}</p>
                </div>
                <?php Session::forget('success');?>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <span   onclick="this.parentElement.style.display='none'"
                            class="w3-button w3-red w3-large w3-display-topright">&times;</span>
                    <p>{!! $message !!}</p>
                </div>
                <?php Session::forget('error');?>
            @endif

        </div>
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
