@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Form Layouts @parent

@stop
@section('header_styles')
<link href="{{ asset('admin/assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/assets/css/custom_css/custom_form_layout.css') }}" rel="stylesheet" type="text/css"/>
@stop
{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>
            Form Layouts
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
            <li> Form Layouts</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav  nav-tabs ">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">
                            Form Actions
                        </a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">2 Columns</a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab">
                            Form Striped
                        </a>
                    </li>
                    <li>
                        <a href="#tab4" data-toggle="tab">
                            Example Forms
                        </a>
                    </li>
                </ul>
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="fa fa-fw fa-file-text-o"></i>
                                            Add User
                                        </h3>
                                                <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <form action="{{ URL::to('admin/user/add') }}" method="POST" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">
                                                <div class="form-group pad-top40">
                                                    <label for="first_name" class="col-md-3 control-label">
                                                        Minimum Distance
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text" required autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-md-3 control-label">
                                                        Maximum Distance
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-md-3 control-label">
                                                        Minimum Hours
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-md-3 control-label">
                                                        Maximum Hours
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-md-3 control-label">
                                                        Cost
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions" id="mrg_left9">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    &nbsp;
                                                    {{--<button type="button" class="btn btn-danger">Cancel</button>
                                                    &nbsp;
                                                    <input type="reset" class="btn btn-default hidden-xs" value="Reset">--}}</div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-file-text-o"></i>
                                        Twitter Bootstrap Form Validation States
                                    </h3>
                                    <span class="pull-right">
                                                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                            <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                        </span>
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal">
                                        <div class="form-group has-success">
                                            <label class="col-xs-3 control-label hidden-xs" for="inputSuccess">Username</label>
                                            <label class="col-xs-3 visible-xs control-label" for="inputSuccess">Uname</label>
                                            <div class="col-xs-9">
                                                <input type="text" id="inputSuccess" class="form-control" placeholder="Input with success">
                                                <span class="help-block">
                                                                        Username is available
                                                                    </span>
                                            </div>
                                        </div>
                                        <div class="form-group has-warning">
                                            <label class="col-xs-3 control-label hidden-xs" for="inputWarning">Password</label>
                                            <label class="col-xs-3 control-label visible-xs" for="inputWarning">Pwd</label>
                                            <div class="col-xs-9">
                                                <input type="password" id="inputWarning" class="form-control" placeholder="Input with warning">
                        
                                                <span class="help-block">
                                                                        Password strength: Weak
                                                                    </span>
                                            </div>
                                        </div>
                                        <div class="form-group has-error">
                                            <label class="col-xs-3 control-label" for="inputError">Email</label>
                                            <div class="col-xs-9">
                                                <input type="email" id="inputError" class="form-control" placeholder="Input with error">
                                                <span class="help-block">
                                                                        Please enter a valid email address
                                                                    </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-offset-3 col-xs-9">
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--min length ends--> </div>
                            </div>--}}
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane fade">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="fa fa-fw fa-file-text-o"></i>
                                            Personal Details Horizontal
                                        </h3>
                                                <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <form action="#" method="get" class="form-horizontal form_action1">

                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="firstName">
                                                            First Name:
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="firstName" placeholder="First Name"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="inputEmail">Email:</label>
                                                        <div class="col-md-9">
                                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="inputPassword">Password:</label>
                                                        <div class="col-md-9">
                                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">
                                                            Date of Birth:
                                                        </label>
                                                        <div class="col-md-3">
                                                            <select class="form-control select_margin">
                                                                <option>Date</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                <option>10</option>
                                                                <option>11</option>
                                                                <option>12</option>
                                                                <option>13</option>
                                                                <option>14</option>
                                                                <option>15</option>
                                                                <option>16</option>
                                                                <option>17</option>
                                                                <option>18</option>
                                                                <option>19</option>
                                                                <option>20</option>
                                                                <option>21</option>
                                                                <option>22</option>
                                                                <option>23</option>
                                                                <option>24</option>
                                                                <option>25</option>
                                                                <option>26</option>
                                                                <option>27</option>
                                                                <option>28</option>
                                                                <option>29</option>
                                                                <option>30</option>
                                                                <option>31</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control select_margin">
                                                                <option>Month</option>
                                                                <option>Jan</option>
                                                                <option>Feb</option>
                                                                <option>Mar</option>
                                                                <option>Apr</option>
                                                                <option>May</option>
                                                                <option>June</option>
                                                                <option>July</option>
                                                                <option>Aug</option>
                                                                <option>Sep</option>
                                                                <option>Oct</option>
                                                                <option>Nov</option>
                                                                <option>Dec</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control select_margin">
                                                                <option>Year</option>
                                                                <option>2017</option>
                                                                <option>2016</option>
                                                                <option>2015</option>
                                                                <option>2014</option>
                                                                <option>2013</option>
                                                                <option>2012</option>
                                                                <option>2011</option>
                                                                <option>2010</option>
                                                                <option>2009</option>
                                                                <option>2008</option>
                                                                <option>2007</option>
                                                                <option>2006</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="ZipCode">Zip Code:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="ZipCode" placeholder="Zip Code"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="ZipCode">City:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="city" placeholder="City"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <label class="checkbox-inline mar-left5">
                                                                <input class="custom_icheck" type="checkbox" value="news">
                                                                Send me latest news and updates.
                                                            </label>
                                                        </div>
                                                    </div>
                                            </div>

                                            <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="lastName">Last Name:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="lastName" placeholder="Last Name"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="phoneNumber">Phone:</label>
                                                        <div class="col-md-9">
                                                            <input type="tel" class="form-control" id="phoneNumber" placeholder="Phone Number"></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="confirmPassword">
                                                            Confirm Password:
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3" for="postalAddress">Address:</label>
                                                        <div class="col-md-9">
                                                            <textarea rows="3" class="form-control resize_vertical" id="postalAddress" placeholder="Postal Address"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Gender:</label>
                                                        <div class="col-md-3">
                                                            <label class="radio-inline">
                                                                <input class="custom_radio" type="radio" name="genderRadios" value="male"> Male</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="radio-inline">
                                                                <input class="custom_radio" type="radio" name="genderRadios" value="female"> Female</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <label class="checkbox-inline mar-left5">
                                                                <input class="custom_icheck" type="checkbox" value="agree">
                                                                I agree to the
                                                                <a href="#">
                                                                    Terms and Conditions
                                                                </a>
                                                                .
                                                            </label>
                                                        </div>
                                                    </div>


                                            </div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="submit" class="btn btn-primary " value="Submit">
                                                    <input type="reset" class="btn btn-default reset_btn1" value="Reset"></div>
                                            </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="tab3" class="tab-pane fade">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="fa fa-fw fa-crosshairs"></i>
                                            Form  Bordered Striped
                                        </h3>
                                                <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                     <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span>
                                    </div>
                                    <div class="panel-body border">
                                        <form class="form-horizontal form-bordered">
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Static</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        Static text
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-text-input">Text</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
                                                            <span class="help-block">
                                                                This is a help text
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label" for="example-email">Email</label>
                                                <div class="col-md-6">
                                                    <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-password">Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" id="example-password" name="example-password" class="form-control" placeholder="Password"></div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label" for="example-disabled">Disabled</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-disabled" name="example-disabled" class="form-control" placeholder="Disabled" disabled></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-textarea-input">Textarea</label>
                                                <div class="col-md-6">
                                                    <textarea id="example-textarea-input" name="example-textarea-input" rows="7" class="form-control resize_vertical" placeholder="Description.."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label" for="example-select">Select</label>
                                                <div class="col-md-6">
                                                    <select id="example-select" name="example-select" class="form-control" size="1">
                                                        <option value="0">
                                                            Please select
                                                        </option>
                                                        <option value="1">Bootstrap</option>
                                                        <option value="2">CSS</option>
                                                        <option value="3">Javascript</option>
                                                        <option value="4">HTML</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-multiple-select">Multiple</label>
                                                <div class="col-md-6">
                                                    <select id="example-multiple-select" name="example-multiple-select" class="form-control" size="5" multiple>
                                                        <option value="1">Option #1</option>
                                                        <option value="2">Option #2</option>
                                                        <option value="3">Option #3</option>
                                                        <option value="4">Option #4</option>
                                                        <option value="5">Option #5</option>
                                                        <option value="6">Option #6</option>
                                                        <option value="7">Option #7</option>
                                                        <option value="8">Option #8</option>
                                                        <option value="9">Option #9</option>
                                                        <option value="10">Option #10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Radios</label>
                                                <div class="col-md-9">
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio1">
                                                            <input class="custom_radio" type="radio" id="example-radio1" name="example-radios" value="option1"> &nbsp;HTML </label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio2">
                                                            <input class="custom_radio" type="radio" id="example-radio2" name="example-radios" value="option2"> &nbsp;CSS</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio3">
                                                            <input class="custom_radio" type="radio" id="example-radio3" name="example-radios" value="option3"> &nbsp;Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    Inline Radios
                                                </label>
                                                <div class="col-md-9">
                                                    <label class="radio-inline radio_margin " for="example-inline-radio1">
                                                        <input class="custom_radio" type="radio" id="example-inline-radio1" name="example-inline-radios" value="option1"> &nbsp;HTML</label>
                                                    <label class="radio-inline radio_margin" for="example-inline-radio2">
                                                        <input class="custom_radio" type="radio" id="example-inline-radio2" name="example-inline-radios" value="option2"> &nbsp;CSS</label>
                                                    <label class="radio-inline radio_margin" for="example-inline-radio3">
                                                        <input class="custom_radio" type="radio" id="example-inline-radio3" name="example-inline-radios" value="option3"> &nbsp;Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Checkboxes</label>
                                                <div class="col-md-9">
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox1">
                                                            <input class="custom_icheck" type="checkbox" id="example-checkbox1" name="example-checkbox1" value="option1"> &nbsp;HTML</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox2">
                                                            <input class="custom_icheck" type="checkbox" id="example-checkbox2" name="example-checkbox2" value="option2"> &nbsp;CSS</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox3">
                                                            <input class="custom_icheck" type="checkbox" id="example-checkbox3" name="example-checkbox3" value="option3"> &nbsp;Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    Inline Checkboxes
                                                </label>
                                                <div class="col-md-9">
                                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                                        <input class="custom_icheck" type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"> &nbsp;HTML</label>
                                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox2">
                                                        <input class="custom_icheck" type="checkbox" id="example-inline-checkbox2" name="example-inline-checkbox2" value="option2"> &nbsp;CSS</label>
                                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox3">
                                                        <input class="custom_icheck" type="checkbox" id="example-inline-checkbox3" name="example-inline-checkbox3" value="option3"> &nbsp;Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col ">
                                                <label class="col-md-3 control-label" for="example-file-input">File</label>
                                                <div class="col-md-9 pad-top20 ">
                                                    <input type="file" id="example-file-input" name="example-file-input"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-file-multiple-input">
                                                    Multiple File
                                                </label>
                                                <div class="col-md-9 pad-top20">
                                                    <input type="file" id="example-file-multiple-input" name="example-file-multiple-input" multiple></div>
                                            </div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-effect-ripple btn-default reset_btn2">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="fa fa-fw fa-crosshairs"></i>
                                            Form Seperated Row Striped
                                        </h3>
                                                <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span>
                                    </div>
                                    <div class="panel-body border">
                                        <form   class="form-horizontal form-bordered-row">
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Static</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        Static text
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-text-input">Text</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
                                                            <span class="help-block">
                                                                This is a help text
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label" for="example-email">Email</label>
                                                <div class="col-md-6">
                                                    <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-password">Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" id="example-password" name="example-password" class="form-control" placeholder="Password"></div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label" for="example-disabled">Disabled</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-disabled" name="example-disabled" class="form-control" placeholder="Disabled" disabled></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-textarea-input">Textarea</label>
                                                <div class="col-md-6">
                                                    <textarea id="example-textarea-input" name="example-textarea-input" rows="7" class="form-control resize_vertical" placeholder="Description.."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label" for="example-select">Select</label>
                                                <div class="col-md-6">
                                                    <select id="example-select" name="example-select" class="form-control" size="1">
                                                        <option value="0">
                                                            Please select
                                                        </option>
                                                        <option value="1">Bootstrap</option>
                                                        <option value="2">CSS</option>
                                                        <option value="3">Javascript</option>
                                                        <option value="4">HTML</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-multiple-select">Multiple</label>
                                                <div class="col-md-6">
                                                    <select id="example-multiple-select" name="example-multiple-select" class="form-control" size="5" multiple>
                                                        <option value="1">Option #1</option>
                                                        <option value="2">Option #2</option>
                                                        <option value="3">Option #3</option>
                                                        <option value="4">Option #4</option>
                                                        <option value="5">Option #5</option>
                                                        <option value="6">Option #6</option>
                                                        <option value="7">Option #7</option>
                                                        <option value="8">Option #8</option>
                                                        <option value="9">Option #9</option>
                                                        <option value="10">Option #10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Radios</label>
                                                <div class="col-md-9">
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio1">
                                                            <input class="custom_radio" type="radio" id="example-radio1" name="example-radios" value="option1"> &nbsp;HTML</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio2">
                                                            <input class="custom_radio" type="radio" id="example-radio2" name="example-radios" value="option2"> &nbsp;CSS</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio3">
                                                            <input class="custom_radio" type="radio" id="example-radio3" name="example-radios" value="option3"> &nbsp;Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    Inline Radios
                                                </label>
                                                <div class="col-md-9">
                                                    <label class="radio-inline radio_margin" for="example-inline-radio1">
                                                        <input class="custom_radio " type="radio" id="example-inline-radio1" name="example-inline-radios" value="option1"> &nbsp;HTML</label>
                                                    <label class="radio-inline radio_margin" for="example-inline-radio2">
                                                        <input class="custom_radio" type="radio" id="example-inline-radio2" name="example-inline-radios" value="option2"> &nbsp;CSS</label>
                                                    <label class="radio-inline radio_margin" for="example-inline-radio3">
                                                        <input class="custom_radio" type="radio" id="example-inline-radio3" name="example-inline-radios" value="option3"> &nbsp;Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Checkboxes</label>
                                                <div class="col-md-9">
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox1">
                                                            <input class="custom_icheck" type="checkbox" id="example-checkbox1" name="example-checkbox1" value="option1"> &nbsp;HTML</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox2">
                                                            <input class="custom_icheck" type="checkbox" id="example-checkbox2" name="example-checkbox2" value="option2"> &nbsp;CSS</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox3">
                                                            <input class="custom_icheck" type="checkbox" id="example-checkbox3" name="example-checkbox3" value="option3"> &nbsp;Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    Inline Checkboxes
                                                </label>
                                                <div class="col-md-9">
                                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                                        <input class="custom_icheck" type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"> &nbsp;HTML</label>
                                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox2">
                                                        <input class="custom_icheck" type="checkbox" id="example-inline-checkbox2" name="example-inline-checkbox2" value="option2"> &nbsp;CSS</label>
                                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox3">
                                                        <input class="custom_icheck" type="checkbox" id="example-inline-checkbox3" name="example-inline-checkbox3" value="option3"> &nbsp;Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col ">
                                                <label class="col-md-3 control-label" for="example-file-input">File</label>
                                                <div class="col-md-9 pad-top20">
                                                    <input type="file" id="example-file-input" name="example-file-input"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-file-multiple-input">
                                                    Multiple File
                                                </label>
                                                <div class="col-md-9 pad-top20">
                                                    <input type="file" id="example-file-multiple-input" name="example-file-multiple-input" multiple></div>
                                            </div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-effect-ripple btn-default reset_btn3">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="fa fa-fw fa-crosshairs"></i>
                                            Form  Bordered
                                        </h3>
                                                <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span>
                                    </div>
                                    <div class="panel-body border">
                                        <form class="form-horizontal form-bordered">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Static</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                        Static text
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-text-input">Text</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
                                                            <span class="help-block">
                                                                This is a help text
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-email">Email</label>
                                                <div class="col-md-6">
                                                    <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-password">Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" id="example-password" name="example-password" class="form-control" placeholder="Password"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-disabled">Disabled</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-disabled" name="example-disabled" class="form-control" placeholder="Disabled" disabled></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-textarea-input">Textarea</label>
                                                <div class="col-md-6">
                                                    <textarea id="example-textarea-input" name="example-textarea-input" rows="7" class="form-control resize_vertical" placeholder="Description.."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-select">Select</label>
                                                <div class="col-md-6">
                                                    <select id="example-select" name="example-select" class="form-control" size="1">
                                                        <option value="0">
                                                            Please select
                                                        </option>
                                                        <option value="1">Bootstrap</option>
                                                        <option value="2">CSS</option>
                                                        <option value="3">Javascript</option>
                                                        <option value="4">HTML</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-multiple-select">Multiple</label>
                                                <div class="col-md-6">
                                                    <select id="example-multiple-select" name="example-multiple-select" class="form-control" size="5" multiple>
                                                        <option value="1">Option #1</option>
                                                        <option value="2">Option #2</option>
                                                        <option value="3">Option #3</option>
                                                        <option value="4">Option #4</option>
                                                        <option value="5">Option #5</option>
                                                        <option value="6">Option #6</option>
                                                        <option value="7">Option #7</option>
                                                        <option value="8">Option #8</option>
                                                        <option value="9">Option #9</option>
                                                        <option value="10">Option #10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Radios</label>
                                                <div class="col-md-9">
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio1">
                                                            <input class="custom_radio" type="radio" id="example-radio1" name="example-radios" value="option1"> &nbsp;HTML</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio2">
                                                            <input class="custom_radio" type="radio" id="example-radio2" name="example-radios" value="option2"> &nbsp;CSS</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio3">
                                                            <input class="custom_radio" type="radio" id="example-radio3" name="example-radios" value="option3"> &nbsp;Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    Inline Radios
                                                </label>
                                                <div class="col-md-9">
                                                    <label class="radio-inline radio_margin " for="example-inline-radio1">
                                                        <input class="custom_radio" type="radio" id="example-inline-radio1" name="example-inline-radios" value="option1"> &nbsp;HTML</label>
                                                    <label class="radio-inline radio_margin" for="example-inline-radio2">
                                                        <input class="custom_radio" type="radio" id="example-inline-radio2" name="example-inline-radios" value="option2"> &nbsp;CSS</label>
                                                    <label class="radio-inline radio_margin" for="example-inline-radio3">
                                                        <input class="custom_radio" type="radio" id="example-inline-radio3" name="example-inline-radios" value="option3"> &nbsp;Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Checkboxes</label>
                                                <div class="col-md-9">
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox1">
                                                            <input class="custom_icheck" type="checkbox" id="example-checkbox1" name="example-checkbox1" value="option1"> &nbsp;HTML</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox2">
                                                            <input class="custom_icheck" type="checkbox" id="example-checkbox2" name="example-checkbox2" value="option2"> &nbsp;CSS</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox3">
                                                            <input class="custom_icheck" type="checkbox" id="example-checkbox3" name="example-checkbox3" value="option3"> &nbsp;Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">
                                                    Inline Checkboxes
                                                </label>
                                                <div class="col-md-9">
                                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox1">
                                                        <input class="custom_icheck" type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"> &nbsp;HTML</label>
                                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox2">
                                                        <input class="custom_icheck" type="checkbox" id="example-inline-checkbox2" name="example-inline-checkbox2" value="option2"> &nbsp;CSS</label>
                                                    <label class="checkbox-inline mar-left5" for="example-inline-checkbox3">
                                                        <input class="custom_icheck" type="checkbox" id="example-inline-checkbox3" name="example-inline-checkbox3" value="option3"> &nbsp;Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-file-input">File</label>
                                                <div class="col-md-9 pad-top20">
                                                    <input type="file" id="example-file-input" name="example-file-input"></div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-file-multiple-input">
                                                    Multiple File
                                                </label>
                                                <div class="col-md-9 pad-top20">
                                                    <input type="file" id="example-file-multiple-input" name="example-file-multiple-input" multiple></div>
                                            </div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-effect-ripple btn-default reset_btn4">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab4" class="tab-pane fade">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="fa fa-fw fa-heart-o"></i>
                                                    Vertical Form Layout
                                                </h3>
                                                        <span class="pull-right">
                                                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                            <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                        </span>
                                            </div>
                                            <div class="panel-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="inputEmail">Email</label>
                                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email"></div>
                                                    <div class="form-group">
                                                        <label for="inputPassword">Password</label>
                                                        <input type="password" class="form-control" id="inputPassword" placeholder="Password"></div>
                                                    <div class="checkbox mar-left5">
                                                        <label style="margin-left: -17px;">
                                                            <input class="custom_icheck" type="checkbox" style="padding: 0 7px 0 0;">
                                                            &nbsp;Remember me
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!--select2 starts-->

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="fa fa-fw fa-file-text-o"></i>
                                                    Inline Form Layout
                                                </h3>
                                                        <span class="pull-right">
                                                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                            <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                        </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-inline" role="form">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="inputEmail">Email</label>
                                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email"></div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="inputPassword">Password</label>
                                                        <input type="password" class="form-control" id="inputPassword" placeholder="Password"></div>
                                                    <div class="checkbox"  style="margin-left: -17px;">
                                                        <label class="mar-left5">
                                                            <input type="checkbox" class="custom_icheck mar-right4">
                                                            &nbsp;Remember me
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mar-top mar-left5">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="fa fa-fw fa-file-text-o"></i>
                                                    Supported Form Controls in Twitter Bootstrap
                                                </h3>
                                                        <span class="pull-right">
                                                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                            <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                        </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-4" for="inputEmail">Email:</label>
                                                        <div class="col-xs-8">
                                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-4" for="inputPassword">Password:</label>
                                                        <div class="col-xs-8">
                                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-4" for="confirmPassword">
                                                            Confirm Password:
                                                        </label>
                                                        <div class="col-xs-8">
                                                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-4" for="firstName">
                                                            First Name:
                                                        </label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" id="firstName" placeholder="First Name"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-4" for="lastName">Last Name:</label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" id="lastName" placeholder="Last Name"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-4" for="phoneNumber">Phone:</label>
                                                        <div class="col-xs-8">
                                                            <input type="tel" class="form-control" id="phoneNumber" placeholder="Phone Number"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-4">
                                                            Date of Birth:
                                                        </label>
                                                        <div class="col-xs-2">
                                                            <select class="form-control">
                                                                <option>Date</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                <option>10</option>
                                                                <option>11</option>
                                                                <option>12</option>
                                                                <option>13</option>
                                                                <option>14</option>
                                                                <option>15</option>
                                                                <option>16</option>
                                                                <option>17</option>
                                                                <option>18</option>
                                                                <option>19</option>
                                                                <option>20</option>
                                                                <option>21</option>
                                                                <option>22</option>
                                                                <option>23</option>
                                                                <option>24</option>
                                                                <option>25</option>
                                                                <option>26</option>
                                                                <option>27</option>
                                                                <option>28</option>
                                                                <option>29</option>
                                                                <option>30</option>
                                                                <option>31</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-2">
                                                            <select class="form-control">
                                                                <option>Month</option>
                                                                <option>Jan</option>
                                                                <option>Feb</option>
                                                                <option>Mar</option>
                                                                <option>Apr</option>
                                                                <option>May</option>
                                                                <option>June</option>
                                                                <option>July</option>
                                                                <option>Aug</option>
                                                                <option>Sep</option>
                                                                <option>Oct</option>
                                                                <option>Nov</option>
                                                                <option>Dec</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-2">
                                                            <select class="form-control">
                                                                <option>Year</option>
                                                                <option>2020</option>
                                                                <option>2019</option>
                                                                <option>2018</option>
                                                                <option>2017</option>
                                                                <option>2016</option>
                                                                <option>2015</option>
                                                                <option>2014</option>
                                                                <option>2013</option>
                                                                <option>2012</option>
                                                                <option>2011</option>
                                                                <option>2010</option>
                                                                <option>2009</option>
                                                                <option>2008</option>
                                                                <option>2007</option>
                                                                <option>2006</option>
                                                                <option>2005</option>
                                                                <option>2004</option>
                                                                <option>2003</option>
                                                                <option>2002</option>
                                                                <option>2001</option>
                                                                <option>2000</option>
                                                                <option>1999</option>
                                                                <option>1998</option>
                                                                <option>1997</option>
                                                                <option>1996</option>
                                                                <option>1995</option>
                                                                <option>1994</option>
                                                                <option>1993</option>
                                                                <option>1992</option>
                                                                <option>1991</option>
                                                                <option>1990</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-4" for="postalAddress">Address:</label>
                                                        <div class="col-xs-8">
                                                            <textarea rows="3" class="form-control resize_vertical" id="postalAddress" placeholder="Postal Address"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-4" for="ZipCode">Zip Code:</label>
                                                        <div class="col-xs-8">
                                                            <input type="text" class="form-control" id="ZipCode" placeholder="Zip Code"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-4">Gender:</label>
                                                        <div class="col-xs-3 col-sm-4">
                                                            <label class="radio-inline radio-inline1">
                                                                <input class="custom_radio" type="radio" name="genderRadios" value="male"> &nbsp;Male</label>
                                                        </div>
                                                        <div class="col-xs-5 col-sm-4">
                                                            <label class="radio-inline radio-inline1">
                                                                <input class="custom_radio" type="radio" name="genderRadios" value="female"> &nbsp;Female</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-4 m_left col-xs-8">
                                                            <label class="checkbox-inline checkbox-inline1 mar-left5">
                                                                <input class="custom_icheck" type="checkbox" value="news">
                                                                &nbsp;Send me latest news and updates.
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-4 col-xs-8 m_left">
                                                            <label class="checkbox-inline checkbox-inline1 mar-left5">
                                                                <input class="custom_icheck" type="checkbox" value="agree">
                                                                &nbsp;I agree to the
                                                                <a href="#">
                                                                    Terms and Conditions
                                                                </a>
                                                                .
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-3 col-xs-9">
                                                            <input type="submit" class="btn btn-primary btn_marTop" value="Submit">
                                                            <input type="reset" class="btn btn-default reset_btn5 btn_marTop" value="Reset"></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--select2 ends--> </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="fa fa-fw fa-check-circle-o"></i>
                                                    Horizontal Form Layout Example
                                                </h3>
                                                        <span class="pull-right">
                                                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                            <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                        </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail" class="control-label col-xs-2">Email</label>
                                                        <div class="col-xs-10">
                                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword" class="control-label hidden-xs col-xs-2">Password</label>
                                                        <label for="inputPassword" class="control-label visible-xs  hidden-lg hidden-sm hidden-md col-xs-2">Pwd</label>
                                                        <div class="col-xs-10">
                                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-2 col-xs-10">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input class="custom_icheck" type="checkbox">
                                                                    &nbsp;Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-2 col-xs-10">
                                                            <button type="submit" class="btn btn-primary">Login</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="fa fa-fw fa-file-text-o"></i>
                                                    Static Form Control
                                                </h3>
                                                        <span class="pull-right">
                                                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                            <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                        </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="inputEmail" class="control-label col-xs-2 hidden-xs">Email</label>
                                                        <label for="inputEmail" class="control-label col-xs-2 visible-xs">Mail:</label>
                                                        <div class="col-xs-10">
                                                            <p class="form-control-static">
                                                                harrypotter@mail.com
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword" class="control-label col-xs-2 hidden-xs">Password</label>
                                                        <label for="inputPassword" class="control-label visible-xs  hidden-lg hidden-sm hidden-md col-xs-2">Pwd</label>
                                                        <div class="col-xs-10">
                                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-2 col-xs-10">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input class="custom_icheck" type="checkbox">
                                                                    &nbsp;Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-2 col-xs-10">
                                                            <button type="submit" class="btn btn-primary">Login</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="fa fa-fw fa-file-text-o"></i>
                                                    Twitter Bootstrap Form Validation States
                                                </h3>
                                                        <span class="pull-right">
                                                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                            <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                        </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group has-success">
                                                        <label class="col-xs-3 control-label hidden-xs" for="inputSuccess">Username</label>
                                                        <label class="col-xs-3 visible-xs control-label" for="inputSuccess">Uname</label>
                                                        <div class="col-xs-9">
                                                            <input type="text" id="inputSuccess" class="form-control" placeholder="Input with success">
                                                                    <span class="help-block">
                                                                        Username is available
                                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-warning">
                                                        <label class="col-xs-3 control-label hidden-xs" for="inputWarning">Password</label>
                                                        <label class="col-xs-3 control-label visible-xs" for="inputWarning">Pwd</label>
                                                        <div class="col-xs-9">
                                                            <input type="password" id="inputWarning" class="form-control" placeholder="Input with warning">

                                                                    <span class="help-block">
                                                                        Password strength: Weak
                                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-error">
                                                        <label class="col-xs-3 control-label" for="inputError">Email</label>
                                                        <div class="col-xs-9">
                                                            <input type="email" id="inputError" class="form-control" placeholder="Input with error">
                                                                    <span class="help-block">
                                                                        Please enter a valid email address
                                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-3 col-xs-9">
                                                            <button type="submit" class="btn btn-primary">Login</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!--min length ends--> </div>
                                        </div>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="fa fa-fw fa-file-text-o"></i>
                                                    Twitter Bootstrap Form Validation States
                                                </h3>
                                                        <span class="pull-right">
                                                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                            <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                        </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group has-success has-feedback">
                                                        <label class="col-xs-3 control-label hidden-xs" for="inputSuccess">Username</label>
                                                        <label class="col-xs-3 visible-xs control-label" for="inputSuccess">Uname</label>
                                                        <div class="col-xs-9">
                                                            <input type="text" id="inputSuccess" class="form-control" placeholder="Input with success">
                                                            <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                                                                    <span class="help-block">
                                                                        Username is available
                                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-warning has-feedback">
                                                        <label class="col-xs-3 control-label hidden-xs" for="inputWarning">Password</label>
                                                        <label class="col-xs-3 control-label visible-xs" for="inputWarning">Pwd</label>
                                                        <div class="col-xs-9">
                                                            <input type="password" id="inputWarning" class="form-control" placeholder="Input with warning">
                                                            <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
                                                                    <span class="help-block">
                                                                        Password strength: Weak
                                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-error has-feedback">
                                                        <label class="col-xs-3 control-label" for="inputError">Email</label>
                                                        <div class="col-xs-9">
                                                            <input type="email" id="inputError" class="form-control" placeholder="Input with error">
                                                            <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                                                                    <span class="help-block">
                                                                        Please enter a valid email address
                                                                    </span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-3 col-xs-9">
                                                            <button type="submit" class="btn btn-primary">Login</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!--min length ends--> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="fa fa-fw fa-file-text-o"></i>
                                                    Bootstrap Form Inputs
                                                </h3>
                                                        <span class="pull-right">
                                                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                            <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                        </span>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                <form action=""  class="form-horizontal">                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">
                                                            Email Address
                                                        </label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-envelope-o"></i>
                                                                        </span>
                                                                <input type="text" class="form-control" placeholder="Email Address"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Password</label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-key"></i>
                                                                        </span>
                                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group has-success">
                                                        <label class="col-md-2 control-label">
                                                            Validation  Email
                                                        </label>
                                                        <div class="col-md-8">
                                                            <div class="input-group input-icon right">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-envelope-o"></i>
                                                                        </span>

                                                                <input id="email" class="input-error form-control" type="text" placeholder="Email Address"></div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group has-error">
                                                        <label class="col-md-2 control-label">
                                                            Validation Password
                                                        </label>
                                                        <div class="col-md-8">
                                                            <div class="input-group input-icon right">
                                                                        <span class="input-group-addon">
                                                                            <i class="fa fa-key"></i>
                                                                        </span>

                                                                <input type="password" class="input-error form-control" placeholder="Password"></div>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">
                                                            Checkbox Left
                                                        </label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <input class="custom_icheck" type="checkbox"></div>
                                                                <input type="text" class="form-control"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">
                                                            Checkbox right
                                                        </label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control">
                                                                <div class="input-group-addon">
                                                                    <input class="custom_icheck" type="checkbox"></div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">
                                                            Radio on left
                                                        </label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <input class="custom_radio" type="radio"></div>
                                                                <input type="text" class="form-control"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">
                                                            Radio on right
                                                        </label>
                                                        <div class="col-md-8">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control">
                                                                <div class="input-group-addon">
                                                                    <input class="custom_radio" type="radio"></div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">
                                                            Processing right
                                                        </label>
                                                        <div class="col-md-8">
                                                            <div class="input-icon left spinner">
                                                                <i class="fa fa-fw fa-spin fa-spinner proc pull-right"></i>
                                                                <input id="email" class="input-error form-control" type="text" placeholder=" "></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">
                                                            Static Paragraph
                                                        </label>
                                                        <div class="col-md-8">
                                                            <p class="form-control">
                                                                email@example.com
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Readonly</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" placeholder="Readonly" readonly=""></div>
                                                    </div>

                                                    <div class="form-group form-actions">
                                                    <div class="row">
                                                        <div class="col-sm-8 col-sm-offset-2">
                                                            <button type="submit" class="btn-success btn btn_marTop">Submit</button>
                                                            <button class="btn-danger btn btn btn_marTop">Cancel</button>
                                                            <button type="reset" class="btn-default btn reset_btn6 btn btn_marTop">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom_js/custom_form_layout.js') }}"></script>
@stop