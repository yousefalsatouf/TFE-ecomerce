@extends('admin.master')
@section('content')
    <section id="admin" class="container-fluid">
        <div class="row orders">
            <div class="col-md-2 col-lg-2 pt-3">
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-12 ml-sm-auto col-md-9 col-lg-9 pt-3">
                <div class="row">
                    <div class="col-md-10">
                        <h2>@lang('admin.orderStatus.list')</h2>
                        <hr>
                        @if(session('status'))
                            <div class="alert alert-danger">
                                <strong>@lang('admin.orderStatus.deleteMsg')</strong>
                                <span   onclick="this.parentElement.style.display='none'"
                                        class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>@lang('admin.orderStatus.clientName')</th>
                                <th>@lang('admin.orderStatus.totalPrice')</th>
                                <th>@lang('admin.orderStatus.payed')</th>
                                <th>@lang('admin.orderStatus.status')</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderStatus as $status)
                                <tr>
                                    <td>
                                        <strong>{{$status->orders_id}}</strong>
                                    </td>
                                    <td>{{$status->name}}</td>
                                    <td>{{$status->total}}</td>
                                    <td><i class="fa fa-check-circle text-success"></i> @lang('admin.orderStatus.payed')</td>
                                    <td>
                                        <div class="statusContent">
                                            {{$status->status}}
                                        </div>
                                        <form method="POST">
                                            @csrf
                                            <div class="form-group orderStatus">
                                                <input type="hidden" id="urlOrderStatus" value="{{route('changeStatus')}}">
                                                <input type="hidden" id="statusId" value="{{$status->orders_id}}">
                                                <label for="statusValue"></label>
                                                <input type="text" id="statusValue" value="{{$status->status}}">
                                                <button id="updateStatus"><i class="fa fa-save"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="d-flex">
                                        <button id="editStatus"><i class="fa fa-edit"></i></button>
                                        @if(Auth::check() && (Auth::user()->isAdmin()))
                                            {!! Form::open(['method'=>'DELETE', 'action'=> ['OrdersController@destroy', $status->orders_id]]) !!}
                                            <button type="submit"><i class="fa fa-trash-o"></i></button>
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="back">
            <a href="{{url('/admin')}}" class="link"><i class="fa fa-backward"></i> Admin</a>
        </div>
    </section>
@endsection
