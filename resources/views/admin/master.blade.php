<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/dashboard.css')}}">
    <script src="{{asset('dist/js/jquery.js')}}"></script>
</head>

<body>
    @include('admin.helpers.header')
    <div class="container-fluid">
        <div class="row">
            <h3>What's on your mind</h3>
            @include('admin.includes.sidenav')
            @yield('content')
        </div>
    </div>
</body>
</html>
