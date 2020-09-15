@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
	@parent Add New City
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
			Cities
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
					Cities
				</a>
			</li>
			<li>
				<a href="{{ URL::to('admin/city/add') }}">
					Add New City
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
							<i class="fa fa-fw fa-map-marker"></i>
							Add New City
						</h3>
						<span class="pull-right">
							<a href="{{ URL::to('/admin/cities') }}" style="color: #fff;" title="Manage Cities">
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
							      action="{{ URL::to('admin/city/add') }}" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('city_name', 'has-error') }}">
											<label class="col-lg-2 control-label" for="city_name">City Name <span
													style="color: red;">*</span></label>
											<div class="col-lg-6">
												<input type="text" name="city_name"
												       id="city_name" class="form-control"
												       value="{!! old('city_name') !!}" required autofocus
												       autocomplete="on"/>
												{!! $errors->first('city_name', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
										
										<div id="map1"></div>
										{{--<div id="infowindow-content" style="height: 0;">
											<span id="place-name"  class="title"></span><br>
											<span id="place-id"></span><br>
											<span id="place-address"></span><br>
											<span id="place-latitude"></span><br>
											<span id="place-longitude"></span>
										</div>--}}
										<div id="infowindow-content" style="height: 0;">
											<input type="hidden" id="place-id" name="place_id"><br>
										</div>
									</div>
								</div>
								@if(Session::has('error'))
									<div class="col-lg-12">
										{{--<div class="col-xs-12">--}}
											<div class="alert alert-danger">
												{{ Session::get('error')}}
												<input type="checkbox" id="check_nearest_city" name="check_nearest_city">
											</div>
										{{--</div>--}}
									</div>
								@endif
								<div class="cd-block" id="nearest_city">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('nearest_address', 'has-error') }}">
											<label class="col-lg-2 control-label" for="nearest_address">Nearest Address
												{{--<span style="color: red;">*</span>--}}
											</label>
											<div class="col-lg-6">
												<input type="text" name="nearest_address"
												       id="nearest_address" class="form-control"
												       value="{!! old('nearest_address') !!}"/>
												{!! $errors->first('nearest_address', '<span class="help-block">:message</span>') !!}
											</div>
										</div>
										
										<div id="map2"></div>
										<div id="infowindow-content2" style="height: 0;">
											<input type="hidden" id="nearest_address_place-id" name="nearest_address_place_id"><br>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('city_name', 'has-error') }}">
											<label class="col-lg-2 control-label" for="city_name">City Image<span
													style="color: red;">*</span></label>
											<div class="input-group control-group increment col-lg-6" style="padding: 0 15px;">
												<input type="file" name="filename[]" class="form-control" required>
												<div class="input-group-btn">
													<button class="btn btn-success" type="button" style="outline: none;"><i class="glyphicon glyphicon-plus"></i>Add</button>
												</div>
											</div>
											<div class="clone hide">
												<div class="control-group input-group col-lg-6" style="margin-top:10px; margin-left: 17%; padding: 0 15px;">
													<input type="file" name="filename[]" class="form-control" required>
													<div class="input-group-btn">
														<button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
													</div>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">
										Suggested Destination
									</label>
									<div class="col-md-6">
										<div class="radio">
											<label>
												<input type="checkbox" name="suggested_destination">
											</label>
										</div>
									</div>
								</div>
								<div class="cd-block">
									<div class="cd-content">
										<div class="form-group {{ $errors->first('priority', 'has-error') }}">
											<label class="col-lg-2 control-label" for="priority">Priority</label>
											<div class="col-lg-6">
												<input type="number" name="priority"
												       id="priority" class="form-control"
												       value="{!! old('priority') !!}"/>
												{!! $errors->first('priority', '<span class="help-block">:message</span>') !!}
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
												<textarea id="description" name="description" rows="7" class="form-control resize_vertical" placeholder="Enter your message" data-bv-field="message"></textarea>
												<small class="help-block" data-bv-validator="notEmpty" data-bv-for="description" data-bv-result="NOT_VALIDATED" style="display: none;">This field is required and cannot be empty</small>
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
	<script type="text/javascript"
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs&libraries=places"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			let options = {
				componentRestrictions: {country: "cu"}
			};
			let map = new google.maps.Map(document.getElementById('map1'), {
				center: {lat: -33.8688, lng: 151.2195},
				zoom: 13
			});
			let input = document.getElementById('city_name');
			let autocomplete = new google.maps.places.Autocomplete(input, options);
			autocomplete.bindTo('bounds', map);
			map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
			let infowindow = new google.maps.InfoWindow();
			let infowindowContent = document.getElementById('infowindow-content');
			infowindow.setContent(infowindowContent);
			autocomplete.addListener('place_changed', function () {
				infowindow.close();
				let place = autocomplete.getPlace();
				/*infowindowContent.children['place-name'].textContent = place.name;
				infowindowContent.children['place-id'].textContent = place.place_id;
				infowindowContent.children['place-address'].textContent = place.formatted_address;
				infowindowContent.children['place-latitude'].textContent = place.geometry.location.lat();
				infowindowContent.children['place-longitude'].textContent = place.geometry.location.lng();*/
				infowindowContent.children['place-id'].value = place.place_id;
				console.log(place.place_id);
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			let options = {
				componentRestrictions: {country: "cu"}
			};
			let map = new google.maps.Map(document.getElementById('map2'), {
				center: {lat: -33.8688, lng: 151.2195},
				zoom: 13
			});
			let input = document.getElementById('nearest_address');
			let autocomplete = new google.maps.places.Autocomplete(input, options);
			autocomplete.bindTo('bounds', map);
			map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
			let infowindow = new google.maps.InfoWindow();
			let infowindowContent = document.getElementById('infowindow-content2');
			infowindow.setContent(infowindowContent);
			autocomplete.addListener('place_changed', function () {
				infowindow.close();
				let place = autocomplete.getPlace();
				infowindowContent.children['nearest_address_place-id'].value = place.place_id;
				console.log(place.place_id);
			});
		});
	</script>
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