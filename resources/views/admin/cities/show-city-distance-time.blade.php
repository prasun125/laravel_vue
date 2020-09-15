@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    City's Distance Time
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />


<style>
    @media (max-width:425px){
        .table-responsive .dataTables_length,.table-responsive .dataTables_filter{
            margin-top:10px;
        }
    }
    .show {
        min-height: 72px;
        display: flex !important;
        flex-direction: row;
        align-items: center;
    }
</style>
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Cities</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ URL::to('admin/dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li> <a href="">Cities</a></li>
            <li>
                <a href="{{ URL::to('admin/city-distance-time') }}">City's Distance Time</a>
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="col-lg-12">
                {{--<div class="btn-group" role="group" aria-label="...">
                    <a class="btn btn-default btn-sm" href="" role="button">Show Active users</a>
                    <a class="btn btn-success btn-sm" href="?withTrashed=true" role="button">Include Deleted Users</a>
                    <a class="btn btn-danger btn-sm" href="?onlyTrashed=true">Show Only Deleted Users</a>
                </div>
                <br />--}}
                <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-fw fa-money"></i>
                        City's Distance Time
                    </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                     {{--<i class="fa fa-fw fa-times removepanel clickable"></i>--}}
                                </span>
                    <span class="pull-right" style="margin-top: -24px; margin-right: 24px; background-color: #01579B;">
                        <a href="{{ URL::to('/get_distance_time') }}" type="button" class="btn" style="color: #fff;">Update City's Distance Time</a>
                    </span>
                </div>
                
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                        <tr class="filters">
                            <th>ID</th>
                            <th>City From</th>
                            <th>City To</th>
                            <th>Distance</th>
                            <th>Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $index => $value)
                            <tr>
                                <td>{{ $value['id'] }}</td>
                                <td>{{ $value['city_from'] }}</td>
                                <td>{{ $value['city_to'] }}</td>
                                <td>{{ $value['distance'] }}</td>
                                <td>{{ $value['time'] }}</td>
                                {{--<td>
                                    <a href="{{ URL::to('admin/city/' . $value['id'] . '/edit') }}"><i class="fa fa-fw fa-pencil text-warning" title="Edit"></i></a>
                                </td>--}}
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                        <div class="row">
                            <div class="col-sm-5 show">
                                Showing {{ ($data->perPage() * ($data->currentPage() - 1)) + 1 }} to {{ ($data->perPage() * ($data->currentPage() - 1)) + $data->count() }} of {{ $data->total() }} entries
                            </div>
                            <div class="col-sm-7" style="text-align: right;">
                                {!! $data->render() !!}
                            </div>
                        </div>
                    </div>
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
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
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
    <script type="text/javascript">
	    $(document).ready(function() {
		    $('div.table-responsive > div#table_wrapper > div.row:nth-child(1)').css('display', 'none');
		    $('div.table-responsive > div#table_wrapper > div.row:nth-child(3)').css('display', 'none');
	    });
    </script>
@stop