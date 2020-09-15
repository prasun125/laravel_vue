@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Mail Box @parent

@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/iCheck/css/minimal/green.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/custom_css/mail.css') }}" rel="stylesheet" type="text/css"/>
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Mail Box</h1>
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
            <li>Mail Box</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <a href="compose" role="button" class="btn btn-info btn-sm btn-block">COMPOSE</a>

                <div class="panel">
                    <div class="panel-body pan">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active">
                                <a href="mail_box">
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

                <div class="mail-box-header">

                    <form action="#" class="pull-right mail-search">
                        <div class="input-group">
                            <input type="text" class="form-control input-sm" name="search" placeholder="Search email">

                            <div class="input-group-btn">
                                <button type=button  class="btn btn-sm btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                    <h2>Inbox (20)</h2>
                </div>
                <div class="mail-option">
                    <div class="btn-group pull-left table-bordered paddingrightleft_10 paddingtopbottom_5px">
                        <input type="checkbox" id="check-all">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu ul">
                            <!-- dropdown menu links -->
                            <li>
                                <a href="#">All</a>
                            </li>
                            <li>
                                <a href="#">None</a>
                            </li>
                            <li>
                                <a href="#">Read</a>
                            </li>
                            <li>
                                <a href="#">UnRead</a>
                            </li>
                            <li>
                                <a href="#">Starred</a>
                            </li>
                            <li>
                                <a href="#">Unstarred</a>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#"
                           class="btn mini tooltips">
                            <i class=" fa fa-refresh"></i>
                        </a>
                    </div>
                    <div class="btn-group hidden-phone">
                        <a data-toggle="dropdown" href="#" class="btn mini blue">
                            More
                            <i class="fa fa-angle-down "></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-pencil"></i>
                                    Mark as Read
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-ban"></i>
                                    Spam
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-trash-o"></i>
                                    Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <a data-toggle="dropdown" href="#" class="btn mini blue">
                            <i class="fa fa-folder"></i>
                            Move to
                            <i class="fa fa-angle-down "></i>
                        </a>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <a href="#">Important</a>
                            </li>
                            <li>
                                <a href="#">Draft</a>
                            </li>
                            <li>
                                <a href="#">Spam</a>
                            </li>
                        </ul>
                    </div>

                    <ul class="unstyled inbox-pagination">
                        <li>
                            <span>1-20</span>
                        </li>
                        <li>
                            <a class="np-btn" href="#">
                                <i class="fa fa-angle-left  pagination-left"></i>
                            </a>
                        </li>
                        <li>
                            <a class="np-btn" href="#">
                                <i class="fa fa-angle-right pagination-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mail-box">

                    <table class="table" id="inbox-check">
                        <tbody>
                        <tr data-messageid="1" class="unread">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star text-warning"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">John</a>
                            </td>
                            <td class="view-message ">
                                <a href="">Fwd: Make changes as needed</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="">
                                    <i class="fa fa-paperclip"></i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">16:30 PM</a>
                            </td>
                        </tr>
                        <tr data-messageid="2" class="unread">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star text-warning"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar1.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Marin</a>
                            </td>
                            <td class="view-message">
                                <a href="">Ya comin' to our July webinar?</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="3">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star text-warning"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar7.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Jenny</a>
                            </td>
                            <td class="view-message">
                                <a href="">Mobile-First Type & Layout</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="4">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar4.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Twiter</a>
                            </td>
                            <td class="view-message">
                                <a href="">This looks like borrows page</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="5">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar2.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">
                                    Grace
                                    <span class="label label-warning pull-right">Clients</span>
                                </a>
                            </td>
                            <td class="view-message">
                                <a href="">Ya comin' to our July webinar?</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="6">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar3.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Kimy</a>
                            </td>
                            <td class="view-message">
                                <a href="">Analysis on Views</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="">
                                    <i class="fa fa-paperclip"></i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="7">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar4.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">
                                    Tony
                                    <span class="label label-danger pull-right">Documents</span>
                                </a>
                            </td>
                            <td class="view-message">
                                <a href="">Ya comin' to our July webinar?</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="">
                                    <i class="fa fa-paperclip"></i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="8">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar4.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Sandy</a>
                            </td>
                            <td class="view-message view-message">
                                <a href="">Analysis on Views</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="9">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar5.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Avin</a>
                            </td>
                            <td class="view-message view-message">
                                <a href="">Mobile-First Type & Layout</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="10">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar1.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">
                                    MJ
                                    <span class="label label-info pull-right">urgent</span>
                                </a>
                            </td>
                            <td class="view-message view-message">
                                <a href="">Make changes as needed</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="11">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar7.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Lofer</a>
                            </td>
                            <td class="view-message">
                                <a href="">Welcome back to here</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="12">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="hidden-xs">
                                                <span class="view-message hidden-xs">
                                                    <a href="">
                                                        <img src=" {{ asset('admin/assets/img/authors/avatar1.jpg') }}" width="27" height="27"
                                                             class="img-circle img-responsive pull-left" alt="Image">Renny</a>
                                                </span>
                            </td>
                            <td class="view-message">
                                <a href="">Dolor sit amet, consectetuer adipiscing</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="">
                                    <i class="fa fa-paperclip"></i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="13">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar1.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Benny</a>
                            </td>
                            <td class="view-message">
                                <a href="">This looks like borrows page</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="">
                                    <i class="fa fa-paperclip"></i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="14">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="hidden-xs">
                                                <span class="view-message hidden-xs">
                                                    <a href="">
                                                        <img src=" {{ asset('admin/assets/img/authors/avatar1.jpg') }}" width="27" height="27"
                                                             class="img-circle img-responsive pull-left" alt="Image">Grace</a>
                                                </span>
                            </td>
                            <td class="view-message view-message">
                                <a href="">Analysis on Views</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="15">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar1.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Mike</a>
                            </td>
                            <td class="view-message">
                                <a href="">Ya comin' to our July webinar?</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="16">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar1.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Clark</a>
                            </td>
                            <td class="view-message">
                                <a href="">Make changes as needed</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="17">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar1.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">Robin</a>
                            </td>
                            <td class="view-message">
                                <a href="">Mobile-First Type & Layout</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href=""></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="18">
                            <td class="inbox-small-cells">
                                <div class="checker">
                                                    <span>
                                                        <input type="checkbox"></span>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <span class="fa fa-star col"></span>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="">
                                    <img src=" {{ asset('admin/assets/img/authors/avatar1.jpg') }}" width="27" height="27"
                                         class="img-circle img-responsive pull-left" alt="Image">FB</a>
                            </td>
                            <td class="view-message view-message">
                                <a href="">Ya comin' to our July webinar?</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="">
                                    <i class="fa fa-paperclip"></i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="">June 14</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/mail.js') }}" type="text/javascript"></script>
@stop