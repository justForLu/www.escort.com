@extends('home.layout.base')

@section('content')
    <div class="header header-title">
        <a class="back" href="javascript:history.back();">
            <i class="fa fa-angle-left fa-2x"></i>
        </a>
        <p>Toni</p>
    </div>
    <section class="main-contant bg-white">
        <div class="clearfix">
            <div class="container bg-white">
                <div class="row basic-info">
                    <ul>
                        <li>
                            <select class="form-control">
                                <option value="0">性别</option>
                                <option value="0">男</option>
                                <option value="0">女</option>
                            </select>
                        </li>
                        <li>
                            <select class="form-control">
                                <option value="0">出生日期</option>
                                <option value="0">1994</option>
                                <option value="0">1995</option>
                                <option value="0">1996</option>
                            </select>
                        </li>
                        <li>
                            <select class="form-control">
                                <option value="0">选择国家</option>
                                <option value="0">泰国</option>
                                <option value="0">菲律宾</option>
                                <option value="0">新加坡</option>
                            </select>
                        </li>
                        <li>
                            <input class="form-control" name="" value="" placeholder="请输入语言">
                        </li>
                    </ul>
                </div>
                <div class="row body-info">
                    <ul>
                        <li>
                            <select class="form-control">
                                <option value="0">身高</option>
                                <option value="0">168</option>
                                <option value="0">169</option>
                                <option value="0">170</option>
                            </select>
                        </li>
                        <li>
                            <select class="form-control">
                                <option value="0">体型</option>
                                <option value="0">瘦</option>
                                <option value="0">匀称</option>
                                <option value="0">微胖</option>
                            </select>
                        </li>
                        <li>
                            <input class="form-control" name="" value="" placeholder="请输入胸围">
                        </li>
                        <li>
                            <input class="form-control" name="" value="" placeholder="请输入腰围">
                        </li>
                        <li>
                            <input class="form-control" name="" value="" placeholder="请输入臀围">
                        </li>
                    </ul>
                </div>
                <div class="row server-info">
                    <ul>
                        <li>
                            <select class="form-control">
                                <option value="0">选择服务</option>
                                <option value="0">BBBJ</option>
                                <option value="0">COB</option>
                                <option value="0">COF</option>
                            </select>
                        </li>
                    </ul>
                    <div class="row">

                    </div>
                </div>
                <div class="row img-info">
                    <ul>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="home-main-contant-style">
                        <div class="cd-home-title">
                            <button type="submit" class="btn btn-product btn-large">确定</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection