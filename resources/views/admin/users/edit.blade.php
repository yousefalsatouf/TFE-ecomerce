@extends('admin.master')
@section('content')
    <main id="edit-product" class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
        <ul>
            <div class="row">
                <div>
                    @include('admin.includes.sidenav')
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-between">
                        <h3>Edit User</h3>
                        <img class="card-img-top img-fluid" src="{{url('images',$user->image)}}" style="width:50px" alt="Card image cap">
                    </div>
                    <hr>
                    <br>
                    {!! Form::model($user, ['method'=>'post', 'action'=> ['UsersController@editUser', $user->id], 'files'=>true]) !!}
                        <label for="role">
                            Change Role To:
                            <Select class="form-control" name="role">
                                <option value="admin" {{$user->admin?'selected':''}}>Admin</option>
                                <option value="actor" {{$user->actor?'selected':''}}>Actor</option>
                                <option value="user" {{!$user->admin && !$user->actor?'selected':''}}>User</option>
                            </select>
                        </label>
                    {{ Form::submit('Save', array('class' => 'btn btn-success')) }}

                    {!! Form::close() !!}
                </div>
            </div>
        </ul>
    </main>
@endsection
