@extends('front.helpers.master')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><b class="text-success">Hello {{ucwords(Auth::user()->name)}},</b></li>
                    <li><b class="text-info">Manage your password</b></li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-4 well well-sm">
                    @include('user.helpers.quickMenu')
                </div>
                <div class="col-md-8">
                    <h3 ><span style='color:green'>Order's History</span></h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product name</th>
                                <th>Product Code</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->created_at}}</td>
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
