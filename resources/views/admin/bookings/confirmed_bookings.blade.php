@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @parent Manage Cities
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
            <li>
                <a href="">
                    Bookings
                </a>
            </li>
            <li>
                <a href="{{ URL::to(Request::url()) }}">
                    Confirmed Bookings
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
                            <i class="fa fa-map-marker"></i>
                            Confirmed Booking list
                        </h3>
                        <span class="pull-right">
                            <a href="#" style="color: #fff;" title="Add New Predefined Route" data-toggle="modal" data-target="#createModal" style="line-height: 56px;">
                                <i class="fa fa-fw fa-plus" style="height: 15px; font-size: 12px;"></i>
                            </a>

                            {{--<a href="{{ URL::to('/create-route') }}" style="color: #fff;" title="Add New Predefined Route">
								<i class="fa fa-fw fa-plus" style="height: 15px; font-size: 12px;"></i>
							</a>--}}
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            {{--<i class="fa fa-fw fa-times removepanel clickable"></i>--}}
                        </span>
                    </div>
                    {{--{{ dd($data) }}--}}
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="table">
                                <thead>
                                <tr class="filters">
                                    <th>ID</th>
                                    <th>Route Title</th>
                                    <th>Price</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Number of Nights</th>
                                    <th>Number of Traveller(s)</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($data))
                                    @foreach ($data as $index => $value)
                                        <tr>
                                            <td>{{ $value['id'] }}</td>
                                            <td>{{ $value['title'] }}</td>
                                            <td>{{ $value['price'] }}</td>
                                            <td>{{ $value['start_date'] }}</td>
                                            <td>{{ $value['end_date'] }}</td>
                                            <td>{{ $value['number_of_nights'] }}</td>
                                            <td>{{ $value['travellers'] }}</td>
                                            <td>{{ $value['name'] }}</td>
                                            <td>{{ $value['email'] }}</td>
                                            <td>{{ $value['mobile'] }}</td>
                                            <td>{{ $value['address'] }}</td>
                                            <td>{{ $value['status'] }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ URL::to('admin/confirm-booking/' . $value['id']) }}">Mark Completed</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            @if(!empty($data))
                            <div class="row">
                                <div class="col-sm-5 show">
                                    Showing {{ ($data->perPage() * ($data->currentPage() - 1)) + 1 }} to {{ ($data->perPage() * ($data->currentPage() - 1)) + $data->count() }} of {{ $data->total() }} entries
                                </div>
                                <div class="col-sm-7" style="text-align: right;">
                                    {!! $data->render() !!}
                                </div>
                            </div>
                            @endif
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('div.table-responsive > div#table_wrapper > div.row:nth-child(1)').css('display', 'none');
            $('div.table-responsive > div#table_wrapper > div.row:nth-child(3)').css('display', 'none');
        });
    </script>
@stop