@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                角色授权
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.role.index')!!}">角色管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">角色授权</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="forms-sample J_ajaxForm" action="{{url('admin/role/authority')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="role_id" value="{{ $params['role_id'] }}">

                            <table class="table table-bordered J_check_wrap">
                                <thead>
                                <tr>
                                    <col width="20%"/>
                                    <col width="80%"/>
                                </tr>
                                <tr>
                                    <th>菜单名称</th>
                                    <th>操作权限</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menuList as $menu)
                                    <tr>
                                        <td>{{$menu->name}}</td>
                                        <td></td>
                                    </tr>
                                    @if($menu->children)
                                        @foreach($menu->children as $menu1)
                                            <tr>
                                                <td style="padding-left: 35px;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="form-check">
                                                                    <label class="{{$menu1->active}}">
                                                                        <input type="checkbox" name="menus[]" class="J_check_all" value="{{$menu1->id}}" data-direction="x" data-checklist="J_check_{{$menu1->id}}" {{$menu1->checked}}>
                                                                        <span class="layui-checkbox-name">{{$menu1->name}}</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <ul class="auth-ul permission-list" style="list-style: none;">
                                                        @foreach($menu1->permissions as $permission)
                                                            <li class="length3">
                                                                <label class="{{$permission->active}}"><input type="checkbox" name="permissions[]" class="J_check" value="{{$permission->id}}"
                                                                                                              data-xid="J_check_{{$menu1->id}}" {{$permission->checked}}>
                                                                    <span class="layui-checkbox-name">{{$permission->name}}</span></label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <div class="form-group row" style="margin-top: 30px;">
                                <label class="col-sm-3 col-form-label"></label>
                                <button type="submit" class="btn btn-gradient-primary mr-2 J_ajax_submit_btn">提交</button>
                                <a href="{!! route('admin.role.index') !!}" class="btn btn-light">取消</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection