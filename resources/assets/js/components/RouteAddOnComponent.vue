<template>
	<div class="modal d-flex flex-wrap j-c-center a-i-center">
		<div class="modal-content">
			<div class="d-flex j-c-end a-i-center">
				<button type="button" class="cur-point" @click="closeaddonalert" data-dismiss="modal">&times;</button>
			</div>
			<div class="modalbody font-lato m-t-56">
				<div class="text-center">Too many stop in one go!</div>
				<div class="text-center m-t-32">You can add upto 2 stop overs per route,</div>
				<div class="text-center">Don't worry there is plenty to see</div>
			</div>
			<div class="modalfooter d-flex flex-wrap j-c-space-evenly a-i-center m-t-32">
				<button type="button" class="uppercase orange-button" @click="closeaddonalert" data-dismiss="modal">
					KEEP MY PREVIOUS STOP
				</button>
				<button type="button" class="uppercase green-button" @click="$emit('close')" data-dismiss="modal">
					SWAP THIS FOR MY LAST
				</button>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "RouteAddOnComponent",
		methods: {
			closeaddonalert: function () {
				this.$root.$refs.createplan.showAddOnAlert = false;
			}
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
		width: 500px;
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
