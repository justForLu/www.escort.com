@extends('admin.layout.base')

@section('content')
    <div class="container-fluid main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="widget-container stats-container">
                    <div class="col-md-3">
                        <div class="number">
                            <div class="icon visitors"></div>
                            613
                        </div>
                        <div class="text">
                            活跃用户
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="number">
                            <div class="icon money"></div>
                            <small>$</small>924
                        </div>
                        <div class="text">
                            营收金额
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="widget-container fluid-height">
                    <div class="heading">
                        <i class="icon-bar-chart"></i>用户活跃比例
                    </div>
                    <div class="widget-content clearfix">
                        <div class="col-sm-6">
                            <div class="pie-chart1 pie-chart pie-number" data-percent="87">
                                87%
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="pie-chart2 pie-chart pie-number" data-percent="26">
                                26%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
