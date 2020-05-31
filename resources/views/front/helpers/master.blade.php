<!-- start -->
<!doctype html>
<html lang="{{ app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SHOPClub</title>
    <link rel="stylesheet" href="{{asset('dist/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
    <body>
        <header id="header">
            @include('front.helpers.menu')
        </header>
        @yield('content')
        <footer id="footer">
            @include('front.helpers.footer')
        </footer>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
<!-- end -->

