@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Draggable Portlets @parent
@stop



@section('header_styles')
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<!--page level css -->
<link href="{{ asset('admin/assets/css/custom_css/sortable_list.css')}}" rel="stylesheet" type="text/css">
<!--end of page level css-->
@stop


@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Draggable Portlets 2</h1>
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
                    Draggable Portlets 2
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Sortable List1
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <i class="fa fa-fw fa-times removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div data-force="30" class="layer block">
                                <ul id="foo" class="block__list block__list_words">
                                    <li>List1</li>
                                    <li>List2</li>
                                    <li>List3</li>
                                    <li>List4</li>
                                    <li>List5</li>
                                    <li>List6</li>
                                    <li>List7</li>
                                    <li>List8</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Sortable List2
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <i class="fa fa-fw fa-times removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div data-force="18" class="layer block">
                                <ul id="bar" class="block__list block__list_tags">
                                    <li>Item1</li>
                                    <li>Item2</li>
                                    <li>Item3</li>
                                    <li>Item4</li>
                                    <li>Item5</li>
                                    <li>Item6</li>
                                    <li>Item7</li>
                                    <li>Item8</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Addable list
                            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <i class="fa fa-fw fa-times removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div class="">
                                <a name="e"></a>
                                <div id="filter">
                                    <div class="block__list block__list_words">
                                        <ul id="editable" class="list-unstyled">
                                            <li>List1<i class="js-remove">✖</i></li>
                                            <li>List2<i class="js-remove">✖</i></li>
                                            <li>List3<i class="js-remove">✖</i></li>
                                        </ul>
                                        <button  data-target="#myModal" data-toggle="modal" class="btn btn-primary btn-block">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">New List</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="#" method="post" id="myform">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                <div class="form-group">
                                                    <label class="control-label" for="list-name">Name:</label>
                                                    <input type="text" class="form-control" name="list_name" id="list-name" data-error="First name must be entered" required>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="save">Save changes</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Multi list
                </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <i class="fa fa-fw fa-times removepanel clickable"></i>
                            </span>
            </div>
            <div class="panel-body">
                <a name="m"></a>
                <div id="multi">
                    <div class="layer tile" data-force="30">
                        <div class="tile__name">Group A</div>
                        <div class="tile__list">
                            <img src="{{asset('admin/assets/img/authors/avatar.jpg')}}"/>
                            <img src="{{asset('admin/assets/img/authors/avatar1.jpg')}}"/>
                            <img src="{{asset('admin/assets/img/authors/avatar2.jpg')}}"/>
                            <img src="{{asset('admin/assets/img/authors/avatar3.jpg')}}"/>
                        </div>
                    </div>
                    <div class="layer tile" data-force="25">
                        <div class="tile__name">Group B</div>
                        <div class="tile__list">
                            <img src="{{asset('admin/assets/img/authors/avatar4.jpg')}}"/>
                            <img src="{{asset('admin/assets/img/authors/avatar5.jpg')}}"/>
                            <img src="{{asset('admin/assets/img/authors/avatar1.jpg')}}"/>
                        </div>
                    </div>
                    <div class="layer tile" data-force="20">
                        <div class="tile__name">Group C</div>
                        <div class="tile__list">
                            <img src="{{asset('admin/assets/img/authors/avatar7.jpg')}}"/>
                            <img src="{{asset('admin/assets/img/authors/avatar.jpg')}}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Advanced groups
                </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <i class="fa fa-fw fa-times removepanel clickable"></i>
                            </span>
            </div>
            <div class="panel-body">
                <a name="ag"></a>
                <div id="advanced">
                    <div class="col-lg-4">
                        <div  class="block__list block__list_words">
                            <h4 class="block__list-title">pull & put</h4>
                            <ul id="advanced-1" class="list-unstyled">
                                <li>Meat</li>
                                <li>Potato</li>
                                <li>Tea</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="block__list block__list_words">
                            <h4 class="block__list-title">only pull (clone) no&nbsp;reordering</h4>
                            <ul id="advanced-2" class="list-unstyled">
                                <li>Sex</li>
                                <li>Drugs</li>
                                <li>Rock'n'roll</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="block__list block__list_words">
                            <h4 class="block__list-title ">only put</h4>
                            <ul id="advanced-3" class="list-unstyled">
                                <li>Money</li>
                                <li>Force</li>
                                <li>Agility</li>
                            </ul>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12"><div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">
                Drag handle and selectable text
            </h3>
                            <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <i class="fa fa-fw fa-times removepanel clickable"></i>
                            </span>
        </div>
        <div class="panel-body">
            <a name="h"></a>
            <div id="handle">
                <div class="block__list_words">
                    <ul id="handle-1">
                        <li><span class="drag-handle">&#9776;</span>List Item 1</li>
                        <li><span class="drag-handle">&#9776;</span>List Item2</li>
                        <li><span class="drag-handle">&#9776;</span>List Item 3</li>
                    </ul>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>
    </div>
    </div>
</div>
<div id="right" class="bg-light lter">
    <div class="pad50" id="slim2">
        <div class="rightsidebar-right">
            <div class="rightsidebar-right-content">
                <h5 class="rightsidebar-right-heading rightsidebar-right-heading-first text-uppercase text-xs">
                    <i class="menu-icon  fa fa-fw fa-paw"></i>
                    Contacts
                </h5>

                <ul class="list-unstyled margin-none">
                    <li class="rightsidebar-contact-wrapper">
                        <a class="rightsidebar-contact" href="#">
                            <img src="{{asset('admin/assets/img/authors/avatar1.jpg')}}" alt="image" height="20" width="20" class="img-circle pull-right">
                            <i class="fa fa-circle text-xs text-primary"></i>
                            Alanis
                        </a>
                    </li>
                    <li class="rightsidebar-contact-wrapper">
                        <a class="rightsidebar-contact" href="#">
                            <img src="{{asset('admin/assets/img/authors/avatar.jpg')}}" alt="image" height="20" width="20" class="img-circle pull-right">
                            <i class="fa fa-circle text-xs text-primary"></i>
                            Rolando
                        </a>
                    </li>
                    <li class="rightsidebar-contact-wrapper">
                        <a class="rightsidebar-contact" href="#">
                            <img src="{{asset('admin/assets/img/authors/avatar2.jpg')}}" alt="image" height="20" width="20" class="img-circle pull-right">
                            <i class="fa fa-circle text-xs text-primary"></i>
                            Marlee
                        </a>
                    </li>
                    <li class="rightsidebar-contact-wrapper">
                        <a class="rightsidebar-contact" href="#">
                            <img src="{{asset('admin/assets/img/authors/avatar3.jpg')}}" alt="image" height="20" width="20" class="img-circle pull-right">
                            <i class="fa fa-circle text-xs text-warning"></i>
                            Marlee
                        </a>
                    </li>
                    <li class="rightsidebar-contact-wrapper">
                        <a class="rightsidebar-contact" href="#">
                            <img src="{{asset('admin/assets/img/authors/avatar4.jpg')}}" alt="image" height="20" width="20" class="img-circle pull-right">
                            <i class="fa fa-circle text-xs text-danger"></i>
                            Kamryn
                        </a>
                    </li>
                    <li class="rightsidebar-contact-wrapper">
                        <a class="rightsidebar-contact" href="#">
                            <img src="{{asset('admin/assets/img/authors/avatar5.jpg')}}" alt="image" height="20" width="20" class="img-circle pull-right">
                            <i class="fa fa-circle text-xs text-muted"></i>
                            Cielo
                        </a>
                    </li>
                    <li class="rightsidebar-contact-wrapper">
                        <a class="rightsidebar-contact" href="#">
                            <img src="{{asset('admin/assets/img/authors/avatar7.jpg')}}" alt="image" height="20" width="20" class="img-circle pull-right">
                            <i class="fa fa-circle text-xs text-muted"></i>
                            Charlene
                        </a>
                    </li>
                </ul>

                <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                    <i class="fa fa-fw fa-tasks"></i>
                    Tasks
                </h5>
                <ul class="list-unstyled margin-top">
                    <li>
                        <div>
                            <p>
                                <strong>Task 1</strong>
                                <span class="dropdown-small pull-right text-muted">40% Complete</span>
                            </p>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p>
                                <strong>Task 2</strong>
                                <span class="dropdown-small pull-right text-muted">20% Complete</span>
                            </p>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                    <span class="sr-only">20% Complete</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p>
                                <strong>Task 3</strong>
                                <span class="dropdown-small pull-right text-muted">60% Complete</span>
                            </p>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p>
                                <strong>Task 4</strong>
                                <span class="dropdown-small pull-right text-muted">80% Complete</span>
                            </p>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                    <span class="sr-only">80% Complete (danger)</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                    <i class="fa fa-fw fa-group"></i>
                    Recent Activities
                </h5>
                <div>
                    <ul class="list-unstyled">
                        <li class="rightsidebar-notification">
                            <a href="#">
                                <i class="fa fa-comment fa-fw pri"></i>
                                New Comment
                            </a>
                        </li>
                        <li class="rightsidebar-notification">
                            <a href="#">
                                <i class="fa fa-twitter fa-fw succ"></i>
                                3 New Followers
                            </a>
                        </li>
                        <li class="rightsidebar-notification">
                            <a href="#">
                                <i class="fa fa-envelope fa-fw info"></i>
                                Message Sent
                            </a>
                        </li>
                        <li class="rightsidebar-notification">
                            <a href="#">
                                <i class="fa fa-tasks fa-fw warn"></i>
                                New Task
                            </a>
                        </li>
                        <li class="rightsidebar-notification">
                            <a href="#">
                                <i class="fa fa-upload fa-fw dan"></i>
                                Server Rebooted
                            </a>
                        </li>
                        <li class="rightsidebar-notification">
                            <a href="#">
                                <i class="fa fa-warning fa-fw pri"></i>
                                Server Not Responding
                            </a>
                        </li>
                        <li class="rightsidebar-notification">
                            <a href="#">
                                <i class="fa fa-shopping-cart fa-fw succ"></i>
                                New Order Placed
                            </a>
                        </li>
                        <li class="rightsidebar-notification">
                            <a href="#">
                                <i class="fa fa-money fa-fw info"></i>
                                Payment Received
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
        @stop
<!-- ./wrapper -->
 @section('footer_scripts')

<!-- begining of page level js-->
<script src="{{ asset('admin/assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
        type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/Sortable/js/Sortable.js')}}" type="text/javascript"></script>
{{--<script src="{{ asset('admin/assets/vendors/Sortable/js/app.js')}}" type="text/javascript"></script>--}}
<script src="{{ asset('admin/assets/js/custom_js/sortable_list.js') }}" type="text/javascript"></script>
<!-- end of page level js -->
@stop