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
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">网站名称</label>
                            <div class="col-sm-9">
                                {{$config->website_name}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">网站描述</label>
                            <div class="col-sm-9">
                                {{$config->website_desc}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">货币符号</label>
                            <div class="col-sm-9">
                                {{$config->website_desc}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">联系电话</label>
                            <div class="col-sm-9">
                                {{$config->mobile}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">版权文字</label>
                            <div class="col-sm-9">
                                {{$config->copyright}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">备案信息</label>
                            <div class="col-sm-9">
                                {{$config->record}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <a href="{!!route('admin.config.edit',1)!!}" class="btn btn-gradient-primary mr-2">编辑</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection