@extends('home.layout.base')

@section('content')
    <section class="clearfix my-profit">
        <div class="container">
            <a class="back" href="javascript:history.back();" style="float: left; margin-top: 20px; color: #fff;">
                <i class="fa fa-angle-left fa-2x"></i>
            </a>
            <div class="profit-info">
                <p class="income">$568.50</p>
                <p class="my-income">我的收益</p>
                <a href="#" class="apply-cash">申请结算</a>
            </div>
        </div>
        <div class="container profit-order-bg"></div>
        <div class="container profit-order-box">
            <div class="all-order">
                <p>今日订单</p>
                <p>2</p>
                <p>￥560</p>
            </div>
            <div class="today-order">
                <p>全部订单</p>
                <p>16</p>
                <p>￥3260</p>
            </div>
        </div>
    </section>
    <section class="clearfix" style="padding: 10px; position: relative; bottom: 50px; border-bottom: 1px #ececec solid;">
        <div class="container" style="text-align: center;">
            <p style="font-size: 16px;font-weight: bold;">新订单
                <span style="border-radius: 20px; background-color: #FA621E; color: #fff; padding: 1px 6px;">2</span>
            </p>
        </div>
    </section>
    <section class="clearfix profit-order">
        <div class="profit-list">
            <ul>
                <li><a href="#"><i class="fa fa-files-o fa-2x"></i><p>订单管理</p></a></li>
                <li><a href="#"><i class="fa fa-file-text fa-2x"></i><p>我的评价</p></a></li>
                <li><a href="#"><i class="fa fa-calendar fa-2x"></i><p>费用管理</p></a></li>
                <li><a href="#"><i class="fa fa-home fa-2x"></i><p>查看主页</p></a></li>
            </ul>
        </div>
    </section>
    <section class="clearfix profit-turn" style="margin-top: 50px;">
        <div class="container">
            <div class="switch">
                <div class="btn_fath clearfix on" onclick="toogle(this)">
                    <div class="move" data-state="on"></div>
                    <div class="btnSwitch btn1">ON</div>
                    <div class="btnSwitch btn2 ">OFF</div>
                </div>
                <!--<div class="btn_fath clearfix off" onclick="toogle(this)">-->
                <!--<div class="move" data-state="off"></div>-->
                <!--<div class="btnSwitch btn1">ON</div>-->
                <!--<div class="btnSwitch btn2 ">OFF</div>-->
                <!--</div>-->
            </div>
        </div>
    </section>
@endsection