@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                新增权限
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.permission.index')!!}">权限管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">新增权限</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="forms-sample J_ajaxForm" action="{!!route('admin.permission.store')!!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">权限名称</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">权限编码</label>
                                <div class="col-sm-9">
                                    <input type="text" name="code" class="form-control">
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
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">权限描述</label>
                                <div class="col-sm-9">
                                    <textarea name="desc" class="form-control"></textarea>
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

