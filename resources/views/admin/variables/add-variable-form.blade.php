@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @parent Add New Variable
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
            Variables
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::to('admin/dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="">
                    Variables
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/variable/add') }}">
                    Add New Variable
                </a>
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="fa fa-fw fa-money"></i>
                                            Add New Variable
                                        </h3>
                                        <span class="pull-right">
											<a href="{{ URL::to('/admin/variables') }}" style="color: #fff;"
                                               title="Manage Variables">
												<i class="fa fa-fw fa-eye" style="height: 15px; font-size: 12px;"></i>
											</a>
											<i class="fa fa-fw fa-chevron-up clickable"></i>
                                            {{--<i class="fa fa-fw fa-times removepanel clickable"></i>--}}
										</span>
                                    </div>
                                    <div class="panel-body">
                                        <form action="{{ URL::to('admin/variable/add') }}" method="POST"
                                              class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-body">
                                                <div class="form-group pad-top40">
                                                    <label for="min_distance" class="col-md-3 control-label">
                                                        Variable Name
                                                        <span style="color: red;">*</span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="example-text-input" name="var_name"
                                                               class="form-control" required autofocus>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="max_distance" class="col-md-3 control-label">
                                                        Value
                                                        <span style="color: red;">*</span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="example-text-input" name="var_value"
                                                               class="form-control" required>
                                                    </div>
                                                </div>

                                            <div class="form-actions" id="mrg_left9">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn btn-primary">
                                                        Save
                                                    </button>
                                                    <a href="{{ URL::current() }}"
                                                       class="btn btn-default" role="button">
                                                        Cancel
                                                    </a>
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
    </section>
@stop
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom_js/custom_form_layout.js') }}"></script>
@stop