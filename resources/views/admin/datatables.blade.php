@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Data Tables @parent

@stop
    {{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />

<style>
    @media (max-width:425px){
        .table-responsive .dataTables_length,.table-responsive .dataTables_filter{
            margin-top:10px;
        }
    }
</style>
@stop
{{-- Page content --}}
@section('content')
    <section class="content-header">
                    <h1>Data Tables</h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-fw fa-home"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">Data Tables</a>
                        </li>
                        <li>
                            Data Tables
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
                                        <i class="fa fa-fw fa-bell-o"></i>
                                        Data Table
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="sample1">
                                        <thead>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet Explorer 4.0</td>
                                                <td>Win 95+</td>
                                                <td>4</td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet Explorer 5.0</td>
                                                <td>Win 95+</td>
                                                <td>5</td>
                                                <td>C</td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet Explorer 5.5</td>
                                                <td>Win 95+</td>
                                                <td>5.5</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet Explorer 6</td>
                                                <td>Win 98+</td>
                                                <td>6</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet Explorer 7</td>
                                                <td>Win XP SP2+</td>
                                                <td>7</td>
                                                <td>A</td>
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
                                                <td>Gecko</td>
                                                <td>Netscape 7.2</td>
                                                <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                <td>1.7</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Netscape Browser 8</td>
                                                <td>Win 98SE+</td>
                                                <td>1.7</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Netscape Navigator 9</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.0</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.1</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.1</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.2</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.2</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.3</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.3</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.4</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.4</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.5</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.5</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.6</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>1.6</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.7</td>
                                                <td>Win 98+ / OSX.1+</td>
                                                <td>1.7</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Mozilla 1.8</td>
                                                <td>Win 98+ / OSX.1+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Seamonkey 1.1</td>
                                                <td>Win 98+ / OSX.2+</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Epiphany 2.20</td>
                                                <td>Gnome</td>
                                                <td>1.8</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>Safari 1.2</td>
                                                <td>OSX.3</td>
                                                <td>125.5</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>Safari 1.3</td>
                                                <td>OSX.3</td>
                                                <td>312.8</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>Safari 2.0</td>
                                                <td>OSX.4+</td>
                                                <td>419.3</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>Safari 3.0</td>
                                                <td>OSX.4+</td>
                                                <td>522.1</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>OmniWeb 5.5</td>
                                                <td>OSX.4+</td>
                                                <td>420</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>iPod Touch / iPhone</td>
                                                <td>iPod</td>
                                                <td>420.1</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Webkit</td>
                                                <td>S60</td>
                                                <td>S60</td>
                                                <td>413</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 7.0</td>
                                                <td>Win 95+ / OSX.1+</td>
                                                <td>-</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 7.5</td>
                                                <td>Win 95+ / OSX.2+</td>
                                                <td>-</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 8.0</td>
                                                <td>Win 95+ / OSX.2+</td>
                                                <td>-</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 8.5</td>
                                                <td>Win 95+ / OSX.2+</td>
                                                <td>-</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 9.0</td>
                                                <td>Win 95+ / OSX.3+</td>
                                                <td>-</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 9.2</td>
                                                <td>Win 88+ / OSX.3+</td>
                                                <td>-</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera 9.5</td>
                                                <td>Win 88+ / OSX.3+</td>
                                                <td>-</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Opera for Wii</td>
                                                <td>Wii</td>
                                                <td>-</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Nokia N800</td>
                                                <td>N800</td>
                                                <td>-</td>
                                                <td>A</td>
                                            </tr>
                                            <tr>
                                                <td>Presto</td>
                                                <td>Nintendo DS browser</td>
                                                <td>Nintendo DS</td>
                                                <td>8.5</td>
                                                <td>
                                                    C/A <sup>1</sup>
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
                                        Show / Hide Columns
                                    </h3>
                                    <span class="pull-right">
                                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                                        <i class="fa fa-fw fa-times removepanel clickable"></i>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    <strong>Toggle column:</strong>
                                    <div class="btn-group">
                                        <button type="button" class="toggle-vis btn btn-primary" data-column="0">Name</button>
                                        <button type="button" class="toggle-vis btn btn-success" data-column="1">Position</button>
                                        <button type="button" class="toggle-vis btn btn-warning" data-column="2">Office</button>
                                        <button type="button" class="toggle-vis btn btn-success" data-column="3">Age</button>
                                        <button type="button" class="toggle-vis btn btn-primary" data-column="4">Start date</button>
                                        <button type="button" class="toggle-vis btn btn-warning" data-column="5">Salary</button>
                                    </div>
                                    <table id="example" class="table table-bordred table-striped display">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>

                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td>$170,750</td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td>$86,000</td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td>$433,060</td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td>$162,700</td>
                                            </tr>
                                            <tr>
                                                <td>Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2012/12/02</td>
                                                <td>$372,000</td>
                                            </tr>
                                            <tr>
                                                <td>Herrod Chandler</td>
                                                <td>Sales Assistant</td>
                                                <td>San Francisco</td>
                                                <td>59</td>
                                                <td>2012/08/06</td>
                                                <td>$137,500</td>
                                            </tr>
                                            <tr>
                                                <td>Rhona Davidson</td>
                                                <td>Integration Specialist</td>
                                                <td>Tokyo</td>
                                                <td>55</td>
                                                <td>2010/10/14</td>
                                                <td>$327,900</td>
                                            </tr>
                                            <tr>
                                                <td>Colleen Hurst</td>
                                                <td>Javascript Developer</td>
                                                <td>San Francisco</td>
                                                <td>39</td>
                                                <td>2009/09/15</td>
                                                <td>$205,500</td>
                                            </tr>
                                            <tr>
                                                <td>Sonya Frost</td>
                                                <td>Software Engineer</td>
                                                <td>Edinburgh</td>
                                                <td>23</td>
                                                <td>2008/12/13</td>
                                                <td>$103,600</td>
                                            </tr>
                                            <tr>
                                                <td>Jena Gaines</td>
                                                <td>Office Manager</td>
                                                <td>London</td>
                                                <td>30</td>
                                                <td>2008/12/19</td>
                                                <td>$90,560</td>
                                            </tr>
                                            <tr>
                                                <td>Quinn Flynn</td>
                                                <td>Support Lead</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2013/03/03</td>
                                                <td>$342,000</td>
                                            </tr>
                                            <tr>
                                                <td>Charde Marshall</td>
                                                <td>Regional Director</td>
                                                <td>San Francisco</td>
                                                <td>36</td>
                                                <td>2008/10/16</td>
                                                <td>$470,600</td>
                                            </tr>
                                            <tr>
                                                <td>Haley Kennedy</td>
                                                <td>Senior Marketing Designer</td>
                                                <td>London</td>
                                                <td>43</td>
                                                <td>2012/12/18</td>
                                                <td>$313,500</td>
                                            </tr>
                                            <tr>
                                                <td>Tatyana Fitzpatrick</td>
                                                <td>Regional Director</td>
                                                <td>London</td>
                                                <td>19</td>
                                                <td>2010/03/17</td>
                                                <td>$385,750</td>
                                            </tr>
                                            <tr>
                                                <td>Michael Silva</td>
                                                <td>Marketing Designer</td>
                                                <td>London</td>
                                                <td>66</td>
                                                <td>2012/11/27</td>
                                                <td>$198,500</td>
                                            </tr>
                                            <tr>
                                                <td>Paul Byrd</td>
                                                <td>Chief Financial Officer (CFO)</td>
                                                <td>New York</td>
                                                <td>64</td>
                                                <td>2010/06/09</td>
                                                <td>$725,000</td>
                                            </tr>
                                            <tr>
                                                <td>Gloria Little</td>
                                                <td>Systems Administrator</td>
                                                <td>New York</td>
                                                <td>59</td>
                                                <td>2009/04/10</td>
                                                <td>$237,500</td>
                                            </tr>
                                            <tr>
                                                <td>Bradley Greer</td>
                                                <td>Software Engineer</td>
                                                <td>London</td>
                                                <td>41</td>
                                                <td>2012/10/13</td>
                                                <td>$132,000</td>
                                            </tr>
                                            <tr>
                                                <td>Dai Rios</td>
                                                <td>Personnel Lead</td>
                                                <td>Edinburgh</td>
                                                <td>35</td>
                                                <td>2012/09/26</td>
                                                <td>$217,500</td>
                                            </tr>
                                            <tr>
                                                <td>Jenette Caldwell</td>
                                                <td>Development Lead</td>
                                                <td>New York</td>
                                                <td>30</td>
                                                <td>2011/09/03</td>
                                                <td>$345,000</td>
                                            </tr>
                                            <tr>
                                                <td>Yuri Berry</td>
                                                <td>Chief Marketing Officer (CMO)</td>
                                                <td>New York</td>
                                                <td>40</td>
                                                <td>2009/06/25</td>
                                                <td>$675,000</td>
                                            </tr>
                                            <tr>
                                                <td>Caesar Vance</td>
                                                <td>Pre-Sales Support</td>
                                                <td>New York</td>
                                                <td>21</td>
                                                <td>2011/12/12</td>
                                                <td>$106,450</td>
                                            </tr>
                                            <tr>
                                                <td>Doris Wilder</td>
                                                <td>Sales Assistant</td>
                                                <td>Sidney</td>
                                                <td>23</td>
                                                <td>2010/09/20</td>
                                                <td>$85,600</td>
                                            </tr>
                                            <tr>
                                                <td>Angelica Ramos</td>
                                                <td>Chief Executive Officer (CEO)</td>
                                                <td>London</td>
                                                <td>47</td>
                                                <td>2009/10/09</td>
                                                <td>$1,200,000</td>
                                            </tr>
                                            <tr>
                                                <td>Gavin Joyce</td>
                                                <td>Developer</td>
                                                <td>Edinburgh</td>
                                                <td>42</td>
                                                <td>2010/12/22</td>
                                                <td>$92,575</td>
                                            </tr>
                                            <tr>
                                                <td>Jennifer Chang</td>
                                                <td>Regional Director</td>
                                                <td>Singapore</td>
                                                <td>28</td>
                                                <td>2010/11/14</td>
                                                <td>$357,650</td>
                                            </tr>
                                            <tr>
                                                <td>Brenden Wagner</td>
                                                <td>Software Engineer</td>
                                                <td>San Francisco</td>
                                                <td>28</td>
                                                <td>2011/06/07</td>
                                                <td>$206,850</td>
                                            </tr>
                                            <tr>
                                                <td>Fiona Green</td>
                                                <td>Chief Operating Officer (COO)</td>
                                                <td>San Francisco</td>
                                                <td>48</td>
                                                <td>2010/03/11</td>
                                                <td>$850,000</td>
                                            </tr>
                                            <tr>
                                                <td>Shou Itou</td>
                                                <td>Regional Marketing</td>
                                                <td>Tokyo</td>
                                                <td>20</td>
                                                <td>2011/08/14</td>
                                                <td>$163,000</td>
                                            </tr>
                                            <tr>
                                                <td>Michelle House</td>
                                                <td>Integration Specialist</td>
                                                <td>Sidney</td>
                                                <td>37</td>
                                                <td>2011/06/02</td>
                                                <td>$95,400</td>
                                            </tr>
                                            <tr>
                                                <td>Suki Burks</td>
                                                <td>Developer</td>
                                                <td>London</td>
                                                <td>53</td>
                                                <td>2009/10/22</td>
                                                <td>$114,500</td>
                                            </tr>
                                            <tr>
                                                <td>Prescott Bartlett</td>
                                                <td>Technical Author</td>
                                                <td>London</td>
                                                <td>27</td>
                                                <td>2011/05/07</td>
                                                <td>$145,000</td>
                                            </tr>
                                            <tr>
                                                <td>Gavin Cortez</td>
                                                <td>Team Leader</td>
                                                <td>San Francisco</td>
                                                <td>22</td>
                                                <td>2008/10/26</td>
                                                <td>$235,500</td>
                                            </tr>
                                            <tr>
                                                <td>Martena Mccray</td>
                                                <td>Post-Sales support</td>
                                                <td>Edinburgh</td>
                                                <td>46</td>
                                                <td>2011/03/09</td>
                                                <td>$324,050</td>
                                            </tr>
                                            <tr>
                                                <td>Unity Butler</td>
                                                <td>Marketing Designer</td>
                                                <td>San Francisco</td>
                                                <td>47</td>
                                                <td>2009/12/09</td>
                                                <td>$85,675</td>
                                            </tr>
                                            <tr>
                                                <td>Howard Hatfield</td>
                                                <td>Office Manager</td>
                                                <td>San Francisco</td>
                                                <td>51</td>
                                                <td>2008/12/16</td>
                                                <td>$164,500</td>
                                            </tr>
                                            <tr>
                                                <td>Hope Fuentes</td>
                                                <td>Secretary</td>
                                                <td>San Francisco</td>
                                                <td>41</td>
                                                <td>2010/02/12</td>
                                                <td>$109,850</td>
                                            </tr>
                                            <tr>
                                                <td>Vivian Harrell</td>
                                                <td>Financial Controller</td>
                                                <td>San Francisco</td>
                                                <td>62</td>
                                                <td>2009/02/14</td>
                                                <td>$452,500</td>
                                            </tr>
                                            <tr>
                                                <td>Timothy Mooney</td>
                                                <td>Office Manager</td>
                                                <td>London</td>
                                                <td>37</td>
                                                <td>2008/12/11</td>
                                                <td>$136,200</td>
                                            </tr>
                                            <tr>
                                                <td>Jackson Bradshaw</td>
                                                <td>Director</td>
                                                <td>New York</td>
                                                <td>65</td>
                                                <td>2008/09/26</td>
                                                <td>$645,750</td>
                                            </tr>
                                            <tr>
                                                <td>Olivia Liang</td>
                                                <td>Support Engineer</td>
                                                <td>Singapore</td>
                                                <td>64</td>
                                                <td>2011/02/03</td>
                                                <td>$234,500</td>
                                            </tr>
                                            <tr>
                                                <td>Bruno Nash</td>
                                                <td>Software Engineer</td>
                                                <td>London</td>
                                                <td>38</td>
                                                <td>2011/05/03</td>
                                                <td>$163,500</td>
                                            </tr>
                                            <tr>
                                                <td>Sakura Yamamoto</td>
                                                <td>Support Engineer</td>
                                                <td>Tokyo</td>
                                                <td>37</td>
                                                <td>2009/08/19</td>
                                                <td>$139,575</td>
                                            </tr>
                                            <tr>
                                                <td>Thor Walton</td>
                                                <td>Developer</td>
                                                <td>New York</td>
                                                <td>61</td>
                                                <td>2013/08/11</td>
                                                <td>$98,540</td>
                                            </tr>
                                            <tr>
                                                <td>Finn Camacho</td>
                                                <td>Support Engineer</td>
                                                <td>San Francisco</td>
                                                <td>47</td>
                                                <td>2009/07/07</td>
                                                <td>$87,500</td>
                                            </tr>
                                            <tr>
                                                <td>Serge Baldwin</td>
                                                <td>Data Coordinator</td>
                                                <td>Singapore</td>
                                                <td>64</td>
                                                <td>2012/04/09</td>
                                                <td>$138,575</td>
                                            </tr>
                                            <tr>
                                                <td>Zenaida Frank</td>
                                                <td>Software Engineer</td>
                                                <td>New York</td>
                                                <td>63</td>
                                                <td>2010/01/04</td>
                                                <td>$125,250</td>
                                            </tr>
                                            <tr>
                                                <td>Zorita Serrano</td>
                                                <td>Software Engineer</td>
                                                <td>San Francisco</td>
                                                <td>56</td>
                                                <td>2012/06/01</td>
                                                <td>$115,000</td>
                                            </tr>
                                            <tr>
                                                <td>Jennifer Acosta</td>
                                                <td>Junior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>43</td>
                                                <td>2013/02/01</td>
                                                <td>$75,650</td>
                                            </tr>
                                            <tr>
                                                <td>Cara Stevens</td>
                                                <td>Sales Assistant</td>
                                                <td>New York</td>
                                                <td>46</td>
                                                <td>2011/12/06</td>
                                                <td>$145,600</td>
                                            </tr>
                                            <tr>
                                                <td>Hermione Butler</td>
                                                <td>Regional Director</td>
                                                <td>London</td>
                                                <td>47</td>
                                                <td>2011/03/21</td>
                                                <td>$356,250</td>
                                            </tr>
                                            <tr>
                                                <td>Lael Greer</td>
                                                <td>Systems Administrator</td>
                                                <td>London</td>
                                                <td>21</td>
                                                <td>2009/02/27</td>
                                                <td>$103,500</td>
                                            </tr>
                                            <tr>
                                                <td>Jonas Alexander</td>
                                                <td>Developer</td>
                                                <td>San Francisco</td>
                                                <td>30</td>
                                                <td>2010/07/14</td>
                                                <td>$86,500</td>
                                            </tr>
                                            <tr>
                                                <td>Shad Decker</td>
                                                <td>Regional Director</td>
                                                <td>Edinburgh</td>
                                                <td>51</td>
                                                <td>2008/11/13</td>
                                                <td>$183,000</td>
                                            </tr>
                                            <tr>
                                                <td>Michael Bruce</td>
                                                <td>Javascript Developer</td>
                                                <td>Singapore</td>
                                                <td>29</td>
                                                <td>2011/06/27</td>
                                                <td>$183,000</td>
                                            </tr>
                                            <tr>
                                                <td>Donna Snider</td>
                                                <td>Customer Support</td>
                                                <td>New York</td>
                                                <td>27</td>
                                                <td>2011/01/25</td>
                                                <td>$112,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    </section>
                <!-- /.content --> @stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.rowReorder.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('admin/assets/vendors/datatables/js/dataTables.scroller.js') }}" ></script>
        <script src="{{ asset('admin/assets/js/custom_js/datatables.js') }}" type="text/javascript"></script>
        @stop