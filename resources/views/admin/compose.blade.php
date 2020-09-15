@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Compose Message @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/summernote/css/summernote.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('admin/assets/css/custom_css/mail.css') }}" rel="stylesheet" type="text/css" />
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>Compose Message</h1>
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
                        <li>Compose Message</li>
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
                        <div class="col-sm-9 table-bordered">
                            <div class="mail-compose">
                                <form role="form">
                                    <div class="mail-header">
                                        <h3>
                                            <img src=" {{ asset('admin/assets/img/flaticons/1.png') }}" alt="icon" width="40" height="40"> &nbsp;Compose Message</h3>
                                    </div>
                                    <div class="form-group">
                                        <label for="to">To:</label>
                                        <input type="text" class="form-control" id="to" tabindex="1" />

                                    </div>

                                    <div class="form-group">
                                        <label for="subject">Subject:</label>
                                        <input type="text" class="form-control" id="subject" tabindex="1" />
                                    </div>
                                    <div class="editor">
                                        <textarea class="textarea tex-com" placeholder="Place some text here" ></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <button type="submit" class="btn btn-info btn-block margin_left">
                                                <span>Send</span>
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script  src="{{ asset('admin/assets/vendors/summernote/js/summernote.min.js') }}"  type="text/javascript"></script>
        <script src="{{ asset('admin/assets/js/custom_js/compose.js') }}" type="text/javascript"></script>
        @stop