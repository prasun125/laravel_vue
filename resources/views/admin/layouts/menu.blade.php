<li {{ (Request::is('admin') ? 'class=active' : '') }}>
    <a href="{{ URL::to('admin/dashboard') }}">
        <i class="menu-icon fa fa-fw fa-home"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="menu-dropdown {{(Request::is('admin/ajaxDatatables') || Request::is('admin/editable_datatables') || Request::is('admin/dropzone') || Request::is('admin/multiplefile_upload')? 'active' : '') }}">
    <a href="#">
        <i class="menu-icon fa fa-fw fa-paw"></i>
        <span>Users</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {{ (Request::is('admin/ajaxDatatables') ? 'class=active' : '') }}>
            <a href="{{ URL::to('admin/user/add') }}">
                <i class="fa fa-fw fa-user"></i>
                Add New User
            </a>
        </li>
        <li {{ (Request::is('admin/editable_datatables') ? 'class=active' : '') }}>
            <a href="{{ URL::to('admin/users') }}">
                <i class="fa fa-fw fa-users"></i>
                Manage Users
            </a>
        </li>
    </ul>
</li>
<li class="menu-dropdown {{ (Request::is('admin/boxed') || Request::is('admin/layout_fixed_header') || Request::is('admin/layout_boxed_fixed_header') || Request::is('admin/layout_fixed') ? 'active' : '') }}">
    <a href="">
        <i class="menu-icon fa fa-map-marker"></i>
        <span>Cities</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {{ (Request::is('admin/boxed') ? 'class=active' : '') }}>
            <a href="{{ URL::to('admin/city/add') }}">
                <i class="fa fa-fw fa-map-marker"></i>
                Add New City
            </a>
        </li>
        <li {{ (Request::is('admin/layout_fixed_header') ? 'class=active' : '') }}>
            <a href="{{ URL::to('admin/cities') }}">
                <i class="fa fa-fw fa-map-marker"></i>
                Manage Cities
            </a>
        </li>
        <li {{ (Request::is('admin/layout_fixed_header') ? 'class=active' : '') }}>
            <a href="{{ URL::to('admin/city-distance-time') }}">
                <i class="fa fa-fw fa-map-marker"></i>
                City's Distance Time
            </a>
        </li>
        <li {{ (Request::is('admin/layout_fixed_header') ? 'class=active' : '') }}>
            <a href="{{ URL::to('admin/add-on-cities') }}">
                <i class="fa fa-fw fa-map-marker"></i>
                Add Add-on cities
            </a>
        </li>
    </ul>
</li>
<li class="menu-dropdown {{ (Request::is('admin/boxed') || Request::is('admin/layout_fixed_header') || Request::is('admin/layout_boxed_fixed_header') || Request::is('admin/layout_fixed') ? 'active' : '') }}">
    <a href="">
        <i class="menu-icon fa fa-car"></i>
        <span>Vehicles</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {{ (Request::is('admin/boxed') ? 'class=active' : '') }}>
            <a href="{{ URL::to('/admin/vehicle/add') }}">
                <i class="fa fa-fw fa-car"></i>
                Add New Vehicle
            </a>
        </li>
        <li {{ (Request::is('admin/layout_fixed_header') ? 'class=active' : '') }}>
            <a href="{{ URL::to('admin/vehicles') }}">
                <i class="fa fa-fw fa-car"></i>
                Manage Vehicles
            </a>
        </li>
    </ul>
</li>
<li class="menu-dropdown {{(Request::is('admin/ajaxDatatables') || Request::is('admin/editable_datatables') || Request::is('admin/dropzone') || Request::is('admin/multiplefile_upload')? 'active' : '') }}">
    <a href="#">
        <i class="menu-icon fa fa-sitemap"></i>
        <span>Routes</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">

        <li {{ (Request::is('admin/boxed') ? 'class=active' : '') }}>
            <a href="{{ URL::to('admin/pre-defined-routes') }}">
                <i class="fa fa-fw fa-sitemap"></i>
                Pre Define Routes
            </a>
        </li>
        <li {{ (Request::is('admin/boxed') ? 'class=active' : '') }}>
            <a href="{{ URL::to('admin/user-defined-routes') }}">
                <i class="fa fa-fw fa-sitemap"></i>
               User Define Routes
            </a>
        </li>

    </ul>
</li>
<li class="menu-dropdown">
    <a href="#">
        <i class="menu-icon fa fa-cog"></i>
        <span>Settings</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="{{ URL::to('/admin/price-rule/add') }}">
                <i class="fa fa-money"></i>
                Add New Price Rule
            </a>
        </li>
        <li>
            <a href="{{ URL::to('/admin/price-rules') }}">
                <i class="fa fa-money"></i>
                Manage Price Rules
            </a>
        </li>

        <li>
            <a href="{{ URL::to('/admin/variable/add') }}">
                <i class="fa fa-money"></i>
                Add New Variable
            </a>
        </li>
        <li>
            <a href="{{ URL::to('/admin/variables') }}">
                <i class="fa fa-money"></i>
                Manage Variables
            </a>
        </li>

    </ul>
</li>
<li class="menu-dropdown">
    <a href="#">
        <i class="menu-icon fa fa-ticket"></i>
        <span>Bookings</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="{{ URL::to('/admin/bookings/created') }}">
                <i class="fa fa-ticket"></i>
                Created
            </a>
        </li>
        <li>
            <a href="{{ URL::to('/admin/bookings/pending') }}">
                <i class="fa fa-ticket"></i>
                Pendings
            </a>
        </li>
        <li>
            <a href="{{ URL::to('/admin/bookings/confirmed') }}">
                <i class="fa fa-ticket"></i>
                Confirmed
            </a>
        </li>
        <li>
            <a href="{{ URL::to('/admin/bookings/completed') }}">
                <i class="fa fa-ticket"></i>
                Completed
            </a>
        </li>

    </ul>
</li>
{{--<li class="{{ Request::is('admin/ashok/aaaas*') ? 'active' : '' }}">
    <a href="">
    <i class="menu-icon fa fa-sitemap"></i>
        Cities Distance
    </a>
</li>--}}

<li class="{{ Request::is('admin/dfgfdg/tertrs*') ? 'active' : '' }}">
    <a href="{{ URL::to('admin/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
    <i class="fa fa-fw fa-sign-out" style="width: 20px; margin-right: 5px;"></i>
               Log out
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>

