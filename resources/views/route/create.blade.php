@extends('layouts.master')
@section('title')
	Create Plan |
@endsection
@section('head-css')
	<link rel="stylesheet" href="{{asset('assets/css/sidenavbar.css')}}">
@endsection
@section('internal-css')@endsection
@section('content')
	<create-plan :all-cities='{!! json_encode($allCities) !!}' :vehicles='{!! json_encode($vehicles) !!}' :suggested-destination='{!! json_encode($suggestedDestination) !!}' :homepage-data='{!! json_encode($homepageData) !!}' ref="createplan"></create-plan>
@endsection
@section('internal-js')@endsection
