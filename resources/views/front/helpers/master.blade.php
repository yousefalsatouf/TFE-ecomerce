<!doctype html>
<html lang="{{ app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SportClub</title>
    <link rel="stylesheet" href="{{asset('dist/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
    <body>
        <header id="header">
            @php
                $verify = DB::table('users')->where('id', Auth::id())->pluck('email_verified_at');
            @endphp
            @if(Auth::check() && !$verify[0])
                <div class="alert verify-message" role="alert">
                    @lang('auth.confirmEmail')
                </div>
            @endif
            @include('front.helpers.menu')
        </header>
        @yield('content')
        <footer id="footer">
            @include('front.helpers.footer')
        </footer>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>

