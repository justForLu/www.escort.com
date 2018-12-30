@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                新增广告
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.advertisement.index')!!}">广告管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">编辑广告</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="forms-sample J_ajaxForm" action="{!!route('admin.advertisement.update', array('id' => $advertisement['id']))!!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">广告名称</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{$advertisement->name}}" class="form-control" placeholder="广告名称">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">广告链接地址</label>
                                <div class="col-sm-9">
                                    <input type="text" name="url" value="{{$advertisement->url}}" class="form-control" placeholder="广告链接地址">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">广告图片</label>
                                <div class="col-sm-9">
                                    <div class="J_upload_image" data-id="image" data-width="690" data-_token="{{ csrf_token() }}" data-num="1">
                                        @if(!empty($advertisement->image))
                                            <input type="hidden" name="image_val" value="{{ $advertisement->image }}">
                                            <input type="hidden" name="image_path[]" value="{{ $advertisement->image_path[0] }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">广告位置</label>
                                <div class="col-sm-9">
                                    {{\App\Enums\PositionEnum::enumSelect($advertisement->position,false,'position')}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">排序</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sort" value="{{$advertisement->sort}}" class="form-control" placeholder="排序">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">状态</label>
                                <div class="col-sm-9">
                                    {{\App\Enums\BasicEnum::enumSelect($advertisement->status,false,'status')}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">备注</label>
                                <div class="col-sm-9">
                                    <textarea name="remarks" class="form-control length4">{{$advertisement->remarks}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <button type="submit" class="btn btn-gradient-primary mr-2 J_ajax_submit_btn">提交</button>
                                <a href="{!! route('admin.advertisement.index') !!}" class="btn btn-light">取消</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

