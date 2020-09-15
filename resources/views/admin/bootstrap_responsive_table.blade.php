@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Bootstrap Responsive Tables @parent
@stop

@section('header_styles')
<!--page level css -->
<link href="{{ asset('admin/assets/vendors/bootstrap-table/css/bootstrap-table.min.css')}}" rel="stylesheet">
<link href="{{ asset('admin/assets/vendors/bootstrap-table/css/bootstrap-table-reorder-rows.css')}}" type="text/css" rel="stylesheet">
<!--end of page level css-->
@stop

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Basic Tables</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="">
                        <i class="fa fa-fw fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">Bootstrap Tables</a>
                </li>
                <li>
                    Responsive Tables
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <!-- First Basic Table strats here-->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw fa-yelp"></i>
                                Reorder Rows
                            </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table{{-- id="table"
                                       data-toggle="table"
                                       data-pagination="true"
                                       data-search="true"
                                       data-use-row-attr-func="true"
                                       data-reorderable-rows="true"
                                       data-url="../assets/json/data3.json"--}}>
                                    <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true">ID</th>
                                        <th data-field="f_name" data-sortable="true">First Name</th>
                                        <th data-field="m_name" data-sortable="true">Middle Price</th>
                                        <th data-field="l_name" data-sortable="true">Last Name</th>
                                        <th data-field="gender" data-sortable="true">Gender</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@stop

<!-- ./wrapper -->
@section('footer_scripts')
<!-- begining of page level js -->
<script src="{{ asset('admin/assets/vendors/bootstrap-table/js/bootstrap-table.min.js')}}"></script>
<script src="{{ asset('admin/assets/vendors/bootstrap-table/js/bootstrap-table-multiple-sort.min.js')}}"></script>
<script src="{{ asset('admin/assets/vendors/TableDnD/js/jquery.tablednd.js')}}"></script>
<script src="{{ asset('admin/assets/vendors/bootstrap-table/js/bootstrap-table-reorder-rows.js')}}"></script>
<script src="{{ asset('admin/assets/js/custom_js/bstable.js')}}" type="text/javascript"></script>
<!-- end of page level js -->
@stop