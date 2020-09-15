@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Form Elements @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <!-- daterange picker -->
    <link href="{{ asset('admin/assets/vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <!--select css-->
    <link href="{{ asset('admin/assets/vendors/select2/css/select2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <!--clock face css-->
    <link href="{{ asset('admin/assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/vendors/clockpicker/css/bootstrap-clockpicker.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('admin/assets/vendors/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/assets/css/custom_css/form_elements.css') }}" rel="stylesheet">
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <!--section starts-->
                    <h1>Form Elements</h1>
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
                            Form Elements
                        </li>
                    </ol>
                </section>
                <!--section ends-->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-crosshairs"></i>
                                        General Elements
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                     <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="input-text" class="col-sm-2 control-label">Input text</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-text" placeholder="Input text"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword" placeholder="Password"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-text-disabled" class="col-sm-2 control-label">Disabled</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-text-disabled" placeholder="Input text" disabled></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Radio</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="radio iradio">
                                                            <label>
                                                                <input class="custom_radio" type="radio" name="optionsRadios"
                                                                       value="option1"></label>
                                                            <label class="mar-5">Radio button 1</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="radio iradio">
                                                            <label>
                                                                <input class="custom_radio" type="radio" name="optionsRadios"
                                                                       id="optionsRadios2" value="option2"></label>
                                                            <label class="mar-5">Radio button 2</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Checkbox</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input class="custom_icheck" type="checkbox" name="c1" value=""></label>
                                                            <label class="mar-5">Checkbox 1</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input class="custom_icheck" type="checkbox" name="c1" value=""></label>
                                                            <label class="mar-5">Checkbox 2</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input class="custom_icheck" type="checkbox" name="c1" value=""></label>
                                                            <label class="mar-5">Checkbox 3</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Inline Checkbox</label>
                                            <div class="col-sm-10">
                                                <label class="checkbox-inline" id="checkbox_margl">
                                                    <input class="custom_icheck" type="checkbox" id="inlineCheckbox1" value="option1"> Inline checkbox 1</label>
                                                <label class="checkbox-inline" id="checkbox_margl">
                                                    <input class="custom_icheck" type="checkbox" id="inlineCheckbox2" value="option2"> Inline checkbox 2</label>
                                                <label class="checkbox-inline" id="checkbox_margl">
                                                    <input class="custom_icheck" type="checkbox" id="inlineCheckbox3" value="option3"> Inline checkbox 3</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Select</label>
                                            <div class="col-sm-10">
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Multiple Select</label>
                                            <div class="col-sm-10">
                                                <select multiple class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{--<div class="form-group">--}}
                                            {{--<label class="col-sm-2 control-label">Custom Select</label>--}}
                                            {{--<div class="col-sm-10">--}}
                                                {{--<select class="form-control selectpicker">--}}
                                                    {{--<option>1</option>--}}
                                                    {{--<option>2</option>--}}
                                                    {{--<option>3</option>--}}
                                                    {{--<option>4</option>--}}
                                                    {{--<option>5</option>--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="form-group has-success">
                                            <label for="input-text-has-success" class="col-sm-2 control-label">Input Success</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-text-has-success"></div>
                                        </div>
                                        <div class="form-group has-warning">
                                            <label for="input-text-has-warning" class="col-sm-2 control-label">Input Warning</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-text-has-warning"></div>
                                        </div>
                                        <div class="form-group has-error">
                                            <label for="input-text-has-error" class="col-sm-2 control-label">Input Error</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-text-has-error"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Input Size</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" placeholder="input-sm"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" placeholder="default"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-lg" placeholder="input-lg"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Input group</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="text" class="form-control" placeholder="Username"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon">$</span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-addon">.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-md-6 mar-10">
                                                        <div class="input-group mar-left">
                                                            <span class="input-group-addon">
                                                                <input type="checkbox" class="square-blue"></span>
                                                            <input type="text" class="form-control" id="input-text-has-success"></div>
                                                        <!-- /input-group --> </div>
                                                    <!-- /.col-lg-6 -->
                                                    <div class="col-md-6 mar-10">
                                                        <div class="input-group mar-left">
                                                            <span class="input-group-addon">
                                                                <input type="radio" class="square-blue"></span>
                                                            <input type="text" class="form-control" id="input-text-has-success"></div>
                                                        <!-- /input-group --> </div>
                                                    <!-- /.col-lg-6 --> </div>
                                                <!-- /.row --> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-lg-6 mar-10">
                                                        <div class="input-group mar-left">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-warning" type="button" id="padding_go">Go!</button>
                                                            </span>
                                                            <input type="text" class="form-control input_append"></div>
                                                        <!-- /input-group --> </div>
                                                    <!-- /.col-lg-6 -->
                                                    <div class="col-lg-6 mar-10">
                                                        <div class="input-group mar-left">
                                                            <input type="text" class="form-control">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-warning" type="button">Go!</button>
                                                            </span>
                                                        </div>
                                                        <!-- /input-group --> </div>
                                                    <!-- /.col-lg-6 --> </div>
                                                <!-- /.row --> </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-lg-6 mar-10">
                                                        <div class="input-group mar-left">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                    Action
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown_position">
                                                                    <li>
                                                                        <a href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Another action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Something else here</a>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li>
                                                                        <a href="#">Separated link</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /btn-group -->
                                                            <input type="text" class="form-control"></div>
                                                        <!-- /input-group --> </div>
                                                    <!-- /.col-lg-6 -->
                                                    <div class="col-lg-6 mar-10">
                                                        <div class="input-group mar-left">
                                                            <input type="text" class="form-control">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                                    Action
                                                                    <span class="caret"></span>
                                                                </button>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a href="#">Action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Another action</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">Something else here</a>
                                                                    </li>
                                                                    <li class="divider"></li>
                                                                    <li>
                                                                        <a href="#">Separated link</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /btn-group --> </div>
                                                        <!-- /input-group --> </div>
                                                    <!-- /.col-lg-6 --> </div>
                                                <!-- /.row --> </div>
                                        </div>

                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-gear"></i>
                                        Advanced File Input
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label class="control-label">Select File</label>
                                            <input id="input-20" type="file" class="file-loading"></div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-info small mar-top">Display the widget as a single block button</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label class="control-label">Select File</label>
                                            <input id="input-21" type="file" accept="image/*" class="file-loading"></div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-info small mar-top">
                                                Show only image files for selection & preview. Control button labels, styles, and icons for the pick image, upload, and delete buttons.
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label class="control-label">Select File</label>
                                            <input id="input-22" type="file" class="file" accept="text/plain"  data-preview-file-type="text" data-preview-class="bg-warning"></div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-info small mar-top">
                                                Preview section control. Change preview background and display only text files content within the preview window.
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label class="control-label">Select File</label>
                                            <input id="input-23" type="file"  class="file-loading"></div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-info small mar-top">
                                                Advanced customization using templates. For example, change position of buttons from right to left.
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label class="control-label">Select File</label>
                                            <input id="input-40" type="file" class="file" >
                                            <br>
                                            <button type="button" class="btn btn-warning btn-modify">Modify</button>

                                        </div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-info small mar-top">
                                                Using plugin methods to alter input at runtime. For example, click the Modify button to disable the plugin and change plugin options.
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label class="control-label">Select File</label>
                                            <input id="input-41" type="file"  class="file-loading"></div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-info small mar-top">
                                                Allow only image and video file types to be uploaded. You can configure the condition for validating the file types using
                                                <code>fileTypeSettings</code>
                                                .
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label class="control-label">Select File</label>
                                            <input id="input-42" type="file"  class="file-loading"></div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-info small mar-top">Allow only specific file extensions.</div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <label class="control-label">Select File</label>
                                            <input id="input-43" type="file"  class="file-loading">
                                            <div id="errorBlock" class="help-block"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="alert alert-info small mar-top">
                                                Disable preview and customize your own error container and messages.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-cloud"></i>
                                        Select2
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="form-group mar-20">
                                            <label for="default" class="control-label">Default textbox</label>
                                            <input id="default" type="text" class="form-control" placeholder="Placeholder text"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-20">
                                            <label for="e1" class="control-label">Single select</label>
                                            <select id="e1" class="form-control select2">
                                                <option value="Select">Select</option>
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-20">
                                            <label for="multiple" class="control-label">Multi select</label>
                                            <select id="multiple" class="form-control select2-multiple" multiple>
                                                <option value="Select">Select</option>
                                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                                    <option value="AK">Alaska</option>
                                                    <option value="HI">Hawaii</option>
                                                </optgroup>
                                                <optgroup label="Pacific Time Zone">
                                                    <option value="CA">California</option>
                                                    <option value="NV">Nevada</option>
                                                    <option value="OR">Oregon</option>
                                                    <option value="WA">Washington</option>
                                                </optgroup>
                                                <optgroup label="Mountain Time Zone">
                                                    <option value="AZ">Arizona</option>
                                                    <option value="CO">Colorado</option>
                                                    <option value="ID">Idaho</option>
                                                    <option value="MT">Montana</option>
                                                    <option value="NE">Nebraska</option>
                                                    <option value="NM">New Mexico</option>
                                                    <option value="ND">North Dakota</option>
                                                    <option value="UT">Utah</option>
                                                    <option value="WY">Wyoming</option>
                                                </optgroup>
                                                <optgroup label="Central Time Zone">
                                                    <option value="AL">Alabama</option>
                                                    <option value="AR">Arkansas</option>
                                                    <option value="IL">Illinois</option>
                                                    <option value="IA">Iowa</option>
                                                    <option value="KS">Kansas</option>
                                                    <option value="KY">Kentucky</option>
                                                    <option value="LA">Louisiana</option>
                                                    <option value="MN">Minnesota</option>
                                                    <option value="MS">Mississippi</option>
                                                    <option value="MO">Missouri</option>
                                                    <option value="OK">Oklahoma</option>
                                                    <option value="SD">South Dakota</option>
                                                    <option value="TX">Texas</option>
                                                    <option value="TN">Tennessee</option>
                                                    <option value="WI">Wisconsin</option>
                                                </optgroup>
                                                <optgroup label="Eastern Time Zone">
                                                    <option value="CT">Connecticut</option>
                                                    <option value="DE">Delaware</option>
                                                    <option value="FL">Florida</option>
                                                    <option value="GA">Georgia</option>
                                                    <option value="IN">Indiana</option>
                                                    <option value="ME">Maine</option>
                                                    <option value="MD">Maryland</option>
                                                    <option value="MA">Massachusetts</option>
                                                    <option value="MI">Michigan</option>
                                                    <option value="NH">New Hampshire</option>
                                                    <option value="NJ">New Jersey</option>
                                                    <option value="NY">New York</option>
                                                    <option value="NC">North Carolina</option>
                                                    <option value="OH">Ohio</option>
                                                    <option value="PA">Pennsylvania</option>
                                                    <option value="RI">Rhode Island</option>
                                                    <option value="SC">South Carolina</option>
                                                    <option value="VT">Vermont</option>
                                                    <option value="VA">Virginia</option>
                                                    <option value="WV">West Virginia</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-20">
                                            <label for="select2-single-append" class="control-label">Append Checkbox</label>
                                            <div class="input-group select2-bootstrap-prepend">
                                                <span class="input-group-addon">
                                                    <input type="checkbox" class="chk" checked></span>
                                                <select id="select2-single-append" class="form-control select2-allow-clear">
                                                    <option value="Select">Select</option>
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                        <option value="AK">Alaska</option>
                                                        <option value="HI">Hawaii</option>
                                                    </optgroup>
                                                    <optgroup label="Pacific Time Zone">
                                                        <option value="CA">California</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="WA">Washington</option>
                                                    </optgroup>
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                    <optgroup label="Eastern Time Zone">
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WV">West Virginia</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-20">
                                            <label for="single-append-radio" class="control-label">Multi append Radiobutton</label>
                                            <div class="input-group select2-bootstrap-prepend">
                                                <span class="input-group-addon">
                                                    <input type="radio" class="chk" checked></span>
                                                <select id="single-append-radio" class="form-control select2-allow-clear" multiple>
                                                    <option value="Select">Select</option>
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                        <option value="AK">Alaska</option>
                                                        <option value="HI">Hawaii</option>
                                                    </optgroup>
                                                    <optgroup label="Pacific Time Zone">
                                                        <option value="CA">California</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="WA">Washington</option>
                                                    </optgroup>
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                    <optgroup label="Eastern Time Zone">
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WV">West Virginia</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-20">
                                            <label for="single-append-text" class="control-label">Append</label>
                                            <div class="input-group select2-bootstrap-append">
                                                <select id="single-append-text" class="form-control select2-allow-clear">
                                                    <option value="Select">Select</option>
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                        <option value="AK">Alaska</option>
                                                        <option value="HI">Hawaii</option>
                                                    </optgroup>
                                                    <optgroup label="Pacific Time Zone">
                                                        <option value="CA">California</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="WA">Washington</option>
                                                    </optgroup>
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                    <optgroup label="Eastern Time Zone">
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WV">West Virginia</option>
                                                    </optgroup>
                                                </select>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary sam" type="button" data-select2-open="single-append-text">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-20">
                                            <label for="single-prepend-text" class="control-label">Prepend</label>
                                            <div class="input-group select2-bootstrap-prepend">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary sam" type="button" data-select2-open="single-prepend-text">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                </span>
                                                <select id="single-prepend-text" class="form-control select2">
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-20">
                                            <label for="multi-append" class="control-label">Multi append</label>
                                            <div class="input-group select2-bootstrap-append">
                                                <select id="multi-append" class="form-control select2">
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                </select>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success sam" type="button" data-select2-open="multi-append">
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                    <button class="btn btn-success sam" type="button" data-select2-open="multi-prepend">State</button>
                                                    <button type="button" class="btn btn-success dropdown-toggle sam" data-toggle="dropdown">
                                                        Action
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="#">Action</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Another action</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Something else here</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-20">
                                            <label for="multi-prepend" class="control-label">Multi prepend</label>
                                            <div class="input-group select2-bootstrap-prepend">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-danger sam" type="button" data-select2-open="multi-prepend">State</button>
                                                    <button type="button" class="btn btn-danger dropdown-toggle sam" data-toggle="dropdown">
                                                        Action
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown_position1">
                                                        <li>
                                                            <a href="#">Action</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Another action</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">Something else here</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <select id="multi-prepend" class="form-control select2">
                                                    <option value="Select">Select</option>
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                        <option value="AK">Alaska</option>
                                                        <option value="HI">Hawaii</option>
                                                    </optgroup>
                                                    <optgroup label="Pacific Time Zone">
                                                        <option value="CA">California</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="WA">Washington</option>
                                                    </optgroup>
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                    <optgroup label="Eastern Time Zone">
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WV">West Virginia</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-20">
                                            <label for="select2-disabled-inputs-single" class="control-label">Checkbox</label>
                                            <div class="input-group select2-bootstrap-prepend">
                                                <span class="input-group-addon">
                                                    <input type="checkbox" class="chk1" checked></span>
                                                <select id="select2-disabled-inputs-single" class="form-control select2">
                                                    <option value="Select">Select</option>
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                        <option value="AK">Alaska</option>
                                                        <option value="HI">Hawaii</option>
                                                    </optgroup>
                                                    <optgroup label="Pacific Time Zone">
                                                        <option value="CA">California</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="WA">Washington</option>
                                                    </optgroup>
                                                    <optgroup label="Mountain Time Zone">
                                                        <option value="AZ">Arizona</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="WY">Wyoming</option>
                                                    </optgroup>
                                                    <optgroup label="Central Time Zone">
                                                        <option value="AL">Alabama</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="WI">Wisconsin</option>
                                                    </optgroup>
                                                    <optgroup label="Eastern Time Zone">
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WV">West Virginia</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mar-20">
                                            <label class="control-label ">Country List</label>
                                            <select name="" id="select2_sample4" class="form-control select2">
                                                <option value="Select">Select</option>
                                                <option value="AF">Select Country</option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia</option>
                                                <option value="BA">Bosnia and Herzegowina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Bouvet Island</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CD">Congo, the Democratic Republic of the</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Cote d'Ivoire</option>
                                                <option value="HR">Croatia (Hrvatska)</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Territories</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HM">Heard and Mc Donald Islands</option>
                                                <option value="VA">Holy See (Vatican City State)</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran (Islamic Republic of)</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                <option value="KR">Korea, Republic of</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao People's Democratic Republic</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libyan Arab Jamahiriya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macau</option>
                                                <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia, Federated States of</option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="AN">Netherlands Antilles</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">Reunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint LUCIA</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SK">Slovakia (Slovak Republic)</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SH">St. Helena</option>
                                                <option value="PM">St. Pierre and Miquelon</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syrian Arab Republic</option>
                                                <option value="TW">Taiwan, Province of China</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UM">United States Minor Outlying Islands</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela</option>
                                                <option value="VN">Viet Nam</option>
                                                <option value="VG">Virgin Islands (British)</option>
                                                <option value="VI">Virgin Islands (U.S.)</option>
                                                <option value="WF">Wallis and Futuna Islands</option>
                                                <option value="EH">Western Sahara</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--ends--> </div>
                            </div>
                        </div>
                    </div>
                    <!--main content-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-calendar"></i>
                                        Date Range picker
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Date range:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="reservation" />
                                            </div>
                                            <!-- /.input group --> </div>
                                        <!-- /.form group -->
                                        <!-- Date and time range -->
                                        <div class="form-group">
                                            <label>Clock Picker:</label>
                                            <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                <input type="text" class="form-control" value="Now">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Call Backs Picker:</label>
                                            <div class="input-group clockpicker-with-callbacks">
                                                <input type="text" class="form-control" value="Now">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Date and time range:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="reservationtime" />
                                            </div>
                                            <!-- /.input group --> </div>
                                        <!-- /.form group -->
                                        <!-- Date and time range -->
                                        <div class="form-group">
                                            <label>Date range button:</label>
                                            <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-fw fa-calendar"></i>
                                            </div>
                                                <div id="reportrange" class="form-control pull-right" style="background: #fff; cursor: pointer; overflow:auto; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                                    <span></span>
                                                </div>
                                        </div>
                                            </div>

                                        <!-- /.form group -->
                                        <!-- time picker --> </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-heart-o"></i>
                                        Input masks
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body">
                                        <!-- Date dd/mm/yyyy -->
                                        <div class="form-group">
                                            <label>Date masks:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                                            </div>
                                            <!-- /.input group --> </div>
                                        <!-- /.form group -->
                                        <!-- Date mm/dd/yyyy -->
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask/>
                                            </div>
                                            <!-- /.input group --> </div>
                                        <!-- /.form group -->
                                        <!-- phone mask -->
                                        <div class="form-group">
                                            <label>US phone mask:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-phone"></i>
                                                </div>
                                                <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask/>
                                            </div>
                                            <!-- /.input group --> </div>
                                        <!-- /.form group -->
                                        <!-- phone mask -->
                                        <div class="form-group">
                                            <label>Intl US phone mask:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-phone"></i>
                                                </div>
                                                <input type="text" class="form-control" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask/>
                                            </div>
                                            <!-- /.input group --> </div>
                                        <!-- /.form group -->
                                        <!-- IP mask -->
                                        <div class="form-group">
                                            <label>IP mask:</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-fw fa-laptop"></i>
                                                </div>
                                                <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask/>
                                            </div>
                                            <!-- /.input group --> </div>
                                        <!-- /.form group --> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-check-circle-o"></i>
                                        iCheck - Checkbox &amp; Radio Inputs
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" class="square-blue" checked/>
                                            </label>
                                            <label>
                                                <input type="checkbox" class="square-blue" />
                                            </label>
                                            <label >
                                                <input type="checkbox" class="square-blue" disabled/>
                                            </label>
                                            <label class="mar-5">square blue skin checkbox</label>

                                        </div>
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" class="flat-red" checked/>
                                            </label>
                                            <label>
                                                <input type="checkbox" class="flat-red" />
                                            </label>
                                            <label>
                                                <input type="checkbox" class="flat-red" disabled/>
                                            </label>
                                            <label class="mar-5">Flat red skin checkbox</label>

                                        </div>
                                        <!-- radio -->

                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="r3" class="flat-red" checked/>
                                            </label>
                                            <label>
                                                <input type="radio" name="r3" class="flat-red" />
                                            </label>
                                            <label>
                                                <input type="radio" name="r3" class="flat-red" disabled/>
                                            </label>
                                            <label class="mar-5">Flat red skin radio</label>
                                        </div>
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" class="minimal" checked/>
                                            </label>
                                            <label>
                                                <input type="checkbox" class="minimal" />
                                            </label>
                                            <label>
                                                <input type="checkbox" class="minimal" disabled/>
                                            </label>
                                            <label class="mar-5">Minimal skin checkbox</label>

                                        </div>
                                        <!-- radio -->
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="optionsRadios"  value="option1" class="square-blue" checked></label>
                                            <label>
                                                <input type="radio" name="optionsRadios"  value="option1" class="square-blue"></label>
                                            <label>
                                                <input type="radio" name="optionsRadios"  value="option1" class="square-blue" disabled />
                                            </label>
                                            <label class="mar-5">square blue skin radio</label>

                                        </div>
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="r1" class="minimal" checked/>
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="minimal" />
                                            </label>
                                            <label>
                                                <input type="radio" name="r1" class="minimal" disabled/>
                                            </label>
                                            <label class="mar-5">Minimal skin radio</label>

                                        </div>
                                        <!-- Minimal red style -->
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" class="minimal-red" checked/>
                                            </label>
                                            <label>
                                                <input type="checkbox" class="minimal-red" />
                                            </label>
                                            <label>
                                                <input type="checkbox" class="minimal-red" disabled/>
                                            </label>
                                            <label class="mar-5">Minimal red skin checkbox</label>

                                        </div>
                                        <!-- checkbox -->
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" class="minimal-green" checked/>
                                            </label>
                                            <label>
                                                <input type="checkbox" class="minimal-green" />
                                            </label>
                                            <label>
                                                <input type="checkbox" class="minimal-green" disabled/>
                                            </label>
                                            <label class="mar-5">Minimal green skin checkbox</label>

                                        </div>
                                        <!-- radio -->
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="r2" class="minimal-red" checked/>
                                            </label>
                                            <label>
                                                <input type="radio" name="r2" class="minimal-red" />
                                            </label>
                                            <label>
                                                <input type="radio" name="r2" class="minimal-red" disabled/>
                                            </label>
                                            <label class="mar-5">Minimal red skin radio</label>

                                        </div>
                                    </div>
                                    <!-- radio -->
                                    <div class="form-group">
                                        <label>
                                            <input type="radio" name="r4" class="minimal-green" checked/>
                                        </label>
                                        <label>
                                            <input type="radio" name="r4" class="minimal-green" />
                                        </label>
                                        <label>
                                            <input type="radio" name="r4" class="minimal-green" disabled/>
                                        </label>
                                        <label class="mar-5">Minimal green skin radio</label>

                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-cloud"></i>
                                        Bootstrap Input MaxLength
                                    </h3>
                                </div>
                                <div class="panel-body">

                                    <!--max length starts-->
                                    <div class="form-group">
                                        <label for="default" class="control-label">Options</label>
                                        <input type="text" class="form-control" maxlength="25" name="moreoptions" id="moreoptions" />
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="control-label">All the options</label>
                                        <input type="text" class="form-control" maxlength="25" name="alloptions" id="alloptions" />
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="control-label">Text Area</label>
                                        <textarea id="textarea" class="form-control" maxlength="225" rows="2" placeholder="This textarea has a limit of 225 chars."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="control-label">Custom Position</label>
                                        <input type="text" class="form-control" maxlength="25" name="placement" id="placement" />
                                    </div>
                                    <!--min length ends--> </div>
                            </div>
                        </div>
                    </div>
                    </section>
                <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
        <!-- InputMask -->
    <script src="{{ asset('admin/assets/vendors/moment/js/moment.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/jquery_inputmask/inputmask/inputmask.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/jquery_inputmask/inputmask/inputmask.date.extensions.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/jquery_inputmask/inputmask/inputmask.extensions.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/jquery_inputmask/inputmask/jquery.inputmask.js') }}"  type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('admin/assets/vendors/daterangepicker/js/daterangepicker.js') }}"></script>
        <!-- bootstrap time picker -->
        <script src="{{ asset('admin/assets/vendors/select2/js/select2.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/bootstrap-fileinput/js/fileinput.js') }}"></script>
        <script src="{{ asset('admin/assets/vendors/clockpicker/js/bootstrap-clockpicker.js') }}"></script>
        <script src="{{ asset('admin/assets/js/custom_js/form_elements.js') }}"></script>
        @stop