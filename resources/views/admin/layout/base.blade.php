<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>欢迎登录Escort系统</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('admin.public.css')
</head>
<body>
<div class="modal-shiftfix">
    @include('admin.public.header')
    <div class="container-fluid main-content">
        @yield('content')
    </div>
</div>
<footer style="text-align: center; position: absolute; bottom: 10px; width: 100%;">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="" target="_blank">Escort</a> 版权所有。 </span>
    </div>
</footer>
@include('admin.public.js')
@yield('scripts')
</body>
</html>