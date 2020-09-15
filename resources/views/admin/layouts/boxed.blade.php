<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            | Chandra Admin Template
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/custom_css/chandra.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/custom_css/metisMenu.css') }}"  rel="stylesheet" type="text/css"/>
    <link href="{{ asset('admin/assets/css/custom_css/panel.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>
<body class="boxed">
    <!-- header logo: style can be found in header-->
    <header class="header">
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="{{ route('admin.dashboard')}}" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <img src="{{ asset('admin/assets/img/logo.png') }}" alt="logo" />
            </a>
            <!-- Header Navbar: style can be found in header-->
            <!-- Sidebar toggle button-->
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i class="fa fa-fw fa-hand-o-left"></i>
                </a>
            </div>

            <div class="navbar-right">
                <ul class="nav navbar-nav">

                    {{-- messages --}}
                    @include('admin.layouts._messages')

                    {{-- tasks --}}
                    @include('admin.layouts._tasks')

                    {{-- notifications --}}
                    @include('admin.layouts._notifications')

                    {{-- User Account --}}
                    @include('admin.layouts._user_menu')

                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar-->
            <section class="sidebar">
                <div id="menu" role="navigation">

                    {{-- user bio --}}
                    @include('admin.layouts._left_bio')

                    <ul class="navigation">
                        <li {{ (Request::is('admin') ? 'class=active' : '') }}>
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="menu-icon fa fa-fw fa-home"></i>
                                <span class="mm-text ">Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-dropdown {{(Request::is('admin/ajaxDatatables') || Request::is('admin/editable_datatables') || Request::is('admin/dropzone') || Request::is('admin/multiplefile_upload')? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-fw fa-gears"></i>
                                <span>Laravel Examples</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/ajaxDatatables') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/ajaxDatatables') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Ajax Data Tables
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/editable_datatables') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/editable_datatables') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Editable Datatables
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/dropzone') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/dropzone') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Drop Zone
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/multiplefile_upload') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/multiplefile_upload') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Multiple File Upload
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {{ (Request::is('admin/generator_builder') ? 'class=active' : '') }}>
                            <a href="{{ URL::to('admin/generator_builder') }}">
                                <i class=" menu-icon fa fa-fw fa-anchor"></i>
                                <span>Generator Builder</span>
                            </a>
                        </li>
                        <li class="menu-dropdown {{ (Request::is('admin/groups') || Request::is('admin/groups/create') || Request::is('admin/groups/*') ? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon  fa fa-fw fa-users"></i>
                                <span>Groups</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/groups') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/groups') }}">
                                        <i class="fa fa-fw fa-users"></i>
                                        Groups
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/groups/create') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/groups/create') }}">
                                        <i class="fa fa-fw fa-user"></i>
                                        Add New Group
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown  {!! ((Request::is('admin/blogcategory') || Request::is('admin/blogcategory/create') || Request::is('admin/blog') ||  Request::is('admin/blog/create')) || Request::is('admin/blog/*') || Request::is('admin/blogcategory/*') ? 'active' : '') !!}">
                            <a href="#">
                                <i class="menu-icon fa fa-fw fa-newspaper-o"></i>
                                <span class="title">Blog</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {!! (Request::is('admin/blogcategory') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('admin/blogcategory') }}">
                                    <i class="fa fa-fw fa-list"></i>
                                    Blog Category List
                                </a>
                                </li>
                                <li {!! (Request::is('admin/blog') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('admin/blog') }}">
                                    <i class="fa fa-fw fa-th-list"></i>
                                    Blog List
                                </a>
                                </li>
                                <li {!! (Request::is('admin/blog/create') ? 'class="active"' : '') !!}>
                                <a href="{{ URL::to('admin/blog/create') }}">
                                    <i class="fa fa-fw fa-pencil-square-o"></i>
                                    Add New Blog
                                </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown {{ (Request::is('admin/charts') || Request::is('admin/flot_charts') || Request::is('admin/nvd3_charts') || Request::is('admin/chartjs_charts') ? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-bar-chart-o"></i>
                                <span>Charts</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/flot_charts') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/flot_charts') }}">
                                        <i class="fa fa-fw fa-area-chart"></i>
                                        Flot Charts
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/nvd3_charts') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/nvd3_charts') }}">
                                        <i class="fa fa-fw fa-line-chart"></i>
                                        NVD3 Charts
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/chartjs_charts') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/chartjs_charts') }}">
                                        <i class="menu-icon fa fa-bar-chart-o"></i>
                                        Chart js
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown {{ (Request::is('admin/form_elements') || Request::is('admin/form_builder') ||  Request::is('admin/form_editors') || Request::is('admin/form_validations') || Request::is('admin/form_layouts') || Request::is('admin/form_wizards') || Request::is('admin/x-editable') ? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-check-square"></i>
                                <span>Forms</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/form_elements') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/form_elements') }}">
                                        <i class="fa fa-fw fa-fire"></i>
                                        Form Elements
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/form_builder') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/form_builder') }}">
                                        <i class="fa fa-fw fa-image"></i>
                                        Form Builder
                                    </a>
                                </li>

                                <li {{ (Request::is('admin/form_editors') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/form_editors') }}">
                                        <i class="fa fa-fw fa-file-text-o"></i>
                                        Form Editors
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/form_validations') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/form_validations') }}">
                                        <i class="fa fa-fw fa-warning"></i>
                                        Form Validations
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/form_layouts') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/form_layouts') }}">
                                        <i class="fa fa-fw fa-fire"></i>
                                        Form Layouts
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/form_wizards') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/form_wizards') }}">
                                        <i class="fa fa-fw fa-cog"></i>
                                        Form Wizards
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/x-editable') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/x-editable') }}">
                                        <i class="fa fa-fw fa-eyedropper"></i>
                                        X-editable
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-dropdown {{ (Request::is('admin/general_components') || Request::is('admin/pickers') || Request::is('admin/buttons') || Request::is('admin/panels') || Request::is('admin/tabs_accordions') || Request::is('admin/font_icons') || Request::is('admin/grid_layout') || Request::is('admin/tags_input') || Request::is('admin/nestable_list') || Request::is('admin/toastr_notifications') || Request::is('admin/session_timeout') || Request::is('admin/draggable_portlets') || Request::is('admin/draggable_portlets2') ? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-desktop"></i>
                                <span>
                                    UI Features
                                </span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/general_components') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/general_components') }}">
                                        <i class="fa fa-fw fa-plug"></i>
                                        General Components
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/pickers') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/pickers') }}">
                                        <i class="fa fa-fw fa-paint-brush"></i>
                                        Pickers
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/buttons') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/buttons') }}">
                                        <i class="fa fa-fw fa-delicious"></i>
                                        Buttons
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/panels') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/panels') }}">
                                        <i class="fa fa-fw fa-gift"></i>
                                        Panels
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/tabs_accordions') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/tabs_accordions') }}">
                                        <i class="fa fa-fw fa-copy"></i>
                                        Tabs &amp; Accordions
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/font_icons') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/font_icons') }}">
                                        <i class="fa fa-fw fa-font"></i>
                                        Font Icons
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/grid_layout') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/grid_layout') }}">
                                        <i class="fa fa-fw fa-columns"></i>
                                        Grid Layout
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/tags_input') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/tags_input') }}">
                                        <i class="fa fa-fw fa-tag"></i>
                                        Tags Input
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/nestable_list') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/nestable_list') }}">
                                        <i class="fa fa-fw fa-navicon"></i>
                                        Nestable List
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/toastr_notifications') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/toastr_notifications') }}">
                                        <i class="fa fa-fw fa-desktop"></i>
                                        Toastr Notifications
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/session_timeout') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/session_timeout') }}">
                                        <i class="fa fa-fw fa-rocket"></i>
                                        Session Timeout
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/draggable_portlets') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/draggable_portlets') }}">
                                        <i class="fa fa-fw fa-random"></i>
                                        Draggable Portlets
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/draggable_portlets2') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/draggable_portlets2') }}">
                                        <i class="fa fa-fw fa-anchor"></i>
                                        Draggable Portlets2
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-dropdown {{ (Request::is('admin/timeline') || Request::is('admin/transitions') || Request::is('admin/circle_sliders') ? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-briefcase"></i>
                                <span>
                                    UI Components
                                </span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">

                                <li {{ (Request::is('admin/timeline') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/timeline') }}">
                                        <i class="fa fa-fw fa-clock-o"></i>
                                        Timeline
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/transitions') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/transitions') }}">
                                        <i class="fa fa-fw fa-star-half-empty"></i>
                                        Transitions
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/circle_sliders') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/circle_sliders') }}">
                                        <i class="fa fa-fw fa-sun-o"></i>
                                        Circle Sliders
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown  {{ (Request::is('admin/create_table') || Request::is('admin/simple_tables') || Request::is('admin/datatables') || Request::is('admin/advanced_datatables') ? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-table"></i>
                                <span>DataTables</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/create_table') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/create_table') }}">
                                        <i class="fa fa-fw fa-dedent"></i>
                                        Create tables
                                    </a>
                                </li>

                                <li {{ (Request::is('admin/simple_tables') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/simple_tables') }}">
                                        <i class="fa fa-fw fa-tasks"></i>
                                        Simple tables
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/datatables') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/datatables') }}">
                                        <i class="fa fa-fw fa-database"></i>
                                        Data Tables
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/advanced_datatables') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/advanced_datatables') }}">
                                        <i class="fa fa-fw fa-table"></i>
                                        Advanced Tables
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-dropdown {{ (Request::is('admin/bootstrap_simple_table') || Request::is('admin/bootstrap_advance_table') || Request::is('admin/bootstrap_edit_table') || Request::is('admin/bootstrap_responsive_table') ? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-table"></i>
                                <span>Bootstrap Tables</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/bootstrap_simple_table') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/bootstrap_simple_table') }}">
                                        <i class="fa fa-fw fa-align-justify"></i>
                                        Basic tables
                                    </a>
                                </li>

                                <li {{ (Request::is('admin/bootstrap_advance_table') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/bootstrap_advance_table') }}">
                                        <i class="fa fa-fw fa-tasks"></i>
                                        Advanced tables
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/bootstrap_edit_table') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/bootstrap_edit_table') }}">
                                        <i class="fa fa-fw fa-database"></i>
                                        Editable Tables
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/bootstrap_responsive_table') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/bootstrap_responsive_table') }}">
                                        <i class="fa fa-fw fa-external-link-square"></i>
                                        Responsive Tables
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li {{ (Request::is('admin/calendar') ? 'class=active' : '') }}>
                            <a href="{{ URL::to('admin/calendar') }}">
                                <i class=" menu-icon fa fa-fw fa-calendar"></i>
                                <span>Calendar</span>
                                <small class="badge badge1">7</small>
                            </a>
                        </li>
                        <li class="menu-dropdown {{ (Request::is('admin/mail_box') || Request::is('admin/compose') || Request::is('admin/view_mail') ? 'active' : '') }}">
                            <a href="#">
                               <i class="fa fa-fw fa-envelope"></i> 
                                <span>Email</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/mail_box') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/mail_box') }}">
                                        <i class="fa fa-inbox"></i>
                                     Mail box
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/compose') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/compose') }}">
                                       <i class="fa fa-pencil"></i>
                                        Compose Message
                                    </a>
                                </li>
                                 <li {{ (Request::is('admin/view_mail') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/view_mail') }}">
                                      <i class="fa fa-eye"></i>
                                        Single Mail
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {{ (Request::is('admin/task') ? 'class=active' : '') }}>
                            <a href="{{ URL::to('admin/task') }}">
                               <i class="fa fa-fw fa-list-ul"></i>
                                <span>Tasks</span>
                                <small class="badge">10</small>
                            </a>
                        </li>
                        <li class="menu-dropdown {{ (Request::is('admin/gallery') || Request::is('admin/masonry_gallery') || Request::is('admin/multiplefile_upload') || Request::is('admin/image_magnifier') ? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-fw fa-photo"></i>
                                <span>Gallery</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/gallery') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/gallery') }}">
                                        <i class="fa fa-fw fa-file-image-o"></i>
                                         Gallery
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/masonry_gallery') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/masonry_gallery') }}">
                                        <i class="fa fa-fw fa-file-image-o"></i>
                                        Masonry Gallery
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/multiplefile_upload') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/multiplefile_upload') }}">
                                        <i class="fa fa-fw fa-cloud-upload"></i>
                                        Multiple File Upload
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/image_magnifier') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/image_magnifier') }}">
                                        <i class="fa fa-fw fa-search"></i>
                                        Image Magnifier
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="menu-icon  fa fa-fw fa-paw"></i>
                                <span>Users</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ URL::to('admin/users') }}">
                                        <i class="fa fa-fw fa-users"></i>
                                        Users
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/addnew_user') }}">
                                        <i class="fa fa-fw fa-user"></i>
                                        Add New User
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{ URL::to('admin/user_profile') }}">
                                        <i class="fa fa-fw fa-user"></i>
                                        User Profile
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="menu-dropdown {{ (Request::is('admin/google_maps') || Request::is('admin/vector_maps')? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-map-marker"></i>
                                <span>Maps</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/google_maps') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/google_maps') }}">
                                        <i class="fa fa-fw fa-globe"></i>
                                        Google Maps
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/vector_maps') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/vector_maps') }}">
                                        <i class="fa fa-fw fa-map-marker"></i>
                                        Vector Maps
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown {{ (Request::is('admin/faq') || Request::is('admin/invoice') || Request::is('admin/blank') ? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-files-o"></i>
                                <span>Pages</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/faq') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/faq') }}">
                                        <i class="fa fa-fw fa-question"></i>
                                        FAQ
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/lockscreen') }}">
                                        <i class="fa fa-fw fa-lock"></i>
                                        Lockscreen
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/invoice') }}">
                                        <i class="fa fa-fw fa-newspaper-o"></i>
                                        Invoice
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/blank') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/blank') }}">
                                        <i class="fa fa-fw fa-file-o"></i>
                                        Blank
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/login') }}">
                                        <i class="fa fa-fw fa-sign-in"></i>
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/register') }}">
                                        <i class="fa fa-fw fa-sign-in"></i>
                                        Register
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/404') }}">
                                        <i class="fa fa-fw fa-unlink"></i>
                                        404 Error
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/500') }}">
                                        <i class="fa fa-fw fa-frown-o"></i>
                                        500 Error
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Menus generated by CRUD generator --}}
                        @include('admin/layouts/menu')

                        <li class="menu-dropdown {{ (Request::is('admin/boxed') || Request::is('admin/layout_fixed_header') || Request::is('admin/layout_boxed_fixed_header') || Request::is('admin/layout_fixed') ? 'active' : '') }}">
                            <a href="#">
                                <i class="menu-icon fa fa-th"></i>
                                <span>Layouts</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('admin/boxed') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/boxed') }}">
                                        <i class="fa fa-fw fa-th-large"></i>
                                        Boxed Layout
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/layout_fixed_header') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/layout_fixed_header') }}">
                                        <i class="fa fa-fw fa-th-list"></i>
                                        Fixed Header
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/layout_boxed_fixed_header') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/layout_boxed_fixed_header') }}">
                                        <i class="fa fa-fw fa-th"></i>
                                        Boxed &amp; Fixed Header
                                    </a>
                                </li>
                                <li {{ (Request::is('admin/layout_fixed') ? 'class=active' : '') }}>
                                    <a href="{{ URL::to('admin/layout_fixed') }}">
                                        <i class="fa fa-fw fa-indent"></i>
                                        Fixed Header &amp; Menu
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-dropdown">
                            <a href="#">
                                <i class="menu-icon fa fa-sitemap"></i>
                                <span>
                                    Menu levels
                                </span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-fw fa-sitemap"></i>
                                        Level 1
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="sub-menu sub-submenu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-fw fa-sitemap"></i>
                                                Level 2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-fw fa-sitemap"></i>
                                                Level 2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-fw fa-sitemap"></i>
                                                Level 2
                                                <span class="fa arrow"></span>
                                            </a>
                                            <ul class="sub-menu sub-submenu">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-fw fa-sitemap"></i>
                                                        Level 3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-fw fa-sitemap"></i>
                                                        Level 3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-fw fa-sitemap"></i>
                                                        Level 3
                                                        <span class="fa arrow"></span>
                                                    </a>
                                                    <ul class="sub-menu sub-submenu">
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-fw fa-sitemap"></i>
                                                                Level 4
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-fw fa-sitemap"></i>
                                                                Level 4
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-fw fa-sitemap"></i>
                                                                Level 4
                                                                <span class="fa arrow"></span>
                                                            </a>
                                                            <ul class="sub-menu sub-submenu">
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="fa fa-fw fa-sitemap"></i>
                                                                        Level 5
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="fa fa-fw fa-sitemap"></i>
                                                                        Level 5
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="fa fa-fw fa-sitemap"></i>
                                                                        Level 5
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-fw fa-sitemap"></i>
                                                        Level 4
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-fw fa-sitemap"></i>
                                                Level 2
                                                <span class="fa arrow"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-fw fa-sitemap"></i>
                                        Level 1
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-fw fa-sitemap"></i>
                                        Level 1
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="sub-menu sub-submenu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-fw fa-sitemap"></i>
                                                Level 2
                                                <span class="fa arrow"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-fw fa-sitemap"></i>
                                                Level 2
                                                <span class="fa arrow"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-fw fa-sitemap"></i>
                                                Level 2
                                                <span class="fa arrow"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- / .navigation -->
                </div>
                <!-- menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        <aside class="right-side right-padding">

            <!-- Notifications -->
            @include('notifications')

            <!-- Content -->
            @yield('content')

            <!-- /.content -->
        </aside>
        <!-- /.right-side -->
    </div>
    <!-- /.right-side -->
    <!-- ./wrapper -->
    <!-- global js -->
    <script src="{{ asset('admin/assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    @if (Request::is('admin/draggable_portlets'))
        <script src="{{ asset('admin/assets/vendors/jquery.ui/js/jquery.ui.min.js') }}" type="text/javascript"></script>
    @endif
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/metisMenu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets/js/custom_js/rightside_bar.js') }}" type="text/javascript"></script>
    <!-- end of page level js -->
    <!-- begin page level js -->
    @yield('footer_scripts')
    <!-- end page level js -->
</body>
</html>