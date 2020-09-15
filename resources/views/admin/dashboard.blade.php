@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
	@parent Dashboard
@stop

{{-- page level styles --}}
@section('header_styles')
	<link href="{{ asset('admin/assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
	      type="text/css"/>
	<link href="{{ asset('admin/assets/vendors/toastr/css/toastr.css') }}" rel="stylesheet" type="text/css"/>
	<link href="{{ asset('admin/assets/vendors/QuickNote-jQuery-Plugin/jquery.quicknote.css') }}" rel="stylesheet"
	      type="text/css"/>
	<link href="{{ asset('admin/assets/css/custom_css/toastr.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/css/custom_css/dashboard.css') }}" rel="stylesheet" type="text/css"/>
@stop

{{-- Page content --}}
@section('content')
	<section class="content-header">
		<!--section starts-->
		<h1>
			Welcome To Dashboard
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{ URL::to('admin/dashboard') }}">
					<i class="fa fa-fw fa-home"></i>
					Dashboard
				</a>
			</li>
		</ol>
	</section>
	<!--section ends-->
	<section class="content">
		<div class="row row-spacing" style="display: none;">
			<div class="col-md-12">
				<div class="panel panel-default1">
					<div class="panel-heading">
						<span class="panel-title">
							Site Activity
						</span>
						<ul class="nav nav-tabs nav-float" role="tablist">
							<li class="active">
								<a href="" role="tab" data-toggle="tab">
									Stats
								</a>
							</li>
							<li>
								<a href="" role="tab" data-toggle="tab">
									Sales
								</a>
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
											<small class="pull-right text-muted">
												40%
											</small>
											<div class="progress progress-sm">
												<div role="progressbar" aria-valuenow="40" aria-valuemin="0"
												     aria-valuemax="100" style="width: 40%;"
												     class="progress-bar progress-bar-primary">
													<span class="sr-only">
														40% Complete (success)
													</span>
												</div>
											</div>
										</div>
										Product delivered
										<small class="pull-right text-muted">
											60%
										</small>
										<div class="progress progress-sm">
											<div role="progressbar" aria-valuenow="60" aria-valuemin="0"
											     aria-valuemax="100" style="width: 60%;"
											     class="progress-bar progress-bar-success">
												<span class="sr-only">
													60% Complete (success)
												</span>
											</div>
										</div>
										Sale reports
										<small class="pull-right text-muted">
											55%
										</small>
										<div class="progress progress-sm">
											<div role="progressbar" aria-valuenow="55" aria-valuemin="0"
											     aria-valuemax="100" style="width: 55%;"
											     class="progress-bar progress-bar-info">
												<span class="sr-only">
													55% Complete (success)
												</span>
											</div>
										</div>
										New Projects
										<small class="pull-right text-muted">
											66%
										</small>
										<div class="progress progress-sm">
											<div role="progressbar" aria-valuenow="66" aria-valuemin="0"
											     aria-valuemax="100" style="width: 66%;"
											     class="progress-bar progress-bar-warning">
												<span class="sr-only">
													66% Complete (success)
												</span>
											</div>
										</div>
										New Users
										<small class="pull-right text-muted">
											90%
										</small>
										<div class="progress progress-sm">
											<div role="progressbar" aria-valuenow="90" aria-valuemin="0"
											     aria-valuemax="100" style="width: 90%;"
											     class="progress-bar progress-bar-danger">
												<span class="sr-only">
													90% Complete (success)
												</span>
											</div>
										</div>
										Total income
										<small class="pull-right text-muted">
											50%
										</small>
										<div class="progress progress-sm">
											<div role="progressbar" aria-valuenow="50" aria-valuemin="0"
											     aria-valuemax="100" style="width: 50%;"
											     class="progress-bar progress-bar-primary">
												<span class="sr-only">
													50% Complete (success)
												</span>
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
									<h5>
										This year total sales
									</h5>
									<h4>
										<strong>
											$2,111,234
										</strong>
									</h4>
								</div>
							</div>
							<div class="col-md-12 col-lg-9">
								<div class="row">
									<div class="col-xs-6 col-sm-3 text-center">
										<img src="{{ asset('admin/assets/img/flags/au.png') }}" alt="img"/>
										<h5>
											<strong>
												$14,123
											</strong>
										</h5>
									</div>
									<div class="col-xs-6 col-sm-3 text-center">
										<div>
											<img src="{{ asset('admin/assets/img/flags/ca.png') }}" alt="img"/>
											<h5>
												<strong>
													$22,342
												</strong>
											</h5>
										</div>
									</div>
									<div class="col-xs-6 col-sm-3 text-center">
										<div>
											<img src="{{ asset('admin/assets/img/flags/uk.png') }}" alt="img"/>
											<h5>
												<strong>
													$12,112
												</strong>
											</h5>
										</div>
									</div>
									<div class="col-xs-6 col-sm-3 text-center">
										<div>
											<img src="{{ asset('admin/assets/img/flags/us.png') }}" alt="img"/>
											<h5>
												<strong>
													$88,321
												</strong>
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
			<div class="col-md-12">
				<div class="panel panel-default1">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table1 table bottom-pad" id="users">
								<tr>
									<td class="bodr">
										Users : {{ $data['countUsers'] }}
									</td>
									<td class="bodr">
										<span class="pull-right mini-graph"></span>
									</td>
								</tr>
								<tr>
									<td>
										Cities : {{ $data['countCities'] }}
									</td>
									<td>
										<span class=" pull-right mini-graph2"></span>
									</td>
								</tr>
								<tr>
									<td>
										City's Distance Time : {{ $data['cityDistanceTimes'] }}
									</td>
									<td>
										<span class=" pull-right mini-graph3"></span>
									</td>
								</tr>
								<tr>
									<td>
										Price Rules : {{ $data['priceRules'] }}
									</td>
									<td>
										<span class=" pull-right mini-graphpie"></span>
									</td>
								</tr>
								{{--<tr>
									<td>
										Pageviews : 1,200
									</td>
									<td>
										<span class=" pull-right mini-graph5"></span>
									</td>
								</tr>--}}
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="display: none;">
				<div class="panel panel-default1">
					<div class="panel-body">
						<div class="tab-pane" id="messages">
							<div class="row">
								<div class="col-md-12 col-xs-12">
									<div class="demo-container">
										<span class="ser-load">
											Server Load
										</span>
										<div id="chart3" class="ser"></div>
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
	<script src="{{ asset('admin/assets/vendors/sparklinecharts/jquery.sparkline.js') }}"
	        type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.js') }}" type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.resize.js') }}"
	        type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.pie.js') }}" type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/flotchart/js/jquery.flot.time.js') }}" type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/splinecharts/jquery.flot.spline.js') }}"
	        type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/flot.tooltip/js/jquery.flot.tooltip.js') }}"
	        type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}"
	        type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js') }}"
	        type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/toastr/js/toastr.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/QuickNote-jQuery-Plugin/jquery.quicknote.js') }}"
	        type="text/javascript"></script>
	
	<script src="{{ asset('admin/assets/js/custom_js/dashboard.js') }}" type="text/javascript"></script>
@stop