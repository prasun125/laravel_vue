@extends('layouts.app')
@section('custom-css')
	<link rel="stylesheet" href="{{ asset('assets/css/checkOut.css') }}">
@endsection
@section('content')



	<div class="container">
		<div class="global-container" id="page-checkout" style="width: 100%;">

			<div id='guest'>Your Route Details</div>
			@if(session('error'))
				<div class="alert alert-danger">
					{{ session('error') }}
				</div>
			@endif
			<div class="row reverse d-flex flex-wrap" style="margin: 0; width: 100%;">
				<form action="{{ URL::to('payment-confirmation/'.$data['route_id']) }}" method="post">
					{{ csrf_field() }}
{{--					<input type="hidden" name="route_id" value="{{ $data['route_id'] }}">--}}
					<div id="form_region" class="col-md-8" style="padding-left: 0;">

						<div class="row" id="formregion" style="">
							<div id="customer-form" class="col-md-12">
								<div class="form-row" style="margin-top:12px">
									<div class="col-md-2 mb-3" style="margin: 16px 0;">
										<label for="gender" class="form-label-font">TITLE</label>
										<select name="salutation" class="custom-select form-label-font form-control" id="gender">
											<option value="Mr." selected>Mr.</option>
											<option value="Mrs.">Mrs.</option>
										</select>
									</div>
									<div class="col-md-5 mb-3" style="margin: 16px 0;">
										<label for="firstname" class="form-label-font">FIRST NAME</label>
										<input type="text" class="form-control" name="first_name" id="firstname" value="{{ session()->get('first_name') }}" placeholder="" required>
									</div>
									<div class="col-md-5 mb-3" style="margin: 16px 0;">
										<label for="lastname" class="form-label-font">LAST NAME</label>
										<input type="text" class="form-control" name="last_name" id="lastname" value="{{ session()->get('last_name') }}" placeholder="" required>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-12 mb-1" style="margin: 16px 0;">
										<label for="email" class="form-label-font">EMAIL</label>
										<input type="email" name="email" value="{{ session()->get('user_email') }}" class="form-control" id="checkout-email" placeholder="" required>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-12 mb-1" style="margin: 16px 0;">
										<label class="form-label-font">NUMBER</label>
										<input type="tel" name="mobile" pattern="[\+]\d{2}[\-]\d{3}[\-]\d{3}[\-]\d{4}" placeholder="+91-123-456-7890" class="col-md-12 mb-2 form-control" required>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-12 mb-1" style="margin: 16px 0;">
										<label class="form-label-font">ADDRESS</label>
										<textarea name="address" class="form-control col-md-12 mb-2" cols="30" rows="5" required></textarea>
									</div>
								</div>
								{{--<div class="form-row">
									<div class="col-md-12 mb-4" id="gst" style="margin: 16px 0;">
										<input class="" type="checkbox" value="" id="defaultCheck1">
										<label class="form-check-label form-label-font" for="defaultCheck1">
											Add GST Number for this booking
										</label>
									</div>
								</div>--}}

							</div>
						</div>

					</div>
					<div id="summary" class="col-md-4" style="order: 1;">
						<div style="padding: 16px 0;">
							<div style="display: flex; justify-content: space-between;">
								<strong class="td-header">
									CITY
								</strong>
								<strong class="td-header">
									PRICE
								</strong>
							</div>
							{{--{{ dd($data['trip']) }}--}}
							@foreach($data['trip'] as $value)
								<div style="display: flex; justify-content: space-between;">
									<div style="display: flex; align-items: center; flex-wrap: wrap;">
										<div class="td-title">
											{{ $value['trip_name'] }}
										</div>
										{{--<span class="td-nights">
											({{ $value['no_of_night'] }} nights)
										</span>--}}
									</div>
									{{--<div class="td-title-val">
										${{ $value['price'] }}
									</div>--}}
								</div>
							@endforeach
						</div>
						<hr class="hr-style">
						<div id="final">
							<div class="row total">
								<div class="col-md-8 col-sm-8 col-8">
									<div class="total-name">TOTAL</div>
								</div>
								<div class="col-md-4 col-sm-4 col-4" style="text-align: right;">
									<div class="td-title total-val">${{ $data['cost'] }}</div>
								</div>
							</div>


							<div class="row up-down-space">
								<div class="col-md-8 col-sm-8 col-8"></div>
								<div class="col-md-4 com-sm-4 col-4" style="text-align: right;">

									{{--<button type="submit" class="btn secondary-background-color form-label-font" style="color: #fff;">
										Modify
									</button>--}}
								<a href="{{ asset('modify-route') . '/' . $data['route_id'] }}" class="modify secondary-background-color" style="color: #fff;">Modify</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-3">
									<button type="submit" class="btn btn-md btn-block primary-background-color" style="color: #fff;"> PAY NOW</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	
	</div>

@endsection
@section('custom-scripts')
	{{--<script src="{{ asset('assets/js/style.js') }}"></script>--}}
@endsection