@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')X-Editable @parent

@stop
{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/x-editable/css/typeahead.js-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/custom_css/inlinedit.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>X-Editable</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Forms</a></li>
            <li>
               X-Editable
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-fw fa-eyedropper"></i>
                            X-Editable
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label>Auto-open next field</label>
                                    <input class="custom_icheck" type="checkbox" id="autoopen" />
                                    <button id="enable" class="btn btn-success btn-sm">Enable / Disable</button>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <form method="get" id="frm" class="form-inline" action="#">
                                    <div class="form-group">
                                        <label>Mode</label>
                                        <select name="c" id="c" class="form-control input-sm select_inline">
                                            <option value="popup">Popup</option>
                                            <option value="inline">Inline</option>
                                        </select>
                                        <button type="submit" class="btn btn-responsive btn-warning btn-sm">refresh</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table id="user" class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <td>Simple text field</td>
                                <td>
                                    <a href="#" id="username" data-type="text" data-pk="1" data-title="Enter username" class="editable editable-click" data-original-title="" title="">superuser</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Empty text field, required</td>
                                <td>
                                    <a href="#" id="firstname" data-type="text" data-pk="1" data-placement="top" data-placeholder="Required" data-title="Enter your firstname" class="editable editable-click editable-empty" data-original-title="" title="">Change It</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Select, local array, custom display</td>
                                <td>
                                    <a href="#" id="sex" data-type="select" data-pk="1" data-value="" data-title="Select sex" class="editable editable-click" data-original-title="" title="" select="Male">not selected</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Select, remote array, no buttons</td>
                                <td>
                                    <a href="#" id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-title="Select group" class="editable editable-click" data-original-title="" title="">Admin</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Select, error while loading</td>
                                <td>
                                    <a href="#" id="status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-title="Select status" class="editable editable-click">Active</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Combodate (date)</td>
                                <td>
                                    <a href="#" id="dob" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth" class="editable editable-click">15/05/1984</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Combodate (datetime)</td>
                                <td>
                                    <a href="#" id="event" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1" data-placement="top" data-title="Setup event date and time" class="editable editable-click editable-empty">Empty</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Textarea</td>
                                <td>
                                    <a href="#" id="comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments" class="editable editable-pre-wrapped editable-click">awesome user!</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Twitter typeahead.js</td>
                                <td>
                                    <a href="#" id="state2" data-type="typeaheadjs" data-pk="1" data-placement="top" data-title="Start typing State.." class="editable editable-click">California</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Checklist</td>
                                <td>
                                    <a href="#" id="fruits" data-type="checklist" data-value="2,3" data-title="Select fruits" class="editable editable-click">
                                        peach
                                        <br>apple</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Custom input, several fields</td>
                                <td>
                                    <a id="address" data-type="address" data-pk="1" data-title="Please, fill address" class="editable editable-click" data-original-title="" title=""> <b>Moscow</b>
                                        , Lenina st., bld. 12
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('admin/assets/vendors/jquery-mockjax/js/jquery.mockjax.js') }}" ></script>
    <script src="{{ asset('admin/assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('admin/assets/vendors/x-editable/js/bootstrap-editable.js') }}" ></script>
    <script src="{{ asset('admin/assets/vendors/x-editable/js/typeahead.js') }}" ></script>
    <script src="{{ asset('admin/assets/vendors/x-editable/js/typeaheadjs.js') }}" ></script>
    <script src="{{ asset('admin/assets/vendors/x-editable/js/address.js') }}" ></script>
    <script src="{{ asset('admin/assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom_js/demo-mock.js') }}" ></script>
    <script src="{{ asset('admin/assets/js/custom_js/demo.js') }}" ></script>
    <script src="{{ asset('admin/assets/js/custom_js/x-editable.js') }}"></script>
@stop