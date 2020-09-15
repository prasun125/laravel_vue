@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Nestable List @parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <!-- font Awesome -->
<link href="{{ asset('admin/assets/css/custom_css/nestable_list.css') }}" rel="stylesheet">
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                <h1>
                    Nestable List
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-fw fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            UI features
                        </a>
                    </li>
                    <li>
                        Nestable List

                    </li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="margin-bottom: 10px !important;" id="nestable_list_menu">
                                <button type="button" class="btn btn-success" data-action="expand-all">
                                    [+] Expand All
                                </button>
                                <button type="button" class="btn btn-warning" data-action="collapse-all">
                                    [-] Collapse All
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-gear"></i>
                                        Nestable List 1
                                    </h3>
                                </div>
                                <div class="panel-body ">
                                    <div class="dd" id="nestable_list_1">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="1">
                                                <div class="dd-handle">Item 1</div>
                                            </li>
                                            <li class="dd-item" data-id="2">
                                                <div class="dd-handle">Item 2</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="3">
                                                        <div class="dd-handle">Item 3</div>
                                                    </li>
                                                    <li class="dd-item" data-id="4">
                                                        <div class="dd-handle">Item 4</div>
                                                    </li>
                                                    <li class="dd-item" data-id="5">
                                                        <div class="dd-handle">Item 5</div>
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="6">
                                                                <div class="dd-handle">Item 6</div>
                                                            </li>
                                                            <li class="dd-item" data-id="7">
                                                                <div class="dd-handle">Item 7</div>
                                                            </li>
                                                            <li class="dd-item" data-id="8">
                                                                <div class="dd-handle">Item 8</div>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li class="dd-item" data-id="9">
                                                        <div class="dd-handle">Item 9</div>
                                                    </li>
                                                    <li class="dd-item" data-id="10">
                                                        <div class="dd-handle">Item 10</div>
                                                    </li>
                                                </ol>
                                            </li>
                                            <li class="dd-item" data-id="11">
                                                <div class="dd-handle">Item 11</div>
                                            </li>
                                            <li class="dd-item" data-id="12">
                                                <div class="dd-handle">Item 12</div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="fa fa-fw fa-gear"></i>
                                        Nestable List 2
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="dd" id="nestable_list_2">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="13">
                                                <div class="dd-handle">Item 13</div>
                                            </li>
                                            <li class="dd-item" data-id="14">
                                                <div class="dd-handle">Item 14</div>
                                            </li>
                                            <li class="dd-item" data-id="15">
                                                <div class="dd-handle">Item 15</div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="16">
                                                        <div class="dd-handle">Item 16</div>
                                                    </li>
                                                    <li class="dd-item" data-id="17">
                                                        <div class="dd-handle">Item 17</div>
                                                    </li>
                                                    <li class="dd-item" data-id="18">
                                                        <div class="dd-handle">Item 18</div>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-gear"></i>
                                    Nestable List 3
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="dd" id="nestable_list_3">
                                    <ol class="dd-list">
                                        <li class="dd-item dd3-item" data-id="13">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">Item 13</div>
                                        </li>
                                        <li class="dd-item dd3-item" data-id="14">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">Item 14</div>
                                        </li>
                                        <li class="dd-item dd3-item" data-id="15">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">Item 15</div>
                                            <ol class="dd-list">
                                                <li class="dd-item dd3-item" data-id="16">
                                                    <div class="dd-handle dd3-handle"></div>
                                                    <div class="dd3-content">Item 16</div>
                                                </li>
                                                <li class="dd-item dd3-item" data-id="17">
                                                    <div class="dd-handle dd3-handle"></div>
                                                    <div class="dd3-content">Item 17</div>
                                                </li>
                                                <li class="dd-item dd3-item" data-id="18">
                                                    <div class="dd-handle dd3-handle"></div>
                                                    <div class="dd3-content">Item 18</div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </section>
            <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/nestable-list/jquery.nestable.js') }}"></script>
   <script src="{{ asset('admin/assets/js/custom_js/nestable.js') }}" type="text/javascript"></script>
    @stop