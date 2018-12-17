@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="page-title">
            <h1>新增菜单</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="widget-content padded">
                        <form action="{!!route('admin.menu.store')!!}" method="post" class="form-horizontal J_ajaxForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-md-2">上级菜单</label>
                                <div class="col-md-7">
                                    <select name="parent" class="form-control">
                                        <option value="0">顶级菜单</option>
                                        @foreach($list as $menuLevel1)
                                            <option value="{{$menuLevel1->id}}">{{$menuLevel1->name}}</option>
                                            @foreach($menuLevel1->children as $menuLevel2)
                                                <option value="{{$menuLevel2->id}}">&nbsp;&nbsp;&nbsp;{{$menuLevel2->name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">菜单名称</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">菜单地址</label>
                                <div class="col-md-7">
                                    <input type="text" name="url" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">菜单排序</label>
                                <div class="col-md-7">
                                    <input type="text" name="sort" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">菜单编码</label>
                                <div class="col-md-7">
                                    <input type="text" name="code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">菜单图标</label>
                                <div class="col-md-7">
                                    <input type="text" name="icon" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2"></label>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-primary J_ajax_submit_btn">提交</button>
                                    <a href="{!! route('admin.menu.index') !!}" class="btn btn-default">取消</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

