@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Google Maps @parent

@stop
{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/gmaps/css/examples.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/custom_css/g_maps.css') }}" rel="stylesheet" type="text/css"/>

    <!-- end of page level css-->
@stop
{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Google Maps</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Maps</a></li>
            <li>
                Google Maps
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-map-marker"></i>
                            Basic
                        </h4>
                                    <span class="pull-right">
                                         <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-top" class="gmap"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-map-marker"></i>
                            Terrain
                        </h4>
                                    <span class="pull-right">
                                         <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-terrain" class="gmap"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-map-marker"></i>
                            Satellite
                        </h4>
                                    <span class="pull-right">
                                         <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-satellite" class="gmap"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-fw fa-map-marker"></i>
                            Marker
                        </h4>
                                    <span class="pull-right">
                                         <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-markers" class="gmap"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">Styled Map</h4>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-styled" class="gmap"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">Map Type</h4>
                                <span class="pull-right">
                                     <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-types" class="gmap"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
    </section>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
    {{--<script type="text/javascript" src="{{ asset('admin/assets/js/pages/maps_api.js') }}"></script>--}}
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyADWjiTRjsycXf3Lo0ahdc7dDxcQb475qw&libraries=places"></script>
    <script src="{{ asset('admin/assets/vendors/gmaps/js/gmaps.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/custommaps.js') }}" type="text/javascript"></script>
@stop