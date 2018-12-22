@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                编辑菜单
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.menu.index')!!}">菜单管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">编辑菜单</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="forms-sample J_ajaxForm" action="{!!route('admin.menu.update',array('id'=>$params['id']))!!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">上级菜单</label>
                                <div class="col-sm-9">
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
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">菜单名称</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" autocomplete="off" class="form-control" value="{{$data->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">菜单地址</label>
                                <div class="col-sm-9">
                                    <input type="text" name="url" autocomplete="off" class="form-control" value="{{$data->url}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">菜单排序</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sort" autocomplete="off" class="form-control" value="{{$data->sort}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">菜单编码</label>
                                <div class="col-sm-9">
                                    <input type="text" name="code" autocomplete="off" class="form-control" value="{{$data->code}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <button type="submit" class="btn btn-gradient-primary mr-2 J_ajax_submit_btn">提交</button>
                                <a href="{!! route('admin.menu.index') !!}" class="btn btn-light">取消</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

