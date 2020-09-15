@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Tasks @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link href="{{ asset('admin/assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/custom_css/task.css') }}" rel="stylesheet" type="text/css">
    @stop
{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>Tasks</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>Tasks</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- To do list -->
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="todolist">
                                <header>
                                    <h3 class="panel-title">
                                        <img src=" {{ asset('admin/assets/img/flaticons/Graphic-Design-Tools-14.png') }}"  alt="img" width="30" height="30"> <b>Tasks</b>
                                    </h3>
                                </header>
                                <form class="row list_of_items">

                                </form>
                                <div class="todolist_list adds padding-15">
                                    {!! Form::open(['class'=>'form', 'id'=>'main_input_box']) !!}
                                    <div class="form-group">
                                        {!! Form::label('task_description', 'Task description: ') !!}
                                        {!! Form::text('task_description', null, ['class' => 'form-control','id'=>'task_description', 'required' => 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('task_deadline', 'Deadline: ') !!}
                                        {!! Form::text('task_deadline', null, ['class' => 'form-control datepicker', 'id'=>'task_deadline', 'data-date-format'=> 'YYYY/MM/DD', 'required' => 'required']) !!}
                                    </div>
                                    <button type="submit" class="btn btn-primary add_button">
                                        Add Task
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/moment/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom_js/task.js') }}" type="text/javascript"></script>
@stop