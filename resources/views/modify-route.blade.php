@extends('layouts.app')
@section('content')
    <modify-route v-bind:route-details='{!! json_encode($route) !!}' v-bind:all-cities='{!! json_encode($all_cities) !!}' ref="modifyroute"></modify-route>
@endsection
@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/css/tripPlanner.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/modifyRoute.css') }}">
@endsection
@section('custom-scripts')
    <script src="{{ asset('assets/js/tripPlannerSlider.js') }}"></script>
    {{--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs&callback=initMap"></script>--}}
    <script src="{{ asset('assets/js/placeDistance.js') }}"></script>
    <script src="{{ asset('assets/js/tripCalendar.js') }}"></script>
    <script src="{{ asset('assets/js/tripPlanner.js') }}"></script>
    <script>

    </script>
    <script>
        
        $('#destinationList').select2({});
        $('#vehicleList').selectize();
        $('#vehicleNumberList').select2({});
        // $('#end-date-picker').datepicker();


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
                    console.log($(this).parent().parent().parent());
                }
            });

            $('.traveller-edit').click(function(){
                $(this).parent().parent().find('.traveller-number').slideToggle();
            });
            // $('#destination_select').selectize({
            //     create: false,
            //     sortField: 'text'
            // });



        });



    </script>
@endsection