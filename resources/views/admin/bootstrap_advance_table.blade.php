@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')Bootstrap Advanced Tables @parent

@stop
{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('admin/assets/vendors/bootstrap-table/css/bootstrap-table.min.css') }}" rel="stylesheet">
<style>
    .open > .dropdown-menu {
        animation : none;
    }
    @media (max-width:320px){
        .pull-right.search{
            margin-right:5px;
        }
        .columns.columns-right{
            margin-right:5px;
        }

    }
</style>
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Advanced Tables</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa fa-fw fa-home"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">Bootstrap Tables</a>
        </li>
        <li>
            Bootstrap Advanced Tables
        </li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <!-- First Basic Table strats here-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-fw fa-bell-o"></i>
                        Table Card view
                    </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="table1" data-show-toggle="true" data-toggle="table" data-sort-order="asc" data-pagination="true" data-search="true" data-card-view="false">
                            <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">First name</th>
                                <th data-sortable="true">Last name</th>
                                <th data-sortable="true">User name</th>
                                <th data-sortable="true">Gender</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Mark Otto</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>Jacob Thornton</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>The bird</td>
                                <td>Larry the bird</td>
                                <td>Female</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Honey</td>
                                <td>The bird</td>
                                <td>Honey the bird</td>
                                <td>Female</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Peter</td>
                                <td>The bird</td>
                                <td>Peter bird</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Jenny</td>
                                <td>Jery</td>
                                <td>Jenny Jery</td>
                                <td>Female</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Harry</td>
                                <td>The bird</td>
                                <td>Harry the bird</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Peter</td>
                                <td>The bird</td>
                                <td>Peter the bird</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Jenny</td>
                                <td>Jery</td>
                                <td>Jenny Jery</td>
                                <td>Female</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Harry</td>
                                <td>The bird</td>
                                <td>Harry the bird</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Harry</td>
                                <td>The bird</td>
                                <td>Harry the bird</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Peter</td>
                                <td>The Bird</td>
                                <td>Peter the bird</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Jenny</td>
                                <td>Jery</td>
                                <td>Jenny Jery</td>
                                <td>Female</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Harry</td>
                                <td>The bird</td>
                                <td>Harry the bird</td>
                                <td>Male</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- First Basic Table strats here-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-fw fa-bell-o"></i>
                        Detail View
                    </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="table"
                               data-toggle="table"
                               data-height="460"
                               data-detail-view="true"
                               data-detail-formatter="detailFormatter"
                               data-url="../assets/json/student_data.json">
                            <thead>
                            <tr>
                                <th data-field="id">ID</th>
                                <th data-field="name">Student Name</th>
                                <th data-field="class">Student Class</th>
                            </tr>
                            </thead>
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
                        Row selector with Checkbox
                    </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div id="toolbar1">
                            <button id="button" class="btn btn-default">remove</button>
                        </div>
                        <table id="mytable1" class="table"
                               data-toggle="table"
                               data-toolbar="#toolbar1">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="id">First name</th>
                                <th>Last name</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td>Joseph</td>
                                <td>Lynch</td>
                                <td>2021 K Street Northwest #300, Washington, DC 20006</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Joseph</td>
                                <td>Lynch</td>
                                <td>2021 K Street Northwest #300, Washington, DC 20006</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Joseph</td>
                                <td>Lynch</td>
                                <td>2021 K Street Northwest #300, Washington, DC 20006</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Joseph</td>
                                <td>Lynch</td>
                                <td>2021 K Street Northwest #300, Washington, DC 20006</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Joseph</td>
                                <td>Lynch</td>
                                <td>2021 K Street Northwest #300, Washington, DC 20006</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- second row ends here -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-fw fa-bell-o"></i>
                        Table tools
                    </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table"  data-search="true"
                               data-show-refresh="true"
                               data-show-toggle="true"
                               data-show-columns="true"
                               data-toolbar="#toolbar">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>33</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Herrod Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td>59</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Rhona Davidson</td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td>55</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Colleen Hurst</td>
                                <td>Javascript Developer</td>
                                <td>San Francisco</td>
                                <td>39</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Sonya Frost</td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>23</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Jena Gaines</td>
                                <td>Office Manager</td>
                                <td>London</td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Quinn Flynn</td>
                                <td>Support Lead</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Charde Marshall</td>
                                <td>Regional Director</td>
                                <td>San Francisco</td>
                                <td>36</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Haley Kennedy</td>
                                <td>Senior Marketing Designer</td>
                                <td>London</td>
                                <td>43</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Tatyana Fitzpatrick</td>
                                <td>Regional Director</td>
                                <td>London</td>
                                <td>19</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-fw fa-bell-o"></i>
                        Multi sorting
                    </h3>
                                <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="table2" data-flat="true"
                               data-search="true"
                               data-show-columns="true"
                               data-show-multi-sort="true"
                               data-pagination="true"
                               data-sort-priority='[{"sortOrder":"desc"},{"sortOrder":"desc"}]'>
                            <thead>
                            <tr>
                                <th data-field="count" data-sortable="true">#</th>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-sortable="true">Position</th>
                                <th data-sortable="true">Office</th>
                                <th data-sortable="true">Age</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Airi Satou</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>33</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Herrod Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td>59</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Rhona Davidson</td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td>55</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Colleen Hurst</td>
                                <td>Javascript Developer</td>
                                <td>San Francisco</td>
                                <td>39</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Sonya Frost</td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>23</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Jena Gaines</td>
                                <td>Office Manager</td>
                                <td>London</td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>Quinn Flynn</td>
                                <td>Support Lead</td>
                                <td>Edinburgh</td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>Charde Marshall</td>
                                <td>Regional Director</td>
                                <td>San Francisco</td>
                                <td>36</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>Haley Kennedy</td>
                                <td>Senior Marketing Designer</td>
                                <td>London</td>
                                <td>43</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>Tatyana Fitzpatrick</td>
                                <td>Regional Director</td>
                                <td>London</td>
                                <td>19</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>Michael Silva</td>
                                <td>Marketing Designer</td>
                                <td>London</td>
                                <td>66</td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>Paul Byrd</td>
                                <td>Chief Financial Officer (CFO)</td>
                                <td>New York</td>
                                <td>64</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>Gloria Little</td>
                                <td>Systems Administrator</td>
                                <td>New York</td>
                                <td>59</td>
                            </tr>
                            <tr>
                                <td>19</td>
                                <td>Bradley Greer</td>
                                <td>Software Engineer</td>
                                <td>London</td>
                                <td>41</td>
                            </tr>
                            <tr>
                                <td>20</td>
                                <td>Dai Rios</td>
                                <td>Personnel Lead</td>
                                <td>Edinburgh</td>
                                <td>35</td>
                            </tr>
                            <tr>
                                <td>21</td>
                                <td>Jenette Caldwell</td>
                                <td>Development Lead</td>
                                <td>New York</td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>22</td>
                                <td>Yuri Berry</td>
                                <td>Chief Marketing Officer (CMO)</td>
                                <td>New York</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>23</td>
                                <td>Caesar Vance</td>
                                <td>Pre-Sales Support</td>
                                <td>New York</td>
                                <td>21</td>
                            </tr>
                            <tr>
                                <td>24</td>
                                <td>Doris Wilder</td>
                                <td>Sales Assistant</td>
                                <td>Sidney</td>
                                <td>23</td>
                            </tr>
                            <tr>
                                <td>25</td>
                                <td>Angelica Ramos</td>
                                <td>Chief Executive Officer (CEO)</td>
                                <td>London</td>
                                <td>47</td>
                            </tr>
                            <tr>
                                <td>26</td>
                                <td>Gavin Joyce</td>
                                <td>Developer</td>
                                <td>Edinburgh</td>
                                <td>42</td>
                            </tr>
                            <tr>
                                <td>27</td>
                                <td>Jennifer Chang</td>
                                <td>Regional Director</td>
                                <td>Singapore</td>
                                <td>28</td>
                            </tr>
                            <tr>
                                <td>28</td>
                                <td>Brenden Wagner</td>
                                <td>Software Engineer</td>
                                <td>San Francisco</td>
                                <td>28</td>
                            </tr>
                            <tr>
                                <td>29</td>
                                <td>Fiona Green</td>
                                <td>Chief Operating Officer (COO)</td>
                                <td>San Francisco</td>
                                <td>48</td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>Shou Itou</td>
                                <td>Regional Marketing</td>
                                <td>Tokyo</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>31</td>
                                <td>Michelle House</td>
                                <td>Integration Specialist</td>
                                <td>Sidney</td>
                                <td>37</td>
                            </tr>
                            <tr>
                                <td>32</td>
                                <td>Suki Burks</td>
                                <td>Developer</td>
                                <td>London</td>
                                <td>53</td>
                            </tr>
                            <tr>
                                <td>33</td>
                                <td>Prescott Bartlett</td>
                                <td>Technical Author</td>
                                <td>London</td>
                                <td>27</td>
                            </tr>
                            <tr>
                                <td>34</td>
                                <td>Gavin Cortez</td>
                                <td>Team Leader</td>
                                <td>San Francisco</td>
                                <td>22</td>
                            </tr>
                            <tr>
                                <td>35</td>
                                <td>Martena Mccray</td>
                                <td>Post-Sales support</td>
                                <td>Edinburgh</td>
                                <td>46</td>
                            </tr>
                            <tr>
                                <td>36</td>
                                <td>Unity Butler</td>
                                <td>Marketing Designer</td>
                                <td>San Francisco</td>
                                <td>47</td>
                            </tr>
                            <tr>
                                <td>37</td>
                                <td>Howard Hatfield</td>
                                <td>Office Manager</td>
                                <td>San Francisco</td>
                                <td>51</td>
                            </tr>
                            <tr>
                                <td>38</td>
                                <td>Hope Fuentes</td>
                                <td>Secretary</td>
                                <td>San Francisco</td>
                                <td>41</td>
                            </tr>
                            <tr>
                                <td>39</td>
                                <td>Vivian Harrell</td>
                                <td>Financial Controller</td>
                                <td>San Francisco</td>
                                <td>62</td>
                            </tr>
                            <tr>
                                <td>40</td>
                                <td>Timothy Mooney</td>
                                <td>Office Manager</td>
                                <td>London</td>
                                <td>37</td>
                            </tr>
                            <tr>
                                <td>41</td>
                                <td>Jackson Bradshaw</td>
                                <td>Director</td>
                                <td>New York</td>
                                <td>65</td>
                            </tr>
                            <tr>
                                <td>42</td>
                                <td>Olivia Liang</td>
                                <td>Support Engineer</td>
                                <td>Singapore</td>
                                <td>64</td>
                            </tr>
                            <tr>
                                <td>43</td>
                                <td>Bruno Nash</td>
                                <td>Software Engineer</td>
                                <td>London</td>
                                <td>38</td>
                            </tr>
                            <tr>
                                <td>44</td>
                                <td>Sakura Yamamoto</td>
                                <td>Support Engineer</td>
                                <td>Tokyo</td>
                                <td>37</td>
                            </tr>
                            <tr>
                                <td>45</td>
                                <td>Thor Walton</td>
                                <td>Developer</td>
                                <td>New York</td>
                                <td>61</td>
                            </tr>
                            <tr>
                                <td>46</td>
                                <td>Finn Camacho</td>
                                <td>Support Engineer</td>
                                <td>San Francisco</td>
                                <td>47</td>
                            </tr>
                            <tr>
                                <td>47</td>
                                <td>Serge Baldwin</td>
                                <td>Data Coordinator</td>
                                <td>Singapore</td>
                                <td>64</td>
                            </tr>
                            <tr>
                                <td>48</td>
                                <td>Zenaida Frank</td>
                                <td>Software Engineer</td>
                                <td>New York</td>
                                <td>63</td>
                            </tr>
                            <tr>
                                <td>49</td>
                                <td>Zorita Serrano</td>
                                <td>Software Engineer</td>
                                <td>San Francisco</td>
                                <td>56</td>
                            </tr>
                            <tr>
                                <td>50</td>
                                <td>Jennifer Acosta</td>
                                <td>Junior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td>43</td>
                            </tr>
                            <tr>
                                <td>51</td>
                                <td>Cara Stevens</td>
                                <td>Sales Assistant</td>
                                <td>New York</td>
                                <td>46</td>
                            </tr>
                            <tr>
                                <td>52</td>
                                <td>Hermione Butler</td>
                                <td>Regional Director</td>
                                <td>London</td>
                                <td>47</td>
                            </tr>
                            <tr>
                                <td>53</td>
                                <td>Lael Greer</td>
                                <td>Systems Administrator</td>
                                <td>London</td>
                                <td>21</td>
                            </tr>
                            <tr>
                                <td>54</td>
                                <td>Jonas Alexander</td>
                                <td>Developer</td>
                                <td>San Francisco</td>
                                <td>30</td>
                            </tr>
                            <tr>
                                <td>55</td>
                                <td>Shad Decker</td>
                                <td>Regional Director</td>
                                <td>Edinburgh</td>
                                <td>51</td>
                            </tr>
                            <tr>
                                <td>56</td>
                                <td>Michael Bruce</td>
                                <td>Javascript Developer</td>
                                <td>Singapore</td>
                                <td>29</td>
                            </tr>
                            <tr>
                                <td>57</td>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>New York</td>
                                <td>27</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('admin/assets/vendors/bootstrap-table/js/bootstrap-table.min.js') }}" ></script>
<script src="{{ asset('admin/assets/vendors/bootstrap-table/js/bootstrap-table-multiple-sort.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom_js/bs-advtable.js') }}"></script>
@stop