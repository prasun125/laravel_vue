@extends('layouts.master')
@section('title')
	Welcome to
@endsection
<style>
	.autocomplete-items {
		top: 52px;
		left: 0;
		max-height: 344px;
		overflow: scroll;
		position: absolute;
		background-color: white;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
	}
	.autocomplete-items > div {
		display: flex;
		min-height: 30px;
		padding: 12px 8px;
		cursor: pointer;
		background-color: rgba(255, 255, 255, 1);
		min-width: 100%;
		width: 100%;
		max-width: 100%;
		font-family: 'Lato', 'sans-serif';
	}
	.autocomplete-items > div:hover {
		background-color: #e9e9e9;
	}
	.autocomplete-items > div > strong {
		margin-left: 8px;
	}
	.autocomplete-active {
		/*when navigating through the items using the arrow keys:*/
		background-color: #e9e9e9 !important;
		color: rgba(0, 0, 0, 1);
	}
	#daterangepicker-container {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		align-items: center;
		min-height: 52px;
		height: 52px;
		max-height: 52px;
		cursor: pointer;
	}
	.people-count {
		top: 60px;
		left: 0;
		background-color: rgba(255, 255, 255, 1);
		box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
		-webkit-animation: zoomIn 0.5s;
		animation: zoomIn 0.5s;
	}
	.people-count:after {
		content: "";
		position: absolute;
		bottom: 100%;
		right: 50%;
		border-width: 6px;
		border-style: solid;
		border-color: transparent transparent rgba(255, 255, 255, 1) transparent;
	}
	.icon-border {
		border: 2px solid;
		border-radius: 50%;
		color: #00B69C;
		font-size: 20px !important;
	}
	.icon-border.icon-disabled {
		opacity: 0.3;
		cursor: default;
	}
	section.banner-container > div {
		margin-left: 8px;
		margin-right: 8px;
	}
	section.banner-container > div:nth-child(2) > form {
		margin-bottom: 64px;
	}
	section.banner-container > div:nth-child(2) > form, section.banner-container > div:nth-child(2) > form > div.choose-country, section.banner-container > div:nth-child(2) > form > div.pickup-date, section.banner-container > div:nth-child(2) > form > div.drop-off-date, section.banner-container > div:nth-child(2) > form > div.people, section.banner-container > div:nth-child(2) > form > button {
		min-height: 52px;
	}
	section.banner-container > div:nth-child(2) > form > div.choose-country, section.banner-container > div:nth-child(2) > form > div.pickup-date, section.banner-container > div:nth-child(2) > form > div.drop-off-date, section.banner-container > div:nth-child(2) > form > div.people, section.banner-container > div:nth-child(2) > form > button {
		height: 52px;
		max-height: 52px;
	}
	section.banner-container > div:nth-child(2) > form > div.pickup-date, section.banner-container > div:nth-child(2) > form > div.drop-off-date {
		min-width: 200px;
		max-width: 200px;
	}
	section.banner-container > div:nth-child(2) > form > div.people {
		min-width: 200px;
	}
	section.banner-container > div:nth-child(2) > form > div.pickup-date > input, section.banner-container > div:nth-child(2) > form > div.drop-off-date > input {
		flex-grow: 1;
		font-size: 13px;
	}
	section.banner-container > div:nth-child(2) > form > div.people {
		min-width: 200px;
		cursor: pointer;
	}
	section.banner-container > div:nth-child(2) > form > div.people > label {
		opacity: 0.5;
		cursor: pointer;
	}
	section.banner-container > div:nth-child(2) > form > div.people > div.people-count {
		cursor: auto;
	}
	section.banner-container > div:nth-child(2) > form > button {
		padding: 0 16px;
		letter-spacing: 2px;
		font-family: 'Lato', sans-serif;
	}
	section.banner-container > div:nth-child(2) > form > div.vertical-bar, #daterangepicker-container .vertical-bar {
		min-height: 32px;
		height: 32px;
		max-height: 32px;
		min-width: 1px;
		width: 1px;
		max-width: 1px;
		background-color: rgba(0, 0, 0, 0.3);
	}
	section.banner-container > div:nth-child(2) > div > div:first-child, section.banner-container > div:nth-child(2) > div > div:nth-child(2) {
		font-size: 48px;
		letter-spacing: 4.8px;
	}
	section.banner-container > div:nth-child(2) > div > div:nth-child(3), section.banner-container > div:nth-child(2) > div > div:nth-child(4) {
		font-size: 24px;
		letter-spacing: 2px;
	}
	section.mission {
		background-image: url('{{ asset('assets/images/home-mission.png') }}');
		background-size: cover;
		min-height: 460px;
		height: 460px;
		max-height: 460px;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
	}
	section.mission > div:first-child, section.mission > div:nth-child(2) {
		font-size: 32px;
	}
	section.mission > p.description {
		font-size: 24px;
	}
	section.mission p.description {
		min-width: 800px;
		max-width: 800px;
	}
	section.simple-step {
		font-family: 'Lato-Bold', sans-serif;
		font-weight: 400;
	}
	section.simple-step > div:first-child {
		font-size: 44px;
	}
	section.simple-step > div.step-item-container:nth-child(2) > div.item {
		flex-basis: calc(100% / 3);
		flex-grow: 1;
	}
	section.simple-step > div.step-item-container:nth-child(2) > div.item > p:nth-child(3) {
		max-width: 70%;
	}
	section.simple-step > button, section.discover-cuba > button {
		min-height: 60px;
		height: 60px;
		max-height: 60px;
		min-width: 224px;
		width: 224px;
		max-width: 224px;
	}
	section.discover-cuba {
		background-image: url('{{ asset('assets/images/home-discover-cuba.png') }}');
		background-size: cover;
		min-height: 646px;
		height: 646px;
		max-height: 646px;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
	}
	section.discover-cuba > div.discover-cuba-title {
		font-size: 40px;
	}
	section.discover-cuba > p.explore {
		max-width: 30%;
	}
	section.destination > div.destination-title {
		font-size: 40px;
		margin-bottom: 20px;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
		font-weight: 400;
	}
	section.destination > div.destination-description {
		max-width: 64%;
		font-size: 20px;
		margin-bottom: 32px;
	}
	section.destination > div.destination-bg {
		min-height: 100vh;
		height: 100vh;
		max-height: 100vh;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
	}
	section.destination > div.destination-bg > img {
		position: absolute;
		min-height: 100%;
		height: 100%;
		max-height: 100%;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
		top: 0;
		left: 0;
	}
	section.destination > div.destination-bg > div:nth-child(2) {
		z-index: 1;
		min-height: 150px;
		flex-basis: 100%;
	}
	section.destination > div.destination-bg > div:nth-child(2) > div.like-to-go {
		font-size: 48px;
		letter-spacing: 4.8px;
		font-weight: 400;
	}
	section.destination form input[type=email] {
		min-height: 52px;
		height: 52px;
		max-height: 52px;
		width: 390px;
		font-size: 16px;
		padding: 0 16px;
	}
	section.destination form button {
		min-height: 52px;
		height: 52px;
		max-height: 52px;
		width: 225px;
		margin-left: 12px;
		cursor: pointer;
	}
	section.customer > div:first-child {
		font-size: 32px;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
		font-weight: bold;
	}
	section.customer > div:nth-child(2) > div.item {
		flex-basis: calc(100% / 3);
		padding: 0 24px;
	}
	.face {
		height: 120px;
		width: 120px;
		border-radius: 50%;
	}
	section.customer > div:nth-child(2) > div.item > p:nth-child(4) {
		font-size: 14px;
	}
	.icon {
		height: 16px;
		width: 16px;
	}
	@media only screen and (max-width: 1024px) {
		section.banner-container form {
			justify-content: space-between;
		}
		#daterangepicker-container {
			max-width: calc(100% / 3);
			flex-wrap: nowrap;
		}
		#daterangepicker-container > div {
			flex-grow: 1;
		}
		#daterangepicker-container > div > input[type='text'] {
			width: 100%;
		}
		section.container {
			min-width: 100%;
			width: 100%;
			max-width: 100%;
		}
		.destination-image-container {
			min-width: 100% !important;
			max-width: 100% !important;
		}
		.slider-active .owl-nav .owl-prev {
			left: 2% !important;
		}
		.slider-active .owl-nav .owl-next {
			right: 2% !important;
		}
	}
	@media only screen and (max-width: 768px) {
		section.banner-container {
			min-height: calc(100vh - 52px);
			height: calc(100vh - 52px);
			max-height: calc(100vh - 52px);
		}
		section.banner-container > div:nth-child(2) {
			min-width: 100%;
			max-width: 100%;
		}
		section.banner-container > div:nth-child(2) > form, section.banner-container > div:nth-child(2) > div {
			margin: 0 8px;
			max-width: 100%;
		}
		section.banner-container > div:nth-child(2) > div:nth-child(2) > div {
			margin-top: 16px;
		}
		section.banner-container > div:nth-child(2) > div:nth-child(2) > div:first-child, section.banner-container > div:nth-child(2) > div:nth-child(2) > div:nth-child(2) {
			font-size: 22px;
		}
		section.banner-container > div:nth-child(2) > div:nth-child(2) > div:nth-child(3), section.banner-container > div:nth-child(2) > div:nth-child(2) > div:nth-child(4) {
			font-size: 16px;
		}
		section.banner-container > div:nth-child(2) > form > div.choose-country, section.banner-container > div:nth-child(2) > form > div.pickup-date, section.banner-container > div:nth-child(2) > form > div.drop-off-date, section.banner-container > div:nth-child(2) > form > div.people, section.banner-container > div:nth-child(2) > form > button {
			flex-basis: 100%;
			max-width: 100%;
		}
		section.banner-container > div:nth-child(2) > form > div.vertical-bar {
			display: none;
		}
		section.banner-container > div:nth-child(2) > form > button {
			margin: 8px;
		}
		section.mission, section.discover-cuba, section.destination > div.destination-bg {
			min-height: 70vh;
			height: 70vh;
			max-height: 70vh;
		}
		section.mission, section.discover-cuba {
			padding: 0 16px;
		}
		section.mission > div:first-child {
			font-size: 24px;
		}
		section.mission > div:nth-child(2) {
			font-size: 20px;
			margin-top: 16px;
		}
		section.mission > p.description {
			min-width: 100%;
			max-width: 100%;
		}
		section.mission > p.description {
			font-size: 16px;
		}
		section.simple-step > div:first-child {
			font-size: 28px;
		}
		section.simple-step > div.step-item-container:nth-child(2), section.simple-step > div.step-item-container:nth-child(2) > div.item:first-child {
			margin: 0;
		}
		section.simple-step > div.step-item-container:nth-child(2) > div.item {
			flex-basis: 100%;
			flex-grow: 1;
			-webkit-box-shadow: 0 0 8px 0 rgba(0,0,0,0.3);
			-moz-box-shadow: 0 0 8px 0 rgba(0,0,0,0.3);
			box-shadow: 0 0 8px 0 rgba(0,0,0,0.3);
			padding: 16px 0;
		}
		section.simple-step > div.step-item-container:nth-child(2) > div.item:not(:first-child) {
			margin: 24px 0 0;
		}
		section.discover-cuba > div.discover-cuba-title {
			font-size: 28px;
		}
		section.discover-cuba > p:nth-child(2) {
			min-width: 100%;
			width: 100%;
			max-width: 100%;
			padding: 0 16px;
		}
		section.destination > div.destination-title {
			font-size: 24px;
			padding: 0 16px;
		}
		section.destination > div.destination-description {
			min-width: 100%;
			width: 100%;
			max-width: 100%;
			font-size: 14px;
			padding: 0 16px;
		}
		section.destination > div.destination-bg > div:nth-child(2) {
			min-width: 100%;
			width: 100%;
			max-width: 100%;
			padding: 0 16px;
		}
		section.destination > div.destination-bg > div:nth-child(2) > div.like-to-go {
			min-width: 100%;
			width: 100%;
			max-width: 100%;
			font-size: 28px;
		}
		section.destination > div.destination-bg > div:nth-child(2) {
			min-height: 300px;
		}
		section.destination > div.destination-bg > div:nth-child(2) > form:nth-child(2) {
			min-width: 100%;
			width: 100%;
			max-width: 100%;
			justify-content: center;
		}
		section.destination > div.destination-bg > div:nth-child(2) > form:nth-child(2) > input[type=email] {
			min-height: 48px;
			height: 48px;
			max-height: 48px;
			min-width: 100%;
			width: 100%;
			max-width: 100%;
		}
		section.destination > div.destination-bg > div:nth-child(2) > form:nth-child(2) > button {
			margin-left: 0;
			margin-top: 8px;
			width: 200px;
		}
		section.customer > div:first-child {
			font-size: 24px;
		}
		section.customer > div:nth-child(2) {
			margin-top: 0;
			margin-bottom: 0;
		}
		section.customer > div:nth-child(2) > div.item {
			flex-basis: 100%;
			-webkit-box-shadow: 0 0 8px 0 rgba(0,0,0,0.3);
			-moz-box-shadow: 0 0 8px 0 rgba(0,0,0,0.3);
			box-shadow: 0 0 8px 0 rgba(0,0,0,0.3);
			padding: 16px 8px;
			margin-bottom: 0;
		}
		section.customer > div:nth-child(2) > div.item:first-child {
			margin-top: 0;
		}
		section.customer > div:nth-child(2) > div.item:not(:first-child) {
			margin-top: 8px;
		}
		section.customer > div:nth-child(2) > div.item > p:nth-child(4) {
			font-size: 12px;
		}
		#daterangepicker-container .vertical-bar {
			display: none;
		}
		#daterangepicker-container .pickup-date, #daterangepicker-container .drop-off-date {
			flex-basis: calc(100% / 2);
		}
		#daterangepicker-container .pickup-date input[type='text'], #daterangepicker-container .drop-off-date input[type='text'] {
			width: 100%;
		}
		.people-count {
			top: 125px;
		}
		#daterangepicker-container {
			max-width: none;
		}
	}
	@media only screen and (max-width : 320px) and (max-height: 480px) {
		section.banner-container > div:nth-child(2) > div:nth-child(2) > div {
			margin-top: 8px;
		}
		section.banner-container > div:nth-child(2) > div:nth-child(2) > div:first-child, section.banner-container > div:nth-child(2) > div:nth-child(2) > div:nth-child(2) {
			font-size: 16px;
		}
		section.banner-container > div:nth-child(2) > div:nth-child(2) > div:nth-child(3), section.banner-container > div:nth-child(2) > div:nth-child(2) > div:nth-child(4) {
			font-size: 12px;
		}
	}
</style>
@section('internal-css')
@endsection
@section('content')
	<section class="banner-container min-width-100 width-100 max-width-100 pos-relative d-flex j-c-center a-i-center">
		<img src="{{ asset('assets/images/home-banner.png') }}" class="pos-absolute"/>
		<div class="d-flex flex-dir-column flex-wrap j-c-space-between">
			<form class="background-color-white d-flex flex-wrap a-i-center" autocomplete="off" action="{{ route('route.create') }}" method="post">
				{{ csrf_field() }}
				<div class="choose-country d-flex a-i-center p-0-8 pos-relative">
					<img src="{{ asset('assets/images/icons/location-green-icon.svg') }}" class="icon"/>
					<input type="text" placeholder="Choose pickup city..." class="m-l-8 font-lato" id="choose-country" name="choose_country"/>
				</div>
				<div class="vertical-bar m-0-8"></div>
				<div id="daterangepicker-container">
					<div class="pickup-date d-flex flex-dir-row a-i-center p-0-8">
						<img src="{{ asset('assets/images/icons/start-date.svg') }}" class="icon"/>
						<input type="text" id="pickup-date" placeholder="Pickup date" class="m-l-8 font-lato cur-point" readonly/>
						<input type="hidden" id="string-pickup-date" placeholder="Pickup date" name="pickup_date" class="m-l-8 font-lato"/>
					</div>
					<div class="vertical-bar m-0-8">
					</div>
					<div class="drop-off-date d-flex flex-dir-row a-i-center p-0-8">
						<img src="{{ asset('assets/images/icons/end-date.svg') }}" class="icon"/>
						<input type="text" id="dropoff-date" placeholder="Drop off date" class="m-l-8 font-lato cur-point" readonly/>
						<input type="hidden" id="string-dropoff-date" placeholder="Drop off date" name="drop_off_date" class="m-l-8 font-lato"/>
					</div>
				</div>
				<div class="vertical-bar m-0-8"></div>
				<div class="people d-flex flex-dir-row a-i-center p-0-8 pos-relative">
					<img src="{{ asset('assets/images/icons/people-icon.svg') }}" class="icon"/>
					<input type="text" id="people" placeholder="People" class="m-l-8 font-lato cur-point" readonly/>
					<input type="hidden" id="adult" name="adult">
					<input type="hidden" id="child" name="child">
					<div class="people-count pos-absolute min-width-100 width-100 max-width-100 display-none flex-wrap j-c-space-evenly a-i-center">
						<div class="m-16-0 flex-grow-1">
							<div class="d-flex j-c-space-between a-i-center m-0-16">
								<i class="material-icons cur-point icon-border icon-disabled" id="decreaseAdult" onclick="decreaseAdult()">
									remove
								</i>
								<div class="font-lato flex-grow-1 m-0-16">
									<span style="font-weight: bold;" id="adult-count">
										2
									</span>
									<span>
										adults
									</span>
								</div>
								<i class="material-icons cur-point icon-border" id="increaseAdult" onclick="increaseAdult()">
									add
								</i>
							</div>
							<div class="d-flex j-c-space-between a-i-center m-t-16 m-l-16 m-r-16">
								<i class="material-icons cur-point icon-border icon-disabled" id="decreaseChild" onclick="decreaseChild()">
									remove
								</i>
								<div class="flex-grow-1 m-0-16">
									<span style="font-weight: bold;" id="child-count">
										0
									</span>
									<span id="child-text">
										child
									</span>
								</div>
								<i class="material-icons cur-point icon-border" id="increaseChild" onclick="increaseChild()">
									add
								</i>
							</div>
						</div>
					</div>
				</div>
				<button class="uppercase background-color-orange font-white">
					start planning
				</button>
			</form>
			<div>
				<div class="uppercase">
					get a driver
				</div>
				<div class="uppercase">
					for your next holidays
				</div>
				<div class="uppercase">
					plan and discover the hidden gems
				</div>
				<div class="uppercase">
					that only locals know
				</div>
			</div>
		</div>
	</section>
	<section class="mission d-flex flex-dir-column j-c-center a-i-center">
		<div class="font-white">
			Our mission is simple.
		</div>
		<div class="font-orange">
			We want you to explore places that only locals know.
		</div>
		<p class="description font-white text-center">
			Onesaway.com is the new planning platform that picks the best hidden gems in your selected route providing hassle-free transportation. It's the alternative you always wanted to your rent-a-car holiday
		</p>
	</section>
	<section class="container simple-step d-flex flex-dir-column j-c-center a-i-center">
		<div class="min-width-100 width-100 max-width-100 m-32-0 text-center font-lato">
			We made it easy in 3 simple steps
		</div>
		<div class="step-item-container min-width-100 width-100 max-width-100 m-32-0 d-flex flex-wrap j-c-center a-i-center">
			<div class="item m-32-0 d-flex flex-dir-column j-c-space-between a-i-center">
				<img src="{{ asset('assets/images/icons/choose-icon.svg') }}"/>
				<p class="capitalize text-center font-size-28 font-lato">
					choose
				</p>
				<p class="text-center">
					Plan your dates and pick up and start creating your trip
				</p>
				<div class="d-flex j-c-center a-i-center">
					<img src="{{ asset('assets/images/icons/check-mark.svg') }}" class="m-r-12"/>
					<div class="font-green">
						<div class="font-size-22">
							Pay now
						</div>
						<div>
							only deposit
						</div>
					</div>
				</div>
			</div>
			<div class="item m-32-0 d-flex flex-dir-column j-c-space-between a-i-center">
				<img src="{{ asset('assets/images/icons/add-icon.svg') }}"/>
				<p class="capitalize text-center font-size-28 font-lato">
					add
				</p>
				<p class="text-center">
					Find out amazing places on your way and add them to your plan
				</p>
				<div class="d-flex j-c-center a-i-center">
					<img src="{{ asset('assets/images/icons/check-mark.svg') }}" class="m-r-12"/>
					<div class="font-green">
						<div class="font-size-22">
							Amend any plan
						</div>
						<div>
							on the go*
						</div>
					</div>
				</div>
			</div>
			<div class="item m-32-0 d-flex flex-dir-column j-c-space-between a-i-center">
				<img src="{{ asset('assets/images/icons/go-icon.svg') }}" style="height: 70px; width: 65px;"/>
				<p class="text-center font-size-28 font-lato">
					Book, share, go!
				</p>
				<p class="text-center">
					The hard job is done. Now meet your driver and start exploring around
				</p>
				<div class="d-flex j-c-center a-i-center">
					<img src="{{ asset('assets/images/icons/check-mark.svg') }}" class="m-r-12"/>
					<div class="font-green">
						<div class="font-size-22">
							Cancellation free
						</div>
						<div>
							up to 7 days trip date
						</div>
					</div>
				</div>
			</div>
		</div>
		{{--<button class="green-button">
			start planning
		</button>--}}
		<a href="{{ route('route.create') }}" class="green-button-link">
			start planning
		</a>
	</section>
	<section class="discover-cuba d-flex flex-dir-column a-i-center">
		<div class="capitalize m-t-32 min-width-100 width-100 max-width-100 text-center discover-cuba-title font-lato">
			discover cuba
		</div>
		<p class="explore text-center font-lato">
			Explore Cuba from as litle as 25£ per day. Here you also get to pick from our awesome 50's special car collection
		</p>
		<button class="green-button">
			see more
		</button>
	</section>
	<section class="coming-soon-destination d-flex flex-dir-column a-i-center pos-relative">
		<div class="m-t-32 min-width-100 width-100 max-width-100 text-center coming-soon-destination-title font-lato">
			Coming soon destinations
		</div>
		<small class="text-center m-t-16">
			You are going on holidays and we are not there yet?
		</small>
		<small class="text-center m-t-8 m-b-32">
			We are hunting down the best drivers, cristalline beaches and remote temples.
		</small>
		<div class="d-flex flex-dir-row j-c-space-evenly destination-image-container">
			<div class="slider-active owl-carousel">
				<div class="slider-image-container pos-relative d-flex j-c-center a-i-center">
					<img src="{{asset('assets/images/egypt.png')}}" class="pos-absolute"/>
					<div class="pos-absolute uppercase font-white">egypt</div>
				</div>
				<div class="slider-image-container pos-relative d-flex j-c-center a-i-center">
					<img src="{{asset('assets/images/philippines.png')}}" class="pos-absolute"/>
					<div class="pos-absolute uppercase font-white">philippines</div>
				</div>
				<div class="slider-image-container pos-relative d-flex j-c-center a-i-center">
					<img src="{{asset('assets/images/thailand.png')}}" class="pos-absolute"/>
					<div class="pos-absolute uppercase font-white">thailand</div>
				</div>
				<div class="slider-image-container pos-relative d-flex j-c-center a-i-center">
					<img src="{{asset('assets/images/west-africa.png')}}" class="pos-absolute"/>
					<div class="pos-absolute uppercase font-white">west africa</div>
				</div>
			</div>
		</div>
	</section>
	<section class="destination width-100 max-width-100 d-flex flex-dir-column a-i-center">
		<div class="destination-title font-lato text-center">
			Is your destination not there?
		</div>
		<div class="destination-description font-lato text-center">
			Enter below where you're planning to go, enjoy this 15% off on your next holidays with us and be the first to know any country we add.
		</div>
		<div class="destination-bg d-flex flex-dir-row j-c-center a-i-center pos-relative">
			<img src="{{ asset('assets/images/destination.png') }}">
			<div class="d-flex flex-dir-column flex-wrap j-c-space-between a-i-center p-0-32">
				<div class="text-center uppercase like-to-go font-white font-lato">
					where would you like to go?
				</div>
				<form class="d-flex flex-dir-row flex-wrap a-i-center">
					<input title="Enter your email here" type="email"/>
					<button class="uppercase background-color-green font-white p-0-16 width-100">
						submit
					</button>
				</form>
			</div>
		</div>
	</section>
	<section class="container customer d-flex flex-dir-column j-c-center a-i-center">
		<div class="m-32-0 text-center capitalize font-lato">
			happy customers & teams
		</div>
		<div class="min-width-100 width-100 max-width-100 m-32-0 d-flex flex-wrap j-c-center a-i-center customer-team-container">
			<div class="item m-32-0 d-flex flex-dir-column j-c-space-between a-i-center">
				<img src="{{ asset('assets/images/customer.png') }}" class="face"/>
				<div class="capitalize text-center font-size-28 font-orange m-t-16 font-lato">
					tina, cuba
				</div>
				<div class="capitalize text-center font-size-28 font-orange font-lato">
					customer
				</div>
				<p class="text-center font-lato">
					Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada.
				</p>
			</div>
			<div class="item m-32-0 d-flex flex-dir-column j-c-space-between a-i-center">
				<img src="{{ asset('assets/images/driver.png') }}" class="face"/>
				<div class="capitalize text-center font-size-28 font-green m-t-16 font-lato">
					ismael,
				</div>
				<div class="capitalize text-center font-size-28 font-green font-lato">
					driver
				</div>
				<p class="text-center font-lato">
					Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada.
				</p>
			</div>
			<div class="item m-32-0 d-flex flex-dir-column j-c-space-between a-i-center">
				<img src="{{ asset('assets/images/strategist.png') }}" class="face"/>
				<div class="capitalize text-center font-size-28 m-t-16 font-lato">
					adel, comms
				</div>
				<div class="capitalize text-center font-size-28 font-lato">
					strategist
				</div>
				<p class="text-center font-lato">
					Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada.
				</p>
			</div>
		</div>
	</section>
@endsection
@section('internal-js')
	<script src="{{ asset('assets/js/script.js') }}"></script>
	<script type="text/javascript">
        function decreaseAdult() {
            if (parseInt(document.getElementById('adult-count').innerHTML) > 2) {
                var adult = parseInt(document.getElementById('adult-count').innerHTML);
                adult = adult - 1;
	            if (adult <= 2) {
		            document.getElementById('decreaseAdult').classList.add('icon-disabled');
	            }
                document.getElementById('adult-count').innerHTML = adult.toString();
	            if (parseInt(document.getElementById('child-count').innerHTML) <= 1) {
		            document.getElementById('people').value = adult + ' adults, ' + parseInt(document.getElementById('child-count').innerHTML) + ' child';
	            }
	            else {
		            document.getElementById('people').value = adult + ' adults, ' + parseInt(document.getElementById('child-count').innerHTML) + ' children';
	            }
	            document.getElementById('adult').value = adult;
	            document.getElementById('child').value = parseInt(document.getElementById('child-count').innerHTML);
            }
		}
		function increaseAdult() {
            var adult = parseInt(document.getElementById('adult-count').innerHTML);
            adult = adult + 1;
            if (adult > 2) {
	            document.getElementById('decreaseAdult').classList.remove('icon-disabled');
            }
			document.getElementById('adult-count').innerHTML = adult.toString();
            if (parseInt(document.getElementById('child-count').innerHTML) <= 1) {
	            document.getElementById('people').value = adult + ' adults, ' + parseInt(document.getElementById('child-count').innerHTML) + ' child';
            }
            else {
	            document.getElementById('people').value = adult + ' adults, ' + parseInt(document.getElementById('child-count').innerHTML) + ' children';
            }
			document.getElementById('adult').value = adult;
			document.getElementById('child').value = parseInt(document.getElementById('child-count').innerHTML);
		}
        function decreaseChild() {
            if (parseInt(document.getElementById('child-count').innerHTML) > 0) {
                var child = parseInt(document.getElementById('child-count').innerHTML);
                child = child - 1;
	            if (child <= 0) {
		            document.getElementById('decreaseChild').classList.add('icon-disabled');
	            }
                document.getElementById('child-count').innerHTML = child.toString();
                if (parseInt(document.getElementById('child-count').innerHTML) <= 1) {
                    document.getElementById('child-text').innerHTML = 'child';
                }
	            if (child <= 1) {
		            document.getElementById('people').value = parseInt(document.getElementById('adult-count').innerHTML) + ' adults, ' + child + ' child';
	            }
	            else {
		            document.getElementById('people').value = parseInt(document.getElementById('adult-count').innerHTML) + ' adults, ' + child + ' children';
	            }
	            document.getElementById('adult').value = parseInt(document.getElementById('adult-count').innerHTML);
	            document.getElementById('child').value = child;
            }
        }
        function increaseChild() {
            var child = parseInt(document.getElementById('child-count').innerHTML);
            child = child + 1;
	        if (child > 0) {
		        document.getElementById('decreaseChild').classList.remove('icon-disabled');
	        }
            document.getElementById('child-count').innerHTML = child.toString();
            if (parseInt(document.getElementById('child-count').innerHTML) > 1) {
                document.getElementById('child-text').innerHTML = 'children';
			}
	        if (child <= 1) {
		        document.getElementById('people').value = parseInt(document.getElementById('adult-count').innerHTML) + ' adults, ' + child + ' child';
	        }
	        else {
		        document.getElementById('people').value = parseInt(document.getElementById('adult-count').innerHTML) + ' adults, ' + child + ' children';
	        }
	        document.getElementById('adult').value = parseInt(document.getElementById('adult-count').innerHTML);
	        document.getElementById('child').value = child;
        }
        function autocomplete(inp, arr) {
	        /*the autocomplete function takes two arguments, the text field element and an array of possible
	        autocompleted values:*/
	        var currentFocus;
	        /*execute a function when someone writes in the text field:*/
	        inp.addEventListener("input", function(e) {
		        var a, b, i, val = this.value;
		        /*close any already open lists of autocompleted values*/
		        closeAllLists();
		        if (!val) {
		        	return false;
		        }
		        currentFocus = -1;
		        /*create a DIV element that will contain the items (values):*/
		        a = document.createElement("div");
		        a.setAttribute("id", this.id + "autocomplete-list");
		        a.setAttribute("class", "autocomplete-items");
		        /*append the DIV element as a child of the autocomplete container:*/
		        this.parentNode.appendChild(a);
		        /*for each item in the array...*/
		        for (i = 0; i < arr.length; i++) {
			        /*check if the item starts with the same letters as the text field value:*/
			        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
				        /*create a DIV element for each matching element:*/
				        b = document.createElement("div");
				        /*make the matching letters bold:*/
				        b.innerHTML = "<img src='{{ asset('assets/images/icons/location-green-icon.svg') }}' class='icon m-t-4'><strong>" + arr[i].substr(0, val.length) + "</strong>";
				        b.innerHTML += arr[i].substr(val.length);
				        /*insert a input field that will hold the current array item's value:*/
				        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
				        /*execute a function when someone clicks on the item value (DIV element):*/
				        b.addEventListener("click", function(e) {
					        /*insert the value for the autocomplete text field:*/
					        inp.value = this.getElementsByTagName("input")[0].value;
					        /*close the list of autocompleted values,
							(or any other open lists of autocompleted values:*/
					        closeAllLists();
				        });
				        a.appendChild(b);
			        }
		        }
	        });
	        /*execute a function presses a key on the keyboard:*/
	        inp.addEventListener("keydown", function(e) {
		        var x = document.getElementById(this.id + "autocomplete-list");
		        if (x) x = x.getElementsByTagName("div");
		        if (e.keyCode == 40) {
			        /*If the arrow DOWN key is pressed,
					increase the currentFocus variable:*/
			        currentFocus++;
			        /*and and make the current item more visible:*/
			        addActive(x);
		        } else if (e.keyCode == 38) { //up
			        /*If the arrow UP key is pressed,
					decrease the currentFocus variable:*/
			        currentFocus--;
			        /*and and make the current item more visible:*/
			        addActive(x);
		        } else if (e.keyCode == 13) {
			        /*If the ENTER key is pressed, prevent the form from being submitted,*/
			        e.preventDefault();
			        if (currentFocus > -1) {
				        /*and simulate a click on the "active" item:*/
				        if (x) x[currentFocus].click();
			        }
		        }
	        });
	        function addActive(x) {
		        /*a function to classify an item as "active":*/
		        if (!x) return false;
		        /*start by removing the "active" class on all items:*/
		        removeActive(x);
		        if (currentFocus >= x.length) currentFocus = 0;
		        if (currentFocus < 0) currentFocus = (x.length - 1);
		        /*add class "autocomplete-active":*/
		        x[currentFocus].classList.add("autocomplete-active");
	        }
	        function removeActive(x) {
		        /*a function to remove the "active" class from all autocomplete items:*/
		        for (var i = 0; i < x.length; i++) {
			        x[i].classList.remove("autocomplete-active");
		        }
	        }
	        function closeAllLists(elmnt) {
		        /*close all autocomplete lists in the document,
				except the one passed as an argument:*/
		        var x = document.getElementsByClassName("autocomplete-items");
		        for (var i = 0; i < x.length; i++) {
			        if (elmnt != x[i] && elmnt != inp) {
				        x[i].parentNode.removeChild(x[i]);
			        }
		        }
	        }
	        /*execute a function when someone clicks in the document:*/
	        document.addEventListener("click", function (e) {
		        closeAllLists(e.target);
	        });
        }
        let cities = [];
        var cityDetails = {!! json_encode($cities) !!};
        for (let index = 0; index <= cityDetails.length - 1; index++) {
	        cities.push(cityDetails[index].city_name);
        }
        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as
        possible autocomplete values:*/
        autocomplete(document.getElementById("choose-country"), cities);
        $(document).ready(function () {
	        $('#people').click(function (e) {
		        $('.display-none').toggleClass('d-flex');
	        });
        });
        /*$(document).bind('click', function (e) {
	       
        });*/
	</script>
@endsection
