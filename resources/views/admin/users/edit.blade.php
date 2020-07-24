@extends('admin.master')
@section('content')
    <div class="col-sm-9 ml-sm-auto col-md-10 pt-3 role" role="main">
            <div class="row">
                <div>
                    @include('admin.includes.sidenav')
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-between">
                        <h2>Modifier l'utilisateur</h2>
                        <img class="card-img-top img-fluid" src="{{url('images',$user->image)}}" style="width:50px" alt="Card image cap">
                    </div>
                    <hr>
                    <br>
                    {!! Form::model($user, ['method'=>'post', 'action'=> ['UsersController@editUser', $user->id], 'files'=>true]) !!}
                        <label for="role">
                            Changer rôle:
                            <select class="form-control" name="role">
                                <option value="admin" {{$user->admin?'selected':''}}>Admin</option>
                                <option value="actor" {{$user->actor?'selected':''}}>Actor</option>
                                <option value="user" {{!$user->admin && !$user->actor?'selected':''}}>User</option>
                            </select>
                        </label>
                        <button type="submit">Sauvegarder</button>
                    {!! Form::close() !!}
                </div>
            </div>
    </div>
@endsection
