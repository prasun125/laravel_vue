<template>
    <DatePicker editable v-model="start_date" v-on:change="saveStartDate" placeholder="Start Date" type="date" format="dd-MM-yyyy" lang="en"  style="max-width: 100% !important; padding: 0;"></DatePicker>
</template>

<script>
    import DatePicker from 'vue2-datepicker';
    export default {
    	props: ['startDate'],
        data(){
          return{
              start_date: '',
              end_date: ''
          }
        },
        mounted() {
        	this.start_date = this.startDate;
        },
        components: {
            DatePicker
        },
        methods: {
            saveStartDate: function(){
                /*let d = new Date(this.start_date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();
                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                let date = [year, month, day].join('-');
                let d1 = new Date(this.start_date);
                let d2 = new Date(this.start_date);
                let timeDiff = d2.getTime() - d1.getTime();
                let DaysDiff = timeDiff / (1000 * 3600 * 24);
                this.$root.$refs.startpicker.route.data[0].start_date = date;
                this.$root.$refs.startpicker.route.data[0].end_date = date;
                this.$root.$refs.startpicker.route.data[0].number_of_nights = DaysDiff;
                this.$root.$refs.startpicker.saveOption();*/
                let noOfNights = this.$root.$refs.modifyroute.routeDetails.total_no_of_nights;
                let startDate = new Date(this.start_date);
	            let endDate = this.$root.$refs.modifyroute.routeDetails.end_date;
	            let newDate = new Date(endDate);
	            newDate.setDate(startDate.getDate() + noOfNights);
	            this.$root.$refs.modifyroute.routeDetails.start_date = this.start_date.getFullYear() + "-" + ('0' + (this.start_date.getMonth() + 1)).slice(-2) + "-" + ('0' + this.start_date.getDate()).slice(-2);
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
	            this.$root.$refs.modifyroute.tripEndDate =  this.$root.$refs.modifyroute.routeDetails.end_date = newDate.getFullYear() + "-" + ('0' + (newDate.getMonth() + 1)).slice(-2) + "-" + ('0' + newDate.getDate()).slice(-2);
            }
        }
    }
</script>

<style scoped>

</style>