@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Vector Maps @parent

@stop
@section('header_styles')
    <!-- page level css-->
    <link href="{{ asset('admin/assets/vendors/jqvmap/css/jqvmap.css') }}" mediaff="screen" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/custom_css/custom_map.css') }}" mediaff="screen" rel="stylesheet" type="text/css" />
<style>

</style>
<!-- end of page level css-->
@stop
{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>Vector Maps</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li><a href="#">Maps</a></li>
                        <li>
                            <a href="vector_maps">Vector Maps</a>
                        </li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Basic charts strats here-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-fw fa-tint"></i>
                                        World
                                    </h4>
                                    <span class="pull-right">
                                         <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body" style="padding:10px !important;">
                                    <div id="vmapworld" class="map_size" style="width:100%; height:350px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Basic charts strats here-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-fw fa-tint"></i>
                                        USA
                                    </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body" style="padding:10px !important;">
                                    <div id="vmapusa" class="map_size" style="width:100%; height:350px;"></div>
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
                                        <i class="fa fa-fw fa-tint"></i>
                                        Europe
                                    </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body" style="padding:10px !important;">
                                    <div id="vmapeurope" class="map_size" style="width:100%; height:350px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Basic charts strats here-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-fw fa-tint"></i>
                                        Germany
                                    </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body" style="padding:10px !important;">
                                    <div id="vmapgermany" class="map_size" style="width:100%; height:350px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Basic charts strats here-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <i class="fa fa-fw fa-tint"></i>
                                        Russia
                                    </h4>
                                    <span class="pull-right">
                                         <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body" style="padding:10px !important;">
                                    <div id="vmaprussia" class="map_size" style="width:100%; height:350px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                   </section>
                <!--page wrapper--> @stop
{{-- page level scripts --}}
@section('footer_scripts')
        <script src="{{ asset('admin/assets/vendors/jqvmap/js/jquery.vmap.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/jqvmap/js/jquery.vmap.world.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/jqvmap/js/jquery.vmap.usa.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/jqvmap/js/jquery.vmap.europe.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/jqvmap/js/jquery.vmap.germany.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/jqvmap/js/jquery.vmap.russia.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/jqvmap/js/jquery.vmap.sampledata.js') }}"></script>
        <script src="{{ asset('admin/assets/js/custom_js/vector-maps.js') }}" type="text/javascript"></script>
        @stop