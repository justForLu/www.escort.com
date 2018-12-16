@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="page-title">
            <h1>菜单管理</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="heading">
                        @can('menu.create')<a class="btn btn-sm btn-primary-outline pull-right" href="{!!route('admin.menu.create')!!}" title="添加菜单"><i class="icon-plus"></i>创建菜单</a>@endcan
                    </div>
                    <div class="widget-content padded clearfix">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <th>ID</th>
                            <th>菜单名称</th>
                            <th>菜单地址</th>
                            <th>菜单编码</th>
                            <th>菜单等级</th>
                            <th>菜单状态</th>
                            <th>操作</th>
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
                                        @can('menu.edit')<a href="{!!route('admin.menu.edit',array($data->id))!!}" class="btn btn-xs btn-success"><i class="icon-pencil"></i>编辑</a>@endcan
                                    @can('menu.destroy')<a href="{!!route('admin.menu.destroy',array($data->id))!!}" data-token="{{csrf_token()}}" class="btn btn-xs btn-danger"><i class="icon-trash"></i>删除</a>@endcan
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