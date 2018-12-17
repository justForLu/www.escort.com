@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="page-title">
            <h1>管理员管理</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="heading">
                        @can('manager.create')<a class="btn btn-sm btn-primary-outline pull-right" href="{!!route('admin.manager.create')!!}" title="添加管理员"><i class="icon-plus"></i>创建管理员</a>@endcan
                    </div>
                    <div class="box-search">
                        <form action="{!! route('admin.manager.index') !!}" method="get" class="form-horizontal" role="form">
                            <div class="col-md-2">
                                <input type="text" name="username" class="form-control" placeholder="用户名" value="{{ isset($params['username']) ?  $params['username'] : ''}}">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" id="search-btn" class="btn btn-success">查询</button>
                            </div>
                        </form>
                    </div>
                    <div class="widget-content padded clearfix">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <th>ID</th>
                            <th>用户名</th>
                            <th class="hidden-xs">角色</th>
                            <th class="hidden-xs">系统用户</th>
                            <th class="hidden-xs">状态</th>
                            <th>最新登录时间</th>
                            <th>最新登录IP</th>
                            <th>创建时间</th>
                            <th>操作</th>
                            </thead>
                            <tbody>
                            @foreach ($list as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->username}}</td>
                                <td>{{$data->roles[0]->name}}</td>
                                <td>{{\App\Enums\BoolEnum::getDesc($data->is_system)}}</td>
                                <td>{{\App\Enums\BasicEnum::getDesc($data->status)}}</td>
                                <td>{{$data->gmt_last_login}}</td>
                                <td>{{$data->last_ip}}</td>
                                <td>{{$data->gmt_create}}</td>
                                <td>
                                    @can('manager.edit')<a href="{!!route('admin.manager.edit',array($data->id))!!}" class="btn btn-xs btn-success"><i class="icon-pencil"></i>编辑</a>@endcan
                                    @if(!$data->is_system)
                                        @if($data->id != Auth::user()->id)
                                            @can('manager.destroy')<a href="{!!route('admin.manager.destroy',array($data->id))!!}" data-token="{{csrf_token()}}" class="btn btn-xs btn-danger"><i class="icon-trash"></i>删除</a>@endcan
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection