@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
	@parent Add New User
@stop

{{-- page level styles --}}
@section('header_styles')
	<link href="{{ asset('admin/assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}"
	      rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/iCheck/css/minimal/blue.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/css/custom_css/addnew_user.css') }}" rel="stylesheet"/>
@stop

{{-- Page content --}}
@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Users
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{ URL::to('admin/dashboard') }}">
					<i class="fa fa-fw fa-home"></i>
					Dashboard
				</a>
			</li>
			<li><a href="">Users</a></li>
			<li>
				<a href="{{ URL::to('admin/user/add') }}">Add New User</a>
			</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="fa fa-fw fa-user"></i>
							Add New User
						</h3>
						<span class="pull-right">
							<a href="{{ URL::to('/admin/users') }}" style="color: #fff;" title="Manage Users">
								<i class="fa fa-fw fa-eye" style="height: 15px; font-size: 12px;"></i>
							</a>
							<i class="fa fa-fw fa-chevron-up clickable"></i>
							{{--<i class="fa fa-fw fa-times removepanel clickable"></i>--}}
						</span>
					</div>
					<div class="panel-body">
						<!--main content-->
						<div class="position-center">
							
							<form id="tryitForm" class="form-horizontal" method="POST"
							      action="{{ URL::to('admin/user/add') }}">
								
								{{ csrf_field() }}
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('first_name', 'has-error') }}">
											<label class="col-lg-2 control-label" for="first_name">
												First Name
												<span style="color: red;">*</span>
											</label>
											<div class="col-lg-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-fw fa-user-md text-primary"></i>
													</span>
													<input type="text" name="first_name" id="first_name"
													       class="form-control" value="{!! old('first_name') !!}"
													       required autofocus/>
												</div>
												{!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
										
										<div class="form-group {{ $errors->first('last_name', 'has-error') }}">
											<label class="col-lg-2 control-label" for="last_name">
												Last Name
												<span style="color: red;">*</span>
											</label>
											<div class="col-lg-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-fw fa-user-md text-primary"></i>
													</span>
													<input type="text" name="last_name" id="last_name"
													       class="form-control" value="{!! old('last_name') !!}"
													       required/>
												</div>
												{!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
										
										<div class="form-group {{ $errors->first('email', 'has-error') }}">
											<label class="col-lg-2 control-label" for="email">
												Email
												<span style="color: red;">*</span>
											</label>
											<div class="col-lg-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-fw fa-envelope text-primary"></i>
													</span>
													<input type="text" placeholder="" id="email" name="email"
													       class="form-control" value="{!! old('email') !!}"/>
												</div>
												{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
										
										<div class="form-group {{ $errors->first('password', 'has-error') }}">
											<label class="col-lg-2 control-label" for="password">
												Password
												<span style="color: red;">*</span>
											</label>
											<div class="col-lg-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-fw fa-key text-primary"></i>
													</span>
													<input type="password" name="password" placeholder="" id="password"
													       class="form-control"/>
												</div>
												{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
										
										<div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
											<label class="col-lg-2 control-label" for="password_confirm">
												Confirm Password
												<span style="color: red;">*</span>
											</label>
											<div class="col-lg-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-fw fa-key text-primary"></i>
													</span>
													<input type="password" name="password_confirm" id="password_confirm"
													       class="form-control"/>
												</div>
												{!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-2 control-label">
												Role
												<span style="color: red;">*</span>
											</label>
											<div class="col-md-6">
												<div class="radio">
													<label>
														<input type="radio" name="role" value="Administrator"/>
														Administrator
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="role" value="Authenticated User"/>
														Authenticated User
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group">
											<div class="col-lg-offset-2 col-lg-10">
												<input type="submit" class="btn btn-primary" name="save" value="Save"/>
												<a {{--href="{{ URL::previous() }}"--}}href="{{ URL::current() }}"
												   class="btn btn-default" role="button">
													Cancel
												</a>
											</div>
										</div>
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
	<script src="{{ asset('admin/assets/js/custom_js/addnew_user.js') }}" type="text/javascript"></script>
@stop