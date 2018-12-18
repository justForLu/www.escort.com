<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>欢迎登录XXXX系统</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('admin.public.css')
</head>
<body>
<div class="container-scroller">
    @include('admin.public.header')
    <div class="container-fluid page-body-wrapper">
        @include('admin.public.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
</div>
@include('admin.public.js')
@yield('scripts')
</body>
</html>