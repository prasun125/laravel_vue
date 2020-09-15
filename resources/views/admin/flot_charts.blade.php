@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Flot Charts @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/css/custom_css/flot_charts.css') }}" rel="stylesheet" type="text/css">
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                <h1>
                    Flot Charts
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-fw fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li> <a href="#">Charts</a></li>
                    <li>
                        Flot Charts
                    </li>
                </ol>

            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-bar-chart-o"></i>
                                    Spline Line Chart
                                </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                     <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div id="basicFlotLegend1" class="flotLegend"></div>
                                <div id="basicflot" class="flotChart"></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                                <div id="basicFlotLegend" class="flotLegend"></div>
                                <div id="line-chart" class="flotChart1"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Stack charts strats here-->
                        <div class="panel panel-default1">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-bar-chart-o"></i>
                                    Bar Charts
                                </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body body-bg" >
                                <div id="basicFlotLegend-barchart" class="flotLegend"></div>
                                <div id="bar-chart" class="flotChart1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Stack charts strats here-->
                        <div class="panel panel-default1">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-bar-chart-o"></i>
                                    Stacked  Bar Charts
                                </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body" >
                                <div id="basicFlotLegend" class="flotLegend"></div>
                                <div id="bar-chart-stacked" class="flotChart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Stack charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-bar-chart-o"></i>
                                    Donut
                                </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body" >
                                <div id="donut" class="flotChart1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <!-- Stack charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-bar-chart-o"></i>
                                    Pie Charts
                                </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body" >
                                <div class="col-lg-6">
                                    <div class="demo-container">
                                        <div id="placeholdertranslabel" class="flotChart1"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div id="placeholdertiltedpie" class="flotChart1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Charts with symbols charts strats here-->
                        <div class="panel panel-default1">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-bar-chart-o"></i>
                                    Real Time Charts
                                </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body" >
                                <div id="realtime" class="flotChart3"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Real time charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-bar-chart-o"></i>
                                    Area Chart
                                </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">

                                <div id="area-chart" class="flotChart3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Real time charts strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-bar-chart-o"></i>
                                    Spline Area Chart
                                </h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div id="chart-spline" class="flotChart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
               </section>
            <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.stack.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.time.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('admin/assets/vendors/splinecharts/jquery.flot.spline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.categories.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.pie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/flot.tooltip/js/jquery.flot.tooltip.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/flot_charts.js') }}" type="text/javascript" ></script>
    @stop