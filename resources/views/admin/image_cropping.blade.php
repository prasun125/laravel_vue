@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Image Cropping @parent
@stop



@section('header_styles')

 <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!--page level css -->
<link href="{{ asset('admin/assets/vendors/cropper/css/cropper.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin/assets/css/custom_css/crop.css')}}" rel="stylesheet" type="text/css">
<!--end of page level css-->

@stop

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Image Cropping</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-fw fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li>Gallery</li>
                <li>
                    Image Cropping
                </li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw fa-eye"></i>
                                Image Cropping
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <!-- <h3 class="page-header">Demo:</h3> -->
                                    <div class="img-container">
                                        <img id="image" src="{{asset('admin/assets/img/gallery/full/21.jpg')}}" alt="Picture">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- <h3 class="page-header">Data:</h3> -->
                                    <div class="docs-data">
                                        <div class="input-group input-group-sm">
                                            <label class="input-group-addon" for="dataX">X</label>
                                            <input type="text" class="form-control" id="dataX" placeholder="x">
                                            <span class="input-group-addon">px</span>
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <label class="input-group-addon" for="dataY">Y</label>
                                            <input type="text" class="form-control" id="dataY" placeholder="y">
                                            <span class="input-group-addon">px</span>
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <label class="input-group-addon" for="dataWidth">Width</label>
                                            <input type="text" class="form-control" id="dataWidth" placeholder="width">
                                            <span class="input-group-addon">px</span>
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <label class="input-group-addon" for="dataHeight">Height</label>
                                            <input type="text" class="form-control" id="dataHeight" placeholder="height">
                                            <span class="input-group-addon">px</span>
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <label class="input-group-addon" for="dataRotate">Rotate</label>
                                            <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                                            <span class="input-group-addon">deg</span>
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <label class="input-group-addon" for="dataScaleX">ScaleX</label>
                                            <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                                        </div>
                                        <div class="input-group input-group-sm">
                                            <label class="input-group-addon" for="dataScaleY">ScaleY</label>
                                            <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 docs-buttons">
                                    <!-- <h3 class="page-header">Toolbar:</h3> -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn_marTop" data-method="rotate" data-option="-45" title="Rotate Left">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="rotate left">
                                              <span class="fa fa-rotate-left"></span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn_marTop" data-method="rotate" data-option="45" title="Rotate Right">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="rotate right">
                                              <span class="fa fa-rotate-right"></span>
                                            </span>
                                        </button>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn_marTop" data-method="scaleX" data-option="-1" title="Flip Horizontal">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="horizontal scale">
                                              <span class="fa fa-arrows-h"></span>
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn_marTop" data-method="scaleY" data-option="-1" title="Flip Vertical">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="vertical scale">
                                              <span class="fa fa-arrows-v"></span>
                                            </span>
                                        </button>
                                    </div>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn_marTop" data-method="reset" title="Reset">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="reset">
                                              <span class="fa fa-refresh"></span>
                                            </span>
                                        </button>
                                        <label class="btn btn-primary btn-upload btn_marTop" for="inputImage" title="Upload image file">
                                            <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
                                              <span class="fa fa-upload"></span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="btn-group btn-group-crop btn_marTop">
                                        <button type="button" class="btn btn-primary" data-method="getCroppedCanvas">
                                            <span class="docs-tooltip" data-toggle="tooltip" title="get the image">
                                              Get Cropped Canvas
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=" width: 160, height: 90 ">
                                              160&times;90
                                            </span>
                                        </button>
                                        <button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }">
                                            <span class="docs-tooltip" data-toggle="tooltip" title=" width: 320, height: 180 ">
                                              320&times;180
                                            </span>
                                        </button>
                                    </div>

                                    <!-- Show the cropped image in modal -->
                                    <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
                                                </div>
                                                <div class="modal-body"></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <a class="btn btn-primary" id="download" download="cropped.png" href="javascript:void(0);">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->

                                    <button type="button" class="btn btn-primary btn_marTop" data-method="moveTo" data-option="0">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="moveTo(0)">
                                        0,0
                                      </span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn_marTop" data-method="zoomTo" data-option="1">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="zoomTo(1)">
                                        100%
                                      </span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn_marTop" data-method="rotateTo" data-option="180">
                                      <span class="docs-tooltip" data-toggle="tooltip" title="rotateTo(180)">
                                        180°
                                      </span>
                                    </button>
                                </div><!-- /.docs-buttons -->

                                <div class="col-md-3 docs-toggles">
                                    <!-- <h3 class="page-header">Toggles:</h3> -->
                                    <div class="btn-group btn_marTop" data-toggle="buttons">
                                        <label class="btn btn-primary active">
                                            <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
                                                <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 16 / 9">
                                                  16:9
                                                </span>
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
                                                <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 4 / 3">
                                                  4:3
                                                </span>
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                                                <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 1 / 1">
                                                  1:1
                                                </span>
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
                                                <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 2 / 3">
                                                  2:3
                                                </span>
                                        </label>
                                        <label class="btn btn-primary">
                                            <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">

                                            Free

                                        </label>
                                    </div>
                                </div><!-- /.docs-toggles -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--row-->
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

<!-- begining of page level js -->
<script src="{{ asset('admin/assets/vendors/cropper/js/cropper.min.js')}}" type="text/javascript" ></script>
<script src="{{ asset('admin/assets/js/custom_js/crop.js')}}" type="text/javascript"></script>
<!-- end of page level js -->
@stop

