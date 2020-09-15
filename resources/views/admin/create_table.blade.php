@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Create Tables @parent
@stop

{{--page level css --}}

@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/custom_css/create_table.css')}}" rel="stylesheet" type="text/css"/>
@stop



{{--end of page level css--}}
{{-- Page content --}}
@section('content')
        <section class="content-header">
            <h1>Create Table</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fa fa-fw fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li><a href="#">Datatables</a></li>
                <li>
                     Create Table
                </li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw fa-bell-o"></i>
                                Create Table
                            </h3>
                                <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                        </div>
                        <div class="panel-body">
                            <form role="form" class="form" name="table_gen" id="form_table">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group">
                                    <label for="trow" class="control-label">Rows:</label>
                                    <input type="number" class="form-control" name="trow" id="trow" min="1" placeholder="Enter number of rows">
                                </div>
                                <div class="form-group">
                                    <label for="tcol" class="control-label">Columns:</label>
                                    <input type="number" class="form-control" name="tcol" id="tcol" min="1" placeholder="Enter number of columns">
                                </div>
                                <div class="check">
                                    <label class="checkbox-inline">
                                        <input class="custom_icheck" type="checkbox" id="bordered" name="bordered" value="bordered"> &nbsp;Bordered
                                    </label>
                                    <label class="checkbox-inline">
                                        <input class="custom_icheck" type="checkbox" id="stripped" name="stripped" value="stripped"> &nbsp;Stripped
                                    </label>
                                    <label class="checkbox-inline">
                                        <input class="custom_icheck" type="checkbox" id="condensed" name="condensed" value="condensed"> &nbsp;Condensed
                                    </label>
                                </div>
                                <input type="submit" class="btn btn-primary btn_marTop" value="Submit" name="submit" id="form_submit">
                                <input type="reset" name="name" id="reset" class="btn btn-default btn_marTop" value="Reset">
                                <input type="button" name="generate_code" id="generate_code" class="btn btn-success btn_marTop" value="Generate Code">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-success table_view hidden">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw fa-bell-o"></i>
                                Created Table
                            </h3>
                                <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                        </div>
                        <div class="panel-body">

                            <div id="table" class="table-responsive"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-danger html hidden">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw fa-bell-o"></i>
                                Created Table HTML Code
                            </h3>
                                <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                        </div>
                        <div class="panel-body">
                            <textarea class="form-control" id="html_code" rows="10" data-autoresize></textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{--row--}}
        </section>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/cropper/js/cropper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('admin/assets/js/custom_js/create_table.js') }}" type="text/javascript"></script>
@stop