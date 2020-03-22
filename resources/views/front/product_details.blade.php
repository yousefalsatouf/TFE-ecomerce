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
                                        <img src="{{url('images',$products->image)}}" class="card-img">
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
