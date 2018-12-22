@extends('admin.layout.base')

@section('content')
    <div class="page-header">
        <h3 class="display-4">
            菜单管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!route('admin.menu.index')!!}">菜单管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">菜单列表</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="main-toolbar-item">
                        @can('menu.create')<a href="{!!route('admin.menu.create')!!}" class="btn btn-success btn-fw"><i class="mdi mdi-plus"></i>创建菜单</a>@endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="box-header">
                        <form action="{!! route('admin.menu.index') !!}" method="get" class="form-horizontal" role="form">
                            <div class="col-sm-2">
                                <input type="text" name="name" autocomplete="off" class="form-control" placeholder="菜单名称" value="{{ isset($params['name']) ?  $params['name'] : ''}}">
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
                            <th>菜单名称</th>
                            <th>菜单地址</th>
                            <th>菜单编码</th>
                            <th>菜单等级</th>
                            <th>菜单状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->url}}</td>
                                <td>{{$data->code}}</td>
                                <td>{{$data->grade}}</td>
                                <td>{{\App\Enums\BasicEnum::getDesc($data->status)}}</td>
                                <td>
                                    @can('menu.edit')<a href="{!!route('admin.menu.edit',array($data->id))!!}" class="btn btn-success btn-xs"><i class="mdi mdi-grease-pencil"></i>编辑</a>@endcan
                                    @can('menu.destroy')<a href="{!!route('admin.menu.destroy',array($data->id))!!}" class="btn btn-danger btn-xs J_layer_dialog_del" data-token="{{csrf_token()}}"><i class="mdi mdi-delete-variant"></i>删除</a>@endcan
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