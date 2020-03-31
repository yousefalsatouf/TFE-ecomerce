<!-- start -->
<!doctype html>
<html lang="en">
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
            <div class="bottom">
                <b class="float-left">
                    <p>Copyright © 2020 - SHOPClub</p>
                </b>
                <b class="float-right">
                    <a href="#" class="btn btn-outline-success"><i class="fa fa-toggle-up"></i> Back to top</a>
                </b>
            </div>
        </footer>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/bootstrap.js')}}"></script>
    </body>
</html>
<!-- end -->

