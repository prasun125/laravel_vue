<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<title>{{ config('app.name', 'Laravel') }}</title>
		
		<!-- Logo -->
		<link href="{{ asset('assets/images/favicon.png') }}" rel="shortcut icon" type="image/x-icon"/>
		
		<!-- Font -->
		<link href="{{ asset('assets/fonts/font-roboto.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/fonts/font-material-icon.css') }}" rel="stylesheet" type="text/css">
		
		<!-- Styles -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="{{ asset('assets/css/newsletter.css') }}" rel="stylesheet" type="text/css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header class="bg-color font p-0-32 header--height-64px header--width-100p d-flex flex-dir-row a-i-center">
			<a href="{{ asset('/') }}" style="text-decoration: none;">CubaOnMiles<span>.com</span></a>
		</header>
		<div class="desktop display">
			<section class="banner p-l-32 d-flex flex-dir-row flex-wrap a-i-center">
				<div>
					<div class="p-b-8 uppercase">
						<div>
							the world is too big
						</div>
						<div>
							to travel without a driver
						</div>
					</div>
					<div class="uppercase p-b-24">
						the holiday planner platform that drive travellers anywhere
					</div>
					<div class="d-flex flex-dir-row a-i-center">
						<div class="uppercase percent-off flex-basis-45">
							get 15% off code on any driver and destination
						</div>
						<a href="#get-code" class="d-flex flex-dir-row a-i-center scroll" style="text-decoration: none;">
							<div class="uppercase get-code color-white p-8-24">
								get the code
							</div>
							<div class="right-arrow color-white d-flex flex-dir-row j-c-center a-i-center">
								<i class="material-icons">
									arrow_forward_ios
								</i>
							</div>
						</a>
					</div>
				</div>
			</section>
			<section id="#planning" class="width-100 max-width-100 planning p-32">
				<div class="color-white uppercase text-center p-48-0 planning-title">
					planning to visit a country?
				</div>
				<div class="d-flex flex-dir-row flex-wrap j-c-space-between a-i-center color-white">
					<div class="flex-basis-33 flex-grow-1 p-r-24 d-flex flex-dir-column a-i-center">
						<img src="{{ asset('assets/images/calender2.png') }}" class="calender">
						<div class="m-16-0 planning-description">
							Visiting a Country? Find out here what the most beautiful your destination has to offer. Pick your places, we take you there.
						</div>
					</div>
					<div class="flex-basis-33 flex-grow-1 p-0-24 d-flex flex-dir-column a-i-center">
						<img src="{{ asset('assets/images/calender2.png') }}" class="calender">
						<div class="m-16-0 planning-description">
							Visiting a Country? Find out here what the most beautiful your destination has to offer. Pick your places, we take you there.
						</div>
					</div>
					<div class="flex-basis-33 flex-grow-1 p-l-24 d-flex flex-dir-column a-i-center">
						<img src="{{ asset('assets/images/calender2.png') }}" class="calender">
						<div class="m-16-0 planning-description">
							Visiting a Country? Find out here what the most beautiful your destination has to offer. Pick your places, we take you there.
						</div>
					</div>
				</div>
				<div class="color-white text-center p-t-32 font-24">
					Cuba for 10 Days?
				</div>
				<div class="color-white text-center font-24">
					Play with us your trip for Free and get around in a Special 50's car for as little as 33£p/day
				</div>
			</section>
			<section id="#news-letter" class="width-100 max-width-100 planning p-32 news-letter" style="position: relative;">
				<div class="width-85">
					<img src="{{ asset('assets/images/hill-river.jpg') }}">
				</div>
				<form id="get-code" action="{{ URL::to('/newsletter') }}" method="POST" style="background-color: rgba(0, 0, 0, 0.5);font-size: 14px; padding: 24px 32px; color: white; width: 500px; bottom: 60px;">
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-6 required" style="padding-left: 0;">
							<label>First Name *</label>
							<input type="text" class="form-control" name="first_name" required>
						</div>
						<div class="form-group col-md-6 required" style="padding-right: 0;">
							<label>Last Name *</label>
							<input type="text" class="form-control" name="last_name">
						</div>
					</div>
					<div class="form-group">
						<label>Email *</label>
						<input type="email" class="form-control" name="email" required>
					</div>
					<div class="form-group">
						<label>Where are you planning to go *</label>
						<input type="text" class="form-control" name="planning_for" required>
					</div>
					<div class="form-group">
						<label>Days</label>
					</div>
					<div class="form-group">
						<div class="form-check radio-inline col-md-3">
							<input class="form-check-input" name="days" value="2-4" type="radio" id="radio120" checked="checked">
							<label class="form-check-label" for="radio120">2-4</label>
						</div>
						<div class="form-check radio-inline col-md-3">
							<input class="form-check-input" name="days"  value="5-8" type="radio" id="radio121">
							<label class="form-check-label" for="radio121">5-8</label>
						</div>
						<div class="form-check radio-inline col-md-3">
							<input class="form-check-input" name="days" value="9-13" type="radio" id="radio122">
							<label class="form-check-label" for="radio122">9-13</label>
						</div>
						<div class="form-check radio-inline col-md-2">
							<input class="form-check-input" name="days" value="14+" type="radio" id="radio122">
							<label class="form-check-label" for="radio122">14+</label>
						</div>
					</div>
					<div class="form-group">
						<label for="comment">We would love to hear any special request from you</label>
						<textarea class="form-control" rows="5" name="special_request"></textarea>
					</div>
					<div class="uppercase" style="font-size: 20px;">
						get complementary 15% off code to be used on any vehicle and destination before we get going
					</div>
					<div class="form-row">
						<div class="form-group col-md-6" style="padding-left: 0; padding-top: 32px;">
							<div class="d-flex flex-dir-row a-i-center" style="text-decoration: none;">
								<button class="uppercase get-code color-white p-8-24" style="font-size: 16px !important;">
									get the code
								</button>
								<div class="right-arrow color-white d-flex flex-dir-row j-c-center a-i-center" style="height: 38px; width: 38px;">
									<i class="material-icons">
										arrow_forward_ios
									</i>
								</div>
							</div>
						</div>
						<div class="form-group col-md-6" style="padding-right: 0;">
							<div class="d-flex flex-dir-row j-c-center a-i-center" style="padding-top: 32px;">
								<div style="margin: 0 8px;" class="text-center">
									<div class="color-white" style="font-size: 20px">05</div>
									<div class="color-white" style="font-size: 10px">DAYS</div>
								</div>
								<div style="margin: 0 8px;" class="text-center">
									<div class="color-white" style="font-size: 20px">22</div>
									<div class="color-white" style="font-size: 10px">HOURS</div>
								</div>
								<div style="margin: 0 8px;" class="text-center">
									<div class="color-white" style="font-size: 20px">05</div>
									<div class="color-white" style="font-size: 10px">MINUTES</div>
								</div>
								<div style="margin: 0 8px;" class="text-center">
									<div class="color-white" style="font-size: 20px">01</div>
									<div class="color-white" style="font-size: 10px">SECONDS</div>
								</div>
							</div>
						</div>
					</div>
					<div class="uppercase text-center" style="font-size: 10px; color: #0f74a8">
						100% privacy guaranteed
					</div>
				</form>
			</section>
			<div style="height: 50px; width: 100%; background-color: rgba(236, 64, 122, 1);"></div>
			<section class="width-100 max-width-100 planning p-32">
				<div class="color-white text-center p-48-0 planning-title">
					Who said a personal driver on holiday is only a luxury thing?
				</div>
				<div class="d-flex flex-dir-row j-c-space-between">
					<div style="padding-right: 32px;" class="flex-basis-50">
						<div style="margin-top: 24px;">
							<div>
								<img src="{{ asset('assets/images/traveller.png') }}" height="70" width="70">
							</div>
							<div class="color-white" style="margin: 8px 0; font-style: italic; font-size: 20px;">
								Travellers today are looking for something new when they travel, more adventurous, local and personal. Over 80% of respondents seek unique travel experiences and say that the best way to learn about a place is to live like the locals do.
							</div>
							<div style="text-align: right; color: rgba(255, 174, 66, 1); font-size: 20px">
								Airbnb
							</div>
						</div>
						<div style="margin-top: 24px;">
							<div>
								<img src="{{ asset('assets/images/dollar.png') }}" height="70" width="70">
							</div>
							<div class="color-white" style="margin: 8px 0; font-style: italic; font-size: 20px;">
								The constantly growing demand for oil supply, will directly influence the car rental industry. Dissatisfaction also comes from other different situations. From a lack of information on additional payments and excess amount, to waiting for hours in line to get the car they already booked.
							</div>
							<div style="text-align: right; color: rgba(255, 174, 66, 1); font-size: 20px">
								Car Target
							</div>
						</div>
					</div>
					<div style="padding-left: 32px;" class="flex-basis-50">
						<div style="margin-top: 24px;">
							<div class="d-flex flex-dir-row j-c-space-between a-i-center">
								<div>
									<span style="color: rgba(0, 197, 155, 1); font-size: 24px;">CubaOnMiles</span>
									<span style="color: rgba(255, 174, 66, 1); font-size: 24px;">.com</span>
								</div>
								<img src="{{ asset('assets/images/girl.png') }}" height="70" width="70">
							</div>
							<div class="color-white" style="margin: 8px 0; font-style: italic; font-size: 20px;">
								Our customers are looking for an authentic experience. They want to get off the beaten track and see something unique with an expert guide, safety and quality first. What excite me most is the special relationship we are building with our partners. In some cases we lowered costs as little as we would pay to rent a car on our own.
							</div>
							<div style="text-align: right; color: rgba(255, 174, 66, 1); font-size: 20px">
								Adele, CubaOnMiles.com Comms Strategist
							</div>
						</div>
						<div style="margin-top: 24px;">
							<div class="color-white" style="margin: 8px 0; font-style: italic; font-size: 20px;">
								I am really excited to be part of this team. I know I can provide what is needed for an unforgettable trip. I will be driving and guiding you to see what the most beautiful my country has. Welcome on board!
							</div>
							<div style="text-align: right; color: rgba(255, 174, 66, 1); font-size: 20px">
								Ismel, CubaOnMiles.com Driver and Guide
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="width-100 max-width-100 planning" style="padding: 48px 32px;">
				<div style="font-size: 24px" class="color-white text-center">
					Reshaping the way of travelling, get your discount now before we launch
				</div>
				<div class="d-flex flex-dir-row j-c-center a-i-center" style="padding-top: 32px;">
					<div style="margin: 0 16px;" class="text-center">
						<div class="color-white" style="font-size: 48px;">05</div>
						<div class="color-white">DAYS</div>
					</div>
					<div style="margin: 0 16px;" class="text-center">
						<div class="color-white" style="font-size: 48px;">22</div>
						<div class="color-white">HOURS</div>
					</div>
					<div style="margin: 0 16px;" class="text-center">
						<div class="color-white" style="font-size: 48px;">05</div>
						<div class="color-white">MINUTES</div>
					</div>
					<div style="margin: 0 16px;" class="text-center">
						<div class="color-white" style="font-size: 48px;">01</div>
						<div class="color-white">SECONDS</div>
					</div>
				</div>
			</section>
		</div>
		<div class="mobile display width-100 max-width-100">
			<div class="uppercase color-white text-center p-0-8 width-100 max-width-100" style="background-color: rgba(0, 0, 0, 1); padding-bottom: 32px;">
				the holiday planner platform that drive travellers anywhere
			</div>
			<div class="color-white text-center uppercase p-0-8 width-100 max-width-100" style="background-color: rgba(236, 64, 122, 1); padding-top: 12px; padding-bottom: 12px; font-size: 14px;">
				a person drive on holiday, that is it.
			</div>
			<section class="banner width-100 max-width-100" style="height: 250px;"></section>
			<div class="off color-white text-center uppercase p-0-8 width-100 max-width-100" style="background-color: rgba(236, 64, 122, 1); padding-top: 12px; padding-bottom: 12px; font-size: 14px; position: relative;">
				any driver and destination 15% off
			</div>
			<div style="background-color: rgba(0, 0, 0, 1);" class="p-0-8 width-100 max-width-100">
				<div class="text-center width-100 max-width-100" style="padding-top: 20px; padding-bottom: 8px; color: rgba(255, 174, 66, 1);">
					Who said a personal driver on holiday is only a luxury thing?
				</div>
				<div class="text-center width-100 max-width-100" style="padding-top: 8px; padding-bottom: 8px; color: rgba(255, 174, 66, 1);">
					From the most remote beaches to breathe the culture. No matter what, you have a personal driver
				</div>
				<form class="width-100 max-width-100" id="get-code" action="{{ URL::to('/newsletter') }}" method="POST" style="font-size: 14px; color: white; padding: 16px 0;">
					{{ csrf_field() }}
					<div class="form-row col-md-12" style="padding: 0; display: inline-flex;">
						<div class="form-group col-md-6" style="padding-left: 0;">
							<label>First Name *</label>
							<input type="text" class="form-control" name="first_name" required>
						</div>
						<div class="form-group col-md-6" style="padding-right: 0;">
							<label>Last Name *</label>
							<input type="text" class="form-control" name="last_name">
						</div>
					</div>
					<div class="form-group">
						<label>Email *</label>
						<input type="email" class="form-control" name="email" required>
					</div>
					<div class="form-group">
						<label>Where are you planning to go *</label>
						<input type="text" class="form-control" name="planning_for" required>
					</div>
					<div class="form-group">
						<label>Days</label>
					</div>
					<div class="form-group">
						<div class="form-check radio-inline col-md-3">
							<input class="form-check-input" name="days" value="2-4" type="radio" id="radio120" checked="checked">
							<label class="form-check-label" for="radio120">2-4</label>
						</div>
						<div class="form-check radio-inline col-md-3">
							<input class="form-check-input" name="days" value="5-8" type="radio" id="radio121">
							<label class="form-check-label" for="radio121">5-8</label>
						</div>
						<div class="form-check radio-inline col-md-3">
							<input class="form-check-input" name="days" value="9-13" type="radio" id="radio122">
							<label class="form-check-label" for="radio122">9-13</label>
						</div>
						<div class="form-check radio-inline col-md-2">
							<input class="form-check-input" name="days" value="14+" type="radio" id="radio122">
							<label class="form-check-label" for="radio122">14+</label>
						</div>
					</div>
					<div class="form-group">
						<label for="comment">We would love to hear any special request from you</label>
						<textarea class="form-control" rows="5" name="special_request"></textarea>
					</div>
					<div class="uppercase text-center" style="font-size: 16px; color: rgba(255, 174, 66, 1);">
						15% off to use on your next trip
					</div>
					<div class="form-row">
						<div class="form-group col-md-6 d-flex flex-dir-row j-c-center" style="padding-left: 0; padding-top: 32px; padding-right: 0;">
							<div class="d-flex flex-dir-row a-i-center" style="text-decoration: none;">
								<button class="uppercase get-code color-white p-8-24" style="font-size: 16px !important;">
									get the code
								</button>
								<div class="right-arrow color-white d-flex flex-dir-row j-c-center a-i-center" style="height: 38px; width: 38px;">
									<i class="material-icons">
										arrow_forward_ios
									</i>
								</div>
							</div>
						</div>
					</div>
					<div class="uppercase text-center" style="font-size: 10px; color: #0f74a8">
						100% privacy guaranteed
					</div>
				</form>
			</div>
			<div class="uppercase text-center width-100 max-width-100" style="padding: 16px 8px;">
				need inspiration?
			</div>
			<div class="uppercase text-center width-100 max-width-100" style="padding: 16px 8px; font-style: italic;">
				Discover all Cuba on a Special 50's car for as little as 33£ p/day
			</div>
			<div class="width-100 max-width-100 p-0-8">
				<img src="{{ asset('assets/images/banner1.jpg') }}"  class="width-100 max-width-100">
			</div>
			<div class="width-100 max-width-100 p-8">
				<div style="border: 1px solid black; padding: 16px 8px; position: relative;" class="excite-me">
					What excite me most is the possibility to explore and gets to know the hidden gems that usual only locals are aware of. This is probably the strength of our expert guides, they know their country and can't wait to shown travellers its secrets.
				</div>
			</div>
			<div class="width-100 max-width-100 p-8 d-flex flex-dir-row j-c-space-between a-i-center" style="padding-top: 16px;">
				<div>
					<img src="{{ asset('assets/images/girl.png') }}" height="70" width="70">
				</div>
				<div style="text-align: right; color: rgba(255, 174, 66, 1); font-size: 18px">
					Adele, Comms Strategist
				</div>
			</div>
			<div class="width-100 max-width-100 p-8" style="padding-top: 16px; padding-bottom: 16px;">
				<div class="d-flex flex-dir-row j-c-space-between" style="padding-top: 8px; padding-bottom: 8px;">
					<div style="height: 70px; width: 70px; border-radius: 50%; border: 2px solid black; flex-basis: 70px;" class="d-flex flex-dir-row j-c-center a-i-center">
						1
					</div>
					<div style="padding-left: 16px; flex-basis: 80%;">
						Our promise? What excite me most is the possibility to explore and gets to know the hidden
					</div>
				</div>
				<div class="d-flex flex-dir-row j-c-space-between" style="padding-top: 8px; padding-bottom: 8px;">
					<div style="height: 70px; width: 70px; border-radius: 50%; border: 2px solid black; flex-basis: 70px;" class="d-flex flex-dir-row j-c-center a-i-center">
						2
					</div>
					<div style="padding-left: 16px; flex-basis: 80%;">
						Gems that usual only locals are aware of. This is probably strength of our expert
					</div>
				</div>
				<div class="d-flex flex-dir-row j-c-space-between" style="padding-top: 8px; padding-bottom: 8px;">
					<div style="height: 70px; width: 70px; border-radius: 50%; border: 2px solid black; flex-basis: 70px;" class="d-flex flex-dir-row j-c-center a-i-center">
						3
					</div>
					<div style="padding-left: 16px; flex-basis: 80%;">
						Guides, they know their country and can’t wait to shown to travellers its secret
					</div>
				</div>
			</div>
			<div class="width-100 max-width-100 p-8">
				<div class="text-center" style="color: rgba(236, 64, 122, 1); font-size: 20px; padding: 16px 0;">
					THE WORLD IS TOO BIG TO TRAVEL WITHOUT A DRIVER
				</div>
				<div class="width-100 max-width-100">
					<img src="{{ asset('assets/images/banner1.jpg') }}"  class="width-100 max-width-100">
				</div>
				<div style="font-size: 20px; padding: 16px 0;">
					Cras ultricies ligula sed magna dictum porta.
				</div>
			</div>
			<div class="width-100 max-width-100 p-8">
				<div class="text-center" style="color: rgba(0, 197, 155, 1); font-size: 20px; padding: 16px 0;">
					EXPLORE THE HIDDEN GEMS
				</div>
				<div class="width-100 max-width-100">
					<img src="{{ asset('assets/images/banner1.jpg') }}"  class="width-100 max-width-100">
				</div>
				<div style="font-size: 20px; padding: 16px 0;">
					Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.
				</div>
			</div>
			<div class="width-100 max-width-100 p-8">
				<div class="text-center" style="color: rgba(0, 197, 155, 1); font-size: 20px; padding: 16px 0;">
					EXPLORE THE HIDDEN GEMS
				</div>
				<div class="width-100 max-width-100">
					<img src="{{ asset('assets/images/banner1.jpg') }}"  class="width-100 max-width-100">
				</div>
				<div style="font-size: 20px; padding: 16px 0;">
					Quisque velit nisi, pretium ut lacinia in, elementum id enim.
				</div>
			</div>
			<section class="width-100 max-width-100 p-0-8" style="background-color: black;">
				<div style="font-size: 20px; padding: 16px 0;" class="color-white text-center">
					Reshaping the way of travelling, get your discount now before we launch
				</div>
				<div class="d-flex flex-dir-row j-c-space-between a-i-center" style="padding-top: 24px; padding-bottom: 32px;">
					<div class="text-center">
						<div class="color-white" style="font-size: 48px;">05</div>
						<div class="color-white">DAYS</div>
					</div>
					<div class="text-center">
						<div class="color-white" style="font-size: 48px;">22</div>
						<div class="color-white">HOURS</div>
					</div>
					<div class="text-center">
						<div class="color-white" style="font-size: 48px;">05</div>
						<div class="color-white">MINUTES</div>
					</div>
					<div class="text-center">
						<div class="color-white" style="font-size: 48px;">01</div>
						<div class="color-white">SECONDS</div>
					</div>
				</div>
			</section>
		</div>
		@if(Session::get('success'))
			<div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 0;
    position: fixed;
    bottom: 0;
    width: 100%;">
				<strong>{{Session::get('success')}}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@elseif(Session::get('error'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<strong>{{Session::get('error')}}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		<script type="text/javascript">
			$(document).ready(function () {
				let scrollLink = $('.scroll');
				scrollLink.click(function(e) {
					e.preventDefault();
					$('body,html').animate({
						scrollTop: $(this.hash).offset().top
					}, 1000 );
				});
			});
		</script>
	</body>
</html>