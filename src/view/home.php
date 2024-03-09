<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Location Map</title>

<!-- google font link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'League Spartan', sans-serif;
    }
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

.tab {
    width: 120px; /* Adjust width as needed */
    display: inline-block;
    background-color: #ddd;
    padding: 10px;
    text-align: center;
    cursor: pointer;
    margin-right: 10px; /* Increased margin for spacing */
    transition: background-color 0.3s ease;
    
    margin-left: 10px;
}


.tab:hover {
    background-color: #ccc;
}

.tab.active {
    background-color: #fff;
    border-bottom: 2px solid #3498db;
}

.tab i {
    margin-right: 5px;
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
.card {
    display: flex;
    border: 1px solid #ddd;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: .5rem;
}

.card img {
    width: 150px; /* Adjust the image width as needed */
    height: auto; /* Adjust the image height as needed */
    margin-right: 10px;
    border-radius: .5rem;

}

.card-details {
    flex-grow: 1;
}
.vertical-line {
    width: 1px;
    height: 100%;
    background-color: #ddd;
    margin-right: 10px;
}

.card-details h3 {
    margin: 0;
    font-size: 16px;
}

.card-details p {
    margin: 5px 0;
}


</style>
</head>
<body>
<div id="locations">
    <div class="tab active" onclick="changeTab(0)"><i class="fas fa-map-marker-alt"></i> Pending Ads</div>
    <div class="tab" onclick="changeTab(1)"><i class="fas fa-bookmark"></i> Approved</div>
    <div id="bookmarksList" class="tab-content" style="display: none;">
        <!-- Your bookmarks list goes here -->
        <ul>
            <li onclick="showLocationOnMap(40.7128, -74.0060)">
                <div class="card">
                    <img src="../../assets/images/property-1.jpg" alt="New York City">
                    <div class="card-details">
                        <h3>New York City</h3>
                        <p>Beds: 2</p>
                        <p>Category: Male</p>
                        <p>Price: $200</p>
                    </div>
                </div>
            </li>
            
            <li onclick="showLocationOnMap(48.8566, 2.3522)">Paris</li>
            <li onclick="showLocationOnMap(35.6895, 139.6917)">Tokyo</li>
            <!-- Add more bookmarks as needed -->
        </ul>
    </div>
    <ul id="locationList" class="tab-content">
        <li onclick="showLocationOnMap(8.3359, 80.4129)">

            <div class="card">
                <img src="../../assets/images/property-1.jpg" alt="New York City">
                <div class="card-details">
                    <h3>New York City</h3>
                    <p>Beds: 2</p>
                    <p>Category: Male</p>
                    <p>Price: $200</p>
                </div>
            </div>
        </li>
        <li onclick="showLocationOnMap(40.7128, -74.0060)">New York City</li>
        <li onclick="showLocationOnMap(34.0522, -118.2437)">Los Angeles</li>
        <li onclick="showLocationOnMap(51.5074, -0.1278)">London</li>
        <!-- Add more locations as needed -->
    </ul>
</div>
<div id="map"></div>

<!-- Font Awesome CDN -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

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

// Function to change tab
function changeTab(tabIndex) {
    const tabs = document.querySelectorAll('.tab');
    const lists = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => tab.classList.remove('active'));
    lists.forEach(list => list.style.display = 'none');

    tabs[tabIndex].classList.add('active');
    lists[tabIndex].style.display = 'block';

    if (tabIndex === 1) {
        // If "Bookmarks" tab is clicked, show bookmarks list and hide location list
        const bookmarksList = document.getElementById('bookmarksList');
        bookmarksList.style.display = 'block';

        const locationList = document.getElementById('locationList');
        locationList.style.display = 'none';
    } else {
        // If "Locations" tab is clicked, show location list and hide bookmarks list
        const bookmarksList = document.getElementById('bookmarksList');
        bookmarksList.style.display = 'none';

        const locationList = document.getElementById('locationList');
        locationList.style.display = 'block';
    }
}


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeO69AAyaPeO5KxDmvtgPZ4goRcgMlUjY&callback=initMap" async defer></script>
</body>
</html>
