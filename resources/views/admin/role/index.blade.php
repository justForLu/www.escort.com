@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="page-title">
            <h1>角色管理</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container fluid-height clearfix">
                    <div class="heading">
                        @can('role.create')<a class="btn btn-sm btn-primary-outline pull-right" href="{!!route('admin.role.create')!!}" title="添加角色"><i class="icon-plus"></i>创建角色</a>@endcan
                    </div>
                    <div class="widget-content padded clearfix">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <th>ID</th>
                            <th>角色名称</th>
                            <th>角色描述</th>
                            <th>系统角色</th>
                            <th>创建时间</th>
                            <th>操作</th>
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
                                        @can('role.edit')<a href="{!!route('admin.role.edit',array($data->id))!!}" class="btn btn-xs btn-success" title="编辑"><i class="icon-pencil"></i> 编辑</a>@endcan
                                        @if(!$data->is_system)
                                            @if($data->parent == Auth::user()->roles[0]->id)
                                                @can('role.authority')<a href="{{url('admin/role/authority',array($data->id))}}" class="btn btn-xs btn-info" title="授权"><i class="icon-check"></i>授权</a>@endcan
                                            @endif
                                            @can('role.destroy')<a href="{!!route('admin.role.destroy',array($data->id))!!}" data-token="{{csrf_token()}}" class="btn btn-xs btn-danger" title="删除"><i class="icon-trash"></i>删除</a>@endcan
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