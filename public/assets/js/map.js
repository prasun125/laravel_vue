function initMap() {
	var i=0;
    $('.map1').each(function () {
    	var cities = JSON.parse(document.getElementById('map-'+i).getAttribute("data-cities"));
		var city_origin, city_dest;
		for (let a = 0; a < cities.length; a++) {
			if (a === 0) {
				if (cities[a] === "Havana, Cuba") {
                    city_origin = '"' + cities[a] + '"';
				}
				else {
                    //city_origin = '"' + cities[a] + ', Cuba"';
                    city_origin = cities[a];
				}

			}
			if (a === cities.length-1) {
                if(cities[a] === "Havana, Cuba") {
                    city_dest = '"' + cities[a] + '"';
                }
                else {
                    //city_dest = '"' + cities[a] + ', Cuba"';
                    city_dest = cities[a];
                }
			}
			console.log(a);
			console.log(city_origin);
			console.log(city_dest);
		}
        var map1 = new google.maps.Map(document.getElementById('map-'+i), {
            zoom: 4,
            center: {lat: -24.345, lng: 134.46}  // cuba.
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
            draggable: true,
            map: map1,
            panel: document.getElementById('right-panel')
        });
        directionsDisplay.addListener('directions_changed', function() {
            computeTotalDistance(directionsDisplay.getDirections());
        });

        displayRoute(city_origin,city_dest, directionsService,
            directionsDisplay,cities);
        i++;
    });
    /*var map1 = new google.maps.Map(document.getElementById('map1'), {
        zoom: 4,
        center: {lat: -24.345, lng: 134.46}  // cuba.
    });

    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer({
        draggable: true,
        map: map1,
        panel: document.getElementById('right-panel')
    });
    directionsDisplay.addListener('directions_changed', function() {
        computeTotalDistance(directionsDisplay.getDirections());
    });

    displayRoute('Havana, CU', 'Nicaro, CU', directionsService,
        directionsDisplay);*/

	/*var map2 = new google.maps.Map(document.getElementById('map2'), {
		zoom: 4,
		center: {lat: -24.345, lng: 134.46}  // cuba.
	});

	
	var directionsService = new google.maps.DirectionsService;
	var directionsDisplay = new google.maps.DirectionsRenderer({
		draggable: true,
		map: map2,
		panel: document.getElementById('right-panel')
	});
    directionsDisplay.addListener('directions_changed', function() {
        computeTotalDistance1(directionsDisplay.getDirections());
    });

    displayRoute1('Havana, CU', 'Nicaro, CU', directionsService,
        directionsDisplay);
	
	var map3 = new google.maps.Map(document.getElementById('map3'), {
		zoom: 4,
		center: {lat: -24.345, lng: 134.46}  // cuba.
	});
	
	var directionsService = new google.maps.DirectionsService;
	var directionsDisplay = new google.maps.DirectionsRenderer({
		draggable: true,
		map: map3,
		panel: document.getElementById('right-panel')
	});
	directionsDisplay.addListener('directions_changed', function() {
		computeTotalDistance3(directionsDisplay.getDirections());
	});
	
	displayRoute3('Havana, CU', 'Nicaro, CU', directionsService,
		directionsDisplay);
	
	var map4 = new google.maps.Map(document.getElementById('map4'), {
		zoom: 4,
		center: {lat: -24.345, lng: 134.46}  // cuba.
	});
	
	var directionsService = new google.maps.DirectionsService;
	var directionsDisplay = new google.maps.DirectionsRenderer({
		draggable: true,
		map: map4,
		panel: document.getElementById('right-panel')
	});
	directionsDisplay.addListener('directions_changed', function() {
		computeTotalDistance4(directionsDisplay.getDirections());
	});
	
	displayRoute4('Havana, CU', 'Nicaro, CU', directionsService,
		directionsDisplay);*/
}

function displayRoute(origin, destination, service, display,cities) {
    var waypts = [];
    var city;
    for(let a = 0; a < cities.length; a++) {
        if(a!=0) {
            if(cities[a] === "Havana, Cuba") {
                city = '"'+cities[a]+'"';
                waypts.push({
                    location: city,
                    stopover: true
                });
            }
            else {
                city = '"'+cities[a]+', Cuba"';
                waypts.push({
                    location: city,
                    stopover: true
                });
            }

        }
        if(a != cities.length-1) {
            if(cities[a] === "Havana, Cuba") {
                city = '"'+cities[a]+'"';
                waypts.push({
                    location: city,
                    stopover: true
                });
            }
            else {
                city = '"'+cities[a]+', Cuba"';
                waypts.push({
                    location: city,
                    stopover: true
                });
            }
        }

    }
    service.route({
        origin: origin,
        destination: destination,
        /*waypoints: [{location: 'Holgiun, CU'}, {location: 'Soroa, CU'}],*/
        waypoints: waypts,
        travelMode: 'DRIVING',
        avoidTolls: true
    }, function(response, status) {
        console.log(status)
        if (status === 'OK') {
            display.setDirections(response);
        } else {
            //alert('Could not display directions due to: ' + status +' between '+origin+' and '+destination);
        }
    });
}

function computeTotalDistance(result) {
    var total = 0;
    var myroute = result.routes[0];
    for (var i = 0; i < myroute.legs.length; i++) {
        total += myroute.legs[i].distance.value;
    }
    total = total / 1000;
    // document.getElementById('total').innerHTML = total + ' km';
}

function displayRoute1(origin, destination, service, display) {
	service.route({
		origin: origin,
		destination: destination,
		waypoints: [{location: 'Holgiun, CU'}, {location: 'Soroa, CU'}],
		travelMode: 'DRIVING',
		avoidTolls: true
	}, function(response, status) {
		if (status === 'OK') {
			display.setDirections(response);
		} else {
			//alert('Could not display directions due to: ' + status);
		}
	});
}

function computeTotalDistance1(result) {
	var total = 0;
	var myroute = result.routes[0];
	for (var i = 0; i < myroute.legs.length; i++) {
		total += myroute.legs[i].distance.value;
	}
	total = total / 1000;
	// document.getElementById('total').innerHTML = total + ' km';
}

function computeTotalDistance3(result) {
	var total = 0;
	var myroute = result.routes[0];
	for (var i = 0; i < myroute.legs.length; i++) {
		total += myroute.legs[i].distance.value;
	}
	total = total / 1000;
	// document.getElementById('total').innerHTML = total + ' km';
}

function displayRoute3(origin, destination, service, display) {
	service.route({
		origin: origin,
		destination: destination,
		waypoints: [{location: 'Holgiun, CU'}, {location: 'Soroa, CU'}],
		travelMode: 'DRIVING',
		avoidTolls: true
	}, function(response, status) {
		if (status === 'OK') {
			display.setDirections(response);
		} else {
			//alert('Could not display directions due to: ' + status);
		}
	});
}

function computeTotalDistance4(result) {
	var total = 0;
	var myroute = result.routes[0];
	for (var i = 0; i < myroute.legs.length; i++) {
		total += myroute.legs[i].distance.value;
	}
	total = total / 1000;
	// document.getElementById('total').innerHTML = total + ' km';
}

function displayRoute4(origin, destination, service, display) {
	service.route({
		origin: origin,
		destination: destination,
		waypoints: [{location: 'Holgiun, CU'}, {location: 'Soroa, CU'}],
		travelMode: 'DRIVING',
		avoidTolls: true
	}, function(response, status) {
		if (status === 'OK') {
			display.setDirections(response);
		} else {
			//alert('Could not display directions due to: ' + status);
		}
	});
}