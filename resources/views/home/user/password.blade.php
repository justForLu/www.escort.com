@extends('home.layout.base')

@section('content')
    <div class="header header-title" >
        <a class="back" href="javascript:history.back();">
            <i class="fa fa-angle-left fa-2x"></i>
        </a>
        <p>找回密码</p>
    </div>
    @if($params['step'] == 1)
        <section class="main-contain bg-gray">
            <div class="container">
                <div class="login-area">

                    <div class="tab-content">
                        <div id="login" class="fade in active">
                            <div class="login-inner">
                                <div class="login-form">
                                    <form method="post" action="{!! url('/home/user/find_password') !!}">
                                        <input type="hidden" name="step" value="2">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-details">
                                            <label class="user">
                                                <input type="text" name="mobile" placeholder="请输入您的手机号">
                                            </label>
                                            <label class="pass">
                                                <input type="text" name="code" placeholder="请输入验证码">
                                            </label>
                                        </div>
                                        <button type="submit" class="form-btn form-btn-white" onsubmit="" style="background: linear-gradient(to right, #da8cff, #9a55ff);">下一步</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @elseif($params['step'] == 2)
        <section class="main-contain bg-gray">
            <div class="container">
                <div class="login-area">
                    <div class="tab-content">
                        <div id="login" class="fade in active">
                            <div class="login-inner">
                                <div class="login-form">
                                    <form method="post" class="J_ajaxForm" action="{!! url('/home/user/reset_password') !!}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-details">
                                            <label class="user">
                                                <input type="text" name="password" placeholder="请输入您的密码">
                                            </label>
                                            <label class="pass">
                                                <input type="text" name="password_confirmation" placeholder="请再次输入您的密码">
                                            </label>
                                        </div>
                                        <button type="submit" class="form-btn form-btn-white J_ajax_submit_btn" onsubmit="" style="background: linear-gradient(to right, #da8cff, #9a55ff);">完成</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection