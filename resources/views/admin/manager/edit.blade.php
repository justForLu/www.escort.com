@extends('admin.layout.base')

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="display-4">
                编辑管理员
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{!!route('admin.manager.index')!!}">管理员管理</a></li>
                    <li class="breadcrumb-item active" aria-current="page">编辑管理员</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="forms-sample J_ajaxForm" action="{!!route('admin.manager.update',array('id'=>$params['id']))!!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{$params['id']}}">
                            <input type="hidden" name="parent" value="{{ $data->parent}}">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">用户名</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" value="{{$data->username}}" @if($data->is_system)readonly="readonly"@endif placeholder="用户名">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">密码</label>
                                <div class="col-sm-9">
                                    <input type="text" name="password" class="form-control" placeholder="密码">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">角色</label>
                                <div class="col-sm-9">
                                    <div class="form-group row">
                                        @foreach($roleList as $role)
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="role_id" value="{{$role->id}}" title="{{$role->name}}"
                                                               @if(in_array($role->id,array_column($data->roles->toArray(),'id')))checked="checked"@endif
                                                               @if($data->id == Auth::user()->id)disabled="disabled"@endif>{{$role->name}}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">状态</label>
                                <div class="col-sm-9">
                                    {{\App\Enums\BasicEnum::enumSelect($data->status,false,'status')}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <button type="submit" class="btn btn-gradient-primary mr-2 J_ajax_submit_btn">提交</button>
                                <a href="{!! route('admin.manager.index') !!}" class="btn btn-light">取消</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection