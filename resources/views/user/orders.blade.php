@extends('front.helpers.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><b class="text-success">@lang('commun.greeting') {{ucwords(Auth::user()->name)}},</b></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-4 well well-sm">
                    @include('user.helpers.quickMenu')
                </div>
                <div class="col-md-8">
                    <h3 ><span style='color:green'>@lang('cart.history')</span></h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Image</th>
                                <th>@lang('cart.name')</th>
                                <th>@lang('cart.code')</th>
                                <th>Total </th>
                                <th>@lang('cart.status')</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->created_at}}</td>
                                <td><img src="{{url('images', $order->image)}}" alt=""></td>
                                <td>{{ucwords($order->product_name)}}</td>
                                <td>{{$order->product_code}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
