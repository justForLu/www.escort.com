@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="page-title">
            <h1>权限管理</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="heading">
                        @can('permission.create')<a class="btn btn-sm btn-primary-outline pull-right" href="{!!route('admin.permission.create')!!}" title="添加权限"><i class="icon-plus"></i>创建权限</a>@endcan
                    </div>
                    <div class="widget-content padded clearfix">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <th>ID</th>
                            <th>权限名称</th>
                            <th>所属菜单</th>
                            <th>权限编码</th>
                            <th>操作</th>
                            </thead>
                            <tbody>
                            @foreach ($list as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->menu->name}}</td>
                                    <td>{{$data->code}}</td>
                                    <td>
                                        @can('permission.edit')<a href="{!!route('admin.permission.edit',array($data->id))!!}" class="btn btn-xs btn-success"><i class="icon-pencil"></i>编辑</a>@endcan
                                        @can('permission.destroy')<a href="{!!route('admin.permission.destroy',array($data->id))!!}" data-token="{{csrf_token()}}" class="btn btn-xs btn-danger"><i class="icon-trash"></i>删除</a>@endcan
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