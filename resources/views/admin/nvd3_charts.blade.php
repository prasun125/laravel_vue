@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Nvd3 Charts @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/nvd3/css/nv.d3.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/custom_css/nvd3_charts.css') }}" rel="stylesheet" type="text/css">
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>NVD3 Charts</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li><a href="#">Charts</a></li>
                        <li>
                            NVD3 Charts
                        </li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Basic Pie charts strats here-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-fw fa-line-chart"></i>
                                        Stacked/Grouped Multi-Bar Chart
                                    </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div id="chart1" class='with-3d-shadow with-transitions'>
                                        <svg></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Trans label pie charts strats here-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-fw fa-line-chart"></i>
                                        Line Plus Bar Chart
                                    </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body bg-panel-grn">
                                    <div id="chart2" class="with-3d-shadow with-transitions">
                                        <svg></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Trans label pie charts strats here-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-fw fa-line-chart"></i>
                                        Horizontal Multi-Bar Chart
                                    </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body bg-panel-info">
                                    <div id="chart3" class='with-3d-shadow with-transitions'>
                                        <svg></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Trans label pie charts strats here-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-fw fa-line-chart"></i>
                                        Cumulative Line Chart
                                    </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div id="chart4" class='with-3d-shadow with-transitions'>
                                        <svg></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Trans label pie charts strats here-->
                            <div class="panel bg-panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-fw fa-line-chart"></i>
                                        Scatter / Bubble Chart
                                    </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <hr>
                                <div class="panel-body">
                                    <div id="chart5" class='with-3d-shadow with-transitions'>
                                        <svg></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
            @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/d3/js/d3.js') }}" ></script>
    <script src="{{ asset('admin/assets/vendors/nvd3/js/nv.d3.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom_js/stream_layers.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom_js/nvd3_charts.js') }}"></script>
@stop