<template>
    <div class="google-map" id="google-map"></div>
</template>

<script>
    import GoogleMapsLoader from 'google-maps'
    GoogleMapsLoader.KEY = 'AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs';
    export default {
        name: 'google-map',
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
			            document.getElementById('google-map'),
			            {
				            //center: new google.maps.LatLng(21.685413, -78.953938),
				            center: new google.maps.LatLng(21.5218, -77.7812),
				            zoom: 6,
				            mapTypeId: google.maps.MapTypeId.ROADMAP,
				            disableDefaultUI: true
			            }
		            );
		            
		            // Instantiate a directions service.
		            let directionsService = new google.maps.DirectionsService;
		
		            // Create a renderer for directions and bind it to the map.
		            // let directionsDisplay = new google.maps.DirectionsRenderer;
		
		            // Instantiate an info window to hold step text.
		            // let stepDisplay = new google.maps.InfoWindow;
              
		            //directionsDisplay.setMap(map);
		            let bounds = new google.maps.LatLngBounds();
		            let waypoints = [];
		            let middleAddonWaypoints = [];
		            let middleAddonKeys = '';
		            
		            if (that.routeDetails.cities.length === 1) {
			            let position = new google.maps.LatLng(that.routeDetails.cities[0].city.latitude, that.routeDetails.cities[0].city.longitude);
			            that.makeMarker(position, that.getBlackFillIcon(), map, bounds);
			            middleAddonKeys = Object.keys(that.routeDetails.cities[0].middleAddons);
			            if (middleAddonKeys.length !== 0) {
				            for (let m = 0; m < middleAddonKeys.length; m++) {
					            waypoints = [];
					            middleAddonWaypoints = [];
					            if (that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].hasOwnProperty('city1') && typeof that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city1 === 'object') {
						            middleAddonWaypoints.push({
							            location: new google.maps.LatLng(that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city1.latitude, that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city1.longitude),
							            stopover: true
						            })
					            }
					            if (that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].hasOwnProperty('city2') && typeof that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city2 === 'object') {
						            middleAddonWaypoints.push({
							            location: new google.maps.LatLng(that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city2.latitude, that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city2.longitude),
							            stopover: true
						            })
					            }
					            if (middleAddonWaypoints.length !== 0) {
						            middleAddonWaypoints.forEach(function (item) {
							            that.makeMarker(item.location, that.getBlackIcon(), map, bounds);
						            });
					            }
					            directionsRequest = {
						            origin: new google.maps.LatLng(that.routeDetails.cities[0].city.latitude, that.routeDetails.cities[0].city.longitude),
						            destination: new google.maps.LatLng(that.routeDetails.cities[0].city.latitude, that.routeDetails.cities[0].city.longitude),
						            waypoints: middleAddonWaypoints,
						            optimizeWaypoints: true,
						            travelMode: 'DRIVING'
					            };
					            directionsService.route(directionsRequest, function(response, status) {
						            if (status === 'OK') {
							            new google.maps.DirectionsRenderer({
								            map: map,
								            directions: response,
								            suppressMarkers: true,
								            polylineOptions: {
									            strokeColor: "black"
								            }
							            });
						            }
					            });
				            }
			            }
			            map.fitBounds(bounds);
		            }
		            else if (that.routeDetails.cities.length > 1) {
			            let position = new google.maps.LatLng(that.routeDetails.cities[0].city.latitude, that.routeDetails.cities[0].city.longitude);
			            that.makeMarker(position, that.getBlackFillIcon(), map, bounds);
			            middleAddonKeys = Object.keys(that.routeDetails.cities[0].middleAddons);
			            if (middleAddonKeys.length !== 0) {
				            for (let m = 0; m < middleAddonKeys.length; m++) {
					            waypoints = [];
					            middleAddonWaypoints = [];
					            if (that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].hasOwnProperty('city1') && typeof that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city1 === 'object') {
						            middleAddonWaypoints.push({
							            location: new google.maps.LatLng(that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city1.latitude, that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city1.longitude),
							            stopover: true
						            })
					            }
					            if (that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].hasOwnProperty('city2') && typeof that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city2 === 'object') {
						            middleAddonWaypoints.push({
							            location: new google.maps.LatLng(that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city2.latitude, that.routeDetails.cities[0].middleAddons[middleAddonKeys[m]].city2.longitude),
							            stopover: true
						            })
					            }
					            if (middleAddonWaypoints.length !== 0) {
						            middleAddonWaypoints.forEach(function (item) {
							            that.makeMarker(item.location, that.getBlackIcon(), map, bounds);
						            });
					            }
					            directionsRequest = {
						            origin: new google.maps.LatLng(that.routeDetails.cities[0].city.latitude, that.routeDetails.cities[0].city.longitude),
						            destination: new google.maps.LatLng(that.routeDetails.cities[0].city.latitude, that.routeDetails.cities[0].city.longitude),
						            waypoints: middleAddonWaypoints,
						            optimizeWaypoints: true,
						            travelMode: 'DRIVING'
					            };
					            directionsService.route(directionsRequest, function(response, status) {
						            if (status === 'OK') {
							            new google.maps.DirectionsRenderer({
								            map: map,
								            directions: response,
								            suppressMarkers: true,
								            polylineOptions: {
									            strokeColor: "black"
								            }
							            });
						            }
					            });
				            }
			            }
			            for (let i = 0; i < that.routeDetails.cities.length - 1; i++) {
				            waypoints = [];
				            middleAddonKeys = '';
				            middleAddonKeys = Object.keys(that.routeDetails.cities[i + 1].middleAddons);
				            if (middleAddonKeys.length !== 0) {
					            for (let m = 0; m < middleAddonKeys.length; m++) {
						            waypoints = [];
						            middleAddonWaypoints = [];
						            if (that.routeDetails.cities[i + 1].middleAddons[middleAddonKeys[m]].hasOwnProperty('city1') && typeof that.routeDetails.cities[i + 1].middleAddons[middleAddonKeys[m]].city1 === 'object') {
							            middleAddonWaypoints.push({
								            location: new google.maps.LatLng(that.routeDetails.cities[i + 1].middleAddons[middleAddonKeys[m]].city1.latitude, that.routeDetails.cities[i + 1].middleAddons[middleAddonKeys[m]].city1.longitude),
								            stopover: true
							            })
						            }
						            if (that.routeDetails.cities[i + 1].middleAddons[middleAddonKeys[m]].hasOwnProperty('city2') && typeof that.routeDetails.cities[i + 1].middleAddons[middleAddonKeys[m]].city2 === 'object') {
							            middleAddonWaypoints.push({
								            location: new google.maps.LatLng(that.routeDetails.cities[i + 1].middleAddons[middleAddonKeys[m]].city2.latitude, that.routeDetails.cities[i + 1].middleAddons[middleAddonKeys[m]].city2.longitude),
								            stopover: true
							            })
						            }
						            if (middleAddonWaypoints.length !== 0) {
							            middleAddonWaypoints.forEach(function (item) {
								            that.makeMarker(item.location, that.getBlackIcon(), map, bounds);
							            });
						            }
						            directionsRequest = {
							            origin: new google.maps.LatLng(that.routeDetails.cities[i + 1].city.latitude, that.routeDetails.cities[i + 1].city.longitude),
							            destination: new google.maps.LatLng(that.routeDetails.cities[i + 1].city.latitude, that.routeDetails.cities[i + 1].city.longitude),
							            waypoints: middleAddonWaypoints,
							            optimizeWaypoints: true,
							            travelMode: 'DRIVING'
						            };
						            directionsService.route(directionsRequest, function(response, status) {
							            if (status === 'OK') {
								            new google.maps.DirectionsRenderer({
									            map: map,
									            directions: response,
									            suppressMarkers: true,
									            polylineOptions: {
										            strokeColor: "black"
									            }
								            });
							            }
						            });
					            }
				            }
				            
				            
				            position = new google.maps.LatLng(that.routeDetails.cities[i + 1].city.latitude, that.routeDetails.cities[i + 1].city.longitude);
				            that.makeMarker(position, that.getBlackFillIcon(), map, bounds);
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
						            that.makeMarker(item.location, that.getBlackIcon(), map, bounds);
					            });
				            }
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
							            suppressMarkers: true,
							            polylineOptions: {
								            strokeColor: "black"
							            }
						            });
					            } else {
						            window.alert('Directions request failed due to ' + status);
					            }
				            });
			            }
			            map.fitBounds(bounds);
                    }
	            });
            },
	        makeMarker: function (position, icon, map, bounds) {
		        let marker = new google.maps.Marker({
			        position: position,
			        map: map,
			        icon: icon,
			        animation: google.maps.Animation.DROP
		        });
		        bounds.extend(marker.position);
		        return marker;
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
	        }
        }
    }
</script>

<style scoped>
    .google-map {
        width: 100%;
        height: 350px;
        margin: 32px auto 0;
        background: gray;
    }
</style>