@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Form Validations @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/custom_css/form2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/custom_css/form3.css') }}" rel="stylesheet" type="text/css"/>
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <!--section starts-->
                    <h1>Form Validations</h1>
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
                           Form Validations
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
                                        <i class="fa fa-fw fa-star-half-empty"></i>
                                        Basic Form Validation
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                     <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <form action="#" id="form-validation" class="form-horizontal">
                                        <!-- CSRF Token -->
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="val-username">
                                                Username
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" id="val-username" name="firstName" class="form-control" placeholder="Enter username"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" >
                                                Email
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" id="email" name="email" class="form-control" placeholder="Enter your valid email.."></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" >
                                                Password
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" >
                                                Confirm Password
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" placeholder="Confirm password"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">
                                                Message
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <textarea id="message" name="message" rows="7" class="form-control resize_vertical" placeholder="Enter your message"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" >
                                                Best Skill
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <select id="skill" name="skill" class="form-control">
                                                    <option value="">Please select</option>
                                                    <option value="html">HTML</option>
                                                    <option value="css">CSS</option>
                                                    <option value="javascript">Javascript</option>
                                                    <option value="php">PHP</option>
                                                    <option value="mysql">MySQL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">
                                                Website
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" id="url" name="url" class="form-control" placeholder="http://example.com"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">
                                                Phone Number<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" id="number" name="number" class="form-control" placeholder="Enter your phone number"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Gender <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <div class="radio mar-left5">
                                                    <label>
                                                        <input class="custom_radio" type="radio" name="gender" value="male" />
                                                        Male
                                                    </label>
                                                </div>
                                                <div class="radio mar-left5">


                                                    <label>
                                                        <input class="custom_radio" type="radio" name="gender" value="female" />
                                                        Female
                                                    </label>
                                                </div>
                                                <div class="radio mar-left5">
                                                    <label>
                                                        <input class="custom_radio" type="radio" name="gender" value="other" />
                                                        Other
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-3">
                                                <label class="padding7" for="terms" >
                                                    <input class="custom_icheck" type="checkbox" id="terms" name="terms">&nbsp;I agree with Terms &amp; Conditions</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-3">
                                                <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                                                <input type="reset" class="btn btn-effect-ripple btn-default reset_btn" value="Reset">
                                            </div>
                                        </div>
                                    </form>
                                    <div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title text-center">
                                                        <strong>Terms and Conditions</strong>
                                                    </h3>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="page-header">
                                                        1.
                                                        <strong>General</strong>
                                                    </h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                                                    </p>
                                                    <h4 class="page-header">
                                                        2.
                                                        <strong>Account</strong>
                                                    </h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                                                    </p>
                                                    <h4 class="page-header">
                                                        3.
                                                        <strong>Service</strong>
                                                    </h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                                                    </p>
                                                    <h4 class="page-header">
                                                        4.
                                                        <strong>Payments</strong>
                                                    </h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-effect-ripple btn-primary" data-dismiss="modal">I've read them!</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-star-half-empty"></i>
                                        Registration Validation
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                     <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <form action="#" method="post">
                                        <!-- CSRF Token -->
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class="form-group">
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                Validation will be completed on Tab or Enter key press.
                                            </div>
                                            <label >Validate Text</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" name="validate-text" id="validate-text" placeholder="Enter Validate Text" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Optional</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="validate-optional" id="validate-optional" placeholder="Optional">
                                                <span class="input-group-addon info">
                                                    <span class="glyphicon glyphicon-asterisk"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Validate Email</label>
                                            <div class="input-group" data-validate="email">
                                                <input type="text" class="form-control" name="validate-email" id="validate-email" placeholder="Enter Validate Email" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Validate Phone</label>
                                            <div class="input-group" data-validate="phone">
                                                <input type="text" class="form-control" name="validate-phone" id="validate-phone" placeholder="(814) 555-1234" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Minimum length 5 characters</label>
                                            <div class="input-group" data-validate="length" data-length="5">
                                                <textarea class="form-control resize_vertical" name="validate-length" id="validate-length" placeholder="Minimum length 5 characters" required></textarea>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Validate Select</label>
                                            <div class="input-group">
                                                <select class="form-control" name="validate-select" id="validate-select" required>
                                                    <option value="">Select an item</option>
                                                    <option value="item_1">Item 1</option>
                                                    <option value="item_2">Item 2</option>
                                                    <option value="item_3">Item 3</option>
                                                </select>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Validate Number</label>
                                            <div class="input-group" data-validate="number">
                                                <input type="text" class="form-control" name="validate-number" id="validate-number" placeholder="Validate Number" required>
                                                <span class="input-group-addon danger">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-key"></i>
                                        Password Validation
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                     <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <form action="#" method="post" id="passwordForm">
                                        <!-- CSRF Token -->
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <input type="password" class="input-md form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off">
                                        <div class="row">
                                            <div class="col-sm-6 padding">
                                                <span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span>
                                                8 Characters Long
                                                <br>
                                                <span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span>
                                                One Uppercase Letter
                                            </div>
                                            <div class="col-sm-6 padding">
                                                <span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span>
                                                One Lowercase Letter
                                                <br>
                                                <span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span>
                                                One Number
                                            </div>
                                        </div>
                                        <input type="password" class="input-md form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off">
                                        <div class="row">
                                            <div class="col-sm-12 padding">
                                                <span id="pwmatch" class="glyphicon glyphicon-ok" style="color:#00a41e;"></span>
                                                Passwords Match
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <a href="#" class="col-xs-12 btn btn-primary btn-load btn-md" data-loading-text="Changing Password...">Change Password</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-rocket"></i>
                                        Form Modal
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                     <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="row modal_padding">
                                        <button type="button" class="btn btn-primary btn-lg center-block" data-toggle="modal" data-target="#myModal">
                                            Click to open form in modal
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close reset_data" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title" id="myModalLabel">Form Modal</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="#" role="form" id="form-validation1" method="get">
                                                            <!-- CSRF Token -->
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="first_name" id="first_name" class="form-control input-md" placeholder="First Name" tabindex="1"></div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="last_name" id="last_name" class="form-control input-md" placeholder="Last Name" tabindex="2"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="text" name="display_name" id="display_name" class="form-control input-md" placeholder="Display Name" tabindex="3"></div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="email" name="email"  class="form-control input-md" placeholder="Email Address" tabindex="4"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="password" name="password"  class="form-control input-md" placeholder="Password" tabindex="5"></div>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-6 col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="password" name="confirmpassword" class="form-control input-md" placeholder="Confirm Password" tabindex="6"></div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                    <label class="padding7" for="terms1" >
                                                                        <input class="custom_icheck" type="checkbox" id="terms1" name="terms">&nbsp;I agree with Terms &amp; Conditions</label>
                                                                    </div>
                                                                    </div>
                                                                <div class="col-md-12">
                                                                    <p class="margin-top">
                                                                        By clicking
                                                                        <strong class="label label-primary">Register</strong>
                                                                        , you agree to the
                                                                        <a href="#">Terms and Conditions</a>
                                                                        set out by this site, including our Cookie Use.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row marginTop">
                                                                <div class="col-xs-6 col-md-6">
                                                                    <input type="submit" value="Register" class="btn btn-primary btn-block btn-md btn-responsive" tabindex="7"></div>
                                                                <div class="col-xs-6 col-md-6">
                                                                    <button href="#" type="reset" class="btn btn-success btn-block btn-md btn-responsive btn_clear">Reset</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                </div>
                            </div>
                            <!--image upload -->
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-pencil"></i>
                                        Form Validations
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                     <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <form action="#"  name="frmOnline" onsubmit="return Validation()" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="txtName" id="txtName" class="form-control input-md" placeholder="First Name"></div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="last_name" id="txtlastname" class="form-control input-md" placeholder="Last Name"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="txtEmail" id="txtEmail" class="form-control input-md" placeholder="Choose Your Email Id"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="display_name" id="txtAddress1" class="form-control input-md" placeholder="Address Line1"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="display_name" id="txtAddress2" class="form-control input-md" placeholder="Address Line2"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <select id="e1" class="form-control select2">
                                                    <option value="">Select Your Country</option>
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="display_name" id="txtPhone" class="form-control input-md" placeholder="Your Phone Number"></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-xs-6 col-md-6 ">
                                                <input type="submit" name="btnSubmit" id="btnSubmit" value="Register" class="btn btn-primary btn-block btn-md btn-responsive"></div>

                                            <div class="col-xs-6 col-md-6">
                                                <input type="reset" value="Reset" class="btn btn-success btn-block btn-md btn-responsive"></div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--row -->
                    <!--row ends-->
                    </section>
                <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/js/custom_js/form1.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('admin/assets/js/custom_js/form2.js') }}" type="text/javascript" ></script>
    {{--<script src="{{ asset('admin/assets/js/custom_js/form3.js') }}" type="text/javascript" ></script>--}}
    <script src="{{ asset('admin/assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom_js/form_validations.js') }}" type="text/javascript" ></script>
@stop