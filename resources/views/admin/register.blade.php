<!DOCTYPE html>
<html>
<head>
    <title>Register | Chandra Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700'; rel='stylesheet' type='text/css'>
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of global css-->
    <!-- page level styles-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.ico') }}" type="image/x-icon">
    <link href="{{asset('admin/assets/vendors/iCheck/css/all.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/vendors/select2/css/select2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/custom_css/login.css') }}" rel="stylesheet" type="text/css">
    <!-- end of page level styles-->
</head>
<body>
<div class="container">
        <div class="row " id="form-login">
            <div class="panel-header">
                <h2 class="text-center text-primary margin_left">
                     Sign Up
                </h2>
            </div>
            <div class="panel-body social col-sm-offset-3">
                <div class="col-xs-12 col-sm-8 ">
                    <!-- Notifications -->
                    @include('notifications')
                    {{--@if($errors->has())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    @endif--}}
                    <br />
                    <form class="form-horizontal" method="POST" action="{{ route('admin-register') }}" id="register_form" autocomplete="off">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                            <label class="control-label col-xs-3" for="first_name">First Name *</label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="fa fa-fw fa-user-md text-primary"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name"
                                           id="first_name" value="{!! old('first_name') !!}"/>

                                </div>
                                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('last_name', 'has-error') }}">
                            <label class="control-label col-xs-3" for="last_name">Last Name *</label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                           id="last_name" value="{!! old('last_name') !!}"/>
                                    <span class="input-group-addon"> <i class="fa fa-fw fa-user-md text-primary"></i>
                                    </span>
                                </div>
                                {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <label class="control-label col-xs-3" for="email">Email *</label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope text-primary"></i>
                                    </span>
                                    <input type="email" placeholder="Email Address" class="form-control" name="email"
                                           id="email" value="{!! old('email') !!}"/>
                                </div>
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('email_confirm', 'has-error') }}">
                            <label class="control-label col-xs-3" for="email_confirm">Confirm Email *</label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope text-primary"></i>
                                    </span>
                                    <input type="email" placeholder="Confirm Email Address" class="form-control"
                                           name="email_confirm" id="email_confirm" value="{!! old('email_confirm') !!}"
                                           />
                                </div>
                                {!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('password', 'has-error') }}">
                            <label class="control-label col-xs-3" for="password">Password *</label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw fa-key text-primary"></i>
                                    </span>
                                    <input type="password" placeholder="Password" class="form-control" name="password" id="password" />
                                </div>
                                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('password_confirm', 'has-error') }}">
                            <label class="control-label col-xs-3" for="password_confirm">Confirm Password *</label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirm" id="password_confirm" />
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw fa-key text-primary"></i>
                                    </span>
                                </div>
                                {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" for="phone">Phone *</label>
                            <div class="col-xs-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw fa-phone text-primary"></i>
                                    </span>
                                    <input type="text" placeholder="Phone Number" class="form-control" name="phone"
                                           id="phone" value="{!! old('phone') !!}"/>
                                </div>
                                {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" for="dob">Date of Birth *</label>
                            <div class="col-xs-9">
                                <div class="input-group input-append">
                                    <input id="dob"  name="dob" type="text" class="form-control"
                                           data-date-format="YYYY-MM-DD" placeholder="yyyy-mm-dd" />
                                    <span class="input-group-addon add-on">
                                        <i class="fa fa-calendar text-primary"></i>
                                    </span>
                                </div>
                                {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label  col-xs-3">Select Country</label>
                            <div class="col-xs-9">
                                <select  id="select2_sample4" class="form-control select2" name="country">
                                    <option></option>
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

                        <div class="form-group">
                            <label class="control-label col-xs-3" for="address">Address *</label>
                            <div class="col-xs-9">
                                <textarea rows="3" class="form-control" placeholder="Postal Address" name="address"
                                          id="address" value="{!! old('address') !!}"></textarea>
                            </div>
                            {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" for="zip">Zip Code *</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip Code"
                                       value="{!! old('zip') !!}">
                                {!! $errors->first('zip', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" for="gender">Gender</label>
                            <div class="col-xs-3 mar-top4">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" class="flat-red" id="radio_d1" value="male" />
                                    Male
                                </label>
                            </div>
                            <div class="col-xs-3 mar-left5 ">
                                <label class="radio-inline">
                                    <input type="radio" name="gender" class="flat-red " id="radio_d2" value="female" />
                                    Female
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-9">
                                <label class="checkbox-inline mar-left">
                                    <input type="checkbox" name="subscribed" value="1" class="minimal-red"/>
                                    &nbsp; Send me latest news and updates.
                                </label>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-offset-3 col-xs-9">
                                <input type="submit" class="btn btn-primary" value="Submit"  />
                                <input type="reset" class="btn btn-default btn_reset"  value="Reset" id="dee1"/>
                            </div>

                        </div>
                        <div class="text-center">
                            <a href="{{ route('admin-login') }}" id="login_a"> Already have an account? Log In</a>
                        </div>
                    </form>
                </div>

            </div>


        </div>

    </div>
    <!-- global js -->
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('admin/assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!-- end of global js -->
    <!-- begining of page level js -->

    <script src="{{ asset('admin/assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/register.js') }}" type="text/javascript"></script>
    <!-- end of page level js -->
</body>
</html>