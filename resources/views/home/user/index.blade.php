@extends('home.layout.base')

@section('content')
    <section class="clearfix person-box">
        <div class="container">
            <div class="setting">
                <a href="#">
                    <i class="fa fa-cog fa-2x"></i>
                </a>
            </div>
            <div class="person">
                <a href="#">
                    <p class="portrait">
                        <img src="{{asset("/assets/home/images/mm1.jpg")}}" width="100%" height="100%"/>
                    </p>
                    <p class="username">象拔蚌</p>
                </a>
            </div>
        </div>
    </section>
    <section class="clearfix person-order">
        <div class="my-order">
            <h5>我的订单</h5>
            <p>
                <a href="{!! url('/home/user/order') !!}">查看全部订单<i class="fa fa-angle-right fa-1x"></i></a>
            </p>
        </div>
        <div class="order-type">
            <ul>
                <li><a href="{!! url('/home/user/order') !!}"><i class="fa fa-cc-visa fa-2x"></i><p>已支付</p></a></li>
                <li><a href="{!! url('/home/user/order') !!}"><i class="fa fa-heart fa-2x"></i><p>进行中</p></a></li>
                <li><a href="{!! url('/home/user/order') !!}"><i class="fa fa-file-text fa-2x"></i><p>待评价</p></a></li>
                <li><a href="{!! url('/home/user/order') !!}"><i class="fa fa-check-circle fa-2x"></i><p>已完成</p></a></li>
            </ul>
        </div>
    </section>
    <section class="clearfix person-function">
        <div class="container">
            <ul>
                <li><a href="#"><i class="fa fa-star fa-2x" style="color: #FF9500;"></i>我的收藏</a><span><i class="fa fa-angle-right fa-2x"></i></span></li>
                <li><a href="#"><i class="fa fa-th-large fa-2x" style=" content: attr(data-text); background: linear-gradient(to right, #da8cff, #9a55ff); -webkit-background-clip: text; color: transparent;"></i>Escort管理</a><span><i class="fa fa-angle-right fa-2x"></i></span></li>
                <li><a href="{!! url("/home/article/index", array(\App\Enums\ArticleEnum::HELP)) !!}"><i class="fa fa-question-circle fa-2x" style="color: #FFB400;"></i>帮助中心</a><span><i class="fa fa-angle-right fa-2x"></i></span></li>
            </ul>
        </div>
    </section>
@endsection