@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
	@parent Manage Vehicles
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
		<h1>Vehicles</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{ URL::to('admin/dashboard') }}">
					<i class="fa fa-fw fa-home"></i>
					Dashboard
				</a>
			</li>
			<li>
				<a href="">
					Vehicles
				</a>
			</li>
			<li>
				<a href="{{ URL::to('admin/vehicles') }}">
					Manage Vehicles
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
							<i class="fa fa-car"></i>
							Vehicles list
						</h3>
						<span class="pull-right">
                            <a href="{{ URL::to('/admin/vehicle/add') }}" style="color: #fff;" title="Add New City">
								<i class="fa fa-fw fa-plus" style="height: 15px; font-size: 12px;"></i>
							</a>
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
										<th>Vehicle Image</th>
										<th>Vehicle Name</th>
										<th>Driver Inclusion</th>
										<th>No. Of Passenger</th>
										<th>No. Of Door</th>
										<th>No. Of Bag</th>
										<th>Description</th>
										<th>Inclusion(s)</th>
										<th>Price</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@if(!empty($data))
										@foreach ($data as $index => $value)
											<tr>
												<td>{{ $value['id'] }}</td>
												<td>
													<img src="{{ asset('admin/assets/images/vehicles') . '/' . $value['image'] }}" height="100" width="200">
												</td>
												<td>{{ $value['vehicle_name'] }}</td>
												@if (!empty($value['driver_inclusion']) AND $value['driver_inclusion'] == 1)
													<td>Yes</td>
												@else
													<td>No</td>
												@endif
												<td>{{ $value['passenger'] }}</td>
												<td>{{ $value['door'] }}</td>
												<td>{{ $value['bag'] }}</td>
												<td>{{ $value['description'] }}</td>
												<td>
													<ol>
														@foreach ($value['inclusion'] as $inclusion)
															@if (!empty($inclusion) AND $inclusion != null)
																<li>{{ $inclusion }}</li>
															@endif
														@endforeach
													</ol>
												</td>
												<td>{{ $value['price'] }}</td>
												<td>
													<a href="{{ URL::to('admin/vehicle/' . $value['id'] . '/edit') }}">
														<i class="fa fa-fw fa-pencil text-warning" title="Edit"></i>
													</a>
												</td>
											</tr>
										@endforeach
									@endif
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