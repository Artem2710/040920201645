function initMap() {
    var maps = document.getElementsByClassName("map");
    for (let i = 0; i < maps.length; i++) {
        const map = new google.maps.Map(maps[i], {
            zoom: 12,
            center: { lat: -34.397, lng: 150.644 }
        });
        const geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map, addresses[i]);
    }

}

function geocodeAddress(geocoder, resultsMap, address) {
    geocoder.geocode({ address: address}, (results, status) => {
        if (status === "OK") {
            console.log(23232323);
            console.log(results[0].geometry.location);

            resultsMap.setCenter(results[0].geometry.location);
            new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}