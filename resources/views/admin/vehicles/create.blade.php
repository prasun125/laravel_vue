@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
	@parent Add New Vehicle
@stop

{{-- page level styles --}}
@section('header_styles')
	<link href="{{ asset('admin/assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}"
	      rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/iCheck/css/minimal/blue.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet"/>
	<link href="{{ asset('admin/assets/css/custom_css/addnew_user.css') }}" rel="stylesheet">
	<style>
		.display-none {
			display: none;
		}
	</style>
@stop

{{-- Page content --}}
@section('content')
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Vehicles
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
					Vehicles
				</a>
			</li>
			<li>
				<a href="{{ URL::to('/admin/vehicle/add') }}">
					Add New Vehicle
				</a>
			</li>
		</ol>
	</section>
	
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="fa fa-car"></i>
							Add New Vehicle
						</h3>
						<span class="pull-right">
							<a href="{{ URL::to('/admin/vehicles') }}" style="color: #fff;" title="Manage Cities">
								<i class="fa fa-fw fa-eye" style="height: 15px; font-size: 12px;"></i>
							</a>
							<i class="fa fa-fw fa-chevron-up clickable"></i>
							<i class="fa fa-fw fa-times removepanel clickable"></i>
						</span>
					</div>
					<div class="panel-body">
						<!--main content-->
						<div class="position-center">
							
							<form id="tryitForm" class="form-horizontal" method="POST"
							      action="{{ URL::to('create-vehicle') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('vehicle_image', 'has-error') }}">
											<label class="col-lg-2 control-label" for="vehicle_image">Vehicle Image<span
													style="color: red;">*</span></label>
											<div class="col-lg-6">
												<input type="file" name="vehicle_image" class="form-control" accept=".jpg, .jpeg, .png, .svg" required/>
											</div>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('vehicle_name', 'has-error') }}">
											<label class="col-lg-2 control-label" for="vehicle_name">Vehicle Name<span
													style="color: red;">*</span></label>
											<div class="col-lg-6">
												<input type="text" name="vehicle_name"
												       id="vehicle_name" class="form-control"
												       value="{!! old('vehicle_name') !!}" required/>
												{!! $errors->first('vehicle_name', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">
										Driver Inclusion
									</label>
									<div class="col-md-6">
										<div class="radio">
											<label>
												<input type="checkbox" name="driver_inclusion">
											</label>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('passenger', 'has-error') }}">
											<label class="col-lg-2 control-label" for="passenger">Passenger</label>
											<div class="col-lg-6">
												<input type="number" name="passenger"
												       id="passenger" class="form-control"
												       value="{!! old('passenger') !!}"/>
												{!! $errors->first('passenger', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('door', 'has-error') }}">
											<label class="col-lg-2 control-label" for="door">Door</label>
											<div class="col-lg-6">
												<input type="number" name="door"
												       id="door" class="form-control"
												       value="{!! old('door') !!}"/>
												{!! $errors->first('door', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('bag', 'has-error') }}">
											<label class="col-lg-2 control-label" for="bag">Bag</label>
											<div class="col-lg-6">
												<input type="number" name="bag"
												       id="bag" class="form-control"
												       value="{!! old('bag') !!}"/>
												{!! $errors->first('bag', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group">
											<label class="col-lg-2 control-label" for="description">
												Description
											</label>
											<div class="col-lg-6">
												<textarea id="description" name="description" rows="7" class="form-control resize_vertical" data-bv-field="message"></textarea>
												<small class="help-block" data-bv-validator="notEmpty" data-bv-for="description" data-bv-result="NOT_VALIDATED" style="display: none;">
													This field is required and cannot be empty
												</small>
											</div>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('inclusion', 'has-error') }}">
											<label class="col-lg-2 control-label" for="inclusion">Inclusion</label>
											<div class="input-group control-group increment col-lg-6" style="padding: 0 15px;">
												<input type="text" name="inclusion[]" class="form-control">
												<div class="input-group-btn">
													<button class="btn btn-success" type="button" style="outline: none;"><i class="glyphicon glyphicon-plus"></i>Add</button>
												</div>
											</div>
											<div class="clone hide">
												<div class="control-group input-group col-lg-6" style="margin-top:10px; margin-left: 17%; padding: 0 15px;">
													<input type="text" name="inclusion[]" class="form-control">
													<div class="input-group-btn">
														<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('price', 'has-error') }}">
											<label class="col-lg-2 control-label" for="bag">Price</label>
											<div class="col-lg-6">
												<input type="number" name="price"
												       id="price" class="form-control"
												       value="{!! old('price') !!}" step="any"/>
												{!! $errors->first('price', '<span class="help-block">:message</span>') !!}
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
	<script type="text/javascript">
		$(document).ready(function() {
			$(".btn-success").click(function(){
				let html = $(".clone").html();
				console.log(html);
				$(".increment").after(html);
			});
			$("body").on("click",".btn-danger",function(){
				$(this).parents(".control-group").remove();
			});
			/*$('#check_nearest_city').on('ifChecked', function(event){
				//alert(event.type + ' callback');
				$('#nearest_city').removeClass('display-none');
			}).on('ifUnchecked', function(event){
				$('#nearest_city').addClass('display-none');
			});*/
		});
	</script>
@stop