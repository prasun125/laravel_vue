@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Pickers @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/clockpicker/css/bootstrap-clockpicker.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/vendors/bootstrap-switch/css/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/custom_css/pickers.css') }}" rel="stylesheet" type="text/css" />

    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <!--section starts-->
                    <h1>Pickers</h1>
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
                            Pickers
                        </li>
                    </ol>
                </section>
                <!--section ends-->
                <section class="content">
                    <!--main content-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-bomb"></i>
                                        Clock Face Picker
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="t1" class="control-label">Default clock</label>
                                        <input id="t1" class="form-control input-small" value="2:30 PM" data-format="hh:mm A" type="text"></div>
                                    <div class="form-group">
                                        <label for="t2" class="control-label">Button</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control input-small" id="t2" value="14:30" readonly>
                                            <span class="input-group-btn">
                                                <button class="btn" type="button" id="toggle-btn">
                                                    <i class="fa fa-fw fa-clock-o"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="t2" class="control-label">Clock picker</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="input-a" value="" data-default="20:48">
                                            <span class="input-group-btn">
                                            <button class="btn btn-info" type="button" id="button-a">Pick your time</button>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--date picker-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-clock-o"></i>
                                        Date Picker
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Default:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-laptop"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datetime1"/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label>Custom Format:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-laptop"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datetime2"/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label>Custom View:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-laptop"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datetime3"/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label>Min View:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-laptop"></i>
                                            </div>
                                            <input type="text" class="form-control" id="datetime4"/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <label>Inline View:</label>
                                    <div id="datetime5"></div>
                                    <!-- /.input group -->
                                </div>
                            </div>



                            <!--Switch-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-clock-o"></i>
                                        Bootstrap Switch
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <!--switch -->
                                    <div class="form-group">
                                        <label>Default Sizes</label>
                                        <div class="form-group">
                                            <input class="btn_marTop" type="checkbox" name="my-checkbox" data-size="mini" checked>
                                            <input class="btn_marTop" type="checkbox" name="my-checkbox" data-size="small" checked>
                                            <input class="btn_marTop" type="checkbox" name="my-checkbox" data-size="normal" checked>
                                            <input class="btn_marTop" type="checkbox" name="my-checkbox" data-size="large"></div>
                                    </div>
                                    <!-- /.form group -->
                                    <!--switch -->
                                    <div class="form-group">
                                        <label>Color Switch</label>
                                        <div class="form-group">
                                            <input class="btn_marTop" type="checkbox" name="my-checkbox" checked data-on-color="primary" data-off-color="info">
                                            <input class="btn_marTop" type="checkbox" name="my-checkbox" checked data-on-color="success" data-off-color="warning">
                                            <input class="btn_marTop" type="checkbox" name="my-checkbox" checked data-on-color="warning" data-off-color="danger"></div>
                                    </div>
                                    <!-- /.form group -->
                                    <!--switch -->
                                    <div class="form-group">
                                        <label>Animate</label>
                                        <div class="form-group">
                                            <input class="btn_marTop" type="checkbox" name="my-checkbox" data-on-color="info" data-off-color="primary" data-animate>
                                            <input class="btn_marTop" type="checkbox" name="my-checkbox" checked data-on-color="danger" data-off-color="warning" data-animate>
                                            <input class="btn_marTop" type="checkbox" name="my-checkbox" checked data-on-color="warning" data-off-color="success" data-animate></div>
                                    </div>
                                    <!-- /.form group -->
                                    <!--switch -->
                                    <div class="form-group">
                                        <label>Disabled / Readonly</label>
                                        <div class="form-group">
                                            <input class="btn_marTop" type="checkbox" checked disabled name="my-checkbox" />
                                            <input class="btn_marTop" type="checkbox" disabled name="my-checkbox" />
                                        </div>
                                    </div>
                                    <!-- /.form group --> </div>
                            </div>

                        </div>
                        <!--col-md-6 ends-->
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-paint-brush"></i>
                                        Color Picker
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body">
                                        <!-- Color Picker -->
                                        <div class="form-group">
                                            <label>Default</label>
                                            <input type="text" class="form-control my-colorpicker1" value="#8fff00" id="cp1"></div>
                                        <!-- /.form group -->
                                        <!-- Color Picker -->
                                        <div class="form-group">
                                            <label>Color picker with RGB notation</label>
                                            <input type="text" class="form-control my-colorpicker2" value="rgb(0,194,255,0.78)" id="cp2" data-color-format="rgba"></div>
                                        <!-- /.form group --> </div>
                                    <!-- /.box-body --> </div>
                            </div>



                            <!--multi select-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-fighter-jet"></i>
                                        Multiselect
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Normal Select</label>
                                        <div class="input-group  col-md-8">
                                            <select class="multiselect" multiple="multiple">
                                                <option value="cheese">Cheese</option>
                                                <option value="tomatoes">Tomatoes</option>
                                                <option value="mozarella">Mozzarella</option>
                                                <option value="mushrooms">Mushrooms</option>
                                                <option value="pepperoni">Pepperoni</option>
                                                <option value="onions">Onions</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Preselected</label>
                                        <div class="input-group  col-md-8">
                                            <select id="example2" multiple="multiple">
                                                <option value="cheese" selected>Cheese</option>
                                                <option value="tomatoes" selected>Tomatoes</option>
                                                <option value="mozarella" selected>Mozzarella</option>
                                                <option value="mushrooms">Mushrooms</option>
                                                <option value="pepperoni">Pepperoni</option>
                                                <option value="onions">Onions</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Select All</label>
                                        <div class="input-group  col-md-8">
                                            <select id="example27" multiple="multiple">
                                                <option value="cheese">Cheese</option>
                                                <option value="tomatoes">Tomatoes</option>
                                                <option value="mozarella">Mozzarella</option>
                                                <option value="mushrooms">Mushrooms</option>
                                                <option value="pepperoni">Pepperoni</option>
                                                <option value="onions">Onions</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Select All</label>
                                        <div class="input-group  col-md-8">
                                            <div class="btn-group">
                                                <select id="example28" multiple="multiple"></select>
                                                <button id="example28-values" class="btn btn-primary  mar-top">Choose</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Link Select</label>
                                        <div class="input-group  col-md-8">
                                            <div class="btn-group">
                                                <select id="example3" multiple="multiple">
                                                    <option value="cheese">Cheese</option>
                                                    <option value="tomatoes">Tomatoes</option>
                                                    <option value="mozarella">Mozzarella</option>
                                                    <option value="mushrooms">Mushrooms</option>
                                                    <option value="pepperoni">Pepperoni</option>
                                                    <option value="onions">Onions</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Add-ons</label>
                                        <div class="input-group  col-md-8 btn_padding">
                                            <div class="input-group btn-group">
                                                <span class="input-group-addon btn_padding1"> <b class="glyphicon glyphicon-list-alt"></b>
                                                </span>
                                                <select id="example6" multiple="multiple" class="btn_padding">
                                                    <option value="cheese">Cheese</option>
                                                    <option value="tomatoes">Tomatoes</option>
                                                    <option value="mozarella">Mozzarella</option>
                                                    <option value="mushrooms">Mushrooms</option>
                                                    <option value="pepperoni">Pepperoni</option>
                                                    <option value="onions">Onions</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>OnChange</label>
                                        <div class="input-group  col-md-8">
                                            <div class="btn-group">
                                                <select id="example9" multiple="multiple">
                                                    <option value="cheese">Cheese</option>
                                                    <option value="tomatoes">Tomatoes</option>
                                                    <option value="mozarella">Mozzarella</option>
                                                    <option value="mushrooms">Mushrooms</option>
                                                    <option value="pepperoni">Pepperoni</option>
                                                    <option value="onions">Onions</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form group -->

                                    <!-- /.form group -->
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Group Label</label>
                                        <div class="input-group  col-md-8">
                                            <div class="btn-group">
                                                <select id="example19" multiple="multiple">
                                                    <optgroup label="Mathematics">
                                                        <option value="analysis">Analysis</option>
                                                        <option value="algebra">Linear Algebra</option>
                                                        <option value="discrete">Discrete Mathematics</option>
                                                        <option value="numerical">Numerical Analysis</option>
                                                        <option value="probability">Probability Theory</option>
                                                    </optgroup>
                                                    <optgroup label="Computer Science">
                                                        <option value="programming">Introduction to Programming</option>
                                                        <option value="automata">Automata Theory</option>
                                                        <option value="complexity">Complexity Theory</option>
                                                        <option value="software">Software Engineering</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Disable</label>
                                        <div class="input-group  col-md-8">
                                            <div class="btn-group">
                                                <select id="example13" multiple="multiple">
                                                    <option value="enabled1">Enabled 1</option>
                                                    <option value="enabled2">Enabled 2</option>
                                                    <option value="disabled2" disabled="disabled">Disabled 1</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label>Multiselect</label>
                                        <div class="input-group  col-md-8">
                                            <div class="btn-group btn_block1">
                                                <select id="example35" multiple="multiple">
                                                    <option value="cheese">Cheese</option>
                                                    <option value="tomatoes">Tomatoes</option>
                                                    <option value="mozarella">Mozzarella</option>
                                                    <option value="mushrooms">Mushrooms</option>
                                                    <option value="pepperoni">Pepperoni</option>
                                                    <option value="onions">Onions</option>
                                                </select>
                                                <button id="example35-enable" class="btn btn-default btn_block" style="margin-top: 3px;">Enable</button>
                                                <button id="example35-disable" class="btn btn-default btn_block" style="margin-top: 3px;">Disable</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.form group --> </div>
                            </div>
                            <!--Bootstrap Touchspin-->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-clock-o"></i>
                                        Bootstrap TouchSpin
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="box-body">
                                        <!-- Touch spin -->
                                        <div class="form-group">
                                            <label>Postfix</label>
                                            <input id="demo1" type="text" value="55" name="demo1" class="form-control"></div>
                                        <!-- /.form group -->
                                        <!-- Touch spin -->
                                        <div class="form-group">
                                            <label>Prefix</label>
                                            <div class="form-group">
                                                <input id="demo2" type="text" value="0" name="demo2" class="form-control"></div>
                                        </div>
                                        <!-- /.form group -->
                                        <!-- Touch spin -->
                                        <div class="form-group">
                                            <label>Vertical button alignment</label>
                                            <div class="form-group">
                                                <input id="demo_vertical" type="text" value="" name="demo_vertical"></div>
                                        </div>
                                        <!-- /.form group -->
                                        <!-- Touch spin -->
                                        <div class="form-group">
                                            <label>Vertical buttons with custom icons</label>
                                            <div class="form-group">
                                                <input id="demo_vertical2" type="text" value="" name="demo_vertical2"></div>
                                        </div>
                                        <!-- /.form group -->
                                        <!-- Touch spin -->
                                        <div class="form-group">
                                            <label>Init with empty value</label>
                                            <div class="form-group">
                                                <input id="demo3" type="text" value="" name="demo3"></div>
                                        </div>
                                        <!-- /.form group -->
                                        <!-- Touch spin -->
                                        <div class="form-group">
                                            <label>Value attribute is not set (applying settings.initval)</label>
                                            <div class="form-group">
                                                <input id="demo3_21" type="text" value="" name="demo3_21"></div>
                                        </div>
                                        <!-- /.form group -->

                                        <!-- Touch spin -->
                                        <div class="form-group">
                                            <label>Button postfix (small)</label>
                                            <div class="form-group">
                                                <input id="demo4" type="text" value="" name="demo4" class="input-sm"></div>
                                        </div>
                                        <!-- /.form group -->

                                        <!-- Touch spin -->
                                        <div class="form-group">
                                            <label>Button postfix (large)</label>
                                            <div class="form-group">
                                                <input id="demo4_2" type="text" value="" name="demo4_2" class="form-control input-lg"></div>
                                        </div>
                                        <!-- /.form group -->

                                        <!-- Touch spin -->
                                        <div class="form-group">
                                            <label>Button group</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input id="demo5" type="text" class="form-control" name="demo5" value="50"></div>
                                            </div>
                                        </div>
                                        <!-- /.form group -->
                                        <!-- Touch spin -->

                                        <!-- /.form group --> </div>
                                    <!-- /.box-body --> </div>
                            </div>
                            <!--time picker ends-->
                        </div>
                        <!--col-md-6 ends--> </div>
                    </section>
                <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/colorpicker/js/bootstrap-colorpicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/clockpicker/js/bootstrap-clockpicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}" type="text/javascript" ></script>
        <script src="{{ asset('admin/assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/assets/js/custom_js/pickers.js') }}" type="text/javascript" ></script>

        @stop