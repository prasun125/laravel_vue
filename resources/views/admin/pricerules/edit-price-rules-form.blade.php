@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
	@parent Edit Price Rule
@stop

{{-- page level styles --}}
@section('header_styles')
	<link href="{{ asset('admin/assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}"
	      rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/iCheck/css/minimal/blue.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/select2/css/select2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/css/custom_css/addnew_user.css') }}" rel="stylesheet">
@stop


{{-- Page content --}}
@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Price Rules</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{ URL::to('admin/dashboard') }}">
					<i class="fa fa-fw fa-home"></i>
					Dashboard
				</a>
			</li>
			<li>
				<a href="">
					Price Rules
				</a>
			</li>
			<li>
				<a href="">
					Edit Price Rule
				</a>
			</li>
		</ol>
	</section>
	<div class="panel-body">
		@if(session()->has('status'))
			<div class="alert alert-success">
				{{ session()->get('status') }}
			</div>
		@endif
	</div>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="fa fa-fw fa-edit"></i>
							Edit Price Rule
						</h3>
						<span class="pull-right">
							<i class="fa fa-fw fa-chevron-up clickable"></i>
							{{--<i class="fa fa-fw fa-times removepanel clickable"></i>--}}
						</span>
					</div>
					<div class="panel-body">
						<!--main content-->
						<div class="position-center">
							<form action="{{ URL::to('admin/price-rule/'. $data['priceRules']['id'] . '/edit') }}"
							      method="POST" class="form-horizontal">
								{{ csrf_field() }}
								<div class="form-body">
									<div class="form-group pad-top40">
										<label for="min_distance" class="col-md-3 control-label">
											Minimum Distance <span style="color: red;">*</span>
										</label>
										<div class="col-md-6">
											<input type="text" id="example-text-input" name="min_distance"
											       value="{{ $data['priceRules']['min_distance'] }}"
											       class="form-control" required autofocus>
										</div>
									</div>
									<div class="form-group">
										<label for="max_distance" class="col-md-3 control-label">
											Maximum Distance <span style="color: red;">*</span>
										</label>
										<div class="col-md-6">
											<input type="text" id="example-text-input" name="max_distance"
											       value="{{ $data['priceRules']['max_distance'] }}"
											       class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label for="min_hour" class="col-md-3 control-label">
											Minimum Hours <span style="color: red;">*</span>
										</label>
										<div class="col-md-6">
											<input type="text" id="example-text-input" name="min_hour"
											       value="{{ $data['priceRules']['min_hour'] }}" class="form-control"
											       required>
										</div>
									</div>
									<div class="form-group">
										<label for="max_hour" class="col-md-3 control-label">
											Maximum Hours <span style="color: red;">*</span>
										</label>
										<div class="col-md-6">
											<input type="text" id="example-text-input" name="max_hour"
											       value="{{ $data['priceRules']['max_hour'] }}" class="form-control"
											       required>
										</div>
									</div>
									<div class="form-group">
										<label for="cost" class="col-md-3 control-label">
											Cost <span style="color: red;">*</span>
										</label>
										<div class="col-md-6">
											<input type="text" id="example-text-input" name="cost"
											       value="{{ $data['priceRules']['cost'] }}" class="form-control"
											       required>
										</div>
									</div>
								</div>
								<div class="form-actions" id="mrg_left9">
									<div class="col-md-offset-3 col-md-9">
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
								</div>
							</form>
						</div>
						<!--main content end-->
					</div>
				</div>
			</div>
		</div>
		<!--row end-->
	</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
	<script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"
	        type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
	        type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
	<script src="{{ asset('admin/assets/vendors/vertical-timeline/js/modernizr.js') }}"></script>
	<script src="{{ asset('admin/assets/js/custom_js/edit_user.js') }}" type="text/javascript"></script>
@stop