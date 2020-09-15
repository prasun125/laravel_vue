@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Chartjs Charts @parent

@stop
{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/css/custom_css/chartjs-charts.css') }}" rel="stylesheet" type="text/css">
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Chartjs Charts</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Charts</a></li>
            <li>ChartJs</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-bar-chart-o"></i>
                            Bar Chart
                        </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel "></i>
                                    </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="bar-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-bar-chart-o"></i>
                            Polar Area Chart
                        </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="polar-area-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-bar-chart-o"></i>
                            Line Chart
                        </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="line-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-bar-chart-o"></i>
                            Radar Chart
                        </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="radar-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-bar-chart-o"></i>
                            Donut Chart
                        </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="doughnut-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-bar-chart-o"></i>
                            Pie Chart
                        </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="pie-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/Chart.js/js/Chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom_js/chartjs-charts.js') }}" type="text/javascript"></script>
@stop