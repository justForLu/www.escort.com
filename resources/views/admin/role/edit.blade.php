@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="page-title">
            <h1>修改角色</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="widget-content padded">
                        <form action="{!!route('admin.role.update',array('id'=>$params['id']))!!}" method="post" class="form-horizontal J_ajaxForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="parent" value="{{ $data->parent }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label class="control-label col-md-2">角色名称</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" class="form-control" value="{{$data->name}}"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">角色描述</label>
                                <div class="col-md-7">
                                    <textarea name="desc" class="form-control">{{$data->desc}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2"></label>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-primary J_ajax_submit_btn">提交</button>
                                    <a href="{!! route('admin.role.index') !!}" class="btn btn-default">取消</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection