<template>
	<transition name="route-modal">
		<div class="modal" style="display: block; background-color: rgba(0,0,0,0.5);">
			<div class="modal-dialog custom-modal modal-lg">
				<div class="modal-content custom-modal-content">
					<div class="modal-header custom-modal-header" style="display: flex; align-items: center;">
						<h4 style="margin: 0; font-size: 31px; font-weight: bold; text-align: center; flex-grow: 1;">
							<span v-if="destinationIndex === 'none'">Add </span>
							<span v-else>Edit </span>
							<span v-if="destinationIndex === 0">trip start city</span>
							<span v-else>destination</span>
						</h4>
						<button type="button" class="close" id="destination-close" @click="$emit('close')"
						        data-dismiss="modal" style="font-size: 42px;">&times;
						</button>
					</div>
					<form action="#" method="post" id="add-destination-form" v-on:submit.prevent="saveDestination"
					      style=" min-height: 200px; width: 100%; padding: 24px;">
						<div class="modal-body display-flex-column" style=" min-height: 320px; padding: 0;">
							<!--<form action="#" method="post" id="add-destination-form" v-on:submit.prevent="saveDestination" style=" min-height: 200px; width: 100%; padding: 24px;">-->
							<div class="display-flex space-between" style="width: 100%; margin-bottom: 24px;">
								<div class="col-md-8">
									<select name="" class="form-control" id="destination_select"
									        style=" font-weight: bold;"
									        v-on:change="fetchAddOnCities(); calculateDistancePriceTime();"
									        v-model="selectedCity">
										<option disabled value="">Add Destination</option>
										<option v-for="(item,index) in allCities" v-bind:value="index">
											{{item.city_name}}
										</option>
									</select>
								</div>
								<div class=" select-start-date col-md-8" style="margin-bottom: 8px; justify-content: center;" v-if="destinationIndex !== 0">
									<input type='text' readonly name="start_date" id="start-date-picker"
									       class="form-control " v-model="destination.start_date"
									       placeholder="Pick up date"/>
								</div>
								<div class="select-end-date col-md-8" v-if="destinationIndex !== 0">
									<DatePicker editable v-model="endDatePicked" v-on:change="updateNights()"
									            placeholder="End Date" type="date" format="dd-MM-yyyy" lang="en"
									            style="max-width: 100% !important; padding: 0;">
									</DatePicker>
								</div>
								<div class=" select-end-date col-md-8" v-if="destinationIndex !== 0">
									<input type='text' readonly name="no_of_nights" id="no-of-nights"
									       class="form-control" placeholder="No of nights"
									       v-model="destination.no_of_nights"/>
								</div>
							</div>
							<div class="display-flex flex-direction-column align-items-start justify-content-start"
							     style="text-align: center; max-height: 400px; overflow: scroll;">
								<!--<div style="width: 76%;">
									<h5>
										<em>
											THIS IS WHAT IS ON YOUR WAY TO
											<strong>
												@{{ addOnCities.current_city_name }}
											</strong>
											LET OUR DRIVERS KNOW WHICH ONE YOU WANT TO VISIT AT NOT EXTRA COST
										</em>
									</h5>
								</div>
								<div style="width: 76%;">
									<h3 style="font-weight: bold;">
										WANT TO STOP AND VISIT AROUND YOU FOR FREE?
									</h3>
									<h5>
										<em>
											PLEASE ADD DESTINATION TO CONTINUE
										</em>
									</h5>
								</div>-->
								
								<div class="" style="width: 100%;" v-if="addOnCities.length !== 0">
									<div class="display-flex flex-direction-column" style="width: 100%;">
										<div class="display-flex align-items-center center-justify-content"
										     style="margin-bottom: 24px;">
											<div class="add-on-cities-header"
											     style="display:flex; flex-wrap:wrap; justify-content: center;">
												<!--<add-on-cities v-for="(items, index) in addOnCities.add_on_cities" v-bind:names="items" v-bind:i="index" v-bind:destination="destination"></add-on-cities>-->
												<span class="add-on-span is-card"
												      style="position: relative; margin-right: 8px; padding: 9px; padding-right: 24px; width: 400px;"
												      v-for="(items, index) in addOnCities" v-bind:class="[items.selected === 1 ? 'primary-background-color':'']">
													<a href="javascript:void(0)" class="activated-link "
													   v-on:click="setAddOnCity(index, items.city_name)"  v-bind:class="[items.selected === 1 ? 'color-white':'primary-color']">
														{{ items.city_name }}
													</a>
													<!--<a class="selected-link primary-color" style="display: none;" href="javascript:void(0)">
														{{ items.city_name }}
													</a>-->
													<span class="selected"
													      style="cursor: pointer; padding: 0 8px;position: absolute;right: -1px;top: 9px; ">
														<i class="material-icons" style="font-size: 12px;color: white;"
														   v-on:click="deleteAddOnCity(index)">
															cancel
														</i>
													</span>
											</span>
											</div>
										</div>
									</div>
								</div>
								<div v-else>
									<div>
										<em>No Add on city found</em>
									</div>
								</div>
							
							
							</div>
							<!--<button type="submit" class="btn btn-primary" style="width: 40%;">Add Destination</button>-->
							
							<!--</form>-->
						</div>
						<div class="modal-footer custom-modal-footer"
						     style="width: 100%; display: flex; justify-content: center;">
							<button type="submit" class="btn btn-primary" style="width: 40%;">
								<span v-if="destinationIndex === 'none'">Add </span>
								<span v-else>Update </span>
								<span v-if="destinationIndex === 0">trip start city</span>
								<span v-else>destination</span>
							</button>
						</div>
					</form>
				</div>
			</div>
			<addon-alert-modal @changeDestination="changeDestination" v-bind:addOnIndex="addOnIndex"
			                   v-bind:addOnCities="addOnCities" v-bind:destination="destination" :allCities="allCities"
			                   :selectedCity="selectedCity" v-if="showAddOnPopup" @close="showAddOnPopup = false">
			</addon-alert-modal>
		</div>
	</transition>
</template>

<script>
	import swal from 'sweetalert2';
	import DatePicker from 'vue2-datepicker';
	
	export default {
		components: {
			DatePicker
		},
		name: "RouteModalComponent",
		props: ['destination', 'allCities', 'destinationIndex'],
		data() {
			return {
				//startDate: this.destination.start_date,
				endDatePicked: '',
				selectedCity: this.destinationIndex === 'none' ? '' : this.allCities.map(function (e) {
					return e.id
				}).indexOf(this.destination.city.id),
				destinationList: [],
				addOnCities: [],
				showAddOnPopup: false,
				addOnIndex: ''
			}
		},
		mounted() {
			this.fetchAddOnCities();
			this.endDatePicked = this.destinationIndex === 'none' ? '' : new Date(this.$root.$refs.modifyroute.routeDetails.cities[this.destinationIndex].end_date.split('-').reverse());
		},
		methods: {
			fetchAddOnCities: function (event) {
				if (this.destinationIndex !== 0 && this.selectedCity !== '') {
					let previousCityId = 0;
					if (this.destinationIndex === 'none') {
						previousCityId = this.$root.$refs.modifyroute.routeDetails.cities[this.$root.$refs.modifyroute.routeDetails.cities.length - 1].city.id;
					}
					else {
						previousCityId = this.$root.$refs.modifyroute.routeDetails.cities[this.destinationIndex - 1].city.id;
					}
					
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					axios.get('/fetch-add-on-cities/' + previousCityId + '/' + this.allCities[this.selectedCity].id)
						.then((response) => {
							if (response.data == 'error') {
								swal({
									title: 'Select different place',
									type: 'warning',
									allowOutsideClick: false
								});
							}
							else {
								let selectedAddOn = this.destination.add_on_cities;
								this.addOnCities = response.data.add_on_cities;
								this.addOnCities.forEach(function (item, index) {
									var check = selectedAddOn.map(function (e) {
										return e.id
									}).indexOf(item.id);
									if (check == -1){
										item.selected = 0;
									}
									else {
										item.selected = 1;
									}
								});
							}
						});
				}
			},
			setAddOnCity: function (index) {
				this.addOnIndex = index;
				this.showAddOnPopup = true;
			},
			deleteAddOnCity: function (index) {
				this.addOnCities[index].selected = 0;
				this.destination.add_on_cities.splice(index, 1);
			},
			updateNights: function () {
				let startDateArray = this.destination.start_date.split("-");
				let startDate = new Date(startDateArray[2], startDateArray[1] - 1, startDateArray[0]);
				if (this.endDatePicked === '') {
					this.destination.no_of_nights = 1;
				} else {
					this.destination.no_of_nights = Math.floor((this.endDatePicked.getTime() - startDate.getTime()) / (1000 * 60 * 60 * 24));
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
			calculateDistancePriceTime: function () {
				if (this.destinationIndex !== 0) {
					let previousCityId = 0;
					if (this.destinationIndex === 'none') {
						previousCityId = this.$root.$refs.modifyroute.routeDetails.cities[this.$root.$refs.modifyroute.routeDetails.cities.length - 1].city.id;
					}
					else {
						previousCityId = this.$root.$refs.modifyroute.routeDetails.cities[this.destinationIndex - 1].city.id;
					}
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					axios.get('/calculate-distance-price-time/' + previousCityId + '/' + this.allCities[this.selectedCity].id)
						.then((response) => {
							if (response.data == 'error') {
								swal({
									title: 'Select different place',
									type: 'warning',
									allowOutsideClick: false
								});
							}
							else {
								//this.addOnCities = response.data.add_on_cities;
								this.destination.distance = response.data.distance;
								this.destination.price = response.data.price;
								this.destination.time = response.data.time;
							}
						});
				}
			},
			changeDestination: function (id) {
				this.selectedCity = this.allCities.map(function (e) {
					return e.id
				}).indexOf(id);
				this.fetchAddOnCities();
			}
		}
	}
	var state = {
		disabledDates: {
			to: new Date(2016, 0, 5), // Disable all dates up to start date
		}
	}
</script>

<style scoped>

</style>