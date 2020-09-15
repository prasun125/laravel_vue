@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
    @lang('admin/groups/title.create') :: @parent
@stop

{{-- Content --}}
@section('content')

    <section class="content-header">
        <h1>
            @lang('groups/title.create')
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Groups</a></li>
            <li class="active">
                @lang('groups/title.create')
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h4 class="panel-title"> <i class="fa fa-fw fa-users"></i>
                            @lang('groups/title.create')
                        </h4>
                    </div>
                    <div class="panel-body">
                        {!! $errors->first('slug', '<span class="help-block">Another role with same slug exists, please choose another name</span> ') !!}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="post" action="">
                            <!-- CSRF Token -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="form-group {{ $errors->
                            first('name', 'has-error') }}">
                                <label for="title" class="col-sm-2 control-label">
                                    @lang('groups/form.name') *
                                </label>
                                <div class="col-sm-5">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Group Name"
                                           value="{!! old('name') !!}">
                                    {!! $errors->first('name', '<span class="help-block">:message</span> ') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-4">
                                    <a class="btn btn-danger" href="{{ route('admin.groups.index') }}">
                                        @lang('button.cancel')
                                    </a>
                                    <button type="submit" class="btn btn-success">
                                        @lang('button.save')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- row-->
    </section>
@stop