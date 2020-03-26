@extends('admin.master')

@section('content')
    <script>
        $(document).ready(function() {
            <?php for ($i = 1; $i < 60; $i++) { ?>
            // start loop
            $('#amountDiv<?php echo $i; ?>').hide();
            $('#checkSale<?php echo $i; ?>').show();
            $('#onSale<?php echo $i; ?>').click(function() { // run when admin need to add amount for sale
                $('#amountDiv<?php echo $i; ?>').show();
                $('#checkSale<?php echo $i; ?>').hide();
                $('#saveAmount<?php echo $i; ?>').click(function() {
                    var salePrice<?php echo $i; ?> = $('#spl_price<?php echo $i; ?>').val();
                    var pro_id<?php echo $i; ?> = $('#pro_id<?php echo $i; ?>').val();
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/admin/addSale'); ?>',
                        data: "salePrice=" + salePrice<?php echo $i; ?> + "& pro_id=" + pro_id<?php echo $i; ?>,
                        success: function(response) {
                            console.log(response);
                        }
                    });
                });
            });
            $('#noSale<?php echo $i; ?>').click(function() { // this when admin dnt need sale
                $('#amountDiv<?php echo $i; ?>').hide();
                $('#checkSale<?php echo $i; ?>').show();

            });
            //end loop
            <?php } ?>
        });
    </script>

    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <div>
            <div class="container">
                <div>
                    <button class="btn bg-success float-right">
                        <a class="nav-link text-dark" href="{{route('products.create')}}"><b>Add One</b></a>
                    </button>
                </div>
                <h3>Products</h3>
            </div>
            <hr>
            <br>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Sale</th>
                    <th>stock</th>
                    <th>Category</th>
                    <th>On Sale</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 1; ?>
                @foreach($products as $product)
                    <tr>
                        <td style="width:50px; border: 1px solid #333;"><img class="card-img-top img-fluid" src="{{url('images',$product->image)}}" width="50px" alt="Card image cap"></td>
                        <td>{{$product->id}} </td>
                        <td>{{$product->product_name}} </td>
                        <td>{{$product->product_code}} </td>
                        <td>{{$product->product_price}} $</td>
                        <td>{{($product->spl_price == null ? 'No sale on this': $product->spl_price.' $')}}</td>
                        <td>{{$product->stock}} </td>
                        <td>{{ isset($product->name)? $product->name : '' }}</td>
                        <td>
                            <div id="checkSale<?php echo $count; ?>">
                                <input type="checkbox" id="onSale<?php echo $count; ?>"> Yes
                            </div>
                            <div id="amountDiv<?php echo $count; ?>">
                                <input type="hidden" id="pro_id<?php echo $count; ?>" value="{{$product->id}}" />
                                <input type="checkbox" id="noSale<?php echo $count; ?>"> No<br>
                                <input type="text" id="spl_price<?php echo $count; ?>" size="12" placeholder="Sale Price" /><br>
                                <button id="saveAmount<?php echo $count; ?>" class="btn btn-success">Save Amount</button>
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{route('editProductForm', $product->id)}}">Edit</a>
                        </td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['ProductsController@destroy', $product->id]]) !!}
                        <td> {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}</td>
                        {!! Form::close() !!}
                    </tr>
                    <?php $count++; ?>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
