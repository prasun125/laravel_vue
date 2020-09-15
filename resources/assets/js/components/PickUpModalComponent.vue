<template>
    <div class="modal d-flex flex-wrap j-c-center a-i-center">
        <div class="pickup-modal-content">
            <div class="d-flex j-c-end a-i-center">
                <button type="button" class="cur-point" @click="closePickupModal" data-dismiss="modal">&times;</button>
            </div>
            <div class="font-lato">
                <div class="text-center font-lato font-size-24">
                    Pick up
                </div>
                <small class="display-block min-width-100 width-100 max-width-100 text-center m-t-8 font-green font-lato font-size-12 font-bold">
                    on {{ pickupDetails.date }}
                </small>
                <div class="text-center m-t-8 font-lato font-size-12">
                    Please give us some information about your pick up address.
                </div>
                <div class="text-center font-lato pickup-description">
                    Pick up time and address is mandatory only for your starting day and can be amended until 24h prior starting date. Any other time and address are flexible and optional as you can always agree that with your driver on the go.
                </div>
                <div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap j-c-space-between a-i-center m-t-24 p-0-16">
                    <div class="pos-relative d-flex flex-dir-row j-c-space-between a-i-center pickup-input-container flex-grow-1 m-r-16">
                        <img :src="'/assets/images/icons/location-icon.svg'" class="p-0-8 icon" />
                        <input type="text" id="pickup-address-input" placeholder="Enter pick-up address" style="flex-grow: 1;" class="font-lato font-size-14" v-model="pickup.address" autocomplete="on"/>
                        <i class="material-icons p-r-8 font-grey">
                            search
                        </i>
                    </div>
                    <div id="map"></div>
                    <div id="infowindow-content" style="height: 0;">
                        <input type="hidden" id="place-id" name="place_id"><br>
                    </div>
                    <div class="pos-relative d-flex flex-dir-row j-c-space-between a-i-center pickup-input-container time-container">
                        <img :src="'/assets/images/icons/time-icon-green.svg'" class="p-0-8 icon" />
                        <input id="timepicker1" type="text" placeholder="Pick up time (optional)" style="flex-grow: 1;" class="font-lato font-size-14" v-model="pickup.time"/>
                        <i class="material-icons p-r-8 font-grey">
                            arrow_drop_down
                        </i>
                    </div>
                </div>
                <div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap a-i-center material-checkbox p-0-16 m-t-16">
                    <span class="check-airport-pickup" v-model="checkAirportPickup" @click="checkAirportPickup = !checkAirportPickup" v-bind:class="{active: checkAirportPickup}"></span>
                    <span class="m-l-8 last-destination">
						Airport pick up
					</span>
                </div>
                <div v-model="checkAirportPickup" v-if="checkAirportPickup">
                    <div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap j-c-space-between a-i-center m-t-16 p-0-16">
                        <div class="pos-relative d-flex flex-dir-row j-c-space-between a-i-center pickup-input-container flex-grow-1 m-r-16">
                            <img :src="'/assets/images/icons/flight-arriving-icon.svg'" class="p-0-8 icon" />
                            <input type="text" placeholder="Arriving to (airport)" style="flex-grow: 1;" class="font-lato font-size-14" v-model="pickup.arrivingTo"/>
                            <i class="material-icons p-r-8 font-grey">
                                search
                            </i>
                        </div>
                        <div class="pos-relative d-flex flex-dir-row j-c-space-between a-i-center pickup-input-container">
                            <img :src="'/assets/images/icons/time-icon-green.svg'" class="p-0-8 icon" />
                            <input type="text" placeholder="ETA" style="flex-grow: 1;" class="font-lato font-size-14" v-model="pickup.eta"/>
                            <i class="material-icons p-r-8 font-grey">
                                arrow_drop_down
                            </i>
                        </div>
                    </div>
                    <div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap j-c-space-between a-i-center m-t-16 p-0-16">
                        <div class="pos-relative d-flex flex-dir-row j-c-space-between a-i-center pickup-input-container flex-grow-1 m-r-16">
                            <img :src="'/assets/images/icons/flight-departing-icon.svg'" class="p-0-8 icon" />
                            <input type="text" placeholder="Flying from" style="flex-grow: 1;" class="font-lato font-size-14" v-model="pickup.flyingFrom"/>
                            <i class="material-icons p-r-8 font-grey">
                                search
                            </i>
                        </div>
                        <div class="pos-relative d-flex flex-dir-row j-c-space-between a-i-center pickup-input-container">
                            <img :src="'/assets/images/icons/flight-icon.svg'" class="p-0-8 icon" />
                            <input type="text" placeholder="Flight no" style="flex-grow: 1;" class="font-lato font-size-14" v-model="pickup.flightNo"/>
                            <i class="material-icons p-r-8 font-grey">
                                arrow_drop_down
                            </i>
                        </div>
                    </div>
                </div>
                <div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap a-i-center material-checkbox p-0-16 m-t-20 pos-relative">
                    <img :src="'/assets/images/icons/note-icon.svg'" class="pos-absolute font-green pickup-note-icon" style="height: 16px;" />
                    <textarea placeholder="Pick-up note" rows="6" class="min-width-100 width-100 max-width-100 font-lato" style="resize: none; padding: 8px 36px;" v-model="pickup.note"></textarea>
                </div>
            </div>
            <div class="d-flex flex-wrap j-c-end a-i-center p-0-16">
                <button type="button" class="uppercase orange-button m-r-16" style="margin-top: 16px; margin-bottom: 16px;" @click="closePickupModal" data-dismiss="modal">
                    I'LL TELL YOU LATER
                </button>
                <button type="button" class="uppercase green-button" style="margin-top: 16px; margin-bottom: 16px;" @click="confirmPickup" data-dismiss="modal">
                    CONFIRM
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    //require('../bootstrap-timepicker/js/bootstrap-timepicker.js');
    export default {
        name: "PickUpModalComponent",
        props: ['pickupDetails', 'pickupCityIndex'],
        data: function () {
            return {
                checkAirportPickup: false,
                pickup: this.pickupDetails
            }
        },
        methods: {
            closePickupModal: function () {
                this.$root.$refs.createplan.pickupModal = false;
                this.pickup.address = '';
                this.pickup.arrivingTo = '';
                this.pickup.eta = '';
                this.pickup.flightNo = '';
                this.pickup.flyingFrom = '';
                this.pickup.note = '';
                this.pickup.time = '';
            },
            confirmPickup: function () {
                this.$root.$refs.createplan.pickupModal = false;
            }
        },
        mounted() {
	        // No scroll effect when pickup modal opens
	        $('body').css('overflow', 'hidden');
	        
            let vmPickup = this;
            $(document).ready(function () {
                $('#timepicker1').timepicker({
                    minuteStep: 1
                })
                    .on('show.timepicker', function (e) {
                        vmPickup.pickup.time = e.time.value;
                    })
                    .on('changeTime.timepicker', function (e) {
                        /*console.log("The time is : " + e.time.value);
                        console.log("The hour is : " + e.time.hours);
                        console.log("The minute is : " + e.time.minutes);
                        console.log("The meridian is : " + e.time.meridian);*/
                        vmPickup.pickup.time = e.time.value;
                    });
            });
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
    .pickup-modal-content {
        background-color: rgba(255, 255, 255, 1);
        min-width: 320px;
        width: 700px;
        max-width: 700px;
        box-shadow: 0 0 8px 0 rgba(0,0,0,0.1);
    }
    .pickup-description {
        min-width: 65%;
        width: 65%;
        max-width: 65%;
        margin-left: auto;
        margin-right: auto;
        font-size: 12px;
    }
    .pickup-input-container {
        border: 1px solid rgba(0, 0, 0, 0.3);
        min-height: 50px;
        height: 50px;
        max-height: 50px;
    }
    .check-airport-pickup {
        min-height: 16px;
        height: 16px;
        max-height: 16px;
        min-width: 16px;
        width: 16px;
        max-width: 16px;
        cursor: pointer;
        border: 1px solid rgba(0, 0, 0, 0.3);
    }
    .check-airport-pickup.active {
        background-color: #00B69C;
        border: none;
    }
    .pickup-note-icon {
        top: 8%;
        left: 4%;
    }
    .modal-body > div:first-child {
        font-size: 24px;
        letter-spacing: 1px;
        word-spacing: 2px;
    }
    .modal-body > div:nth-child(2) {
        font-weight: 100;
    }
    .modal-footer button {
        width: 200px;
        font-size: 11px;
    }
    button.orange-button, button.green-button {
        width:200px;
        font-size: 12px;
    }
    .time-container input#timepicker1{
        min-height:100%;
        height:100%;
        max-height:100%;
    }
    .icon {
        height: 16px;
        width: 36px;
    }
</style>
