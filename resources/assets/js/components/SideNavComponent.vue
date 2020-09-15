<template>
	<transition name="side-nav">
		<aside class="sidenav d-flex flex-dir-column a-i-center" style="overflow: scroll;" >
			<i class="material-icons" style="align-self: flex-end; margin-top: 4px; margin-right: 8px; cursor: pointer;" @click="closeSideNav()" data-dismiss="sidenav">
				close
			</i>
			<div class="add-destination-title" v-if="routeDetails.cities.length === 0 || destinationIndex === 0">
				Select your Pick up City
			</div>
            <div class="add-destination-title" v-else>
                Add destination
            </div>
			<div>
                <div class="add-destination-description d-flex flex-dir-row j-c-center a-i-center" v-if="routeDetails.cities.length === 0 || destinationIndex === 0">
                    Choose how many days you will stay here or if you leave straight away for your next destination
                </div>
                <div class="add-destination-description d-flex flex-dir-row j-c-center a-i-center pos-relative" v-else>
                    Add a destination and choose how many days you will stay there. Visit the hidden gems on your way at no extra cost.
                    <i class="material-icons pos-absolute" style="color: grey; font-size: 20px; right: 0; bottom: 16px;" @mouseover="showSubtitleInfo = !showSubtitleInfo" @mouseleave="showSubtitleInfo = !showSubtitleInfo">
                        help_outline
                    </i>
                    <div class="pos-absolute subtitle-info font-lato" v-if="showSubtitleInfo">
                        <div>
                            Your personal driver will always be with you for the total length of your trip.
                        </div>
                        <div>
                            Visiting the hidden gems on your way is optional and can be amended locally for free, just speak to your driver.
                        </div>
                        <div>
                            Destination can also be amended locally but you might incur at an additional cost.
                        </div>
                        <div>
                            Plan here to know any cost in advance
                        </div>
                    </div>
                </div>
			</div>
			<div class="sidenav-container">
				<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-column flex-wrap j-c-space-between a-i-center m-10-0-0">
					<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap j-c-space-between">
						<div class="pos-relative d-flex flex-dir-row j-c-space-between a-i-center city-input-container">
							<img :src="'/assets/images/icons/location-green-icon.svg'" class="p-0-8" />
							<input type="text" placeholder="Add destination" style="flex-grow: 1;" v-model="search" @focus="dropdown = true"/>
							<i class="material-icons font-green p-r-8">
								search
							</i>
							<div class="dropdown-wrapper min-width-100 width-100 max-width-100" v-if="dropdown">
								<div class="p-0-8 m-8-0 min-width-100 width-100 max-width-100 font-lato font-size-14 cur-point d-flex a-i-center" v-for="city in filteredCities" @click.once="sleepHere(null, city.id, city.city_name)">
									<img :src="'/assets/images/icons/location-green-icon.svg'" class="m-r-8" />
									{{ city.city_name }}
								</div>
							</div>
						</div>
						<div class="d-flex flex-dir-column j-c-space-evenly a-i-center date-outer-container">
                            <div class="d-flex flex-dir-row j-c-space-evenly a-i-center date-container">
                                <div class="d-flex flex-dir-row a-i-center">
                                    <img :src="'/assets/images/icons/start-date.svg'" class="p-0-8"/>
                                    <input type="text" id="from" placeholder="From" readonly style="flex-grow: 1;" v-model="from"/>
                                </div>
                                <div class="vertical-bar m-0-8" style="max-width: 1px;">
                                </div>
                                <div class="d-flex flex-dir-row a-i-center">
                                    <img :src="'assets/images/icons/end-date.svg'" class="p-0-8"/>
                                    <input type="text" placeholder="To" readonly style="flex-grow: 1;" v-model="to"/>
                                </div>
                            </div>
                            <div class="date-error-msg" v-model="dateErrorMsg" v-if="dateErrorMsg">
                                Sorry, you can't select leave same day
                            </div>
                        </div>
                        <!--<div class="d-flex flex-dir-row j-c-space-evenly a-i-center date-container">
							<div class="d-flex flex-dir-row a-i-center">
								<img :src="'/assets/images/icons/start-date.svg'" class="p-0-8"/>
								<input type="text" id="from" placeholder="From" readonly style="flex-grow: 1;" v-model="from"/>
							</div>
							<div class="vertical-bar m-0-8" style="max-width: 1px;">
							</div>
							<div class="d-flex flex-dir-row a-i-center">
								<img :src="'assets/images/icons/end-date.svg'" class="p-0-8"/>
								<input type="text" placeholder="To" readonly style="flex-grow: 1;" v-model="to"/>
							</div>
						</div>-->
                        <button class="green-button font-size-12 d-flex j-c-center a-i-center" v-bind:class="{'confirm-disabled': confirmDisabled}" :disabled="isConfirmDisabled" style="margin: 0;" @click="confirmDestination">
                            confirm
                        </button>
					</div>
					<div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap a-i-center material-checkbox m-12-0">
						<span @click="lastDestination = !lastDestination" v-model="lastDestination" class="lastDestinationClass" v-bind:class="{active: lastDestination}"></span>
						<span class="m-l-8 last-destination">
							This is my last destination
						</span>
					</div>
				</div>
				<!--<side-nav-map ref="sidenavGoogleMap" :routeDetails="routeDetails" :allCities="allCities" :suggestedDestination="suggestedDestination"></side-nav-map>-->
                <div class="google-map" id="side-nav-google-map"></div>
				<div class="suggested-destination-title m-16-0 min-width-100 width-100 max-width-100">
					Suggested destination
				</div>
				<div class="suggested min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap j-c-space-between" v-if="cities" v-model="cities">
                    <div class="flex-item pos-relative m-b-40 selected" style="overflow: unset;" v-model="selectedCity" v-if="typeof selectedCity === 'object'">
                        <div class="bg-opaque"></div>
                        <img :src="'/admin/assets/images/cities/' + selectedCity.image ">
                        <!--<div class="serial-no d-flex flex-dir-row j-c-center a-i-center font-white">
                            1
                        </div>-->
                        <div class="sleeping-here-close d-flex flex-dir-row j-c-center a-i-center font-white" @click.once="removeSleepHere(selectedCity.index, selectedCity.id, selectedCity.city_name)">
                            <i class="material-icons">
                                close
                            </i>
                        </div>
                        <div class="text-center min-width-100 width-100 max-width-100 city-name uppercase font-lato">
                            {{ selectedCity.city_name | trimCityName }}
                        </div>
                        <!--<div class="text-center city-description">
                            Beautiful landscape in the middle of Cuba
                        </div>-->
                        <div class="sleeping-here">
                            You're sleeping here
                        </div>
                        <div class="font-size-10 m-t-4 font-400 pos-absolute width-100" style="bottom: -18px;" v-if="from" v-model="from">
                            Here on: {{ from }}
                        </div>
                    </div>
                    <div class="addon-flex" v-model="selectedFirstAddOnCity" v-if="typeof selectedCity === 'object' && typeof selectedFirstAddOnCity === 'object'">
                        <div class="pos-relative flex-item selectedaddon">
                            <div class="bg-opaque"></div>
                            <img :src="'/admin/assets/images/cities/' + selectedFirstAddOnCity.image ">
                            <!--<div class="serial-no d-flex flex-dir-row j-c-center a-i-center font-white">
                                1
                            </div>-->
                            <div class="sleeping-here-close d-flex flex-dir-row j-c-center a-i-center font-white" @click.prevent="removeAddOnCity(selectedFirstAddOnCity.id)">
                                <i class="material-icons">
                                    close
                                </i>
                            </div>
                            <div class="text-center min-width-100 width-100 max-width-100 city-name uppercase font-lato">
                                {{ selectedFirstAddOnCity.city_name | trimCityName }}
                            </div>
                            <div class="text-center city-description">
                                Beautiful landscape in the middle of Cuba
                            </div>
                            <div class="sleeping-here" style="font-size: 11px;">
                                You're already stopping here
                            </div>
                        </div>
                        <div class="font-size-10 m-t-4 font-400" v-if="from" v-model="from">
                            Here on: {{ from }}
                        </div>
                        <div class="d-flex flex-dir-column j-c-center a-i-center show-distance">
                            <div class="pos-relative min-width-100 width-100 d-flex a-i-center" style="margin-top: 20%;">
                                <div class="background-color-green d-flex a-i-center">
                                    <div></div>
                                </div>
                                <div class="background-color-orange d-flex j-c-end a-i-center">
                                    <div></div>
                                </div>
                                <img :src="'/assets/images/icons/location-black-icon.svg'" class="pos-absolute">
                            </div>
                            <div class="min-width-100 width-100 d-flex j-c-space-evenly a-i-center m-t-8" style="margin-bottom: 12%;">
                                <div class="font-size-12 font-green font-lato">
                                    {{ selectedFirstAddOnCity.prevDistance | distanceMeterToKm }} Km
                                </div>
                                <div class="font-size-12 font-orange font-lato">
                                    {{ selectedFirstAddOnCity.currDistance | distanceMeterToKm }} Km
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="addon-flex" v-model="selectedSecondAddOnCity" v-if="typeof selectedCity === 'object' && typeof selectedFirstAddOnCity === 'object' && typeof selectedSecondAddOnCity === 'object'">
                        <div class="pos-relative flex-item selectedaddon">
                            <div class="bg-opaque"></div>
                            <img :src="'/admin/assets/images/cities/' + selectedSecondAddOnCity.image ">
                            <!--<div class="serial-no d-flex flex-dir-row j-c-center a-i-center font-white">
                                2
                            </div>-->
                            <div class="sleeping-here-close d-flex flex-dir-row j-c-center a-i-center font-white" @click.prevent="removeAddOnCity(selectedSecondAddOnCity.id)">
                                <i class="material-icons">
                                    close
                                </i>
                            </div>
                            <div class="text-center min-width-100 width-100 max-width-100 city-name uppercase font-lato">
                                {{ selectedSecondAddOnCity.city_name | trimCityName }}
                            </div>
                            <div class="text-center city-description">
                                Beautiful landscape in the middle of Cuba
                            </div>
                            <div class="sleeping-here" style="font-size: 11px;">
                                You're already stopping here
                            </div>
                        </div>
                        <div class="font-size-10 m-t-4 font-400" v-if="from" v-model="from">
                            Here on: {{ from }}
                        </div>
                        <div class="d-flex flex-dir-column j-c-center a-i-center show-distance">
                            <div class="pos-relative min-width-100 width-100 d-flex a-i-center" style="margin-top: 20%;">
                                <div class="background-color-green d-flex a-i-center">
                                    <div></div>
                                </div>
                                <div class="background-color-orange d-flex j-c-end a-i-center">
                                    <div></div>
                                </div>
                                <img :src="'/assets/images/icons/location-black-icon.svg'" class="pos-absolute">
                            </div>
                            <div class="min-width-100 width-100 d-flex j-c-space-evenly a-i-center m-t-8" style="margin-bottom: 12%;">
                                <div class="font-size-12 font-green font-lato">
                                    {{ selectedSecondAddOnCity.prevDistance | distanceMeterToKm }} Km
                                </div>
                                <div class="font-size-12 font-orange font-lato">
                                    {{ selectedSecondAddOnCity.currDistance | distanceMeterToKm }} Km
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-for="(addOnCity, index) in addOnCities" class="addon-flex" v-model="addOnCities, selectedFirstAddOnCity" v-if="typeof selectedCity === 'object' && typeof selectedFirstAddOnCity !== 'object' && selectedFirstAddOnCity.id !== addOnCity.id">
                        <div class="flip-container">
                            <div class="flipper">
                                <div class="front">
                                    <!--<div class="index">
                                        {{ parseInt(index) + 1 }}
                                    </div>-->
                                    <img :src="'/admin/assets/images/cities/' + addOnCity.image" class="city-image">
                                    <div class="city-name">
                                        {{ addOnCity.city_name | trimCityName }}
                                    </div>
                                    <button class="sleep-here" @click="setAddOnCity(index)">
                                        sleep here
                                    </button>
                                    <button class="just-a-look font-lato" style="letter-spacing: 1px" @click="sleepHere(index, addOnCity.id, addOnCity.city_name)">
                                        just a look
                                    </button>
                                </div>
                                <div class="back">
                                    <!--<div class="index">
                                        {{ parseInt(index) + 1 }}
                                    </div>-->
                                    <div class="city-name">
                                        {{ addOnCity.city_name | trimCityName }}
                                    </div>
                                    <div class="city-description">
                                        Beautiful landscape in the middle of Cuba
                                    </div>
                                    <button class="sleep-here" @click="sleepHere(index, addOnCity.id, addOnCity.city_name)">
                                        sleep here
                                    </button>
                                    <button class="just-a-look font-lato" style="letter-spacing: 1px" @click="setAddOnCity(index)">
                                        just a look
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-4 font-size-10 font-400" v-if="addOnCity.prevDate">
                            Here on: {{ addOnCity.prevDate }}
                        </div>
                        <div class="d-flex flex-dir-column j-c-center a-i-center show-distance">
                            <div class="pos-relative min-width-100 width-100 d-flex a-i-center" style="margin-top: 20%;">
                                <div class="background-color-green d-flex a-i-center">
                                    <div></div>
                                </div>
                                <div class="background-color-orange d-flex j-c-end a-i-center">
                                    <div></div>
                                </div>
                                <img :src="'/assets/images/icons/location-black-icon.svg'" class="pos-absolute">
                            </div>
                            <div class="min-width-100 width-100 d-flex j-c-space-evenly a-i-center m-t-8" style="margin-bottom: 12%;">
                                <div class="font-size-12 font-green font-lato">
                                    {{ addOnCity.prevDistance | distanceMeterToKm }} Km
                                </div>
                                <div class="font-size-12 font-orange font-lato">
                                    {{ addOnCity.currDistance | distanceMeterToKm }} Km
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-for="(addOnCity, index) in secondAddOnCities" class="addon-flex" v-model="secondAddOnCities" v-if="typeof selectedCity === 'object' && typeof selectedFirstAddOnCity === 'object' && secondAddOnCities.length !== 0 && selectedSecondAddOnCity.id !== addOnCity.id">
                        <div class="flip-container">
                            <div class="flipper">
                                <div class="front">
                                    <!--<div class="index">
                                        {{ parseInt(index) + 1 }}
                                    </div>-->
                                    <img :src="'/admin/assets/images/cities/' + addOnCity.image" class="city-image">
                                    <div class="city-name">
                                        {{ addOnCity.city_name | trimCityName }}
                                    </div>
                                    <button class="sleep-here" @click="setAddOnCity(index)">
                                        sleep here
                                    </button>
                                    <button class="just-a-look font-lato" style="letter-spacing: 1px" @click="sleepHere(index, addOnCity.id, addOnCity.city_name)">
                                        just a look
                                    </button>
                                </div>
                                <div class="back">
                                    <!--<div class="index">
                                        {{ parseInt(index) + 1 }}
                                    </div>-->
                                    <div class="city-name">
                                        {{ addOnCity.city_name | trimCityName }}
                                    </div>
                                    <div class="city-description">
                                        Beautiful landscape in the middle of Cuba
                                    </div>
                                    <button class="sleep-here" @click="sleepHere(index, addOnCity.id, addOnCity.city_name)">
                                        sleep here
                                    </button>
                                    <button class="just-a-look font-lato" style="letter-spacing: 1px" @click="setAddOnCity(index)">
                                        just a look
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-4 font-size-10 font-400" v-if="addOnCity.prevDate">
                            Here on: {{ addOnCity.prevDate }}
                        </div>
                        <div class="d-flex flex-dir-column j-c-center a-i-center show-distance">
                            <div class="pos-relative min-width-100 width-100 d-flex a-i-center" style="margin-top: 20%;">
                                <div class="background-color-green d-flex a-i-center">
                                    <div></div>
                                </div>
                                <div class="background-color-orange d-flex j-c-end a-i-center">
                                    <div></div>
                                </div>
                                <img :src="'/assets/images/icons/location-black-icon.svg'" class="pos-absolute">
                            </div>
                            <div class="min-width-100 width-100 d-flex j-c-space-evenly a-i-center m-t-8" style="margin-bottom: 12%;">
                                <div class="font-size-12 font-green font-lato">
                                    {{ addOnCity.prevDistance | distanceMeterToKm }} Km
                                </div>
                                <div class="font-size-12 font-orange font-lato">
                                    {{ addOnCity.currDistance | distanceMeterToKm }} Km
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flip-container m-b-40" v-for="(city, index) in cities" v-model="cities" v-if="city.suggested_destination === 1 && selectedCity.id !== city.id && (city.id !== selectedFirstAddOnCity.id || city.id !== selectedSecondAddOnCity.id) && city.id !== previousCityId && city.id !== nextCityId">
                        <div class="flipper">
                            <div class="front">
                                <!--<div class="index">
                                    {{ index + 1 }}
                                </div>-->
                                <img :src="'/admin/assets/images/cities/' + city.image" class="city-image">
                                <div class="city-name">
                                    {{ city.city_name | trimCityName }}
                                </div>
                                <button class="sleep-here" @click="sleepHere(index, city.id, city.city_name)">
                                    sleep here
                                </button>
                            </div>
                            <div class="back">
                                <!--<div class="index">
                                    {{ index + 1 }}
                                </div>-->
                                <div class="city-name">
                                    {{ city.city_name | trimCityName }}
                                </div>
                                <div class="city-description">
                                    Beautiful landscape in the middle of Cuba
                                </div>
                                <button class="sleep-here" @click="sleepHere(index, city.id, city.city_name)">
                                    sleep here
                                </button>
                            </div>
                        </div>
                        <div style="bottom: -16px;" class="pos-absolute font-size-10 font-400" v-if="city.prevDate">
                            Here on: {{ city.prevDate }}
                        </div>
                    </div>
                    <div class="flip-container m-b-40" v-for="(city, index) in cities" v-model="cities" v-if="city.suggested_destination === 0 && selectedCity.id !== city.id && (city.id !== selectedFirstAddOnCity.id || city.id !== selectedSecondAddOnCity.id) && city.id !== previousCityId && city.id !== nextCityId">
                        <div class="flipper">
                            <div class="front">
                                <!--<div class="index">
                                    {{ index + 1 }}
                                </div>-->
                                <img :src="'/admin/assets/images/cities/' + city.image" class="city-image">
                                <div class="city-name">
                                    {{ city.city_name | trimCityName }}
                                </div>
                                <button class="sleep-here" @click="sleepHere(index, city.id, city.city_name)">
                                    sleep here
                                </button>
                            </div>
                            <div class="back">
                                <!--<div class="index">
                                    {{ index + 1 }}
                                </div>-->
                                <div class="city-name">
                                    {{ city.city_name | trimCityName }}
                                </div>
                                <div class="city-description">
                                    Beautiful landscape in the middle of Cuba
                                </div>
                                <button class="sleep-here" @click="sleepHere(index, city.id, city.city_name)">
                                    sleep here
                                </button>
                            </div>
                        </div>
                        <div style="bottom: -16px;" class="pos-absolute font-size-10 font-400" v-if="city.prevDate">
                            Here on: {{ city.prevDate }}
                        </div>
                    </div>
				</div>
                <div class="font-lato d-flex j-c-center a-i-center" v-else>
                    No destinations are found
                </div>
			</div>
            <div class="modal d-flex flex-wrap j-c-center a-i-center" v-if="addonAlert">
                <div class="modal-content">
                    <div class="d-flex j-c-end a-i-center">
                        <button type="button" class="cur-point" @click="closeaddonalert" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modalbody font-lato m-t-56">
                        <div class="text-center">Too many stop in one go!</div>
                        <div class="text-center m-t-32">You can add upto 2 stop overs per route,</div>
                        <div class="text-center">Don't worry there is plenty to see</div>
                    </div>
                    <div class="modalfooter d-flex flex-wrap j-c-space-evenly a-i-center m-t-32">
                        <button type="button" class="uppercase orange-button" @click="closeaddonalert" data-dismiss="modal">
                            KEEP MY PREVIOUS STOP
                        </button>
                        <button type="button" class="uppercase green-button" @click="swapLastAddon" data-dismiss="modal">
                            SWAP THIS FOR MY LAST
                        </button>
                    </div>
                </div>
            </div>
            <div id="selectedCityFromMap" data-index="" data-id="" data-name=""></div>
            <div id="selectedAddonCityFromMap" data-index=""></div>
		</aside>
	</transition>
</template>

<script>
	import GoogleMapsLoader from 'google-maps'
	export default {
		name: "SideNav",
		props: ['allCities', 'destinationIndex', 'routeDetails', 'suggestedDestination', 'prevCityIndex'],
		data() {
			return {
                cities: [],
				calendarSettings: {
					alwaysShowCalendars: true,
					startDate: moment().startOf('hour'),
					endDate: moment().startOf('hour'),
					ranges: {},
					locale: {
						direction: 'ltr', //direction of text
						format: 'DD-MM-YYYY', //fomart of the dates displayed
						separator: ' - ', //separator between the two ranges
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
						weekLabel: 'W',
						customRangeLabel: 'Custom Range',
						daysOfWeek: moment.weekdaysMin(), //array of days - see moment documenations for details
						monthNames: moment.monthsShort(), //array of month names - see moment documenations for details
						firstDay: 1 //ISO first day of week - see moment documenations for details
					},
					minDate: moment().startOf('hour'),
					autoUpdateInput: true,
					autoApply: true,
				},
				search: this.destinationIndex !== 'none' ? this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].city.city_name : '',
				dropdown: false,
				destination: {
					city: {
						id: '',
						name: '',
						latitude: '',
						longitude: '',
						placeId: '',
					},
					no_of_nights: '',
					start_date: '',
					end_date: '',
					add_on_cities: [],
					distance: '',
					price: '',
					time: '',
					lastDestination: false
				},
				lastDestination: false,
				addOnCities: [],
                secondAddOnCities: [],
				from: '',
				to: '',
                longFrom: '',
                longTo: '',
				stringFrom: '',
				stringTo: '',
				totalDay: '',
				totalNight: '',
                temp1: {
	                arriving: '',
                    city: '',
                    departing: '',
                    dropoff: '',
	                endDate: '',
	                firstaddon: '',
	                pickup: '',
	                secondaddon: '',
                    startDate: '',
                    totalDay: '',
                    totalNight: '',
	                btwnDate: false
                },
                temp2: {
	                arriving: {
		                address: '',
		                date: '',
		                note: '',
		                time: ''
	                },
				    city: '',
                    departing: {
                        address: '',
	                    date: '',
                        note: '',
	                    time: ''
                    },
	                distance: '',
	                dropoff: {
		                address: '',
		                date: '',
		                note: '',
		                time: ''
	                },
                    endDate: '',
                    firstaddon: '',
                    lastDestination: '',
                    pickup: {
	                    address: '',
	                    arrivingTo: '',
	                    date: '',
	                    eta: '',
	                    flightNo: '',
	                    flyingFrom: '',
                        note: '',
	                    time: ''
                    },
	                secondaddon: '',
                    startDate: '',
                    totalDay: '',
                    totalNight: '',
	                betweenDate: false
                },
				selectedCity: '',
				selectedFirstAddOnCity: '',
				selectedSecondAddOnCity: '',
                previousCityId: '',
                nextCityId: '',
				showSubtitleInfo: false,
                title: 'Add destination',
                subTitle: '',
				confirmDisabled: true,
                addonAlert: false,
                swapAddonIndex: '',
				dateErrorMsg: false
			}
		},
		mounted() {
			var vm = this;
			
			$('#selectedCityFromMap').on('click', function(){
				vm.sleepHere($('#selectedCityFromMap').attr('data-index'), $('#selectedCityFromMap').attr('data-id'), $('#selectedCityFromMap').attr('data-name'));
            });
			
			$('#selectedAddonCityFromMap').on('click', function(){
				vm.setAddOnCity($('#selectedAddonCityFromMap').attr('data-index'));
			});
			
		    // No scroll effect when sidenavbar opens
		    $('body').css('overflow', 'hidden');

            // When adding city
            if (this.destinationIndex === 'none' && this.$root.$refs.createplan.addCityBetween === false) {
                // Get cities first time, distances from havana are less than 600km
                if (this.$root.$refs.createplan.routeDetails.cities.length === 0) {
                    this.getCities();
                }
                // Get cities next time, distances from previous city are less than 600km
                else {
                	/*let totalDistanceCoveredInSingleDay = 0;
                	let index = this.$root.$refs.createplan.routeDetails.cities.length - 1;
                	while (index !== 0) {
                		if (this.$root.$refs.createplan.routeDetails.cities[index].startDate === this.$root.$refs.createplan.routeDetails.cities[index - 1].startDate) {
			                totalDistanceCoveredInSingleDay += this.$root.$refs.createplan.routeDetails.cities[index].distance;
                        }
		                index--;
                    }*/
                    let previousCityId = 0;
                    let firstAddonCityId = 0;
                    let secondAddonCityId = 0;
                    if (this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].startDate === this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate) {
	                    previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city.id;
	                    // Set previous city id
	                    this.previousCityId = previousCityId;
	                    if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(this.$root.$refs.createplan.routeDetails.cities.length - 2) && this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 2].startDate === this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 2].endDate) {
		                    firstAddonCityId = previousCityId;
	                    	previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 2].city.id;
		                    // Set previous city id
		                    //this.previousCityId = previousCityId;
	                    	if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(this.$root.$refs.createplan.routeDetails.cities.length - 3) && this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 3].startDate === this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 3].endDate) {
			                    secondAddonCityId = firstAddonCityId;
			                    firstAddonCityId = previousCityId;
			                    previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 3].city.id;
			                    // Set previous city id
			                    //this.previousCityId = previousCityId;
		                    }
	                    }
                    }
                    else {
	                    previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city.id;
	                    // Set previous city id
	                    this.previousCityId = previousCityId;
                    }
                    // Passing previous city id as parameter
                    this.getCities(previousCityId, firstAddonCityId, secondAddonCityId);
                }
            }
            // When adding city between two cities
            else if (this.destinationIndex === 'none' && this.$root.$refs.createplan.addCityBetween === true) {
	            let totalDistanceCoveredInSingleDay = 0;
	            let index = this.$root.$refs.createplan.routeDetails.cities.length - 1;
	            while (index !== 0) {
		            if (this.$root.$refs.createplan.routeDetails.cities[index].startDate === this.$root.$refs.createplan.routeDetails.cities[index - 1].startDate) {
			            totalDistanceCoveredInSingleDay += this.$root.$refs.createplan.routeDetails.cities[index].distance;
		            }
		            index--;
	            }
            	// Set previous city id
                this.previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.prevCityIndex].city.id;
                // Set next city id
                this.nextCityId = this.$root.$refs.createplan.routeDetails.cities[this.prevCityIndex + 1].city.id;
                this.getCities(this.$root.$refs.createplan.routeDetails.cities[this.prevCityIndex].city.id, totalDistanceCoveredInSingleDay);
            }
			// When editing city
            else if (this.destinationIndex !== 'none') {
                this.editCity(this.destinationIndex);
            }
            
			let startDate = moment().startOf('hour');
			let endDate = moment().startOf('hour');
			let minDate = moment().startOf('hour');

			if (vm.routeDetails.cities.length > 0 && vm.destinationIndex === 'none' && vm.$root.$refs.createplan.addCityBetween === false) {
                startDate = new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate);
				minDate = endDate = startDate;
			}
            if (vm.routeDetails.cities.length > 0 && vm.destinationIndex === 'none' && vm.$root.$refs.createplan.addCityBetween === true) {
                startDate = new Date(vm.routeDetails.cities[this.prevCityIndex].endDate);
	            minDate = endDate = startDate;
            }
            if (vm.routeDetails.cities.length > 0 && vm.destinationIndex !== 'none') {
	            minDate = startDate = new Date(vm.routeDetails.cities[vm.destinationIndex].startDate);
                endDate = new Date(vm.routeDetails.cities[vm.destinationIndex].endDate);
            }
            if (vm.routeDetails.cities.length === 0 && vm.destinationIndex === 'none' && vm.$root.$refs.createplan.tripStartDateObj._d !== '' && vm.$root.$refs.createplan.tripEndDateObj._d !== '') {
			    //console.log(vm.$root.$refs.createplan.tripStartDateObj._d);
			    //console.log(vm.$root.$refs.createplan.tripEndDateObj._d);
	            minDate = startDate = vm.$root.$refs.createplan.tripStartDateObj._d;
                endDate = vm.$root.$refs.createplan.tripEndDateObj._d;
			}
			if (vm.routeDetails.cities.length === 0 && vm.destinationIndex === 'none' && vm.$root.$refs.createplan.tripStartDateObj === '' && vm.$root.$refs.createplan.tripEndDateObj === '') {
				minDate = startDate = moment().startOf('hour');
                endDate = moment().startOf('hour');
			}
			if (this.destinationIndex !== 'none' && vm.routeDetails.cities.length > 0 && vm.routeDetails.cities[this.destinationIndex].lastDestination === true) {
				if (this.destinationIndex !== 0) {
					minDate = startDate = moment(vm.routeDetails.cities[this.destinationIndex - 1].endDate);
					endDate = moment(vm.routeDetails.cities[this.destinationIndex - 1].endDate).add(1, 'day');
                }
				else {
					minDate = startDate = moment(vm.routeDetails.cities[vm.destinationIndex].startDate);
					endDate = moment(vm.routeDetails.cities[vm.destinationIndex].endDate);
                }
            }
			if (vm.destinationIndex === 0) {
				startDate = moment(vm.routeDetails.cities[vm.destinationIndex].startDate);
				endDate = moment(vm.routeDetails.cities[vm.destinationIndex].endDate);
				minDate = moment().startOf('hour');
            }
			//vm.from = startDate._d.getDate() + ' ' + startDate._locale._monthsShort[startDate._d.getMonth()];
			$('.date-container').daterangepicker({
				//alwaysShowCalendars: true,
				opens: 'center',
				startDate: startDate,
				endDate: endDate,
				//minDate: startDate,
				minDate: minDate,
				autoUpdateInput: true,
				autoApply: true,
			}, function(start, end) {
				vm.destination.start_date = start._d;
				vm.destination.end_date = end._d;
				vm.from = start._d.getDate() + ' ' + start._locale._monthsShort[start._d.getMonth()];
				vm.to = end._d.getDate() + ' ' + end._locale._monthsShort[end._d.getMonth()];
				vm.longFrom = start._d.getDate() + ' ' + start._locale._monthsShort[start._d.getMonth()] + ' ' + start._d.getFullYear();
                vm.longTo = end._d.getDate() + ' ' + end._locale._monthsShort[end._d.getMonth()] + ' ' + end._d.getFullYear();
				vm.stringFrom = start.format('YYYY-MM-DD');
				vm.stringTo = end.format('YYYY-MM-DD');
				vm.totalDay = Math.ceil((Math.abs(end._d.getTime() - start._d.getTime())) / (1000 * 60 * 60 * 24));
				vm.totalNight = Math.floor((Math.abs(end._d.getTime() - start._d.getTime())) / (1000 * 60 * 60 * 24));
                vm.$root.$refs.createplan.freeCancellationText = 'FREE Cancellation before 11:59 PM on ' + (start._d.getDate() - 2) + ' ' + start._locale._monthsShort[start._d.getMonth()] + ' ' + start._d.getFullYear();
                if (vm.stringFrom !== vm.stringTo) {
                	vm.dateErrorMsg = false;
                }
                //console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			}).on('show.daterangepicker', function (ev, picker) {
				if (vm.$root.$refs.createplan.routeDetails.cities.length === 0 || vm.destinationIndex === 'none' && vm.$root.$refs.createplan.addCityBetween === false && typeof vm.$root.$refs.createplan.routeDetails.cities[vm.$root.$refs.createplan.routeDetails.cities.length - 1].secondaddon !== 'object') {
					picker.container.find('.drp-buttons:not(:contains(Leave))').css('display', 'none').append('Leave same day');
					picker.container.find('.available').on('mousedown.daterangepicker', function() {
						picker.container.find('.drp-buttons').css('display', 'block').click(function () {
							picker.container.find('.start-date').trigger('mousedown.daterangepicker');
						});
					});
                }
				/*picker.container.find('.drp-buttons:not(:contains(Leave))').css('display', 'none').append('Leave same day');
				picker.container.find('.available').on('mousedown.daterangepicker', function() {
					picker.container.find('.drp-buttons').css('display', 'block').click(function () {
						picker.container.find('.start-date').trigger('mousedown.daterangepicker');
					});
                });*/
                if (vm.$root.$refs.createplan.tripStartDate != '' && vm.destinationIndex !== 0) {
	                picker.container.find('.start-date').trigger('mousedown.daterangepicker');
                }
            });
		},
		computed: {
			filteredCities: function () {
				if (typeof this.cities !== 'undefined') {
					return this.cities.filter(city => {
						if (this.$root.$refs.createplan.addCityBetween === false) {
							if (city.id !== this.previousCityId) {
								return city.city_name.toLowerCase().includes(this.search.toLowerCase())
							}
							else {
								return false;
							}
						}
						else if (this.$root.$refs.createplan.addCityBetween === true) {
							if (city.id !== this.previousCityId && city.id !== this.nextCityId) {
								return city.city_name.toLowerCase().includes(this.search.toLowerCase())
							}
							else {
								return false;
							}
						}
					});
                }
			},
			renderedCities: function (){
				let renderedCities = new Array();
				
				//Push selected city
				renderedCities.push(this.destination.city);
				
				//Push add-on cities
				renderedCities.concat(this.addOnCities);
				
				return renderedCities;
			},
			isConfirmDisabled: function () {
                if (this.search != '' && this.from != '' && this.to != '') {
                	return this.confirmDisabled = false;
                }
                else {
	                return this.confirmDisabled = true;
                }
			}
		},
		filters: {
            trimCityName: function (cityName) {
                return cityName.length > 15 ? cityName.substring(0, 10) + '...' : cityName;
            },
            distanceMeterToKm: function (distance) {
                return Math.round(distance / 1000);
            }
		},
		methods: {
		    closeSideNav: function () {
                //this.filteredCities[0].selectedAsCity = false;
                this.$root.$refs.createplan.showModal = false;
                this.$root.$refs.createplan.addCityBetween = false;
            },
			getCities: function (previousCityId, firstAddonCityId, secondAddonCityId) {
		        let uri = '';
                if (typeof previousCityId === 'undefined') {
                    uri = '/get-cities';
				}
				else {
                    uri = '/get-cities/' + previousCityId + '/' + firstAddonCityId + '/' + secondAddonCityId;
				}
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                axios.get(uri)
                    .then((response) => {
                        if (response.status === 200 && response.statusText === 'OK') {
                            this.cities = response.data.cities;
                            if (this.$root.$refs.createplan.routeDetails.cities.length > 0) {
	                            for (let d = 0; d < this.cities.length; d++) {
		                            for (let c = 0; c < this.$root.$refs.createplan.routeDetails.cities.length; c++) {
			                            if ((this.$root.$refs.createplan.routeDetails.cities[c].city.id === this.cities[d].id) || (typeof this.$root.$refs.createplan.routeDetails.cities[c].firstaddon === 'object' && this.$root.$refs.createplan.routeDetails.cities[c].firstaddon.id === this.cities[d].id) || (typeof this.$root.$refs.createplan.routeDetails.cities[c].secondaddon === 'object' && this.$root.$refs.createplan.routeDetails.cities[c].secondaddon.id === this.cities[d].id)) {
				                            this.cities[d].prevDate = moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getDate() + ' ' + moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._locale._monthsShort[moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getMonth()];
				                            break;
			                            }
                                    }
                                }
                            }
	                        this.displayMap();
                        }
                    });
            },
			//deleteDestination: function (destinationIndex, destinationAddOnIndex) {
			deleteDestination: function (destinationIndex) {
				/*if (destinationAddOnIndex === null) {
				
				}
				else if (Number.isInteger(destinationAddOnIndex)) {
					if (destinationAddOnIndex === 0) {
						this.$root.$refs.createplan.routeDetails.cities[destinationIndex].firstaddon = '';
					}
					else if (destinationAddOnIndex === 1) {
						this.$root.$refs.createplan.routeDetails.cities[destinationIndex].secondaddon = '';
					}
				}
				this.calculatePrice();
				this.$root.$refs.createplan.$refs.googleMap.displayMap();
				this.$root.$refs.createplan.routeEditModal = false;*/
				// Delete only first city
				if (destinationIndex === 0) {
					if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(destinationIndex + 1)) {
						this.$root.$refs.createplan.routeDetails.cities[destinationIndex + 1].firstaddon = '';
						this.$root.$refs.createplan.routeDetails.cities[destinationIndex + 1].secondaddon = '';
						//this.reCalculateArrivingDepartingDates(destinationIndex);
					}
					if (this.$root.$refs.createplan.routeDetails.cities.length === 1) {
						this.$root.$refs.createplan.lastDestination = false;
						this.$root.$refs.createplan.bordernoneActive = false;
					}
					this.$root.$refs.createplan.routeDetails.cities.shift();
				}
				// Delete only last city
				else if (destinationIndex === this.$root.$refs.createplan.routeDetails.cities.length - 1) {
					this.$root.$refs.createplan.routeDetails.cities.pop();
					this.$root.$refs.createplan.lastDestination = false;
				}
				// Delete any city between first and last city
				else {
					if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(destinationIndex + 1)) {
						this.$root.$refs.createplan.routeDetails.cities[destinationIndex + 1].firstaddon = '';
						this.$root.$refs.createplan.routeDetails.cities[destinationIndex + 1].secondaddon = '';
						//this.reCalculateArrivingDepartingDates(destinationIndex);
					}
					this.$root.$refs.createplan.routeDetails.cities.splice(destinationIndex, 1);
				}
				//this.reCalculateLeftCalendarDates();
			},
			searchedCity: function (cityId, cityName) {
				this.search = cityName;
				this.dropdown = false;
			},
			editCity: function (parameter) {
				if (parameter !== 'none') {
					if (parameter !== 0) {
						this.previousCityId = this.$root.$refs.createplan.routeDetails.cities[parameter - 1].city.id;
                    }
					if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(parameter + 1)) {
						this.nextCityId = this.$root.$refs.createplan.routeDetails.cities[parameter + 1].city.id;
                    }
				    // Set city object which is being edited
					this.selectedCity = this.temp1.city = this.$root.$refs.createplan.routeDetails.cities[parameter].city;
					
					if (parameter !== 0) {
						// Passing previous city id as parameter
						this.getCities(this.$root.$refs.createplan.routeDetails.cities[parameter - 1].city.id);
                    }
					else {
						//this.getCities(this.$root.$refs.createplan.routeDetails.cities[parameter].city.id);
						this.getCities();
                    }
					
                    // Set firstaddoncity object if any
                    this.selectedFirstAddOnCity = this.temp1.firstaddon = this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].firstaddon;
                    // Set secondaddoncity object if any
                    this.selectedSecondAddOnCity = this.temp1.secondaddon = this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].secondaddon;
                    
                    if (parameter === 0) {
                    	this.temp1.pickup = this.$root.$refs.createplan.routeDetails.cities[parameter].pickup;
                    }
                    else if (this.$root.$refs.createplan.routeDetails.cities[parameter].lastDestination === true) {
	                    this.$root.$refs.createplan.lastDestination = true;
	                    this.temp1.dropoff = this.$root.$refs.createplan.routeDetails.cities[parameter].dropoff;
                    }
                    else {
                        this.temp1.arriving = this.$root.$refs.createplan.routeDetails.cities[parameter].arriving;
					}
					this.temp1.departing = this.$root.$refs.createplan.routeDetails.cities[parameter].departing;
					this.temp1.endDate = this.$root.$refs.createplan.routeDetails.cities[parameter].endDate;
					this.temp1.startDate = this.$root.$refs.createplan.routeDetails.cities[parameter].startDate;
					this.temp1.totalDay = this.$root.$refs.createplan.routeDetails.cities[parameter].totalDay;
					this.temp1.totalNight = this.$root.$refs.createplan.routeDetails.cities[parameter].totalNight;

					this.searchedCity(this.$root.$refs.createplan.routeDetails.cities[parameter].city.id, this.$root.$refs.createplan.routeDetails.cities[parameter].city.city_name);
					/*this.destination.city.id = this.$root.$refs.createplan.routeDetails.cities[parameter].city.id;
					this.destination.city.name = this.$root.$refs.createplan.routeDetails.cities[parameter].city.city_name;
					this.destination.city.latitude = this.$root.$refs.createplan.routeDetails.cities[parameter].city.latitude;
					this.destination.city.longitude = this.$root.$refs.createplan.routeDetails.cities[parameter].city.longitude;
					this.destination.city.placeId = this.$root.$refs.createplan.routeDetails.cities[parameter].city.placeId;*/
					
					this.lastDestination = this.$root.$refs.createplan.routeDetails.cities[parameter].lastDestination;
					
                    /*if (this.$root.$refs.createplan.routeDetails.cities[parameter].lastDestination === true) {
	                    this.$root.$refs.createplan.lastDestination = true;
                    }*/
                    
                    /*let momentDate = moment();
					console.log(momentDate);*/
					let momentStartDate = moment(this.$root.$refs.createplan.routeDetails.cities[parameter].startDate);
					this.from = momentStartDate._d.getDate() + ' ' + momentStartDate._locale._monthsShort[momentStartDate._d.getMonth()];
					this.longFrom = momentStartDate._d.getDate() + ' ' + momentStartDate._locale._monthsShort[momentStartDate._d.getMonth()] + ' ' + momentStartDate._d.getFullYear();
					this.stringFrom = this.$root.$refs.createplan.routeDetails.cities[parameter].startDate;
					let momentEndDate = moment(this.$root.$refs.createplan.routeDetails.cities[parameter].endDate);
					this.to = momentEndDate._d.getDate() + ' ' + momentEndDate._locale._monthsShort[momentEndDate._d.getMonth()];
					this.longTo = momentEndDate._d.getDate() + ' ' + momentEndDate._locale._monthsShort[momentEndDate._d.getMonth()] + ' ' + momentEndDate._d.getFullYear();
					this.stringTo = this.$root.$refs.createplan.routeDetails.cities[parameter].endDate;
					this.totalDay = this.$root.$refs.createplan.routeDetails.cities[parameter].totalDay;
					this.totalNight = this.$root.$refs.createplan.routeDetails.cities[parameter].totalNight;
					
					/*if (this.$root.$refs.createplan.routeDetails.cities[parameter].lastDestination === false || (this.destinationIndex === 0 && this.$root.$refs.createplan.routeDetails.cities[parameter].lastDestination === true)) {
						let momentStartDate = moment(this.$root.$refs.createplan.routeDetails.cities[parameter].startDate);
						this.from = momentStartDate._d.getDate() + ' ' + momentStartDate._locale._monthsShort[momentStartDate._d.getMonth()];
						this.longFrom = momentStartDate._d.getDate() + ' ' + momentStartDate._locale._monthsShort[momentStartDate._d.getMonth()] + ' ' + momentStartDate._d.getFullYear();
						this.stringFrom = this.$root.$refs.createplan.routeDetails.cities[parameter].startDate;
						let momentEndDate = moment(this.$root.$refs.createplan.routeDetails.cities[parameter].endDate);
						this.to = momentEndDate._d.getDate() + ' ' + momentEndDate._locale._monthsShort[momentEndDate._d.getMonth()];
						this.longTo = momentEndDate._d.getDate() + ' ' + momentEndDate._locale._monthsShort[momentEndDate._d.getMonth()] + ' ' + momentEndDate._d.getFullYear();
						this.stringTo = this.$root.$refs.createplan.routeDetails.cities[parameter].endDate;
						this.totalDay = this.$root.$refs.createplan.routeDetails.cities[parameter].totalDay;
						this.totalNight = this.$root.$refs.createplan.routeDetails.cities[parameter].totalNight;
                    }
					else if (this.destinationIndex !== 0 && this.$root.$refs.createplan.routeDetails.cities[parameter].lastDestination === true) {
						let momentStartDate = moment(this.$root.$refs.createplan.routeDetails.cities[parameter - 1].endDate);
						this.from = momentStartDate._d.getDate() + ' ' + momentStartDate._locale._monthsShort[momentStartDate._d.getMonth()];
						this.longFrom = momentStartDate._d.getDate() + ' ' + momentStartDate._locale._monthsShort[momentStartDate._d.getMonth()] + ' ' + momentStartDate._d.getFullYear();
						this.stringFrom = this.$root.$refs.createplan.routeDetails.cities[parameter - 1].endDate;
						
						let momentEndDate = moment(this.$root.$refs.createplan.routeDetails.cities[parameter].endDate);
						this.to = momentEndDate._d.getDate() + ' ' + momentEndDate._locale._monthsShort[momentEndDate._d.getMonth()];
						this.longTo = momentEndDate._d.getDate() + ' ' + momentEndDate._locale._monthsShort[momentEndDate._d.getMonth()] + ' ' + momentEndDate._d.getFullYear();
						this.stringTo = this.$root.$refs.createplan.routeDetails.cities[parameter].endDate;
						this.totalDay = 0;
						this.totalNight = 0;
                    }*/
					
					if (parameter !== 0) {
						//this.fetchAddOnCities(this.$root.$refs.createplan.routeDetails.cities[parameter].city.id, this.$root.$refs.createplan.routeDetails.cities[parameter - 1].city.id);
						this.fetchFirstAddOnCities(this.$root.$refs.createplan.routeDetails.cities[parameter - 1].city.id, this.$root.$refs.createplan.routeDetails.cities[parameter].city.id);
						if (this.temp1.firstaddon !== '') {
							this.fetchSecondAddOnCities(this.$root.$refs.createplan.routeDetails.cities[parameter - 1].city.id, this.$root.$refs.createplan.routeDetails.cities[parameter].city.id, this.temp1.firstaddon.id);
						}
                    }
				}
			},
			sleepHere: function (index, cityId, cityName) {
		    	this.searchedCity(cityId, cityName);
                if (this.selectedCity === '') {
                    this.selectedCity = this.filteredCities[0];
                }
                else if (typeof this.selectedCity === 'undefined') {
	                this.selectedCity = this.cities[index];
                }
                else {
                    if (this.selectedCity.id !== this.filteredCities[0].id) {
                        this.selectedCity = this.filteredCities[0];
                        this.selectedFirstAddOnCity = '';
                        this.selectedSecondAddOnCity = '';
                        this.addOnCities = [];
                        this.secondAddOnCities = [];
                    }
                }
                if (this.$root.$refs.createplan.routeDetails.cities.length > 0) {
                    if (this.destinationIndex === 'none' && this.$root.$refs.createplan.addCityBetween === false) {
                        this.fetchDistance(cityId, this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city.id);
                        this.fetchFirstAddOnCities(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city.id, cityId);
                    }
                    else if (this.destinationIndex === 'none' && this.$root.$refs.createplan.addCityBetween === true) {
                        this.fetchDistance(cityId, this.$root.$refs.createplan.routeDetails.cities[this.prevCityIndex].city.id);
                        this.fetchFirstAddOnCities(this.$root.$refs.createplan.routeDetails.cities[this.prevCityIndex].city.id, cityId);
                    }
                    else {
                    	if (this.destinationIndex !== 0) {
		                    this.fetchDistance(cityId, this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex - 1].city.id);
		                    this.fetchFirstAddOnCities(this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex - 1].city.id, cityId);
                        }
                    }
                }
                this.displayMap();
			},
			removeSleepHere: function (index, cityId, cityName) {
                this.search = '';
                this.selectedCity = '';
                this.selectedFirstAddOnCity = '';
                this.selectedSecondAddOnCity = '';
                this.addOnCities = [];
                this.secondAddOnCities = [];
				this.displayMap();
			},
			confirmDestination: function () {
		    	if (this.selectedCity != '' && this.stringFrom != '' && this.stringTo != '') {
		    		if ((this.$root.$refs.createplan.routeDetails.cities.length !== 0 && ((this.$root.$refs.createplan.addCityBetween === false && this.lastDestination === false && typeof this.selectedSecondAddOnCity === 'object') || (this.$root.$refs.createplan.addCityBetween === true) || (this.destinationIndex !== 'none' && this.destinationIndex !== 0 && this.lastDestination === false && typeof this.selectedSecondAddOnCity === 'object')) && (this.stringFrom === this.stringTo)) || (this.$root.$refs.createplan.routeDetails.cities.length >= 2 && this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].startDate === this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate && this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate === this.stringFrom && this.stringFrom === this.stringTo)) {
					    this.dateErrorMsg = true;
                    }
		    		/*else if (this.$root.$refs.createplan.routeDetails.cities.length >= 2 && this.stringTo === this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate) {
		    			if (typeof this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].firstaddon === 'object' && typeof this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].secondaddon !== 'object') {
						    this.dateErrorMsg = true;
                        }
                    }*/
		    		else {
					    let vm = this;
					    let pickupDate = '';
					    let departingDate = '';
					    let arrivingDate = '';
					    let dropoffDate = '';
					    let start = '';
					    let end = '';
					    let totDay = 0;
					    let totNight = 0;
					    var btwnDate = false;
					    if (this.destinationIndex === 'none' && this.$root.$refs.createplan.addCityBetween === false) {
						    if (this.lastDestination === false) {
							    departingDate = this.longTo;
							    start = this.stringFrom;
							    end = this.stringTo;
							    totDay = this.totalDay;
							    totNight = this.totalNight;
							    if (this.$root.$refs.createplan.routeDetails.cities.length === 0) {
								    pickupDate = this.longFrom;
							    } else if (this.$root.$refs.createplan.routeDetails.cities.length >= 1) {
								    arrivingDate = this.longFrom;
							    }
							    /*if (moment(end)._d.getDate() - moment(start)._d.getDate() >= 2 || this.$root.$refs.createplan.routeDetails.cities.length === 0) {
									btwnDate = true;
								}*/
							    if ((pickupDate != '' && this.totalDay > 1) || (moment(end)._d.getDate() - moment(start)._d.getDate() >= 2)) {
								    btwnDate = true;
							    }
						    }
						    else {
							    start = this.stringFrom;
							    end = this.stringTo;
							    totDay = this.totalDay;
							    totNight = this.totalNight;
							
							    dropoffDate = this.longTo;
							    if (this.$root.$refs.createplan.routeDetails.cities.length > 0) {
								    /*let endMoment = moment(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate).add(1, 'day');
									let endMomentString = endMoment.format('YYYY-MM-DD');
									let endMomentObj = endMoment._d.getDate() + ' ' + endMoment._locale._monthsShort[endMoment._d.getMonth()] + ' ' + endMoment._d.getFullYear();
									end = endMomentString;
									dropoffDate = endMomentObj;*/
								    arrivingDate = this.longFrom;
							    }
							    else if (this.$root.$refs.createplan.routeDetails.cities.length === 0) {
								    pickupDate = this.longFrom;
							    }
							    this.$root.$refs.createplan.lastDestination = true;
							    if ((pickupDate != '' && this.totalDay >= 1) || (dropoffDate != '' && this.totalDay > 1)) {
								    btwnDate = true;
							    }
						    }
						    /*if (moment(end)._d.getDate() - moment(start)._d.getDate() >= 2) {
								btwnDate = true;
							}*/
						    //if (this.$root.$refs.createplan.routeDetails.cities.length >= 2 && this.stringFrom === this.stringTo) {
						    if (this.$root.$refs.createplan.routeDetails.cities.length >= 2 && this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].startDate === this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate) {
							    let previousCityIndex = 0;
							    let previousCityId = 0;
							    let firstAddonCityId = 0;
							    let secondAddonCityId = 0;
							    if (this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].startDate === this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate) {
								    previousCityIndex = this.$root.$refs.createplan.routeDetails.cities.length - 1;
								    previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city.id;
								    // Set previous city id
								    // this.previousCityId = previousCityId;
								    if (this.$root.$refs.createplan.routeDetails.cities.length - 2 !== 0 && this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(this.$root.$refs.createplan.routeDetails.cities.length - 2) && this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 2].startDate === this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 2].endDate) {
									    firstAddonCityId = previousCityId;
									    previousCityIndex = this.$root.$refs.createplan.routeDetails.cities.length - 2;
									    previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 2].city.id;
									    // Set previous city id
									    // this.previousCityId = previousCityId;
									    /*if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(this.$root.$refs.createplan.routeDetails.cities.length - 3) && this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 3].startDate === this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 3].endDate) {
											secondAddonCityId = firstAddonCityId;
											firstAddonCityId = previousCityId;
											previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 3].city.id;
											this.previousCityId = previousCityId;
										}
										else {
										
										}*/
									    this.selectedFirstAddOnCity = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 2].city;
									    this.selectedSecondAddOnCity = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city;
									    this.fetchPrevCurrDistanceTime(this.previousCityId, this.selectedCity.id, this.selectedFirstAddOnCity.id, this.selectedSecondAddOnCity.id);
									    this.deleteDestination(previousCityIndex);
								    }
								    else {
									    if (typeof this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].firstaddon === 'object') {
										    previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 2].city.id;
										    this.selectedFirstAddOnCity = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].firstaddon;
										    this.selectedSecondAddOnCity = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city;
										    this.fetchPrevCurrDistanceTime(previousCityId, this.selectedCity.id, this.selectedFirstAddOnCity.id, this.selectedSecondAddOnCity.id);
									    }
									    else {
										    //previousCityIndex = this.$root.$refs.createplan.routeDetails.cities.length - 2;
										    previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 2].city.id;
										    this.previousCityId = previousCityId;
										    this.selectedFirstAddOnCity = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city;
										    this.fetchPrevCurrDistanceTime(this.previousCityId, this.selectedCity.id, this.selectedFirstAddOnCity.id);
									    }
									    this.deleteDestination(previousCityIndex);
								    }
							    }
							    else {
								    previousCityId = this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city.id;
								    // Set previous city id
								    this.previousCityId = previousCityId;
							    }
						    }
						    this.$root.$refs.createplan.routeDetails.cities.push({
							    city: this.selectedCity,
							    firstaddon: this.selectedFirstAddOnCity,
							    secondaddon: this.selectedSecondAddOnCity,
							    pickup: {
								    address: '',
								    time: '',
								    date: pickupDate,
								    arrivingTo: '',
								    eta: '',
								    flyingFrom: '',
								    flightNo: '',
								    note: ''
							    },
							    departing: {
								    address: '',
								    time: '',
								    date: departingDate,
								    note: ''
							    },
							    arriving: {
								    address: '',
								    time: '',
								    date: arrivingDate,
								    note: ''
							    },
							    dropoff: {
								    address: '',
								    time: '',
								    date: dropoffDate,
								    note: ''
							    },
							    startDate: start,
							    endDate: end,
							    totalDay: totDay,
							    totalNight: totNight,
							    lastDestination: this.lastDestination,
							    distance: this.selectedCity.distance,
							    betweenDate: btwnDate,
							    middleAddons: {}
						    });
					    }
					    // Inserting new city in between previous city and next city
					    else if (this.destinationIndex === 'none' && this.$root.$refs.createplan.addCityBetween === true) {
						    this.temp2.city = this.selectedCity;
						    this.temp2.distance = this.destination.distance;
						    this.temp2.firstaddon = this.selectedFirstAddOnCity;
						    this.temp2.secondaddon = this.selectedSecondAddOnCity;
						    this.temp2.lastDestination = this.lastDestination;
						    /*if (moment(this.stringTo)._d.getDate() - moment(this.stringFrom)._d.getDate() >= 2) {
								this.temp2.betweenDate = true;
							}*/
						    if (this.lastDestination === false) {
							    if (this.totalDay > 2) {
								    this.temp2.betweenDate = true;
							    }
						    }
						    else {
							    if (this.totalDay > 1) {
								    this.temp2.betweenDate = true;
							    }
						    }
						    this.temp2.arriving.date = this.longFrom;
						
						    this.temp2.startDate = this.stringFrom;
						    this.temp2.endDate = this.stringTo;
						    this.temp2.totalDay = this.totalDay;
						    this.temp2.totalNight = this.totalNight;
						    this.$root.$refs.createplan.routeDetails.cities.splice(this.prevCityIndex + 1, 0, this.temp2);
						    if (this.lastDestination === false) {
							    /*if (moment(this.stringTo)._d.getDate() - moment(this.stringFrom)._d.getDate() >= 2) {
									this.temp2.betweenDate = true;
								}
								this.temp2.arriving.date = this.longFrom;
								this.temp2.departing.date = this.longTo;
								this.temp2.startDate = this.stringFrom;
								this.temp2.endDate = this.stringTo;
								this.temp2.totalDay = this.totalDay;
								this.temp2.totalNight = this.totalNight;*/
							    this.temp2.departing.date = this.longTo;
							    this.$root.$refs.createplan.lastDestination = false;
							    this.$root.$refs.createplan.routeDetails.cities[this.prevCityIndex + 2].firstaddon = '';
							    this.$root.$refs.createplan.routeDetails.cities[this.prevCityIndex + 2].secondaddon = '';
							    this.recalculateDate(this.prevCityIndex + 2);
						    }
						    else {
							    this.temp2.dropoff.date = this.longTo;
							    this.$root.$refs.createplan.lastDestination = true;
							    this.$root.$refs.createplan.routeDetails.cities.length = this.prevCityIndex + 2;
							    /*if (this.$root.$refs.createplan.routeDetails.cities.length > 0) {
									let endMoment = moment(this.$root.$refs.createplan.routeDetails.cities[this.prevCityIndex].endDate).add(1, 'day');
									this.temp2.dropoff.date = endMoment._d.getDate() + ' ' + endMoment._locale._monthsShort[endMoment._d.getMonth()] + ' ' + endMoment._d.getFullYear();
									this.temp2.endDate = endMoment.format('YYYY-MM-DD');
									
									this.temp2.betweenDate = true;
									this.temp2.totalDay = 0;
									this.temp2.totalNight = 0;
								}*/
						    }
					    }
					    // Updating existing city
					    else {
						    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].city = this.selectedCity;
						    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].firstaddon = this.selectedFirstAddOnCity;
						    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].secondaddon = this.selectedSecondAddOnCity;
						
						    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].startDate = this.stringFrom;
						    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].endDate = this.stringTo;
						    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].totalDay = this.totalDay;
						    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].totalNight = this.totalNight;
						
						    if (this.lastDestination === true) {
							    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].departing.address = '';
							    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].departing.date = '';
							    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].departing.note = '';
							    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].departing.time = '';
							
							    let eDate = moment(this.stringTo);
							    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].dropoff.date = eDate._d.getDate() + ' ' + eDate._locale._monthsShort[eDate._d.getMonth()] + ' ' + eDate._d.getFullYear();
							
							    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].lastDestination = this.$root.$refs.createplan.lastDestination = true;
							
							    if (this.destinationIndex === 0 && this.totalDay >= 1) {
								    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].betweenDate = true;
							    }
							    else if (this.destinationIndex !== 0 && this.totalDay > 1) {
								    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].betweenDate = true;
							    }
							    else {
								    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].betweenDate = false;
							    }
							    this.$root.$refs.createplan.routeDetails.cities.length = this.destinationIndex + 1;
						    }
						    else {
							    if (this.temp1.city.id !== this.selectedCity.id) {
								    if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(this.destinationIndex + 1)) {
									    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex + 1].firstaddon = '';
									    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex + 1].secondaddon = '';
								    }
							    }
							
							    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].departing.date = this.to + ' ' + new Date(this.stringTo).getFullYear();
							
							    if (this.destinationIndex === 0) {
								    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].pickup.date = this.from + ' ' + new Date(this.stringFrom).getFullYear();
							    }
							    else {
								    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].arriving.date = this.from + ' ' + new Date(this.stringFrom).getFullYear();
							    }
							    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].dropoff.date = '';
							    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].lastDestination = this.$root.$refs.createplan.lastDestination = false;
							
							    if (this.destinationIndex === 0 && this.totalDay > 1) {
								    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].betweenDate = true;
							    }
							    else if (this.destinationIndex !== 0 && this.totalDay > 2) {
								    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].betweenDate = true;
							    }
							    else {
								    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].betweenDate = false;
							    }
							    if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(this.destinationIndex + 1)) {
								    this.recalculateDate(this.destinationIndex + 1);
							    }
							    if (this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].middleAddons.hasOwnProperty(this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].endDate)) {
								    delete this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].middleAddons[this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].endDate];
							    }
						    }
						    if (this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].betweenDate === false) {
							    this.$root.$refs.createplan.routeDetails.cities[this.destinationIndex].middleAddons = {};
						    }
					    }
					
					    if (this.$root.$refs.createplan.routeDetails.cities.length >= 1) {
						    this.$root.$refs.createplan.bordernoneActive = true;
					    }
					    this.$root.$refs.createplan.showModal = false;
					    this.$root.$refs.createplan.addCityBetween = false;
					    this.$root.$refs.createplan.$refs.googleMap.displayMap();
					    let freeCancellationDate = moment(this.$root.$refs.createplan.routeDetails.cities[0].startDate).subtract(2, 'days');
					    this.$root.$refs.createplan.freeCancellationText = 'FREE Cancellation before 11:59 PM on ' + freeCancellationDate._d.getDate() + ' ' + freeCancellationDate._locale._monthsShort[freeCancellationDate._d.getMonth()] + ' ' + freeCancellationDate._d.getFullYear();
					
					    // Set calendar date
					
					    let startDate = vm.$root.$refs.createplan.tripStartDateObj._d;
					    let endDate = vm.$root.$refs.createplan.tripEndDateObj._d;
					    if (startDate === '') {
						    startDate = moment().startOf('hour');
					    }
					    if (endDate === '') {
						    endDate = moment().startOf('hour');
					    }
					    if ((startDate !== '' || endDate !== '') && new Date(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate) > endDate && this.selectedCity.id !== '') {
						    endDate = new Date(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate);
						    vm.$root.$refs.createplan.tripEndDateObj._d = new Date(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate);
						    vm.$root.$refs.createplan.tripEndDate = new Date(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate).getDate() + ' ' + vm.$root.$refs.createplan.tripEndDateObj._locale._monthsShort[new Date(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate).getMonth()] + ' ' + new Date(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate).getFullYear();
					    }
					    if (this.destinationIndex === 0) {
						    startDate = moment(this.stringFrom);
					    }
					    if (typeof startDate === 'undefined' || typeof endDate === 'undefined') {
						    startDate = new Date(this.stringFrom);
						    endDate = new Date(this.stringTo);
						    if (new Date(this.stringTo) >= endDate && this.selectedCity.id !== '') {
							    vm.$root.$refs.createplan.tripStartDateObj = moment().startOf('hour');
							    vm.$root.$refs.createplan.tripEndDateObj = moment().startOf('hour');
							    vm.$root.$refs.createplan.tripStartDateObj._d = new Date(this.stringFrom);
							    vm.$root.$refs.createplan.tripEndDateObj._d = new Date(this.stringTo);
							
							    vm.$root.$refs.createplan.tripStartDate = new Date(this.stringFrom).getDate() + ' ' + vm.$root.$refs.createplan.tripStartDateObj._locale._monthsShort[new Date(this.stringFrom).getMonth()] + ' ' + new Date(this.stringFrom).getFullYear();
							    vm.$root.$refs.createplan.tripEndDate = new Date(this.stringTo).getDate() + ' ' + vm.$root.$refs.createplan.tripEndDateObj._locale._monthsShort[new Date(this.stringTo).getMonth()] + ' ' + new Date(this.stringTo).getFullYear();
						    }
					    }
					    $('.date-selector').daterangepicker({
						    opens: 'left',
						    minDate: moment().startOf('hour'),
						    autoUpdateInput: true,
						    autoApply: true,
						    linkedCalendars: false,
						    startDate: startDate,
						    endDate: endDate,
						    isCustomDate: function (date) {
							    let formattedDate = new Date(date.format('YYYY-MM-DD')).getTime();
							    if (vm.routeDetails.cities.length >= 1 && vm.$root.$refs.createplan.tripStartDate !== '' && vm.$root.$refs.createplan.tripEndDate !== '') {
								    if (formattedDate >= (new Date(vm.routeDetails.cities[0].startDate).getTime()) && formattedDate <= (new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getTime())) {
									    vm.$root.$refs.createplan.tripStartDate = new Date(vm.routeDetails.cities[0].startDate).getDate() + ' ' + date._locale._monthsShort[new Date(vm.routeDetails.cities[0].startDate).getMonth()] + ' ' + new Date(vm.routeDetails.cities[0].startDate).getFullYear();
									    //vm.$root.$refs.createplan.tripEndDate = new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getDate() + ' ' + date._locale._monthsShort[new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getMonth()] + ' ' + new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getFullYear();
									
									    vm.$root.$refs.createplan.tripStartDateObj = moment().startOf('hour');
									    //vm.$root.$refs.createplan.tripEndDateObj = moment().startOf('hour');
									
									    vm.$root.$refs.createplan.tripStartDateObj._d = new Date(vm.routeDetails.cities[0].startDate);
									    //vm.$root.$refs.createplan.tripEndDateObj._d = new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate);
									
									    if (formattedDate === new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].startDate).getTime() && formattedDate === new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getTime() && vm.routeDetails.cities[vm.routeDetails.cities.length - 1].lastDestination === false) {
										    return 'half-filled';
									    }
									    else {
										    return 'filled';
									    }
									    //return 'filled';
								    }
							    }
							    else if (vm.routeDetails.cities.length >= 1 && vm.$root.$refs.createplan.tripStartDate === '' && vm.$root.$refs.createplan.tripEndDate === '') {
								    vm.$root.$refs.createplan.tripStartDate = new Date(vm.routeDetails.cities[0].startDate).getDate() + ' ' + date._locale._monthsShort[new Date(vm.routeDetails.cities[0].startDate).getMonth()] + ' ' + new Date(vm.routeDetails.cities[0].startDate).getFullYear();
								    vm.$root.$refs.createplan.tripEndDate = new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getDate() + ' ' + date._locale._monthsShort[new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getMonth()] + ' ' + new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getFullYear();
								
								    vm.$root.$refs.createplan.tripStartDateObj = moment().startOf('hour');
								    vm.$root.$refs.createplan.tripEndDateObj = moment().startOf('hour');
								
								    vm.$root.$refs.createplan.tripStartDateObj._d = new Date(vm.routeDetails.cities[0].startDate);
								    vm.$root.$refs.createplan.tripEndDateObj._d = new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate);
								
								    if (formattedDate === new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].startDate).getTime() && formattedDate === new Date(vm.routeDetails.cities[vm.routeDetails.cities.length - 1].endDate).getTime() && vm.routeDetails.cities[vm.routeDetails.cities.length - 1].lastDestination === false) {
									    return 'half-filled';
								    }
								    else {
									    return 'filled';
								    }
								    //return 'filled';
							    }
						    }
					    });
					    $('.date-selector').data('daterangepicker').container.find('.drp-calendar').unbind('mousedown.daterangepicker' );
					    $('.date-selector').data('daterangepicker').container.find('.drp-calendar').unbind('mouseenter.daterangepicker' );
					    $('#show-calender').html( $('.date-selector').data('daterangepicker').container);
					    $('.date-selector').trigger('click');
					    this.calculatePrice();
                    }
                }
			},
            fetchDistance: function (currentCityId, previousCityId) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                axios.get('/fetch-distance/' + currentCityId + '/' + previousCityId)
                    .then((response) => {
                        if (response.data === 'error') {
                        }
                        else {
                            this.selectedCity.distance = response.data.distance;
                        }
                    });
            },
            fetchPrevCurrDistanceTime: function (previousCityId, currentCityId, firstAddOnCityId = null, secondAddOnCityId = null) {
	            $.ajaxSetup({
		            headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            }
	            });
	            axios.get('/fetch-prev-curr-distance-time/' + previousCityId + '/' + currentCityId + '/' + firstAddOnCityId + '/' + secondAddOnCityId)
		            .then((response) => {
			            if (response.data === 'error') {
			            }
			            else {
                            if (response.data.prev2.time === '') {
	                            this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].firstaddon.prevDistance = response.data.prev1.distance;
	                            this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].firstaddon.prevTime = response.data.prev1.time;
	                            
	                            this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].firstaddon.currDistance = response.data.curr.distance;
	                            this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].firstaddon.currTime = response.data.curr.time;
                            }
                            else {
	                            this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].firstaddon.prevDistance = response.data.prev1.distance;
	                            this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].firstaddon.prevTime = response.data.prev1.time;
	
	                            this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].secondaddon.prevDistance = response.data.prev2.distance;
	                            this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].secondaddon.prevTime = response.data.prev2.time;
	                            
	                            this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].secondaddon.currDistance = response.data.curr.distance;
	                            this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].secondaddon.currTime = response.data.curr.time;
                            }
				            this.$root.$refs.createplan.showModal = true;
				            this.$root.$refs.createplan.showModal = false;
			            }
		            });
            },
			//fetchAddOnCities: function (currentCityId, previousCityId) {
            fetchFirstAddOnCities: function (previousCityId, currentCityId) {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				axios.get('/fetch-first-addon-city/' + previousCityId + '/' + currentCityId)
					.then((response) => {
						if (response.data === 'error') {
							/*swal({
								title: 'Select different place',
								type: 'warning',
								allowOutsideClick: false
							});*/
							//console.log(response.data);
							this.addOnCities = [];
						}
						else {
							this.addOnCities = response.data.add_on_cities;
							if (this.$root.$refs.createplan.routeDetails.cities.length > 1) {
								for (let c = 1; c < this.$root.$refs.createplan.routeDetails.cities.length; c++) {
									for (let d = 0; d < this.addOnCities.length; d++) {
										if (this.$root.$refs.createplan.routeDetails.cities[c].city.id === this.addOnCities[d].id) {
											this.addOnCities[d].prevDate = moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getDate() + ' ' + moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._locale._monthsShort[moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getMonth()];
											break;
										}
									}
								}
							}
							this.displayMap();
						}
					});
			},
            fetchSecondAddOnCities: function (previousCityId, currentCityId, firstAddonCityId) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                axios.get('/fetch-second-addon-city/' + previousCityId + '/' + currentCityId + '/' + firstAddonCityId)
                    .then((response) => {
                        if (response.data === 'error') {
                            this.secondAddOnCities = [];
                        }
                        else {
                            this.secondAddOnCities = response.data.add_on_cities;
	                        if (this.$root.$refs.createplan.routeDetails.cities.length > 1) {
		                        for (let c = 1; c < this.$root.$refs.createplan.routeDetails.cities.length; c++) {
			                        for (let d = 0; d < this.secondAddOnCities.length; d++) {
				                        if (this.$root.$refs.createplan.routeDetails.cities[c].city.id === this.secondAddOnCities[d].id) {
					                        this.secondAddOnCities[d].prevDate = moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getDate() + ' ' + moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._locale._monthsShort[moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getMonth()];
					                        break;
				                        }
			                        }
		                        }
	                        }
	                        this.displayMap();
                        }
                    });
            },
			setAddOnCity: function (index) {
		    	this.swapAddonIndex = index;
                if (this.selectedFirstAddOnCity == '') {
                    this.selectedFirstAddOnCity = this.addOnCities[index];
                    this.fetchSecondAddOnCities(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city.id, this.selectedCity.id, this.addOnCities[index].id);
                }
                else if (this.selectedSecondAddOnCity == '') {
                    this.selectedSecondAddOnCity = this.secondAddOnCities[index];
                }
                else {
                    this.addonAlert = true;
                }
                this.displayMap();
			},
            removeAddOnCity: function (cityId) {
                if (this.selectedFirstAddOnCity.id === cityId) {
                    this.selectedFirstAddOnCity = this.selectedSecondAddOnCity;
                    this.selectedSecondAddOnCity = '';
                }
                else if (this.selectedSecondAddOnCity.id === cityId) {
                    this.selectedSecondAddOnCity = '';
                }
                if (this.destinationIndex === 'none' && this.$root.$refs.createplan.addCityBetween === false) {
                    this.fetchSecondAddOnCities(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].city.id, this.selectedCity.id, this.selectedFirstAddOnCity.id);
                }
                else if (this.destinationIndex === 'none' && this.$root.$refs.createplan.addCityBetween === true) {
                    this.fetchSecondAddOnCities(this.$root.$refs.createplan.routeDetails.cities[this.prevCityIndex].city.id, this.selectedCity.id, this.selectedFirstAddOnCity.id);
                }
                else {
                    let index = this.$root.$refs.createplan.routeDetails.cities.findIndex(x => x.city.id === this.selectedCity.id);
                    this.fetchSecondAddOnCities(this.$root.$refs.createplan.routeDetails.cities[index - 1].city.id, this.selectedCity.id, this.selectedFirstAddOnCity.id);
                }
                this.dateErrorMsg = false;
	            this.displayMap();
            },
			recalculateAddonDistanceTime: function (prevAddOnId, allAddOns) {
				let arr = [];
				this.addOnCities.forEach(function (item, index) {
					arr.push(item.id);
				});
				axios.get('/recalculate-addon/' + prevAddOnId + '/' + arr)
					.then((response) => {
						if (response.data === 'error') {
							/*swal({
								title: 'Select different place',
								type: 'warning',
								allowOutsideClick: false
							});*/
						}
						else {
							let selectedAddOn = this.destination.add_on_cities;
							this.addOnCities = response.data.add_on_cities;
							//console.log(this.addOnCities);
							this.addOnCities.forEach(function (item, index) {
								var check = selectedAddOn.map(function (e) {
									return e.id
								}).indexOf(item.id);
								if (check === -1){
									item.selected = 0;
								}
								else {
									item.selected = 1;
								}
							});
						}
					});
			},
            recalculateDate: function (index) {
	            for (let i = index; i <= this.$root.$refs.createplan.routeDetails.cities.length - 1; i++) {
		            let totalDay = this.$root.$refs.createplan.routeDetails.cities[i].totalDay;
		            let totalNight = this.$root.$refs.createplan.routeDetails.cities[i].totalNight;
		            let date = moment(this.$root.$refs.createplan.routeDetails.cities[i - 1].endDate).add(totalNight, 'day');
		            
		            this.$root.$refs.createplan.routeDetails.cities[i].startDate = this.$root.$refs.createplan.routeDetails.cities[i - 1].endDate;
		            //this.$root.$refs.createplan.routeDetails.cities[i].endDate = moment(this.$root.$refs.createplan.routeDetails.cities[i - 1].endDate).add(totalNight, 'day').format('YYYY-MM-DD');
		            this.$root.$refs.createplan.routeDetails.cities[i].endDate = moment(this.$root.$refs.createplan.routeDetails.cities[i].startDate).add(totalNight, 'day').format('YYYY-MM-DD');
		            
		            let arrivingdate = this.$root.$refs.createplan.routeDetails.cities[i].startDate.toString();
		            this.$root.$refs.createplan.routeDetails.cities[i].arriving.date = new Date(arrivingdate).getDate() + ' ' + date._locale._monthsShort[new Date(arrivingdate).getMonth()] + ' ' + new Date(arrivingdate).getFullYear();
		            
		            if (this.$root.$refs.createplan.routeDetails.cities[i].lastDestination === false) {
                        let departingdate = this.$root.$refs.createplan.routeDetails.cities[i].endDate.toString();
			            this.$root.$refs.createplan.routeDetails.cities[i].departing.date = new Date(departingdate).getDate() + ' ' + date._locale._monthsShort[new Date(departingdate).getMonth()] + ' ' + new Date(departingdate).getFullYear();
		            } else {
			            let dropoffDate = this.$root.$refs.createplan.routeDetails.cities[i].endDate.toString();
			            //let endMoment = moment(this.$root.$refs.createplan.routeDetails.cities[i - 1].endDate).add(1, 'day');
			            //let endMomentString = endMoment.format('YYYY-MM-DD');
			            //let dropoffDate = endMoment._d.getDate() + ' ' + endMoment._locale._monthsShort[endMoment._d.getMonth()] + ' ' + endMoment._d.getFullYear();
			            //let end = endMomentString;
			            this.$root.$refs.createplan.routeDetails.cities[i].dropoff.date = new Date(dropoffDate).getDate() + ' ' + date._locale._monthsShort[new Date(dropoffDate).getMonth()] + ' ' + new Date(dropoffDate).getFullYear();;
			            //this.$root.$refs.createplan.routeDetails.cities[i].endDate = end;
			            this.$root.$refs.createplan.lastDestination = true;
		            }
	            }
            },
			saveDestination: function () {
				this.destination.city.id = this.allCities[this.selectedCity].id;
				this.destination.city.name = this.allCities[this.selectedCity].city_name;
				this.destination.city.latitude = this.allCities[this.selectedCity].latitude;
				this.destination.city.longitude = this.allCities[this.selectedCity].longitude;
				this.destination.city.longitude = this.allCities[this.selectedCity].longitude;
				this.destination.city.placeId = this.allCities[this.selectedCity].place_id;
				this.destination.end_date = ('0' + this.endDatePicked.getDate()).slice(-2) + "-" + ('0' + (this.endDatePicked.getMonth() + 1)).slice(-2) + "-" + this.endDatePicked.getFullYear();
				if ((this.destination.city.id !== '') && (this.destination.no_of_nights !== '') && (this.destination.end_date != '')) {
					if (this.destinationIndex === 'none') {
						this.$root.$refs.modifyroute.routeDetails.cities.push(this.destination);
						//this.$root.$refs.modifyroute.routeDetails.route_title += ' - ' + this.destination.city.name;
					}
					else {
						//let newRouteTitle = this.$root.$refs.modifyroute.routeDetails.route_title.replace(this.cityName, this.destination.city.name);
						this.$root.$refs.modifyroute.routeDetails.cities[this.destinationIndex] = this.destination;
					}
					this.$root.$refs.modifyroute.routeDetails.route_title = '';
					for (let i = 0; i < this.$root.$refs.modifyroute.routeDetails.cities.length; i++) {
						if (i === this.$root.$refs.modifyroute.routeDetails.cities.length - 1) {
							this.$root.$refs.modifyroute.routeDetails.route_title += this.$root.$refs.modifyroute.routeDetails.cities[i].city.name;
						}
						else {
							this.$root.$refs.modifyroute.routeDetails.route_title += this.$root.$refs.modifyroute.routeDetails.cities[i].city.name + ' - ';
						}
					}
					this.$root.$refs.modifyroute.showModal = false;
					this.$root.$refs.modifyroute.$refs.calendar.displayCalendar();
					this.$root.$refs.modifyroute.$refs.googleMap.displayMap();
					let uri = '/update-route/' + this.$root.$refs.modifyroute.routeDetails.id;
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					axios.post(uri, this.$root.$refs.modifyroute.routeDetails).then(function (response) {
						if (response.data == 'error') {
							swal({
								title: 'Select different place',
								type: 'error',
								allowOutsideClick: false
							});
						}
					});
				}
				else {
					swal({
						title: 'Please select destination and no of nights',
						type: 'warning',
						allowOutsideClick: false
					});
				}
			},
            
            /* Map functions start */
            
			displayMap: function() {
				
				let that = this;
				
				GoogleMapsLoader.load(function(google) {
					
					// Create a map and center it on Cuba.
					let map = new google.maps.Map(
						document.getElementById('side-nav-google-map'),
						{
							center: new google.maps.LatLng(21.5218, -77.7812),
							zoom: 7,
							mapTypeId: google.maps.MapTypeId.ROADMAP,
                            disableDefaultUI: true
						}
					);
					
					// Instantiate a directions service.
					// let directionsService = new google.maps.DirectionsService;
					
					// Create a renderer for directions and bind it to the map.
					// let directionsDisplay = new google.maps.DirectionsRenderer;
					
					// Instantiate an info window to hold step text.
					// let stepDisplay = new google.maps.InfoWindow;
					
					let geocoder = new google.maps.Geocoder;
					
					let infowindow = new google.maps.InfoWindow;
					
					//create empty LatLngBounds object
					let bounds = new google.maps.LatLngBounds();
					
                    if (typeof that.cities !== 'undefined' && that.cities.length > 0) {
	                    for (let i = 0; i < that.cities.length; i++) {
		                    let cityExists = false;
		                    let firstaddonExists = false;
		                    let secondaddonExists = false;
	                    	for (let c = 0; c < that.$root.$refs.createplan.routeDetails.cities.length; c++) {
			                    if (that.cities[i].id === that.$root.$refs.createplan.routeDetails.cities[c].city.id) {
				                    cityExists = true;
                                }
			                    else {
				                    if (that.cities[i].id === that.$root.$refs.createplan.routeDetails.cities[c].firstaddon.id) {
					                    firstaddonExists = true;
				                    }
				                    else {
					                    if (that.cities[i].id === that.$root.$refs.createplan.routeDetails.cities[c].secondaddon.id) {
						                    secondaddonExists = true;
					                    }
				                    }
                                }
                            }
		                    /*let cityIndex = that.routeDetails.cities.findIndex(function (x) {
			                    return x.city.id === that.cities[i].id;
		                    });
		                    let firstaddonIndex = -1;
		                    let secondaddonIndex = -1;
		                    if (cityIndex === -1) {
			                    firstaddonIndex = that.routeDetails.cities.findIndex(function (f) {
				                    return f.firstaddon.id === that.cities[i].id;
			                    });
			                    if (firstaddonIndex === -1) {
				                    secondaddonIndex = that.routeDetails.cities.findIndex(function (s) {
					                    return s.secondaddon.id === that.cities[i].id;
				                    });
			                    }
		                    }*/
		                    //if (cityIndex === -1 && firstaddonIndex === -1 && secondaddonIndex === -1 && ((typeof that.selectedCity === 'object' && that.cities[i].id !== that.selectedCity.id) || typeof that.selectedCity === 'string') && ((typeof that.selectedFirstAddOnCity === 'object' && that.cities[i].id !== that.selectedFirstAddOnCity.id) || typeof that.selectedFirstAddOnCity === 'string') && ((typeof that.selectedSecondAddOnCity === 'object' && that.cities[i].id !== that.selectedSecondAddOnCity.id) || typeof that.selectedSecondAddOnCity === 'string')) {
		                    if (cityExists === false && firstaddonExists === false && secondaddonExists === false && ((typeof that.selectedCity === 'object' && that.cities[i].id !== that.selectedCity.id) || typeof that.selectedCity === 'string') && ((typeof that.selectedFirstAddOnCity === 'object' && that.cities[i].id !== that.selectedFirstAddOnCity.id) || typeof that.selectedFirstAddOnCity === 'string') && ((typeof that.selectedSecondAddOnCity === 'object' && that.cities[i].id !== that.selectedSecondAddOnCity.id) || typeof that.selectedSecondAddOnCity === 'string')) {
			                    that.showAvailableCity(map, infowindow, i, that.cities[i], bounds);
		                    }
	                    }
                    }
					
					// if (typeof that.selectedFirstAddOnCity !== 'object' && that.secondAddOnCities.length === 0 && that.addOnCities.length !== 0) {
					if (typeof that.selectedFirstAddOnCity !== 'object' && typeof that.selectedSecondAddOnCity !== 'object' && that.addOnCities.length !== 0) {
						for (let i = 0; i < that.addOnCities.length; i++) {
							that.showAvailableAddon(geocoder, map, infowindow, i, that.addOnCities[i], bounds);
                        }
					}
					else if (typeof that.selectedFirstAddOnCity === 'object' && that.secondAddOnCities.length !== 0) {
						for (let i = 0; i < that.secondAddOnCities.length; i++) {
							that.showAvailableAddon(geocoder, map, infowindow, i, that.secondAddOnCities[i], bounds);
						}
                    }
					
					//directionsDisplay.setMap(map);
                    
     
					// let waypoints = [];
     
                    if (that.destinationIndex === 'none' && that.$root.$refs.createplan.addCityBetween === false) {
	                    if (typeof that.selectedCity === 'object' && that.routeDetails.cities.length === 0) {
		                    that.makeMarker(new google.maps.LatLng(that.selectedCity.latitude, that.selectedCity.longitude), that.getOrangeFillIcon(), map, bounds);
	                    }
	                    else if (that.routeDetails.cities.length >= 1) {
		                    if (typeof that.selectedCity === 'object') {
			                    if (typeof that.selectedFirstAddOnCity === 'object') {
				                    if (typeof that.selectedSecondAddOnCity === 'object') {
					                    that.showRoute(map, bounds, that.routeDetails.cities, that.selectedCity, that.selectedFirstAddOnCity, that.selectedSecondAddOnCity);
				                    }
				                    else {
					                    that.showRoute(map, bounds, that.routeDetails.cities, that.selectedCity, that.selectedFirstAddOnCity);
				                    }
			                    }
			                    else {
				                    that.showRoute(map, bounds, that.routeDetails.cities, that.selectedCity);
			                    }
		                    }
		                    else {
			                    if (that.routeDetails.cities.length === 1) {
				                    that.makeMarker(new google.maps.LatLng(that.routeDetails.cities[0].city.latitude, that.routeDetails.cities[0].city.longitude), that.getGreenFillIcon(), map, bounds);
			                    }
			                    else {
				                    that.showRoute(map, bounds, that.routeDetails.cities);
			                    }
		                    }
		                    that.makeMarker(new google.maps.LatLng(that.routeDetails.cities[that.routeDetails.cities.length - 1].city.latitude, that.routeDetails.cities[that.routeDetails.cities.length - 1].city.longitude), that.getGreenFillIcon(), map, bounds);
	                    }
                    }
					else if (that.destinationIndex === 'none' && that.$root.$refs.createplan.addCityBetween === true) {
	                    let directionsService = new google.maps.DirectionsService;
	                    let directionsRequest = '';
	                    let waypoints = [];
	                    let selectedAddonWaypoints = [];
	                    let vm = that;
	                    if (that.prevCityIndex === 0) {
		                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[0].city.latitude, that.$root.$refs.createplan.routeDetails.cities[0].city.longitude), that.getGreenFillIcon(), map, bounds);
	                    }
	                    else {
		                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[0].city.latitude, that.$root.$refs.createplan.routeDetails.cities[0].city.longitude), that.getBlackFillIcon(), map, bounds);
	                    }
	                    for (let i = 0; i < that.$root.$refs.createplan.routeDetails.cities.length - 1; i++) {
	                    	waypoints = [];
		                    /*if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon !== '') {
			                    waypoints.push({
				                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.longitude),
				                    stopover: true
			                    })
		                    }
		                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon !== '') {
			                    waypoints.push({
				                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.longitude),
				                    stopover: true
			                    })
		                    }
		                    if (waypoints.length !== 0) {
			                    waypoints.forEach(function (item) {
				                    vm.makeMarker(item.location, that.getBlackIcon(), map, bounds);
			                    });
		                    }*/
		
		                    if (typeof that.selectedCity === 'object' && that.selectedCity !== null && i === vm.prevCityIndex) {
			
			                    if (i === vm.prevCityIndex) {
				                    vm.makeMarker(new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude), vm.getGreenFillIcon(), map, bounds);
				                    vm.makeMarker(new google.maps.LatLng(that.selectedCity.latitude, that.selectedCity.longitude), vm.getOrangeFillIcon(), map, bounds);
				                    vm.makeMarker(new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude), vm.getBlackFillIcon(), map, bounds);
			                    }
			
			                    if (typeof vm.selectedFirstAddOnCity === 'object' && vm.selectedFirstAddOnCity !== null) {
				                    selectedAddonWaypoints.push({
					                    location: new google.maps.LatLng(vm.selectedFirstAddOnCity.latitude, vm.selectedFirstAddOnCity.longitude),
					                    stopover: true
				                    });
			                    }
			
			                    if (typeof vm.selectedSecondAddOnCity === 'object' && vm.selectedSecondAddOnCity !== null) {
				                    selectedAddonWaypoints.push({
					                    location: new google.maps.LatLng(vm.selectedSecondAddOnCity.latitude, vm.selectedSecondAddOnCity.longitude),
					                    stopover: true
				                    });
			                    }
			
			                    if (selectedAddonWaypoints.length !== 0) {
				                    selectedAddonWaypoints.forEach(function (items) {
					                    vm.makeMarker(items.location, vm.getGreenIcon(), map, bounds);
				                    });
			                    }
			                    directionsRequest = {
				                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
				                    destination: new google.maps.LatLng(that.selectedCity.latitude, that.selectedCity.longitude),
				                    waypoints: selectedAddonWaypoints,
				                    optimizeWaypoints: true,
				                    travelMode: 'DRIVING'
			                    };
			                    directionsService.route(directionsRequest, function(response, status) {
				                    if (status === 'OK') {
					                    new google.maps.DirectionsRenderer({
						                    map: map,
						                    directions: response,
						                    suppressMarkers: true,
						                    polylineOptions: {
							                    strokeColor: "black"
						                    }
					                    });
				                    }
			                    });
			                    directionsRequest = {
				                    origin: new google.maps.LatLng(that.selectedCity.latitude, that.selectedCity.longitude),
				                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude),
				                    //waypoints: selectedAddonWaypoints,
				                    optimizeWaypoints: true,
				                    travelMode: 'DRIVING'
			                    };
			                    directionsService.route(directionsRequest, function(response, status) {
				                    if (status === 'OK') {
					                    new google.maps.DirectionsRenderer({
						                    map: map,
						                    directions: response,
						                    suppressMarkers: true,
						                    polylineOptions: {
							                    strokeColor: "black"
						                    }
					                    });
				                    }
			                    });
		                    }
		                    else {
			                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon !== '') {
				                    waypoints.push({
					                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.longitude),
					                    stopover: true
				                    })
			                    }
			                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon !== '') {
				                    waypoints.push({
					                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.longitude),
					                    stopover: true
				                    })
			                    }
			                    if (waypoints.length !== 0) {
				                    waypoints.forEach(function (item) {
					                    vm.makeMarker(item.location, that.getBlackIcon(), map, bounds);
				                    });
			                    }
			                    if (i + 1 === vm.prevCityIndex + 1) {
				                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, that.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude), that.getOrangeFillIcon(), map, bounds);
			                    }
			                    else {
				                    if (i + 1 === vm.prevCityIndex) {
					                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, that.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude), that.getGreenFillIcon(), map, bounds);
				                    }
				                    else {
					                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, that.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude), that.getBlackFillIcon(), map, bounds);
				                    }
			                    }
			                    directionsRequest = {
				                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
				                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude),
				                    waypoints: waypoints,
				                    optimizeWaypoints: true,
				                    travelMode: 'DRIVING'
			                    };
			                    directionsService.route(directionsRequest, function(response, status) {
				                    if (status === 'OK') {
					                    new google.maps.DirectionsRenderer({
						                    map: map,
						                    directions: response,
						                    suppressMarkers: true,
						                    polylineOptions: {
							                    strokeColor: "black"
						                    }
					                    });
				                    }
			                    });
                            }
	                    }
                    }
					else if (that.destinationIndex !== 'none') {
	                    let directionsService = new google.maps.DirectionsService;
	                    let directionsRequest = '';
	                    let waypoints = [];
	                    let selectedAddonWaypoints = [];
	                    let vm = that;
	                    if (that.$root.$refs.createplan.routeDetails.cities.length === 1) {
		                    that.makeMarker(new google.maps.LatLng(that.selectedCity.latitude, that.selectedCity.longitude), that.getOrangeFillIcon(), map, bounds);
                        }
	                    else {
	                    	if (that.destinationIndex === 0) {
	                    		if (that.selectedCity.id === that.temp1.city.id) {
				                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[0].city.latitude, that.$root.$refs.createplan.routeDetails.cities[0].city.longitude), that.getOrangeFillIcon(), map, bounds);
                                }
			                    else {
				                    that.makeMarker(new google.maps.LatLng(that.selectedCity.latitude, that.selectedCity.longitude), that.getOrangeFillIcon(), map, bounds);
                                }
			                    for (let i = 0; i < that.$root.$refs.createplan.routeDetails.cities.length - 1; i++) {
				                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, that.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude), that.getBlackFillIcon(), map, bounds);
			                    	waypoints = [];
				                    if (i === that.destinationIndex) {
					                    if (that.selectedCity.id === that.temp1.city.id) {
						                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon !== '') {
							                    waypoints.push({
								                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.longitude),
								                    stopover: true
							                    })
						                    }
						                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon !== '') {
							                    waypoints.push({
								                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.longitude),
								                    stopover: true
							                    })
						                    }
						                    if (waypoints.length !== 0) {
							                    waypoints.forEach(function (item) {
								                    vm.makeMarker(item.location, vm.getBlackIcon(), map, bounds);
							                    });
						                    }
						                    directionsRequest = {
							                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
							                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude),
							                    waypoints: waypoints,
							                    optimizeWaypoints: true,
							                    travelMode: 'DRIVING'
						                    };
					                    }
					                    else if (that.selectedCity.id !== that.temp1.city.id) {
						                    directionsRequest = {
							                    origin: new google.maps.LatLng(vm.selectedCity.latitude, vm.selectedCity.longitude),
							                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude),
							                    waypoints: waypoints,
							                    optimizeWaypoints: true,
							                    travelMode: 'DRIVING'
						                    };
                                        }
                                    }
				                    else {
					                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon !== '') {
						                    waypoints.push({
							                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.longitude),
							                    stopover: true
						                    })
					                    }
					                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon !== '') {
						                    waypoints.push({
							                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.longitude),
							                    stopover: true
						                    })
					                    }
					                    if (waypoints.length !== 0) {
						                    waypoints.forEach(function (item) {
							                    vm.makeMarker(item.location, vm.getBlackIcon(), map, bounds);
						                    });
					                    }
					                    directionsRequest = {
						                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
						                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude),
						                    waypoints: waypoints,
						                    optimizeWaypoints: true,
						                    travelMode: 'DRIVING'
					                    };
                                    }
				                    directionsService.route(directionsRequest, function(response, status) {
					                    if (status === 'OK') {
						                    new google.maps.DirectionsRenderer({
							                    map: map,
							                    directions: response,
							                    suppressMarkers: true,
							                    polylineOptions: {
								                    strokeColor: "black"
							                    }
						                    });
					                    }
				                    });
                                }
                            }
	                    	else if (that.destinationIndex === 1) {
			                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[0].city.latitude, that.$root.$refs.createplan.routeDetails.cities[0].city.longitude), that.getGreenFillIcon(), map, bounds);
			                    for (let i = 0; i < that.$root.$refs.createplan.routeDetails.cities.length - 1; i++) {
				                    waypoints = [];
				                    selectedAddonWaypoints = [];
			                    	if (i === vm.destinationIndex - 1) {
					                    if (that.selectedCity.id === that.temp1.city.id) {
						                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, that.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude), that.getOrangeFillIcon(), map, bounds);
						                    if (typeof vm.selectedFirstAddOnCity === 'object' && vm.selectedFirstAddOnCity !== null) {
							                    waypoints.push({
								                    location: new google.maps.LatLng(vm.selectedFirstAddOnCity.latitude, vm.selectedFirstAddOnCity.longitude),
								                    stopover: true
							                    });
						                    }
						
						                    if (typeof vm.selectedSecondAddOnCity === 'object' && vm.selectedSecondAddOnCity !== null) {
							                    waypoints.push({
								                    location: new google.maps.LatLng(vm.selectedSecondAddOnCity.latitude, vm.selectedSecondAddOnCity.longitude),
								                    stopover: true
							                    });
						                    }
						
						                    if (waypoints.length !== 0) {
							                    waypoints.forEach(function (items) {
								                    vm.makeMarker(items.location, vm.getGreenIcon(), map, bounds);
							                    });
						                    }
						                    directionsRequest = {
							                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
							                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude),
							                    waypoints: waypoints,
							                    optimizeWaypoints: true,
							                    travelMode: 'DRIVING'
						                    };
					                    }
					                    else if (that.selectedCity.id !== that.temp1.city.id) {
						                    that.makeMarker(new google.maps.LatLng(that.selectedCity.latitude, that.selectedCity.longitude), that.getOrangeFillIcon(), map, bounds);
						                    if (typeof vm.selectedFirstAddOnCity === 'object' && vm.selectedFirstAddOnCity !== null) {
							                    selectedAddonWaypoints.push({
								                    location: new google.maps.LatLng(vm.selectedFirstAddOnCity.latitude, vm.selectedFirstAddOnCity.longitude),
								                    stopover: true
							                    });
						                    }
						
						                    if (typeof vm.selectedSecondAddOnCity === 'object' && vm.selectedSecondAddOnCity !== null) {
							                    selectedAddonWaypoints.push({
								                    location: new google.maps.LatLng(vm.selectedSecondAddOnCity.latitude, vm.selectedSecondAddOnCity.longitude),
								                    stopover: true
							                    });
						                    }
						
						                    if (selectedAddonWaypoints.length !== 0) {
							                    selectedAddonWaypoints.forEach(function (items) {
								                    vm.makeMarker(items.location, vm.getGreenIcon(), map, bounds);
							                    });
						                    }
						                    directionsRequest = {
							                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
							                    destination: new google.maps.LatLng(vm.selectedCity.latitude, vm.selectedCity.longitude),
							                    waypoints: selectedAddonWaypoints,
							                    optimizeWaypoints: true,
							                    travelMode: 'DRIVING'
						                    };
                                        }
			                    	}
				                    else {
					                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, that.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude), that.getBlackFillIcon(), map, bounds);
				                    	if (i !== vm.destinationIndex) {
						                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon !== '') {
							                    waypoints.push({
								                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.longitude),
								                    stopover: true
							                    })
						                    }
						                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon !== '') {
							                    waypoints.push({
								                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.longitude),
								                    stopover: true
							                    })
						                    }
						                    if (waypoints.length !== 0) {
							                    waypoints.forEach(function (item) {
								                    vm.makeMarker(item.location, vm.getBlackIcon(), map, bounds);
							                    });
						                    }
						                    directionsRequest = {
							                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
							                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude),
							                    waypoints: waypoints,
							                    optimizeWaypoints: true,
							                    travelMode: 'DRIVING'
						                    };
                                        }
				                    	else {
						                    if ((that.selectedCity.id === that.temp1.city.id && i === vm.destinationIndex) || i > vm.destinationIndex) {
							                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon !== '') {
								                    waypoints.push({
									                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].firstaddon.longitude),
									                    stopover: true
								                    })
							                    }
							                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon !== '') {
								                    waypoints.push({
									                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].secondaddon.longitude),
									                    stopover: true
								                    })
							                    }
							                    if (waypoints.length !== 0) {
								                    waypoints.forEach(function (item) {
									                    vm.makeMarker(item.location, vm.getBlackIcon(), map, bounds);
								                    });
							                    }
                                            }
						                    if (i === vm.destinationIndex) {
							                    directionsRequest = {
								                    origin: new google.maps.LatLng(vm.selectedCity.latitude, vm.selectedCity.longitude),
								                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude),
								                    waypoints: waypoints,
								                    optimizeWaypoints: true,
								                    travelMode: 'DRIVING'
							                    };
                                            }
						                    else {
							                    directionsRequest = {
								                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
								                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i + 1].city.longitude),
								                    waypoints: waypoints,
								                    optimizeWaypoints: true,
								                    travelMode: 'DRIVING'
							                    };
                                            }
                                        }
                                    }
				                    directionsService.route(directionsRequest, function(response, status) {
					                    if (status === 'OK') {
						                    new google.maps.DirectionsRenderer({
							                    map: map,
							                    directions: response,
							                    suppressMarkers: true,
							                    polylineOptions: {
								                    strokeColor: "black"
							                    }
						                    });
					                    }
				                    });
			                    }
                            }
	                    	else {
			                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[0].city.latitude, that.$root.$refs.createplan.routeDetails.cities[0].city.longitude), that.getBlackFillIcon(), map, bounds);
			                    if (that.destinationIndex === 2) {
				                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[1].city.latitude, that.$root.$refs.createplan.routeDetails.cities[1].city.longitude), that.getGreenFillIcon(), map, bounds);
                                }
			                    else {
				                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[1].city.latitude, that.$root.$refs.createplan.routeDetails.cities[1].city.longitude), that.getBlackFillIcon(), map, bounds);
                                }
			                    if (typeof that.$root.$refs.createplan.routeDetails.cities[1].firstaddon === 'object' && that.$root.$refs.createplan.routeDetails.cities[1].firstaddon !== '') {
				                    waypoints.push({
					                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[1].firstaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[1].firstaddon.longitude),
					                    stopover: true
				                    })
			                    }
			                    if (typeof that.$root.$refs.createplan.routeDetails.cities[1].secondaddon === 'object' && that.$root.$refs.createplan.routeDetails.cities[1].secondaddon !== '') {
				                    waypoints.push({
					                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[1].secondaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[1].secondaddon.longitude),
					                    stopover: true
				                    })
			                    }
			                    if (waypoints.length !== 0) {
				                    waypoints.forEach(function (item) {
					                    vm.makeMarker(item.location, vm.getBlackIcon(), map, bounds);
				                    });
			                    }
			                    directionsRequest = {
				                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[0].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[0].city.longitude),
				                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[1].city.longitude),
				                    waypoints: waypoints,
				                    optimizeWaypoints: true,
				                    travelMode: 'DRIVING'
			                    };
			                    directionsService.route(directionsRequest, function(response, status) {
				                    if (status === 'OK') {
					                    new google.maps.DirectionsRenderer({
						                    map: map,
						                    directions: response,
						                    suppressMarkers: true,
						                    polylineOptions: {
							                    strokeColor: "black"
						                    }
					                    });
				                    }
			                    });
			                    for (let i = 2; i <= that.$root.$refs.createplan.routeDetails.cities.length - 1; i++) {
				                    waypoints = [];
				                    selectedAddonWaypoints = [];
				                    if (i === vm.destinationIndex) {
					                    that.makeMarker(new google.maps.LatLng(that.selectedCity.latitude, that.selectedCity.longitude), that.getOrangeFillIcon(), map, bounds);
                                    }
				                    else if (i > vm.destinationIndex) {
					                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[i].city.latitude, that.$root.$refs.createplan.routeDetails.cities[i].city.longitude), that.getBlackFillIcon(), map, bounds);
                                    }
				                    else if (i < vm.destinationIndex) {
				                    	if (i === vm.destinationIndex - 1) {
						                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[i].city.latitude, that.$root.$refs.createplan.routeDetails.cities[i].city.longitude), that.getGreenFillIcon(), map, bounds);
                                        }
				                    	else {
						                    that.makeMarker(new google.maps.LatLng(that.$root.$refs.createplan.routeDetails.cities[i].city.latitude, that.$root.$refs.createplan.routeDetails.cities[i].city.longitude), that.getBlackFillIcon(), map, bounds);
                                        }
                                    }
				                    if (i === vm.destinationIndex) {
					                    if (that.selectedCity.id === that.temp1.city.id) {
						                    if (typeof vm.selectedFirstAddOnCity === 'object' && vm.selectedFirstAddOnCity !== null) {
							                    waypoints.push({
								                    location: new google.maps.LatLng(vm.selectedFirstAddOnCity.latitude, vm.selectedFirstAddOnCity.longitude),
								                    stopover: true
							                    });
						                    }
						
						                    if (typeof vm.selectedSecondAddOnCity === 'object' && vm.selectedSecondAddOnCity !== null) {
							                    waypoints.push({
								                    location: new google.maps.LatLng(vm.selectedSecondAddOnCity.latitude, vm.selectedSecondAddOnCity.longitude),
								                    stopover: true
							                    });
						                    }
						
						                    if (waypoints.length !== 0) {
							                    waypoints.forEach(function (items) {
								                    vm.makeMarker(items.location, vm.getGreenIcon(), map, bounds);
							                    });
						                    }
						                    directionsRequest = {
							                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i - 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i - 1].city.longitude),
							                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
							                    waypoints: waypoints,
							                    optimizeWaypoints: true,
							                    travelMode: 'DRIVING'
						                    };
                                        }
					                    else {
						                    if (typeof vm.selectedFirstAddOnCity === 'object' && vm.selectedFirstAddOnCity !== null) {
							                    selectedAddonWaypoints.push({
								                    location: new google.maps.LatLng(vm.selectedFirstAddOnCity.latitude, vm.selectedFirstAddOnCity.longitude),
								                    stopover: true
							                    });
						                    }
						
						                    if (typeof vm.selectedSecondAddOnCity === 'object' && vm.selectedSecondAddOnCity !== null) {
							                    selectedAddonWaypoints.push({
								                    location: new google.maps.LatLng(vm.selectedSecondAddOnCity.latitude, vm.selectedSecondAddOnCity.longitude),
								                    stopover: true
							                    });
						                    }
						
						                    if (selectedAddonWaypoints.length !== 0) {
							                    selectedAddonWaypoints.forEach(function (items) {
								                    vm.makeMarker(items.location, vm.getGreenIcon(), map, bounds);
							                    });
						                    }
						
						                    directionsRequest = {
							                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i - 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i - 1].city.longitude),
							                    destination: new google.maps.LatLng(vm.selectedCity.latitude, vm.selectedCity.longitude),
							                    waypoints: selectedAddonWaypoints,
							                    optimizeWaypoints: true,
							                    travelMode: 'DRIVING'
						                    };
                                        }
                                    }
				                    else {
				                    	if (i === vm.destinationIndex + 1) {
						                    if (that.selectedCity.id === that.temp1.city.id) {
							                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i].firstaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i].firstaddon !== '') {
								                    waypoints.push({
									                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].firstaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].firstaddon.longitude),
									                    stopover: true
								                    })
							                    }
							                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i].secondaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i].secondaddon !== '') {
								                    waypoints.push({
									                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].secondaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].secondaddon.longitude),
									                    stopover: true
								                    })
							                    }
							                    if (waypoints.length !== 0) {
								                    waypoints.forEach(function (item) {
									                    vm.makeMarker(item.location, vm.getBlackIcon(), map, bounds);
								                    });
							                    }
							                    directionsRequest = {
								                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i - 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i - 1].city.longitude),
								                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
								                    waypoints: waypoints,
								                    optimizeWaypoints: true,
								                    travelMode: 'DRIVING'
							                    };
						                    }
						                    else {
							                    directionsRequest = {
								                    origin: new google.maps.LatLng(vm.selectedCity.latitude, vm.selectedCity.longitude),
								                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
								                    waypoints: waypoints,
								                    optimizeWaypoints: true,
								                    travelMode: 'DRIVING'
							                    };
                                            }
                                        }
				                    	else {
						                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i].firstaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i].firstaddon !== '') {
							                    waypoints.push({
								                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].firstaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].firstaddon.longitude),
								                    stopover: true
							                    })
						                    }
						                    if (typeof vm.$root.$refs.createplan.routeDetails.cities[i].secondaddon === 'object' && vm.$root.$refs.createplan.routeDetails.cities[i].secondaddon !== '') {
							                    waypoints.push({
								                    location: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].secondaddon.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].secondaddon.longitude),
								                    stopover: true
							                    })
						                    }
						                    if (waypoints.length !== 0) {
							                    waypoints.forEach(function (item) {
								                    vm.makeMarker(item.location, vm.getBlackIcon(), map, bounds);
							                    });
						                    }
						                    directionsRequest = {
							                    origin: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i - 1].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i - 1].city.longitude),
							                    destination: new google.maps.LatLng(vm.$root.$refs.createplan.routeDetails.cities[i].city.latitude, vm.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
							                    waypoints: waypoints,
							                    optimizeWaypoints: true,
							                    travelMode: 'DRIVING'
						                    };
                                        }
                                    }
				                    directionsService.route(directionsRequest, function(response, status) {
					                    if (status === 'OK') {
						                    new google.maps.DirectionsRenderer({
							                    map: map,
							                    directions: response,
							                    suppressMarkers: true,
							                    polylineOptions: {
								                    strokeColor: "black"
							                    }
						                    });
					                    }
				                    });
			                    }
                            }
                        }
                    }
                    
					//now fit the map to the newly inclusive bounds
					map.fitBounds(bounds);
				});
			},
            showAvailableCity: function (map, infowindow, index, cityObject, bounds) {
				
	            var marker = this.makeMarker(new google.maps.LatLng(cityObject.latitude, cityObject.longitude), this.getBlackCircle(), map, bounds);
             
	            var contentString = '<div style="min-width: 170px; width: 170px; max-width: 170px;">' +
		            '<img src="' + window.location.origin + '/admin/assets/images/cities/' + cityObject.image + '" class="marker-city-image">' +
                    '<div class="uppercase font-lato text-center marker-city-name">' +
		            cityObject.city_name.substring(0, 20) + '...' +
		            '</div>' +
		            '<div class="text-center marker-city-description font-400" style="bottom: 40%; !important;">' +
		            'Beautiful landscape in the middle of Cuba' +
		            '</div>' +
		            '<button class="sleep-here" onclick="iwSleepHere(' + index + ', ' + cityObject.id + ', \'' + cityObject.city_name + '\')">sleep here</button>' +
		            '</div>';
              
	            marker.addListener('mouseover', function () {
	            	infowindow.setContent(contentString);
		            infowindow.setOptions({
			            disableAutoPan: true
		            });
		            infowindow.open(map, marker);
		            // marker.setIcon(window.location.origin + '/assets/images/icons/location-orange-fill-icon.svg');
		            // marker.setIcon(window.location.origin + '/assets/images/icons/suggested-city-marker-14.png');
	            });
	            
	            marker.addListener('mouseout', function () {
	            	infowindow.close();
		            // marker.setIcon(window.location.origin + '/assets/images/icons/suggested-city-marker.png');
	            });
	            
            },
			showAvailableAddon: function (geocoder, map, infowindow, index, cityObject, bounds) {
				
				//let imageSrc = window.location.origin + '/admin/assets/images/cities/' + cityObject.image;
				
				let marker = this.makeMarker(new google.maps.LatLng(cityObject.latitude, cityObject.longitude), this.getGreenCircle(), map, bounds);
				
				let contentString = '<div style="min-width: 170px; width: 170px; max-width: 170px;">' +
					'</div>' +
                    '<img src="' + window.location.origin + '/admin/assets/images/cities/' + cityObject.image + '" class="marker-city-image">' +
					'<div class="uppercase font-lato text-center marker-city-name font-white">' +
					cityObject.city_name.substring(0, 20) + '...' +
					'</div>' +
					'<div class="text-center marker-city-description font-400" style="bottom: 40%; !important;">' +
					'Beautiful landscape in the middle of Cuba' +
					'</div>' +
					'<button class="sleep-here" style="margin: 0; max-width: max-content; left: 3%;" onclick="iwSleepHere(' + index + ', ' + cityObject.id + ', \'' + cityObject.city_name + '\')">sleep here</button>' +
					'<button class="just-a-look" style="max-width: max-content; right: 3%;" onclick="iwSetAddOnCity(' + index + ')">JUST A LOOK</button>' +
					'</div>';
				
				marker.addListener('mouseover', function () {
					infowindow.setContent(contentString);
					infowindow.setOptions({
						disableAutoPan: true
					});
					infowindow.open(map, marker);
					// marker.setIcon(window.location.origin + '/assets/images/icons/green-14-circle.png');
				});
				
				marker.addListener('mouseout', function () {
					infowindow.close();
					// marker.setIcon(window.location.origin + '/assets/images/icons/green-circle.png');
				});
				
			},
            showRoute: function (map, bounds, routeDetails, selectedCity = null, selectedFirstAddonCity = null, selectedSecondAddonCity = null) {
	            let directionsService = new google.maps.DirectionsService;
	            let directionsRequest = '';
	            let waypoints = [];
	            let selectedAddonWaypoints = [];
	            if (routeDetails.length === 1) {
		            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[0].city.latitude, this.$root.$refs.createplan.routeDetails.cities[0].city.longitude), this.getGreenFillIcon(), map, bounds);
	            }
	            else {
		            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[0].city.latitude, this.$root.$refs.createplan.routeDetails.cities[0].city.longitude), this.getBlackFillIcon(), map, bounds);
                }
	            for (let i = 0; i < routeDetails.length - 1; i++) {
		            waypoints = [];
		            //this.makeMarker(new google.maps.LatLng(routeDetails[i].city.latitude, routeDetails[i].city.longitude), this.getBlackFillIcon(), map, bounds);
		            if (i + 1 === routeDetails.length - 1) {
			            this.makeMarker(new google.maps.LatLng(routeDetails[i + 1].city.latitude, routeDetails[i + 1].city.longitude), this.getGreenFillIcon(), map, bounds);
                    }
		            else {
			            this.makeMarker(new google.maps.LatLng(routeDetails[i + 1].city.latitude, routeDetails[i + 1].city.longitude), this.getBlackFillIcon(), map, bounds);
                    }
		            let that = this;
		            if (typeof routeDetails[i + 1].firstaddon === 'object' && routeDetails[i + 1].firstaddon !== '') {
			            waypoints.push({
				            location: new google.maps.LatLng(routeDetails[i + 1].firstaddon.latitude, routeDetails[i + 1].firstaddon.longitude),
				            stopover: true
			            })
                    }
		            if (typeof routeDetails[i + 1].secondaddon === 'object' && routeDetails[i + 1].secondaddon !== '') {
			            waypoints.push({
				            location: new google.maps.LatLng(routeDetails[i + 1].secondaddon.latitude, routeDetails[i + 1].secondaddon.longitude),
				            stopover: true
			            })
		            }
		            if (waypoints.length !== 0) {
			            waypoints.forEach(function (item) {
				            that.makeMarker(item.location, that.getBlackIcon(), map, bounds);
			            });
		            }
		            directionsRequest = {
			            origin: new google.maps.LatLng(routeDetails[i].city.latitude, routeDetails[i].city.longitude),
			            destination: new google.maps.LatLng(routeDetails[i + 1].city.latitude, routeDetails[i + 1].city.longitude),
			            waypoints: waypoints,
			            optimizeWaypoints: true,
			            travelMode: 'DRIVING'
		            };
		            directionsService.route(directionsRequest, function(response, status) {
			            if (status === 'OK') {
				            new google.maps.DirectionsRenderer({
					            map: map,
					            directions: response,
					            suppressMarkers: true,
					            polylineOptions: {
						            strokeColor: "black"
					            }
				            });
			            }
			            else {
				            window.alert('Directions request failed due to ' + status);
			            }
		            });
                }
	            if (typeof selectedCity === 'object' && selectedCity !== null) {
		
		            let that = this;
	            	
	            	if (typeof selectedFirstAddonCity === 'object' && selectedFirstAddonCity !== null) {
			            selectedAddonWaypoints.push({
				            location: new google.maps.LatLng(selectedFirstAddonCity.latitude, selectedFirstAddonCity.longitude),
				            stopover: true
			            });
                    }
		
		            if (typeof selectedSecondAddonCity === 'object' && selectedSecondAddonCity !== null) {
			            selectedAddonWaypoints.push({
				            location: new google.maps.LatLng(selectedSecondAddonCity.latitude, selectedSecondAddonCity.longitude),
				            stopover: true
			            });
		            }
              
		            if (selectedAddonWaypoints.length !== 0) {
			            selectedAddonWaypoints.forEach(function (items) {
				            that.makeMarker(items.location, that.getGreenIcon(), map, bounds);
			            });
		            }
		            
		            directionsRequest = {
			            origin: new google.maps.LatLng(routeDetails[routeDetails.length - 1].city.latitude, routeDetails[routeDetails.length - 1].city.longitude),
			            destination: new google.maps.LatLng(selectedCity.latitude, selectedCity.longitude),
			            waypoints: selectedAddonWaypoints,
			            optimizeWaypoints: true,
			            travelMode: 'DRIVING'
		            };
		            directionsService.route(directionsRequest, function(response, status) {
			            if (status === 'OK') {
				            new google.maps.DirectionsRenderer({
					            map: map,
					            directions: response,
					            suppressMarkers: true,
					            polylineOptions: {
						            strokeColor: "black"
					            }
				            });
				            let legs = response.routes[0].legs[0];
				            //that.makeMarker(legs.start_location, that.getGreenFillIcon(), map, bounds);
				            //that.makeMarker(legs.end_location, that.getOrangeFillIcon(), map, bounds);
				            that.makeMarker(new google.maps.LatLng(selectedCity.latitude, selectedCity.longitude), that.getOrangeFillIcon(), map, bounds);
			            }
			            else {
				            window.alert('Directions request failed due to ' + status);
			            }
		            });
	            }
            },
			showAddons: function (geocoder, map, infowindow, icon, addons) {
				for (let i = 0; i < addons.length; i++) {
					/*let suggestedCityId = this.suggestedDestination[i].id;
					let suggestedCityIndex = this.routeDetails.cities.findIndex(function (x) {
						return x.city.id === suggestedCityId;
					});*/
					//if (suggestedCityIndex === -1 && this.suggestedDestination[i].suggested_destination === 1 && ((typeof this.selectedCity === 'object' && this.suggestedDestination[i].id !== this.selectedCity.id) || typeof this.selectedCity === 'string') && ((typeof this.selectedFirstAddOnCity === 'object' && this.suggestedDestination[i].id !== this.selectedFirstAddOnCity.id) || typeof this.selectedFirstAddOnCity === 'string') && ((typeof this.selectedSecondAddOnCity === 'object' && this.suggestedDestination[i].id !== this.selectedSecondAddOnCity.id) || typeof this.selectedSecondAddOnCity === 'string')) {
						let pId = this.addOnCities[i].place_id;
						let key = i;
						let addonCityId = this.addOnCities[i].id;
						let addonCityName = this.addOnCities[i].city_name;
					/*let marker = new google.maps.Marker({
						map: map,
						position: results[0].geometry.location,
						animation: google.maps.Animation.DROP,
						icon: icon
					});*/
					let marker = this.makeMarker(new google.maps.LatLng(addons.latitude, addons.longitude), this.getGreenCircle(), map, bounds);
					let contentString = '<div style="min-width: 165px; width: 165px; max-width: 165px;">' +
						'<div class="serial-no font-lato text-center font-white" style="font-weight: bold">' +
						++i +
						'</div>' +
						'<div class="uppercase font-lato text-center marker-city-name">' +
						addonCityName.substring(0, 20) + '...' +
						'</div>' +
						'<div class="text-center marker-city-description" style="bottom: 40%; !important;">' +
						'Beautiful landscape in the middle of Cuba' +
						'</div>' +
						'<button class="sleep-here" style="margin: 0; max-width: max-content;" onclick="iwSleepHere(' + key + ', ' + addonCityId + ', \'' + addonCityName + '\')">sleep here</button>' +
						'<button class="just-a-look" style="right: 0; max-width: max-content;" onclick="iwSetAddOnCity(' + key + ')">JUST A LOOK</button>' +
						'</div>';
					marker.addListener('mouseover', function () {
						infowindow.setContent(contentString);
						infowindow.open(map, marker);
						//marker.setIcon(window.location.origin + '/assets/images/icons/location-orange-fill-icon.svg');
					});
					//}
				}
			},
			makeMarker: function (position, icon, map, bounds) {
				let marker = new google.maps.Marker({
					position: position,
					map: map,
					icon: icon,
					//animation: google.maps.Animation.DROP
				});
				bounds.extend(marker.position);
				return marker;
			},
            getGreenFillIcon: function () {
                return {
	                url: window.location.origin + '/assets/images/icons/location-green-fill-icon.svg',
	                origin: new google.maps.Point(0, 0)
                };
            },
			getGreenIcon: function () {
				return {
					url: window.location.origin + '/assets/images/icons/location-green-icon.svg',
					origin: new google.maps.Point(0, 0)
				};
			},
			getOrangeFillIcon: function () {
				return {
					url: window.location.origin + '/assets/images/icons/location-orange-fill-icon.svg',
					origin: new google.maps.Point(0, 0)
				};
			},
			getBlackFillIcon: function () {
				return {
					url: window.location.origin + '/assets/images/icons/location-black-fill-icon.svg',
					origin: new google.maps.Point(0, 0)
				};
			},
			getBlackIcon: function () {
				return {
					url: window.location.origin + '/assets/images/icons/location-black-icon.svg',
					origin: new google.maps.Point(0, 0)
				};
			},
			getBlackCircle: function () {
				return {
					url: window.location.origin + '/assets/images/icons/suggested-city-marker.png',
					origin: new google.maps.Point(0, 0)
				};
			},
			getGreenCircle: function () {
				return {
					url: window.location.origin + '/assets/images/icons/green-circle.png',
					origin: new google.maps.Point(0, 0)
				};
			},
   
			/* Map functions end */
			
			/* Price functions start */
   
			calculatePrice: function () {
				let selectedCarIndex = this.$root.$refs.createplan.vehiclesData.findIndex(x => x.id === this.$root.$refs.createplan.routeDetails.vehicleId);
				let carPrice = this.$root.$refs.createplan.vehiclesData[selectedCarIndex].price;
				let passengerCapacity = this.$root.$refs.createplan.vehiclesData[selectedCarIndex].passenger;
				let totalTripNight = 0;
				this.$root.$refs.createplan.routeDetails.price.total = 0;
				for (let index = 0; index <= this.$root.$refs.createplan.routeDetails.cities.length - 1; index++) {
					let night = '';
					let middleAddon = '';
					if (index === 0) {
						if (this.$root.$refs.createplan.routeDetails.cities[index].betweenDate === true) {
							if (this.$root.$refs.createplan.routeDetails.cities[index].lastDestination === true) {
								night = this.$root.$refs.createplan.routeDetails.cities[index].totalDay;
							}
							else {
								night = this.$root.$refs.createplan.routeDetails.cities[index].totalNight;
								this.transitionalRule(index, 1, carPrice);
							}
							this.middleRule(index, night, carPrice);
						}
						else {
							this.transitionalRule(index, 1, carPrice);
						}
					}
					else if (index !== 0 && index === this.$root.$refs.createplan.routeDetails.cities.length - 1 && this.$root.$refs.createplan.routeDetails.cities[index].lastDestination === true) {
						if (this.$root.$refs.createplan.routeDetails.cities[index].betweenDate === true) {
							night = this.$root.$refs.createplan.routeDetails.cities[index].totalNight;
							this.middleRule(index, night, carPrice);
						}
					}
					else {
						if (this.$root.$refs.createplan.routeDetails.cities[index].betweenDate === true) {
							night = this.$root.$refs.createplan.routeDetails.cities[index].totalNight - 1;
							this.middleRule(index, night, carPrice);
						}
						if (this.$root.$refs.createplan.routeDetails.cities[index - 1].endDate !== this.$root.$refs.createplan.routeDetails.cities[index].endDate) {
							this.transitionalRule(index, 1, carPrice);
                        }
						// this.transitionalRule(index, 1, carPrice);
					}
					if (this.$root.$refs.createplan.routeDetails.cities[index].totalNight === 0) {
						totalTripNight += this.$root.$refs.createplan.routeDetails.cities[index].totalDay;
					}
					else {
						totalTripNight += this.$root.$refs.createplan.routeDetails.cities[index].totalNight;
					}
				}
				
				if (this.$root.$refs.createplan.routeDetails.price.total !== 0 && totalTripNight !== 0) {
					this.$root.$refs.createplan.routeDetails.price.payToday = ((this.$root.$refs.createplan.routeDetails.price.total * 20) / 100).toFixed(2);
					this.$root.$refs.createplan.routeDetails.price.payDriver = ((this.$root.$refs.createplan.routeDetails.price.total * 80) / 100).toFixed(2);
					this.$root.$refs.createplan.routeDetails.price.paxPerDay = ((this.$root.$refs.createplan.routeDetails.price.total / totalTripNight) / passengerCapacity).toFixed(2);
					this.$root.$refs.createplan.routeDetails.price.total = this.$root.$refs.createplan.routeDetails.price.total.toFixed(2);
				}
			},
            middleRule: function (index, night, carPrice) {
				/*let totalDistance = 0;
				let totalPrice = 0;*/
				let countMiddleAddonDay = 0;
	            for (let key in this.$root.$refs.createplan.routeDetails.cities[index].middleAddons) {
		            let totalDistance = 0;
		            let totalPrice = 0;
	            	if (this.$root.$refs.createplan.routeDetails.cities[index].middleAddons.hasOwnProperty(key)) {
			            if (typeof this.$root.$refs.createplan.routeDetails.cities[index].middleAddons[key].city1 === 'object') {
				            totalDistance += this.$root.$refs.createplan.routeDetails.cities[index].middleAddons[key].city1.prevDistance;
				            if (typeof this.$root.$refs.createplan.routeDetails.cities[index].middleAddons[key].city2 === 'object') {
					            totalDistance += this.$root.$refs.createplan.routeDetails.cities[index].middleAddons[key].city2.prevDistance + this.$root.$refs.createplan.routeDetails.cities[index].middleAddons[key].city2.currDistance;
                            }
				            else {
					            totalDistance += this.$root.$refs.createplan.routeDetails.cities[index].middleAddons[key].city1.currDistance;
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
			            this.$root.$refs.createplan.routeDetails.price.total += totalPrice;
		            }
	            }
	            if (night - countMiddleAddonDay > 0) {
		            this.$root.$refs.createplan.routeDetails.price.total += (carPrice * (night - countMiddleAddonDay));
	            }
            },
            transitionalRule: function (index, night, carPrice) {
	            let totalDistance = 0;
	            let totalPrice = 0;
	            if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(index + 1)) {
		            if (typeof this.$root.$refs.createplan.routeDetails.cities[index + 1].firstaddon === 'object') {
			            totalDistance += this.$root.$refs.createplan.routeDetails.cities[index + 1].firstaddon.prevDistance;
			            if (typeof this.$root.$refs.createplan.routeDetails.cities[index + 1].secondaddon === 'object') {
				            totalDistance += this.$root.$refs.createplan.routeDetails.cities[index + 1].secondaddon.prevDistance + this.$root.$refs.createplan.routeDetails.cities[index + 1].secondaddon.currDistance;
			            }
			            else {
				            totalDistance += this.$root.$refs.createplan.routeDetails.cities[index + 1].firstaddon.currDistance;
			            }
		            }
		            else {
			            totalDistance += this.$root.$refs.createplan.routeDetails.cities[index + 1].city.distance;
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
	            	/*if (typeof this.$root.$refs.createplan.routeDetails.cities[index].distance !== 'undefined') {
			            totalDistance += this.$root.$refs.createplan.routeDetails.cities[index].distance;
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
	            this.$root.$refs.createplan.routeDetails.price.total += totalPrice;
            },
			
			/* Price functions end */
   
			closeaddonalert: function () {
				this.addonAlert = false;
			},
            swapLastAddon: function () {
	            this.selectedSecondAddOnCity = this.secondAddOnCities[this.swapAddonIndex];
	            this.closeaddonalert();
            }
		},
		destroyed() {
            $('body').css('overflow', 'scroll');
		}
	}
	
	const vm = this;
	window.iwSleepHere = function(index, cityId, cityName) {
        $('#selectedCityFromMap').attr({
            'data-index': index,
            'data-id': cityId,
            'data-name': cityName,
            
        }).trigger('click');
	};
	window.iwSetAddOnCity = function(index) {
		$('#selectedAddonCityFromMap').attr({
			'data-index': index
		}).trigger('click');
	};
</script>

<style scoped>
    .modal {
        min-height: 100vh;
        height: 100vh;
        max-height: 100vh;
        min-width: 100%;
        width: 100%;
        max-width: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        position: fixed;
        top: 0;
        left: 0;
        z-index: 2;
    }
    .modal-content {
        background-color: rgba(255, 255, 255, 1);
        min-width: 320px;
        width: 500px;
        max-width: 100%;
        box-shadow: 0 0 8px 0 rgba(0,0,0,0.1);
        -webkit-animation: zoomIn 0.5s;
        animation: zoomIn 0.5s;
    }
    .modalbody > div:first-child {
        font-size: 28px;
        letter-spacing: 1px;
        word-spacing: 2px;
    }
    .modalbody > div:nth-child(2) {
        font-weight: 100;
    }
    .modalfooter button {
        width: 220px;
        font-size: 12px;
    }
    .confirm-disabled {
        background-color: rgba(0, 0, 0, 0.3);
        cursor: not-allowed;
    }
    #side-nav-google-map {
        width: 100%;
        height: 260px;
        #margin: 12px auto 0;
        background: gray;
    }
    .subtitle-info {
        min-width: 54%;
        width: 54%;
        max-width: 54%;
        padding: 8px;
        right: 16px;
        top: 0;
        background-color: white;
        color: rgba(0, 0, 0, 1);
        #box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.75);
        border: 1px solid rgba(0, 0, 0, 0.2);
        z-index: 1;
        text-align: left;
    }
    .flip-container {
        -webkit-perspective: 1000;
        -moz-perspective: 1000;
        -o-perspective: 1000;
        perspective: 1000;
        flex-basis: calc((100% / 3) - 5%);
    }
    .flip-container:hover .flipper,
    .flip-container.hover .flipper {
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -ms-transform: rotateY(180deg);
        -o-transform: rotateY(180deg);
        transform: rotateY(180deg);
    }
    .flip-container, .front, .back {
        height: 110px;
    }
    .front, .back {
        width: 100%;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        backface-visibility: hidden;
        position: absolute;
        top: 0;
        left: 0;
    }
    .flipper {
        -webkit-transition: 0.5s;
        -moz-transition: 0.5s;
        -ms-transition: 0.5s;
        -o-transition: 0.5s;
        transition: 0.5s;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        transform-style: preserve-3d;
        position: relative;
    }
    .front .city-image {
        height: 100%;
        width: 100%;
    }
    .front .index, .back .index {
        background-color: rgba(0, 0, 0, 1);
        position: absolute;
        top: 0;
        left: 0;
        height: 14px;
        width: 14px;
        font-size: 10px;
        font-weight: 400;
        color: rgba(255, 255, 255, 1);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .back {
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -ms-transform: rotateY(180deg);
        -o-transform: rotateY(180deg);
        transform: rotateY(180deg);
        background-color: rgba(255, 255, 255, 1);
    }
    .front .city-name {
        font-size: 11px;
        min-width: 100%;
        width: 100%;
        max-width: 100%;
        left: 0;
        margin: 0 auto;
        position: absolute;
        letter-spacing: 2px;
        font-weight: bold;
        height: 100%;
        text-transform: uppercase;
        top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .front .city-name {
        color: rgba(255, 255, 255, 1);
    }
    .back .city-name {
        color: rgba(0, 0, 0, 1);
        min-width: 90%;
        width: 90%;
        max-width: 90%;
        margin: 0 auto;
        text-align: center;
        text-transform: uppercase;
        font-size: 10px;
        top: 14%;
        position: absolute;
        left: 0;
        right: 0;
        font-weight: bold;
        letter-spacing: 2px;
    }
    .back .city-description {
        font-size: 10px;
        min-width: 70%;
        width: 70%;
        max-width: 70%;
        margin: 0 auto;
        text-align: center;
        top: 40%;
        position: absolute;
        left: 0;
        right: 0;
    }
	.lastDestinationClass {
		min-height: 16px;
		height: 16px;
		max-height: 16px;
		min-width: 16px;
		width: 16px;
		max-width: 16px;
		cursor: pointer;
		border: 1px solid rgba(0, 0, 0, 0.3);
	}
	.lastDestinationClass.active {
		background-color: #FF9400;
		border: none;
	}
	.side-nav-enter-active, .side-nav-leave-active {
		-webkit-transition: all .4s ease-in-out;
		transition: all .4s ease-in-out;
	}
	.side-nav-enter {
		-webkit-transform: translateX(104%);
		-moz-transform: translateX(104%);
		-ms-transform: translateX(104%);
		-o-transform: translateX(104%);
		transform: translateX(104%);
		opacity: 0;
	}
	.slide-nav-leave {
		-webkit-transform: translateX(0%);
		-moz-transform: translateX(0%);
		-ms-transform: translateX(0%);
		-o-transform: translateX(0%);
		transform: translateX(0%);
		opacity: 0;
	}
	.vertical-bar {
		min-height: 30px;
		height: 30px;
		max-height: 30px;
		min-width: 1px;
		width: 1px;
		max-width: 1px;
		background-color: rgba(0, 0, 0, 0.3);
		margin: 4px 4px;
	}
</style>