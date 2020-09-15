<template>
	<div class="google-map" id="side-nav-google-map"></div>
</template>

<script>
	import GoogleMapsLoader from 'google-maps'
	//GoogleMapsLoader.KEY = 'AIzaSyBES47VdoPg1hXGS7ibOjoOKaX8vi0EsHs';
	export default {
		name: "SideNavMap",
		props: ['routeDetails', 'allCities', 'suggestedDestination'],
		data: function () {
			return {
			}
		},
		mounted: function () {
			let this2 = this;
			this.displayMap();
		},
		methods: {
			displayMap: function(){
				
				let that = this;
				
				GoogleMapsLoader.load(function(google) {
					// Instantiate a directions service.
					let directionsService = new google.maps.DirectionsService;
					
					// Create a renderer for directions and bind it to the map.
					let directionsDisplay = new google.maps.DirectionsRenderer;
					
					// Instantiate an info window to hold step text.
					let stepDisplay = new google.maps.InfoWindow;
					
					// Create a map and center it on Cuba.
					let map = new google.maps.Map(
						document.getElementById('side-nav-google-map'),
						{
							//center: new google.maps.LatLng(21.685413, -78.953938),
							center: new google.maps.LatLng(21.5218, -77.7812),
							zoom: 6,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						}
					);
					
					let geocoder = new google.maps.Geocoder;
					let infowindow = new google.maps.InfoWindow;
					
					that.geocodePlaceId(geocoder, map, infowindow);
					
					directionsDisplay.setMap(map);
					let waypoints = [];
					if (that.routeDetails.cities.length >= 1) {
						for (let i = 1; i < that.routeDetails.cities.length - 1; i++) {
							waypoints.push({
								location: new google.maps.LatLng(that.routeDetails.cities[i].city.latitude, that.routeDetails.cities[i].city.longitude),
								stopover: true
							});
						}
                        let image = {
                            url: window.location.origin + '/assets/images/icons/location-green-fill-icon.svg',
							/*size: new google.maps.Size(20, 32),*/
                            origin: new google.maps.Point(0, 0),
							/*anchor: new google.maps.Point(10, 32),
							 scaledSize: new google.maps.Size(20, 32)*/
                        };
						waypoints.forEach(function (item) {
							let marker = new google.maps.Marker({
								map: map,
								//draggable: true,
								animation: google.maps.Animation.DROP,
								position: item.location,
								//icon: window.location.origin + '/assets/images/icons/location-icon-black.svg'
								icon: image
							});
						});
						//marker.setMap(map);
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
						});
					}
				});
			},
			geocodePlaceId: function (geocoder, map, infowindow) {
                for (let i = 0; i < this.suggestedDestination.length; i++) {
                	let suggestedCityId = this.suggestedDestination[i].id;
	                let suggestedCityIndex = this.routeDetails.cities.findIndex(function (x) {
		                return x.city.id === suggestedCityId;
	                });
                    if (suggestedCityIndex === -1 && this.suggestedDestination[i].suggested_destination === 1) {
                        let placeId = this.allCities[i].place_id;
	                    var index = i;
	                    var cityId = this.allCities[i].id;
	                    var cityName = this.allCities[i].city_name;
                        geocoder.geocode({'placeId': placeId}, function(results, status) {
                            if (status === 'OK') {
                                if (results[0]) {
                                    map.setZoom(5);
                                    //map.setCenter(results[0].geometry.location);
									let image = {
									    url: window.location.origin + '/assets/images/icons/suggested-city-marker.png',
										/*size: new google.maps.Size(20, 32),*/
										origin: new google.maps.Point(0, 0),
										/*anchor: new google.maps.Point(10, 32),
										scaledSize: new google.maps.Size(20, 32)*/
									};
                                    let marker = new google.maps.Marker({
                                        map: map,
                                        position: results[0].geometry.location,
                                        animation: google.maps.Animation.DROP,
                                        icon: image
                                    });
                                    let contentString = '<div style="min-width: 165px; width: 165px; max-width: 165px;">' +
										'<div class="serial-no font-lato text-center font-white" style="font-weight: bold">' +
										++i +
										'</div>' +
										'<div class="uppercase font-lato text-center marker-city-name">' +
										results[0].formatted_address +
                                		'</div>' +
										'<div class="text-center marker-city-description" style="bottom: 40%; !important;">' +
										'Beautiful landscape in the middle of Cuba' +
										'</div>' +
										'<button class="sleep-here" onclick="sleepHere(' + index + ', ' + cityId + ', \'' + cityName + '\')">sleep here</button>' +
	                                    '</div>';
                                    marker.addListener('mouseover', function () {
                                        infowindow.setContent(contentString);
                                        infowindow.open(map, marker);
                                        marker.setIcon(window.location.origin + '/assets/images/icons/location-orange-fill-icon.svg');
                                    });
                                    marker.addListener('mouseout', function () {
                                        //infowindow.close();
                                        marker.setIcon(window.location.origin + '/assets/images/icons/suggested-city-marker.png');
                                    });
                                } else {
                                    window.alert('No results found');
                                }
                            } else {
                                window.alert('Geocoder failed due to: ' + status);
                            }
                        });
                    }
                }
			},
			/*sleepHere: function(index, cityId, cityName) {
				console.log(index);
				console.log(cityId);
				console.log(cityName);
				console.log('infowindow test action');
				console.log('test',this,vm,vm.$root, this.$root.$refs.createplan.addCityBetween);
			}*/
		}
	}
	
</script>

<style scoped>
	.google-map {
		width: 100%;
		height: 260px;
		margin: 12px auto 0;
		background: gray;
	}
</style>