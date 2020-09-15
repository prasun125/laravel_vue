@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @parent Manage Variables
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin/assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <style>
        @media (max-width: 425px) {
            .table-responsive .dataTables_length, .table-responsive .dataTables_filter {
                margin-top: 10px;
            }
        }
    </style>
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>
            Price Rules
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
                <a href="{{ URL::to('admin/variables') }}">
                    Manage Variables
                </a>
            </li>
        </ol>
    </section>
    <div class="panel-body">
        @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>
    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-money"></i>
                            Variables list
                        </h3>
                        <span class="pull-right">
                        <a href="{{ URL::to('/admin/variable/add') }}" style="color: #fff;" title="Add New Variable">
                            <i class="fa fa-fw fa-plus" style="height: 15px; font-size: 12px;"></i>
                        </a>
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                            {{--<i class="fa fa-fw fa-times removepanel clickable"></i>--}}
                    </span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                <tr class="filters">
                                    <th>Variable ID</th>
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($variables as $key => $value)
                                    <tr>
                                        <td>{{ $value['id'] }}</td>
                                        <td>{{ $value['name'] }}</td>
                                        <td>{{ $value['value'] }}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/variable/edit/'.$value['id']) }}">
                                                <i class="fa fa-fw fa-pencil text-warning" title="Edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>    <!-- row-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript"
            src="{{ asset('admin/assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('admin/assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
    <script>
        $(function () {
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
    </script>
@stop