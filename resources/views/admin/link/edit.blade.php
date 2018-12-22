@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                编辑友情链接
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.link.index')!!}">友情链接</a></li>
                    <li class="breadcrumb-item active" aria-current="page">编辑友情链接</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="forms-sample J_ajaxForm" action="{!!route('admin.link.update', array('id' => $link['id']))!!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{$link->id}}">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">友情链接标题</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" value="{{$link->title}}" class="form-control" placeholder="友情链接标题">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">友情链接地址</label>
                                <div class="col-sm-9">
                                    <input type="text" name="url" value="{{$link->url}}" class="form-control" placeholder="友情链接标题">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">排序</label>
                                <div class="col-sm-9">
                                    <input type="text" name="sort" value="{{$link->sort}}" class="form-control" placeholder="排序">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">状态</label>
                                <div class="col-sm-9">
                                    {{\App\Enums\BasicEnum::enumSelect($link->status,false,'status')}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <button type="submit" class="btn btn-gradient-primary mr-2 J_ajax_submit_btn">提交</button>
                                <a href="{!! route('admin.link.index') !!}" class="btn btn-light">取消</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

