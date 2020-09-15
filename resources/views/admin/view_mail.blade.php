@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Single Mail @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/css/custom_css/mail.css') }}" rel="stylesheet" type="text/css" />
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>Single Mail</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">Email</a>
                        </li>
                        <li>Single Mail</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <a href="#" role="button" class="btn btn-info btn-sm btn-block">COMPOSE</a>
                            <div class="panel">
                                <div class="panel-body pan">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active">
                                            <a href="#">
                                                <span class="badge pull-right">20</span>
                                                <i class="fa fa-inbox fa-fw mrs"></i>
                                                Inbox
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="fa fa-plane fa-fw mrs"></i>
                                                Sent Mail
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="badge badge-orange pull-right">3</span>
                                                <i class="fa fa-edit fa-fw mrs"></i>
                                                Drafts
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star-o fa-fw mrs"></i>
                                                Spam
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-trash-o"></i>
                                                Trash
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="panel">
                                <div class="panel-body pan">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active">
                                            <a href="#">Online</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-circle text-warning pull-right"></i>
                                                John
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-circle text-success pull-right"></i>
                                                Jenny
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-circle text-danger pull-right"></i>
                                                Grace
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-circle text-info pull-right"></i>
                                                Other
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 table-bordered">
                            <section class="panel">
                                <header class="panel-heading wht-bg">
                                    <h4 class="gen-case">
                                        View Message
                                        <form method="get" action="#" class="pull-right mail-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-sm" name="search" placeholder="Search email">
                                                <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-sm btn-primary">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </h4>
                                </header>
                                <div class="panel-body ">

                                    <div class="mail-header row">
                                        <div class="col-md-8">
                                            <h4 class="pull-left">New server for datacenter needed</h4>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="compose-btn pull-right">
                                                <a href="compose" class="btn btn-sm btn-primary" >
                                                    <i class="fa fa-reply"></i>
                                                    Reply
                                                </a>
                                                <button class="btn  btn-sm tooltips btn_hover_color" data-original-title="Print" type="button" data-toggle="tooltip" data-placement="top" title="">
                                                    <i class="fa fa-print"></i>
                                                </button>
                                                <button class="btn btn-sm tooltips btn_hover_color" data-original-title="Trash" data-toggle="tooltip" data-placement="top" title="">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mail-sender">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <img src=" {{ asset('admin/assets/img/authors/avatar1.jpg') }}" alt="icon" class="img-circle" width="38">
                                                <span>Nataliapery</span>
                                                (Nataliapery@example.com) to
                                                <span>me</span>
                                            </div>
                                            <div class="col-md-6 col-md-offset-1">
                                                <p class="date">11:15AM 01 Jan 2015</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="view-mail">
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.PageMaker including versions of Lorem Ipsum.
                                        </p>
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                        </p>

                                    </div>
                                    <div class="attachment-mail">
                                        <p>
                                            <span>
                                                <i class="fa fa-paperclip"></i>
                                                2 attachments —
                                            </span>
                                            <a href="#">Download all attachments</a>
                                            |
                                            <a href="#">View all images</a>
                                        </p>
                                        <ul>
                                            <li>
                                                <a class="atch-thumb" href="#">
                                                    <img src="{{ asset('admin/assets/img/flaticons/Christmas-15.png') }}" alt="icon"></a>

                                                <a class="name" href="#">
                                                    IMAGE_21.jpg
                                                    <span>10KB</span>
                                                </a>

                                                <div class="links">
                                                    <a href="#">View</a>
                                                    -
                                                    <a href="#">Download</a>
                                                </div>
                                            </li>

                                            <li>
                                                <a class="atch-thumb" href="#">
                                                <img src="{{ asset('admin/assets/img/flaticons/Valentine_day-09.png') }}" alt="img"></a>

                                                <a class="name" href="#">
                                                    IMAGE_1.jpg
                                                    <span>10KB</span>
                                                </a>

                                                <div class="links">
                                                    <a href="#">View</a>
                                                    -
                                                    <a href="#">Download</a>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="compose-btn pull-left">
                                        <a href="compose" class="btn btn-sm btn-primary" >
                                            <i class="fa fa-reply"></i>
                                            Reply
                                        </a>
                                        <button class="btn btn-sm btn_hover_color" >
                                            <i class="fa fa-arrow-right"></i>
                                            Forward
                                        </button>
                                        <button class="btn  btn-sm tooltips btn_hover_color" data-original-title="Print" type="button" data-toggle="tooltip" data-placement="top" title="">
                                            <i class="fa fa-print"></i>
                                        </button>
                                        <button class="btn btn-sm tooltips btn_hover_color" data-original-title="Trash" data-toggle="tooltip" data-placement="top" title="">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
            </section>
            <!-- /.content --> 
            @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
    @stop