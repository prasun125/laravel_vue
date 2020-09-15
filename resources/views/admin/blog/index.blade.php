@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Blogs List
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />

<style>
    @media (max-width:320px){
        .table-responsive .dataTables_length,.table-responsive .dataTables_filter{
            margin-top:10px;
        }
    }

</style>
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Blog List</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Blog</a></li>
            <li class="active">Blog List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left" style="margin-top: 4px !important;"><i class="fa fa-fw fa-book"></i>
                        Blog List
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/blog/create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <tr class="filters">
                            <th>@lang('blog/table.id')</th>
                            <th>@lang('blog/table.title')</th>
                            <th>@lang('blog/table.comments')</th>
                            <th>@lang('blog/table.created_at')</th>
                            <th>@lang('blog/table.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($blogs))
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->comments->count() }}</td>
                                    <td>{{ $blog->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ URL::to('admin/blog/' . $blog->id . '/show' ) }}"><i class="fa fa-fw fa-star text-primary" title="view blog &amp; comments"></i></a>
                                        <a href="{{ URL::to('admin/blog/' . $blog->id . '/edit' ) }}"><i class="fa fa-fw fa-pencil text-warning" title="update blog"></i></a>
                                        <a href="{{ route('admin.confirm-delete/blog', $blog->id) }}" data-toggle="modal" data-target="#delete_confirm"><i class="fa fa-fw fa-times text-danger" title="delete blog"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
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
@stop