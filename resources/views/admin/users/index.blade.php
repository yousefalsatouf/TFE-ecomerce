@extends('admin.master')

@section('content')
    <section id="admin" class="container-fluid">
        <div class="row">
            <div class="nav-products">
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-12 ml-sm-auto col-md-12 col-lg-10 pt-3">
                <div>
                    <h2>Gestion des utilisateurs</h2>
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
                        <th>Role</th>
                        <th>Action</th>
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
                            <td>
                                @if($user->admin){{'Admin'}}@elseif($user->actor){{'Actor'}}@else{{'User'}}@endif
                            </td>
                            <td class="d-flex">
                                <a class="link" href="{{route('findUser', $user->id)}}"><i class="fa fa-edit"></i></a>
                                {!! Form::open(['method'=>'DELETE', 'action'=> ['UsersController@destroy', $user->id]]) !!}
                                <button type="submit"><i class="fa fa-trash-o"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
