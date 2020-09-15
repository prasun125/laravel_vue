@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Simple Tables @parent

@stop
@section('header_styles')
<style>
    table tbody tr td{
        vertical-align: middle !important;
    }
    table tbody tr td p{
        margin: 0;
    }
</style>
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                <h1>Simple Tables</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-fw fa-home"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Datatables</a>
                    </li>
                    <li>
                        Simple Table
                    </li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- First Basic Table strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-bell-o"></i>
                                    Basic Table
                                </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table" id="table1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                                <th>Gender</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Markotto</td>
                                                <td>Male</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>JacobThornton</td>
                                                <td>Male</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>Larrythe Bird</td>
                                                <td>Female</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Honey</td>
                                                <td>Honey Bird</td>
                                                <td>Honey Bird</td>
                                                <td>Female</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Peter</td>
                                                <td>Peter Bird</td>
                                                <td>Peter</td>
                                                <td>Male</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Jenny</td>
                                                <td>Jery</td>
                                                <td>Jenny jery</td>
                                                <td>Female</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Harry</td>
                                                <td>Bird</td>
                                                <td>Harrythe Bird</td>
                                                <td>Male</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- First Basic Table strats here-->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-bell-o"></i>
                                    Bordered Table
                                </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Airi Satou</td>
                                                <td>Kelly</td>
                                                <td>Satou124</td>
                                                <td>
                                                    <span class="label label-sm label-success">Approved</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Angelica</td>
                                                <td>Ramos</td>
                                                <td>Angelica343</td>
                                                <td>
                                                    <span class="label label-sm label-info">Pending</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Ashton</td>
                                                <td>Cox</td>
                                                <td>Cox111</td>
                                                <td>
                                                    <span class="label label-sm label-warning">Suspended</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Bradley</td>
                                                <td>Greer</td>
                                                <td>Bradley</td>
                                                <td>
                                                    <span class="label label-sm label-danger">Blocked</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Bradley</td>
                                                <td>Greer</td>
                                                <td>Bradley</td>
                                                <td>
                                                    <span class="label label-sm label-danger">Blocked</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Bradley</td>
                                                <td>Greer</td>
                                                <td>Bradley</td>
                                                <td>
                                                    <span class="label label-sm label-danger">Blocked</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Bradl</td>
                                                <td>light</td>
                                                <td>Bradley</td>
                                                <td>
                                                    <span class="label label-sm label-success">Approved</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- First Basic Table Ends Here-->

                <!-- Second Data Table Starts Here-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-bell-o"></i>
                                    Data Table with Action buttons
                                </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Joseph</td>
                                                <td>Lynch</td>
                                                <td>2021 K Street Northwest #300, Washington, DC 20006</td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Joseph</td>
                                                <td>Lynch</td>
                                                <td>2021 K Street Northwest #300, Washington, DC 20006</td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Joseph</td>
                                                <td>Lynch</td>
                                                <td>2021 K Street Northwest #300, Washington, DC 20006</td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-info btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Joseph</td>
                                                <td>Lynch</td>
                                                <td>2021 K Street Northwest #300, Washington, DC 20006</td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-warning btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Joseph</td>
                                                <td>Lynch</td>
                                                <td>2021 K Street Northwest #300, Washington, DC 20006</td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-info btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title custom_align" id="Heading">Edit Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input class="form-control " type="text" placeholder="Joseph"></div>
                                <div class="form-group">
                                    <input class="form-control " type="text" placeholder="Lynch"></div>
                                <div class="form-group">
                                    <textarea rows="2" class="form-control" placeholder="2021 K Street Northwest #300, Washington, DC 20006" style="resize: vertical;"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-ok-sign"></span>
                                    Update
                                </button>
                            </div>
                        </div>
                        <!-- /.modal-content --> </div>
                    <!-- /.modal-dialog --> </div>
                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title custom_align" id="Heading5">Delete this entry</h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-warning">
                                    <span class="glyphicon glyphicon-warning-sign"></span>&nbsp;
                                    Are you sure you want to delete this record ?
                                </div>
                            </div>
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-ok-sign"></span>
                                    Yes
                                </button>
                                <button type="button" class="btn btn-success" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span>
                                    No
                                </button>
                            </div>
                        </div>
                        <!-- /.modal-content --> </div>
                    <!-- /.modal-dialog --> </div>

                <!-- second row ends here -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-bell-o"></i>
                                    Basic Table 2
                                </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class Name</th>
                                            <th>Column</th>
                                            <th>Column</th>
                                            <th>Column</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="default">
                                            <td>1</td>
                                            <td>Default</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                        </tr>
                                        <tr class="success">
                                            <td>2</td>
                                            <td>success</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                        </tr>
                                        <tr class="warning">
                                            <td>3</td>
                                            <td>warning</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                        </tr>
                                        <tr class="danger">
                                            <td>4</td>
                                            <td>danger</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                        </tr>
                                        <tr class="warning">
                                            <td>5</td>
                                            <td>warning</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                        </tr>
                                        <tr class="success">
                                            <td>6</td>
                                            <td>success</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                        </tr>
                                        <tr class="default">
                                            <td>7</td>
                                            <td>Default</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                            <td>Column heading</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-bell-o"></i>
                                    Basic Table 3
                                </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                              <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Column</th>
                                                <th>Column</th>
                                                <th>Column</th>
                                                <th>Column</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td class="default">Default</td>
                                                <td class="success">success</td>
                                                <td class="warning">warning</td>
                                                <td class="danger">danger</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td class="default">Default</td>
                                                <td class="success">success</td>
                                                <td class="warning">warning</td>
                                                <td class="danger">danger</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td class="default">Default</td>
                                                <td class="success">success</td>
                                                <td class="warning">warning</td>
                                                <td class="danger">danger</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td class="default">Default</td>
                                                <td class="success">success</td>
                                                <td class="warning">warning</td>
                                                <td class="danger">danger</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td class="default">Default</td>
                                                <td class="success">success</td>
                                                <td class="warning">warning</td>
                                                <td class="danger">danger</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td class="default">Default</td>
                                                <td class="success">success</td>
                                                <td class="warning">warning</td>
                                                <td class="danger">danger</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td class="default">Default</td>
                                                <td class="success">success</td>
                                                <td class="warning">warning</td>
                                                <td class="danger">danger</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row span table ends here-->
                <!-- Fourth Basic Table Starts Here-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-fw fa-bell-o"></i>
                                    Responsive Table
                                </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>U</td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>AOL browser (AOL desktop)</td>
                                                <td>Win XP</td>
                                                <td>6</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Camino 1.0</td>
                                                <td>OSX.2+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Camino 1.5</td>
                                                <td>OSX.3+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Misc</td>
                                                <td>Dillo 0.8</td>
                                                <td>Embedded devices</td>
                                                <td>-</td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Epiphany 2.20</td>
                                                <td>Gnome</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Firefox 1.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td>1.7</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Firefox 1.5</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Firefox 2.0</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Firefox 3.0</td>
                                                <td>Win 2k+ / OSX.3+</td>
                                                <td>1.9</td>
                                                <td>A</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
  <script src="{{ asset('admin/assets/js/custom_js/simple-table.js') }}" type="text/javascript"></script>
    @stop