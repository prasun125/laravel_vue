<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title'){{ config('app.name', 'Laravel') }}</title>

<!-- Favicon -->
<link href="{{ asset('assets/images/icons/favicon.png') }}" rel="shortcut icon" type="image/x-icon"/>

<!-- Font -->
<link href="{{ asset('assets/fonts/font-lato.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/fonts/Lato-Bold.ttf') }}">
<link href="{{ asset('assets/fonts/Lato-Light.ttf') }}">
<link href="{{ asset('assets/fonts/Lato-Medium.ttf') }}">
<link href="{{ asset('assets/fonts/font-material-icon.css') }}" rel="stylesheet" type="text/css"/>

<!-- Vendor -->
<link href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/vendor/owlcarousel/owl.carousel.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/vendor/swiper/swiper.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css"/>

<!-- Styles -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/color.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/header.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
@yield('head-css')

{{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/lib.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.2/css/swiper.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.2/css/swiper.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.2/pagination.css" />
<link href="https://code.jquery.com/ui/1.11.4/themes/redmond/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.2/js/swiper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.2.2/js/swiper.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.min.css') }}">
<link rel="stylesheet" media="print" href="{{ asset('assets/css/fullcalendar.print.min.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.default.css" />--}}

{{--
<link rel="stylesheet" href="{{asset('assets/css/color.css')}}">--}}
