<div class="navbar navbar-fixed-top scroll-hide">
    <div class="container-fluid top-bar">
        <div class="pull-right">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown settings hidden-xs">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span aria-hidden="true" class="escort-gear"></span>
                        <div class="sr-only">
                            设置
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="settings-link blue" href="javascript:chooseStyle('none', 30)"><span></span>蓝色</a>
                        </li>
                        <li>
                            <a class="settings-link green" href="javascript:chooseStyle('green-theme', 30)"><span></span>绿色</a>
                        </li>
                        <li>
                            <a class="settings-link orange" href="javascript:chooseStyle('orange-theme', 30)"><span></span>橙色</a>
                        </li>
                        <li>
                            <a class="settings-link magenta" href="javascript:chooseStyle('magenta-theme', 30)"><span></span>紫色</a>
                        </li>
                        <li>
                            <a class="settings-link gray" href="javascript:chooseStyle('gray-theme', 30)"><span></span>灰色</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img width="34" height="34" src="{{asset("/assets/admin/images/avatar-male.jpg")}}" />{{Auth::user()->username}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url("admin/index")}}">
                                <i class="icon-signout"></i>退出</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <button class="navbar-toggle">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="logo" href="{{url("admin/index")}}">Escort</a>
    </div>
    <div class="container-fluid main-nav clearfix">
        <div class="nav-collapse">
            <ul class="nav">
                <li>
                    <a href="{{url("admin/index")}}"><span aria-hidden="true" class="escort-home"></span>控制台</a>
                </li>
                @if(isset($userMenus))
                    @foreach($userMenus as $menu1)
                        <li  @if(isset($menu1->active))class="dropdown open"@else class="dropdown"@endif>
                            <a data-toggle="dropdown" @if(isset($menu1->active))class="current"@endif href="#">
                                <span aria-hidden="true" class="{{$menu1->icon}}"></span>
                                {{$menu1->name}}<b class="caret"></b>
                            </a>
                            @if(isset($menu1->children))
                                <ul class="dropdown-menu">
                                    @foreach($menu1->children as $menu2)
                                        <li>
                                            <a @if(isset($menu2->active))class="current"@endif href="/admin{{$menu2->url}}">{{$menu2->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>