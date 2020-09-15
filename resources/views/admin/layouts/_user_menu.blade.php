<li class="dropdown user user-menu">
	<a href="" class="dropdown-toggle padding-user" data-toggle="dropdown" style="height: 50px;">
		<img src="{{ asset('admin/assets/img/admin-images.png') }}" alt="img"
		     class="img-circle img-responsive pull-left" height="35" width="35"/>
		<div class="riot">
			<div>
				<p class="user_name_max">
					{{ session()->get('first_name') }} {{ session()->get('last_name') }}
				</p>
				<span>
					<i class="caret"></i>
				</span>
			</div>
		</div>
	</a>
	<ul class="dropdown-menu">
		<!-- User image -->
		<li class="user-header">
			<img src="{{ asset('admin/assets/img/admin-images.png') }}" alt="img" class="img-circle img-bor"/>
			<p>
				{{ session()->get('first_name') }} {{ session()->get('last_name') }}
			</p>
		</li>
		<!-- Menu Body -->
		<li class="pad-3" style="text-align: center;">
			<a href="{{ URL::to('admin/user/' . session()->get('id') . '/edit') }}">
				<i class="fa fa-fw fa-edit"></i>
				Edit My Profile
			</a>
		</li>
		<li role="presentation"></li>
		{{--<li>
			<a href="">
				<i class="fa fa-fw fa-gear"></i>
				Account Settings
			</a>
		</li>--}}
		<li role="presentation" class="divider"></li>
		<!-- Menu Footer-->
		<li class="user-footer" style="text-align: center;">
			{{--<div class="pull-left">
				<a href="">
					<i class="fa fa-fw fa-lock"></i>
					Frontend
				</a>
			</div>--}}
			<div class="pull-right" style="float: none !important;">
				<a href="{{ URL::to('admin/logout') }}"
				   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					<i class="fa fa-fw fa-sign-out"></i>
					Log out
				</a>
			</div>
		</li>
	</ul>
</li>
