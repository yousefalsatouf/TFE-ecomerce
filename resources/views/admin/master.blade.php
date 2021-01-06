<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SportClub: Dashboard</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic|Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
  <body>
    @yield('content')
  <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>



