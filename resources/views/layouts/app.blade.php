<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="{{route('products.index')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        </ul>
        <h1 style="font-family:'Times New Roman',  Times, serif; font-weight:bolder; color:white; font-size:20px; text-transform:uppercase">
        LARAVEL 7 CRUD WITH FREE SOURCE CODE </h1>
    </div>
    </div>
    </nav>

    <div class="container">
       @yield('content')
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
    $(function() {
        $('.alert-success').fadeOut(3000);
        $('.alert-danger').fadeOut(3000);
    });
    </script>
</body>
</html>