@extends('admin.layout.base')

@section('content')
    <div class="page-header">
        <h3 class="display-4">
            反馈管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!route('admin.feedback.index')!!}">反馈管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">反馈列表</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="box-header">
                        <form action="{!! route('admin.feedback.index') !!}" method="get" class="form-horizontal" role="form">
                            <div class="col-sm-2">
                                <input type="text" name="name" class="form-control" placeholder="姓名" value="{{ isset($params['name']) ?  $params['name'] : ''}}">
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
                            <th>姓名</th>
                            <th>手机号</th>
                            <th>邮箱</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->mobile}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{\App\Enums\BasicEnum::getDesc($data->status)}}</td>
                                <td>
                                    @can('feedback.edit')<a href="{!!route('admin.feedback.show',array($data->id))!!}" class="btn btn-info btn-xs"><i class="mdi mdi-eye"></i>查看</a>@endcan
                                    @can('feedback.destroy')<a href="{!!route('admin.feedback.destroy',array($data->id))!!}" class="btn btn-danger btn-xs J_layer_dialog_del" data-token="{{csrf_token()}}"><i class="mdi mdi-delete-variant"></i>删除</a>@endcan
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