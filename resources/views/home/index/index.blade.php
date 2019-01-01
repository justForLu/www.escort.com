@extends('home.layout.base')

@section('content')
    <div class="header sticky-header">
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="{{url("home/index")}}">
                        <img id="logo-header" src="{{asset("/assets/home/images/logo.png")}}" alt="Logo" />
                    </a>
                </div>
                <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{!! url('/home/appointment/index') !!}">预定</a></li>
                        <li><a href="{!! url('/home/escort/index') !!}">Escort</a></li>
                        <li><a href="{!! url('/home/article/index', array(\App\Enums\ArticleEnum::HELP)) !!}">帮助</a></li>
                        <li><a href="{!! url('/home/article/index', array(\App\Enums\ArticleEnum::CONTACT)) !!}">联系我们</a></li>
                        <li><a href="{!! url('/home/user/index') !!}">我的</a></li>
                        {{--<li>--}}
                            {{--<a href="login-register.html">CH</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="home-main-contant-style bg-white">
        <div class="cd-home-title">
            <h2>护送点播</h2>
            <p>护送预约平台</p>
            <a class="btn btn-product" href="">预约护送</a>
        </div>
    </section>
    <section class="home-main-contant-style bg-white">
        <div class="counter-block">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-4">
                    <div class="counter-item text-center">
                        <i class="fa fa-heart fa-3x" aria-hidden="true"></i>
                        <h1 class="secondary-color count">6666</h1>
                        <h5>注册人数</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-4">
                    <div class="counter-item text-center">
                        <i class="fa fa-star fa-3x" aria-hidden="true"></i>
                        <h1 class="secondary-color count">800</h1>
                        <h5>客户评论</h5>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-4">
                    <div class="counter-item text-center">
                        <i class="fa fa-check-circle fa-3x" aria-hidden="true"></i>
                        <h1 class="secondary-color count">555</h1>
                        <h5>完成预定</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="home-main-contant-style bg-white">
        <div class="cd-home-title">
            <h2><strong style="color: #E65DFB;">DGISO</strong>如何运作</h2>
            <p>从没这么容易过</p>
        </div>
        <div class="container">
            <div class="container" style="margin-bottom: 20px;">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <p style="color: #000000; font-size: 16px; padding-top: 15px;">1、点击首页上方的搜索，然后选择您要为同伴选择的时间和持续时间</p>
                    </div>
                    <div class="col-md-6 welcome-img col-xs-6">
                        <img class="img-responsive" src="{{asset("/assets/home/images/imac1.png")}}" alt="">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 welcome-img col-xs-6">
                        <img class="img-responsive" src="{{asset("/assets/home/images/imac2.png")}}" alt="">
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <p style="color: #000000; font-size: 16px; padding-top: 15px;">1、点击首页上方的搜索，然后选择您要为同伴选择的时间和持续时间</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cd-home-title" style=" padding-top: 30px;">
            <h2><strong style="color: #AF75FF;">护送目前在线</strong></h2>
        </div>
        <div class="container escort-box">
            <div class="row index-escort">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active beactive">
                            <img src="{{asset("/assets/home/images/banner/slide-1.jpg")}}" alt="...">
                        </div>
                        <div class="item">
                            <img src="{{asset("/assets/home/images/banner/slide-2.jpg")}}" alt="...">
                        </div>
                        <div class="item">
                            <img src="{{asset("/assets/home/images/banner/slide-3.jpg")}}" alt="...">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev">
                    </a>
                    <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next">
                    </a>
                </div>
                <div class="index-escort-content">
                    <div class="escort-content">
                        <p class="escort-left escort-name">Candy<span class="escort-age">(22岁)</span></p>
                        <p class="escort-right"><span>166cm</span>|<span>瘦</span></p>
                    </div>
                    <div class="escort-content">
                        <p class="escort-left"><i class="fa fa-map-marker fa-1x"></i>计算距离</p>
                        <p class="escort-right"><i class="fa fa-star fa-1x" aria-hidden="true"></i>4.6</p>
                    </div>
                    <div class="escort-content">
                        <p class="escort-left"><span>￥500</span><span>(2小时)</span></p>
                        <p class="escort-right"><a class="a-button" href="#">随时预定</a></p>
                    </div>
                </div>
            </div>
            <div class="row index-escort">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active beactive">
                            <img src="{{asset("/assets/home/images/banner/slide-1.jpg")}}" alt="...">
                        </div>
                        <div class="item">
                            <img src="{{asset("/assets/home/images/banner/slide-2.jpg")}}" alt="...">
                        </div>
                        <div class="item">
                            <img src="{{asset("/assets/home/images//banner/slide-3.jpg")}}" alt="...">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev">
                    </a>
                    <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next">
                    </a>
                </div>
                <div class="index-escort-content">
                    <div class="escort-content">
                        <p class="escort-left escort-name">Candy<span class="escort-age">(22岁)</span></p>
                        <p class="escort-right"><span>166cm</span>|<span>瘦</span></p>
                    </div>
                    <div class="escort-content">
                        <p class="escort-left"><i class="fa fa-map-marker fa-1x"></i>计算距离</p>
                        <p class="escort-right"><i class="fa fa-star fa-1x" aria-hidden="true"></i>4.6</p>
                    </div>
                    <div class="escort-content">
                        <p class="escort-left"><span>￥500</span><span>(2小时)</span></p>
                        <p class="escort-right"><a class="a-button" href="#">随时预定</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-logo mb15">
                        <img src="{{asset("/assets/home/images/logo.png")}}" alt="Logo" />
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h4 class="montserrat text-uppercase bottom-line">城市</h4>
                        <ul class="icons-list">
                            <li><a href="#">泰国</a>|</li>
                            <li><a href="#">泰国变性人</a>|</li>
                            <li><a href="#">菲律宾</a>|</li>
                            <li><a href="#">菲律宾跨性别者</a>|</li>
                            <li><a href="#">香港</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h4 class="montserrat text-uppercase bottom-line">关于我们</h4>
                        <ul class="icons-list">
                            <li><a href="#">隐私协议</a></li>
                            <li><a href="#">注意事项</a></li>
                            <li><a href="#">联系我们</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="text-center">
                    <p>Copyright &copy; DGISO 2018 | contact@dgiso.com</p>
                </div>
            </div>
        </div>
    </footer>
@endsection