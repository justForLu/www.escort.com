@extends('home.layout.base')

@section('content')
    <div class="header header-title">
        <a class="back" href="javascript:history.back();">
            <i class="fa fa-angle-left fa-2x"></i>
        </a>
        <p>我的订单</p>
    </div>
    <section class="clearfix bg-white">
        <div class="order-header">
            <ul>
                <li class="active"><a href="#">全部</a></li>
                <li><a href="#">已支付</a></li>
                <li><a href="#">进行中</a></li>
                <li><a href="#">待评价</a></li>
                <li><a href="#">已完成</a></li>
            </ul>
        </div>
    </section>
    <section class="clearfix">
        <div class="container order-list">
            <ul class="row">
                <li>
                    <div class="order-img-box">
                        <img src="{{asset("/assets/home/images/mm1.jpg")}}">
                    </div>
                    <div class="order-content-box">
                        <p>
                            <span class="escort-name">Toni</span>
                            <span class="order-status-icon">OUTCALL</span>
                            <span class="order-status">已支付</span>
                        </p>
                        <p>下单时间：2018-12-26 18:15:42</p>
                        <p>总价：￥500</p>
                        <p class="order-btn">
                            <a href="#">取消订单</a>
                            <a href="#">查看详情</a>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="order-img-box">
                        <img src="{{asset("/assets/home/images/mm1.jpg")}}">
                    </div>
                    <div class="order-content-box">
                        <p>
                            <span class="escort-name">Toni</span>
                            <span class="order-status-icon">OUTCALL</span>
                            <span class="order-status">已支付</span>
                        </p>
                        <p>下单时间：2018-12-26 18:15:42</p>
                        <p>总价：￥500</p>
                        <p class="order-btn">
                            <a href="#">取消订单</a>
                            <a href="#">查看详情</a>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="order-img-box">
                        <img src="{{asset("/assets/home/images/mm1.jpg")}}">
                    </div>
                    <div class="order-content-box">
                        <p>
                            <span class="escort-name">Toni</span>
                            <span class="order-status-icon">OUTCALL</span>
                            <span class="order-status">已支付</span>
                        </p>
                        <p>下单时间：2018-12-26 18:15:42</p>
                        <p>总价：￥500</p>
                        <p class="order-btn">
                            <a href="#">取消订单</a>
                            <a href="#">查看详情</a>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection