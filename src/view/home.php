<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Location Map</title>
<link rel="stylesheet" href="../../public/styles/style.css">
<!-- google font link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    body{
        font-family: 'League Spartan', sans-serif;
    }

    .map-full-container {
      max-width: auto; /* Adjusted max-width */
      margin: 100px auto;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
  }

.map-container{
    height: 100vh;
    width: 70%;
    float: right;
}

.locations-container {
    height: 100vh;
    width: 30%;
    overflow-y: auto;
    float: left;
    background-color: #f2f2f2;

}

.locations-tab {
    width: 120px; /* Adjust width as needed */
    display: inline-block;
    background-color: #ddd;
    padding: 10px;
    text-align: center;
    cursor: pointer;
    margin-right: 10px; /* Increased margin for spacing */
    transition: background-color 0.3s ease;
    border-bottom-left-radius: 0.5rem;
    border-bottom-right-radius: 0.5rem;
    margin-left: 10px;
}


.locations-tab:hover {
    background-color: #ccc;
}

.locations-tab.active {
    background-color: #fff;
    border-bottom: 2px solid #34CC33;
}

.locations-tab i {
    margin-right: 5px;
}

.locations-list {
    list-style-type: none;
    padding: 0;
}

.locations-item {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    cursor: pointer;
}

.locations-item:hover {
    background-color: #ccc;
}
.location-card {
    display: flex;
    border: 1px solid #ddd;
    margin-bottom: 10px;
    padding: 10px;
    border-radius: .5rem;
}

.location-card img {
    width: 150px; /* Adjust the image width as needed */
    height: auto; /* Adjust the image height as needed */
    margin-right: 10px;
    border-radius: .5rem;

}

.location-card-details {
    flex-grow: 1;
}
.vertical-line {
    width: 1px;
    height: 100%;
    background-color: #ddd;
    margin-right: 10px;
}

.location-card-details h3 {
    margin: 0;
    font-size: 16px;
}

.location-card-details p {
    margin: 5px 0;
}



</style>
</head>
<body>
      <!-- #HEADER -->
      <?php include_once('header.php'); ?>

  <div class="map-full-container">
    <div class="locations-container">
        <div class="locations-tab active" onclick="changeTab(0)" ><i class="fas fa-map-marker-alt"></i> Pending Ads</div>
        <div class="locations-tab" onclick="changeTab(1)"><i class="fas fa-bookmark"></i> Approved</div>
        <div id="bookmarksList" class="locations-content" style="display: none;">
            <!-- Your approved list goes here -->
            <ul class="locations-list">
                <li class="locations-item" onclick="showLocationOnMap(40.7128, -74.0060)">
                    <div class="location-card">
                        <img src="../../assets/images/property-1.jpg" alt="New York City">
                        <a href="login.php">
                        <div class="location-card-details">
                            <h3>New York City</h3>
                            <p>Beds: 2</p>
                            <p>Category: Male</p>
                            <p>Price: $200</p>
                        </div>
                        </a>
                    </div>
                </li>
                
                <li class="locations-item" onclick="showLocationOnMap(48.8566, 2.3522)">Paris</li>
                <li class="locations-item" onclick="showLocationOnMap(35.6895, 139.6917)">Tokyo</li>
                <!-- Add more approved as needed -->
            </ul>
        </div>
        <!--Pending Ads-->
        <ul id="locationList" class="locations-content">
            <li class="locations-item" onclick="showLocationOnMap(8.3359, 80.4129)">
    
                <div class="location-card">
                    <img src="../../assets/images/property-1.jpg" alt="New York City">
                    <div class="location-card-details">
                        <h3>Home</h3>
                        <p>Beds: 2</p>
                        <p>Category: Male</p>
                        <p>Price: $200</p>
                    </div>
                </div>
            </li>
            <li class="locations-item" onclick="showLocationOnMap(6.821497907279392, 80.04155934472485)"> 
                <div class="location-card">
                <img src="../../assets/images/property-1.jpg" alt="New York City">
                <div class="location-card-details">
                    <h3>NSBM</h3>
                    <p>Beds: 2</p>
                    <p>Category: Male</p>
                    <p>Price: $200</p>
                </div>
            </div>
        </li>
            <li class="locations-item" onclick="showLocationOnMap(6.985925179022371, 80.21594507927556)">
                <div class="location-card">
                    <img src="../../assets/images/property-1.jpg" alt="New York City">
                    <div class="location-card-details">
                        <h3>Siri weda madura</h3>
                        <p>Beds: 2</p>
                        <p>Category: Male</p>
                        <p>Price: $200</p>
                    </div>
                </div>
            </li>
            <li class="locations-item" onclick="showLocationOnMap(6.824856837556938, 80.03883593353652)">
                <div class="location-card">
                    <img src="../../assets/images/property-1.jpg" alt="New York City">
                    <div class="location-card-details">
                        <h3>The Bunker</h3>
                        <p>Beds: 2</p>
                        <p>Category: Male</p>
                        <p>Price: $200</p>
                    </div>
                </div>
            </li>
            <li class="locations-item" onclick="showLocationOnMap(6.824974498628604, 80.04175090229923)">
                <div class="location-card">
                    <img src="../../assets/images/property-1.jpg" alt="New York City">
                    <div class="location-card-details">
                        <h3>Sarasavi medura Hostel</h3>
                        <p>Beds: 2</p>
                        <p>Category: Male</p>
                        <p>Price: $200</p>
                    </div>
                </div>
            </li>
            <!-- Add more locations as needed -->
        </ul>
    </div>
    <div class="map-container" id="map"></div>
    
  </div>
   <!--#FOOTER -->

   <?php include_once('footer.html') ?>

  <!-- #BACK TO TOP -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
  </a>
  <!-- custom js link -->
  <script src="./scripts/script.js" defer></script>
  <!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



<!-- Font Awesome CDN -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>

// Initialize and add the map
function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 20, // Adjust the zoom level as needed
        center: { lat: 6.8416, lng: 80.0034 }, // Centered on Sri Lanka
    });
    window.map = map; // Make map accessible globally


    // Add markers for each location
    const locationItems = document.querySelectorAll('#locationList .locations-item');
    locationItems.forEach(item => {
        const [latitude, longitude] = item.getAttribute('onclick').match(/\d+\.\d+/g).map(Number);
        new google.maps.Marker({
            position: { lat: latitude, lng: longitude },
            map,
            title: `${latitude}, ${longitude}`
        });
    });
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
    const tabs = document.querySelectorAll('.locations-tab');
    const lists = document.querySelectorAll('.locations-content');

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
   // Function to show location on map and zoom in/out
   function showLocationOnMap(latitude, longitude) {
        const map = window.map;
        const zoomLevel = map.getZoom(); // Get the current zoom level

        if (zoomLevel === 15) {
            // If the map is already zoomed in, zoom out to default size
            map.setZoom(11); // Set the default zoom level
        } else {
            // Otherwise, zoom in to show the selected location
            map.setCenter({ lat: latitude, lng: longitude });
            map.setZoom(15); // Set the zoom level for the selected location
        }
    }
    
    // Initialize and add the map
function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 11, // Adjust the zoom level as needed
        center: { lat: 6.8416, lng: 80.0034 }, // Centered on Sri Lanka
    });
    window.map = map; // Make map accessible globally


    // Add markers for each location
    const locationItems = document.querySelectorAll('#locationList .locations-item');
    locationItems.forEach(item => {
        const [latitude, longitude] = item.getAttribute('onclick').match(/\d+\.\d+/g).map(Number);
        const marker = new google.maps.Marker({
            position: { lat: latitude, lng: longitude },
            map,
            title: `${latitude}, ${longitude}`
        });

        // Add event listener to the marker to open new page on click
        marker.addListener('click', function() {
            showLocationDetailsPage(latitude, longitude);
        });
    });
}

// Function to show location details page
function showLocationDetailsPage(latitude, longitude) {
    // Construct the URL with latitude and longitude as parameters
    const url = `card.html?lat=${latitude}&lng=${longitude}`;
    
    // Redirect to the URL
    window.location.href = url;
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeO69AAyaPeO5KxDmvtgPZ4goRcgMlUjY&callback=initMap" async defer></script>
</body>
</html>
