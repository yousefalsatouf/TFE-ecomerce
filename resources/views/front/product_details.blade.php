@extends('front.helpers.master')
@section('content')
    <script>
        $(document).ready(function(){
            $('#size').change(function(){
                var size = $('#size').val();
                var proDum = $('#proDum').val();
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url('/selectSize');?>',
                    data: "size=" + size + "& proDum=" + proDum,
                    success: function (response) {
                        console.log(response);
                        $('#price').html(response);
                    }
                });

            });
        });
    </script>
    <br>
    <div class="container align-vertical hero">
        <div class="row">
            <div class="col-md-5 text-left">
            </div>
        </div><!--end of row-->
    </div><!--end of container-->
    <section id="index-amazon">
        <div class="amazon">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="thumbnail">
                                        <img src="{{url('images',$product->image)}}" class="card-img">
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="product-details">
                                        <div class="product-title">
                                            <h2>{{ucwords($product->product_name)}}</h2>
                                            <hr>
                                            <br>
                                            <h5>{{$product->product_info}}</h5>
                                            <hr>
                                            <br>
                                            <form action="{{url('/cart/addItem/'.$product->id)}}">
                                                @if($product->spl_price == 0)
                                                    <span id="price">
                                                        {{$product->product_price}}
                                                    </span>
                                                    <input type="hidden" value="{{$product->product_price}}" name="newPrice"/>
                                                @else
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <input type="hidden" value="{{$product->spl_price}}" name="newPrice"/>
                                                        <p class="" style="text-decoration:line-through; color:#333">${{$product->spl_price}}</p>
                                                         <img src="{{URL::asset('dist/images/shop/sale.png')}}" alt="..."  style="width:60px">
                                                         <p class="">${{$product->product_price}}</p>
                                                    </div>
                                                @endif
                                                <p><b>Available: </b>{{$product->stock}} In Stock</p>
                                            </form>
                                            <hr>
                                            <br>
                                            <a href="{{url('/shop')}}" class="text-dark">
                                                <button class="btn btn-primary">
                                                    <b><i class="fa fa-backward"></i> Shop</b>
                                                </button>
                                            </a>
                                            <a href="{{url('/cart/addItem').'/'.$product->id}}" class="text-dark">
                                                <button class="btn btn-primary float-right">
                                                    <b>Add <i class="fa fa-shopping-cart"></i></b>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>
        </div>
    </section>
    <div class="no-padding-top section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="load-more"><i class="fa fa-ellipsis-h"></i></a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>
    </div>
@endsection
