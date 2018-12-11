<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{!!route('admin.index.index')!!}">
                <span class="menu-title">控制台</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        @if(isset($userMenus))
            @foreach($userMenus as $menu1)
                <li @if(isset($menu1->active))class="nav-link active"@else class="nav-link"@endif>
                    <a class="nav-link" data-toggle="collapse" aria-expanded="false" aria-controls="ui-basic" @if(isset($menu1->children))href="#{{$menu1->code}}"@endif>
                        <span class="menu-title">{{$menu1->name}}</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    </a>
                    @if(isset($menu1->children))
                        <div class="collapse" id="{{$menu1->code}}">
                            <ul class="nav flex-column sub-menu">
                                @foreach($menu1->children as $menu2)
                                <li class="nav-item">
                                    <a @if(isset($menu2->active))class="nav-link active"@endif href="/admin{{$menu2->url}}">{{$menu2->name}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>
            @endforeach
        @endif
    </ul>
</nav>
