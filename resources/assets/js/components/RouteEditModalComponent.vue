<template>
    <div class="modal d-flex flex-wrap j-c-center a-i-center">
        <div class="modal-content">
            <div class="d-flex j-c-end a-i-center">
                <button type="button" class="cur-point m-t-8 m-r-8" @click="closeeditmodal" data-dismiss="modal">&times;</button>
            </div>
            <div class="modalbody font-lato">
                <div class="text-center m-t-24 font-size-24">What would you like to do with this step?</div>
                <div class="text-center m-t-8 font-size-14">Deleting this step will also delete all the plan and days associated with it.</div>
            </div>
            <div class="modalfooter d-flex flex-wrap j-c-space-evenly a-i-center">
                <button type="button" class="uppercase orange-button font-bold" @click="deleteDestination(destinationIndex, destinationAddOnIndex)" data-dismiss="modal">
                    DELETE THIS STEP
                </button>
                <button type="button" class="uppercase green-button font-bold" @click="amendOnMap(destinationIndex)" data-dismiss="modal">
                    AMEND ON MAP
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RouteEditModalComponent",
        props: ['destinationIndex', 'destinationAddOnIndex'],
        data() {
             return {
                 temp1: {
                     departing: '',
                     pickup: '',
                     endDate: '',
                     startDate: '',
                     totalDay: '',
                     totalNight: ''
                 },
                 temp2: {
                     departing: '',
                     pickup: '',
                     endDate: '',
                     startDate: '',
                     totalDay: '',
                     totalNight: ''
                 }
             }
        },
        methods: {
            closeeditmodal: function () {
                this.$root.$refs.createplan.routeEditModal = false;
            },
            deleteDestination: function (destinationIndex, destinationAddOnIndex) {
                if (destinationAddOnIndex === null) {
                    // Delete only first city
                    if (destinationIndex === 0) {
                    	if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(destinationIndex + 1)) {
		                    this.$root.$refs.createplan.routeDetails.cities[destinationIndex + 1].firstaddon = '';
		                    this.$root.$refs.createplan.routeDetails.cities[destinationIndex + 1].secondaddon = '';
		                    this.reCalculateArrivingDepartingDates(destinationIndex);
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
	                        this.reCalculateArrivingDepartingDates(destinationIndex);
                        }
                        this.$root.$refs.createplan.routeDetails.cities.splice(destinationIndex, 1);
                    }
	                this.reCalculateLeftCalendarDates();
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
                this.$root.$refs.createplan.routeEditModal = false;
            },
            reCalculateLeftCalendarDates: function () {
            	let vm = this;
                let startDate = '';
                let endDate = '';
	            if (this.$root.$refs.createplan.routeDetails.cities.length === 0) {
		            startDate = this.$root.$refs.createplan.tripStartDateObj._d;
		            endDate = this.$root.$refs.createplan.tripEndDateObj._d;
	            }
	            else {
		            startDate = new Date(this.$root.$refs.createplan.routeDetails.cities[0].startDate);
		            endDate = new Date(this.$root.$refs.createplan.routeDetails.cities[this.$root.$refs.createplan.routeDetails.cities.length - 1].endDate);
                }
                $('.date-container').daterangepicker({
                    opens: 'center',
                    startDate: startDate,
                    endDate: endDate,
                    minDate: startDate,
                    autoUpdateInput: true,
                    autoApply: true,
                    isCustomDate: function (date) {
                        let formattedDate = new Date(date.format('YYYY-MM-DD')).getTime();
                        //if (vm.routeDetails.cities.length >= 1) {
                        if (vm.$root.$refs.createplan.routeDetails.cities.length >= 1) {
                            return 'filled';
                        }
                    }
                }, function(start, end) {
                });
                $('.date-selector').data('daterangepicker').container.find('.drp-calendar').unbind('mousedown.daterangepicker' );
                $('.date-selector').data('daterangepicker').container.find('.drp-calendar').unbind('mouseenter.daterangepicker' );
                $('#show-calender').html( $('.date-selector').data('daterangepicker').container);
                $('.date-selector').trigger('click');
            },
            reCalculateArrivingDepartingDates: function (destinationIndex, index) {
	            for (let i = destinationIndex; i <= this.$root.$refs.createplan.routeDetails.cities.length - 1; i++) {
		            if (this.$root.$refs.createplan.routeDetails.cities.hasOwnProperty(i + 1)) {
			            if (i === 0) {
				            this.$root.$refs.createplan.routeDetails.cities[i + 1].startDate = this.$root.$refs.createplan.routeDetails.cities[i].startDate;
				            this.$root.$refs.createplan.routeDetails.cities[i + 1].pickup.date = this.$root.$refs.createplan.routeDetails.cities[i].pickup.date;
				            this.$root.$refs.createplan.routeDetails.cities[i + 1].arriving.address = '';
				            this.$root.$refs.createplan.routeDetails.cities[i + 1].arriving.date = '';
				            this.$root.$refs.createplan.routeDetails.cities[i + 1].arriving.note = '';
				            this.$root.$refs.createplan.routeDetails.cities[i + 1].arriving.time = '';
				            if (this.$root.$refs.createplan.routeDetails.cities[i + 1].lastDestination === true) {
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].totalDay = moment(this.$root.$refs.createplan.routeDetails.cities[i + 1].endDate)._d.getDate() - moment(this.$root.$refs.createplan.routeDetails.cities[i + 1].startDate)._d.getDate() + 1;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].totalNight = moment(this.$root.$refs.createplan.routeDetails.cities[i + 1].endDate)._d.getDate() - moment(this.$root.$refs.createplan.routeDetails.cities[i + 1].startDate)._d.getDate();
				            }
				            else {
					            let startDate = moment(this.$root.$refs.createplan.routeDetails.cities[i + 1].startDate);
					            let departingDate = startDate.add(this.$root.$refs.createplan.routeDetails.cities[i + 1].totalNight, 'day');
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].departing.date = departingDate._d.getDate() + ' ' + departingDate._locale._monthsShort[departingDate._d.getMonth()] + ' ' + departingDate._d.getFullYear();
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].endDate = departingDate.format('YYYY-MM-DD');
				            }
			            }
		            	else if (i === destinationIndex) {
				            if (this.$root.$refs.createplan.routeDetails.cities[i + 1].lastDestination === true) {
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].startDate = '';
					            let endMoment = moment(this.$root.$refs.createplan.routeDetails.cities[i - 1].endDate).add(1, 'day');
					            let endMomentString = endMoment.format('YYYY-MM-DD');
					            let dropoffDate = endMoment._d.getDate() + ' ' + endMoment._locale._monthsShort[endMoment._d.getMonth()] + ' ' + endMoment._d.getFullYear();
					            let end = endMomentString;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].dropoff.date = dropoffDate;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].endDate = end;
					            this.$root.$refs.createplan.lastDestination = true;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].totalDay = 0;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].totalNight = 0;
				            }
				            else {
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].startDate = this.$root.$refs.createplan.routeDetails.cities[i - 1].endDate;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].arriving.date = this.$root.$refs.createplan.routeDetails.cities[i - 1].departing.date;
					            let startDate = moment(this.$root.$refs.createplan.routeDetails.cities[i + 1].startDate);
					            let departingDate = startDate.add(this.$root.$refs.createplan.routeDetails.cities[i + 1].totalNight, 'day');
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].departing.date = departingDate._d.getDate() + ' ' + departingDate._locale._monthsShort[departingDate._d.getMonth()] + ' ' + departingDate._d.getFullYear();
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].endDate = departingDate.format('YYYY-MM-DD');
				            }
			            }
			            else {
				            if (this.$root.$refs.createplan.routeDetails.cities[i + 1].lastDestination === true) {
					            let endMoment = moment(this.$root.$refs.createplan.routeDetails.cities[i].endDate).add(1, 'day');
					            let endMomentString = endMoment.format('YYYY-MM-DD');
					            let dropoffDate = endMoment._d.getDate() + ' ' + endMoment._locale._monthsShort[endMoment._d.getMonth()] + ' ' + endMoment._d.getFullYear();
					            let end = endMomentString;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].dropoff.date = dropoffDate;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].endDate = end;
					            this.$root.$refs.createplan.lastDestination = true;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].totalDay = 0;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].totalNight = 0;
				            }
				            else {
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].startDate = this.$root.$refs.createplan.routeDetails.cities[i].endDate;
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].arriving.date = this.$root.$refs.createplan.routeDetails.cities[i].departing.date;
					            let startDateObj = moment(this.$root.$refs.createplan.routeDetails.cities[i + 1].startDate);
					            let departingDate = startDateObj.add(this.$root.$refs.createplan.routeDetails.cities[i + 1].totalNight, 'day');
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].departing.date = departingDate._d.getDate() + ' ' + departingDate._locale._monthsShort[departingDate._d.getMonth()] + ' ' + departingDate._d.getFullYear();
					            this.$root.$refs.createplan.routeDetails.cities[i + 1].endDate = departingDate.format('YYYY-MM-DD');
				            }
			            }
		            }
	            }
            },
            amendOnMap: function (destinationIndex) {
                this.$root.$refs.createplan.routeEditModal = false;
                this.$root.$refs.createplan.prepareModal(destinationIndex);
            },
	        calculatePrice: function () {
		        let selectedCarIndex = this.$root.$refs.createplan.vehiclesData.findIndex(x => x.id === this.$root.$refs.createplan.routeDetails.vehicleId);
		        let carPrice = this.$root.$refs.createplan.vehiclesData[selectedCarIndex].price;
		        let passengerCapacity = this.$root.$refs.createplan.vehiclesData[selectedCarIndex].passenger;
		        let totalTripNight = 0;
		        this.$root.$refs.createplan.routeDetails.price.total = 0;
		        if (this.$root.$refs.createplan.routeDetails.cities.length >= 1) {
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
						        this.transitionalRule(index, 1, carPrice);
					        }
					        else {
						        this.transitionalRule(index, 1, carPrice);
					        }
				        }
				        else {
					        if (this.$root.$refs.createplan.routeDetails.cities[index].betweenDate === true) {
						        night = this.$root.$refs.createplan.routeDetails.cities[index].totalNight - 1;
						        this.middleRule(index, night, carPrice);
					        }
					        this.transitionalRule(index, 1, carPrice);
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
                }
		        else {
			        this.$root.$refs.createplan.routeDetails.price.total = 0;
			        this.$root.$refs.createplan.routeDetails.price.payToday = 0;
			        this.$root.$refs.createplan.routeDetails.price.payDriver = 0;
			        this.$root.$refs.createplan.routeDetails.price.paxPerDay = 0;
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
	        }
        },
	    mounted() {
		    $('body').css('overflow', 'hidden');
	    },
	    destroyed() {
		    $('body').css('overflow', 'scroll');
	    }
    }
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
        width: 700px;
        max-width: 100%;
        box-shadow: 0 0 8px 0 rgba(0,0,0,0.1);
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
</style>
