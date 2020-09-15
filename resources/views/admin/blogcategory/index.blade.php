@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
@lang('blogcategory/title.management')
@parent
@stop

@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
@stop

{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>@lang('blogcategory/title.management')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa fa-fw fa-home"></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="#">
                Blog
            </a>
        </li>
        <li class="active"> Blog Category List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left" style="margin-top: 6px;">
                        <i class="fa fa-fw fa-list"></i>
                        Blog Categories List
                    </h4>
                    <div class="pull-right">
                    <a href="{{ URL::to('admin/blogcategory/create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('blogcategory/table.id')</th>
                                    <th>@lang('blogcategory/table.name')</th>
                                    <th>@lang('blogcategory/table.blogs')</th>
                                    <th>@lang('blogcategory/table.created_at')</th>
                                    <th>@lang('blogcategory/table.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($blogscategories))
                                @foreach ($blogscategories as $bcategory)
                                    <tr>
                                        <td>{!! $bcategory->id !!}</td>
                                        <td>{!! $bcategory->title !!}</td>
                                        <td>{!! $bcategory->blog()->count() !!}</td>
                                        <td>{!! $bcategory->created_at->diffForHumans() !!}</td>
                                        <td>
                                            <a href="{!! URL::to('admin/blogcategory/' . $bcategory->id . '/edit' ) !!}"><i class="fa fa-fw fa-pencil text-warning" title="update blog category name"></i></a>

                                            @if($bcategory->blog()->count())
                                                <a href="#" data-toggle="modal" data-target="#blogcategory_exists" data-name="{!! $bcategory->title !!}" class="blogcategory_exists">
                                                    <i class="fa fa-fw fa-info text-warning" title="info"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.confirm-delete/blogcategory', $bcategory->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                                    <i class="fa fa-fw fa-times text-danger" title="Delete"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- row-->
</section>

@stop
{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="blogcategory_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div class="modal fade" id="blogcategory_exists" tabindex="-2" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    @lang('blogcategory/message.blogcategory_have_blog')
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});
        $(document).on("click", ".blogcategory_exists", function () {

            var group_name = $(this).data('name');
            $(".modal-header h4").text( group_name+" blog category" );
        });</script>
@stop
