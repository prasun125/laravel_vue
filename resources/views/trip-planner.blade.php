@extends('layouts.app')
@section('content')
    <div class="trip-plan-container">
        <div class="trip-planner">
            <div class="trip-planner-slider">
                <div class="swiper-container" style=" height: 441px; width:  100%;">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-wrapper" style="width: 100%">
                        <div class="swiper-slide"><img src="{{asset('assets/images/homepage.jpg')}}" height="100%" width="100%" alt=""><p>Havana to Nicaro</p></div>
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
                                  <span>10</span>
                                </time>
                        </span>
                    </div>
                    <div class="trip-details-text display-flex align-items-center">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur consequuntur deserunt ea error ex explicabo facilis ipsum molestiae molestias nesciunt numquam optio, possimus quam qui quod sint sit tempora ut.</span>
                    </div>
                    <div class="trip-book display-flex align-items-center">
                        <div class="trip-price">
                            <span>From 1000$</span>
                            <span><button class="btn btn-primary primary-background-color">Book</button></span>
                        </div>
                    </div>
                </div>
            <form class="trip-planner-form force-display-flex space-between">
                <div class="planner">
                    <route-list></route-list>
                </div>

                <div class="details is-card display-flex flex-direction-column align-items-center ">
                    <div class="container full-width display-flex flex-direction-column space-around full-height details-container">
                        <div class="book-price-container full-width display-flex align-items-center space-between">
                            <div class="book-price"><span>Total Price: 200$</span></div>
                            <div class="book-button"><button class="btn btn-primary primary-background-color">Book</button></div>
                        </div>
                        <div class="display-flex full-width space-between select-vehicle-heading flex-wrap">
                            <h4 style="text-align: left; font-weight: bold;">Select Vehicle: Car</h4><i class="material-icons edit vehicle-edit" style="margin-top: 7px; cursor: pointer;">mode_edit</i>
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


                        <div class="calender full-width" id="map" ></div>
                        <div id="calendar" style="margin-bottom: 10px"></div>
                    </div>

                </div>
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog custom-modal">
                        <div class="modal-content custom-modal-content">
                            <div class="modal-header custom-modal-header">
                                <button type="button" class="close" data-dismiss="modal" style="font-size: 42px;">&times;</button>
                                {{--<h4 class="modal-title">Add New Destination</h4>--}}
                            </div>
                            <div class="modal-body display-flex-column" style="height: 270px; padding: 0;">
                                <h4 style="margin: 0; font-size: 31px; font-weight: bold;">Add Destination</h4>
                                <form action="">
                                <select name="" id="destinationList" style="width: 70%; font-weight: bold;">
                                    <option value="" selected>Add Destination</option>
                                    <option v-for="item in destinationList" v-bind:names="item" is="destination-list"></option>
                                </select>
                                <select class="form-control" name="" style=" font-weight: bold; width: 70%;" id="nights-select" >
                                    <option value="" selected>no of nights</option>
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
                                <div class="checkbox edit-form-checkbox">

                                    <label><input type="checkbox" value="">Leave same day</label>

                                </div>
                                <button type="button" class="btn btn-primary">Add Destination</button>
                                </form>
                            </div>
                            <div class="modal-footer custom-modal-footer">
                                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                            </div>
                        </div>
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
@endsection
@section('custom-scripts')
    <script src="{{ asset('assets/js/tripPlannerSlider.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs&callback=initMap"></script>
    <script src="{{ asset('assets/js/placeDistance.js') }}"></script>
    <script src="{{ asset('assets/js/tripCalendar.js') }}"></script>
    <script>

        $('#destinationList').select2({});
        $('#vehicleList').select2({});
        $('#vehicleNumberList').select2({});

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
//            $('.select2-selection').css('border-radius','0px')
//            $('.select2-container').children().css('border-radius','0px')
        });


    </script>
@endsection