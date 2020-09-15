@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Panels @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/flippant/css/flippant.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/custom_css/panel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/custom_css/custom_panel_page.css') }}" rel="stylesheet" type="text/css">
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <!--section starts-->
                    <h1>Panels</h1>
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
                            Panels
                        </li>
                    </ol>
                </section>
                <!--section ends-->
                <section class="content">
                    <div class="row">
                        <div class="col-md-4 flippant">
                            <h4 class="panel-headingg">Warning Panel</h4>
                            <p>
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                            </p>
                            <p>
                                <a class="btnflip btn" href="#">Modal &raquo;</a>
                                <a class="btnflip btn card" href="#">Flip &raquo;</a>
                            </p>
                        </div>
                        <div class="col-md-4 flippant">
                            <h4 class="panel-heading1">Primary Panel</h4>
                            <p>
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                            </p>
                            <p>
                                <a class="btn btnflip" href="#">Modal &raquo;</a>
                                <a class="btnflip btn card" href="#">Flip &raquo;</a>
                            </p>
                        </div>
                        <div class="col-md-4 flippant">
                            <h4 class="panel-heading2">Success Panel</h4>
                            <p>
                                Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                            </p>
                            <p>
                                <a class="btn btnflip" href="#">Modal &raquo;</a>
                                <a class="btnflip btn card" href="#">Flip &raquo;</a>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 flippant">
                            <h4 class="panel-heading3">Info Panel</h4>
                            <p>
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                            </p>
                            <p>
                                <a class="btnflip btn" href="#">Modal &raquo;</a>
                                <a class="btnflip btn card" href="#">Flip &raquo;</a>
                            </p>
                        </div>
                        <div class="col-md-6 flippant">
                            <h4 class="panel-heading4">Danger Panel</h4>
                            <p>
                                Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                            </p>
                            <p>
                                <a class="btn btnflip" href="#">Modal &raquo;</a>
                                <a class="btnflip btn card" href="#">Flip &raquo;</a>
                            </p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Primary Header Panel</h4>
                                    <span class="pull-right">
                                       <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <h2>There are many variations</h2>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Red Header Panel</h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <h2>There are many variations</h2>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading border-light">
                                    <h4 class="panel-title">Ash Header Panel</h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <h2>There are many variations</h2>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-blue">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Blue Panel</h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                    </p>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-orange">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Orange Panel</h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                    </p>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-pink">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        Panel
                                        <span class="text-bold">Pink</span>
                                    </h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-lightgreen">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Light green Panel</h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-grey">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Grey Panel</h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Red Panel</h4>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
        <script type="text/javascript" src="{{ asset('admin/assets/vendors/flippant/js/flippant.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin/assets/js/custom_js/panel-flip.js') }}"></script>
        @stop