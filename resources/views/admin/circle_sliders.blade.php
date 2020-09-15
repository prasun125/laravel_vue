@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Circle sliders
    @parent

@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>
            Circle sliders
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                    UI Components
                </a>
            </li>
            <li>
                    Circle sliders
            </li>
        </ol>
    </section>
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-wrench"></i>
                            Circle Dials
                        </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <!--knob-->
                        <div class="row visible-ie8">
                            <div class="col-md-12">
                                <div class="alert alert-warning alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                    The Circle Dial plugin is not compatible with Internet Explorer 8 and older.
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="text-left">Disable display Input</div>
                                    <input class="knob" data-width="140" data-height="140" data-fgColor="#4FC1E9" data-displayinput=false
                                           value="35"></div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="text-left">Cursor</div>
                                    <input class="knob" data-width="140" data-height="140" data-cursor=true data-fgColor="#A0D468"
                                           data-thickness=.3 value="29"></div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="text-left">
                                        Display previous
                                    </div>
                                    <input class="knob" data-width="140" data-height="140" data-fgColor="#48CFAD" data-min="-100"
                                           data-displayprevious=true value="44"></div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="text-left">
                                        Angle offset
                                    </div>
                                    <input class="knob" data-angleoffset="90" data-fgcolor="#FFCE54" data-width="140" data-height="140"
                                           value="35"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="text-left">
                                        Angle offset arc
                                    </div>
                                    <input class="knob" data-angleoffset="-125" data-anglearc="250"
                                           data-fgcolor="#FFCE54" data-width="140" data-height="140" value="35"></div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="text-left">
                                        5-digit values
                                    </div>
                                    <input class="knob" data-min="-15000" data-fgColor="#48CFAD" data-max="15000"
                                           data-width="140" data-height="140" value="-11000"></div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="text-left">Responsive</div>
                                    <input class="knob" data-width="140" data-height="140" data-fgColor="#A0D468" value="35"></div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="text-left">Readonly</div>
                                    <input class="knob" data-fgColor="#4FC1E9" data-thickness=".4" data-width="140" data-height="140"
                                           readonly value="22"></div>
                            </div>
                        </div>
                    </div>
                    <!--knob ends--> </div>
            </div>
        </div>
    </section>
    <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/jquery-knob/js/jquery.knob.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/circle-slider.js') }}" type="text/javascript"></script>
@stop