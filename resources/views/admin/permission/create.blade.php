@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="page-title">
            <h1>新增权限</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="widget-content padded">
                        <form action="{!!route('admin.permission.store')!!}" method="post" class="form-horizontal J_ajaxForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="control-label col-md-2">权限名称</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">权限编码</label>
                                <div class="col-md-7">
                                    <input type="text" name="code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">所属菜单</label>
                                <div class="col-md-7">
                                    <select name="menu_id" class="form-control">
                                        @foreach($list as $menuLevel1)
                                            @if($menuLevel1->children)
                                                <optgroup label="{{$menuLevel1->name}}">
                                                    @foreach($menuLevel1->children as $menuLevel2)
                                                        <option value="{{$menuLevel2->id}}">{{$menuLevel2->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option value="{{$menuLevel1->id}}">{{$menuLevel1->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">权限描述</label>
                                <div class="col-md-7">
                                    <textarea name="desc" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2"></label>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-primary J_ajax_submit_btn">提交</button>
                                    <a href="{!! route('admin.permission.index') !!}" class="btn btn-default">取消</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


