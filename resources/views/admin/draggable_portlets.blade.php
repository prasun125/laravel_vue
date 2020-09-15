@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Draggable Portlets @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/css/custom_css/portlet.css') }}" rel="stylesheet" type="text/css"/>

    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>Draggable Portlets</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">UI features</a>
                        </li>
                        <li>
                            Draggable Portlets
                        </li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row ui-sortable" id="sortable_portlets">

                        <div class="col-md-4 column sortable">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class=" portlet box primary">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-fw fa-gift"></i>
                                        Portlet
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div>
                                        Tom loves Canada. Angela and Tom met. Angela and Tom want to play. Angela and Tom want to jump. Angela and Tom want to yell. Angela and Tom play, jump and yell.
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                            <!-- BEGIN Portlet PORTLET-->
                            <div class=" portlet box warning">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-fw fa-gift"></i>
                                        Portlet
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div>
                                        Tom loves Canada. Angela and Tom met. Angela and Tom want to play. Angela and Tom want to jump. Angela and Tom want to yell. Angela and Tom play, jump and yell.
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                            <!-- BEGIN Portlet PORTLET-->
                            <div class=" portlet box primary">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-fw fa-gift"></i>
                                        Portlet
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div>
                                        Tom loves Canada. Angela and Tom met. Angela and Tom want to play. Angela and Tom want to jump. Angela and Tom want to yell. Angela and Tom play, jump and yell.
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET--> </div>
                        <div class="col-md-4 column sortable">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class=" portlet box success">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-fw fa-gift"></i>
                                        Portlet
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div>
                                        Tom loves Canada. Angela and Tom met. Angela and Tom want to play. Angela and Tom want to jump. Angela and Tom want to yell. Angela and Tom play, jump and yell.
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box danger">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-fw fa-gift"></i>
                                        Portlet
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div>
                                        Tom loves Canada. Angela and Tom met. Angela and Tom want to play. Angela and Tom want to jump. Angela and Tom want to yell. Angela and Tom play, jump and yell.
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                            <!-- BEGIN Portlet PORTLET-->
                            <div class=" portlet box success">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-fw fa-gift"></i>
                                        Portlet
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div>
                                        Tom loves Canada. Angela and Tom met. Angela and Tom want to play. Angela and Tom want to jump. Angela and Tom want to yell. Angela and Tom play, jump and yell.
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET--> </div>
                        <div class="col-md-4 column sortable">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class=" portlet box info">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-fw fa-gift"></i>
                                        Portlet
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div>
                                        Tom loves Canada. Angela and Tom met. Angela and Tom want to play. Angela and Tom want to jump. Angela and Tom want to yell. Angela and Tom play, jump and yell.
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                            <!-- BEGIN Portlet PORTLET-->
                            <div class=" portlet box default">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-fw fa-gift"></i>
                                        Portlet
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div>
                                        Tom loves Canada. Angela and Tom met. Angela and Tom want to play. Angela and Tom want to jump. Angela and Tom want to yell. Angela and Tom play, jump and yell.
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
                            <!-- BEGIN Portlet PORTLET-->
                            <div class=" portlet box info">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-fw fa-gift"></i>
                                        Portlet
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <div>
                                        Tom loves Canada. Angela and Tom met. Angela and Tom want to play. Angela and Tom want to jump. Angela and Tom want to yell. Angela and Tom play, jump and yell.
                                    </div>
                                </div>
                            </div>
                            <!-- END Portlet PORTLET--> </div>
                    </div>

                    </section>
                    @stop

@section('footer_scripts')
<script src="{{ asset('admin/assets/js/custom_js/portlets.js') }}" type="text/javascript"></script>
@stop                    