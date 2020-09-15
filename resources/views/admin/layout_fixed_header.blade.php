@extends('admin/layouts/fixed_header')

{{-- Page title --}}
@section('title')
    Fixed header
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/custom_css/layout_responsive.css') }}">
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
                <!--section starts-->
                <h1>
                    Fixed Header
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-fw fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Layouts</a>
                    </li>
                    <li>Fixed Header</li>
                </ol>
            </section>
            <section class="content">

                <div class="outer">
                    <div class="inner bg-light lter">
                        <h2>Code</h2>
                        <pre><code class="language-markup">&lt;nav class=&quot;navbar-fixed-top&quot;&gt;
...
&lt;/nav&gt;</code></pre>
                    </div>
                    <!-- /.inner --> </div>
               
                <!-- /#right --> 
                </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop


            