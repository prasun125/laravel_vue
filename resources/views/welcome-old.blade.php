@extends('layouts.app')
@section('custom-css')
	<link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
@endsection
@section('content')
	<div class="container-fluid">
		<div class="row">
		{{--	<div class="homepage-image">
				<img src="{{asset('assets/images/homepage3.jpg')}}" height="600px" alt="" style="height: 669px;">
				<div class="country-name">
					<h1>cuba</h1>
					<h4>we make it easy for you to explore</h4>
				</div>
				<div class="menu-options display-flex-center">
					
					<div class="options display-flex center-justify-content flex-wrap">
						
						<form class="form-inline display-flex-center search-bar" action="{{ URL::to('trip-planner') }}" style="width: 100%; height: 64%; position: relative" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="type" value="form-submit">
							<div class="form-group havana">
                                <span class="pickup_location_container">
                                    <span class="pickup_location_logo" style=" vertical-align: middle;">
                                        <i class="material-icons primary-color" style="opacity: 0.5;">location_on</i>
                                    </span>
                                    --}}{{--<input type="text" class="form-control city_name" name="city_name" style="width: 80%; margin-bottom: 12px; padding-left: 0;" placeholder="Pick up location">--}}{{--

									<select name="pick_up_location" id="pick_up_location" style="width: 80%; background-color: white;" required>
										<option value="" selected> select location</option>
										<option v-for="item in destinationList" v-bind:names="item" is="destination-list"></option>
									</select>
									
                                </span>
								--}}{{--<div id="search_result"></div>--}}{{--
							</div>
							
							<div class="form-group dates">
                                <span>
                                    <span style="display: inline; margin-top: 10px;">
                                        <i class="material-icons primary-color" style="opacity: 0.5;">event</i>
                                    </span>
                                    <input type='text' name="start_date" class="form-control" id="datetimepicker1" placeholder="Pick up date" required style="width: 80%; margin-bottom: 12px; padding-left: 0;"/>
                                </span>
							</div>
							<div class="form-group dates1">
                                <span>
                                    <span style="display: inline; margin-top: 10px;">
                                        <i class="material-icons primary-color" style="opacity: 0.5;">event</i>
                                    </span>
                                    <input type='text' name="end_date" class="form-control" id="datetimepicker2" required placeholder="end date"
                                           style="width: 80%; margin-bottom: 12px; padding-left: 0;"/>
                                </span>
							</div>
							<div class="form-group travellers1">
                                <span style="display: inline; margin-top: 10px;">
                                    <i class="material-icons primary-color" style="opacity: 0.5;">people</i>
                                </span>
								<select class="form-control selectpicker" id="sel1" name="traveller" required style="width: 80%; margin-bottom: 12px; padding-left: 0;">
									<option value="" selected>Travellers</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>
							<div class="form-group travellers">
                                <span style="display: inline; margin-top: 10px;">
                                    <i class="material-icons primary-color" style="opacity: 0.5;">directions_car</i>
                                </span>
								<select class="form-control" id="sel2" name="vehicle" required style="width: 80%; margin-bottom: 12px; padding-left: 0;">
									<option value="" selected>Choose your car</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>
							<div class="pick-up-airport responsive-show">
								<label class="container"><span>Airport Pickup</span>
									<input type="checkbox" name="airport_pickup">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="form-group start">
								<button type="submit" class="primary-background-color"
								        style="width: 100%; font-size: 24px; color: #ffffff; padding: 0; border-color: #00a680;">
									--}}{{--<i class="material-icons search-bar-icon" style="font-size: 44px;">
										search
									</i>
									<span class="search-bar-caption" style="display: none;">
										Search
									</span>--}}{{--
									start
								</button>
							</div>
							<div class="pick-up-airport responsive-hide">
								<label class="container"><span>Airport Pickup</span>
									<input type="checkbox" name="airport_pickup">
									<span class="checkmark"></span>
								</label>
							</div>
						
						</form>
					</div>
				</div>
				<a class="dArr belowIndicator" id="bouncer" href="javascript:void(0)"></a>
			</div>--}}
			<div class="search-block" style="background-image: url('{{asset('assets/images/homepage3.jpg')}}')">
				<div class="top-header">
					<span>Cuba on miles</span>
					<h4>We make it easy for you to explore!</h4>
				</div>


				<div class="search-bar-wrapper display-flex center-justify-content flex-wrap">

					<form class="" id="searchBar" action="{{ url('create-route') }}" style="width: 100%; height: 64%; position: relative" onsubmit="return validator()" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="type" value="form-submit">
						<div class="form-inline display-flex-center search-bar">
							<div class="form-group-search start-input">
								<div style="position: relative" class="full-width">
										<span class="input-icon">
                                       		 <i class="material-icons primary-color" style="opacity: 0.5;">location_on</i>
										</span>
									<select name="start_city_id" id="pick_up_location" required>
										<option value="" selected> Select location</option>
										@foreach($data as $key=>$value)
											<option value="{{ $value['id'] }}"> {{ $value['city_name'] }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group-search">
								<div style="position: relative" class="full-width">
										 <span class="input-icon">
											 <i class="material-icons primary-color" style="opacity: 0.5;">event</i>
										 </span>
									<input type='text' readonly required name="start_date" class="form-control " id="datetimepicker1"
										   placeholder="Pick up date"/>
								</div>
							</div>
							<div class="form-group-search">
								<div style="position: relative" class="full-width">
  										<span class="input-icon">
                                        	<i class="material-icons primary-color" style="opacity: 0.5;">event</i>
										</span>
									<input type='text' readonly required name="end_date" class="form-control" id="datetimepicker2" placeholder="end date"/>
								</div>

							</div>
							<div class="form-group-search">
								<div style="position: relative" class="full-width">
									<span class="input-icon">
                                    <i class="material-icons primary-color" style="opacity: 0.5;">people</i>
                               		 </span>
									<select class="form-control selectpicker" id="sel1" v-model="searchBarTravellers" v-on:change="travellersCheck()" required name="traveller">
										<option value="" selected>Travellers</option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
									</select>
								</div>

							</div>
							<div class="form-group-search">
								<div style="position:relative; border:none" class="full-width">
										<span class="input-icon">
                                    <i class="material-icons primary-color" style="opacity: 0.5;">directions_car</i>
                                </span>
									<select class="form-control selectpicker" required id="sel2" name="vehicle_type">
										<option value="" selected>Car Type</option>
										<option value="Car">Car</option>
										<option value="special">Special</option>
										<option value="Van">Van</option>
									</select>
								</div>

							</div>
							<div class="form-group-search end-input">
								<button type="submit" class="primary-background-color"
										style="width: 100%; font-size: 24px; color: #ffffff; padding: 0; border: none;">
									{{--<i class="material-icons search-bar-icon" style="font-size: 44px;">
                                        search
                                    </i>
                                    <span class="search-bar-caption" style="display: none;">
                                        Search
                                    </span>--}}
									start
								</button>
							</div>
						</div>
						<div class="pick-up-airport">
							<label class="container"><span>Airport Pickup</span>
								<input type="checkbox" name="airport_pickup">
								<span class="checkmark"></span>
							</label>
						</div>

					</form>
				</div>

				<div style="position: absolute; left: 50%; bottom: 20px;"><div class="down-arrow belowIndicator" id="bouncer"></div></div>

			</div>
			<div class="features display-flex-column" id="features">
				<div class="features-heading">
					<h2>Introducing Cuba on Miles</h2>
					
					<h4>Reshaping your way of travelling</h4>
				</div>
				<div class="container-fluid full-width">
					<div class="row  features-list" style="margin-left: 0px; margin-right: 0px;">
						<div class="col-md-4 routes display-flex-column">
							<img src="{{ asset('assets/logo/map.png') }}" height="60" width="60" alt="">
							<h4>visiting cuba?</h4>
							<ul style="min-width: 230px; max-width: 230px;">
								<li>pick one of our routes</li>
								<li>Modify a route you like</li>
								<li>Build your own route</li>
							</ul>
						
						</div>
						<div class="col-md-4 book display-flex-column">
							<img src="{{ asset('assets/logo/calendar.png') }}" height="55" width="60" alt="">
							<h4>book it</h4>
							<ul style="min-width: 230px; max-width: 230px;">
								<li>Choose your vehicle</li>
								<li>Pay now only deposit</li>
								<li>Print and share your plan with your friends</li>
							</ul>
						
						</div>
						
						<div class="col-md-4 ready display-flex-column">
							<img src="{{ asset('assets/logo/car.png') }}" height="55" width="60" alt="">
							<h4>ready to go</h4>
							<ul style="min-width: 230px; max-width: 230px;">
								<li>Holiday planned</li>
								<li>Start Packing</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="see-routes">
				<a href="{{ URL::to('all-routes') }}" class="primary-background-color">see all routes</a>
			</div>
			<div class="trending-routes display-flex-column">
				<div class="trending-routes-heading">
					<h2 style="padding-bottom: 25px">Trending Routes</h2>
				</div>
				<div class="swiper-button-prev"></div>
				
				<div class="swiper-container" style=" height: 470px; width:  90%;">
					
					<div class="swiper-wrapper" style="width: 90%">
						<div class="swiper-slide">
							<div><img src="{{asset('assets/images/homepage.jpg')}}" alt="">
								<p>Havana to Nicaro</p>
								<div class="full-width display-flex-center" style="bottom: 40%; position: relative;">
									<div class="slider-button"
									     style=" text-align: center;padding: 10px; background-color: transparent; /*border-radius: 50%;*/ vertical-align: middle; /* border: 1px solid white;*/ height: 70px; width: 70px; font-size: 13px;">
										<a href="" style="color: white; font-weight: bold;">Create</a></div>
								</div>
							</div>
						</div>
						<div class="swiper-slide"><img src="{{asset('assets/images/homepage1.jpg')}}" alt="">
							<p>Holguin to Wilson</p>
							<div class="full-width display-flex-center" style="bottom: 40%; position: relative;">
								<div class="slider-button"
								     style=" text-align: center;padding: 10px; background-color: transparent; /*border-radius: 50%;*/ vertical-align: middle; color: white; /* border: 1px solid white;*/ height: 70px; width: 70px; font-size: 13px;">
									<a href="" style="color: white; font-weight: bold;">Create</a></div>
							</div>
						</div>
						<div class="swiper-slide"><img src="{{asset('assets/images/homepage.jpg')}}" alt="">
							<p>Haiti to Soroa</p>
							<div class="full-width display-flex-center" style="bottom: 40%; position: relative;">
								<div class="slider-button"
								     style=" text-align: center;padding: 10px; background-color: transparent; /*border-radius: 50%;*/ vertical-align: middle; color: white; /*border: 1px solid white;*/ height: 70px; width: 70px; font-size: 13px;">
									<a href="" style="color: white; font-weight: bold; padding-top: 50%;">Create</a>
								</div>
							</div>
						</div>
						<div class="swiper-slide"><img src="{{asset('assets/images/homepage3.jpg')}}" alt="">
							<p>Herradura to La Boca</p>
							<div class="full-width display-flex-center" style="bottom: 40%; position: relative;">
								<div class="slider-button"
								     style=" text-align: center;padding: 10px; background-color: transparent; /*border-radius: 50%;*/ vertical-align: middle; color: white; /*border: 1px solid white;*/ height: 70px; width: 70px; font-size: 13px;">
									<a href="" style="color: white; font-weight: bold;">Create</a></div>
							</div>
						</div>
					</div>
					<div class="swiper-pagination"></div>
				
				</div>
				<div class="swiper-button-next"></div>
			</div>
			{{--<div class="see-routes">
				<a href="" class="primary-background-color">see all routes</a>
			</div>--}}
			<div class="welcome display-flex-column">
				<div class="features-heading">
					<h2>Welcome to Cuba</h2>
				</div>
				<div class="container-fluid full-width display-flex-center" style="height: 76%">
					<div class="row full-width features-list display-flex-center"
					     style="margin-left: 0px; margin-right: 0px; height: 100%;">
						<iframe width="92%" height="100%" src="https://www.youtube.com/embed/N4ZMYokojGw?rel=0"
						        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen
						        style="margin-bottom: 30px; z-index: 50;"></iframe>
					</div>
				</div>
			</div>
			<div class="start-planning">
				<a href="#" data-toggle="modal" data-target="#createModal" class="primary-background-color">start planning</a>
			</div>
			<div class="modal fade" id="createModal" role="dialog">
				<div class="modal-dialog custom-modal modal-lg">
					<div class="modal-content custom-modal-content">
						<div class="modal-header custom-modal-header">
							<button type="button" class="close" id="destination-close" data-dismiss="modal" style="font-size: 42px;">&times;</button>
							{{--<h4 class="modal-title">Add New Destination</h4>--}}
						</div>
						<div class="modal-body display-flex-column" style="height: 270px; padding: 0;">
							<h4 style="margin: 0; font-size: 31px; font-weight: bold;">Create Route</h4>
							<form action="{{ URL::to('create-route') }}" class="display-flex flex-direction-column align-items-center" method="post" onsubmit="return validation()" id="create-destination-form">
								{{ csrf_field() }}
								<input type="hidden" name="type" value="form-submit">
								<div class="display-flex space-between flex-direction-column" style="width: 100%; margin-bottom: 24px;">
									<div class="full-width display-flex flex-direction-row">
										<div class="col-md-8">
											<select name="start_city_id" id="destination-select" class="form-control" required>
												<option value="" selected>Select location</option>
												@foreach($data as $key=>$value)
													<option value="{{ $value['id'] }}"> {{ $value['city_name'] }}</option>
												@endforeach
											</select>
										</div>
										<div class=" select-start-date col-md-8" style="margin-bottom: 8px;">
											<input type='text' readonly name="start_date" id="start-create-date-picker" class="form-control "  placeholder="Pick up date"/>
										</div>
										<div class=" select-end-date col-md-8">
											<input type='text' readonly name="end_date" id="end-create-date-picker" class="form-control" placeholder="End date"/>
										</div>
									</div>
									<div class="full-width display-flex center-justify-content" style="margin-top: 16px;">
										<div class="form-group-search" style="margin-right: 32px;">
											<div style="position: relative" class="full-width">
                                        <span class="input-icon">
                                        {{--<i class="material-icons primary-color" style="opacity: 0.5;">people</i>--}}
                                         </span>
												<select class="form-control selectpicker" id="sel3" v-model="searchBarTravellers" v-on:change="travellersCheck1()" required name="traveller" >
													<option value="" selected>Travellers</option>
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
													<option>6</option>
													<option>7</option>
													<option>8</option>
												</select>
											</div>
										
										</div>
										<div class="form-group-search">
											<div style="position:relative; border:none" class="full-width">
                                            <span class="input-icon">
                                        {{--<i class="material-icons primary-color" style="opacity: 0.5;">directions_car</i>--}}
                                    </span>
												<select class="form-control selectpicker" required id="sel4" name="vehicle">
													<option value="" selected>Car Type</option>
													<option value="Car">Car</option>
													<option value="special">Special</option>
													<option value="Van">Van</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div style="">
									<button type="submit" class="btn btn-primary " style="width: 100% !important;">Create</button>
								</div>
							</form>
						</div>
						<div class="modal-footer custom-modal-footer">
							{{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
						</div>
					</div>
				</div>
			</div>
			<div class="start-planning" style="flex-direction: row; height: auto; flex-wrap: wrap; padding: 48px 32px;  background-color: #f5f8fa;">
				<img src="{{asset('assets/images/comodo-secure.png')}}" height="64" width="120"/>
				<img src="{{asset('assets/images/paypal.png')}}" height="64" width="120"/>
				<img src="{{asset('assets/images/sagepay.png')}}" height="64" width="120"/>
				<img src="{{asset('assets/images/visa.png')}}" height="64" width="120"/>
				<img src="{{asset('assets/images/mastercard.png')}}" height="64" width="120"/>
				<img src="{{asset('assets/images/maestrocard.png')}}" height="64" width="120"/>
				<img src="{{asset('assets/images/safebuy.jpg')}}" height="64" width="120"/>
				<img src="{{asset('assets/images/sdea.jpg')}}" height="64" width="120"/>
			</div>
		</div>
	</div>
@endsection
@section('custom-scripts')
	<script src="{{ asset('assets/js/style.js') }}"></script>
	<script src="{{ asset('assets/js/slider.js') }}"></script>
	{{--<script type="text/javascript"
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs&libraries=places"></script>
	<script src="{{ asset('assets/js/googleMap.js') }}"></script>
	--}}
	{{--    <script src="{{ asset('assets/js/videoPlayer.js') }}"></script>--}}
	<script type="text/javascript">
		$(document).ready(function () {
			$('input.city_name').on('keyup', function () {
				let searchText = $(this).val();
				let url = "{{ URL::to('get-cities')}}/";
				url = url + searchText;
				if (searchText != '') {
					$.ajax({
						type: 'get',
						url: url,
						data: {
							'searchtext': searchText
						},
						success: function (response) {
							$('#search_result').empty().append(response);
						},
						error: function () {
						}
					})
				}else{
				    $(this).val('');
                    $('#search_result').empty();
				}
			})



		})
	</script>
@endsection