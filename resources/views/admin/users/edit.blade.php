@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
	@parent Edit User
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
			<li>
				<a href="">
					Users
				</a>
			</li>
			<li>
				<a href="">
					Edit User
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
							Edit user
						</h3>
						<span class="pull-right">
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            {{--<i class="fa fa-fw fa-times removepanel clickable"></i>--}}
                        </span>
					</div>
					<div class="panel-body">
						<!--main content-->
						<div class="position-center">
							<form id="tryitForm" class="form-horizontal" method="POST"
							      action="{{ URL::to('admin/user/' . $data['user']['id'] . '/edit') }}">
								{{ csrf_field() }}
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('first_name', 'has-error') }}">
											<label class="col-lg-2 control-label" for="first_name">First Name <span
													style="color: red;">*</span></label>
											<div class="col-lg-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-fw fa-user-md text-primary"></i>
													</span>
													<input type="text" name="first_name"
													       id="first_name" class="form-control"
													       value="{{ $data['user']['first_name'] }}"
													       required=""/>
												</div>
												{!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
											</div>
										
										</div>
										
										<div class="form-group {{ $errors->first('last_name', 'has-error') }}">
											<label class="col-lg-2 control-label" for="last_name">Last Name <span
													style="color: red;">*</span></label>
											<div class="col-lg-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-fw fa-user-md text-primary"></i>
													</span>
													<input type="text" placeholder="last name" name="last_name"
													       id="last_name" class="form-control"
													       value="{{ $data['user']['last_name'] }}"
													       required=""/>
												</div>
												{!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
											</div>
										
										</div>
										
										<div class="form-group {{ $errors->first('email', 'has-error') }}">
											<label class="col-lg-2 control-label" for="email">Email <span
													style="color: red;">*</span></label>
											<div class="col-lg-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-fw fa-envelope text-primary"></i>
													</span>
													<input type="text" id="email" name="email"
													       class="form-control"
													       value="{{ $data['user']['email'] }}"></div>
												{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
											</div>
										
										</div>
										
										<div class="form-group">
											<label class="col-md-2 control-label">Role <span
													style="color: red;">*</span></label>
											<div class="col-md-6">
												<div class="radio">
													<label>
														<input type="radio" name="role" value="Administrator"
														       @if($data['user']['role'] == "Administrator") checked="checked" @endif />
														Administrator
													</label>
												</div>
												<div class="radio">
													<label>
														<input type="radio" name="role" value="Authenticated User"
														       @if($data['user']['role'] == "Authenticated User") checked="checked" @endif />
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
												<input type="submit" class="btn btn-primary" name="save"
												       value="Update"/>
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
	<script src="{{ asset('admin/assets/js/custom_js/edit_user.js') }}" type="text/javascript"></script>
@stop