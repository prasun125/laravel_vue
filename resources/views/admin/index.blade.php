@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Dashboard @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/toastr/css/toastr.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/QuickNote-jQuery-Plugin/jquery.quicknote.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/custom_css/toastr.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/custom_css/dashboard.css') }}" rel="stylesheet" type="text/css" />
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                <!--section starts-->
                <h1>Welcome To Dashboard</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-fw fa-home"></i>
                            Dashboard
                        </a>
                    </li>

                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row row-spacing">
                    <div class="col-md-12">
                        <div class="panel panel-default1">
                            <div class="panel-heading">
                                <span class="panel-title">Site Activity</span>
                                <ul class="nav nav-tabs nav-float" role="tablist">
                                    <li class="active">
                                        <a href="#home" role="tab" data-toggle="tab">Stats</a>
                                    </li>
                                    <li>
                                        <a href="#profile" role="tab" data-toggle="tab">Sales</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                        <div class="row">
                                            <div class="col-md-8 col-xs-12">
                                                <div id="basicFlotLegend1" class="flotLegend"></div>
                                                <div id="basicflot" class="flotChart"></div>
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="task-item">
                                                    Total sold
                                                    <small class="pull-right text-muted">40%</small>
                                                    <div class="progress progress-sm">
                                                        <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;" class="progress-bar progress-bar-primary">
                                                            <span class="sr-only">40% Complete (success)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                Product delivered
                                                <small class="pull-right text-muted">60%</small>
                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;" class="progress-bar progress-bar-success">
                                                        <span class="sr-only">60% Complete (success)</span>
                                                    </div>
                                                </div>
                                                Sale reports
                                                <small class="pull-right text-muted">55%</small>
                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width: 55%;" class="progress-bar progress-bar-info">
                                                        <span class="sr-only">55% Complete (success)</span>
                                                    </div>
                                                </div>
                                                New Projects
                                                <small class="pull-right text-muted">66%</small>
                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width: 66%;" class="progress-bar progress-bar-warning">
                                                        <span class="sr-only">66% Complete (success)</span>
                                                    </div>
                                                </div>
                                                New Users
                                                <small class="pull-right text-muted">90%</small>
                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;" class="progress-bar progress-bar-danger">
                                                        <span class="sr-only">90% Complete (success)</span>
                                                    </div>
                                                </div>
                                                Total income
                                                <small class="pull-right text-muted">50%</small>
                                                <div class="progress progress-sm">
                                                    <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;" class="progress-bar progress-bar-primary">
                                                        <span class="sr-only">50% Complete (success)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile">
                                        <div class="row">
                                            <div class="col-md-9 col-xs-12">
                                                <div id="basicFlotLegend"></div>
                                                <div id="placeholder" style="width:100%; height: 280px"></div>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <div id="donut" style="width:100%; height: 300px" class="centered"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="text-center">
                                            <h5>This year total sales</h5>
                                            <h4>
                                                <strong>$2,111,234</strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-3 text-center">
                                                <img src="{{ asset('admin/assets/img/flags/au.png') }}" alt="img">
                                                <h5>
                                                    <strong>$14,123</strong>
                                                </h5>
                                            </div>
                                            <div class="col-xs-6 col-sm-3 text-center">
                                                <div>
                                                    <img src="{{ asset('admin/assets/img/flags/ca.png') }}" alt="img">
                                                    <h5>
                                                        <strong>$22,342</strong>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-3 text-center">
                                                <div>
                                                    <img src="{{ asset('admin/assets/img/flags/uk.png') }}" alt="img">
                                                    <h5>
                                                        <strong>$12,112</strong>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-3 text-center">
                                                <div>
                                                    <img src="{{ asset('admin/assets/img/flags/us.png') }}" alt="img">
                                                    <h5>
                                                        <strong>$88,321</strong>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-spacing">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="panel panel-default1">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table1 table bottom-pad" id="users">
                                        <tr >
                                            <td class="bodr">Visits : 3,200</td>
                                            <td class="bodr">
                                                <span class="pull-right  mini-graph"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Unique Visitors : 2,123</td>
                                            <td>
                                                <span class=" pull-right   mini-graph2"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bounce Rate : 2,654</td>
                                            <td>
                                                <span class=" pull-right   mini-graph3"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>New Visits : 22,000</td>
                                            <td>
                                                <span class=" pull-right   mini-graphpie"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pageviews : 1,200</td>
                                            <td>
                                                <span class=" pull-right   mini-graph5"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="panel panel-default1">
                            <div class="panel-body">
                                <div class="tab-pane" id="messages">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12">
                                            <div class="demo-container">
                                                <span class="ser-load">Server Load</span>
                                                <div id="chart3" class="ser"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="row tiles-container tiles white spacing-bottom">
                            <div class="tile-more-content col-md-4 col-sm-4 no-padding">
                                <div class="tiles green">
                                    <div class="tiles-body">
                                        <div class="heading">Stock Statistics</div>
                                        <p>Status : live</p>
                                    </div>
                                    <div class="tile-footer">258 Countries, 4835 Cities</div>
                                </div>
                                <div class="tiles-body">
                                    <ul class="progress-list">
                                        <li>
                                            <div class="details-wrapper">
                                                <div class="name">Desktop Visits</div>

                                            </div>
                                            <div class="details-status pull-right">
                                                <span class="animate-number" data-value="89" data-animation-duration="800">80%</span>

                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="progress progress-small no-radius">
                                                <div class="progress-bar progress-bar-success pro-bar" data-percentage="89%"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="details-wrapper">
                                                <div class="name">Mobile Visits</div>

                                            </div>
                                            <div class="details-status pull-right">
                                                <span class="animate-number" data-value="45" data-animation-duration="600">8%</span>

                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="progress progress-small no-radius ">
                                                <div class="progress-bar progress-bar-warning pro-bar1" data-percentage="45%"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="details-wrapper">
                                                <div class="name">Tablet Visits</div>
                                            </div>
                                            <div class="details-status pull-right">
                                                <span class="animate-number" data-value="12" data-animation-duration="200">12%</span>

                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="progress progress-small no-radius">
                                                <div class="progress-bar progress-bar-danger pro-bar2" data-percentage="12%"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tiles white col-md-8 col-sm-8 no-padding">
                                <div class="tiles-chart">
                                    <div class="controller">
                                        <div id="world-map-markers" class="wrd"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="panel panel-default1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-rss"></i>
                                    Feeds
                                </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body panel-padding widget-content ">
                                <div class="tabbable tabbable-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_feed_1" data-toggle="tab">System</a>
                                        </li>
                                        <li>
                                            <a href="#tab_feed_2" data-toggle="tab">Activities</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_feed_1">
                                            <div id="slim">
                                                <ul class="feeds clearfix">
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-success">
                                                                        <i class="fa fa-fw fa-bell-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">You have 2 puzzles</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">Just now</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-success">
                                                                        <i class="fa fa-fw fa-calendar-o"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New event added.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">20 mins ago</div>
                                                        </div>
                                                    </li>
                                                    <li class="hoverable">
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-info">
                                                                        <i class="fa fa-fw fa-flask"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New items are in queue.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">25 mins ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-danger">
                                                                        <i class="fa fa-fw fa-desktop"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">
                                                                        High CPU load.
                                                                        <span class="label label-danger label-mini">
                                                                            Fix it
                                                                            <i class="icon-share-alt"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">30 mins ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-warning">
                                                                        <i class="fa fa-fw fa-hand-o-left"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">Disk space to 85% full.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">45 mins ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-success">
                                                                        <i class="fa fa-fw fa-desktop"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">CPU load normal</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">1 hour ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-info">
                                                                        <i class="fa fa-fw fa-flask"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">Download finished.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">1.5 hours ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-danger">
                                                                        <i class="fa fa-fw fa-cog"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">User data successfully synced.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">2 hours ago</div>
                                                        </div>
                                                    </li>
                                                    <li class="hoverable">
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-info">
                                                                        <i class="fa fa-fw fa-flask"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New items are in queue.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">8 hours ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-danger">
                                                                        <i class="fa fa-fw fa-desktop"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">
                                                                        High CPU load.
                                                                        <span class="label label-danger label-mini">
                                                                            Fix it
                                                                            <i class="icon-share-alt"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">12 hours ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-warning">
                                                                        <i class="fa fa-fw fa-hand-o-left"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">Disk space to 85% full.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">1 day ago</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab_feed_2">
                                            <div id="slim1">
                                                <ul class="feeds clearfix">
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-success">
                                                                        <i class="fa fa-fw fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New user registered.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">1 min ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-success">
                                                                        <i class="fa fa-fw fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New user registered.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">5 mins ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-info">
                                                                        <i class="fa fa-fw fa-check"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New order received.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">10 mins ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-success">
                                                                        <i class="fa fa-fw fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New user registered.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">20 mins ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-info">
                                                                        <i class="fa fa-fw fa-check"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New order received.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">30 mins ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-success">
                                                                        <i class="fa fa-fw fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New user registered.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">40 mins ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-info">
                                                                        <i class="fa fa-fw fa-check"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New order received.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">50 mins ago</div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="content">
                                                                <div class="content-col1">
                                                                    <div class="label label-success">
                                                                        <i class="fa fa-fw fa-user"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="content-col2">
                                                                    <div class="desc">New user registered.</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">1 hour ago</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <div id="qn"></div>
            <!-- /.content -->
@stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/sparklinecharts/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.pie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.time.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/splinecharts/jquery.flot.spline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/flot.tooltip/js/jquery.flot.tooltip.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/toastr/js/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/QuickNote-jQuery-Plugin/jquery.quicknote.js') }}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/js/custom_js/style_switcher_index.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/dashboard.js') }}" type="text/javascript"></script>
    @stop