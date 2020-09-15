<template>
	<transition name="side-nav">
		<aside class="sidenav d-flex flex-dir-column a-i-center" style="overflow: scroll;" >
			<i class="material-icons" style="align-self: flex-end; margin-top: 4px; margin-right: 8px; cursor: pointer;" @click="closeSideNav()" data-dismiss="sidenav">
				close
			</i>
			<div class="add-destination-title">
				Add up to 2 places to explore a day
			</div>
            <div class="add-destination-description m-t-4 d-flex flex-dir-row j-c-center a-i-center">
                Many day excursions included on your price. Free to Explore
            </div>
			<div class="sidenav-container">
				<div class="min-width-100 width-100 max-width-100 d-flex flex-wrap j-c-space-evenly a-i-center">
                    <div class="d-flex flex-dir-row j-c-space-evenly a-i-center single-date-container">
                        <img :src="'/assets/images/icons/start-date.svg'" class="p-0-8"/>
                        <input type="text" id="from" placeholder="Choose excursion date" readonly style="flex-grow: 1;" v-model="mediumExcursioDate"/>
                    </div>
                    <!--<div class="green-button font-size-12 d-flex j-c-center a-i-center" style="margin: 12px 0 12px; flex-basis: calc((100% / 3) - 6%);" @click.once="confirmFree">
                        confirm
                    </div>-->
                    <button class="green-button font-size-12 d-flex j-c-center a-i-center" v-bind:class="{'confirm-disabled': confirmDisabled}" :disabled="isConfirmDisabled" style="margin: 12px 0 12px; flex-basis: calc((100% / 3) - 6%);" @click.once="confirmFree">
                        confirm
                    </button>
				</div>
                <div class="google-map" id="middle-addon-google-map"></div>
				<div class="suggested-destination-title m-16-0 min-width-100 width-100 max-width-100">
					Suggested destination
				</div>
				<div class="middle-addon-suggested min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap j-c-space-between">
                    <div class="addon-flex" v-model="selectedFirstMiddleAddOnCity" v-if="typeof selectedFirstMiddleAddOnCity === 'object'">
                        <div class="pos-relative flex-item selectedaddon">
                            <div class="bg-opaque"></div>
                            <img :src="'/admin/assets/images/cities/' + selectedFirstMiddleAddOnCity.image ">
                            <!--<div class="serial-no d-flex flex-dir-row j-c-center a-i-center font-white">
                                1
                            </div>-->
                            <div class="sleeping-here-close d-flex flex-dir-row j-c-center a-i-center font-white" @click.prevent="removeFree(selectedFirstMiddleAddOnCity.id)">
                                <i class="material-icons">
                                    close
                                </i>
                            </div>
                            <div class="text-center min-width-100 width-100 max-width-100 city-name uppercase font-lato">
                                {{ selectedFirstMiddleAddOnCity.city_name | trimCityName }}
                            </div>
                            <div class="text-center city-description">
                                Beautiful landscape in the middle of Cuba
                            </div>
                            <div class="sleeping-here" style="font-size: 11px;">
                                You're already stopping here
                            </div>
                        </div>
                        <div class="font-size-10 m-t-4 font-400" v-if="mediumExcursioDate">
                            Here on: {{ mediumExcursioDate }}
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
                                    {{ selectedFirstMiddleAddOnCity.prevDistance | distanceMeterToKm }} Km
                                </div>
                                <div class="font-size-12 font-orange font-lato">
                                    {{ selectedFirstMiddleAddOnCity.currDistance | distanceMeterToKm }} Km
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="addon-flex" v-model="selectedSecondMiddleAddOnCity" v-if="typeof selectedFirstMiddleAddOnCity === 'object' && typeof selectedSecondMiddleAddOnCity === 'object'">
                        <div class="pos-relative flex-item selectedaddon">
                            <div class="bg-opaque"></div>
                            <img :src="'/admin/assets/images/cities/' + selectedSecondMiddleAddOnCity.image ">
                            <!--<div class="serial-no d-flex flex-dir-row j-c-center a-i-center font-white">
                                2
                            </div>-->
                            <div class="sleeping-here-close d-flex flex-dir-row j-c-center a-i-center font-white" @click.prevent="removeFree(selectedSecondMiddleAddOnCity.id)">
                                <i class="material-icons">
                                    close
                                </i>
                            </div>
                            <div class="text-center min-width-100 width-100 max-width-100 city-name uppercase font-lato">
                                {{ selectedSecondMiddleAddOnCity.city_name | trimCityName }}
                            </div>
                            <div class="text-center city-description">
                                Beautiful landscape in the middle of Cuba
                            </div>
                            <div class="sleeping-here" style="font-size: 11px;">
                                You're already stopping here
                            </div>
                        </div>
                        <div class="font-size-10 m-t-4 font-400" v-if="mediumExcursioDate">
                            Here on: {{ mediumExcursioDate }}
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
                                    {{ selectedSecondMiddleAddOnCity.prevDistance | distanceMeterToKm }} Km
                                </div>
                                <div class="font-size-12 font-orange font-lato">
                                    {{ selectedSecondMiddleAddOnCity.currDistance | distanceMeterToKm }} Km
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-for="(addOnCity, index) in firstMiddleAddOnCities" class="addon-flex" v-model="firstMiddleAddOnCities, selectedFirstMiddleAddOnCity" v-if="typeof selectedFirstMiddleAddOnCity !== 'object' && selectedFirstMiddleAddOnCity.id !== addOnCity.id">
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
	                                <button class="free" @click="setFree(index)" v-if="addOnCity.price === 'FREE'">
		                                {{ addOnCity.price }}
	                                </button>
                                    <button class="free" @click="setFree(index)" v-else>
                                        {{ addOnCity.price }}£
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
                                    <button class="free" @click="setFree(index)" v-if="addOnCity.price === 'FREE'">
                                        {{ addOnCity.price }}
                                    </button>
                                    <button class="free" @click="setFree(index)" v-else>
                                        {{ addOnCity.price }}£
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="font-size-10 m-t-4 font-400" v-if="addOnCity.prevDate">
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
                    <div v-for="(addOnCity, index) in secondMiddleAddOnCities" class="addon-flex" v-model="secondMiddleAddOnCities" v-if="typeof selectedFirstMiddleAddOnCity === 'object' && secondMiddleAddOnCities.length !== 0 && selectedSecondMiddleAddOnCity.id !== addOnCity.id && typeof selectedFirstMiddleAddOnCity === 'object'">
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
                                    <button class="free" @click="setFree(index)" v-if="addOnCity.price === 'FREE'">
                                        {{ addOnCity.price }}
                                    </button>
                                    <button class="free" @click="setFree(index)" v-else>
                                        {{ addOnCity.price }}£
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
                                    <button class="free" @click="setFree(index)" v-if="addOnCity.price === 'FREE'">
                                        {{ addOnCity.price }}
                                    </button>
                                    <button class="free" @click="setFree(index)" v-else>
                                        {{ addOnCity.price }}£
                                    </button>
                                </div>
                            </div>
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
				</div>
			</div>
            <div class="modal d-flex flex-wrap j-c-center a-i-center" v-if="middleAddonAlert">
                <div class="modal-content">
                    <div class="d-flex j-c-end a-i-center">
                        <button type="button" class="cur-point" @click="closeMiddleAddonalert" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modalbody font-lato m-t-56">
                        <div class="text-center">Too many stop in one go!</div>
                        <div class="text-center m-t-32">You can add upto 2 stop overs per route,</div>
                        <div class="text-center">Don't worry there is plenty to see</div>
                    </div>
                    <div class="modalfooter d-flex flex-wrap j-c-space-evenly a-i-center m-t-32">
                        <button type="button" class="uppercase orange-button" @click="closeMiddleAddonalert" data-dismiss="modal">
                            KEEP MY PREVIOUS STOP
                        </button>
                        <button type="button" class="uppercase green-button" @click="swapLastMiddleAddon" data-dismiss="modal">
                            SWAP THIS FOR MY LAST
                        </button>
                    </div>
                </div>
            </div>
            <div id="selectedMiddleAddonCityFromMap" data-index=""></div>
		</aside>
	</transition>
</template>

<script>
	import GoogleMapsLoader from 'google-maps'
	export default {
		name: "MiddleAddon",
		props: ['cityIndex', 'cityDetails', 'editableDate'],
		data() {
			return {
				firstMiddleAddOnCities: [],
				secondMiddleAddOnCities: [],
				mediumExcursioDate: '',
				longExcursioDate: '',
				stringExcursioDate: '',
				selectedFirstMiddleAddOnCity: '',
				selectedSecondMiddleAddOnCity: '',
                selectedMiddleAddons: {},
				confirmDisabled: true,
				middleAddonAlert: false,
				swapMiddleAddonIndex: ''
			}
		},
		mounted() {
			let vm = this;
			// No scroll effect when sidenavbar opens
			$('body').css('overflow', 'hidden');
			
			$('#selectedMiddleAddonCityFromMap').on('click', function(){
				vm.setFree($('#selectedMiddleAddonCityFromMap').attr('data-index'));
			});
			
			var startDate = moment().startOf('hour');
			var endDate = moment().startOf('hour');
			var minDate = moment().startOf('hour');
			var maxDate = moment().startOf('hour');
			if (typeof this.editableDate === 'undefined') {
				if (typeof this.cityDetails === 'object') {
					if (this.cityDetails.lastDestination === false && this.cityIndex !== 0) {
						startDate = minDate = moment(this.cityDetails.startDate).add(1, 'day');
						endDate = maxDate = moment(this.cityDetails.endDate).subtract(1, 'day');
                    }
					if (this.cityIndex === 0) {
						if (this.cityDetails.lastDestination === true) {
							startDate = minDate = moment(this.cityDetails.startDate);
							endDate = maxDate = moment(this.cityDetails.endDate);
                        }
						else {
							if (moment(this.cityDetails.endDate)._d.getDate() - moment(this.cityDetails.startDate)._d.getDate() <= 1) {
								startDate = endDate = minDate = maxDate = moment(this.cityDetails.startDate);
                            }
							else {
								startDate = minDate = moment(this.cityDetails.startDate);
								endDate = maxDate = moment(this.cityDetails.endDate).subtract(1, 'day');
                            }
                        }
                    }
					else if (this.cityIndex === this.$root.$refs.createplan.routeDetails.cities.length - 1 && this.cityDetails.lastDestination === true) {
						//startDate = endDate = minDate = maxDate = moment(this.cityDetails.endDate);
						/*if (moment(this.cityDetails.endDate)._d.getDate() - moment(this.cityDetails.startDate)._d.getDate() <= 1) {
							startDate = endDate = minDate = maxDate = moment(this.cityDetails.startDate);
							minDate = moment(this.cityDetails.startDate).add(1, 'day');
						}
						else {
							startDate = minDate = moment(this.cityDetails.startDate).add(1, 'day');
							endDate = maxDate = moment(this.cityDetails.endDate);
						}*/
						startDate = minDate = moment(this.cityDetails.startDate).add(1, 'day');
						endDate = maxDate = moment(this.cityDetails.endDate);
                    }
				}
				/*for (let key in vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons) {
					if (this.cityDetails.middleAddons.hasOwnProperty(key)) {
						if (typeof this.cityDetails.middleAddons[key].city1 === 'object' && typeof this.cityDetails.middleAddons[key].city2 === 'object') {
							startDate = minDate = moment(key).add(1, 'day');
						}
					}
					
				}*/
				let tempDate = this.cityDetails.startDate;
				let nextDate = '';
				for (let i = 0; i < this.cityDetails.totalDay; i++) {
					if (this.cityDetails.middleAddons.hasOwnProperty(tempDate)) {
						if (typeof this.cityDetails.middleAddons[tempDate].city1 === 'object' && typeof this.cityDetails.middleAddons[tempDate].city2 === 'object') {
							// nextDate = moment(tempDate).add(1, 'day');
							tempDate = moment(tempDate).add(1, 'day').format('YYYY-MM-DD');
							//startDate = minDate = moment(this.cityDetails.startDate).add(1, 'day').format('YYYY-MM-DD');
                            /*this.stringExcursioDate = tempDate;
                            this.mediumExcursioDate = nextDate._d.getDate() + ' ' + nextDate._locale._monthsShort[nextDate._d.getMonth()];
                            this.longExcursioDate = nextDate._d.getDate() + ' ' + nextDate._locale._monthsShort[nextDate._d.getMonth()] + ' ' + nextDate._d.getFullYear();*/
						}
						/*else {
							nextDate = moment(tempDate);
							this.stringExcursioDate = tempDate;
							this.mediumExcursioDate = nextDate._d.getDate() + ' ' + nextDate._locale._monthsShort[nextDate._d.getMonth()];
							this.longExcursioDate = nextDate._d.getDate() + ' ' + nextDate._locale._monthsShort[nextDate._d.getMonth()] + ' ' + nextDate._d.getFullYear();
                        }*/
					}
					else {
						startDate = minDate = moment(tempDate);
						/*nextDate = moment(tempDate);
						this.stringExcursioDate = tempDate;
						this.mediumExcursioDate = nextDate._d.getDate() + ' ' + nextDate._locale._monthsShort[nextDate._d.getMonth()];
						this.longExcursioDate = nextDate._d.getDate() + ' ' + nextDate._locale._monthsShort[nextDate._d.getMonth()] + ' ' + nextDate._d.getFullYear();*/
                    }
				}
				startDate = minDate = moment(tempDate);
            }
			else {
				this.stringExcursioDate = this.editableDate;
				let momentDate = moment(this.editableDate);
				this.mediumExcursioDate = momentDate._d.getDate() + ' ' + momentDate._locale._monthsShort[momentDate._d.getMonth()];
				this.longExcursioDate = momentDate._d.getDate() + ' ' + momentDate._locale._monthsShort[momentDate._d.getMonth()] + ' ' + momentDate._d.getFullYear();
				startDate = endDate = minDate = maxDate = momentDate;
				if (vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons.hasOwnProperty(vm.stringExcursioDate)) {
					if (typeof vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons[vm.stringExcursioDate].city1 === 'object' || typeof vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons[vm.stringExcursioDate].city2 === 'string') {
						vm.selectedFirstMiddleAddOnCity = vm.cityDetails.middleAddons[vm.stringExcursioDate].city1;
						vm.selectedSecondMiddleAddOnCity = vm.cityDetails.middleAddons[vm.stringExcursioDate].city2;
						vm.fetchSecondMiddleAddOnCities(vm.cityDetails.city.id, vm.selectedFirstMiddleAddOnCity.id);
					}
				}
            }
			$('.single-date-container').daterangepicker({
				singleDatePicker: true,
				autoApply: true,
				autoUpdateInput: true,
				alwaysShowCalendars: true,
				startDate: startDate,
				endDate: endDate,
				minDate: minDate,
				maxDate: maxDate,
				opens: "center",
				isInvalidDate: function (date) {
					let formattedDate = date.format('YYYY-MM-DD');
					if (typeof this.editableDate === 'undefined') {
						for (let key in vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons) {
							if (vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons.hasOwnProperty(key)) {
								if (formattedDate === key && typeof vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons[key].city1 === 'object' && typeof vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons[key].city2 === 'object') {
									return 'disabled';
								}
							}
						}
                    }
					else {
						if (vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons.hasOwnProperty(vm.stringExcursioDate)) {
							for (let key in vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons) {
								if (formattedDate === key && key !== vm.stringExcursioDate) {
									return 'disabled';
								}
							}
                        }
                    }
                }
			}, function(start, end, label) {
				if (typeof vm.editableDate !== 'undefined') {
					let momentDate = moment(vm.editableDate);
					vm.mediumExcursioDate = momentDate._d.getDate() + ' ' + momentDate._locale._monthsShort[momentDate._d.getMonth()];
					vm.longExcursioDate = momentDate._d.getDate() + ' ' + momentDate._locale._monthsShort[momentDate._d.getMonth()] + ' ' + momentDate._d.getFullYear();
					vm.stringExcursioDate = momentDate.format('YYYY-MM-DD');
				}
				else {
					vm.mediumExcursioDate = start._d.getDate() + ' ' + start._locale._monthsShort[start._d.getMonth()];
					vm.longExcursioDate = start._d.getDate() + ' ' + start._locale._monthsShort[start._d.getMonth()] + ' ' + start._d.getFullYear();
					vm.stringExcursioDate = start.format('YYYY-MM-DD');
                }
				if (vm.stringExcursioDate != '') {
					if (vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons.hasOwnProperty(vm.stringExcursioDate)) {
						if (typeof vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons[vm.stringExcursioDate].city1 === 'object' || typeof vm.$root.$refs.createplan.routeDetails.cities[vm.cityIndex].middleAddons[vm.stringExcursioDate].city2 === 'string') {
							vm.selectedFirstMiddleAddOnCity = vm.cityDetails.middleAddons[vm.stringExcursioDate].city1;
							vm.selectedSecondMiddleAddOnCity = vm.cityDetails.middleAddons[vm.stringExcursioDate].city2;
							vm.fetchSecondMiddleAddOnCities(vm.cityDetails.city.id, vm.selectedFirstMiddleAddOnCity.id);
						}
					}
					else {
						vm.selectedFirstMiddleAddOnCity = '';
						vm.selectedSecondMiddleAddOnCity = '';
                        vm.fetchFirstMiddleAddOnCities(vm.cityDetails.city.id);
					}
                }
			}).on('show.daterangepicker', function (ev, picker) {
				picker.container.find('.start-date').trigger('mousedown.daterangepicker');
			});
			// $('.single-date-container').trigger('click');
			this.fetchFirstMiddleAddOnCities(this.cityDetails.city.id);
			this.displayMap();
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
                this.$root.$refs.createplan.showMiddleAddonModal = false;
            },
			displayMap: function(){
				let that = this;
				let lat = this.cityDetails.city.latitude;
				let lng = this.cityDetails.city.longitude;
				GoogleMapsLoader.load(function(google) {
					// Create a map and center it on Cuba.
					let map = new google.maps.Map(
						document.getElementById('middle-addon-google-map'),
						{
							center: new google.maps.LatLng(lat, lng),
							zoom: 7,
							mapTypeId: google.maps.MapTypeId.ROADMAP,
							disableDefaultUI: true
						}
					);
					let infowindow = new google.maps.InfoWindow;
					let bounds = new google.maps.LatLngBounds();
					let waypoints = [];
					let vm = that;
					if (typeof that.cityDetails === 'object') {
						that.showRoute(map, bounds);
						if (typeof that.selectedFirstMiddleAddOnCity !== 'object' && typeof that.selectedSecondMiddleAddOnCity !== 'object' && that.firstMiddleAddOnCities.length !== 0) {
							for (let index = 0; index < that.firstMiddleAddOnCities.length; index++) {
								for (let c = 0; c < that.$root.$refs.createplan.routeDetails.cities.length; c++) {
									if (that.$root.$refs.createplan.routeDetails.cities[c].city.id !== that.firstMiddleAddOnCities[index].id) {
										if (that.$root.$refs.createplan.routeDetails.cities.length === 1) {
											that.showAvailableMiddleAddon(map, infowindow, index, that.firstMiddleAddOnCities[index], bounds);
                                        }
										else {
											if (typeof that.$root.$refs.createplan.routeDetails.cities[c].firstaddon === 'object' && that.$root.$refs.createplan.routeDetails.cities[c].firstaddon.id !== that.firstMiddleAddOnCities[index].id) {
												/*if (typeof that.$root.$refs.createplan.routeDetails.cities[c].secondaddon === 'object' && that.$root.$refs.createplan.routeDetails.cities[c].secondaddon.id !== that.firstMiddleAddOnCities[index].id) {
													that.showAvailableMiddleAddon(map, infowindow, index, that.firstMiddleAddOnCities[index], bounds);
												}*/
												that.showAvailableMiddleAddon(map, infowindow, index, that.firstMiddleAddOnCities[index], bounds);
											}
											else if (typeof that.$root.$refs.createplan.routeDetails.cities[c].secondaddon === 'object' && that.$root.$refs.createplan.routeDetails.cities[c].secondaddon.id !== that.firstMiddleAddOnCities[index].id) {
												that.showAvailableMiddleAddon(map, infowindow, index, that.firstMiddleAddOnCities[index], bounds);
                                            }
											else {
												that.showAvailableMiddleAddon(map, infowindow, index, that.firstMiddleAddOnCities[index], bounds);
                                            }
                                        }
									}
								}
							}
                        }
						else if (typeof that.selectedFirstMiddleAddOnCity === 'object' && that.secondMiddleAddOnCities.length !== 0) {
							for (let index = 0; index < that.secondMiddleAddOnCities.length; index++) {
								for (let c = 0; c < that.$root.$refs.createplan.routeDetails.cities.length; c++) {
									if (that.$root.$refs.createplan.routeDetails.cities[c].city.id !== that.secondMiddleAddOnCities[index].id) {
										if (that.$root.$refs.createplan.routeDetails.cities.length === 1) {
											that.showAvailableMiddleAddon(map, infowindow, index, that.secondMiddleAddOnCities[index], bounds);
										}
										else {
											if (typeof that.$root.$refs.createplan.routeDetails.cities[c].firstaddon === 'object' && that.$root.$refs.createplan.routeDetails.cities[c].firstaddon.id !== that.secondMiddleAddOnCities[index].id) {
												/*if (typeof that.$root.$refs.createplan.routeDetails.cities[c].secondaddon === 'object' && that.$root.$refs.createplan.routeDetails.cities[c].secondaddon.id !== that.secondMiddleAddOnCities[index].id) {
													that.showAvailableMiddleAddon(map, infowindow, index, that.secondMiddleAddOnCities[index], bounds);
												}*/
												that.showAvailableMiddleAddon(map, infowindow, index, that.secondMiddleAddOnCities[index], bounds);
											}
											else if (typeof that.$root.$refs.createplan.routeDetails.cities[c].secondaddon === 'object' && that.$root.$refs.createplan.routeDetails.cities[c].secondaddon.id !== that.firstMiddleAddOnCities[index].id) {
												that.showAvailableMiddleAddon(map, infowindow, index, that.firstMiddleAddOnCities[index], bounds);
											}
											else {
												that.showAvailableMiddleAddon(map, infowindow, index, that.firstMiddleAddOnCities[index], bounds);
											}
                                        }
									}
								}
							}
                        }
						that.showMiddleAddonRoute(map, bounds);
					}
					map.fitBounds(bounds);
				});
			},
            showRoute: function (map, bounds) {
		    	let that = this;
	            let directionsRequest = '';
	            let directionsService = new google.maps.DirectionsService;
	            if (this.$root.$refs.createplan.routeDetails.cities.length === 1) {
		            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[0].city.latitude, this.$root.$refs.createplan.routeDetails.cities[0].city.longitude), this.getOrangeFillIcon(), map, bounds);
	            }
	            else {
		            let vm = this;
		            let waypoints = [];
		            if (this.cityIndex === 0) {
			            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[0].city.latitude, this.$root.$refs.createplan.routeDetails.cities[0].city.longitude), this.getOrangeFillIcon(), map, bounds);
                    }
		            else if (this.cityIndex === 1) {
			            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[0].city.latitude, this.$root.$refs.createplan.routeDetails.cities[0].city.longitude), this.getGreenFillIcon(), map, bounds);
                    }
		            else {
			            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[0].city.latitude, this.$root.$refs.createplan.routeDetails.cities[0].city.longitude), this.getBlackFillIcon(), map, bounds);
                    }
		            for (let i = 1; i <= this.$root.$refs.createplan.routeDetails.cities.length - 1; i++) {
			            waypoints = [];
			            if (this.cityIndex === 0) {
				            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[i].city.latitude, this.$root.$refs.createplan.routeDetails.cities[i].city.longitude), this.getBlackFillIcon(), map, bounds);
			            }
			            else if (this.cityIndex === 1) {
			            	if (i === this.cityIndex) {
					            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[i].city.latitude, this.$root.$refs.createplan.routeDetails.cities[i].city.longitude), this.getOrangeFillIcon(), map, bounds);
                            }
			            	else {
					            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[i].city.latitude, this.$root.$refs.createplan.routeDetails.cities[i].city.longitude), this.getBlackFillIcon(), map, bounds);
                            }
			            }
			            else {
				            if (i === this.cityIndex) {
					            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[i].city.latitude, this.$root.$refs.createplan.routeDetails.cities[i].city.longitude), this.getOrangeFillIcon(), map, bounds);
				            }
				            else {
				            	if (i === this.cityIndex - 1) {
						            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[i].city.latitude, this.$root.$refs.createplan.routeDetails.cities[i].city.longitude), this.getGreenFillIcon(), map, bounds);
                                }
				            	else {
						            this.makeMarker(new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[i].city.latitude, this.$root.$refs.createplan.routeDetails.cities[i].city.longitude), this.getBlackFillIcon(), map, bounds);
                                }
				            }
			            }
			            if (typeof this.$root.$refs.createplan.routeDetails.cities[i].firstaddon === 'object' && this.$root.$refs.createplan.routeDetails.cities[i].firstaddon !== '') {
				            waypoints.push({
					            location: new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[i].firstaddon.latitude, this.$root.$refs.createplan.routeDetails.cities[i].firstaddon.longitude),
					            stopover: true
				            })
			            }
			            if (typeof this.$root.$refs.createplan.routeDetails.cities[i].secondaddon === 'object' && this.$root.$refs.createplan.routeDetails.cities[i].secondaddon !== '') {
				            waypoints.push({
					            location: new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[i].secondaddon.latitude, this.$root.$refs.createplan.routeDetails.cities[i].secondaddon.longitude),
					            stopover: true
				            })
			            }
			            if (waypoints.length !== 0) {
				            waypoints.forEach(function (item) {
					            vm.makeMarker(item.location, vm.getBlackIcon(), map, bounds);
				            });
			            }
			            directionsRequest = {
				            origin: new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[i - 1].city.latitude, this.$root.$refs.createplan.routeDetails.cities[i - 1].city.longitude),
				            destination: new google.maps.LatLng(this.$root.$refs.createplan.routeDetails.cities[i].city.latitude, this.$root.$refs.createplan.routeDetails.cities[i].city.longitude),
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
	            }
	            if (that.cityDetails.middleAddons.length > 0) {
		            let waypoints = [];
		            let vm = this;
		            for (let key in that.cityDetails.middleAddons) {
			            waypoints = [];
			            if (that.cityDetails.middleAddons[key].hasOwnProperty('city1')) {
				            waypoints.push({
					            location: new google.maps.LatLng(that.cityDetails.middleAddons[key].city1.latitude, that.cityDetails.middleAddons[key].city1.longitude),
					            stopover: true
				            })
			            }
			            if (that.cityDetails.middleAddons[key].hasOwnProperty('city2')) {
				            waypoints.push({
					            location: new google.maps.LatLng(that.cityDetails.middleAddons[key].city2.latitude, that.cityDetails.middleAddons[key].city2.longitude),
					            stopover: true
				            })
			            }
			            if (waypoints.length !== 0) {
				            waypoints.forEach(function (item) {
					            vm.makeMarker(item.location, that.getgreenIcon(), map, bounds);
				            });
			            }
			            directionsRequest = {
				            origin: new google.maps.LatLng(that.cityDetails.city.latitude, that.cityDetails.city.longitude),
				            destination: new google.maps.LatLng(that.cityDetails.city.latitude, that.cityDetails.city.longitude),
				            waypoints: waypoints,
				            optimizeWaypoints: true,
				            travelMode: 'DRIVING'
			            };
		            }
                }
            },
            showMiddleAddonRoute: function (map, bounds) {
		    	let vm = this;
	            let middleAddonKeys = Object.keys(this.cityDetails.middleAddons);
	            //console.log(middleAddonKeys);
	
	            let directionsService = new google.maps.DirectionsService;
	            let directionsRequest = '';
	            let waypoints = [];
	            let selectedAddonWaypoints = [];
	            
	            if (middleAddonKeys.length !== 0) {
		            for (let m = 0; m < middleAddonKeys.length; m++) {
			            waypoints = [];
			            if (this.stringExcursioDate != '' && middleAddonKeys[m] === this.stringExcursioDate) {
				            if (typeof this.selectedFirstMiddleAddOnCity === 'object') {
					            waypoints.push({
						            location: new google.maps.LatLng(this.selectedFirstMiddleAddOnCity.latitude, this.selectedFirstMiddleAddOnCity.longitude),
						            stopover: true
					            })
				            }
				            if (typeof this.selectedSecondMiddleAddOnCity === 'object') {
					            waypoints.push({
						            location: new google.maps.LatLng(this.selectedSecondMiddleAddOnCity.latitude, this.selectedSecondMiddleAddOnCity.longitude),
						            stopover: true
					            })
				            }
                        }
			            else {
				            if (this.cityDetails.middleAddons[middleAddonKeys[m]].hasOwnProperty('city1') && typeof this.cityDetails.middleAddons[middleAddonKeys[m]].city1 === 'object') {
					            waypoints.push({
						            location: new google.maps.LatLng(this.cityDetails.middleAddons[middleAddonKeys[m]].city1.latitude, this.cityDetails.middleAddons[middleAddonKeys[m]].city1.longitude),
						            stopover: true
					            })
				            }
				            if (this.cityDetails.middleAddons[middleAddonKeys[m]].hasOwnProperty('city2') && typeof this.cityDetails.middleAddons[middleAddonKeys[m]].city2 === 'object') {
					            waypoints.push({
						            location: new google.maps.LatLng(this.cityDetails.middleAddons[middleAddonKeys[m]].city2.latitude, this.cityDetails.middleAddons[middleAddonKeys[m]].city2.longitude),
						            stopover: true
					            })
				            }
                        }
			            if (waypoints.length !== 0) {
				            waypoints.forEach(function (item) {
					            vm.makeMarker(item.location, vm.getGreenIcon(), map, bounds);
				            });
			            }
			            directionsRequest = {
				            origin: new google.maps.LatLng(this.cityDetails.city.latitude, this.cityDetails.city.longitude),
				            destination: new google.maps.LatLng(this.cityDetails.city.latitude, this.cityDetails.city.longitude),
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
	            if (this.stringExcursioDate != '' && !(this.stringExcursioDate in middleAddonKeys) && typeof this.editableDate === 'undefined') {
		            waypoints = [];
		            if (typeof this.selectedFirstMiddleAddOnCity === 'object') {
			            waypoints.push({
				            location: new google.maps.LatLng(this.selectedFirstMiddleAddOnCity.latitude, this.selectedFirstMiddleAddOnCity.longitude),
				            stopover: true
			            })
		            }
		            if (typeof this.selectedSecondMiddleAddOnCity === 'object') {
			            waypoints.push({
				            location: new google.maps.LatLng(this.selectedSecondMiddleAddOnCity.latitude, this.selectedSecondMiddleAddOnCity.longitude),
				            stopover: true
			            })
		            }
		            if (waypoints.length !== 0) {
			            waypoints.forEach(function (item) {
				            vm.makeMarker(item.location, vm.getGreenIcon(), map, bounds);
			            });
		            }
		            if (waypoints.length > 0) {
			            directionsRequest = {
				            origin: new google.maps.LatLng(this.cityDetails.city.latitude, this.cityDetails.city.longitude),
				            destination: new google.maps.LatLng(this.cityDetails.city.latitude, this.cityDetails.city.longitude),
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
            },
            showAvailableMiddleAddon: function (map, infowindow, index, addon, bounds) {
	            let image = {
		            url: window.location.origin + '/assets/images/icons/green-circle.png',
		            origin: new google.maps.Point(0, 0)
	            };
	            let marker = new google.maps.Marker({
		            position: new google.maps.LatLng(addon.latitude, addon.longitude),
		            map: map,
		            icon: image,
		            animation: google.maps.Animation.DROP,
	            });
	            let contentString = '<div style="min-width: 170px; width: 170px; max-width: 170px;">' +
		            '</div>' +
		            '<img src="' + window.location.origin + '/admin/assets/images/cities/' + addon.image + '" class="marker-city-image">' +
		            '<div class="uppercase font-lato text-center marker-city-name font-white">' +
		            addon.city_name.substring(0, 20) + '...' +
		            '</div>' +
		            '<div class="text-center marker-city-description font-400" style="bottom: 40%; !important;">' +
		            'Beautiful landscape in the middle of Cuba' +
		            '</div>' +
		            '<button class="free" onclick="iwSetMiddleAddOnCity(' + index + ')">' + addon.price + (addon.price !== 'FREE' ? '£' : '') + '</button>' +
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
	
	            bounds.extend(marker.position);
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
			fetchFirstMiddleAddOnCities: function (cityId) {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				axios.get('/fetch-first-middle-addon-city/' + cityId)
					.then((response) => {
						if (response.data === 'error') {
							this.firstMiddleAddOnCities = [];
						}
						else {
							this.firstMiddleAddOnCities = response.data.first_middle_add_on_cities;
							this.setPrice(this.firstMiddleAddOnCities);
							for (let c = 0; c < this.$root.$refs.createplan.routeDetails.cities.length; c++) {
								for (let d = 0; d < this.firstMiddleAddOnCities.length; d++) {
									if ((this.$root.$refs.createplan.routeDetails.cities[c].city.id === this.firstMiddleAddOnCities[d].id)) {
										this.firstMiddleAddOnCities[d].prevDate = moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getDate() + ' ' + moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._locale._monthsShort[moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getMonth()];
									}
									else if (typeof this.$root.$refs.createplan.routeDetails.cities[c].firstaddon === 'object' && this.$root.$refs.createplan.routeDetails.cities[c].firstaddon.id === this.firstMiddleAddOnCities[d].id) {
										this.firstMiddleAddOnCities[d].prevDate = moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getDate() + ' ' + moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._locale._monthsShort[moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getMonth()];
                                    }
									else if (typeof this.$root.$refs.createplan.routeDetails.cities[c].secondaddon === 'object' && this.$root.$refs.createplan.routeDetails.cities[c].secondaddon.id === this.firstMiddleAddOnCities[d].id) {
										this.firstMiddleAddOnCities[d].prevDate = moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getDate() + ' ' + moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._locale._monthsShort[moment(this.$root.$refs.createplan.routeDetails.cities[c].startDate)._d.getMonth()];
                                    }
									/*else if (typeof this.$root.$refs.createplan.routeDetails.cities[c].middleAddons.length !== 'undefined') {
										
                                    }*/
								}
							}
							//this.getDateOfPreviouslyAddedCity(this.firstMiddleAddOnCities, 1);
							this.displayMap();
						}
					});
			},
			fetchSecondMiddleAddOnCities: function (cityId, firstMiddleAddonId) {
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				axios.get('/fetch-second-middle-addon-city/' + cityId + '/' + firstMiddleAddonId)
					.then((response) => {
						if (response.data === 'error') {
							this.secondMiddleAddOnCities = [];
						}
						else {
							this.secondMiddleAddOnCities = response.data.second_middle_add_on_cities;
							this.setSecondPrice(this.secondMiddleAddOnCities);
							//this.getDateOfPreviouslyAddedCity(this.secondMiddleAddOnCities, 2);
							this.displayMap();
						}
					});
			},
			setPrice: function (parameter) {
				let carPrice = this.$root.$refs.createplan.selectedVehicle.price;
				let night = 1;
				for (let index = 0; index <= parameter.length - 1; index++) {
					let totalDistance = parameter[index].prevDistance + parameter[index].currDistance;
					let extraPrice = 0;
					if (totalDistance < 200000) {
						extraPrice = 'FREE';
					}
					else if (totalDistance > 200000 && totalDistance < 300000) {
						extraPrice = (carPrice * night * 1.5) - carPrice;
					}
					else if (totalDistance > 300000 && totalDistance < 400000) {
						extraPrice = (carPrice * night * 2) - carPrice;
					}
					else {
						extraPrice = (carPrice * night * 2) - carPrice;
					}
					parameter[index].price = extraPrice;
				}
			},
			setSecondPrice: function (parameter) {
				let carPrice = this.$root.$refs.createplan.selectedVehicle.price;
				let night = 1;
				for (let index = 0; index <= parameter.length - 1; index++) {
					let totalDistance = this.selectedFirstMiddleAddOnCity.prevDistance + parameter[index].prevDistance + parameter[index].currDistance;
					let extraPrice = 0;
					if (totalDistance < 200000) {
						extraPrice = 'FREE';
					}
					else if (totalDistance > 200000 && totalDistance < 300000) {
						extraPrice = (carPrice * night * 1.5) - carPrice;
						if (this.selectedFirstMiddleAddOnCity.price !== 'FREE') {
							extraPrice = (carPrice * night * 1.5) - carPrice - this.selectedFirstMiddleAddOnCity.price;
                        }
					}
					else if (totalDistance > 300000 && totalDistance < 400000) {
						extraPrice = (carPrice * night * 2) - carPrice;
						if (this.selectedFirstMiddleAddOnCity.price !== 'FREE') {
							extraPrice = (carPrice * night * 2) - carPrice - this.selectedFirstMiddleAddOnCity.price;
						}
					}
					else {
						extraPrice = (carPrice * night * 2) - carPrice;
						if (this.selectedFirstMiddleAddOnCity.price !== 'FREE') {
							extraPrice = (carPrice * night * 2) - carPrice - this.selectedFirstMiddleAddOnCity.price;
						}
					}
					if (extraPrice <= 0) {
						extraPrice = 'FREE';
                    }
					parameter[index].price = extraPrice;
				}
			},
			setFree: function (index) {
		    	this.swapMiddleAddonIndex = index;
		    	if (this.selectedFirstMiddleAddOnCity === '') {
				    this.selectedFirstMiddleAddOnCity = this.firstMiddleAddOnCities[index];
				    this.fetchSecondMiddleAddOnCities(this.cityDetails.city.id, this.selectedFirstMiddleAddOnCity.id);
			    }
		    	else if (this.selectedSecondMiddleAddOnCity === '') {
				    this.selectedSecondMiddleAddOnCity = this.secondMiddleAddOnCities[index];
			    }
		    	else {
				    this.middleAddonAlert = true;
                }
				this.displayMap();
			},
			removeFree: function (cityId) {
                if (this.selectedFirstMiddleAddOnCity.id === cityId) {
	                this.selectedFirstMiddleAddOnCity = this.selectedSecondMiddleAddOnCity;
	                this.selectedSecondMiddleAddOnCity = '';
                }
                else if (this.selectedSecondMiddleAddOnCity.id === cityId) {
	                this.selectedSecondMiddleAddOnCity = '';
                }
				this.fetchSecondMiddleAddOnCities(this.cityDetails.city.id, this.selectedFirstMiddleAddOnCity.id);
				this.displayMap();
			},
            confirmFree: function () {
	            if (this.stringExcursioDate != '') {
		            this.$root.$refs.createplan.routeDetails.cities[this.cityIndex].middleAddons[this.stringExcursioDate] = {
			            city1: this.selectedFirstMiddleAddOnCity,
			            city2: this.selectedSecondMiddleAddOnCity
		            };
		
		            var ordered = {};
		            var unordered = this.$root.$refs.createplan.routeDetails.cities[this.cityIndex].middleAddons;
		            Object.keys(unordered).sort().forEach(function(key) {
			            ordered[key] = unordered[key];
		            });
		            this.$root.$refs.createplan.routeDetails.cities[this.cityIndex].middleAddons = ordered;
                }
	            this.calculatePrice();
	            this.$root.$refs.createplan.showMiddleAddonModal = false;
	            this.$root.$refs.createplan.$refs.googleMap.displayMap();
            },
			
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
   
			closeMiddleAddonalert: function () {
				this.middleAddonAlert = false;
			},
			swapLastMiddleAddon: function () {
				this.selectedSecondMiddleAddOnCity = this.secondMiddleAddOnCities[this.swapMiddleAddonIndex];
				this.closeMiddleAddonalert();
			},
			/*getDateOfPreviouslyAddedCity: function (parameter, addon = null) {
				//console.log(parameter);
                if (this.destinationIndex !== 0) {
	                let that = this;
	                for (let i = 0; i < parameter.length - 1; i++) {
		                let cityIndex = this.$root.$refs.createplan.routeDetails.cities.findIndex(function (x) {
			                return x.city.id === parameter[i].id;
		                });
		                if (cityIndex !== -1) {
			                let prevDateMomentObj = moment(that.$root.$refs.createplan.routeDetails.cities[i].startDate);
			                if (addon === 1) {
				                this.firstMiddleAddOnCities[i].prevDate = prevDateMomentObj._d.getDate() + ' ' + prevDateMomentObj._locale._monthsShort[prevDateMomentObj._d.getMonth()];
			                }
			                else {
				                this.secondMiddleAddOnCities[i].prevDate = prevDateMomentObj._d.getDate() + ' ' + prevDateMomentObj._locale._monthsShort[prevDateMomentObj._d.getMonth()];
			                }
		                }
	                }
                }
			}*/
		},
        computed: {
	        isConfirmDisabled: function () {
		        if (this.mediumExcursioDate != '') {
			        return this.confirmDisabled = false;
		        }
		        else {
			        return this.confirmDisabled = true;
		        }
	        }
        },
		destroyed() {
            $('body').css('overflow', 'scroll');
		}
	}
 
	window.iwSetMiddleAddOnCity = function(index) {
		$('#selectedMiddleAddonCityFromMap').attr({
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
    .single-date-container {
        border: 1px solid rgba(0, 0, 0, 0.3);
        flex-basis: calc((100% / 2) - 3%);
    }
    #middle-addon-google-map {
        width: 100%;
        height: 260px;
        margin: 12px auto 0;
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