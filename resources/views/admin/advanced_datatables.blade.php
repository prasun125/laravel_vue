@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Advanced Tables @parent

@stop
    {{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/buttons.bootstrap.css') }}"/>--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/colReorder.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/rowReorder.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/buttons.bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/scroller.bootstrap.css') }}">
<style>
    table{
        width:100%;;

    }
    @media (max-width:425px){
        .table-responsive .dataTables_length,.table-responsive .dataTables_filter{
            margin-top:10px;
        }
        #table1_wrapper .btn-group{
            margin-top:10px;
            margin-left:10px;
        }
        #table2_filter{
            margin-left:-25px;
        }
        #table3_filter{
            margin-left:-25px;
        }
    }
</style>
@stop
{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>Advanced Tables</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li><a href="#">Data Tables</a></li>
                        <li>
                            Advanced Tables
                        </li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success filterable">
                                <div class="panel-heading clearfix  ">
                                    <div class="panel-title pull-left">
                                        <i class="fa fa-fw fa-file-text-o"></i>
                                       Export Data
                                    </div>
                                    <div class="tools pull-right"></div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="table1">
                                        <thead>
                                            <tr>

                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>User Name</th>
                                                <th>User E-mail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Markotto</td>
                                                <td>Markotto@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Markotto</td>
                                                <td>Markotto@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Markotto</td>
                                                <td>Markotto@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Markotto</td>
                                                <td>Markotto@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Markotto</td>
                                                <td>Markotto@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Markotto</td>
                                                <td>Markotto@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Markotto</td>
                                                <td>Markotto@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Markotto</td>
                                                <td>Markotto@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Markotto</td>
                                                <td>Markotto@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>

                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success filterable" style="overflow:auto;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-file-text-o"></i>
                                        Re-order Columns
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="table2">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>User Name</th>
                                                <th>User E-mail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>6.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>7.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>8.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>9.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>10.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>11.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>12.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>13.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>14.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>15.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>16.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>17.</td>
                                                <td>Larryss</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success filterable">
                                <div class="panel-heading clearfix">
                                    <h3 class="panel-title pull-left" style="margin-top: 6px;">
                                        <i class="fa fa-fw fa-file-text-o"></i>
                                        Add / Remove rows
                                    </h3>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-primary btn-sm" id="addButton">Add row</button>
                                        <button type="button" class="btn btn-danger btn-sm" id="delButton">Delete row</button>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="table3">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>User Name</th>
                                                <th>User E-mail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>JacobThornton@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>6.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>7.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>8.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>9.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>10.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>11.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>12.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>13.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>14.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>15.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>16.</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                            <tr>
                                                <td>17.</td>
                                                <td>Larryss</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>LarrytheBird@test.com</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </section>
            @stop
{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.buttons.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.colReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
{{--    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.rowReorder.js') }}" ></script>--}}
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/buttons.colVis.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/buttons.html5.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/buttons.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/buttons.print.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/pdfmake.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/vfs_fonts.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.scroller.js') }}" ></script>
        <script src="{{ asset('admin/assets/js/custom_js/advanced_datatables.js') }}" type="text/javascript" ></script>
        @stop