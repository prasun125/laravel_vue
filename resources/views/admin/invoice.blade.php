@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Invoice@parent

@stop
    {{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('admin/assets/css/custom_css/invoice.css') }}" rel="stylesheet" type="text/css"/>
    @stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>Invoice</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li><a href="#">Pages</a></li>
                        <li>
                            Invoice
                        </li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content paddingleft_right15">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-right">
                                <ul class="list-inline colors">
                                    <li class="bg-default"></li>
                                    <li class="bg-primary"></li>
                                    <li class="bg-success"></li>
                                    <li class="bg-warning"></li>
                                    <li class="bg-danger"> </li>
                                    <li class="bg-info"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="{{ asset('admin/assets/img/invoice_logo.png') }}" class="img-responsive pull-left">
                            <div class="pull-right">
                                <h4><strong>Invoice to:</strong></h4>
                                <address style="margin-right: 45px;">
                                    <p>JacobThornton, Thornton</p>
                                    <p>172 Willis Avenue</p>
                                    <p>Welaka, FL 32093</p>
                                </address>
                            </div>
                        </div>
                    </div>
                    <div style="padding:10px 0;color:#fff;" class="bg-primary" id="invoice">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-left">
                                    <h4><strong>Invoice from:</strong></h4>
                                    <p >Mark</p>
                                    <p>234 Laurier Avenue West</p>
                                    <p>K1A 0G9 Ottawa</p>
                                    <p >Canada</p>
                                    <p>(+121) 123 456 789 </p>
                                    <p><a href="#" style="color:#fff;">Markotto@example.com</a></p>
                                </div>
                                <div class="pull-right mar-top">
                                    <h4><strong>Invoice #: ILE1473</strong></h4>
                                    <h4>Date: 12/20/2016</h4>
                                    <h5>Payment Terms: 15days</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                <tr class="text-center bg-primary" id="t-head">
                                    <th>S.No.</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> 1.</td>
                                    <td>Calcium Carbonate Dical-s</td>
                                    <td>100Kgs</td>
                                    <td>$7.50</td>
                                    <td>$750.00</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Hydralated Magnesium Talc</td>
                                    <td>500Kgs</td>
                                    <td>$10.00</td>
                                    <td>$5000.00</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Anti Block Finawax-E</td>
                                    <td>800Kgs</td>
                                    <td>$5.00</td>
                                    <td>$4000.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sub Total</td>
                                    <td>$9750.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Tax(10.2)</td>
                                    <td>$994.50</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Discount(5%)</td>
                                    <td>$537.22</td>
                                </tr>
                                <tr class="bg-primary" id="t-total">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><h4>Grand Total</h4></td>
                                    <td><h4>$10207.28</h4></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-left">
                                <h4><strong>Payment Details</strong></h4>
                                <p>Kayin Bank</p>
                                <p>Bank/Sort code: 32-25-85</p>
                                <p>Account Number: 54257963</p>
                                <p>Payment Reference: INV001</p>
                            </div>
                            <div class="pull-right">
                                <h4><strong>Other Information</strong></h4>
                                <p>Company Registration Number:254798621</p>
                                <p>Contact/PO:PO5876452</p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix text-center sam">
                        <a class="btn btn-primary" onclick="javascript:window.print();">
                            <i class="livicon" data-name="printer" data-size="16" data-loop="true"
                               data-c="#fff" data-hc="white" style="position:relative;top:3px;"></i>
                            Print
                        </a>

                        <a href="" class="btn btn-primary">
                            <i class="fa fa-angle-right"></i>
                            Send invoice
                        </a>
                    </div>
                    <hr>
                    <h4 class="text-center"> Thank you for your Business</h4>
                   </section>
    @stop

            <!-- ./wrapper -->
    @section('footer_scripts')
    <script src="{{ asset('admin/assets/js/custom_js/invoice.js')}}" type="text/javascript"></script>
    <!-- end of page level js -->
@stop