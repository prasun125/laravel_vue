<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>404 Error| Chandra Admin Template</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700'; rel='stylesheet' type='text/css'>
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of global css-->
    <!-- page level styles-->
    <link href="{{ asset('admin/assets/css/custom_css/404.css') }}" rel="stylesheet">
    <!-- end of page level styles-->
    </head>
<body>
    <div class="container">
        <div class="err-cont">
            <div class="col-sm-6 col-xs-6">
                <img src="{{ asset('admin/assets/img/errimg3.png') }}" class="img-responsive">
                <a href="index">
                    <button type="button" class="btn btn-responsive button-alignment" style="margin-bottom:7px;">Go Home</button>
                </a>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="{{ asset('admin/assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
</body>
</html>