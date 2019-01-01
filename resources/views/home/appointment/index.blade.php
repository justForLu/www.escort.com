@extends('home.layout.base')

@section('content')
    <div class="header header-title">
        <a class="back" href="javascript:history.back();">
            <i class="fa fa-angle-left fa-2x"></i>
        </a>
        <p>预约</p>
    </div>
    @if($params['step'] == 1)
        <section class="main-contain bg-white">
            <div class="container">
                <div class="row">
                    <form method="post" action="{{url("/home/appointment/index")}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="step" value="2">
                        <div class="col-md-6 center">
                            <h3>我在...</h3>
                        </div>
                        <div class="col-md-6 center">
                            <a href="#" class="btn btn-empty btn-large">泰国</a>
                        </div>
                        <div class="col-md-6 center">
                            <a href="#" class="btn btn-empty-gray btn-large">菲律宾</a>
                        </div>
                        <div class="col-md-6 center">
                            <a href="#" class="btn btn-empty-gray btn-large">中国</a>
                        </div>
                        <div class="home-main-contant-style">
                            <div class="cd-home-title">
                                <button type="submit" class="btn btn-product btn-large">下一步</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @elseif($params['step'] == 2)
        <section class="main-contain bg-white">
            <div class="container">
                <div class="row" style="padding-top: 40px;">
                    <form method="post" action="{{url("/home/appointment/index")}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="step" value="3">
                        <div class="col-md-6 center">
                            <h3>我想见到...</h3>
                            <h4>泰国</h4>
                        </div>
                        <div class="col-md-6 center">
                            <a href="#" class="btn btn-empty btn-large">女</a>
                        </div>
                        <div class="col-md-6 center">
                            <a href="#" class="btn btn-empty-gray btn-large">变性人</a>
                        </div>
                        <div class="home-main-contant-style">
                            <div class="cd-home-title">
                                <button type="submit" class="btn btn-product btn-large">下一步</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @elseif($params['step'] == 3)
        <section class="main-contain bg-white">
            <div class="container">
                <div class="row">
                    <form method="post" action="{{url("/home/appointment/index")}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="step" value="4">
                        <div class="col-md-6 center">
                            <h3>我想见到...</h3>
                            <h4 style="line-height: 50px;">泰国</h4>
                        </div>
                        <div class="col-md-6 center">
                            <h5 style="color: #AE6FFB;"><strong>今天</strong></h5>
                        </div>
                        <div class="col-md-6 center">
                        <span style="color: #9951FB; position: relative; top: 65px; right: 120px;">
                            <i class="fa fa-minus-square-o fa-3x"></i>
                        </span>
                            <p style="font-size: 45px; content: attr(data-text); background: linear-gradient(to right, #da8cff, #9a55ff); -webkit-background-clip: text; color: transparent;  font-weight: bold;">18:00</p>
                            <span style="color: #AA6DFC; position: relative; bottom: 58px; left: 120px;">
                            <i class="fa fa-plus-square-o fa-3x"></i>
                        </span>
                        </div>
                        <div class="col-md-6 center">
                            <h5><strong>（从现在开始大约<span style="color: #AE6FFB">2小时</span>）</strong></h5>
                        </div>
                        <div class="home-main-contant-style">
                            <div class="cd-home-title">
                                <button type="submit" class="btn btn-product btn-large">下一步</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @elseif($params['step'] == 4)
        <section class="main-contain bg-white">
            <div class="container">
                <div class="row">
                    <form method="post" action="{{url("/home/appointment/index")}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="step" value="5">
                        <div class="col-md-6 center">
                            <div class="col-md-6 center">
                                <h3>我想预定...</h3>
                                <p style="line-height: 50px; font-size: 16px;"><span>女</span><i class="fa fa-angle-right fa-1x" style="padding: 0px 8px;"></i><span>今晚23:00</span></p>
                            </div>
                        </div>
                        <div class="col-md-6 center">
                        <span style="color: #9951FB; position: relative; top: 65px; right: 120px;">
                            <i class="fa fa-minus-square-o fa-3x"></i>
                        </span>
                            <p style="font-size: 45px; content: attr(data-text); background: linear-gradient(to right, #da8cff, #9a55ff);
                        -webkit-background-clip: text; color: transparent;  font-weight: bold;">2<span style="font-size: 24px; padding-left: 5px;">h</span></p>
                            <span style="color: #AA6DFC; position: relative; bottom: 58px; left: 120px;">
                            <i class="fa fa-plus-square-o fa-3x"></i>
                        </span>
                        </div>
                        <div class="home-main-contant-style">
                            <div class="cd-home-title">
                                <button type="submit" class="btn btn-product btn-large">开始搜索</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @elseif($params['step'] == 5)
        <section class="main-contant bg-white">
            <div class="clearfix" style="padding-top: 15px;">
                <div class="col-md-6 center">
                    <h3>72名女性可用</h3>
                    <p style="line-height: 50px; font-size: 16px;">
                        <span>女</span>
                        <i class="fa fa-angle-right fa-1x" style="padding: 0px 8px;"></i>
                        <span>今晚23:00</span>
                        <i class="fa fa-angle-right fa-1x" style="padding: 0px 8px;"></i>
                        <span>2h</span>
                    </p>
                </div>
            </div>
            <div class="clearfix">
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
                                <p class="escort-right"><a class="a-button" href="{!! url("/home/escort/index", array(1)) !!}">随时预定</a></p>
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
                                    <img src="{{asset("/assets/home/images/banner/slide-3.jpg")}}" alt="...">
                                </div>
                            </div>
                            <!-- Controls -->
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
                                    <img src="{{asset("/assets/home/images/banner/slide-3.jpg")}}" alt="...">
                                </div>
                            </div>
                            <!-- Controls -->
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
                                    <img src="{{asset("/assets/home/images/banner/slide-3.jpg")}}" alt="...">
                                </div>
                            </div>
                            <!-- Controls -->
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
            </div>
        </section>
    @endif
@endsection