@extends('home.layout.base')

@section('content')
<div class="header header-title">
    <a class="back" href="javascript:history.back();">
        <i class="fa fa-angle-left fa-2x"></i>
    </a>
    <p>提示</p>
</div>
<section class="main-contant bg-white" style="height: 100%; padding-top: 38%; text-align: center; font-size: 16px;  font-weight: bold;">
    <div class="clearfix">
        <div class="container bg-white">
            {{$message}}
        </div>
    </div>
</section>
@endsection