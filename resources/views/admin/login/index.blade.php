@extends('admin.layout.login')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                {{--<img src="../../images/logo.svg">--}}
                            </div>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="post" action="{{url('admin/login')}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">账号：</label>
                                    <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="账号">
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">密码：</label>
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="密码">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-gradient-primary btn-fw">登录</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection