<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Craftdzine">
    @include('home.public.css')
</head>
<body>
<div class="wrapper">
    @yield('content')
</div>
@include('home.public.js')
@yield('scripts')
</body>
</html>

