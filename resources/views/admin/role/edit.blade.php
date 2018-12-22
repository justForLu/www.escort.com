@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                编辑角色
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.role.index')!!}">角色管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">编辑角色</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="forms-sample J_ajaxForm" action="{!!route('admin.role.update',array('id'=>$params['id']))!!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="parent" value="{{ $data->parent }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">角色名称</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="{{$data->name}}"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">角色描述</label>
                                <div class="col-sm-9">
                                    <textarea name="desc" class="form-control">{{$data->desc}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
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

