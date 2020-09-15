@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')General Components @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/css/custom_css/alertmessage.css') }}" rel="stylesheet" type="text/css">
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <!--section starts-->
                    <h1>General Components</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li><a href="#">UI Features</a> </li>
                        <li> General Components</li>
                    </ol>
                </section>
                <!--section ends-->
                <section class="content">
                    <!--main content-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-bullhorn"></i>
                                        Wells
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="well well-gc">Look, I'm in a well!</div>
                                        <div class="well well-gc well-sm">Look, I'm in a small well!</div>
                                        <div class="well well-gc well-lg">Look, I'm in a large well!</div>
                                    </div>
                                    <!-- /.row --> </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-angle-double-right"></i>
                                        Breadcrumbs
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="bs-example">
                                        <ul class="breadcrumb">
                                            <li class="next">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="next">
                                                <a href="#">UI Features</a>
                                            </li>
                                            <li>Pickers</li>
                                        </ul>
                                        <ul class="breadcrumb">
                                            <li class="next1">
                                                <a href="#">Dashboard</a>
                                            </li>
                                            <li class="next1">
                                                <a href="#">Charts</a>
                                            </li>
                                            <li>Flot Charts</li>
                                        </ul>
                                        <ul class="breadcrumb" style="margin-bottom: 20px;">
                                            <li class="next2">
                                                <a href="#">Dashboard</a>
                                            </li>
                                            <li class="next2">
                                                <a href="#">Tables</a>
                                            </li>
                                            <li>Data Tables</li>
                                        </ul>
                                        <ul class="breadcrumb" style="margin-bottom: 15px;">
                                            <li class="next">
                                                <a href="#">Dashboard</a>
                                            </li>
                                            <li class="next1">
                                                <a href="#">Forms</a>
                                            </li>
                                            <li>Form Elements</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel Primary</h3>
                                </div>
                                <div class="panel-body">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel Success</h3>
                                </div>
                                <div class="panel-body">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel Warning</h3>
                                </div>
                                <div class="panel-body">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel Danger</h3>
                                </div>
                                <div class="panel-body">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Tabbed Panel</h3>
                                    <div class=" kal pull-right">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li class="active">
                                                <a href="#tab1" class="tabfix" data-toggle="tab">Tab 1</a>
                                            </li>
                                            <li>
                                                <a href="#tab2" class="tabfix" data-toggle="tab">Tab 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content" id="slim1">
                                        <div class="tab-pane text-justify active" id="tab1">
                                            <h4>Tab 1 Body Content</h4>
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. AtLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. AtLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                        </div>
                                        <div class="tab-pane text-justify" id="tab2">
                                            <h4>Tab 2 Body Content</h4>
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel Info</h3>
                                </div>
                                <div class="panel-body">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. AtLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. AtLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-gear"></i>
                                        Basic Alerts
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="alert alert-success">
                                        <p>
                                            Well done! You successfully read this important alert message.
                                        </p>
                                    </div>
                                    <div class="alert alert-info">
                                        <p>
                                            Heads up! This alert needs your attention, but it's not super important.
                                        </p>
                                    </div>
                                    <div class="alert alert-warning">
                                        <p>Warning! Better check yourself, you're not looking too good.</p>
                                    </div>
                                    <div class="alert alert-danger">
                                        <p>Oh snap! Change a few things up and try submitting again.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-bell"></i>
                                        Dismissable Alerts
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Well done!</strong>
                                        You successfully read this important alert message.
                                    </div>
                                    <div class="alert alert-info alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Heads up!</strong>
                                        This alert needs your attention, but it's not super important.
                                    </div>
                                    <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Warning!</strong>
                                        Better check yourself, you're not looking too good.
                                    </div>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>Oh snap!</strong>
                                        Change a few things up and try submitting again.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-star"></i>
                                        Links in Alerts
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="alert alert-success">
                                        <strong>Well done!</strong>
                                        You successfully read
                                        <a href="#" class="alert-link">this important alert message.</a>
                                    </div>
                                    <div class="alert alert-info">
                                        <strong>Heads up!</strong>
                                        This
                                        <a href="#" class="alert-link">alert needs your attention,</a>
                                        but it's not super important.
                                    </div>
                                    <div class="alert alert-warning">
                                        <strong>Warning!</strong>
                                        Better check yourself,
                                        <a href="#" class="alert-link">you're not looking too good.</a>
                                    </div>
                                    <div class="alert alert-danger">
                                        <strong>Oh snap!</strong>
                                        <a href="#" class="alert-link">Change a few things up</a>
                                        and try submitting again.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-fighter-jet"></i>
                                        Notes
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="alert-message alert-message-success">
                                        <h4>Alert Message Success</h4>
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                            <strong>strong message</strong>
                                            .
                                        </p>
                                    </div>
                                    <div class="alert-message alert-message-default">
                                        <h4>Alert Message Default</h4>
                                        <p>
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                            <strong>strong message</strong>
                                            .
                                        </p>
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
                                        <i class="fa fa-fw fa-toggle-right"></i>
                                        Different Size Progress Bars
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body">
                                        No class
                                        <div class="progress progress-striped">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                        Class:
                                        <code>.sm</code>
                                        <div class="progress sm progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                        Class:
                                        <code>.xs</code>
                                        <div class="progress xs progress-striped">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-hand-o-right"></i>
                                        Progress Bars
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-bullhorn"></i>
                                        Typography Heading
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body text-center">
                                        <h1>h1. Bootstrap heading</h1>
                                        <h2>h2. Bootstrap heading</h2>
                                        <h3>h3. Bootstrap heading</h3>
                                        <h4>h4. Bootstrap heading</h4>
                                        <h5>h5. Bootstrap heading</h5>
                                        <h6>h6. Bootstrap heading</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-bell"></i>
                                        Horizontal Description
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body">
                                        <dl class="dl-horizontal">
                                            <dt>Description lists</dt>
                                            <dd>A description list is perfect for defining terms.</dd>
                                            <dt>Question</dt>
                                            <dd>
                                                Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                                            </dd>
                                            <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                            <dt>Progress bar</dt>
                                            <dd>Etiam porta sem malesuada magna mollis euismod.</dd>

                                            <dt>Description lists</dt>
                                            <dd>A description list is perfect for defining terms.</dd>
                                            <dt>Question</dt>
                                            <dd>
                                                Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                                            </dd>
                                            <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                            <dt>Progress bar</dt>
                                            <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                            <dt>Answer</dt>
                                            <dd>
                                                Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                                            </dd>
                                        </dl>
                                    </div>
                                    <!-- /.box-body --> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-legal"></i>
                                        Unstyled List
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body">
                                        <ul class="list-unstyled">
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Consectetur adipiscing elit</li>
                                            <li>Integer molestie lorem at massa</li>
                                            <li>Facilisis in pretium nisl aliquet</li>
                                            <li>
                                                Nulla volutpat aliquam velit
                                                <ul>
                                                    <li>Phasellus iaculis neque</li>
                                                    <li>Purus sodales ultricies</li>
                                                    <li>Vestibulum laoreet porttitor sem</li>
                                                    <li>Ac tristique libero volutpat at</li>
                                                </ul>
                                            </li>
                                            <li>Faucibus porta lacus fringilla vel</li>
                                            <li>Aenean sit amet erat nunc</li>
                                            <li>Eget porttitor lorem</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-bullhorn"></i>
                                        Unordered List
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body disc_type">
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Consectetur adipiscing elit</li>
                                            <li>Integer molestie lorem at massa</li>
                                            <li>Facilisis in pretium nisl aliquet</li>
                                            <li>
                                                Nulla volutpat aliquam velit
                                                <ul>
                                                    <li>Phasellus iaculis neque</li>
                                                    <li>Purus sodales ultricies</li>
                                                    <li>Vestibulum laoreet porttitor sem</li>
                                                    <li>Ac tristique libero volutpat at</li>
                                                </ul>
                                            </li>
                                            <li>Faucibus porta lacus fringilla vel</li>
                                            <li>Aenean sit amet erat nunc</li>
                                            <li>Eget porttitor lorem</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-bell"></i>
                                        Ordered Lists
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body">
                                        <ol>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Consectetur adipiscing elit</li>
                                            <li>Integer molestie lorem at massa</li>
                                            <li>Facilisis in pretium nisl aliquet</li>
                                            <li>
                                                Nulla volutpat aliquam velit
                                                <ol>
                                                    <li>Phasellus iaculis neque</li>
                                                    <li>Purus sodales ultricies</li>
                                                    <li>Vestibulum laoreet porttitor sem</li>
                                                    <li>Ac tristique libero volutpat at</li>
                                                </ol>
                                            </li>
                                            <li>Faucibus porta lacus fringilla vel</li>
                                            <li>Aenean sit amet erat nunc</li>
                                            <li>Eget porttitor lorem</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--main content ends-->
                    </section>
                <!-- /.content -->
        @stop