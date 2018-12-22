@extends('admin.layout.base')

@section('content')
    <div class="page-header">
        <h3 class="display-4">
            管理员管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!route('admin.manager.index')!!}">管理员管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">管理员列表</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="main-toolbar-item">
                        @can('manager.create')<a href="{!!route('admin.manager.create')!!}" class="btn btn-success btn-fw"><i class="mdi mdi-plus"></i>创建管理员</a>@endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="box-header">
                        <form action="{!! route('admin.manager.index') !!}" method="get" class="form-horizontal" role="form">
                            <div class="col-sm-2">
                                <input type="text" name="username" class="form-control" placeholder="用户名" value="{{ isset($params['username']) ?  $params['username'] : ''}}">
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" id="search-btn" class="btn btn-success btn-fw"><i class="mdi mdi-magnify-plus"></i>查询</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>用户名</th>
                            <th>角色</th>
                            <th>系统用户</th>
                            <th>状态</th>
                            <th>最新登录时间</th>
                            <th>最新登录IP</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->username}}</td>
                            <td>{{$data->roles[0]->name or ''}}</td>
                            <td>{{\App\Enums\BoolEnum::getDesc($data->is_system)}}</td>
                            <td>{{\App\Enums\BasicEnum::getDesc($data->status)}}</td>
                            <td>{{$data->gmt_last_login}}</td>
                            <td>{{$data->last_ip}}</td>
                            <td>{{$data->gmt_create}}</td>
                            <td>
                                @can('manager.edit')<a href="{!!route('admin.manager.edit',array($data->id))!!}" class="btn btn-success btn-xs"><i class="mdi mdi-grease-pencil"></i>编辑</a>@endcan
                                @if(!$data->is_system)
                                    @if($data->id != Auth::user()->id)
                                        @can('manager.destroy')<a href="{!!route('admin.manager.destroy',array($data->id))!!}" class="btn btn-danger btn-xs J_layer_dialog_del" data-token="{{csrf_token()}}"><i class="mdi mdi-delete-variant"></i>删除</a>@endcan
                                    @endif
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        @include('admin.public.pages')
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection