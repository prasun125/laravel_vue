@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
	@parent Edit Vehicle
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
				<a href="">
					Edit Vehicle
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
		@if(session()->has('error'))
			<div class="alert alert-danger">
				{{ session()->get('error') }}
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
							<i class="fa fa-fw fa-car"></i>
							Edit Vehicle
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
							      action="{{ URL::to('vehicle/'. $data['id'] . '/edit') }}">
								{{ csrf_field() }}
								<input type="hidden" name="image_id" value="{{ $data['image_id'] }}">
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('vehicle_image', 'has-error') }}">
											<label class="col-lg-2 control-label" for="vehicle_image">Vehicle Image<span
													style="color: red;">*</span></label>
											<div class="col-lg-6">
												<input type="file" name="vehicle_image" class="form-control" accept=".jpg, .jpeg, .png, .svg"/>
												{{--{!! $errors->first('vehicle_image', '<span class="help-block">:message</span>') !!}--}}
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
												       value="{{ $data['vehicle_name'] }}"/>
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
												<input type="checkbox" name="driver_inclusion" @if (!empty($data['driver_inclusion']) AND $data['driver_inclusion'] == 1) checked @endif/>
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
												       @if (!empty($data['passenger'])) value="{{ $data['passenger'] }}" @endif/>
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
												       @if (!empty($data['door'])) value="{{ $data['door'] }}" @endif/>
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
												       @if (!empty($data['bag'])) value="{{ $data['bag'] }}" @endif/>
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
												<textarea id="description" name="description" rows="7" class="form-control resize_vertical" placeholder="Enter your message" data-bv-field="message">{{ $data['description'] }}</textarea>
												<small class="help-block" data-bv-validator="notEmpty" data-bv-for="description" data-bv-result="NOT_VALIDATED" style="display: none;">This field is required and cannot be empty</small>
											</div>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('inclusion', 'has-error') }}">
											<label class="col-lg-2 control-label" for="inclusion">Inclusion</label>
											@foreach ($data['inclusion'] as $index => $inclusion)
											    @if (!empty($inclusion) AND $inclusion != null)
											        @if ($index == 0)
														<div class="input-group control-group increment col-lg-6" style="padding: 0 15px;">
															<input type="text" name="inclusion[]" class="form-control" value="{{ $inclusion }}">
															<div class="input-group-btn">
																<button class="btn btn-success" type="button" style="outline: none;">
																	<i class="glyphicon glyphicon-plus"></i>
																	Add
																</button>
															</div>
														</div>
											        @else
														<div class="control-group input-group col-lg-6" style="margin-top:10px; margin-left: 17%; padding: 0 15px;">
															<input type="text" name="inclusion[]" class="form-control" value="{{ $inclusion }}">
															<div class="input-group-btn">
																<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
															</div>
														</div>
											        @endif
											    @endif
											@endforeach
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
												       @if (!empty($data['price'])) value="{{ $data['price'] }}" @endif step="any"/>
												{!! $errors->first('price', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group">
											<div class="col-lg-offset-2 col-lg-10">
												<input type="submit" class="btn btn-primary" name="update"
												       value="Update"/>
												<a {{--href="{{ URL::previous() }}"--}}href=""
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
		});
	</script>
@stop