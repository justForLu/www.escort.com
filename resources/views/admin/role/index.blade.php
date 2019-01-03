@extends('admin.layout.base')

@section('content')
    <div class="page-header">
        <h3 class="display-4">
            角色管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!route('admin.role.index')!!}">角色管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">角色列表</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="main-toolbar-item">
                        @can('role.create')<a href="{!!route('admin.role.create')!!}" class="btn btn-success btn-fw"><i class="mdi mdi-plus"></i>创建角色</a>@endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="box-header">
                        <form action="{!! route('admin.role.index') !!}" method="get" class="form-horizontal" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="module" value="{{$params['module']}}">
                            <div class="col-sm-2">
                                <input type="text" name="name" autocomplete="off" class="form-control" placeholder="角色名称" value="{{ isset($params['name']) ?  $params['name'] : ''}}">
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
                            <th>角色名称</th>
                            <th>角色描述</th>
                            <th>系统角色</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->desc}}</td>
                                <td>{{\App\Enums\BoolEnum::getDesc($data->is_system)}}</td>
                                <td>{{$data->gmt_create}}</td>
                                <td>
                                    @can('role.edit')<a href="{!!route('admin.role.edit',array($data->id))!!}" class="btn btn-success btn-xs" title="编辑"><i class="mdi mdi-grease-pencil"></i> 编辑</a>@endcan
                                    @if(!$data->is_system)
                                        @if($data->parent == Auth::guard('admin')->user()->roles[0]->id)
                                            @can('role.authority')<a href="{{url('admin/role/authority',array($data->id))}}" class="btn btn-info btn-xs layui-btn-normal" title="授权"><i class="mdi mdi-checkbox-marked"></i>授权</a>@endcan
                                        @endif
                                        @can('role.destroy')<a href="{!!route('admin.role.destroy',array($data->id))!!}" class="btn btn-danger btn-xs J_layer_dialog_del" title="删除"><i class="mdi mdi-delete-variant"></i>删除</a>@endcan
                                    @endif
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