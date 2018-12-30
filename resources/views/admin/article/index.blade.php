@extends('admin.layout.base')

@section('content')
    <div class="page-header">
        <h3 class="display-4">
            文章管理
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{!!route('admin.article.index')!!}">文章管理</a></li>
                <li class="breadcrumb-item active" aria-current="page">文章列表</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="main-toolbar-item">
                        @can('article.create')<a href="{!!route('admin.article.create')!!}" class="btn btn-success btn-fw"><i class="mdi mdi-plus"></i>创建文章</a>@endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="box-header">
                        <form action="{!! route('admin.article.index') !!}" method="get" class="form-horizontal" role="form">
                            <div class="col-sm-2">
                                <input type="text" name="title" class="form-control" placeholder="文章标题" value="{{ isset($params['title']) ?  $params['title'] : ''}}">
                            </div>
                            <div class="col-sm-2">
                                {{\App\Enums\BasicEnum::enumSelect(isset($params['position']) ? $params['position'] : null,'选择位置','position')}}
                            </div>
                            <div class="col-sm-2">
                                {{\App\Enums\BasicEnum::enumSelect(isset($params['status']) ? $params['status'] : null,'选择状态','status')}}
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
                            <th>文章标题</th>
                            <th>文章位置</th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{\App\Enums\ArticleEnum::getDesc($data->position)}}</td>
                                <td>{{\App\Enums\BasicEnum::getDesc($data->status)}}</td>
                                <td>
                                    @can('article.edit')<a href="{!!route('admin.article.edit',array($data->id))!!}" class="btn btn-success btn-xs"><i class="mdi mdi-grease-pencil"></i>编辑</a>@endcan
                                    @can('article.destroy')<a href="{!!route('admin.article.destroy',array($data->id))!!}" class="btn btn-danger btn-xs J_layer_dialog_del" data-token="{{csrf_token()}}"><i class="mdi mdi-delete-variant"></i>删除</a>@endcan
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