@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Blank Page
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Blank</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Pages</a></li>
            <li>
                Blank
            </li>
        </ol>
    </section>
    <section class="content">
        write your content here
        {{-- Uncomment below code if you want to display right sidebar --}}
        {{-- @include('admin.layouts.right_sidebar') --}}
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop