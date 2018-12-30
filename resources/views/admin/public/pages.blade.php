<div class="col-lg-12" id="public-pages" style="overflow: hidden; padding-top: 20px; border-top: 4px #ececec double;">
    <div class="pull-left" style="float: left;">
        <ul class="pagination">
            第&nbsp;{{$list->currentPage()}}&nbsp;/&nbsp;{{$list->LastPage()}}&nbsp;页，共&nbsp;{{$list->total()}}&nbsp;条数据
        </ul>
    </div>

    <div class="pull-right" style="float: right;">
        @if (empty($params))
            {!! $list -> render() !!}
        @else
            {!! $list->appends($params)->render() !!}
        @endif
    </div>
</div>