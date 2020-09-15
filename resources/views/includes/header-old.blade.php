<header style="height: 60px; position: fixed; width: 100%;">
	<nav class="navbar navbar-default navbar-static-top custom-navbar">
		<div class="container ">

			<div class="navbar-header " style="padding-top: 6px;">

				<!-- Collapsed Hamburger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- Branding Image -->
				<div class="display-flex space-between logo">
						<div style="position: relative">
							<a class="navbar-brand" href="{{ url('/') }}">
								{{ config('app.name', 'Laravel') }}
							</a>
							<div class="nav-bar-tag" style="color: #fff; text-align: center;">
								your personal driver
							</div>
						</div>
					{{--<div class="select-lists">--}}
						{{--<select name="" id="currency-select">--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
							{{--<option value="">INR</option>--}}
						{{--</select>--}}
						{{--<select name="" id="language-select">--}}
							{{--<option value="">EN</option>--}}
							{{--<option value="">EN</option>--}}
							{{--<option value="">EN</option>--}}
							{{--<option value="">EN</option>--}}
							{{--<option value="">EN</option>--}}
							{{--<option value="">EN</option>--}}

						{{--</select>--}}
					{{--</div>--}}
				</div>

			</div>


			<div class="collapse navbar-collapse custom-responsive" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				<ul class="nav navbar-nav">
					&nbsp;
				</ul>

				<!-- Right Side Of Navbar -->

				<ul class="nav navbar-nav navbar-right text-uppercase navigation-menu navbar-options">
					<!-- Authentication Links -->

					<li>
						<a href="{{ URL::to('all-routes') }}" style="line-height: 56px">
							all Routes
						</a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#createModal" style="line-height: 56px">
							create My routes
						</a>
					</li>
					<li>
						<a href="javascript:void(0)" style="line-height: 56px" data-toggle="popover" data-placement="bottom" data-content=>
							My Plans (@{{ plans.number_of_plans }})
						</a>
					</li>
					<li>
						<a href="{{ URL::to('my-plans') }}" style="line-height: 56px">
							My Bookings
						</a>
					</li>
					<div class="hide" id="select-div">
						<my-plans ref="myPlans"></my-plans>
					</div>
					@if(session()->has('id'))
						<li>
							<a href="#" class="dropdown-toggle" style="line-height: 56px"	  aria-expanded="false" v-pre>
								Hey &nbsp;{{  session()->get('first_name')  }}
							</a>
						</li>
								<li>
									<a href="{{ route('logout') }}"
									   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="line-height: 56px">
										Logout
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
					{{--<li><a href="{{ route('register') }}">Register</a></li>--}}
					@else
						<li><a href="javascript:void(0)" id="login-link" data-toggle="modal" data-target="#login-modal" style="line-height: 56px">Login</a></li>
						<li><a href="javascript:void(0)" data-toggle="modal" data-target="#registration-modal" id="registration-link" style="line-height: 56px">Registration</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</header>