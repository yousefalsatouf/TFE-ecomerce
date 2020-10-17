@extends('layouts.app')

@section('content')
<div id="register" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.titleRegister') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('auth.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.pass') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('auth.confirm') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel">
                                            <a href="{{url('/')}}">SPORTClub</a>
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="text-success text-center">RGPD : SPORTClub</h4>
                                        <hr>
                                        <strong class="text-info"><i class="fa fa-info-circle">
                                            </i>@lang('auth.rgbd.infoTitle')</strong>
                                        <hr>
                                        @include('auth.terms')
                                        <hr>
                                        <div class="condtions">
                                            <!-- Button trigger modal -->
                                            <label for="check-me" id="checkboxContent">
                                                => <input type="checkbox" name="RGPD" id="check-me" class="@error('RGPD') is-invalid @enderror" required value="1"><=
                                                @lang('auth.rgbd.check')
                                            </label>
                                            @error('RGPD')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer m-footer bg-light">
                                        <input type="button" class="btn btn-outline-danger" data-dismiss="modal" required value="NO">
                                        <i class="far fa-smile-wink"></i>
                                        <input type="button" class="btn btn-outline-success" data-dismiss="modal" required value="OK" id="accept">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row flex justify-content-center">
                            <blockquote class="w-75">
                                <i class="fa fa-info-circle info text-danger" id="required-msg"></i>
                                @lang('auth.rgbd.warning')
                                <button type="button" class="btn btn-outline-light text-dark awesome-font" data-toggle="modal" data-target="#myModal"><i class="fa fa-folder-open-o"></i> </button>»
                            </blockquote>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="registerBtn">
                                    {{ __('auth.titleRegister') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <br>
                    <div class="col-md-12 row-block">
                        <a href="{{ url('auth/google') }}" class="google">
                            <strong>@lang('auth.google')</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
