<template>
    <div class="enlarge-map-container">
        <div class="enlarge-map-close" @click="closeEnlargeMap">&times;</div>
        <div class="text-center font-lato">
            <div class="font-size-32 font-bold" style="letter-spacing: 1px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            </div>
            <div class="font-size-14">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedLorem ipsum dolor sit amet, consectetur adipiscing elit, sed
            </div>
            <div class="font-size-14">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sedLorem ipsum dolor sit amet, consectetur
            </div>
            <div class="font-size-14">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit
            </div>
        </div>
        <div id="enl-map" class="m-t-32 google-map"></div>
    </div>
</template>


<script>
    import GoogleMapsLoader from 'google-maps'
    export default {
        name: 'EnlargeMap',
        props: ['routeDetails'],
        mounted: function () {
	        this.displayMap();
        },
        methods: {
            displayMap: function(){
            	
            	let that = this;
	
	            GoogleMapsLoader.load(function(google) {
		            // Create a map and center it on Cuba.
		            let map = new google.maps.Map(
			            document.getElementById('enl-map'),
			            {
				            //center: new google.maps.LatLng(21.685413, -78.953938),
				            center: new google.maps.LatLng(21.5218, -77.7812),
				            zoom: 7,
				            mapTypeId: google.maps.MapTypeId.ROADMAP
			            }
		            );
		            
		            // Instantiate a directions service.
		            let directionsService = new google.maps.DirectionsService;
		
		            // Create a renderer for directions and bind it to the map.
		            // let directionsDisplay = new google.maps.DirectionsRenderer;
		
		            // Instantiate an info window to hold step text.
		            // let stepDisplay = new google.maps.InfoWindow;
              
		            //directionsDisplay.setMap(map);
		            let waypoints = [];
		
		            if (that.routeDetails.cities.length === 1) {
			            let position = new google.maps.LatLng(that.routeDetails.cities[0].city.latitude, that.routeDetails.cities[0].city.longitude);
			            that.makeMarker(position, that.getBlackFillIcon(), map);
		            }
		            else if (that.routeDetails.cities.length > 1) {
			            /*for (let i = 1; i < that.routeDetails.cities.length - 1; i++) {
			            	waypoints.push({
					            location: new google.maps.LatLng(that.routeDetails.cities[i].city.latitude, that.routeDetails.cities[i].city.longitude),
					            stopover: true
				            });
			            }
			            waypoints.forEach(function (item) {
				            let marker = new google.maps.Marker({
					            map: map,
					            //draggable: true,
					            animation: google.maps.Animation.DROP,
					            position: item.location,
					            icon: window.location.origin + '/assets/images/icons/location-green-fill-icon.svg'
				            });
			            });
			            directionsService.route({
				            origin: new google.maps.LatLng(that.routeDetails.cities[0].city.latitude, that.routeDetails.cities[0].city.longitude),
				            destination: new google.maps.LatLng(that.routeDetails.cities[that.routeDetails.cities.length - 1].city.latitude, that.routeDetails.cities[that.routeDetails.cities.length - 1].city.longitude),
				            waypoints: waypoints,
				            optimizeWaypoints: true,
				            travelMode: 'DRIVING'
			            }, function(response, status) {
				            if (status === 'OK') {
					            directionsDisplay.setDirections(response);
				            } else {
					            window.alert('Directions request failed due to ' + status);
				            }
			            });*/
			            let position = new google.maps.LatLng(that.routeDetails.cities[0].city.latitude, that.routeDetails.cities[0].city.longitude);
			            that.makeMarker(position, that.getBlackFillIcon(), map);
			            for (let i = 0; i < that.routeDetails.cities.length - 1; i++) {
				            position = new google.maps.LatLng(that.routeDetails.cities[i + 1].city.latitude, that.routeDetails.cities[i + 1].city.longitude);
				            that.makeMarker(position, that.getBlackFillIcon(), map);
				            if (typeof that.routeDetails.cities[i + 1].firstaddon === 'object' && that.routeDetails.cities[i + 1].firstaddon !== '') {
					            waypoints.push({
						            location: new google.maps.LatLng(that.routeDetails.cities[i + 1].firstaddon.latitude, that.routeDetails.cities[i + 1].firstaddon.longitude),
						            stopover: true
					            });
				            }
				            if (typeof that.routeDetails.cities[i + 1].secondaddon === 'object' && that.routeDetails.cities[i + 1].secondaddon !== '') {
					            waypoints.push({
						            location: new google.maps.LatLng(that.routeDetails.cities[i + 1].secondaddon.latitude, that.routeDetails.cities[i + 1].secondaddon.longitude),
						            stopover: true
					            });
				            }
				            if (waypoints.length !== 0) {
					            waypoints.forEach(function (item) {
						            that.makeMarker(item.location, that.getBlackIcon(), map);
					            });
				            }
				            /*directionsService.route({
								origin: new google.maps.LatLng(that.routeDetails.cities[i].city.latitude, that.routeDetails.cities[i].city.longitude),
								destination: new google.maps.LatLng(that.routeDetails.cities[i + 1].city.latitude, that.routeDetails.cities[i + 1].city.longitude),
								waypoints: waypoints,
								optimizeWaypoints: true,
								travelMode: 'DRIVING'
							}, function(response, status) {
								if (status === 'OK') {
									directionsDisplay.setDirections(response);
								} else {
									window.alert('Directions request failed due to ' + status);
								}
							});*/
				            var directionsRequest = {
					            origin: new google.maps.LatLng(that.routeDetails.cities[i].city.latitude, that.routeDetails.cities[i].city.longitude),
					            destination: new google.maps.LatLng(that.routeDetails.cities[i + 1].city.latitude, that.routeDetails.cities[i + 1].city.longitude),
					            waypoints: waypoints,
					            optimizeWaypoints: true,
					            travelMode: 'DRIVING'
				            };
				            directionsService.route(directionsRequest, function(response, status) {
					            if (status === 'OK') {
						            new google.maps.DirectionsRenderer({
							            map: map,
							            directions: response,
							            suppressMarkers: true
						            });
					            } else {
						            window.alert('Directions request failed due to ' + status);
					            }
				            });
			            }
                    }
	            });
            },
	        makeMarker: function (position, icon, map) {
		        new google.maps.Marker({
			        position: position,
			        map: map,
			        icon: icon,
			        animation: google.maps.Animation.DROP
		        });
	        },
	        getGreenFillIcon: function () {
		        return {
			        url: window.location.origin + '/assets/images/icons/location-green-fill-icon.svg',
			        origin: new google.maps.Point(0, 0)
		        };
	        },
	        getGreenIcon: function () {
		        return {
			        url: window.location.origin + '/assets/images/icons/location-green-icon.svg',
			        origin: new google.maps.Point(0, 0)
		        };
	        },
	        getOrangeFillIcon: function () {
		        return {
			        url: window.location.origin + '/assets/images/icons/location-orange-fill-icon.svg',
			        origin: new google.maps.Point(0, 0)
		        };
	        },
	        getBlackFillIcon: function () {
		        return {
			        url: window.location.origin + '/assets/images/icons/location-black-fill-icon.svg',
			        origin: new google.maps.Point(0, 0)
		        };
	        },
	        getBlackIcon: function () {
		        return {
			        url: window.location.origin + '/assets/images/icons/location-black-icon.svg',
			        origin: new google.maps.Point(0, 0)
		        };
	        },
	        closeEnlargeMap: function () {
		        this.$root.$refs.createplan.enlargeMap = !this.$root.$refs.createplan.enlargeMap;
		        $('body').css('overflow', 'scroll');
	        },
        }
    }
</script>
<style scoped>
    .enlarge-map-container {
        min-height: 100vh;
        height: 100vh;
        max-height: 100vh;
        min-width: 100%;
        width: 100%;
        max-width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(255, 255, 255, 1);
        padding: 40px;
        -webkit-animation: zoomIn 0.5s;
        animation: zoomIn 0.5s;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .enlarge-map-close {
        position: absolute;
        cursor: pointer;
        top: 10px;
        right: 16px;
    }
    #enl-map {
        flex-grow: 1;
        min-width: 100%;
        width: 100%;
        max-width: 100%;
    }
</style>