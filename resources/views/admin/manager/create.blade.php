@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="page-title">
            <h1>新增管理员</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="widget-content padded">
                        <form action="{!!route('admin.manager.store')!!}" method="post" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="parent" value="{{ Auth::user()->id }}">
                            <div class="form-group">
                                <label class="control-label col-md-2">用户名</label>
                                <div class="col-md-7">
                                    <input type="text" name="username" class="form-control" placeholder="请输入用户名">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">密码</label>
                                <div class="col-md-7">
                                    <input type="password" name="password" class="form-control" autocomplete="new-password" placeholder="请输入用户名">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">角色</label>
                                <div class="col-md-7">
                                    @foreach($roleList as $role)
                                        <label class="radio-inline">
                                            <input type="radio" name="role_id" value="{{$role->id}}" title="{{$role->name}}"><span>{{$role->name}}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">状态</label>
                                <div class="col-md-7">
                                    {{\App\Enums\BasicEnum::enumSelect(\App\Enums\BasicEnum::ACTIVE,false,'status')}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2"></label>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                    <a href="{!! route('admin.manager.index') !!}" class="btn btn-default">取消</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection