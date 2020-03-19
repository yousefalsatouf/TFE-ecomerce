<!-- start -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Our shop</title>
    <link rel="stylesheet" href="{{asset('dist/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/album.css')}}">
</head>

    <body>
        <header>
                @include('front.helpers.menu')
        </header>

        @yield('content')

        <footer class="text-muted">
            <div class="container">
                <div>

                </div>
                <p class="float-right">
                    <a href="#">Back to top</a>
                </p>
            </div>
        </footer>

    </body>
</html>
<!-- end -->

