@extends('admin.master')
@section('content')
    <section id="admin" class="col-sm-12 ml-sm-auto col-md-10 pt-3 role" role="main">
        <div class="row users">
            <div class="col-md-2 col-lg-2 pt-3">
                @include('admin.includes.sidenav')
            </div>
            <div class="col-sm-12 ml-sm-auto col-md-10 col-lg-10 pt-3">
                <div class="d-flex justify-content-between">
                    <h2>@lang('admin.editUsers')</h2>
                    <img class="card-img-top img-fluid" src="{{url('images',$user->image)}}" style="width:50px" alt="Card image cap">
                </div>
                <hr>
                <br>
                {!! Form::model($user, ['method'=>'post', 'action'=> ['UsersController@editUser', $user->id], 'files'=>true]) !!}
                <label for="role">
                    @lang('admin.roles.changRole'):
                    <select class="form-control" name="role">
                        <option value="admin" {{$user->admin?'selected':''}}>Admin</option>
                        <option value="actor" {{$user->actor?'selected':''}}>@lang('admin.roles.actor')</option>
                        <option value="user" {{!$user->admin && !$user->actor?'selected':''}}>@lang('admin.roles.user')</option>
                    </select>
                </label>
                <button type="submit">@lang('admin.save')</button>
                {!! Form::close() !!}
            </div>
        </div>
        <br>
        <hr>
        <div>
            <a href="{{url('/admin')}}" class="link"><i class="fa fa-backward"></i> Admin</a>
        </div>
    </section>
@endsection
