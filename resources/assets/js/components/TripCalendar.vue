<template>
    <div id="calendar" style="margin-bottom: 10px" :events="events"></div>
</template>

<script>
    import fullCalendar from 'fullcalendar';
    export default{
    	props: ['routeDetails'],
        mounted(){
    		this.displayCalendar();
        },
        data(){
            return{
                events: '',
            }
        },
        methods: {
            displayCalendar: function(){
	            $('#calendar').fullCalendar('destroy');
	            $('#calendar').fullCalendar();
                let month = [];
                for (let i = 0; i < this.routeDetails.cities.length; i++) {
                    let monthSource = new Object();
                    monthSource.title = this.routeDetails.cities[i].city.name;
                    monthSource.start = this.routeDetails.cities[i].start_date.split('-').reverse().join('-');
                    monthSource.end = this.routeDetails.cities[i].end_date.split('-').reverse().join('-');
                    month[i] = monthSource;
                }
                this.events = month;
                $('#calendar').fullCalendar('addEventSource', month);
            }
        }
    }
</script>