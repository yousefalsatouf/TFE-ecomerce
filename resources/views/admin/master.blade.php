<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    @include('admin.helpers.header')
    <div id="admin" class="container-fluid">
        <div class="row">
            @include('admin.includes.sidenav')
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
