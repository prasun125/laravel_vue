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
					Cities
				</a>
			</li>
			<li>
				<a href="{{ URL::to('admin/cities') }}">
					Manage Cities
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
							Cities list
						</h3>
						<span class="pull-right">
                            <a href="{{ URL::to('/admin/city/add') }}" style="color: #fff;" title="Add New City">
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
										<th>City Name</th>
										<th>City Full Name</th>
										<th>City Image</th>
										<th>Nearest Address</th>
										<th>Country Name</th>
										<th>Latitude</th>
										<th>Longitude</th>
										<th>Suggested Destination</th>
										<th>Priority</th>
										<th>Description</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@if(!empty($data))
										@foreach ($data as $index => $value)
											<tr>
												<td>{{ $index }}</td>
												<td>{{ $value['city_name'] }}</td>
												<td>{{ $value['city_full_name'] }}</td>
												<td>
													@if(isset($value['file_name']) AND !empty($value['file_name']))
														@foreach($value['file_name'] as $id => $filename)
															<img src="{{ asset('admin/assets/images/cities') . '/' . $filename }}" height="50" width="50">
														@endforeach
													@else
														Not added yet
													@endif
												</td>
												<td>{{ $value['nearest_address'] }}</td>
												<td>{{ $value['country_name'] }}</td>
												<td>{{ $value['latitude'] }}</td>
												<td>{{ $value['longitude'] }}</td>
												@if($value['suggested_destination'] == 1)
													<td style="color: #00B69C; font-weight: bold;">Yes</td>
												@else
													<td style="color: #FF9400;">No</td>
												@endif
												<td>{{ $value['priority'] }}</td>
												<td>{{ $value['description'] }}</td>
												<td>
													<a href="{{ URL::to('admin/city/' . $index . '/edit') }}"><i
															class="fa fa-fw fa-pencil text-warning" title="Edit"></i></a>
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