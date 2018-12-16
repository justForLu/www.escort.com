@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="page-title">
            <h1>新增角色</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="widget-content padded">
                        <form action="{!!route('admin.role.store')!!}" method="post" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="parent" value="{{$role_id}}">
                            <input type="hidden" name="module" value="{{$params['module']}}">
                            <div class="form-group">
                                <label class="control-label col-md-2">角色名称</label>
                                <div class="col-md-7">
                                    <input type="text" name="name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">角色描述</label>
                                <div class="col-md-7">
                                    <textarea name="desc" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2"></label>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-primary">提交</button>
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


