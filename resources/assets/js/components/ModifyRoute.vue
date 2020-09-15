<template>
    <div class="trip-plan-container">
        <div class="trip-planner">
            <div class="trip-planner-slider">
                <div class="swiper-container" style=" height: 441px; width:  100%;">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-wrapper" style="width: 100%">
                        <div class="swiper-slide"><img src="/assets/images/homepage.jpg" height="100%" width="100%" alt=""><p>{{ routeDetails.route_title }}</p></div>
                        <div class="swiper-slide"><img src="/assets/images/homepage3.jpg" height="100%" width="100%" alt=""><p>Havana</p></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                
                </div>
            </div>
        </div>
        
        <div class="detail-form">
            
            <div class="container planner-container force-display-flex">
                
                <div class="trip-details is-card display-flex">
                    <div class="trip-days">
                        <span> <time datetime="2014-09-20" class="icon">
                                
                                <strong>Days</strong>
                                  <span>{{ routeDetails.total_no_of_nights }}</span>
                                </time>
                        </span>
                    </div>
                    <div class="trip-details-text display-flex align-items-center">
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur consequuntur deserunt ea error ex explicabo facilis ipsum molestiae molestias nesciunt numquam optio, possimus quam qui quod sint sit tempora ut.</span>
                    </div>
                    <div class="trip-book display-flex align-items-center">
                        <div class="trip-price">
                            <span v-model="totalPrice">From ${{ totalPrice }}</span>
                            
                            <span v-if="routeDetails.user_id !== 'null'">
                                <a class="btn btn-primary primary-background-color hasLogin " :href="'/check-out/' + routeDetails.id"  v-on:click="check($event)">Book</a>
                            </span>
                            
                            <span v-else>
                                <a class="btn btn-primary primary-background-color " :href="'/check-out/' + routeDetails.id" v-on:click="check($event)">Book</a>
                            </span>
                            
                        </div>
                    </div>
                </div>
                <form class="trip-planner-form force-display-flex space-between" style="width: 100%;">
                    <div class="planner">
                        <div class="routes-list is-card">
                            <div class="container-fluid route-list-container display-flex flex-direction-column space-between align-items-center full-height">
                                <div class="add-destination-button full-width display-flex flex-start">
                                    <button type="button" id="show-modal" @click="prepareModal('none')" class="btn btn-primary primary-background-color border-radius-round" style="height: 36px; width: 138px; font-size: 13px;">
                                        <span style="font-weight: bold;">Add Destination</span>
                                    </button>
            
                                </div>
                                <div class="destinations full-width full-height" style="position: relative;">
                                    <div class="line full-height"></div>
                                    <div class="places display-flex flex-direction-row align-items-center flex-end" v-for="(items, index) in routeDetails.cities" v-model="routeDetails">
                                        <div class="places-container display-flex flex-direction-row align-items-start " style="height: auto;">
                                            <div class="location-sign" style="height: auto;">
                                                <!--<div class="line full-height"></div>-->
                                                <div class="image display-flex align-items-center center-justify-content">
                                                    <i class="material-icons place-location-icon">location_on</i>
                                                </div>
                                            </div>
                                            <div class="display-flex flex-direction-column full-width">
                                                <div class="place-name display-flex" style="justify-content: space-between; align-items: center;">
                                                    <span>{{ items.city.name }}</span>
                                                </div>
                                                <div class="routes-action display-flex align-items-center flex-wrap" style="justify-content: space-between;" v-if="index !== 0">
                                                    <div style="display: flex; align-items: center;">
                                                        <span class="place-night-stay" style="display: flex; align-items: center;">
                                                            <i class="material-icons">
                                                                brightness_4
                                                            </i>
                                                            {{ items.no_of_nights }} <span v-if="items.no_of_nights === 1"> Night</span><span v-else> Nights</span>
                                                        </span>
                                                        <span class="place-distance" style="display: flex; align-items: center;">
                                                            <i class="material-icons">
                                                                directions_car
                                                            </i>
                                                            {{ Math.round(items.distance) }} Km
                                                        </span>
                                                        <span class="price" style="display: flex; align-items: center;">
                                                            <i class="material-icons">
                                                                account_balance_wallet
                                                            </i>
                                                            ${{ items.price }}
                                                        </span>
                                                        <span class="place-travel-time" style="display: flex; align-items: center;">
                                                            <i class="material-icons">
                                                                timer
                                                            </i>
                                                            {{ Math.round(items.time) }} Hrs
                                                        </span>
                                                    </div>
                                                    <div style="display: flex; align-items: center;">
                                                        <i class="material-icons" style="cursor: pointer;" @click="prepareModal(index)">
                                                            mode_edit
                                                        </i>
                                                        <i class="material-icons" style="cursor: pointer;" @click="prepareDeleteModal(index)">
                                                            delete
                                                        </i>
                                                    </div>
                                                </div>
                                                <div v-else>
                                                    <span><em>Your trip starts here</em></span>
                                                </div>
                                                <div  class="display-flex align-items-center" style="width: 100%; overflow-x: auto; flex-wrap: wrap;">
                                                    <span v-if="items.hasOwnProperty('add_on_cities') && items.add_on_cities.length !=0">Add on city(s) : </span> <div v-for="(index, item) in items.add_on_cities" style="font-size: 16px; font-weight: bold;"> {{index.city_name}}<span v-if="item != items.add_on_cities.length-1">, </span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <route-modal :destination="destination" :allCities="allCities" :destinationIndex="destinationIndex" v-if="showModal" @close="showModal = false">
                            
                            </route-modal>
                            <delete-destination-alert-modal :messageText="messageText" :deleteIndex="deleteIndex" v-if="deleteDestinationAlertModal" @close="deleteDestinationAlertModal = false">
                            
                            </delete-destination-alert-modal>
                        </div>
                    </div>
                    
                    <div class="details is-card display-flex flex-direction-column align-items-center ">
                        <div class="container full-width display-flex flex-direction-column space-around full-height details-container">
                            <!--<div class="book-price-container full-width display-flex align-items-center space-between">
                                <div class="book-price"><span>Total Price : ${{ routeDetails.total_price }}</span></div>
                                
                                <div class="book-button" v-if="routeDetails.user_id !== 'null'"><a class="btn btn-primary primary-background-color hasLogin" href="/check-out" v-on:click="check($event)">Book</a></div>
                                
                                <div class="book-button" v-else><a class="btn btn-primary primary-background-color" href="/check-out" v-on:click="check($event)">Book</a></div>
                                
                            </div>-->
                            <div class="display-flex full-width space-between select-vehicle-heading flex-wrap">
                                <h4 style="text-align: left; font-weight: bold;">Select Vehicle : {{ vehicle }}</h4>
                                <i class="material-icons edit vehicle-edit" style="margin-top: 7px; cursor: pointer;">mode_edit</i>
                                <div class="add-vehicle-type full-width text-center display-flex align-items-center space-evenly">
                                    <i class="material-icons">directions_car</i>
                                    <select name="" class="selectpicker" style="width: 40%;" v-model="vehicle" @change="changeVehicle()">
                                        <option disabled value="">Please select one</option>
                                        <option v-for="(item, index) in vehicleList" v-bind:value="item">{{ item }}</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="display-flex full-width space-between flex-wrap select-travellers-heading">
                                <h4 style="text-align: left; width: auto; font-weight: bold;">No of people : {{ routeDetails.total_travellers }} <span v-if="routeDetails.total_travellers === 1"> Traveller</span><span v-else> Travellers</span>
                                </h4><i class="material-icons edit traveller-edit" style="margin-top: 7px; cursor: pointer;">mode_edit</i>
                                <div class="traveller-number display-flex-center full-width">
                                    <div class="select-traveller display-flex-center">
                                        <table style="width: 80%;">
                                            <tr>
                                                <td>
                                                    <div class="adultsAdd display-flex-center space-evenly">
                                                        <i class="material-icons adultsRemove" v-on:click="decrease(adults)">
                                                            remove
                                                        </i>
                                                        <span v-model="adults">
                                                            {{ adults }}
                                                        </span>
                                                        <i class="material-icons adultsAdd" v-on:click="increase(adults)">
                                                            add
                                                        </i>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="display-flex full-width space-between flex-wrap select-travellers-heading">
                                <!--<h4 style="text-align: left; width: auto; font-weight: bold;">
                                    <span>Trip start city : </span>
                                    <span>{{ routeDetails.cities[0].city.name }}</span>
                                    <span>
                                        <select name="" class="form-control" id="destination_select"
                                                style=" font-weight: bold;"
                                                v-on:change="fetchAddOnCities(); calculateDistancePriceTime();"
                                                v-model:selected="selectedCity">
                                            <option value="">Add Destination</option>
                                            <option v-for="(item,index) in allCities" v-bind:value="index">
                                                {{item.city_name}}
                                            </option>
                                        </select>
                                    </span>
                                </h4>-->
                                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                                    <div style="display: flex; justify-content: space-between; align-items: center;">
                                        <span>
                                            <h4 style="text-align: left; width: auto; font-weight: bold;">
                                                Trip start city :
                                            </h4>
                                        </span>
                                        <span v-if="firstCityIndex === true">
                                            <select name="" class="form-control" id="destination_select"
                                                    style=" font-weight: bold;"
                                                    @change="updateStartCity(0)"
                                                    v-model="selectedfirstCity">
                                                <option value="">Add Destination</option>
                                                <option v-for="(item,index) in allCities" v-bind:value="index">
                                                    {{item.city_name}}
                                                </option>
                                            </select>
                                        </span>
                                        <span v-else>
                                            <h4 style="text-align: left; width: auto; font-weight: bold;">
                                                {{ routeDetails.cities[0].city.name }}
                                            </h4>
                                        </span>
                                    </div>
                                    <span>
                                        <i class="material-icons" style="cursor: pointer;" @click="editStartCity(0)">mode_edit</i>
                                    </span>
                                </div>
                            </div>
                            <div class="display-flex flex-wrap" style="justify-content: space-between; align-items: center;">
                                <div class="select-start-date">
                                    <date-picker ref="startpicker" :startDate="routeDetails.start_date"></date-picker>
                                </div>
                                <div class=" select-end-date">
                                    <span>
                                        <strong>
                                            End Date:
                                        </strong>
                                        <span v-model="tripEndDate">
                                            {{ routeDetails.end_date.split('-').reverse().join('-') }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="display-flex flex-wrap" style="align-items: center;">
                                <div class="pick-up-airport" style="padding: 0;">
                                    <label class="container airport-pickup-label"><span>Airport Pickup</span>
                                        <input type="checkbox" class="airport-checkbox" name="airport_pickup" v-model="routeDetails.airport_pickup" v-on:change="toggleAirportPickup">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <calendar-view ref="calendar" :routeDetails="routeDetails"></calendar-view>
                            <google-map ref="googleMap" :routeDetails="routeDetails"></google-map>
                        </div>
                    </div>
                </form>
                
                <div class="custom-slider">
                    <div class="swiper-button-prev prev" style=""></div>
                    <div class="swiper-container1" style=" height: 440px; width:  100%; overflow: hidden;">
                        <div class="swiper-wrapper" style="width: 100%">
                            <div class="swiper-slide"><img src="/assets/images/homepage.jpg" height="100%" width="100%" alt=""></div>
                            <div class="swiper-slide"><img src="/assets/images/homepage.jpg" height="100%" width="100%" alt=""></div>
                            <div class="swiper-slide"><img src="/assets/images/homepage.jpg" height="100%" width="100%" alt=""></div>
                            <div class="swiper-slide"><img src="/assets/images/homepage.jpg" height="100%" width="100%" alt=""></div>
                            <div class="swiper-slide"><img src="/assets/images/homepage.jpg" height="100%" width="100%" alt=""></div>
                            <div class="swiper-slide"><img src="/assets/images/homepage.jpg" height="100%" width="100%" alt=""></div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next next" ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	//import swal from 'sweetalert2';
    export default{
    	props: ['routeDetails', 'allCities'],
        data(){
            return{
                routes: [],
	            destination: {
		            city: {
			            id: '',
			            name: '',
                        latitude: '',
                        longitude: '',
                        placeId: ''
		            },
		            no_of_nights: '',
		            start_date: '',
		            end_date: '',
		            add_on_cities: [],
                    distance: '',
                    price: '',
                    time: ''
	            },
                showModal: false,
                vehicleList: ['Car', 'Special', 'Van'],
                toggleAirport: 0,
                destinationIndex: '',
                deleteDestinationAlertModal: false,
                messageText: '',
                deleteIndex: '',
                firstCityIndex: false,
	            selectedfirstCity: '',
	            tripEndDate: this.routeDetails.end_date,
                totalPrice: this.routeDetails.total_price,
	            vehicle: '',
	            adults: ''
            }
        },
        mounted() {
    		this.vehicle = this.routeDetails.vehicle_type;
    		this.adults = this.routeDetails.total_travellers;
        },
        methods: {
	        prepareModal: function(parameter){
		        if(parameter === 'none'){
			        this.destination.start_date = this.routeDetails.cities[this.routeDetails.cities.length-1].end_date;
			        /*this.destination.city.id = '';
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
			        this.destination = JSON.parse(JSON.stringify(this.routeDetails.cities[parameter]));
		        }
		        this.destinationIndex = parameter;
		        this.showModal = true;
	        },
            prepareDeleteModal: function(index) {
	        	this.deleteIndex = index;
	        	this.deleteDestinationAlertModal = true;
	            if (index + 1 in this.routeDetails.cities) {
		            this.messageText = 'If you delete this destination then your next destination\'s add on cities will be removed'
	            }
	            else {
		            this.messageText = '';
	            }
            },
	        toggleAirportPickup: function(){
		        let that = this;
		        if (this.routeDetails.airport_pickup === true) {
			        this.totalPrice = this.totalPrice + 25;
                }
                else {
			        this.totalPrice = this.totalPrice - 25;
                }
		        $.ajaxSetup({
			        headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
		        });
		        let uri = '/toggle-airport/' + this.$root.$refs.modifyroute.routeDetails.id;
		        axios.post(uri, this.$root.$refs.modifyroute.routeDetails)
                    .then(function(response){
			        if(response.data == 'ok'){
				        /*let id = window.location.href.split('/');
				        let route_id = id[id.length-1];
				        app.$refs.route.fetchPlaces(route_id);*/
				
			        }else{
				        swal({
					        title: 'No route found',
					        type: 'error',
					        allowOutsideClick: false
				        })
			        }
		        });
	        },
	        editStartCity: function (index) {
		        this.firstCityIndex = true;
		        this.selectedfirstCity = this.allCities.map(function (e) {
			        return e.id
		        }).indexOf(JSON.parse(JSON.stringify(this.routeDetails.cities[index].city.id)));
	        },
	        updateStartCity: function (index) {
		        this.firstCityIndex = false;
		        let id = this.allCities[this.selectedfirstCity].id;
		        let name = this.allCities[this.selectedfirstCity].city_name;
		        let latitude = this.allCities[this.selectedfirstCity].latitude;
		        let longitude = this.allCities[this.selectedfirstCity].longitude;
		        let placeId = this.allCities[this.selectedfirstCity].place_id;
		        this.routeDetails.cities[index].city.id = this.allCities[this.selectedfirstCity].id;
		        this.routeDetails.cities[index].city.name = this.allCities[this.selectedfirstCity].city_name;
		        this.routeDetails.cities[index].city.latitude = this.allCities[this.selectedfirstCity].latitude;
		        this.routeDetails.cities[index].city.longitude = this.allCities[this.selectedfirstCity].longitude;
		        this.routeDetails.cities[index].city.placeId = this.allCities[this.selectedfirstCity].placeId;
		        this.$root.$refs.modifyroute.routeDetails.route_title = '';
		        for (let i = 0; i < this.$root.$refs.modifyroute.routeDetails.cities.length; i++) {
			        if (i === this.$root.$refs.modifyroute.routeDetails.cities.length - 1) {
				        this.$root.$refs.modifyroute.routeDetails.route_title += this.$root.$refs.modifyroute.routeDetails.cities[i].city.name;
			        }
			        else {
				        this.$root.$refs.modifyroute.routeDetails.route_title += this.$root.$refs.modifyroute.routeDetails.cities[i].city.name + ' - ';
			        }
		        }
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
	        },
	        changeVehicle: function () {
		        this.$root.$refs.modifyroute.routeDetails.vehicle_type = this.vehicle;
		        let uri = '/update-route/' + this.$root.$refs.modifyroute.routeDetails.id;
		        axios.post(uri, this.$root.$refs.modifyroute.routeDetails)
                    .then(function(response){
			        if(response.data == 'ok'){
				        /*let id = window.location.href.split('/');
				        let route_id = id[id.length-1];
				        app.$refs.route.fetchPlaces(route_id);*/
				
			        }else{
				        swal({
					        title: 'No route found',
					        type: 'error',
					        allowOutsideClick: false
				        })
			        }
		        })
	        },
	        increase: function(){
	        	if (this.adults > 0) {
			        this.adults++;
			        this.$root.$refs.modifyroute.routeDetails.total_travellers = this.adults;
                }
		        let uri = '/update-route/' + this.$root.$refs.modifyroute.routeDetails.id;
		        $.ajaxSetup({
			        headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
		        });
		        axios.post(uri, this.$root.$refs.modifyroute.routeDetails).then(function (response) {
			        if (response.data == 'error') {
				        swal({
					        title: 'Your changes could not be saved',
					        type: 'error',
					        allowOutsideClick: false
				        });
			        }
		        });
	        },
	        decrease: function(){
		        if(this.adults > 1){
			        this.adults--;
			        this.$root.$refs.modifyroute.routeDetails.total_travellers = this.adults;
			        let uri = '/update-route/' + this.$root.$refs.modifyroute.routeDetails.id;
			        $.ajaxSetup({
				        headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        }
			        });
			        axios.post(uri, this.$root.$refs.modifyroute.routeDetails).then(function (response) {
				        if (response.data == 'error') {
					        swal({
						        title: 'Your changes could not be saved',
						        type: 'error',
						        allowOutsideClick: false
					        });
				        }
			        });
		        }
		
	        }
        }
    }
</script>