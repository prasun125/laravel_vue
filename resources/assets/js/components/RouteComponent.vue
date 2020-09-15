<template>
    <div class="routes-list is-card">
        <div class="container-fluid route-list-container display-flex flex-direction-column space-between align-items-center full-height">
            <div class="add-destination-button full-width display-flex flex-start">
                <button type="button" id="show-modal" @click="showModal = true; prepareModal('none')" class="btn btn-primary primary-background-color border-radius-round" style="height: 36px; width: 138px; font-size: 13px;">
	                <span style="font-weight: bold;">Add Destination</span>
                </button>

            </div>
            <div class="destinations full-width full-height" style="position: relative;">
                <div class="line full-height"></div>
            <div class="places display-flex flex-direction-row align-items-center flex-end" v-for="(items, index) in route.data">

                <!--<div class="plus" v-if="index !== route.data.length-1"><i class="material-icons">add</i></div>-->

                <div class="places-container display-flex flex-direction-row align-items-start " style="height: auto;">
                    <div class="location-sign" style="height: auto;">
                        <!--<div class="line full-height"></div>-->
                        <div class="image display-flex align-items-center center-justify-content">
                            <i class="material-icons place-location-icon">location_on</i>
                        </div>

                    </div>
                    <div class="display-flex flex-direction-column full-width">
                    <div class="place-name display-flex" style="justify-content: space-between; align-items: center;">
                        <span>{{ items.city_name }}</span>
                        <i class="material-icons edit" style="cursor: pointer;" v-on:click="editFirstCityName($event, index)" v-if="items.havana_added_by === 'first_city'">mode_edit</i>
                    </div>

                    <div class="routes-action display-flex align-items-center flex-wrap" v-if="index !== 0">
                        <span class="place-night-stay"><i class="material-icons">brightness_4</i>{{ items.number_of_nights }} Nights</span>
                        <span class="place-distance"><i class="material-icons">directions_car</i>{{ Math.round(items.distance/100)/10 }} Km </span>
                        <span class="price"><i class="material-icons">account_balance_wallet</i>${{ items.price }}</span>
                        <span class="place-travel-time"><i class="material-icons">timer</i>{{ Math.floor(items.time / 3600) }} Hrs</span>
                        <i class="material-icons edit" @click="showModal = true; prepareModal(index)">mode_edit</i>
                        
                    </div>
                    <div v-else>
                        <span><em>Your destination starts here</em></span>
                    </div>
                        <div  class="display-flex align-items-center" style="width: 100%; overflow-x: auto; flex-wrap: wrap;">
                           <span v-if="items.hasOwnProperty('add_on_cities') && items.add_on_cities.length !=0">Add on city(s) : </span> <div v-for="(index, item) in items.add_on_cities" style="font-size: 16px; font-weight: bold;">{{index.city_name}}<span v-if="item != items.add_on_cities.length-1">,</span></div>
                        </div>
                        <div class=" edit-form full-width space-between display-flex align-items-center flex-wrap" id="edit-first-city-name" v-if=" index == edit">
                            <div class="edit-form-input col-md-4">
                                <input type="text" readonly v-model="items.start_date" class="form-control">
                                <select name="" class="form-control" style=" font-weight: bold;">
                                    <!--<option v-for="item in destinationList" v-bind:city="item" is="destination-list"></option>-->
                                    <option v-for="item in city" :value="item.id">
                                        {{item.city_name}}
                                    </option>
                                </select>
                            </div>
                            <!--<div class="edit-form-input col-md-4">
                                <DatePicker editable placeholder="End date" type="date" format="dd-MM-yyyy" v-model="items.end_date" v-on:change="calculateNight(items.start_date, index)"  lang="en" class="col-md-4" style="max-width: 100% !important; padding: 0;"></DatePicker>
                            </div>
                            <div class=" edit-form-input col-md-4">
                                <input type="text" readonly class=" form-control" id="edit_form_no_of_nights" v-model="route.data[index].number_of_nights">
                            </div>
                            <div class="checkbox edit-form-checkbox">
                            </div>
                            <div class="display-flex delete-option flex-end full-width" v-if="index != 0">
                                <i class="material-icons delete">delete</i><a href="javascript:void(0)" v-on:click="deletePlace(index)">Delete Place</a>
                            </div>-->
                        </div>
                        <div class=" edit-form full-width space-between display-flex align-items-center flex-wrap" id="edit-form" v-if=" index == toggle">
                            <div class="edit-form-input col-md-4">
                                <input type="text" readonly v-model="items.start_date" class="form-control">
                            </div>
                            <div class="edit-form-input col-md-4">
                                <DatePicker editable placeholder="End date" type="date" format="dd-MM-yyyy" v-model="items.end_date" v-on:change="calculateNight(items.start_date, index)"  lang="en" class="col-md-4" style="max-width: 100% !important; padding: 0;"></DatePicker>
                            </div>
                            <div class=" edit-form-input col-md-4">
                                <input type="text" readonly class=" form-control" id="edit_form_no_of_nights" v-model="route.data[index].number_of_nights">
                            </div>
                            <div class="checkbox edit-form-checkbox">
                            </div>
                            <div class="display-flex delete-option flex-end full-width" v-if="index != 0">
                                <i class="material-icons delete">delete</i><a href="javascript:void(0)" v-on:click="deletePlace(index)">Delete Place</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <route-modal :destination="destination" v-if="showModal" @close="showModal = false">
            <option slot="destinations" v-for="item in destinationList" v-bind:names="item" is="destination-list"></option>
        </route-modal>
    </div>
</template>

<style>
    .edit-form-input{
        margin-bottom: 4px;
    }
    .mx-datepicker i{
        display: none;
    }
</style>

<script>
    import swal from 'sweetalert2';
    import DatePicker from 'vue2-datepicker';
    export default{
        components: {
            DatePicker
        },
	    props: ['routeId'],
        data(){
            return{
                route: [],
                toggle: -1,
                edit: -1,
                previous_index: '',
                value1: 'End Date',
                city: [],
                showModal: false,
	            destination: {
		            city: {
		            	id: '',
                        name: ''
                    },
		            no_of_nights: '',
		            start_date: '',
		            end_date: '',
		            add_on_cities: [],
	            },
	            previous_end_date: '',
	            destinationList: [],
            }
        },
        mounted(){
            //this.fetchPlaces(this.routeId);
            if(this.previous_end_date === "") {
            	this.previous_end_date = this.route.start_date;
            }
        },
        methods: {
            editToggle: function(event, id){
                if(this.toggle == id){
                    this.toggle = -1;
                }else{
                    this.toggle = id;
                }

            },
	        editFirstCityName: function(event, id) {
		        if(this.edit == id){
			        this.edit = -1;
		        }else{
			        this.edit = id;
		        }
		        let that = this;
		        axios.get('/get-all-cities', {
		        	
                }).then(function (response) {
                    console.log(response);
                    console.log(response.data);
			        that.$root.cities = response.data;
			        that.city = that.$root.cities;
			        console.log(that.$root.cities);
			        console.log(that.city);
		        });
            },
            fetchPlaces: function(parameter){
                let that = this;
                axios.get('/fetch-routes',{
                    params: {
                        q: parameter
                    }
                }).then(function(response){

                    if(response.data == 'Wrong'){
                        swal({
                            title: 'Wrong id entered',
                            type: 'warning'
                        }).then(function(result){
                            if(result.value){
                                window.history.back();
                            }
                        });
                    }else{
                        that.$root.routes = response.data;
                        that.$root.$refs.calendar.displayCalendar( that.$root.routes );
                        that.$root.$refs.travellers.adults = that.$root.routes.total_travellers;
                        that.$root.$refs.myPlans.fetchMyPlans();
                        that.$root.$refs.googleMap.displayMap( that.$root.routes );
                        that.route = that.$root.routes;
                        that.$root.$refs.startpicker.start_date = that.route.start_date;
                        that.$root.$refs.startpicker.end_date = that.route.end_date;
                        let id = window.location.href.split('/');
                        let route_id = id[id.length-1];
	                    that.fetchCities(route_id);
                    }

                });
            },
            saveOption: function(){
                let that = this;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                axios({
                    method: 'post',
                    url: '/update-route-cities',
                    data: this.route.data
                }).then(function(response){
                    if(response.data == 'error'){
                        swal({
                            title: "There is some problem. Please try again later",
                            type: "error",
                            allowOutsideClick: false
                        });
                    }
                    if(response.data == 'ok'){
                        let route_id = window.location.href.split('/');
                        let last_element = route_id[route_id.length - 1];
                        that.fetchPlaces(last_element);
                    }
                });
            },
            //Used to delete destinations
            deletePlace: function(parameter){
                let prev = this.route.data[parameter-1].city_id;
                let that = this;
                axios.post('/delete-places',{
                    data: this.route.data,
                    index: parameter,
                    previous_index: prev
                }).then(function(response){
                    if(response.data == 'ok'){
                        let route_id = window.location.href.split('/');
                        let last_element = route_id[route_id.length - 1];
                        that.fetchPlaces(last_element);
                        that.$root.routes = [];
                    }
                });
            },
	
	        prepareModal: function(parameter){
            	if(parameter == 'none'){
		            this.newDestination.start_date = this.previous_end_date;
                }
                else {
            		this.newDestination = this.route.data[parameter];
                }
            	
	            
            },
            //calculates number of nights in the edit form of places
            calculateNight: function(parameter, index){
                let d = new Date(this.route.data[index].end_date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                let date = [year, month, day].join('-');
                let d1 = new Date(parameter);
                let d2 = new Date(date);
                let timeDiff = d2.getTime() - d1.getTime();
                let DaysDiff = timeDiff / (1000 * 3600 * 24);
                if(DaysDiff<0){
                    swal({
                        title: 'End date should not less than start date',
                        type: 'warning',
                        allowOutsideClick: false
                    });
                }else {
                    this.route.data[index].number_of_nights = DaysDiff;
                    this.saveOption();
                }

            },
	        fetchCities: function(){
		        let that = this;
		        let id = window.location.href.split('/');
		        let route_id = id[id.length-1];
		        // console.log(route_id);
		        axios.get('/fetch-cities', {
			        params: {
				        q: route_id
			        }
		        }).then(function(response){
			        // console.log(response.data);
			        that.destinationList = response.data;
		        });
	        }
        }
    }
</script>