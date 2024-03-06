<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Location Map</title>
<style>
#map {
    height: 100vh;
    width: 70%;
    float: right;
    }
    #locations {
    height: 100vh;
    width: 30%;
    overflow-y: auto;
    float: left;
    background-color: #f2f2f2;
    }
    ul {
    list-style-type: none;
    padding: 0;
    }
    li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    cursor: pointer;
    }
    li:hover {
    background-color: #ccc;
    }
</style>
</head>
<body>
    <div id="locations">
        <ul id="locationList">
            <li onclick="showLocationOnMap(40.7128, -74.0060)">New York City</li>
            <li onclick="showLocationOnMap(34.0522, -118.2437)">Los Angeles</li>
            <li onclick="showLocationOnMap(51.5074, -0.1278)">London</li>
            <!-- Add more locations as needed -->
        </ul>
    </div>
    <div id="map"></div>
    <script>
    // Initialize and add the map
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 3,
            center: { lat: 0, lng: 0 },
        });
        window.map = map; // Make map accessible globally
    }
    // Function to show location on map
    function showLocationOnMap(latitude, longitude) {
        const map = window.map;
        map.setCenter({ lat: latitude, lng: longitude });
        new google.maps.Marker({
            position: { lat: latitude, lng: longitude },
            map,
            title: `${latitude}, ${longitude}`
        });
        }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    </body>
    </html>
