<header class="min-width-100 width-100 max-width-100 d-flex j-c-space-between a-i-center">
	<i class="material-icons">
		menu
	</i>
	<a href="{{ route('welcome') }}" class="logo-container d-flex j-c-center a-i-center">
		<img src="{{ asset('assets/images/onesaway-logo.png') }}" alt="Onesaway.com" title="Onesaway.com" class="logo">
	</a>
	<nav class="menu-link-container d-flex j-c-space-evenly a-i-center uppercase cur-point">
		<a href="" class="menu-link p-0-24 font-white">
			top routes
		</a>
		<a href="{{ route('route.create') }}" class="menu-link p-0-24 font-white">
			create plan
		</a>
		<a href="" class="menu-link p-0-24 font-white">
			my plans
		</a>
		<a href="" class="menu-link p-0-24 font-white">
			faq
		</a>
		@guest
			<a href="{{ route('register') }}" class="menu-link p-0-24 font-white">
				register
			</a>
		@endguest
	</nav>
</header>
<aside class="mobile-menu-link-container uppercase">
	<div class="d-flex j-c-end a-i-center">
		<i class="material-icons font-white close">
			arrow_back
		</i>
	</div>
	<a href="" class="mobile-menu-link font-white font-lato">
		top routes
	</a>
	<a href="{{ route('route.create') }}" class="mobile-menu-link font-white font-lato">
		create plan
	</a>
	<a href="" class="mobile-menu-link font-white font-lato">
		my plans
	</a>
	<a href="" class="mobile-menu-link font-white font-lato">
		faq
	</a>
	@guest
		<a href="{{ route('register') }}" class="mobile-menu-link font-white font-lato">
			register
		</a>
	@endguest
</aside>
