<!DOCTYPE html>
<html>
<head>
    <title>Login | Chandra Admin Template</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- global level css -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/vendors/iCheck/css/all.css')}}" rel="stylesheet">
    <!-- end of global css-->
    <!-- page level styles-->
    <link href="{{ asset('admin/assets/css/custom_css/login.css') }}" rel="stylesheet" type="text/css">
    <!-- end of page level styles-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="panel-header">
                <h2 class="text-center login_text">
                    Log In
                </h2>
            </div>
            <div class="panel-body social col-sm-offset-2">

                <div class="col-xs-4 col-sm-3">
                    <a href="#" class="btn btn-lg btn-block btn-facebook"> <i class="fa fa-facebook-square fa-lg margin_right"></i>
                        <span class="hidden-sm hidden-xs">Facebook</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-3">
                    <a href="#" class="btn btn-lg btn-block btn-twitter"> <i class="fa fa-twitter-square fa-lg margin_right"></i>
                        <span class="hidden-sm hidden-xs">Twitter</span>
                    </a>
                </div>
                <div class="col-xs-4 col-sm-3">
                    <a href="#" class="btn btn-lg btn-block btn-google">
                        <i class="fa fa-google-plus-square fa-lg margin_right"></i>
                        <span class="hidden-sm hidden-xs">Google+</span>
                    </a>
                </div>
                <div class="clearfix">

                    <div class="col-xs-12 col-sm-9">
                        <hr class="omb_hrOr">
                        <span class="omb_spanOr">or</span>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-xs-12 col-sm-6 col-sm-offset-2 form_width">
                        <!-- Notifications -->
                        @include('notifications')

                        <form action="{{ route('admin-login') }}" class="omb_loginForm"  autocomplete="off" method="POST">
                            {!! Form::token() !!}
                            <div class="input-group  {{ $errors->first('email', 'has-error') }} col-xs-12">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="email" class="form-control" name="email" placeholder="Email "
                                       value="{!! old('email') !!}"></div>
                                <span class="help-block">{{ $errors->first('email', ':message') }}</span>

                            <div class="input-group {{ $errors->first('password', 'has-error') }}">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input type="password" class="form-control" name="password" placeholder="Password"></div>
                            <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"/>
                                    Remember Me
                                </label>
                            </div>
                            <input type="submit" class="btn btn-md btn-primary btn-block" value="Log In" style="margin-bottom: 8px;"/>
                            <div class="row" id="forgot">
                            <a href="{{ route('admin-register') }}" id="pad_mar">Don't have account? Sign Up</a>
                            <a href="{{ route('forgot_password') }}" id="pad_mar" class="pull-right"> Forgot Password? </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="{{ asset('admin/assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom_js/login.js') }}" type="text/javascript"></script>
</body>
</html>