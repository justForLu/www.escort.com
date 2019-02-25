@extends('home.layout.base')

@section('content')
    <div class="header header-title">
        <a class="back" href="javascript:history.back();">
            <i class="fa fa-angle-left fa-2x"></i>
        </a>
        <p>成为Escort</p>
    </div>
    <section class="main-contant bg-white">
        <div class="clearfix">
            <div class="container bg-white">
                <div class="row basic-info">
                    <ul>
                        <li>
                            <select class="form-control">
                                <option value="0">性别</option>
                                <option value="1">男</option>
                                <option value="2">女</option>
                            </select>
                        </li>
                        <li>
                            <select class="form-control">
                                <option value="0">出生日期</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                            </select>
                        </li>
                        <li>
                            <select class="form-control">
                                <option value="0">选择国家</option>
                                <option value="泰国">泰国</option>
                                <option value="菲律宾">菲律宾</option>
                                <option value="新加坡">新加坡</option>
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
                                <option value="168">168</option>
                                <option value="169">169</option>
                                <option value="170">170</option>
                            </select>
                        </li>
                        <li>
                            <select class="form-control">
                                <option value="0">体型</option>
                                <option value="瘦">瘦</option>
                                <option value="匀称">匀称</option>
                                <option value="微胖">微胖</option>
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
                                <option value="BBBJ">BBBJ</option>
                                <option value="COB">COB</option>
                                <option value="COF">COF</option>
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