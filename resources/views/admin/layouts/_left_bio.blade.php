<div class="nav_profile">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="">
                <img src="{{ asset('admin/assets/img/admin-images.png') }}" alt="img" class="img-circle img-bor"/>
        </a>

        <div class="content-profile">
            <h4 class="media-heading">
                {{ session()->get('first_name') }} {{ session()->get('last_name') }}
            </h4>
            <ul class="icon-list">
                <li>
                    <a href="{{ URL::to('admin/user/' . session()->get('id') . '/edit') }}">
                        <i class="fa fa-fw fa-edit" title="Edit My Profile"></i>
                    </a>
                </li>
                {{--<li>
                    <a href="{{ route('admin.users.edit',Auth::user()->id) }}">
                        <i class="fa fa-fw fa-gear" title="Edit User"></i>
                    </a>
                </li>--}}
                <li>
                    <a href="{{ URL::to('admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw fa-sign-out" title="Logout"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>