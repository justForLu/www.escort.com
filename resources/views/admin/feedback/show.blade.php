@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                反馈详情
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.feedback.index')!!}">反馈管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">反馈详情</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">姓名</label>
                            <div class="col-sm-9">
                                {{$feedback->name}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">手机号</label>
                            <div class="col-sm-9">
                                {{$feedback->mobile}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">邮箱</label>
                            <div class="col-sm-9">
                                {{$feedback->email}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">状态</label>
                            <div class="col-sm-9">
                                {{\App\Enums\BasicEnum::getDesc($feedback->status)}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">反馈内容</label>
                            <div class="col-sm-9">
                                {{$feedback->content}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <a href="{!! route('admin.feedback.index') !!}" class="btn btn-light">返回</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
