@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Bootstrap Edit Tables @parent
@stop

@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/bootstrap-table/css/bootstrap-table.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/assets/vendors/x-editable/css/bootstrap-editable.css')}}" type="text/css" rel="stylesheet">
<link href="{{ asset('admin/assets/vendors/bootstrap-table/css/bootstrap-table-reorder-rows.css')}}" type="text/css" rel="stylesheet">
    <style>
        .open > .dropdown-menu {
            animation: none;
        }
        @media (max-width:320px){
            .pull-right.search{
                margin-right:5px;
            }
            .columns.columns-right{
                margin-right:5px;
            }

        }
    </style>
@stop

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Editable Tables</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-fw fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">Bootstrap Tables</a>
                </li>
                <li>
                    Editable Tables
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
                                <i class="fa fa-fw fa-bell-o"></i>
                                Advanced search
                            </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table"  data-pagination="true"
                                       data-search="true"
                                       data-advanced-search="true"
                                       data-id-table="advancedTable">
                                    <thead>
                                    <tr>
                                        <th data-field="id" data-sortable="true">#</th>
                                        <th data-field="fname" data-sortable="true">First Name</th>
                                        <th data-field="lname" data-sortable="true">Last Name</th>
                                        <th data-field="uname" data-sortable="true">Username</th>
                                        <th data-field="gender" data-sortable="true">Gender</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>Markotto</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>JacobThornton</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>Larrythe Bird</td>
                                        <td>Female</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Honey</td>
                                        <td>Honey Bird</td>
                                        <td>Honey Bird</td>
                                        <td>Female</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Peter</td>
                                        <td>Peter Bird</td>
                                        <td>Peter</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Jenny</td>
                                        <td>Jery</td>
                                        <td>Jenny jery</td>
                                        <td>Female</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Harry</td>
                                        <td>Bird</td>
                                        <td>Harrythe Bird</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Peter</td>
                                        <td>Peter Bird</td>
                                        <td>Peter</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Jenny</td>
                                        <td>Jery</td>
                                        <td>Jenny jery</td>
                                        <td>Female</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Harry</td>
                                        <td>Bird</td>
                                        <td>Harrythe Bird</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>Harry</td>
                                        <td>Bird</td>
                                        <td>Harrythe Bird</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Peter</td>
                                        <td>Peter Bird</td>
                                        <td>Peter</td>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Jenny</td>
                                        <td>Jery</td>
                                        <td>Jenny jery</td>
                                        <td>Female</td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Harry</td>
                                        <td>Bird</td>
                                        <td>Harrythe Bird</td>
                                        <td>Male</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- First Basic Table strats here-->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw fa-bell-o"></i>
                                Editable Table
                            </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th data-editable="true">First Name</th>
                                    <th data-editable="true">Last Name</th>
                                    <th data-editable="true">Username</th>
                                    <th class="status">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Airi Satou</td>
                                    <td>Kelly</td>
                                    <td>Satou124</td>
                                    <td>Approved</td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Angelica</td>
                                    <td>Ramos</td>
                                    <td>Angelica343</td>
                                    <td>Pending</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Ashton</td>
                                    <td>Cox</td>
                                    <td>Cox111</td>
                                    <td>Suspended</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Bradley</td>
                                    <td>Greer</td>
                                    <td>Bradley</td>
                                    <td>Blocked</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Bradley</td>
                                    <td>Greer</td>
                                    <td>Bradley</td>
                                    <td>Blocked</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Bradley</td>
                                    <td>Greer</td>
                                    <td>Bradley</td>
                                    <td>Blocked</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Bradl</td>
                                    <td>light</td>
                                    <td>Bradley</td>
                                    <td>Approved</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="right" class="bg-light lter">
            </div>
        </section>
@stop
<!-- ./wrapper -->

 @section('footer_scripts')
     <script src="{{ asset('admin/assets/vendors/bootstrap-table/js/bootstrap-table.min.js') }}" ></script>
<script src="{{ asset('admin/assets/vendors/bootstrap-table/js/bootstrap-table-toolbar.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/bootstrap-table/js/bootstrap-table-editable.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/x-editable/js/bootstrap-editable.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/bootstrap-table/js/bootstrap-table-export.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/vendors/bootstrap-table/js/tableExport.min.js')}}" type="text/javascript"></script>
     <script src="{{ asset('admin/assets/js/custom_js/bs-editable.js')}}" type="text/javascript"></script>
     <script>
         $('body').one('click','.fixed-table-toolbar button', function () {
             $('.search input').val('');
             var button = '<button class="btn btn-success btn_ok" data-dismiss="modal" aria-hidden="true" style="margin-left:5px" >OK</button>';
             $('#btnCloseAvd_advancedTable').parent().append(button);
             $('#btnCloseAvd_advancedTable').attr('type','reset');

         });
     </script>
 @stop