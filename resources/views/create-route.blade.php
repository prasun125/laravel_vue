@extends('layouts.app')
@section('content')
    <div class="trip-plan-container">
        <div class="trip-planner">
            <div class="trip-planner-slider">
                <div class="swiper-container" style=" height: 441px; width:  100%;">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-wrapper" style="width: 100%">
                        <div class="swiper-slide"><img src="{{asset('assets/images/homepage.jpg')}}" height="100%" width="100%" alt=""><p></p></div>
                        <div class="swiper-slide"><img src="{{asset('assets/images/homepage1.jpg')}}" height="100%" width="100%" alt=""><p>Havana</p></div>
                        <div class="swiper-slide"><img src="{{asset('assets/images/homepage.jpg')}}" height="100%" width="100%" alt=""><p>Havana</p></div>
                        <div class="swiper-slide"><img src="{{asset('assets/images/homepage3.jpg')}}" height="100%" width="100%" alt=""><p>Havana</p></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>

                </div>
            </div>
        </div>

        <div class="detail-form">

            <div class="container planner-container force-display-flex">
                <div class="trip-details is-card display-flex">
                    <div class="trip-days">
                        <span> <time datetime="2014-09-20" class="icon">
                                  {{--<em>Days</em>--}}
                                <strong>Days</strong>
                                  <span></span>
                                </time>
                        </span>
                    </div>
                    <div class="trip-details-text display-flex align-items-center">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur consequuntur deserunt ea error ex explicabo facilis ipsum molestiae molestias nesciunt numquam optio, possimus quam qui quod sint sit tempora ut.</span>
                    </div>
                    <div class="trip-book display-flex align-items-center">
                        <div class="trip-price">
                            <span>From $</span>
                            @if(session()->has('role'))
                                <span><a class="btn btn-primary primary-background-color hasLogin " href="{{ URL::to('check-out') }}" v-on:click="check($event)">Book</a></span>
                            @else
                                <span><a class="btn btn-primary primary-background-color " href="{{ URL::to('check-out') }}" v-on:click="check($event)">Book</a></span>
                            @endif
                        </div>
                    </div>
                </div>
                <form class="trip-planner-form force-display-flex space-between full-width">
                    <div class="planner">
                        <div class="routes-list is-card">
                            <div class="container-fluid route-list-container display-flex flex-direction-column space-between align-items-center full-height">
                                <div class="add-destination-button full-width display-flex flex-start">
                                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary primary-background-color border-radius-round" style="height: 36px; width: 138px; font-size: 13px;"><span style="font-weight: bold;">Create Route</span></button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="details is-card display-flex flex-direction-column align-items-center ">
                        <div class="container full-width display-flex flex-direction-column space-around full-height details-container">
                            <div class="book-price-container full-width display-flex align-items-center space-between">
                                <div class="book-price"><span>Total Price: @{{ routes.total_price }}$</span></div>
                                @if(session()->has('role'))
                                    <div class="book-button"><a class="btn btn-primary primary-background-color hasLogin" href="{{ URL::to('check-out') }}" v-on:click="check($event)">Book</a></div>
                                @else
                                    <div class="book-button"><a class="btn btn-primary primary-background-color" href="{{ URL::to('check-out') }}" v-on:click="check($event)">Book</a></div>
                                @endif
                            </div>
                            <div class="display-flex full-width space-between select-vehicle-heading flex-wrap">
                                <h4 style="text-align: left; font-weight: bold;">Select Vehicle: @{{ routes.vehicle_type }}</h4><i class="material-icons edit vehicle-edit" style="margin-top: 7px; cursor: pointer;">mode_edit</i>
                                <div class="add-vehicle-type full-width text-center display-flex align-items-center space-evenly">
                                    <i class="material-icons">directions_car</i>
                                    <select name="" id="vehicleList" style="width: 40%;">
                                        <option v-for="item in vehicleList" v-bind:names="item" is="vehicle-list"></option>
                                    </select>
                                    <i class="material-icons">person</i>
                                    <select name="" id="vehicleNumberList" style="width: 40%;">
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                        <option value="">8</option>
                                        <option value="">9</option>
                                        <option value="">10</option>
                                    </select>
                                </div>
                            </div>

                            <div class="display-flex full-width space-between flex-wrap select-travellers-heading">
                                <h4 style="text-align: left; width: auto; font-weight: bold;">No of people: <span v-if="kids != 0 || teen != 0">@{{ adults + teen + kids }} Travellers</span><span v-else-if="adults > 1">@{{ adults}} adults</span><span v-else>@{{ adults}} adult</span></h4><i class="material-icons edit traveller-edit" style="margin-top: 7px; cursor: pointer;">mode_edit</i>
                                <div class="traveller-number display-flex-center full-width">
                                    <div class="select-traveller display-flex-center">
                                        <table style="width: 80%;">
                                            <tr><td>Adults</td><td><add-adults></add-adults></td></tr>
                                            <tr><td>Teens</td><td><add-teens></add-teens></td></tr>
                                            <tr><td>Kids</td><td><add-kids></add-kids></td></tr>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="display-flex space-evenly flex-wrap">
                                <div class=" select-start-date" style="margin-bottom: 8px;">
                                    <input type='text' readonly name="start_date" class="form-control " id="datetimepicker1" v-model="routes.start_date" placeholder="Pick up date"/>
                                </div>
                                <div class=" select-end-date">
                                    <input type='text' readonly name="start_date" class="form-control " id="datetimepicker2" v-model="routes.end_date" placeholder="End date"/>
                                </div>
                            </div>
                            <calendar-view ref="calendar"></calendar-view>
                            <google-map ref="googleMap"></google-map>

                        </div>
                    </div>
                </form>

                <div class="custom-slider">
                    <div class="swiper-button-prev prev" style=""></div>
                    <div class="swiper-container1" style=" height: 440px; width:  100%; overflow: hidden;">
                        <div class="swiper-wrapper" style="width: 100%">
                            <div class="swiper-slide"><img src="{{asset('assets/images/homepage.jpg')}}" height="100%" width="100%" alt=""></div>
                            <div class="swiper-slide"><img src="{{asset('assets/images/homepage1.jpg')}}" height="100%" width="100%" alt=""></div>
                            <div class="swiper-slide"><img src="{{asset('assets/images/homepage.jpg')}}" height="100%" width="100%" alt=""></div>
                            <div class="swiper-slide"><img src="{{asset('assets/images/homepage3.jpg')}}" height="100%" width="100%" alt=""></div>
                            <div class="swiper-slide"><img src="{{asset('assets/images/homepage3.jpg')}}" height="100%" width="100%" alt=""></div>
                            <div class="swiper-slide"><img src="{{asset('assets/images/homepage3.jpg')}}" height="100%" width="100%" alt=""></div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next next" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/css/tripPlanner.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/modifyRoute.css') }}">
@endsection
@section('custom-scripts')
    <script src="{{ asset('assets/js/tripPlannerSlider.js') }}"></script>
    <script src="{{ asset('assets/js/placeDistance.js') }}"></script>
    <script src="{{ asset('assets/js/tripCalendar.js') }}"></script>
    <script src="{{ asset('assets/js/tripPlanner.js') }}"></script>
    <script>

    </script>
    <script>


        $('#destinationList').select2({});
        $('#vehicleList').select2({});
        $('#vehicleNumberList').select2({});
        $('#datetimepicker1').datepicker({
            dateFormat: 'dd-mm-yy'
        });
        $('#datetimepicker2').datepicker({
            dateFormat: 'dd-mm-yy'
        });

        $(document).ready(function(){
            $('.add-vehicle-type').hide();
            $('.traveller-number').hide();

            $('.vehicle-edit').click(function(){
                $(this).find('.horizontal-line').show();


                if($(this).parent().parent().find('.add-vehicle-type').is(':visible')){
                    $(this).parent().parent().find('.add-vehicle-type').slideUp();
                }else{
                    $(this).parent().parent().find('.add-vehicle-type').slideDown();
                    $(this).show();
                    $(this).parent().parent().find('.add-vehicle-type').css('display', 'flex !important')
                }
            });

            $('.traveller-edit').click(function(){
                $(this).parent().parent().find('.traveller-number').slideToggle();
            });

        });



    </script>
@endsection