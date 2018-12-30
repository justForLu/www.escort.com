@extends('admin.layout.base')

@section('content')
    <div class="page-header">
        <h3 class="display-4">
            权限管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!route('admin.permission.index')!!}">权限管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">权限列表</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="main-toolbar-item">
                        @can('permission.create')<a href="{!!route('admin.permission.create')!!}" class="btn btn-success btn-fw"><i class="mdi mdi-plus"></i>创建权限</a>@endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="box-header">
                        <form action="{!! route('admin.permission.index') !!}" method="get" class="form-horizontal" role="form">
                            <div class="col-sm-2">
                                <input type="text" name="name" class="form-control" placeholder="权限名称" value="{{ isset($params['name']) ?  $params['name'] : ''}}">
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
                            <th>权限名称</th>
                            <th>所属菜单</th>
                            <th>权限编码</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->menu->name or ''}}</td>
                                <td>{{$data->code}}</td>
                                <td>
                                    @can('permission.edit')<a href="{!!route('admin.permission.edit',array($data->id))!!}" class="btn btn-success btn-xs"><i class="mdi mdi-grease-pencil"></i>编辑</a>@endcan
                                    @can('permission.destroy')<a href="{!!route('admin.permission.destroy',array($data->id))!!}" class="btn btn-danger btn-xs J_layer_dialog_del" data-token="{{csrf_token()}}"><i class="mdi mdi-delete-variant"></i>删除</a>@endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @include('admin.public.pages')
                </div>
            </div>
        </div>
    </div>
@endsection