@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    Ajax Datatables Example
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('admin/assets/css/custom_css/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Ajax Datatables</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Laravel Examples</a></li>
            <li class="active">Ajax Datatables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="fa fa-fw fa-list"></i>
                        Users List
                    </h4>
                </div>
                <br />
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-responsive " id="table1">
                        <thead>
                        <tr class="filters">
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Full Name</th>
                            <th>User E-mail</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>    <!-- row-->
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script>
        $(function() {
            var table = $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.datatables.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'firstname', name: 'firstname' },
                    { data: 'lastname', name: 'lastname' },
                    { data: 'email', name: 'email' }
                ]
            });
            table.on( 'draw', function () {
            } );
        });
    </script>
@stop
