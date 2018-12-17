@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="page-title">
            <h1>修改菜单</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="widget-content padded">
                        <form action="{!!route('admin.menu.update',array('id'=>$params['id']))!!}" method="post" class="form-horizontal J_ajaxForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label class="control-label col-md-2">上级菜单</label>
                                <div class="col-md-7">
                                    <select name="parent" class="form-control">
                                        <option value="0">顶级菜单</option>
                                        @foreach($list as $menuLevel1)
                                            <option value="{{$menuLevel1->id}}" @if($menuLevel1->id == $data->parent)selected="selected"@endif>{{$menuLevel1->name}}</option>
                                            @if(isset($menuLevel1->children))
                                                @foreach($menuLevel1->children as $menuLevel2)
                                                    <option value="{{$menuLevel2->id}}" @if($menuLevel2->id == $data->parent)selected="selected"@endif>&nbsp;&nbsp;&nbsp;{{$menuLevel2->name}}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">菜单名称</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" autocomplete="off" class="form-control" value="{{$data->name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">菜单地址</label>
                                <div class="col-md-7">
                                    <input type="text" name="url" autocomplete="off" class="form-control" value="{{$data->url}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">菜单排序</label>
                                <div class="col-md-7">
                                    <input type="text" name="sort" autocomplete="off" class="form-control" value="{{$data->sort}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">菜单编码</label>
                                <div class="col-md-7">
                                    <input type="text" name="code" autocomplete="off" class="form-control" value="{{$data->code}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">菜单图标</label>
                                <div class="col-md-7">
                                    <input type="text" name="icon" autocomplete="off" class="form-control" value="{{$data->icon}}">
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