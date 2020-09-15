<template>
    <div class="modal d-flex flex-wrap j-c-center a-i-center">
        <div class="modal-content">
            <div class="d-flex j-c-end a-i-center">
                <button type="button" class="cur-point m-t-8 m-r-8" @click="closeAddSomeNightModal" data-dismiss="modal">&times;</button>
            </div>
            <div class="modalbody font-lato">
                <div class="text-center m-t-48 font-size-24">
                    Adding some nights in between?
                </div>
                <div class="text-center m-t-8 description m-b-32">
                    Adding a sleep over here will delete the stops associated to the previous destinations
                </div>
            </div>
            <div class="modalfooter d-flex flex-wrap j-c-space-evenly a-i-center">
                <button type="button" class="uppercase orange-button font-bold" @click="closeAddSomeNightModal" data-dismiss="modal">
                    BACK TO PLAN
                </button>
                <button type="button" class="uppercase green-button font-bold" @click="continueAddSomeNight" data-dismiss="modal">
                    CONTINUE
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RouteEditModalComponent",
        props: ['destinationIndex'],
        methods: {
            closeAddSomeNightModal: function () {
                this.$root.$refs.createplan.addSomeNightModal = false;
                this.$root.$refs.createplan.showModal = false;
            },
            continueAddSomeNight: function () {
                this.$root.$refs.createplan.addSomeNightModal = false;
                this.$root.$refs.createplan.addCityBetween = true;
                this.$root.$refs.createplan.showModal = true;
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
    .description {
        font-size: 16px;
        width: 56%;
        margin-left: auto;
        margin-right: auto;
    }
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
