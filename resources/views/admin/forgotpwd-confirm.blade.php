<!DOCTYPE html>
<html>
<head>
    {{--<meta charset="UTF-8">--}}
    <title>Forgot Password Confirm | Welcome to Chandra_Frontend</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- end of global css-->
    <!-- page level styles-->
    <link type="text/css" href="{{ asset('admin/assets/vendors/iCheck/skins/minimal/blue.css') }}">
    <link href="{{ asset('admin/assets/css/frontend/register.css') }}" rel="stylesheet">
    <!-- end of page level styles-->
</head>
<body>
<div class="container">
    <div class="row">

        <div class="box animated fadeInDown">

            <h2 class="text-center text-primary"><img src="{{ asset('admin/assets/images/logo3.png') }}"><br />Chandra</h2>
            <h4 class="text-primary text-center"><strong>Reset your Password</strong></h4>

            <p class="text-center">Enter your new password details</p>
            {{--<form action="#" method="post">--}}
            {{--<div class="form-group">--}}
            @include('notifications')

            <form action="{{ route('forgot_password_confirm',compact(['userId','passwordResetCode'])) }}" class="omb_loginForm"  autocomplete="off" method="POST">
                {!! Form::token() !!}
                <input type="password" class="form-control" name="password" placeholder="New Password">
                <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                <input type="password" class="form-control" name="password_confirm" placeholder="Confirm New Password">
                <span class="help-block">{{ $errors->first('password_confirm', ':message') }}</span>

                <input type="submit" class="btn btn-block btn-primary" value="Submit to Reset Password" style="margin-top:10px;">
            </form>
            {{--</div>--}}

            <div class="panel-header">
                <h4 class="text-center text-primary">
                    <a href="{{ route('login') }}">Log In</a> or
                    <a href="{{ route('register') }}">Sign Up</a>
                </h4>
            </div>


        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/vendors/iCheck/icheck.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/frontend/register.js') }}"></script>
<!-- end of global js -->
</body>
</html>