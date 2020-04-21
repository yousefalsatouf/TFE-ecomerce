@extends('admin.master')

@section('content')
    <section id="products" class="container-fluid">
        <div class="row">
            <div class="nav-products">
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-12 ml-sm-auto col-md-12 col-lg-10 pt-3">
                <div>
                    <h3>Users Management</h3>
                </div>
                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Street</th>
                        <th>Street Number</th>
                        <th>Postal Code</th>
                        <th>Payment Method</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td style="width:50px; border: 1px solid #333;"><img class="card-img-top img-fluid" src="{{url('images',$user->image)}}" width="50px" alt="Card image cap"></td>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}} </td>
                            <td>{{$user->first_name}} </td>
                            <td>{{$user->last_name}} </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>{{$user->state}} </td>
                            <td>{{$user->city}}</td>
                            <td>{{$user->street}} </td>
                            <td>{{$user->street_number}}</td>
                            <td>{{$user->postal_code}} </td>
                            <td>{{$user->payment_type}}</td>
                            <td>
                                @if($user->admin){{'Admin'}}@elseif($user->actor){{'Actor'}}@else{{'User'}}@endif
                            </td>
                            <td>
                                @if($user->id == 1) <button class="btn btn-outline-success" disabled>Edit</button>
                                @else<a class="btn btn-outline-success" href="{{route('findUser', $user->id)}}">Edit</a>@endif
                            </td>
                            {!! Form::open(['method'=>'DELETE', 'action'=> ['UsersController@destroy', $user->id]]) !!}
                            <td>
                                @if($user->id == 1){!! Form::submit('Delete', ['class'=>'btn btn-outline-danger', 'disabled']) !!}
                                @else{!! Form::submit('Delete', ['class'=>'btn btn-outline-danger']) !!}@endif
                            </td>
                            {!! Form::close() !!}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
