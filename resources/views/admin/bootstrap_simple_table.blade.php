@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Bootstrap Basic Tables @parent
@stop

@section('header_styles')
<!--page level css -->
<link href="{{ asset('admin/assets/vendors/bootstrap-table/css/bootstrap-table.min.css')}}" rel="stylesheet">
<!--end of page level css-->
<style>
    .open > .dropdown-menu {
        animation : none;
    }
</style>
@stop

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Basic Tables</h1>
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
                    Basic Tables
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
                                Basic Table with Pagination
                            </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" id="table1" data-toggle="table" data-pagination="true" data-search="true">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Gender</th>
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
                                Table Text Alignment and sorting
                            </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" data-sort-order="asc">
                                    <thead>
                                    <tr>
                                        <th data-halign="right" data-align="center" data-sortable="true">#</th>
                                        <th data-halign="center" data-align="left" data-sortable="true">First Name</th>
                                        <th data-halign="left" data-align="right" data-sortable="true">Last Name</th>
                                        <th data-halign="center" data-align="center" data-sortable="true">Username</th>
                                        <th data-halign="center" data-align="left" data-sortable="true">Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Airi Satou</td>
                                        <td>Kelly</td>
                                        <td>Satou124</td>
                                        <td>satou124@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Angelica</td>
                                        <td>Ramos</td>
                                        <td>Angelica343</td>
                                        <td>
                                            angelica343@gmail.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Ashton</td>
                                        <td>Cox</td>
                                        <td>Cox111</td>
                                        <td>
                                            cox111@gmail.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Bradley</td>
                                        <td>Greer</td>
                                        <td>Bradley</td>
                                        <td>
                                            bradley324@gmail.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Bradley</td>
                                        <td>Greer</td>
                                        <td>Bradley</td>
                                        <td>
                                            bradley324@gmail.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Bradley</td>
                                        <td>Greer</td>
                                        <td>Bradley</td>
                                        <td>
                                            bradley324@gmail.com
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Bradl</td>
                                        <td>light</td>
                                        <td>Bradley</td>
                                        <td>
                                            bradley324@gmail.com
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- First Basic Table Ends Here-->
            <!-- Second Data Table Starts Here-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-fw fa-bell-o"></i>
                                Format
                            </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table"
                                       data-toggle="table"
                                       data-height="460"
                                       data-url="../assets/json/data1.json">
                                    <thead>
                                    <tr>
                                        <th data-field="id" data-formatter="ID: %s">ID</th>
                                        <th data-field="name" data-formatter="nameFormatter">Item Name</th>
                                        <th data-field="price" data-formatter="priceFormatter">Item Price</th>
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
<script src="{{ asset('admin/assets/js/custom_js/bstable.js')}}" type="text/javascript"></script>

<!-- end of page level js -->
@stop