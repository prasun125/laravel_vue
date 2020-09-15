<template>
	<div class="modal" style="background-color: rgba(0,0,0,0.5); display: flex; flex-flow: row wrap; justify-content: center; align-items: center;">
		<div class="custom-modal" style="width: 500px;">
			<div class="modal-content custom-modal-content">
				<div class="modal-header custom-modal-header">
					<button type="button" class="close" @click="$emit('close')"
					        data-dismiss="modal" style="font-size: 42px;">&times;
					</button>
				</div>
				<div class="modal-body display-flex-column" style="padding: 0;" v-if="messageText !== ''">
					<div class="display-flex flex-direction-column align-items-center center-justify-content"
					     style="text-align: center;">
						<div class="" style="width: 100%;">
							<div class="display-flex flex-direction-column" style="width: 100%;">
								<div class="display-flex align-items-center center-justify-content"
								     style="margin-bottom: 24px;">
									<div class="add-on-cities-header"
									     style="display:flex; flex-wrap:wrap; justify-content: center;">
                                                <span class="add-on-span is-card"
                                                      style="position: relative; width: 400px;">
                                                    {{ messageText }}
                                                </span>
										<div>
											Do you want to continue?
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer custom-modal-footer" style="border-top: none;">
					<div style="display: flex; flex-flow: row wrap; justify-content: space-evenly; align-items: center;">
						<button type="button" class="close" style="background-color: #00a680; opacity: 1; text-shadow: none; width: 150px; height: 32px; font-size: 16px; color: white;" @click="$emit('close'); deleteDestination();" data-dismiss="modal">
							Yes delete it
						</button>
						<button type="button" class="close" style="background-color: #00a680; opacity: 1; text-shadow: none; width: 150px; height: 32px; font-size: 16px; color: white;" @click="$emit('close')" data-dismiss="modal">
							Cancel
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: "DeleteDestinationAlertModal",
		props: ['messageText', 'deleteIndex'],
		methods: {
			deleteDestination: function () {
				let prevStartDate = this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex].start_date;
				let prevEndDate = this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex].end_date;
				this.$root.$refs.modifyroute.routeDetails.cities.splice(this.deleteIndex, 1);
				this.$root.$refs.modifyroute.routeDetails.route_title = '';
				for (let i = 0; i < this.$root.$refs.modifyroute.routeDetails.cities.length; i++) {
					if (i === this.$root.$refs.modifyroute.routeDetails.cities.length - 1) {
						this.$root.$refs.modifyroute.routeDetails.route_title += this.$root.$refs.modifyroute.routeDetails.cities[i].city.name;
					}
					else {
						this.$root.$refs.modifyroute.routeDetails.route_title += this.$root.$refs.modifyroute.routeDetails.cities[i].city.name + ' - ';
					}
				}
				if (this.deleteIndex in this.$root.$refs.modifyroute.routeDetails.cities) {
					this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex].start_date = prevStartDate;
					this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex].end_date = prevEndDate;
					this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex].add_on_cities.splice(0, this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex].add_on_cities.length);
					let previousCityId = this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex - 1].city.id;
					let nextCityId = this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex].city.id;
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					axios.get('/calculate-distance-price-time/' + previousCityId + '/' + nextCityId)
						.then((response) => {
							if (response.data == 'error') {
								swal({
									title: 'Select different place',
									type: 'warning',
									allowOutsideClick: false
								});
							}
							else {
								this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex].distance = response.data.distance;
								this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex].price = response.data.price;
								this.$root.$refs.modifyroute.routeDetails.cities[this.deleteIndex].time = response.data.time;
							}
						});
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
			}
		}
	}
</script>

<style scoped>

</style>