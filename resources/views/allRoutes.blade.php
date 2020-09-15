@extends('layouts.app')
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/css/allRoutes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tripPlannerSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
@endsection
@section('content')
    <div class="container-gallery display-flex-column">

        <div class="gallery display-flex-center flex-wrap">
            <div class="trip-planner">
                <div class="trip-planner-slider">
                    <div class="swiper-container" style="height: 500px; width:  100%;">
                        {{--<div class="swiper-button-prev"></div>--}}
                        <div class="swiper-wrapper" style="width: 100%">
                            <div class="swiper-slide">
                                <img src="{{asset('assets/images/homepage.jpg')}}" height="600px" width="100%" alt="" style=" height: 600px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('assets/images/homepage1.jpg')}}" height="600px" width="100%" alt="" style=" height: 600px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('assets/images/homepage.jpg')}}" height="600px" width="100%" alt="" style=" height: 600px;">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{asset('assets/images/homepage3.jpg')}}" height="600px" width="100%" alt="" style=" height: 600px;">
                            </div>
                        </div>
                        {{--<div class="swiper-button-next"></div>--}}
                        <div class="swiper-pagination"></div>
            
                    </div>
                </div>
            </div>
            <div class="gallery-heading">
                <h1>All Routes</h1>
            </div>
            <div class="cards force-display-flex space-between flex-wrap">
				<?php $i=0;?>
				@foreach($data as $key => $value)

	            <div class="route-container">
		            <div class="image-title-container capitalize">
			            <div class="image-title-font">{{$value['route_name']}}</div>
		            </div>
		            <div style="padding: 8px; margin-bottom: 16px;" class="image-container">
			            <div class="images-cover1" style="position: relative;">
				            <div class="images1" style="background-image: url('assets/images/{{$value['image']}}'); background-size: 100% 100%; width: 100%;">
					            <p>{{$value['title']}}</p>
					            {{--<div class="slider-button1"><a href="" >See More</a></div>--}}
				            </div>
			            </div>
		            </div>
		            <div style="padding: 8px; margin-bottom: 16px;" class="map-container">
			            <div class="calender full-width map1" id="map-{{$i}}" data-cities="{{json_encode($value['cities'])}}" style="height: 210px; width: 100%;"></div>
			            <div style="padding: 8px 0;">
				            Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
			            </div>
			            <div style="display: flex; flex-direction: row; justify-content: space-between; flex-wrap: wrap; margin-top: 10px;">
				            <div>
					            {{$value['night']}} days from {{$value['price']}}$/day
				            </div>
				            <div class="see-route-detail" style="text-align: right;">
					            <a href="{{ url('modify-route') . '/'  . $value['id'] }}" class="primary-background-color capitalize" style="color: white;">see route details</a>
				            </div>
			            </div>
		            </div>
	            </div>
                        <?php $i++; ?>
				@endforeach
                <div class="route-container">
                    <div class="col-sm-5 show">
                        Showing {{ ($data->perPage() * ($data->currentPage() - 1)) + 1 }} to {{ ($data->perPage() * ($data->currentPage() - 1)) + $data->count() }} of {{ $data->total() }} entries
                    </div>
                    <div class="col-sm-7" style="text-align: right;">
                        {!! $data->render() !!}
                    </div>
                </div>
            </div>

            <div class="comprehensive no-tooltip modify-width">
                <h2 class="sta-heading-m" style="text-align: center">We are the Original Round the World Experts</h2>
                <ul class="comprehensive-list" style="padding-left: 0;">
            
                    <li class="comprehensive-list-item">
                        <a class="comprehensive-list-link" style="padding-left: 0;">
                            <img src="{{asset('assets/images/check.png')}}" style="height: 24px; width: 24px;">
                            Trusted for over 35 Years
                        </a>
                    </li><li class="comprehensive-list-item">
                        <a class="comprehensive-list-link" style="padding-left: 0;">
                            <img src="{{asset('assets/images/check.png')}}" style="height: 24px; width: 24px;">Trusted for over 35 Years</a>
                    </li>
            
                    <li class="comprehensive-list-item">
                        <a class="comprehensive-list-link" style="padding-left: 0;">
                            <img src="{{asset('assets/images/check.png')}}" style="height: 24px; width: 24px;">We Know Because We Go</a>
                    </li>
                </ul>
                <ul class="comprehensive-list" style="padding-left: 0;">
        
                    <li class="comprehensive-list-item">
                        <a class="comprehensive-list-link" style="padding-left: 0;">
                            <img src="{{asset('assets/images/check.png')}}" style="height: 24px; width: 24px;">
                            Trusted for over 35 Years
                        </a>
                    </li><li class="comprehensive-list-item">
                        <a class="comprehensive-list-link" style="padding-left: 0;">
                            <img src="{{asset('assets/images/check.png')}}" style="height: 24px; width: 24px;">Trusted for over 35 Years</a>
                    </li>
        
                    <li class="comprehensive-list-item">
                        <a class="comprehensive-list-link" style="padding-left: 0;">
                            <img src="{{asset('assets/images/check.png')}}" style="height: 24px; width: 24px;">We Know Because We Go</a>
                    </li>
                </ul>
    
            </div>
	        <div class="own-route">
		        <a href="" class="primary-background-color capitalize">make your own route</a>
	        </div>
        </div>
        {{--<ul class="pager">
            <li><a href="#">Previous</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>

            <li><a href="#">Next</a></li>
        </ul>--}}

    </div>
@endsection
@section('custom-scripts')
    <script src="{{ asset('assets/js/allRoutes.js') }}"></script>
    <script src="{{ asset('assets/js/tripPlannerSlider.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs&callback=initMap"></script>
    <script src="{{ asset('assets/js/map.js') }}"></script>
@endsection