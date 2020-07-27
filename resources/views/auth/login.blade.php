@extends('layouts.app')

@section('content')
<div id="login" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 content">
            <div class="card">
                <div class="card-header">{{ __('Connextion ...') }}</div>
                <div class="card-body">
                    <div>
                        @if(session('msg'))
                            <h1 class="text-danger">Connectez-vous d'abord s'il vous plaît!</h1>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Addresse Mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot De Passe') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit">
                                    {{ __('Se Connecter') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe Oublier?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <br>
                        <div class="col-md-12 row-block">
                            <a href="{{ url('auth/google') }}" class="link">
                                <strong>Connecter via Google </strong>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
