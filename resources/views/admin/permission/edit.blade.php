@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                编辑权限
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.permission.index')!!}">权限管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">编辑权限</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="forms-sample J_ajaxForm" action="{!!route('admin.permission.update',array('id'=>$params['id']))!!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">权限名称</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="{{$data->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">权限编码</label>
                                <div class="col-sm-9">
                                    <input type="text" name="code" class="form-control" id="code" value="{{$data->code}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">所属菜单</label>
                                <div class="col-sm-9">
                                    <select name="menu_id" class="form-control">
                                        @foreach($list as $menuLevel1)
                                            @if($menuLevel1->children)
                                                <optgroup label="{{$menuLevel1->name}}">
                                                    @foreach($menuLevel1->children as $menuLevel2)
                                                        @if($menuLevel2->id == $data['menu_id'])
                                                            <option value="{{$menuLevel2->id}}" selected="selected">{{$menuLevel2->name}}</option>
                                                        @else
                                                            <option value="{{$menuLevel2->id}}">{{$menuLevel2->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                @if($menuLevel1->id == $data['menu_id'])
                                                    <option value="{{$menuLevel1->id}}" selected="selected">{{$menuLevel1->name}}</option>
                                                @else
                                                    <option value="{{$menuLevel1->id}}">{{$menuLevel1->name}}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">权限描述</label>
                                <div class="col-sm-9">
                                    <textarea name="desc" class="form-control">{{$data->desc}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <button type="submit" class="btn btn-gradient-primary mr-2 J_ajax_submit_btn">提交</button>
                                <a href="{!! route('admin.permission.index') !!}" class="btn btn-light">取消</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

