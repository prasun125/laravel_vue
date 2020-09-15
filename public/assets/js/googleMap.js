
    $( document ).ready(function() {
        var options = {
            types: ['(cities)'],
            componentRestrictions: {country: "cu"}
        };

        var input = document.getElementById('city_name');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
    });
