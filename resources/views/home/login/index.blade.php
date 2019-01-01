@extends('home.layout.base')

@section('content')
    <section class="main-contain bg-white login-register">
        <div class="container">
            <div class="login-area">
                <div class="login-header">
                    <div class="login-details">
                        <ul class="nav nav-tabs navbar-right">
                            <li @if($type == 'register')class="active"@endif><a data-toggle="tab" href="#register">注册</a></li>
                            <li @if($type == 'login')class="active"@endif><a data-toggle="tab" href="#login">登录</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="register"  @if($type == 'register')class="tab-pane active in" @else class="tab-pane" @endif>
                        <div class="login-inner">
                            <div class="login-form">
                                <form  method="post" action="{{url('home/post_register')}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-details">
                                        <label class="user">
                                            <input type="text" name="username" placeholder="请输入手机号">
                                        </label>
                                        <label class="mail">
                                            <input type="email" name="email" placeholder="请输入验证码">
                                        </label>
                                        <label class="pass">
                                            <input type="password" name="password" placeholder="请输入密码">
                                        </label>
                                        <label class="pass">
                                            <input type="password" name="password_confirmation" placeholder="请再次输入密码">
                                        </label>
                                    </div>
                                    <button type="submit" class="form-btn" onsubmit="">注册</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="login" @if($type == 'login')class="tab-pane fade in active"@else class="tab-pane fade" @endif>
                        <div class="login-inner">
                            <div class="login-form">
                                <form method="post" action="{{url('home/post_login')}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-details">
                                        <label class="user">
                                            <input type="text" name="username" placeholder="请输入用户名">
                                        </label>
                                        <label class="pass">
                                            <input type="password" name="passsword" placeholder="请输入密码">
                                        </label>
                                    </div>
                                    <button type="submit" class="form-btn" onsubmit="">登录</button>
                                    <p>
                                        <a href="{!! url('/home/user/find_password') !!}" style="color: #F5EAFA;">找回密码</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection