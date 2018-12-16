@extends('admin.layout.login')

@section('content')
    <div class="login-wrapper">
        <div class="login-container">
            <img width="100" height="30" src="{{asset('/assets/admin/images/logo-login%402x.png')}}" />
            <form class="J_ajaxForm" method="post" action="{{url('admin/login')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" autocomplete="new-password" placeholder="账号">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" autocomplete="new-password" placeholder="密码">
                </div>
                <div class="form-group" style="margin-top: 25px; width: 80%; padding-left: 15%;">
                    <input type="submit" value="登录" class="btn btn-lg btn-block btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection