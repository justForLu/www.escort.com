@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                网站设置
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.config.index')!!}">网站设置</a></li>
                    <li class="breadcrumb-item active" aria-current="page">网站设置</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="forms-sample J_ajaxForm" action="{!!route('admin.config.update',array('id'=>1))!!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">网站名称</label>
                                <div class="col-sm-9">
                                    <input type="text" name="website_name" value="{{$config->website_name}}" class="form-control" placeholder="网站名称">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">网站描述</label>
                                <div class="col-sm-9">
                                    <textarea name="website_desc" class="form-control">{{$config->website_desc}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">货币符号</label>
                                <div class="col-sm-9">
                                    <input type="text" name="currency" value="{{$config->currency}}" class="form-control" placeholder="货币符号">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">联系电话</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" value="{{$config->mobile}}" class="form-control" placeholder="联系电话">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">版权文字</label>
                                <div class="col-sm-9">
                                    <input type="text" name="copyright" value="{{$config->copyright}}" class="form-control" placeholder="版权文字">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">备案信息</label>
                                <div class="col-sm-9">
                                    <input type="text" name="record" value="{{$config->record}}" class="form-control" placeholder="备案信息">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <button type="submit" class="btn btn-gradient-primary mr-2 J_ajax_submit_btn">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection