
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import swal from 'sweetalert2';
import axios from 'axios';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//

Vue.component('create-plan', require('./components/CreatePlan.vue'));
Vue.component('side-nav', require('./components/SideNavComponent.vue'));
Vue.component('middle-addon', require('./components/MiddleAddonComponent.vue'));
Vue.component('side-nav-map', require('./components/SideNavMap.vue'));
Vue.component('addon-alert-modal', require('./components/RouteAddOnComponent.vue'));
Vue.component('pickup-modal', require('./components/PickUpModalComponent.vue'));
Vue.component('departing-modal', require('./components/DepartingModalComponent.vue'));
Vue.component('arriving-modal', require('./components/ArrivingModalComponent.vue'));
Vue.component('dropoff-modal', require('./components/DropoffModalComponent.vue'));
Vue.component('route-edit-modal', require('./components/RouteEditModalComponent.vue'));
Vue.component('add-some-night-modal', require('./components/AddSomeNightModal.vue'));
Vue.component('booking-error-modal', require('./components/BookingErrorModalComponent.vue'));
Vue.component('enlarge-map', require('./components/EnlargeMap.vue'));

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('route-list', require('./components/RouteComponent.vue'));
Vue.component('modify-route', require('./components/ModifyRoute.vue'));
Vue.component('calendar-view', require('./components/TripCalendar.vue'));
Vue.component('google-map', require('./components/map.vue'));
Vue.component('my-plans', require('./components/MyPlans.vue'));
Vue.component('date-picker', require('./components/datePicker.vue'));
Vue.component('route-modal', require('./components/RouteModalComponent.vue'));

Vue.component('delete-destination-alert-modal', require('./components/DeleteDestinationAlertModal.vue'));


Vue.component('destination-list',{
    props: ['names', 'newDestination'],
    template: '<option v-bind:value="names.id">{{ names.city_name }}</option>',
    data(){
      return{
          data: this.$root.destinationList,
      }
    }
});

Vue.component('add-on-cities',{
    props: ['names', 'i','newDestination'],
});

const app = new Vue({
    el: '#app',
    mounted(){
    
    },

    data:{
        destinationList: [],
        vehicleList: [
            {
                id: '1',
                vehicle_type: 'car'
            },
            {
                id: '2',
                vehicle_type: 'Truck'
            },
            {
                id: '3',
                vehicle_type: 'Xuv'
            },
            {
                id: '4',
                vehicle_type: 'Bus'
            }
        ],
        adults: 1,
        teen: 0,
        kids: 0,

        routes:[],
        userDetails:{
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            password_confirm: '',
            role: 'Authenticated User'
        },
        userLogin: {
            email: '',
            password: '',
            redirect_path: ''
        },
        
        dates: {
           start_date: '',
           end_date: ''
        },
        plans: [],
        searchBarTravellers: 0,
        addOnCities: [],
        addOnCityList: [],
	    showModal: false
        // finalAddOnCities: []
    },
    methods: {
        register: function(event){
            event.preventDefault();
            let path = $('#path').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            axios.post('/registration', this.userDetails).then(function (resp) {
                // console.log(resp.error);
                // console.log(resp.data);
                if(resp.data == 1){
                    swal({
                        title: 'Successfully Registered',
                        type: 'success',
                        allowOutsideClick: false
                    }).then(function(result){
                        if(result.value){
                            $('#register-form-close').trigger('click');
                            $('#login-link').trigger('click');
                        }
                    });
                }else{
                    if(resp.data.error.hasOwnProperty('email')) {
                        if (resp.data.error.email != '') {
                            document.getElementById('email-error').innerHTML = '<strong>' + resp.data.error.email + '</strong>';
                        } else {
                            document.getElementById('email-error').innerHTML = '';
                        }
                    }else{
                        document.getElementById('email-error').innerHTML = '';
                    }
                    if(resp.data.error.hasOwnProperty('password')) {
                        if (resp.data.error.password != '') {
                            document.getElementById('password-error').innerHTML = '<strong>' + resp.data.error.password + '</strong>';
                        } else {
                            document.getElementById('password-error').innerHTML = '';
                        }
                    }else{
                        document.getElementById('password-error').innerHTML = '';
                    }
                }
            }).catch(function (error) {
                console.log(error);
            });
        },
        login: function(event){
            event.preventDefault();
            let path = $('#login-path').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            axios.post('/login', this.userLogin).then(function (resp) {
                if(resp.data.code == 1){
                    window.location.href = '/admin/dashboard';
                }else if(resp.data.code == 2){
                    if(resp.data.hasOwnProperty('path')){
                        window.location.href = resp.data.path;
                    }else{
                        $('.login-close').trigger('click');
                        window.location.reload();
                    }


                }else {
                    if (resp.data.error != '') {
                        document.getElementById('help-block').innerHTML = '<strong>' + resp.data.error + '</strong>';
                    }
                }
            }).catch(function (error) {
                console.log(error);
            });

        },
        hasLogin: function(){
            $('#login-link').trigger('click');
        },
	    setAddOnCity: function(parameter, event) {
        	console.log(parameter);
		    let that = this;
		    $.ajaxSetup({
			    headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
		    });
		    let path = window.location.href.split('/');
		    let id = path[path.length-1];
		    console.log(id);
		    this.newDestination.route_id = id;
		    if (that.newDestination.add_on_city_list.length == 0) {
			    axios.post('/display-add-on-cities-popup', {
				    current_add_on_city_id: parameter,
			    }).then(function (response) {
				    swal({
					    // title: response.data[0].city_name,
					    html: '<div class="display-flex">' +
					    '<div><img src="' + window.location.origin + '/admin/assets/images/cities/' + response.data.city_details[0].file_path + '" height="100" width="100" alt=""></div>' +
					    '<div><p style="font-size: 14px;">' + response.data.city_details[0].city_name + '</p>' +
					    '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, hic.</p>' +
					    '</div>' +
					    '</div>',
					    allowOutsideClick: false,
					    showCloseButton: true,
					    showCancelButton: true,
					    confirmButtonColor: '#00a680',
					    cancelButtonColor: '#00a680',
					    confirmButtonText: 'Stay Here',
					    cancelButtonText: 'Few more houres'
				    }).then(function (result) {
				    	console.log(result);
					    if (result.value) {
						    that.newDestination.destination = response.data.city_details[0].city_id;
						    that.fetchAddOnCities();
					    } else if (result.dismiss === 'cancel') {
						    that.newDestination.add_on_city_list.push(response.data.city_details[0].city_id);
						    that.newDestination.final_add_on_cities.push({ from_city_id: that.newDestination.previous_city_id, to_city_id: that.newDestination.destination, city_id: response.data.city_details[0].city_id, priority: that.newDestination.add_on_city_list.length });
						    $(event.target.parentElement).find('span').show();
						    $(event.target.parentElement).find('.selected-link').show();
						    $(event.target.parentElement).find('.activated-link').hide();
						    $(event.target.parentElement).addClass('primary-background-color');
						    $(event.target.parentElement).find('a').css('color', 'white');
					    }
				    });
			    });
		    } else {
			    let stat = 0;
			    for (let i = 0; i < that.newDestination.add_on_city_list.length; i++) {
				    if (that.newDestination.add_on_city_list[i] == parameter) {
					    stat = 1;
				    }
			    }
			    if (stat == 1) {
				    swal({
					    title: 'You have already added the place',
					    type: 'warning',
					    allowOutsideClick: false
				    });
			    } else {
				    axios.post('/display-add-on-cities-popup', {
					    current_add_on_city_id: parameter,
					    place_details: this.newDestination
				    }).then(function (response) {
					    if (response.data.status == true) {
						    that.newDestination.add_on_city_list.push(response.data.city_details[0].city_id);
					    }
					    swal({
						    html: '<div class="display-flex">' +
						    '<div><img src="' + window.location.origin + '/admin/assets/images/cities/' + response.data.city_details[0].file_path + '" height="100" width="100" alt=""></div>' +
						    '<div><p style="font-size: 14px;">' + response.data.city_details[0].city_name + '</p>' +
						    '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, hic.</p>' +
						    '</div>' +
						    '</div>',
						    allowOutsideClick: false,
						    showCloseButton: true,
						    showCancelButton: true,
						    confirmButtonColor: '#00a680',
						    cancelButtonColor: '#00a680',
						    confirmButtonText: 'Stay Here',
						    cancelButtonText: 'Few more hours'
					    }).then(function (result) {
						    if (result.value) {
							    that.newDestination.destination = response.data.city_details[0].city_id;
							    that.fetchAddOnCities();
						    } else if (result.dismiss === 'cancel') {
							    that.newDestination.final_add_on_cities.push({ from_city_id: that.newDestination.previous_city_id, to_city_id: that.newDestination.destination, city_id: response.data.city_details[0].city_id, priority: that.newDestination.add_on_city_list.length });
							    $(event.target.parentElement).find('span').show();
							    $(event.target.parentElement).find('.selected-link').show();
							    $(event.target.parentElement).find('.activated-link').hide();
							    $(event.target.parentElement).addClass('primary-background-color');
							    $(event.target.parentElement).find('a').css('color', 'white');
						    }
					    });
				    });
			    }
		    }
	    },
        check: function(event){
            event.preventDefault();
            let link = event.target.href;
            let route_id = window.location.href.split('/');
            let id = route_id[route_id.length-1];
            this.userLogin.redirect_path = link+'/'+id;
            if(this.routes.data.length > 1){
                if($(event.target).hasClass('hasLogin')){
                    window.location.href = link+'/'+id;
                }else{
                    $('#login-link').trigger('click');
                }
            }else{
                swal({
                    title: 'You have to select more than one city to proceed to booking.',
                    type: 'warning',
                    allowOutsideClick: false
                });
            }
        },
        saveDate: function(){
            // cosole.log('hi');
        },
        toggleAirportPickup: function(){
            let that = this;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            axios.post('/save-details', this.routes).then(function(response){
                if(response.data == 'ok'){
                    let id = window.location.href.split('/');
                    let route_id = id[id.length-1];
                    app.$refs.route.fetchPlaces(route_id);

                }else{
                    swal({
                        title: 'No route found',
                        type: 'error',
                        allowOutsideClick: false
                    })
                }
            })

        },

        travellersCheck: function(){
            let selectObject = document.getElementById("sel2").getElementsByTagName("option");
            if(this.searchBarTravellers <= 4){
                selectObject[0].disabled = true;
                selectObject[1].selected = true;
                selectObject[1].disabled = false;
                selectObject[2].disabled = false;
                selectObject[3].disabled = false;
                $('#sel2').selectpicker('render');
            }
            if(this.searchBarTravellers >4 && this.searchBarTravellers <= 6){
                selectObject[0].disabled = true;
                selectObject[1].disabled = true;
                selectObject[2].selected = true;
                selectObject[2].disabled = false;
                $('#sel2').selectpicker('render');

            }
            if(this.searchBarTravellers > 6 && this.searchBarTravellers <= 8){
                selectObject[0].disabled = true;
                selectObject[1].disabled = true;
                selectObject[2].disabled = true;
                selectObject[3].selected = true;
                selectObject[3].disabled = false;
                $('#sel2').selectpicker('render');
            }
        },
        travellersCheck1: function(){
            let selectObject = document.getElementById("sel4").getElementsByTagName("option");
            if(this.searchBarTravellers <= 4){
                selectObject[0].disabled = true;
                selectObject[1].selected = true;
                selectObject[1].disabled = false;
                selectObject[2].disabled = false;
                selectObject[3].disabled = false;
                $('#sel4').selectpicker('render');
            }
            if(this.searchBarTravellers >4 && this.searchBarTravellers <= 6){
                selectObject[0].disabled = true;
                selectObject[1].disabled = true;
                selectObject[2].selected = true;
                selectObject[2].disabled = false;
                $('#sel4').selectpicker('render');

            }
            if(this.searchBarTravellers > 6 && this.searchBarTravellers <= 8){
                selectObject[0].disabled = true;
                selectObject[1].disabled = true;
                selectObject[2].disabled = true;
                selectObject[3].selected = true;
                selectObject[3].disabled = false;
                $('#sel4').selectpicker('render');
            }
        },
        booking: function(event){
            event.preventDefault();
            $('#login-link').trigger('click');

        },
        
        toggleAirport: function(){
            let that = this;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            axios.post('/toggle-airport', this.routes).then(function(response){
                if(response.data == 'ok'){
                    let id = window.location.href.split('/');
                    let route_id = id[id.length-1];
                    app.$refs.route.fetchPlaces(route_id);
                }else{
                    swal({
                        title: 'There is some problem please try again later',
                        type: 'warning',
                        allowOutsideClick: false
                    });
                }
            });
        },
        clearDestination: function(){
            this.newDestination.add_on_city_list = [];
            this.newDestination.destination = "";
            this.newDestination.end_date = "";
            this.newDestination.final_add_on_cities = [];
            this.newDestination.no_of_city = "";
            this.newDestination.no_of_nights = "";
            this.newDestination.previous_index = "";
            this.newDestination.route_id = "";
            this.newDestination.start_date = "";
            $('#end-date-picker').val('');
            $('#no-of-nights').val('');
            this.addOnCities = [];
            this.toggleMessage = false;
        },
        fetchCity: function(){
            let that = this;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            axios.post('/fetch-city').then(function(response){
                that.destinationList = response.data;
            });
        }
    }
});
