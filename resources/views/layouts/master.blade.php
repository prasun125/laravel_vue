<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		@include('includes.head')
	</head>
	<body class="pos-relative">
		@yield('internal-css')
		<div id="app">
			@include('includes.header')
			<div id="vehicle-overlay"></div>
			<div id="currency-overlay"></div>
			@yield('content')
			@include('includes.footer')
		</div>
		<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}" type="text/javascript" rel="script"></script>
		<script src="{{ asset('assets/vendor/daterangepicker/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/app.js') }}" type="text/javascript" rel="script"></script>
		<script src="{{ asset('assets/vendor/owlcarousel/owl.carousel.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/vendor/swiper/swiper.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/vendor/bootstrap-timepicker/js/bootstrap-timepicker.js') }}" type="text/javascript"></script>
		<script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>
		@yield('internal-js')
	</body>
</html>