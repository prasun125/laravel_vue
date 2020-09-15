@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Buttons @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/Buttons/css/buttons.css') }}" rel="stylesheet">
    <link href="{{asset('admin/assets/vendors/hover/hover.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/custom_css/advbuttons.css') }}" rel="stylesheet">
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <!--section starts-->
                    <h1>Buttons</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">UI Features</a>
                        </li>
                        <li>
                            Buttons
                        </li>
                    </ol>
                </section>
                <section class="content">
                    <!--main content-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-gear"></i>
                                        2D Transforms Flat Buttons
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="flatbuttons">
                                        <div class="text-left">
                                            Radiused Buttons
                                            <br />
                                            <ul>
                                                <li>
                                                    <a href="#" class="button btn-default button-rounded hvr-buzz">buzz</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button button-rounded btn-primary hvr-hang">hang</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button button-rounded btn-success hvr-sink">sink</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button button-rounded btn-info hvr-pop">pop</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button button-rounded btn-warning hvr-float">float</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button button-rounded btn-danger hvr-rotate">rotate</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-left">
                                            Rounded Buttons
                                            <br />
                                            <ul>
                                                <li>
                                                    <a href="#" class="button button-pill btn-default hvr-grow">grow</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button button-pill btn-primary hvr-shrink">shrink</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button button-pill btn-success hvr-pulse">pulse</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button button-pill btn-info hvr-pulse-grow">grow</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button button-pill btn-warning hvr-pulse-shrink">shrink</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button button-pill btn-danger hvr-push">push</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-left">
                                            Rectangle Box
                                            <br />
                                            <ul>
                                                <li>
                                                    <a href="#" class="button btn-default hvr-wobble-skew">Button</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button btn-primary hvr-wobble-bottom">Button</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button btn-success hvr-wobble-to-top-right right1">Button</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button btn-info hvr-wobble-to-top-right">Button</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button btn-warning hvr-wobble-horizontal">Button</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="button btn-danger hvr-skew-backward">Button</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="text-left">
                                            Circle Buttons
                                            <br />
                                            <ul>
                                                <li>
                                                    <button class="button button-circle button-default button-large hvr-wobble-top">Button</button>
                                                </li>
                                                <li>
                                                    <button class="button button-circle button-primary button-large hvr-skew">Button</button>
                                                </li>
                                                <li>
                                                    <button class="button button-circle btn-success button-large hvr-skew-forward">Button</button>
                                                </li>
                                                <li>
                                                    <button class="button button-circle btn-info button-large hvr-pulse-grow">Button</button>
                                                </li>
                                                <li>
                                                    <button class="button button-circle btn-warning button-large hvr-grow">Button</button>
                                                </li>
                                                <li>
                                                    <button class="button button-circle btn-danger button-large hvr-grow-rotate">Button</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-bell-o"></i>
                                        Shadow and Glow Transitions Buttons
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="text-left">
                                        <br>
                                        <ul class="list-inline">
                                            <li>
                                                <a href="#" class="button button-glow button-rounded button-default hvr-float-shadow">Button</a>
                                            </li>
                                            <li>
                                                <a href="#" class="button button-glow button-rounded button-primary hvr-float-shadow">Button</a>
                                            </li>
                                            <li>
                                                <a href="#" class="button button-glow button-rounded button-success hvr-float-shadow">Button</a>
                                            </li>
                                            <li>
                                                <a href="#" class="button button-glow button-rounded button-info hvr-float-shadow">Button</a>
                                            </li>
                                            <li>
                                                <a href="#" class="button button-glow button-rounded button-warning hvr-float-shadow">Button</a>
                                            </li>
                                            <li>
                                                <a href="#" class="button button-glow button-rounded button-danger hvr-float-shadow">Button</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-rocket"></i>
                                        Quick Shortcuts
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <a href="#" class="btn btn-danger btn-sm btn-responsive" role="button">
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                                <br/>
                                                Apps
                                            </a>
                                            <a href="#" class="btn btn-warning btn-sm btn-responsive" role="button">
                                                <span class="glyphicon glyphicon-bookmark"></span>
                                                <br/>
                                                Bookmarks
                                            </a>
                                            <a href="#" class="btn btn-primary btn-sm btn-responsive" role="button">
                                                <span class="glyphicon glyphicon-signal"></span>
                                                <br/>
                                                Reports
                                            </a>
                                            <a href="#" class="btn btn-primary btn-sm btn-responsive" role="button">
                                                <span class="glyphicon glyphicon-comment"></span>
                                                <br/>
                                                Comments
                                            </a>
                                        </div>
                                        <div class="col-xs-6 col-md-6">
                                            <a href="#" class="btn btn-success btn-sm btn-responsive" role="button">
                                                <span class="glyphicon glyphicon-user"></span>
                                                <br/>
                                                Users
                                            </a>
                                            <a href="#" class="btn btn-info btn-sm btn-responsive" role="button">
                                                <span class="glyphicon glyphicon-file"></span>
                                                <br/>
                                                Notes
                                            </a>
                                            <a href="#" class="btn btn-primary btn-sm btn-responsive" role="button">
                                                <span class="glyphicon glyphicon-picture"></span>
                                                <br/>
                                                Photos
                                            </a>
                                            <a href="#" class="btn btn-primary btn-sm btn-responsive" role="button">
                                                <span class="glyphicon glyphicon-tag"></span>
                                                <br/>
                                                Tags
                                            </a>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-success btn-lg btn-block" role="button">
                                        <span class="glyphicon glyphicon-globe"></span>
                                        Website
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-rocket"></i>
                                        3-D Buttons
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="flatbuttons">
                                        <ul>
                                            <li>
                                                <a href="#" class="button button-3d button-default">Button</a>
                                            </li>
                                            <li>
                                                <a href="#" class="button button-3d button-primary button-rounded">Button</a>
                                            </li>
                                            <li>
                                                <a href="#" class="button button-3d button-success button-pill">Button</a>
                                            </li>
                                            <li>
                                                <a href="#" class="button button-3d button-info button-large button-circle">Button</a>
                                            </li>
                                            <li>
                                                <a href="#" class="button button-3d button-warning">
                                                    Button
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="button button-3d button-danger">Button</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-bullhorn"></i>
                                        Group buttons
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="ui-group-buttons">
                                                <a href="#" class="btn btn-success" role="button">
                                                    <span class="glyphicon glyphicon-thumbs-up"></span>
                                                </a>
                                                <div class="or"></div>
                                                <a href="#" class="btn btn-danger" role="button">
                                                    <span class="glyphicon glyphicon-thumbs-down"></span>
                                                </a>
                                            </div>
                                            <div class="ui-group-buttons">
                                                <a href="#" class="btn btn-success" role="button">
                                                    <span class="glyphicon glyphicon-floppy-disk"></span>
                                                </a>
                                                <div class="or"></div>
                                                <a href="#" class="btn btn-danger" role="button">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="ui-group-buttons">
                                                <a href="#" class="btn btn-success" role="button">
                                                    <span class="glyphicon glyphicon-ok"></span>
                                                    Sign Up
                                                </a>
                                                <div class="or"></div>
                                                <a href="#" class="btn btn-default" role="button">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                    Reset
                                                </a>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="ui-group-buttons">
                                                <button type="button" class="btn btn-primary btn-lg">Large button</button>
                                                <div class="or or-lg"></div>
                                                <button type="button" class="btn btn-success btn-lg">Large button</button>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="ui-group-buttons">
                                                <button type="button" class="btn btn-primary">Default</button>
                                                <div class="or"></div>
                                                <button type="button" class="btn btn-success">Success</button>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="ui-group-buttons">
                                                <button type="button" class="btn btn-primary btn-sm">Small button</button>
                                                <div class="or or-sm"></div>
                                                <button type="button" class="btn btn-success btn-sm">Small button</button>
                                            </div>
                                            <br />
                                            <br />
                                            <div class="ui-group-buttons">
                                                <button type="button" class="btn btn-primary btn-xs">Extra small button</button>
                                                <div class="or or-xs"></div>
                                                <button type="button" class="btn btn-success btn-xs">Extra small button</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-clock-o"></i>
                                        Buttons With Labels
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <h2>Cool Buttons With Labels</h2>
                                        <div class="col-lg-4 col-md-6 col-xs-12 col-sm-6">
                                            <button type="button" class="btn btn-labeled btn-success">
                                                <span class="btn-label">
                                                    <i class="glyphicon glyphicon-ok"></i>
                                                </span>
                                                Success
                                            </button>
                                            <br />
                                            <button type="button" class="btn btn-labeled btn-warning">
                                                <span class="btn-label">
                                                    <i class="glyphicon glyphicon-bookmark"></i>
                                                </span>
                                                Bookmark
                                            </button>
                                            <br />
                                            <button type="button" class="btn btn-labeled btn-default">
                                                <span class="btn-label">
                                                    <i class="glyphicon glyphicon-chevron-left"></i>
                                                </span>
                                                Left
                                            </button>
                                            <br />
                                            <button type="button" class="btn btn-labeled btn-success">
                                                <span class="btn-label">
                                                    <i class="fa fa-fw fa-thumbs-o-up"></i>
                                                </span>
                                                Up
                                            </button>
                                            <br />
                                            <button type="button" class="btn btn-labeled btn-info">
                                                <span class="btn-label">
                                                    <i class="glyphicon glyphicon-refresh"></i>
                                                </span>
                                                Refresh
                                            </button>
                                            <br />
                                            <a class="btn btn-success btn-labeled" role="button">
                                                <span class="btn-label">
                                                    <i class="glyphicon glyphicon-info-sign"></i>
                                                </span>
                                                Info Web
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-xs-6 col-sm-6">
                                            <button type="button" class="btn btn-labeled btn-danger">
                                                <span class="btn-label">
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                </span>
                                                Cancel
                                            </button>
                                            <br />
                                            <button type="button" class="btn btn-labeled btn-primary">
                                                <span class="btn-label">
                                                    <i class="glyphicon glyphicon-camera"></i>
                                                </span>
                                                Camera
                                            </button>
                                            <br />
                                            <button type="button" class="btn btn-labeled btn-default">
                                                Right
                                                <span class="btn-label" style="left: 13px;">
                                                    <i class="glyphicon glyphicon-chevron-right"></i>
                                                </span>
                                            </button>
                                            <br />
                                            <button type="button" class="btn btn-labeled btn-danger">
                                                <span class="btn-label">
                                                    <i class="glyphicon glyphicon-thumbs-down"></i>
                                                </span>
                                                Down
                                            </button>
                                            <br />
                                            <button type="button" class="btn btn-labeled btn-danger">
                                                <span class="btn-label">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </span>
                                                Trash
                                            </button>
                                            <br />
                                            <a class="btn btn-success btn-labeled" role="button">
                                                <span class="btn-label">
                                                    <i class="glyphicon glyphicon-globe"></i>
                                                </span>
                                                 Web
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--main content ends-->
                    </section>
                <!--section ends-->
                <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('admin/assets/js/custom_js/button_main.js')}}"></script>
    <script src="{{ asset('admin/assets/vendors/Buttons/js/buttons.js')}}"></script>
        @stop