@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Form Wizards
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/custom_css/form_wizard.css') }}" type="text/css" rel="stylesheet"/>
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>Form Wizards</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
            <li>
               Form Wizards
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <!--main-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-arrows-alt"></i>
                            Basic Form wizard
                        </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                     <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                    </div>
                    <div class="panel-body">
                        <!--main content-->
                        <div class="row">
                            <section id="wizard">
                                <form id="commentForm" method="post" class="form-horizontal">
                                    <div id="rootwizard">
                                        <ul>
                                            <li>
                                                <a href="#tab1" data-toggle="tab">User Profile</a>
                                            </li>
                                            <li>
                                                <a href="#tab2" data-toggle="tab">Profile Details</a>
                                            </li>
                                            <li>
                                                <a href="#tab3" data-toggle="tab">Contact Details</a>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="tab-content">
                                            <div class="tab-pane" id="tab1">

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">User Name *</label>

                                                    <div class="col-sm-4">
                                                        <input type="text" id="namefield" name="namefield"
                                                               placeholder="Enter your name"
                                                               class="form-control required"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Email *</label>

                                                    <div class="col-sm-4">
                                                        <input type="text" id="emailfield"
                                                               placeholder="Enter your email " name="emailfield"
                                                               class="form-control required email"></div>
                                                </div>
                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Password *</label>

                                                    <div class="col-sm-4">
                                                        <input type="password" id="passwordfield" name="passwordfield"
                                                               placeholder="Enter your password" class="form-control">
                                                    </div>
                                                </div>
                                                <!-- Text input-->
                                                <div class="form-group conf_pwd">
                                                    <label class="col-sm-3 control-label">Confirm Password *</label>

                                                    <div class="col-sm-4">
                                                        <input type="password" placeholder="Confirm your Password "
                                                               name="confpasswordfield" id="conf_password" class="form-control"></div>
                                                </div>

                                                <!-- Text input-->

                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                <!-- Form Name -->

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">First Name *</label>

                                                    <div class="col-sm-3">
                                                        <input type="text" id="fnamefield" name="fnamefield"
                                                               placeholder="First Name" class="form-control required">
                                                    </div>
                                                    <label class="col-sm-2 control-label">Last Name *</label>

                                                    <div class="col-sm-3">
                                                        <input type="text" id="lnamefield" name="lnamefield"
                                                               placeholder="Last Name" class="form-control required">
                                                    </div>
                                                </div>
                                                <!-- select-->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Gender</label>

                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option value="">select</option>
                                                            <option value="male">MALE</option>
                                                            <option value="female">FEMALE</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Line 1</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" id="linefield" name="linefield"
                                                               placeholder="Address Line 1"
                                                               class="form-control"></div>
                                                </div>

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">City</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" id="cityfield" name="cityfield"
                                                               placeholder="City" class="form-control"></div>
                                                </div>
                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">State</label>

                                                    <div class="col-sm-3">
                                                        <input type="text" id="statefield" name="statefield"
                                                               placeholder="State" class="form-control"></div>
                                                    <label class="col-sm-2 control-label">Postcode</label>

                                                    <div class="col-sm-3">
                                                        <input type="text" id="postcodefield" name="postcodefield"
                                                               placeholder="Post Code" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab3">

                                                <!-- Form Name -->

                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Home Number</label>

                                                    <div class="col-sm-4">
                                                        <input type="text" id="phonefield" name="phonefield1"
                                                               placeholder="Home Number" class="form-control"></div>
                                                </div>
                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Personal Number *</label>

                                                    <div class="col-sm-4">
                                                        <input type="text" id="phone1field" name="phone1field2"
                                                               placeholder="Personal Number" class="form-control"></div>
                                                </div>
                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Alternate Number *</label>

                                                    <div class="col-sm-4">
                                                        <input type="text" placeholder="Alternate Number"
                                                               class="form-control" name="aleternateNumber"></div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard">
                                                <li class="previous"><a href="#">Previous</a></li>
                                                <li class="next"><a href="#">Next</a></li>
                                                <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">User Register</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You Submitted Successfully.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>

                            </section>
                        </div>

                        <!--main content end--> </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('admin/assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/form_wizards.js') }}"></script>
@stop