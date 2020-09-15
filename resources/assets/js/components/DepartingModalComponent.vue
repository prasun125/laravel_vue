<template>
    <div class="modal d-flex flex-wrap j-c-center a-i-center">
        <div class="pickup-modal-content">
            <div class="d-flex j-c-end a-i-center">
                <button type="button" class="cur-point" @click="closeDepartingModal" data-dismiss="modal">&times;</button>
            </div>
            <div class="font-lato">
                <div class="text-center font-lato font-size-24">
                    Departing from
                </div>
                <small class="display-block min-width-100 width-100 max-width-100 text-center m-t-8 font-green font-lato font-size-12 font-bold">
                    on {{ departingDetails.date }}
                </small>
                <div class="text-center font-lato pickup-description">
                    Any time, address or step on your way are optional as you can always agree them with your driver on the go. Our local drivers will help you ge the most from your journey. Afterall you are on holiday.
                </div>
                <div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap j-c-space-between a-i-center m-t-24 p-0-16">
                    <div class="pos-relative d-flex flex-dir-row j-c-space-between a-i-center pickup-input-container flex-grow-1 m-r-16">
                        <img :src="'/assets/images/icons/location-icon.svg'" class="p-0-8 icon" />
                        <input type="text" placeholder="Enter departing address" style="flex-grow: 1;" class="font-lato font-size-14" v-model="departing.address"/>
                        <i class="material-icons p-r-8 font-grey">
                            search
                        </i>
                    </div>
                    <div class="pos-relative d-flex flex-dir-row j-c-space-between a-i-center pickup-input-container time-container">
                        <img :src="'/assets/images/icons/time-icon-green.svg'" class="p-0-8 icon" />
                        <input id="timepicker2" type="text" placeholder="Depart by (optional)" style="flex-grow: 1;" class="font-lato font-size-14" v-model="departing.time"/>
                        <i class="material-icons p-r-8 font-grey">
                            arrow_drop_down
                        </i>
                    </div>
                </div>
                <div class="min-width-100 width-100 max-width-100 d-flex flex-dir-row flex-wrap a-i-center material-checkbox p-0-16 m-t-20 pos-relative">
                    <img :src="'/assets/images/icons/note-icon.svg'" class="pos-absolute font-green pickup-note-icon" />
                    <textarea placeholder="Departing note" rows="8" class="min-width-100 width-100 max-width-100 font-lato" style="resize: none; padding: 8px 36px;" v-model="departing.note"></textarea>
                </div>
            </div>
            <div class="d-flex flex-wrap j-c-end a-i-center p-0-16">
                <button type="button" class="uppercase orange-button m-r-16" style="margin-top: 16px; margin-bottom: 16px;" @click="closeDepartingModal" data-dismiss="modal">
                    I'LL TELL YOU LATER
                </button>
                <button type="button" class="uppercase green-button" style="margin-top: 16px; margin-bottom: 16px;" @click="confirmDeparting" data-dismiss="modal">
                    CONFIRM
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DepartingModalComponent",
        props: ['departingDetails', 'departingCityIndex'],
        data: function () {
            return {
                departing: this.departingDetails
            }
        },
        methods: {
            closeDepartingModal: function () {
                this.$root.$refs.createplan.departingModal = false;
                this.departing.address = '';
                this.departing.note = '';
                this.departing.time = '';
            },
            confirmDeparting: function () {
                this.$root.$refs.createplan.departingModal = false;
            }
        },
        mounted() {
	        // No scroll effect when departing modal opens
	        $('body').css('overflow', 'hidden');
	        
            let vmDeparting = this;
            $(document).ready(function () {
                $('#timepicker2').timepicker({
                    minuteStep: 1
                })
                    .on('show.timepicker', function (event) {
                        vmDeparting.departing.time = event.time.value;
                    })
                    .on('changeTime.timepicker', function (event) {
                        vmDeparting.departing.time = event.time.value;
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
    .pickup-note-icon {
        top: 6%;
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
    .time-container input#timepicker2{
        min-height:100%;
        height:100%;
        max-height:100%;
    }
    .icon {
        height: 16px;
        width: 36px;
    }
</style>
