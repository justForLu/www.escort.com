@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                新增广告
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.ad.index')!!}">广告管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">新增广告</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="forms-sample J_ajaxForm" action="{!!route('admin.ad.store')!!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">广告名称</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="广告名称">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">广告链接地址</label>
                                <div class="col-sm-9">
                                    <input type="text" name="url" class="form-control" placeholder="广告链接地址">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">广告图片</label>
                                <div class="col-sm-9">
                                    <div class="J_upload_image" data-id="image" data-_token="{{ csrf_token() }}" data-num="1"></div>
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-8"><span class="tips">只允许上传一张图片</span></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">广告位置</label>
                                <div class="col-sm-9">
                                    {{\App\Enums\PositionEnum::enumSelect(\App\Enums\PositionEnum::INDEX,false,'position')}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">排序</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sort" class="form-control" placeholder="排序">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">状态</label>
                                <div class="col-sm-9">
                                    {{\App\Enums\BasicEnum::enumSelect(\App\Enums\BasicEnum::ACTIVE,false,'status')}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">备注</label>
                                <div class="col-sm-9">
                                    <textarea name="remarks" class="form-control length4"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <button type="submit" class="btn btn-gradient-primary mr-2 J_ajax_submit_btn">提交</button>
                                <a href="{!! route('admin.ad.index') !!}" class="btn btn-light">取消</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



