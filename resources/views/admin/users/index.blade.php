@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
	@parent Manage Users
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
		<h1>
			Users
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{ URL::to('admin/dashboard') }}">
					<i class="fa fa-fw fa-home"></i>
					Dashboard
				</a>
			</li>
			<li><a href="">
					Users
				</a></li>
			<li>
				<a href="{{ URL::to('admin/users') }}">
					Manage Users
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
							<i class="fa fa-fw fa-users"></i>
							Users list
						</h3>
						<span class="pull-right">
							<a href="{{ URL::to('/admin/user/add') }}" style="color: #fff;" title="Add New User">
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
									<th>User ID</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email ID</th>
									<th>Role</th>
									<th>Actions</th>
								</tr>
								</thead>
								<tbody>
								@foreach ($data as $index => $value)
									<tr>
										<td>{{ $value['id'] }}</td>
										<td>{{ $value['first_name'] }}</td>
										<td>{{ $value['last_name'] }}</td>
										<td>{{ $value['email'] }}</td>
										<td>{{ $value['role'] }}</td>
										<td>
											@if(session()->get('id') != $value['id'])
												<a href="{{ URL::to('admin/user/' . $value['id'] . '/edit') }}">
													<i class="fa fa-fw fa-pencil text-warning" title="Edit"></i>
												</a>
											@endif
										</td>
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