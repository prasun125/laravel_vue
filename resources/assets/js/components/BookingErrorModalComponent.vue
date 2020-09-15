<template>
    <div class="modal d-flex flex-wrap j-c-center a-i-center">
        <div class="modal-content">
            <div class="d-flex j-c-end a-i-center">
                <button type="button" class="cur-point m-t-8 m-r-8" @click="closeBookingErrorModal" data-dismiss="modal">&times;</button>
            </div>
            <div class="modalbody font-lato">
                <div class="text-center m-t-56 font-size-24">
                    Oops.. Check your trip length
                </div>
                <div class="text-center m-t-8">
                    The length of your trip doesn't match the length of your planned days. Change dates or plan all your days
                </div>
            </div>
            <div class="modalfooter d-flex flex-wrap j-c-space-evenly a-i-center m-t-32">
                <button type="button" class="uppercase green-button font-bold" @click="closeBookingErrorModal" data-dismiss="modal">
                    OK GOT IT
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BookingErrorModalComponent",
        methods: {
            closeBookingErrorModal: function () {
                this.$root.$refs.createplan.bookingErrorModal = false;
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
        font-size: 24px;
        letter-spacing: 1px;
        word-spacing: 2px;
    }
    .modalbody > div:nth-child(2) {
        font-weight: 100;
        width: 50%;
        margin-left: auto;
        margin-right: auto;
    }
    .modalfooter button {
        width: 210px;
        font-size: 12px;
    }
    button.green-button {
        height: 60px;
    }
</style>
