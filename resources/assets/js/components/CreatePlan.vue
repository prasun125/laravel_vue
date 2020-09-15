<template>
	<main>
		<section class="banner-container height-100vh max-height-80vh width-100 max-width-100 d-flex flex-dir-row j-c-center a-i-center pos-relative">
			<img :src="'/assets/images/bg.jpg'" class="pos-absolute"/>
			<div class="d-flex flex-dir-column flex-wrap j-c-space-between a-i-center">
				<div class="font-white uppercase welcome-title text-center">
					welcome to cuba
				</div>
				<p class="font-white uppercase text-center">
					Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus.
				</p>
			</div>
		</section>
		<section class="container m-b-32 d-flex flex-dir-row p-0">
			<div class="left-container">
				<div class="d-flex j-c-space-between a-i-center">
					<span class="font-lato font-size-14 date-selector" style="flex-grow: 1;" v-model="tripStartDate, tripEndDate" v-if="tripStartDate, tripEndDate">{{ tripStartDate }} - {{ tripEndDate}}</span>
					<span class="font-lato font-size-14 date-selector" style="flex-grow: 1; visibility: hidden;" v-else>No dates are selected</span>
					<small style="flex-grow: 1;" class="d-flex j-c-end a-i-center">
						<a class="edit-dates cur-point pos-relative font-bold">
							Edit dates
						</a>
					</small>
				</div>
				<div id="show-calender" style="margin-top: 10px;"></div>
				<div class="d-flex flex-dir-column a-i-center m-t-20">
					<div class="uppercase price-summary-title d-flex j-c-center a-i-center font-white font-size-14 font-lato">
						price summary
					</div>
					<div class="price-summary-details min-width-100 width-100 max-width-100">
						<div class="d-flex flex-dir-row j-c-space-between">
							<div class="font-size-14">
								Today you'll pay
							</div>
							<div class="uppercase font-size-14" v-model="routeDetails.price.payToday">
								{{ routeDetails.price.payToday }} gbp
							</div>
						</div>
						<div class="d-flex flex-dir-row j-c-space-between">
							<div class="font-size-14">
								You'll pay at the driver
							</div>
							<div class="uppercase font-size-14" v-model="routeDetails.price.payDriver">
								{{ routeDetails.price.payDriver }} gbp
							</div>
						</div>
						<div class="d-flex flex-dir-row j-c-space-between">
							<div class="uppercase font-size-14">
								total
							</div>
							<div class="uppercase font-size-14" v-model="routeDetails.price.total">
								{{ routeDetails.price.total }} gbp
							</div>
						</div>
						<div class="d-flex flex-dir-row j-c-space-between">
							<div class="uppercase font-red font-size-14" style="font-weight: 400;">
								TOT Pax/Day
							</div>
							<div class="uppercase font-red font-size-14" style="font-weight: 400;" v-model="routeDetails.price.paxPerDay">
								{{ routeDetails.price.paxPerDay }} gbp
							</div>
						</div>
					</div>
				</div>
				<!--<div class="d-flex flex-dir-column a-i-center">
					<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-16 font-size-12" style="font-weight: 600;">
						Get a promo code?
					</div>
					<form class="promo-code min-width-100 width-100 max-width-100 d-flex flex-dir-row j-c-space-between a-i-center m-t-16">
						<input title="Enter your promo code here" type="text" placeholder="Enter your code" class="font-size-14">
						<button class="uppercase background-color-orange font-white p-0-16 font-size-14">
							get
						</button>
					</form>
					<small class="voucher-exceed-error">
						<i class="material-icons">
							close
						</i>
						<small class="font-red">
							the voucher has exceeded the maximum number of usage! NLP9S5PDA9
						</small>
					</small>
				</div>-->
				<small class="d-flex flex-dir-row j-c-end m-t-16">
					<a class="edit-currency font-bold cur-point" id="edit-currency">
						Edit currency
					</a>
				</small>
				<section class="vehicle-type d-flex flex-dir-column a-i-center">
					<div class="uppercase vehicle-type-title d-flex j-c-center a-i-center font-white font-size-14 font-lato">
						vehicle type
					</div>
					<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row j-c-space-between a-i-center" v-model="selectedVehicle">
						<img :src="'/admin/assets/images/vehicles/' + selectedVehicle.vehicle_image">
						<div class="d-flex flex-dir-column j-c-space-between a-i-end">
							<div>
								<div class="capitalize text-center m-t-4 font-size-14">
									{{ selectedVehicle.vehicle_name }}
								</div>
								<div class="m-t-4 d-flex flex-dir-row j-c-space-evenly a-i-center">
									<img :src="'/assets/images/icons/person-icon.svg'">
									<span class="font-size-12">
										{{ selectedVehicle.passenger }}
									</span>
									<img :src="'/assets/images/icons/luggage-icon.svg'">
									<span class="font-size-12">
										{{ selectedVehicle.bag }}
									</span>
								</div>
							</div>
							<small class="d-flex flex-dir-row j-c-end m-t-16">
								<a class="edit-currency capitalize cur-point font-bold" id="edit-vehicle">
									edit vehicle
								</a>
							</small>
						</div>
					</div>
				</section>
				<section class="travellers d-flex flex-dir-column a-i-center pos-relative">
					<div class="pos-absolute seat-info font-lato" v-if="showTravellerMessage">
						Children are upto 2 years old. If not occupying a seat by child seat (not provided), children can be carried free of charge.
					</div>
					<div class="uppercase travellers-title d-flex j-c-center a-i-center font-white font-size-14 font-lato">
						travellers
					</div>
					<div class="d-flex j-c-end a-i-center min-width-100 width-100 max-width-100 m-t-8">
						<i class="material-icons" style="color: grey; font-size: 20px;" @mouseover="showTravellerMessage = !showTravellerMessage" @mouseleave="showTravellerMessage = !showTravellerMessage">
							help
						</i>
					</div>
					<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row m-t-8 font-lato" v-model="editTravellers" v-if="editTravellers === false">
						<img :src="'/assets/images/icons/people-grey-icon.svg'" class="m-r-4">
						<span class="m-r-4" style="font-weight: bold;">
							{{ adult }}
						</span>
						<span class="m-r-4">
							adult<span v-if="adult > 1">s</span> -
						</span>
						<span class="m-r-4" style="font-weight: bold;">
							{{ child }}
						</span>
						<span class="m-r-4" v-if="child <= 1">
							child
						</span>
						<span class="m-r-4" v-else>
							children
						</span>
					</div>
					<small class="min-width-100 width-100 max-width-100 d-flex flex-dir-row j-c-end" v-model="editTravellers" v-if="editTravellers === false">
						<a class="edit-currency capitalize cur-point font-bold" @click="editTravellers = !editTravellers">
							edit travellers
						</a>
					</small>
					<div class="travellers-count min-width-100 width-100 max-width-100 d-flex flex-wrap j-c-space-evenly a-i-center" v-model="editTravellers" v-if="editTravellers">
						<div>
							<div class="d-flex j-c-space-evenly a-i-center">
								<i class="material-icons cur-point" @click="decreaseAdult" v-model="adult">
									remove
								</i>
								<div class="font-lato">
									<span style="font-weight: bold;">
										{{ adult }}
									</span>
									<span>adult<span v-if="adult > 1">s</span></span>
								</div>
								<i class="material-icons cur-point" @click="increaseAdult" v-model="adult">
									add
								</i>
							</div>
							<div class="d-flex j-c-space-evenly a-i-center m-t-16">
								<i class="material-icons cur-point" @click="decreaseChild" v-model="child">
									remove
								</i>
								<div>
									<span style="font-weight: bold;">
										{{ child }}
									</span>
									<span v-if="child <= 1">child</span>
									<span v-else>children</span>
								</div>
								<i class="material-icons cur-point" @click="increaseChild" v-model="child">
									add
								</i>
							</div>
						</div>
						<div>
							<div class="check-container background-color-green d-flex j-c-center a-i-center cur-point" @click="checkedTraveller">
								<i class="material-icons cur-point font-white">
									check
								</i>
							</div>
						</div>
					</div>
				</section>
				<section class="reservation d-flex flex-dir-column a-i-center">
					<div class="uppercase reservation-title d-flex j-c-center a-i-center font-white font-lato">
						your reservation include
					</div>
					<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-column m-16-0">
						<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center" v-if="tripStartDate">
							<span class="font-green font-size-14 font-lato font-bold" style="letter-spacing: 1px;">
								{{ freeCancellationText }}
							</span>
						</div>
						<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center" v-else>
							<img :src="'/assets/images/icons/check-mark.svg'" class="m-r-8">
							<span class="font-green font-size-14 font-lato">
								FREE Cancellation
							</span>
						</div>
						<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center m-t-2">
							<img :src="'/assets/images/icons/check-mark-black.svg'" class="m-r-8">
							<span class="font-size-14 font-lato">
								Airport Pick up
							</span>
						</div>
						<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center m-t-2">
							<img :src="'/assets/images/icons/check-mark-black.svg'" class="m-r-8">
							<span class="capitalize font-size-14 font-lato">
								driver
							</span>
						</div>
						<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center m-t-2">
							<img :src="'/assets/images/icons/check-mark-black.svg'" class="m-r-8">
							<span class="font-size-14 font-lato">
								Amend on the go
							</span>
						</div>
					</div>
					<small class="min-width-100 width-100 max-width-100 d-flex flex-dir-row">
						<a class="edit-currency capitalize cur-point">
							What are my booking conditions?
						</a>
					</small>
				</section>
				<section class="first-pickup d-flex flex-dir-column a-i-center">
					<div class="uppercase first-pickup-title d-flex j-c-center a-i-center font-white font-size-14 font-lato">
						your first pick up
					</div>
					<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-column m-16-0">
						<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center">
							<img :src="'/assets/images/icons/calendar-icon-black.svg'" class="m-r-8 m-b-2">
							<small v-if="routeDetails.cities.length >= 1" class="font-lato" style="font-size: 12px;">
								{{ routeDetails.cities[0].pickup.date }}
							</small>
							<i style="color: rgba(0, 0, 0, 0.5);" class="font-size-12" v-else>
								Select pick up date on calender
							</i>
						</div>
						<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center m-t-16">
							<img :src="'/assets/images/icons/location-black-icon.svg'" class="m-r-8">
							<small class="capitalize font-lato" style="font-size: 12px;" v-if="routeDetails.cities.length >= 1 && routeDetails.cities[0].pickupAddress !== 'Not sure yet'">
								{{ routeDetails.cities[0].pickup.address }}
							</small>
						</div>
						<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center m-t-16">
							<img :src="'/assets/images/icons/time-icon-black.svg'" class="m-r-8">
							<small class="font-lato" style="font-size: 12px;" v-if="routeDetails.cities.length >= 1 && routeDetails.cities[0].pickupTime !== 'Not sure yet'">
								{{ routeDetails.cities[0].pickup.time }}
							</small>
						</div>
					</div>
					<small class="min-width-100 width-100 max-width-100 d-flex flex-dir-row j-c-end">
						<a class="edit-currency capitalize font-bold cur-point" @click="openPickupModal(0)">
							Edit address
						</a>
					</small>
				</section>
				<section class="d-flex flex-dir-column a-i-center">
					<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-column m-16-0">
						<small class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center m-t-8 font-lato" style="font-weight: 600;">
							Add it later! We will remind you anyway.
						</small>
						<small class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center font-lato">
							You can still book your driver indicating just the pick up city. If you don't know the address yet Add it at Later stage. Just go to "My Plan" after booking
						</small>
					</div>
				</section>
			</div>
			<div class="right-container">
				<div class="d-flex flex-dir-row flex-wrap j-c-space-between a-i-center">
					<div class="d-flex flex-dir-column">
						<div class="your-plan">
							Here is your plan
						</div>
						<div class="font-size-10 font-bold m-t-8" v-if="routeDetails.cities.length > 0" v-model="routeDetails">
							<a :href="registerLink" style="color: #0f74a8; text-decoration: underline;">
								Sign in
							</a>
							to book with your saved details or
							<a :href="loginLink" style="color: #0f74a8; text-decoration: underline;">
								register
							</a>
							to access your plan from any device
						</div>
					</div>
					<div class="icon-container d-flex flex-dir-row j-c-space-evenly a-i-center">
						<img :src="'assets/images/icons/print-icon.svg'" class="m-r-12">
						<img :src="'assets/images/icons/share-icon.svg'" class="m-r-12">
						<img :src="'assets/images/icons/favourite-icon.svg'" class="m-r-24">
						<button class="uppercase background-color-green font-white book-now font-size-12 font-lato" @click="bookPlan">
							book now
						</button>
					</div>
				</div>
				<div class="plan-details">
					<div class="d-flex flex-dir-column a-i-center pos-relative" v-model="routeDetails" v-for="(items, index) in routeDetails.cities" v-if="routeDetails.cities.length">
						<div class="vertical-line display-none" v-if="items.lastDestination === true && lastDestination === true && index === 0"></div>
						<div class="vertical-line" v-else></div>
						<div class="min-width-100 width-100 max-width-100 d-flex flex-wrap a-i-center" v-if="typeof items.firstaddon === 'object' && items.firstaddon != ''">
							<div class="addon-container d-flex a-i-center" style="padding-left: 34px;">
								<div class="d-flex a-i-center">
									<span class="addon-icon-wrapper d-flex j-c-center a-i-center">
										<span class="addon-icon d-flex j-c-center a-i-center">
											<img :src="'assets/images/icons/location-green-icon.svg'" style="height: 14px; width: 14px;">
										</span>
									</span>
									<div>
										<div class="capitalize font-size-14">
											{{ items.firstaddon.city_name }}
										</div>
									</div>
									<img :src="'assets/images/icons/edit-icon.svg'" class="m-l-16 cur-point" @click="prepareEditModal(index, 0)">
								</div>
								<div class="d-flex j-c-end a-i-center m-t-20 m-b-20 flex-basis-50">
									<img :src="'assets/images/icons/car-icon.svg'">
									<span class="font-size-12 m-l-8 font-lato" v-model="items.firstaddon.prevDistance">
										{{ items.firstaddon.prevDistance | distanceMeterToKm }} Km
									</span>
									<img :src="'assets/images/icons/time-icon-black.svg'" class="m-l-8">
									<span class="font-size-12 m-l-8 font-lato" v-model="items.firstaddon.prevTime">
										{{ items.firstaddon.prevTime }}
									</span>
								</div>
							</div>
						</div>
						<div class="min-width-100 width-100 max-width-100 d-flex flex-wrap a-i-center" v-if="typeof items.secondaddon === 'object' && items.secondaddon != ''">
							<div class="addon-container d-flex a-i-center" style="padding-left: 34px;">
								<div class="d-flex a-i-center">
									<span class="addon-icon-wrapper d-flex j-c-center a-i-center">
										<span class="addon-icon d-flex j-c-center a-i-center">
											<img :src="'assets/images/icons/location-green-icon.svg'" style="height: 14px; width: 14px;">
										</span>
									</span>
									<div>
										<div class="capitalize font-size-14">
											{{ items.secondaddon.city_name }}
										</div>
									</div>
									<img :src="'assets/images/icons/edit-icon.svg'" class="m-l-16 cur-point" @click="prepareEditModal(index, 1)">
								</div>
								<div class="d-flex j-c-end a-i-center m-t-20 m-b-20 flex-basis-50">
									<img :src="'assets/images/icons/car-icon.svg'">
									<span class="font-size-12 m-l-8 font-lato" v-model="items.secondaddon.prevDistance">
										{{ items.secondaddon.prevDistance | distanceMeterToKm }} Km
									</span>
									<img :src="'assets/images/icons/time-icon-black.svg'" class="m-l-8">
									<span class="font-size-12 m-l-8 font-lato" v-model="items.secondaddon.prevTime">
										{{ items.secondaddon.prevTime }}
									</span>
								</div>
							</div>
						</div>
						<div class="click-to-start-container d-flex a-i-center" style="min-height: 60px; height: 60px; max-height: 60px;" v-model="bordernoneActive" v-bind:class="{ bordernone: bordernoneActive }" v-if="index !== 0">
							<span class="add-icon d-flex flex-dir-row j-c-center a-i-center" style="background-color: rgba(250, 250, 250, 1);" @click="showModal = !showModal, destinationIndex = index">
								<i class="material-icons cur-point font-size-16">
									add
								</i>
							</span>
							<div class="font-lato" style="font-size: 16px;">
								Just a look on the way
							</div>
							<div class="font-lato" v-if="routeDetails.cities.length === 0">
								<div class="font-bold">
									Click to start
								</div>
								<div>
									the beginning of an unforgettable journey
								</div>
							</div>
						</div>
						<div class="click-to-start-container d-flex a-i-center" style="min-height: 60px; height: 60px; max-height: 60px;" v-model="bordernoneActive" v-bind:class="{ bordernone: bordernoneActive }" v-if="index !== 0">
							<span class="add-icon d-flex flex-dir-row j-c-center a-i-center" style="background-color: rgba(250, 250, 250, 1);" @click="prepareAddSomeNightModal('none', index - 1)">
								<i class="material-icons cur-point">
									add
								</i>
							</span>
							<div class="font-lato">
								Add new destination
							</div>
							<div class="font-lato" v-if="routeDetails.cities.length === 0">
								<div class="font-bold">
									Click to start
								</div>
								<div>
									the beginning of an unforgettable journey
								</div>
							</div>
						</div>
						<div class="destination-container d-flex pos-relative">
							<div class="d-flex">
								<span class="d-flex flex-dir-row j-c-center a-i-center location-icon" style="background-color: rgba(250, 250, 250, 1);">
									<img :src="'assets/images/icons/location-green-icon.svg'" style="height: 20px; width: 20px;">
								</span>
								<div>
									<div>
										{{ items.city.city_name }}
									</div>
									<div v-if="items.lastDestination === true && lastDestination === true && index !== 0">
										drop off location
									</div>
									<div v-else>
										{{ items.totalDay }}
										<span v-if="items.totalDay > 1">days</span>
										<span v-else>day</span>
										{{ items.totalNight }}
										<span v-if="items.totalNight > 1">nights</span>
										<span v-else>night</span>
									</div>
									<div class="font-size-12 m-t-12 font-green check-free cur-point" @click="openMiddleAddonModal(index, items)" v-if="items.betweenDate === true">
										What's to explore
									</div>
									<div class="d-flex flex-wrap j-c-space-between a-i-center" style="margin-left: -16px;" v-for="(middleAddon, middleAddonIndex) in items.middleAddons" v-if="middleAddon.city1 || middleAddon.city2">
										<div class="d-flex a-i-center m-t-12 min-width-100 width-100 max-width-100" v-if="middleAddon.city1">
											<img :src="'assets/images/icons/edit-icon.svg'" class="cur-point" @click="openMiddleAddonModal(index, items, middleAddonIndex)">
											<span class="addon-icon d-flex j-c-center a-i-center m-l-8">
												<img :src="'assets/images/icons/location-green-icon.svg'" style="height: 16px; width: 16px;">
											</span>
											<span class="font-size-14 capitalize m-l-8" style="flex-grow: 1;">
												{{ middleAddon.city1.city_name | trimCityName }}
											</span>
											<span class="font-size-12 font-lato" style="color: rgba(0, 0, 0, 0.5);">
												on {{ middleAddonIndex | filterMiddleAddonDate }}
											</span>
										</div>
										<div class="d-flex a-i-center m-t-12 min-width-100 width-100 max-width-100" v-if="middleAddon.city2">
											<img :src="'assets/images/icons/edit-icon.svg'" class="cur-point" @click="openMiddleAddonModal(index, items, middleAddonIndex)">
											<span class="addon-icon d-flex j-c-center a-i-center m-l-8">
												<img :src="'assets/images/icons/location-green-icon.svg'" style="height: 16px; width: 16px;">
											</span>
											<span class="font-size-14 capitalize m-l-8" style="flex-grow: 1;">
												{{ middleAddon.city2.city_name | trimCityName }}
											</span>
											<span class="font-size-12 font-lato" style="color: rgba(0, 0, 0, 0.5);">
												on {{ middleAddonIndex | filterMiddleAddonDate }}
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="destination-vertical-bar"></div>
							<div class="d-flex flex-dir-column j-c-center a-i-center">
								<div class="min-width-100 width-100 max-width-100" v-if="index === 0">
									<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2">
										<span class="uppercase font-lato font-size-14" style="letter-spacing: 2px;">
											pick up
										</span>
										<small class="capitalize m-l-8 cur-point edit-address" @click="openPickupModal(index)">
											edit address
										</small>
									</div>
									<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2">
										<img :src="'assets/images/icons/time-icon-black.svg'">
										<span class="font-lato m-l-4 font-size-12" v-if="items.pickup.time === ''">
											Not sure yet -
										</span>
										<span class="font-lato m-l-4 font-size-12" v-else>
											{{ items.pickup.time }} -
										</span>
										<img :src="'assets/images/icons/calendar-icon-black.svg'" class="m-l-4">
										<span class="font-lato m-l-4 font-size-12">
											{{ items.pickup.date }}
										</span>
									</div>
									<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2">
										<img :src="'assets/images/icons/location-black-icon.svg'">
										<span class="capitalize font-lato m-l-4 font-size-12" v-if="items.pickup.address === ''">
											Not sure yet
										</span>
										<span class="capitalize font-lato m-l-4 font-size-12" v-else>
											{{ items.pickup.address }}
										</span>
									</div>
								</div>
								<hr style="margin-bottom: 16px; border-top: 1px solid rgba(0, 0, 0, 0.3);" v-if="items.lastDestination === true && index === 0">
								<div class="min-width-100 width-100 max-width-100" v-else-if="index !== 0 && items.lastDestination === false">
									<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2">
										<span class="uppercase font-lato font-size-14" style="letter-spacing: 2px;">
											arriving
										</span>
										<small class="capitalize m-l-8 cur-point edit-address" @click="openArrivingModal(index)">
											edit address
										</small>
									</div>
									<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2">
										<img :src="'assets/images/icons/time-icon-black.svg'">
										<span class="font-lato m-l-4 font-size-12" v-if="items.arriving.time === ''">
											Not sure yet -
										</span>
										<span class="font-lato m-l-4 font-size-12" v-else>
											{{ items.arriving.time }} -
										</span>
										<img :src="'assets/images/icons/calendar-icon-black.svg'" class="m-l-4">
										<span class="font-lato m-l-4 font-size-12">
											{{ items.arriving.date }}
										</span>
									</div>
									<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2">
										<img :src="'assets/images/icons/location-black-icon.svg'">
										<span class="capitalize font-lato m-l-4 font-size-12" v-if="items.arriving.address === ''">
											Not sure yet
										</span>
										<span class="capitalize font-lato m-l-4 font-size-12" v-else>
											{{ items.arriving.address }}
										</span>
									</div>
								</div>
								<div class="min-width-100 width-100 max-width-100" v-if="items.lastDestination === true && lastDestination === true">
									<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2">
										<span class="uppercase font-lato font-size-14" style="letter-spacing: 2px;">
											drop off
										</span>
										<small class="capitalize m-l-8 cur-point edit-address" @click="openDropoffModal(index)">
											edit address
										</small>
									</div>
									<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2">
										<img :src="'assets/images/icons/time-icon-black.svg'">
										<span class="font-lato m-l-4 font-size-12" v-if="items.dropoff.time === ''">
											Not sure yet -
										</span>
										<span class="font-lato m-l-4 font-size-12" v-else>
											{{ items.dropoff.time }} -
										</span>
										<img :src="'assets/images/icons/calendar-icon-black.svg'" class="m-l-4">
										<span class="font-lato m-l-4 font-size-12">
											{{ items.dropoff.date }}
										</span>
									</div>
									<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2">
										<img :src="'assets/images/icons/location-black-icon.svg'">
										<span class="capitalize font-lato m-l-4 font-size-12" v-if="items.dropoff.address === ''">
											Not sure yet
										</span>
										<span class="capitalize font-lato m-l-4 font-size-12" v-else>
											{{ items.dropoff.address }}
										</span>
									</div>
								</div>
								<hr style="margin-bottom: 16px; border-top: 1px solid rgba(0, 0, 0, 0.3);" v-if="items.lastDestination === false">
								<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2" v-if="items.lastDestination === false">
									<span class="uppercase font-lato font-size-14" style="letter-spacing: 2px;">
										departing
									</span>
									<small class="capitalize m-l-8 cur-point edit-address" @click="openDepartingModal(index)">
										edit address
									</small>
								</div>
								<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2" v-if="items.lastDestination === false">
									<img :src="'assets/images/icons/time-icon-black.svg'">
									<span class="font-lato m-l-4 font-size-12" v-if="items.departing.time === ''">
										Not sure yet -
									</span>
									<span class="font-lato m-l-4 font-size-12" v-else>
										{{ items.departing.time }} -
									</span>
									<img :src="'assets/images/icons/calendar-icon-black.svg'" class="m-l-4">
									<span class="font-lato m-l-4 font-size-12">
										{{ items.departing.date }}
									</span>
								</div>
								<div class="d-flex a-i-center min-width-100 width-100 max-width-100 m-t-2" v-if="items.lastDestination === false">
									<img :src="'assets/images/icons/location-black-icon.svg'">
									<span class="font-lato m-l-4 font-size-12" v-if="items.departing.address === '' || items.pickup.address === items.departing.address">
										Same as pick up
									</span>
									<span class="capitalize font-lato m-l-4 font-size-12" v-else>
										{{ items.departing.address }}
									</span>
								</div>
							</div>
							<img :src="'assets/images/icons/edit-in-square.svg'" class="pos-absolute cur-point" style="top: -2px; right: -2px;" @click="prepareEditModal(index)">
						</div>
					</div>
					<div class="click-to-start-container d-flex a-i-center pos-relative" style="min-height: 100px;" v-model="routeDetails, bordernoneActive, lastDestination" v-bind:class="{ bordernone: bordernoneActive }" v-if="lastDestination === false">
						<div class="vertical-line" v-if="routeDetails.cities.length >= 1"></div>
						<span class="add-icon d-flex flex-dir-row j-c-center a-i-center" @click="prepareModal('none')" v-if="lastDestination === false">
							<i class="material-icons cur-point">
								add
							</i>
						</span>
						<div class="font-lato" v-if="routeDetails.cities.length === 0">
							<div class="font-bold">
								Click to start
							</div>
							<div>
								the beginning of an unforgettable journey
							</div>
						</div>
					</div>
				</div>
				<div class="d-flex flex-dir-row j-c-end a-i-center">
					<button class="uppercase background-color-orange font-white m-t-32 book-now m-r-12 font-size-12 font-lato" style="margin-bottom: 16px;">
						save for later
					</button>
					<button class="uppercase background-color-green font-white m-t-32 book-now font-size-12 font-lato" style="margin-bottom: 16px;" @click="bookPlan">
						book now
					</button>
				</div>
				<div class="d-flex flex-dir-column a-i-end">
					<small class="miss-msg font-bold">
						Don't miss your dates
					</small>
					<small class="miss-msg font-400">
						Save it for later or continue to reserve your spots. Please note until it's not confirmed we cannot guarantee your driver for your selected dates.
					</small>
				</div>
				<google-map ref="googleMap" :routeDetails="routeDetails"></google-map>
				<div class="enlarge-map" @click="openEnlargeMap">
					Enlarge map
				</div>
			</div>
		</section>
		<section class="trips-we-love width-100 max-width-100 d-flex flex-dir-column a-i-center pos-relative">
			<div class="background-color-grey min-width-100 width-100 max-width-100 d-flex flex-dir-column a-i-center">
				<div class="m-t-32 m-b-16 p-0-32 min-width-100 width-100 max-width-100 text-center trips-we-love-title">
					Trips we love
				</div>
				<small class="text-center m-t-8">
					You are going on holidays and we are not there yet?
				</small>
				<small class="text-center m-t-8 m-b-32">
					We are hunting down the best drivers, cristalline beaches and remote temples.
				</small>
			</div>
			<div class="d-flex flex-dir-row j-c-space-evenly destination-image-container">
				<div class="slider-active owl-carousel">
					<div class="slider-image-container pos-relative d-flex j-c-center a-i-center">
						<img :src="'/assets/images/egypt.png'" class="pos-absolute"/>
						<div class="pos-absolute uppercase font-white">classic</div>
						<div class="pos-absolute uppercase font-white">10 days</div>
					</div>
					<div class="slider-image-container pos-relative d-flex j-c-center a-i-center">
						<img :src="'/assets/images/philippines.png'" class="pos-absolute"/>
						<div class="pos-absolute uppercase font-white">beach</div>
						<div class="pos-absolute uppercase font-white">8 days</div>
					</div>
					<div class="slider-image-container pos-relative d-flex j-c-center a-i-center">
						<img :src="'/assets/images/thailand.png'" class="pos-absolute"/>
						<div class="pos-absolute uppercase font-white">essential</div>
						<div class="pos-absolute uppercase font-white">4 days</div>
					</div>
					<div class="slider-image-container pos-relative d-flex j-c-center a-i-center">
						<img :src="'/assets/images/west-africa.png'" class="pos-absolute"/>
						<div class="pos-absolute uppercase font-white">modern</div>
						<div class="pos-absolute uppercase font-white">6 days</div>
					</div>
				</div>
			</div>
		</section>
		<div id="sidenav-overlay" v-if="showModal || showMiddleAddonModal"></div>
		<side-nav :allCities="allCities" :destinationIndex="destinationIndex" :routeDetails="routeDetails" :suggestedDestination="suggestedDestination" :prevCityIndex="prevCityIndex" ref="sidenav" v-if="showModal" @close="showModal = false">
		</side-nav>
		<middle-addon :cityIndex="cityIndex" :cityDetails="cityDetails" :editableDate="editableDate" ref="middleaddon" v-if="showMiddleAddonModal" @close="showMiddleAddonModal = false">
		</middle-addon>
		<addon-alert-modal v-model="showAddOnAlert" v-if="showAddOnAlert"></addon-alert-modal>
		<pickup-modal v-model="pickupModal" v-if="pickupModal" :pickupDetails="pickupDetails"></pickup-modal>
		<departing-modal v-model="departingModal" v-if="departingModal" :departingDetails="departingDetails"></departing-modal>
		<arriving-modal v-model="arrivingModal" v-if="arrivingModal" :arrivingDetails="arrivingDetails"></arriving-modal>
		<dropoff-modal v-model="dropoffModal" v-if="dropoffModal" :dropoffDetails="dropoffDetails"></dropoff-modal>
		<route-edit-modal v-model="routeEditModal" v-if="routeEditModal" :destinationIndex="destinationIndex" :destinationAddOnIndex="destinationAddOnIndex"></route-edit-modal>
		<add-some-night-modal v-model="addSomeNightModal" v-if="addSomeNightModal" :destinationIndex="destinationIndex"></add-some-night-modal>
		<booking-error-modal v-model="bookingErrorModal" v-if="bookingErrorModal"></booking-error-modal>
		<section class="d-flex flex-dir-column a-i-center car-details">
			<div class="d-flex flex-dir-row j-c-space-evenly car-image-container">
				<div class="slider-active owl-carousel">
					<div class="car-image d-flex flex-dir-column" v-for="vehicle in vehiclesData" v-model="vehiclesData">
						<div class="d-flex flex-dir-row j-c-center a-i-end min-width-100 width-100 max-width-100">
							<img :src="'/admin/assets/images/vehicles/' + vehicle.vehicle_image"/>
						</div>
						<div class="d-flex flex-dir-column car-description-container">
							<div class="driver-included d-flex j-c-center a-i-center font-lato" v-if="vehicle.driver_inclusion === 1">
								Driver included
							</div>
							<div class="driver-not-included d-flex j-c-center a-i-center font-lato" v-else>

							</div>
							<div class="capitalize m-t-16 m-b-8 car-name font-lato">
								{{ vehicle.vehicle_name }}
							</div>
							<div class="font-size-10">
								{{ vehicle.description }}
							</div>
							<div class="m-t-16 d-flex flex-dir-row a-i-center">
								<img :src="'/assets/images/icons/person-icon.svg'" class="m-r-4 passenger-icon">
								<strong>
									<small>
										{{ vehicle.passenger }}
									</small>
									<small>
										passengers
									</small>
								</strong>
							</div>
							<div class="m-t-4 d-flex flex-dir-row a-i-center">
								<img :src="'/assets/images/icons/door.svg'" class="m-r-4 door-icon">
								<small class="m-r-4">
									{{ vehicle.door }}
								</small>
								<small>
									doors
								</small>
							</div>
							<div class="m-t-4 d-flex flex-dir-row a-i-center">
								<img :src="'/assets/images/icons/small-bag.svg'" class="m-r-4 bag-icon">
								<small class="m-r-4">
									{{ vehicle.bag }}
								</small>
								<small>
									bags
								</small>
							</div>
							<hr/>
							<div v-if="vehicle.inclusion.length !== 0">
								<small class="capitalize font-green m-t-16">
									<b>
										included
									</b>
								</small>
								<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row a-i-center m-t-2" v-for="inclusion in vehicle.inclusion" v-if="inclusion !== null">
									<img :src="'/assets/images/icons/check-mark.svg'" class="m-r-12 check-mark-icon">
									<small class="capitalize">
										{{ inclusion }}
									</small>
								</div>
							</div>
							<div class="no-inclusion" v-else></div>
							<small class="m-t-16" style="align-self: flex-end;">
								Price per day from
							</small>
							<div class="m-t-2 d-flex flex-dir-row j-c-end a-i-center">
								<small class="m-r-8">
									<a class="edit-currency font-bold font-size-10 cur-point">
										Edit currency
									</a>
								</small>
								<strong class="font-size-18">
									£{{ vehicle.price }}
								</strong>
							</div>
							<button class="orange-button m-16-0" style="align-self: flex-end;" @click="chooseVehicle(vehicle.id)" v-if="vehicle.chosen">
								chosen
							</button>
							<button class="green-button m-16-0" style="align-self: flex-end;" @click="chooseVehicle(vehicle.id)" v-else>
								choose
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="m-t-8 font-lato font-bold">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit
			</div>
		</section>
		<enlarge-map :routeDetails="routeDetails" v-if="enlargeMap"></enlarge-map>
		<!--<section class="d-flex flex-dir-column a-i-center currency-details">
			<div class="m-t-8 font-lato font-bold">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit
			</div>
		</section>-->
	</main>
</template>

<script>
	require('../daterangepicker/daterangepicker.min');
	require('../daterangepicker/moment.min');
	export default {
		name: "CreatePlan",
		props: ['allCities', 'vehicles', 'suggestedDestination', 'homepageData'],
		data: function () {
			return {
                adult: 2,
                child: 0,
				routeDetails: {
					cities: [],
					vehicleId: this.vehicles[0].id,
                    adult: 2,
                    child: 0,
                    price: {
                        payToday: 0,
                        payDriver: 0,
                        total: 0,
                        paxPerDay: 0
                    }
				},
				tripStartDate: '',
				tripEndDate: '',
                tripStartDateObj: '',
                tripEndDateObj: '',
				destinationIndex: '',
                destinationAddOnIndex: '',
				showModal: false,
				showAddOnAlert: false,
				bordernoneActive: false,
				editTravellers: false,
				vehiclesData: this.vehicles,
				selectedVehicle: this.vehicles[0],
                showTravellerMessage: false,
				pickupModal: false,
                pickupDetails: '',
                departingModal: false,
                departingDetails: '',
				arrivingModal: false,
				arrivingDetails: '',
				dropoffModal: false,
				dropoffDetails: '',
                lastDestination: false,
				freeCancellationText: '',
				routeEditModal: false,
				addSomeNightModal: false,
				addCityBetween: false,
				prevCityIndex: '',
				bookingErrorModal: false,
				registerLink: window.location.origin + '/register',
				loginLink: window.location.origin + '/login',
				showMiddleAddonModal: false,
				cityIndex: '',
				cityDetails: '',
				editableDate: '',
				enlargeMap: false
			}
		},
		methods: {
			prepareModal: function(parameter){
				this.showModal = true;
				this.destinationIndex = parameter;
				if (parameter === 'none') {
					/*this.destination.start_date = this.routeDetails.cities[this.routeDetails.cities.length-1].end_date;
					this.destination.city.id = '';
					this.destination.city.latitude = '';
					this.destination.city.longitude = '';
					this.destination.city.name = '';
					this.destination.city.placeId = '';
					this.destination.no_of_nights = '';
					this.destination.end_date = '';
					this.destination.add_on_cities = [];
					this.destination.distance = '';
					this.destination.price = '';
					this.destination.time = '';*/
				}
				else {
					//console.log(this.routeDetails.cities[parameter]);
					//this.destination = JSON.parse(JSON.stringify(this.routeDetails.cities[parameter]));
				}
			},
			decreaseAdult: function () {
				if (this.adult >= 2) {
					this.adult = this.adult - 1;
				}
			},
			increaseAdult: function () {
				this.adult = this.adult + 1;
			},
			decreaseChild: function () {
				if (this.child >= 1) {
					this.child = this.child - 1;
				}
			},
			increaseChild: function () {
				this.child = this.child + 1;
			},
			checkedTraveller: function () {
				this.editTravellers = !this.editTravellers;
                this.routeDetails.adult = this.adult;
                this.routeDetails.child = this.child;
				this.autoAssignVehicle((this.adult + this.child));
                this.calculatePrice();
			},
			chooseVehicle: function (vehicleId) {
				let selectedItem = '';
				this.vehiclesData.forEach(function (item) {
					if (item.id === vehicleId) {
						item.chosen = true;
						selectedItem = item;
					}
					else {
						item.chosen = false;
					}
				});
				this.selectedVehicle = selectedItem;
				this.routeDetails.vehicleId = vehicleId;
				this.calculatePrice();
			},
			
			/* Price functions start */
			
            calculatePrice: function () {
	            let selectedCarIndex = this.vehiclesData.findIndex(x => x.id === this.routeDetails.vehicleId);
	            let carPrice = this.vehiclesData[selectedCarIndex].price;
	            let passengerCapacity = this.vehiclesData[selectedCarIndex].passenger;
	            let totalTripNight = 0;
	            this.routeDetails.price.total = 0;
	            for (let index = 0; index <= this.routeDetails.cities.length - 1; index++) {
		            let night = '';
		            let middleAddon = '';
		            if (index === 0) {
			            if (this.routeDetails.cities[index].betweenDate === true) {
				            if (this.routeDetails.cities[index].lastDestination === true) {
					            night = this.routeDetails.cities[index].totalDay;
				            }
				            else {
					            night = this.routeDetails.cities[index].totalNight;
					            this.transitionalRule(index, 1, carPrice);
				            }
				            this.middleRule(index, night, carPrice);
			            }
			            else {
				            this.transitionalRule(index, 1, carPrice);
			            }
		            }
		            else if (index !== 0 && index === this.routeDetails.cities.length - 1 && this.routeDetails.cities[index].lastDestination === true) {
			            if (this.routeDetails.cities[index].betweenDate === true) {
				            night = this.routeDetails.cities[index].totalNight;
				            this.middleRule(index, night, carPrice);
			            }
		            }
		            else {
			            if (this.routeDetails.cities[index].betweenDate === true) {
				            night = this.routeDetails.cities[index].totalNight - 1;
				            this.middleRule(index, night, carPrice);
			            }
			            if (this.routeDetails.cities[index - 1].endDate !== this.routeDetails.cities[index].endDate) {
				            this.transitionalRule(index, 1, carPrice);
			            }
			            // this.transitionalRule(index, 1, carPrice);
		            }
		            if (this.routeDetails.cities[index].totalNight === 0) {
			            totalTripNight += this.routeDetails.cities[index].totalDay;
		            }
		            else {
			            totalTripNight += this.routeDetails.cities[index].totalNight;
		            }
	            }
	            
	            if (this.routeDetails.price.total !== 0 && totalTripNight !== 0) {
		            this.routeDetails.price.payToday = ((this.routeDetails.price.total * 20) / 100).toFixed(2);
		            this.routeDetails.price.payDriver = ((this.routeDetails.price.total * 80) / 100).toFixed(2);
		            this.routeDetails.price.paxPerDay = ((this.routeDetails.price.total / totalTripNight) / passengerCapacity).toFixed(2);
		            this.routeDetails.price.total = this.routeDetails.price.total.toFixed(2);
	            }
            },
			middleRule: function (index, night, carPrice) {
				/*let totalDistance = 0;
				let totalPrice = 0;*/
				let countMiddleAddonDay = 0;
				for (let key in this.routeDetails.cities[index].middleAddons) {
					let totalDistance = 0;
					let totalPrice = 0;
					if (this.routeDetails.cities[index].middleAddons.hasOwnProperty(key)) {
						if (typeof this.routeDetails.cities[index].middleAddons[key].city1 === 'object') {
							totalDistance += this.routeDetails.cities[index].middleAddons[key].city1.prevDistance;
							if (typeof this.routeDetails.cities[index].middleAddons[key].city2 === 'object') {
								totalDistance += this.routeDetails.cities[index].middleAddons[key].city2.prevDistance + this.routeDetails.cities[index].middleAddons[key].city2.currDistance;
							}
							else {
								totalDistance += this.routeDetails.cities[index].middleAddons[key].city1.currDistance;
							}
						}
						countMiddleAddonDay++;
						if (totalDistance < 200000) {
							totalPrice += (carPrice * 1);
						}
						else if (totalDistance > 200000 && totalDistance < 300000) {
							totalPrice += (carPrice * 1 * 1.5);
						}
						else if (totalDistance > 300000 && totalDistance < 400000) {
							totalPrice += (carPrice * 1 * 2);
						}
						else {
							totalPrice += (carPrice * 1 * 2);
						}
						this.routeDetails.price.total += totalPrice;
					}
				}
				if (night - countMiddleAddonDay > 0) {
					this.routeDetails.price.total += (carPrice * (night - countMiddleAddonDay));
				}
			},
			transitionalRule: function (index, night, carPrice) {
				let totalDistance = 0;
				let totalPrice = 0;
				if (this.routeDetails.cities.hasOwnProperty(index + 1)) {
					if (typeof this.routeDetails.cities[index + 1].firstaddon === 'object') {
						totalDistance += this.routeDetails.cities[index + 1].firstaddon.prevDistance;
						if (typeof this.routeDetails.cities[index + 1].secondaddon === 'object') {
							totalDistance += this.routeDetails.cities[index + 1].secondaddon.prevDistance + this.routeDetails.cities[index + 1].secondaddon.currDistance;
						}
						else {
							totalDistance += this.routeDetails.cities[index + 1].firstaddon.currDistance;
						}
					}
					else {
						totalDistance += this.routeDetails.cities[index + 1].city.distance;
					}
					if (totalDistance < 200000) {
						totalPrice = carPrice * 1;
					}
					else if (totalDistance > 200000 && totalDistance < 600000) {
						totalPrice = carPrice * 1 * 1.5;
					}
					else {
						totalPrice = carPrice * 1 * 1.5;
					}
				}
				else {
					/*if (typeof this.routeDetails.cities[index].distance !== 'undefined') {
						totalDistance += this.routeDetails.cities[index].distance;
					}
					if (totalDistance < 200) {
						totalPrice = carPrice * 1;
					}
					else if (totalDistance > 200 && totalDistance < 600) {
						totalPrice = carPrice * 1 * 1.5;
					}
					else {
						totalPrice = carPrice * 1 * 1.5;
					}*/
					totalPrice = carPrice * 1;
				}
				this.routeDetails.price.total += totalPrice;
			},
			
			/* Price functions end */
			
            openPickupModal: function (index) {
				if (this.routeDetails.cities.length > 0) {
					this.pickupModal = true;
					this.pickupDetails = this.routeDetails.cities[index].pickup;
					this.pickupCityIndex = index;
				}
            },
            openDepartingModal: function (index) {
                this.departingModal = true;
                this.departingDetails = this.routeDetails.cities[index].departing;
                this.departingCityIndex = index;
            },
			openArrivingModal: function (index) {
				this.arrivingModal = true;
				this.arrivingDetails = this.routeDetails.cities[index].arriving;
				this.arrivingCityIndex = index;
			},
			openDropoffModal: function (index) {
				this.dropoffModal = true;
				this.dropoffDetails = this.routeDetails.cities[index].dropoff;
				this.dropoffCityIndex = index;
			},
            prepareEditModal: function (cityIndex, addOnIndex = null) {
				this.routeEditModal = !this.routeEditModal;
				this.destinationIndex = cityIndex;
				this.destinationAddOnIndex = addOnIndex;
            },
			prepareAddSomeNightModal: function (parameter, previousCityIndex) {
				this.addSomeNightModal = !this.addSomeNightModal;
                //this.showModal = true;
                this.destinationIndex = parameter;
                this.prevCityIndex = previousCityIndex;
            },
            bookPlan: function () {
			    console.log(new Date(this.routeDetails.cities[this.routeDetails.cities.length - 1].endDate));
			    console.log(this.tripEndDateObj._d);
			    if (new Date(this.routeDetails.cities[this.routeDetails.cities.length - 1].endDate).toDateString() !== this.tripEndDateObj._d.toDateString()) {
			        this.bookingErrorModal = true;
				}
				else {

				}
            },
            assignHomePageData: function () {
	            if (this.homepageData.length !== 0) {
		            let pickupDateObject = moment(this.homepageData.pickupDate);
		            let dropoffDateObject = moment(this.homepageData.dropoffDate);
		            this.routeDetails.cities.push(
			            {
				            city: this.homepageData.cityDetails,
				            firstaddon: '',
				            secondaddon: '',
				            pickup: {
					            address: '',
					            time: '',
					            date: pickupDateObject._d.getDate() + ' ' + pickupDateObject._locale._monthsShort[pickupDateObject._d.getMonth()] + ' ' + pickupDateObject._d.getFullYear(),
					            arrivingTo: '',
					            eta: '',
					            flyingFrom: '',
					            flightNo: '',
					            note: ''
				            },
				            departing: {
					            address: '',
					            time: '',
					            date: pickupDateObject._d.getDate() + ' ' + pickupDateObject._locale._monthsShort[pickupDateObject._d.getMonth()] + ' ' + pickupDateObject._d.getFullYear(),
					            note: ''
				            },
				            arriving: {
					            address: '',
					            time: '',
					            date: '',
					            note: ''
				            },
				            dropoff: {
					            address: '',
					            time: '',
					            date: '',
					            note: ''
				            },
				            startDate: this.homepageData.pickupDate,
				            endDate: this.homepageData.pickupDate,
				            totalDay: 1,
				            totalNight: 0,
				            lastDestination: false,
				            distance: '',
				            betweenDate: false,
				            middleAddons: {}
			            }
		            );
		            this.routeDetails.adult = this.homepageData.adult;
		            this.routeDetails.child = this.homepageData.child;
		            this.adult = this.homepageData.adult;
		            this.child = this.homepageData.child;
		            this.tripStartDate = pickupDateObject._d.getDate() + ' ' + pickupDateObject._locale._monthsShort[pickupDateObject._d.getMonth()] + ' ' + pickupDateObject._d.getFullYear();
		            this.tripEndDate = dropoffDateObject._d.getDate() + ' ' + dropoffDateObject._locale._monthsShort[dropoffDateObject._d.getMonth()] + ' ' + dropoffDateObject._d.getFullYear();
		            this.tripStartDateObj = pickupDateObject;
		            this.tripEndDateObj = dropoffDateObject;
		            this.autoAssignVehicle(this.homepageData.adult + this.homepageData.child);
		            this.bordernoneActive = true;
		            let freeCancellationDate = moment(this.homepageData.pickupDate).subtract(2, 'days');
		            this.freeCancellationText = 'FREE Cancellation before 11:59 PM on ' + freeCancellationDate._d.getDate() + ' ' + freeCancellationDate._locale._monthsShort[freeCancellationDate._d.getMonth()] + ' ' + freeCancellationDate._d.getFullYear();
		            this.calculatePrice();
	            }
            },
			autoAssignVehicle: function (totalPassenger) {
				if (this.selectedVehicle.passenger < totalPassenger) {
					let availableVehicles = this.vehiclesData.filter(vehicle => {
						return vehicle.passenger >= totalPassenger;
					});
					let chosenVehicle = '';
					if (availableVehicles.length === 1) {
						chosenVehicle = availableVehicles[0];
					}
					else {
						for (let i = 0; i <= availableVehicles.length - 1; i++) {
							let nextKey = i + 1;
							if (availableVehicles.hasOwnProperty(nextKey)) {
								if (chosenVehicle === '') {
									if (availableVehicles[i].passenger <= availableVehicles[nextKey].passenger) {
										chosenVehicle = availableVehicles[i];
									}
								}
								else {
									if (chosenVehicle.passenger > availableVehicles[nextKey].passenger) {
										chosenVehicle = availableVehicles[nextKey];
									}
								}
							}
						}
					}
					this.chooseVehicle(chosenVehicle.id);
				}
			},
			updateDate: function (start, end) {
				let startDate = moment(start.format('YYYY-MM-DD'));
				let endDate = moment(end.format('YYYY-MM-DD'));
				for (let i = 0; i <= this.routeDetails.cities.length - 1; i++) {
					let totalDay = this.routeDetails.cities[i].totalDay;
					let totalNight = this.routeDetails.cities[i].totalNight;
					if (i === 0) {
						this.routeDetails.cities[i].pickup.date = startDate.get('date') + ' ' + startDate._locale._monthsShort[startDate.get('month')] + ' ' + startDate.get('year');
						this.routeDetails.cities[i].startDate = startDate.format('YYYY-MM-DD');
						let date = startDate.add(totalNight, 'day');
						this.routeDetails.cities[i].departing.date = date.get('date') + ' ' + date._locale._monthsShort[date.get('month')] + ' ' + date.get('year');
						this.routeDetails.cities[i].endDate = date.format('YYYY-MM-DD');
					}
					else if (i !== 0 && this.routeDetails.cities[i].lastDestination === false) {
						this.routeDetails.cities[i].arriving.date = this.routeDetails.cities[i - 1].departing.date;
						this.routeDetails.cities[i].startDate = this.routeDetails.cities[i - 1].endDate;
						let date = moment(this.routeDetails.cities[i - 1].endDate).add(totalNight, 'day');
						this.routeDetails.cities[i].departing.date = date.get('date') + ' ' + date._locale._monthsShort[date.get('month')] + ' ' + date.get('year');
						this.routeDetails.cities[i].endDate = date.format('YYYY-MM-DD');
					}
					else if (i !== 0 && this.routeDetails.cities[i].lastDestination === true) {
						let date = moment(this.routeDetails.cities[i - 1].endDate).add(1, 'day');
						this.routeDetails.cities[i].dropoff.date = date.get('date') + ' ' + date._locale._monthsShort[date.get('month')] + ' ' + date.get('year');
						this.routeDetails.cities[i].endDate = date.format('YYYY-MM-DD');
					}
				}
			},
			openMiddleAddonModal: function (cityIndex, cityDetails, editableDate) {
				this.cityIndex = cityIndex;
				this.cityDetails = cityDetails;
				this.editableDate = editableDate;
				this.showMiddleAddonModal = true;
			},
			openEnlargeMap: function () {
				this.enlargeMap = !this.enlargeMap;
				$('body').css('overflow', 'hidden');
			}
		},
		mounted() {
			let minDate = '';
			let startDate = '';
			let endDate = '';
			// Set home page data
			if (this.homepageData.length !== 0) {
				this.assignHomePageData();
				minDate = startDate = moment(this.homepageData.pickupDate).startOf('hour');
				endDate = moment(this.homepageData.dropoffDate).startOf('hour');
			}
			else {
				minDate = startDate = endDate = moment().startOf('hour');
			}
			
		    if (this.routeDetails.cities.length === 0) {
                this.vehiclesData[0].chosen = true;
                this.selectedVehicle.chosen = true;
			}
			let vm = this;
			let index = 0;
			//Check if vm.start and end date is set
			//If available, then startDate = setdate else new Date
			// Same for endDate
			$('.date-selector').daterangepicker({
				opens: 'left',
				//minDate: moment().startOf('hour'),
				minDate: minDate,
				autoUpdateInput: true,
				autoApply: true,
				linkedCalendars: false,
				//startDate: moment().startOf('hour'),
				startDate: startDate,
				//endDate: moment().startOf('hour'),
				endDate: endDate,
                isCustomDate: function (date) {
                    let formattedDate = new Date(date.format('YYYY-MM-DD')).getTime();
                    if (vm.routeDetails.cities.length >= 1) {
                        if (formattedDate >= (new Date(vm.routeDetails.cities[0].startDate).getTime()) && formattedDate <= (new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getTime())) {
                            return 'filled';
                        }
                    }
                }
			}, function(start, end) {
				//console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			});
			$('.date-selector').data('daterangepicker').container.find('.drp-calendar').unbind('mousedown.daterangepicker' );
			$('.date-selector').data('daterangepicker').container.find('.drp-calendar').unbind('mouseenter.daterangepicker' );
			$('#show-calender').html( $('.date-selector').data('daterangepicker').container);
            $('.date-selector').trigger('click');
			
			$('.edit-dates').daterangepicker({
				opens: 'center',
				minDate: moment().startOf('hour'),
				autoUpdateInput: true,
				autoApply: true,
			}, function(start, end) {
				//console.log("A new date selection was made: " + start.format('MM/DD/YYYY') + ' to ' + end.format('YYYY-MM-DD'));
				vm.tripStartDate = start._d.getDate() + ' ' + start._locale._monthsShort[start._d.getMonth()] + ' ' + start._d.getFullYear();
				vm.tripEndDate = end._d.getDate() + ' ' + end._locale._monthsShort[end._d.getMonth()] + ' ' + end._d.getFullYear();
				vm.tripStartDateObj = start;
				vm.tripEndDateObj = end;
				let freeCancellationDate = moment(start.format('YYYY-MM-DD')).subtract(2, 'days');
				vm.freeCancellationText = 'FREE Cancellation before 11:59 PM on ' + freeCancellationDate._d.getDate() + ' ' + freeCancellationDate._locale._monthsShort[freeCancellationDate._d.getMonth()] + ' ' + freeCancellationDate._d.getFullYear();
				
				if (vm.routeDetails.cities.length >= 1) {
					vm.updateDate(start, end);
					if (vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate >= end.format('YYYY-MM-DD')) {
						end = moment(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate);
						vm.tripEndDate = end.get('date') + ' ' + end._locale._monthsShort[end.get('month')] + ' ' + end.get('year');
						vm.tripEndDateObj = end;
					}
				}

                $('.date-selector').daterangepicker({
                    opens: 'left',
                    minDate: moment().startOf('hour'),
                    autoUpdateInput: true,
                    autoApply: true,
                    linkedCalendars: false,
                    startDate: start.format('MM/DD/YYYY'),
                    endDate: end.format('MM/DD/YYYY'),
	                /*startDate: start.format('YYYY-MM-DD'),
	                endDate: end.format('YYYY-MM-DD'),*/
	                isCustomDate: function (date) {
                        let formattedDate = new Date(date.format('YYYY-MM-DD')).getTime();
                        if (vm.routeDetails.cities.length >= 1) {
                            if (formattedDate >= (new Date(vm.routeDetails.cities[0].startDate).getTime()) && formattedDate <= (new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getTime())) {
	                            if (formattedDate === new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].startDate).getTime() && formattedDate === new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getTime()) {
		                            return 'half-filled';
	                            }
	                            else {
		                            return 'filled';
	                            }
                            	//return 'filled';
							}
                        }
                    }
                }, function(start, end) {
                    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                });
                $('.date-selector').data('daterangepicker').container.find('.drp-calendar').unbind('mousedown.daterangepicker' );
                $('.date-selector').data('daterangepicker').container.find('.drp-calendar').unbind('mouseenter.daterangepicker' );
                $('#show-calender').html( $('.date-selector').data('daterangepicker').container);
                $('.date-selector').trigger('click');
			});
		},
		filters: {
            distanceMeterToKm: function (distance) {
                return Math.round(distance / 1000);
            },
			filterMiddleAddonDate: function (stringDate) {
				return moment(stringDate)._d.getDate() + ' ' + moment(stringDate)._locale._monthsShort[moment(stringDate)._d.getMonth()] + ' ' + moment(stringDate)._d.getFullYear();
			},
			trimCityName: function (cityName) {
				return cityName.length > 15 ? cityName.substring(0, 15) + '...' : cityName;
			}
		}
	}
	$(document).ready(function () {
		$('#edit-vehicle').click(function () {
			$('section.car-details').addClass('open');
			$('#vehicle-overlay').css('display', 'block');
			$('body').css('overflow', 'hidden');
		});
		$('#vehicle-overlay').click(function () {
			$('section.car-details').removeClass('open');
			$('#vehicle-overlay').css('display', 'none');
            $('body').css('overflow', 'scroll');
		});
		$('#edit-currency').click(function () {
			$('section.currency-details').addClass('open');
			$('#currency-overlay').css('display', 'block');
			$('body').css('overflow', 'hidden');
		});
		$('#currency-overlay').click(function () {
			$('section.currency-details').removeClass('open');
			$('#currency-overlay').css('display', 'none');
			$('body').css('overflow', 'scroll');
		});
	});
</script>

<style scoped>
	.check-free {
		padding: 8px 24px;
		border: 2px solid #00B69C;
		border-radius: 4px;
		max-width: max-content;
	}
	.enlarge-map {
		text-align: right;
		width: 100%;
		min-width: 100%;
		max-width: 100%;
		margin-top: 8px;
		font-size: 12px;
		text-decoration: underline;
		color: #0f74a8;
		cursor: pointer;
	}
	.owl-carousel .owl-item img {
		width: 80%;
	}
	.edit-address {
		text-decoration: none;
		font-size: 10px;
		color: #0f74a8;
	}
	.no-inclusion {
		min-height: 70px;
		height: 70px;
		max-height: 70px;
	}
	#show-calender {
		position: relative;
		min-height: 283px;
		height: auto;
	}
	.blur-bg {
		position: absolute;
		min-height: 100vh;
		height: 100vh;
		max-height: 100vh;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
		top: 0;
		left: 0;
		background-color: rgba(255, 255, 255, 0.7);
		z-index: 2;
	}
	.plan-details {
		min-height: 600px;
	}
	div.left-container, div.right-container {
		height: inherit;
		flex-grow: 1;
		padding: 0 24px;
	}
	div.left-container {
		flex-basis: 30%;
		max-width: 30%;
	}
	div.right-container {
		flex-basis: 70%;
		max-width: 70%;
	}
	div.right-container > div:nth-child(2) {
		#min-height: calc(100vh - 80px);
	}
	.your-plan {
		font-size: 28px;
		color: rgba(0, 0, 0, 0.7);
	}
	.icon-container > img {
		height: 20px;
		width: 20px;
	}
	.icon-container > * {
		cursor: pointer;
	}
	.book-now {
		height: 40px;
		width: 150px;
		margin: 32px 0;
	}
	.click-to-start-container, .destination-container {
		border: 2px solid rgba(0, 0, 0, 0.1);
		padding: 32px;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
	}
	.destination-container {
		#min-height: 250px;
	}
	.click-to-start-container {
		padding-left: 34px;
	}
	.addon-container, .add-addon-icon-container {
		min-height: 50px;
		padding: 0 32px;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
	}
	/*.click-to-start-container {
		max-height: 100px;
	}*/
	.click-to-start-container .add-icon, .add-addon-icon-container .add-icon {
		height: 50px;
		width: 50px;
	}
	.click-to-start-container .add-icon > i, .add-addon-icon-container .add-icon > i {
		border: 2px solid #FF9400;
		border-radius: 50%;
		font-weight: 500;
		color: #FF9400;
		background-color: rgba(250, 250, 250, 1);
		z-index: 1;
	}
	.destination-container .addon-icon, .addon-container .addon-icon {
		border: 2px solid #00B69C;
		border-radius: 50%;
		height: 30px;
		width: 30px;
		background-color: rgba(250, 250, 250, 1);
		z-index: 1;
	}
	.addon-container .addon-icon-wrapper {
		height: 50px;
		width: 50px;
	}
	.click-to-start-container > div:nth-child(2), .destination-container > div:first-child > div:nth-child(2), .addon-container > div:first-child > div:nth-child(2) {
		margin-left: 16px;
		font-weight: 400;
		font-size: 18px;
		flex-grow: 1;
	}
	.destination-container > div:not(:nth-child(2)), .addon-container > div {
		flex-basis: 50%;
		max-width: 50%;
	}
	.click-to-start-container > div:nth-child(2) > div:nth-child(2), .destination-container > div:first-child > div:nth-child(2) > div:nth-child(2) {
		font-size: 14px;
		color: #00B69C;
	}
	.left-container > div:first-child, .left-container > div:nth-child(2) {
		margin-top: 16px;
	}
	.left-container > div:first-child > span:first-child, .edit-dates {
		flex-grow: 1;
	}
	.edit-dates {
		text-decoration: underline;
		font-size: 10px;
		color: #0f74a8;
		text-align: right;
	}
	.edit-currency {
		text-decoration: underline;
		color: #0f74a8;
		font-weight: bold;
	}
	.price-summary-title, .vehicle-type-title, .travellers-title, .reservation-title, .first-pickup-title {
		background-color: grey;
		min-width: 100%;
		max-width: 100%;
		min-height: 40px;
		max-height: 40px;
		font-weight: 400;
	}
	.price-summary-title, .vehicle-type-title, .travellers-title, .first-pickup-title, .first-pickup-title, .reservation-title {
		letter-spacing: 1px;
	}
	/*.price-summary-title, */.price-summary-details > div, .vehicle-type-title, .reservation-title, .first-pickup-title {
		                          margin-top: 16px;
	                          }
	.reservation-title {
		font-size: 14px;
	}
	form.promo-code {
		margin-bottom: 0;
	}
	form.promo-code > input[type=text], form.promo-code > button {
		min-height: 32px;
		height: 32px;
		max-height: 32px;
	}
	form.promo-code > input[type=text] {
		border: 1px solid rgba(0, 0, 0, 0.3);
		padding: 0 8px;
		flex-grow: 1;
		margin-right: 12px;
	}
	form.promo-code > button {
		cursor: pointer;
	}
	small.voucher-exceed-error {
		margin-top: 16px;
		display: flex;
		flex-direction: row;
		justify-content: space-between;
	}
	small.voucher-exceed-error > i {
		border: 1px solid red;
		border-radius: 50%;
		font-size: 12px;
		margin-top: 2px;
		margin-right: 8px;
		height: 14px;
		width: 14px;
		color: red;
	}
	.vehicle-type > div:nth-child(2) {
		min-height: 100px;
		height: 100px;
		max-height: 100px;
	}
	.vehicle-type > div:nth-child(2) > img {
		flex-basis: 60%;
		max-width: 60%;
		max-height: 100%;
	}
	.vehicle-type > div:nth-child(2) > div {
		flex-basis: 30%;
	}
	.reservation > div:nth-child(2) img {
		height: 16px;
		width: 16px;
	}
	.miss-msg {
		width: 316px;
	}
	.vertical-bar {
		height: 32px;
		min-width: 1px;
		width: 1px;
		max-width: 1px;
		background-color: rgba(0, 0, 0, 0.3);
	}
	div.right-container > div:nth-child(3) > button.book-now {
		margin-right: 8px;
	}
	.car-details, .currency-details {
		min-width: 100%;
		width: 100%;
		max-width: 100%;
		position: fixed;
		bottom: 0;
		left: 0;
		background-color: rgba(250, 250, 250, 1);
		z-index: 2;
		-webkit-box-shadow: 0 0 8px 0 rgba(0,0,0,0.75);
		-moz-box-shadow: 0 0 8px 0 rgba(0,0,0,0.75);
		box-shadow: 0 0 8px 0 rgba(0,0,0,0.75);
	}
	.car-details {
		min-height: 86vh;
		max-height: 86vh;
	}
	.currency-details {
		min-height: 60vh;
		max-height: 60vh;
	}
	div.car-image > div:first-child {
		min-height: 120px;
		height: 120px;
		max-height: 120px;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
		padding: 16px 0;
	}
	.rotate-image {
		-webkit-transform: rotateY(180deg);
		-moz-transform: rotateY(180deg);
		-ms-transform: rotateY(180deg);
		-o-transform: rotateY(180deg);
		transform: rotateY(180deg);
	}
	.car-description-container {
		padding: 0 24px;
	}
	.slider-image-container {
		/*min-width: max-content;
		width: max-content;
		max-width: max-content;*/
		min-width: 100%;
		width: 100%;
		max-width: 100%;
		padding: 4px 12px;
		#background-color: lightblue;
		border-radius: 2px;
		#border: 1px solid lightblue;
		font-size: 12px;
	}
	/*section.car-details > div div > div > div:nth-child(2) {
		font-size: 20px;
		font-weight: 400;
		letter-spacing: 1px;
	}*/
	small {
		font-size: 10px;
	}
	section.car-details > div > div > div:nth-child(2) > div img {
		height: 10px;
		min-width: 10px;
		width: 10px;
		max-width: 10px;
	}
	hr {
		height: 1px;
		min-width: 100%;
		width: 100%;
		max-width: 100%;
		margin-top: 16px;
		margin-bottom: 0;
	}
	button.green-button, button.orange-button {
		font-size: 10px;
		height: 30px;
		width: 120px;
	}
	section.car-details {
		-webkit-transition: all .4s ease-in-out;
		-webkit-transform: translateY(104%);
		-moz-transform: translateY(104%);
		-ms-transform: translateY(104%);
		-o-transform: translateY(104%);
		transform: translateY(104%);
	}
	section.car-details.open {
		-webkit-transform: translateY(0%);
		-moz-transform: translateY(0%);
		-ms-transform: translateY(0%);
		-o-transform: translateY(0%);
		transform: translateY(0%);
	}
	div.car-image-container > i {
		height: 24px;
		z-index: 5;
		color: white;
		position: absolute;
		top: 4px;
		right: 12px;
		cursor: pointer;
	}
	.swiper-container {
		width: 100%;
		height: 100%;
		margin-left: auto;
		margin-right: auto;
	}
	/*.swiper-wrapper {
		width: 90%;
		margin: 0 auto;
	}*/
	.swiper-slide {
		background-size: cover;
		background-position: center;
	}
	.driver-included {
		font-size: 10px;
		min-width: 50%;
		width: 50%;
		max-width: max-content;
		min-height: 20px;
		background-color: lightblue;
	}
	.driver-not-included {
		min-height: 20px;
		height: 20px;
		max-height: 20px;
	}
	.car-name {
		font-weight: 600;
		letter-spacing: 2px;
	}
	.passenger-icon, .door-icon, .bag-icon, .check-mark-icon {
		min-height: 12px;
		height: 12px;
		max-height: 12px;
		min-width: 12px;
		width: 12px;
		max-width: 12px;
	}
	.location-icon {
		border: 2px solid #00B69C;
		border-radius: 50%;
		height: 50px;
		width: 50px;
		cursor: pointer;
		flex-shrink: 0;
		-webkit-flex-shrink: 0;
	}
	.destination-vertical-bar {
		min-height: 140px;
		height: 140px;
		max-height: 140px;
		min-width: 1px;
		width: 1px;
		max-width: 1px;
		background-color: rgba(0, 0, 0, 0.3);
		margin: 16px 32px;
		align-self: center;
	}
	.travellers-count > div {
		flex-basis: 50%;
		max-width: 50%;
	}
	.travellers-count i {
		font-size: 16px;
		color: #00B69C;
	}
	.check-container {
		min-height: 32px;
		height: 32px;
		max-height: 32px;
		min-width: 50%;
		width: 50%;
		max-width: 50%;
		margin: 0 auto;
	}
	.check-container > i {
		font-size: 28px;
		color: #fff;
	}
	.seat-info {
		min-width: 90%;
		width: 90%;
		max-width: 90%;
		padding: 16px;
		left: 0;
		top: 50px;
		background-color: white;
		color: rgba(0, 0, 0, 0.3);
		#box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.75);
		border: 1px solid rgba(0, 0, 0, 0.1);
	}
	@media only screen and (max-width: 768px) {
		div.right-container {
		
		}
		div.left-container {
			order: 2;
		}
		div.left-container, div.right-container {
			padding: 0 4px;
			max-width: 100%;
		}
		div.right-container > div:first-child {
			margin-top: 16px;
		}
		div.right-container > div:first-child > div {
			flex-basis: 100%;
			max-width: 100%;
		}
		div.right-container > div:first-child > div.icon-container > button.book-now {
			margin: 16px 0;
		}
		div.right-container > div:nth-child(2) > div.click-to-start-container {
			padding: 0 12px;
		}
		div.right-container > div:nth-child(3) {
			justify-content: center;
			flex-wrap: wrap;
		}
		div.right-container > div:nth-child(3) > button.book-now {
			margin: 8px 0;
		}
		div.right-container > div:nth-child(4) > small.miss-msg {
			flex-basis: 100%;
			max-width: 100%;
		}
		.car-image-container > i:first-child {
			top: 0;
			right: 4px;
		}
		.car-image-container .slider-active {
			overflow-y: scroll;
		}
		.destination-vertical-bar {
			display: none;
		}
		.destination-container {
			flex-wrap: wrap;
		}
		.destination-container > div:first-child {
			margin-top: 32px;
		}
		.destination-container > div:not(:nth-child(2)), .addon-container > div {
			flex-basis: 100%;
			max-width: 100%;
		}
		.addon-container {
			flex-wrap: wrap;
		}
	}
</style>