<?php

  require_once('../model/dbutil.php');


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Details</title>
    <link rel="stylesheet" href="../../public/styles/style.css">
    <link rel="stylesheet" href="../../public/styles/house.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/76bfd3a54b.js" crossorigin="anonymous"></script>
    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap"rel="stylesheet">
  </head>
<body>
<?php require('header.php'); ?>
   
  <br>
    

    <div class="house-details">
      <br>
      <br>
      <br>
      
        <div class="gallery">
          <!-- not set in the db yet -->
          <!-- <div class="gallery-img-1"><img src="../../assets/images/property-1.jpg" onclick="showImage(this.src)"></div> -->

          <?php
            if(isset($_GET['id'])) {
              $id = $_GET['id'];
              $imagePaths = DbUtil::getImagePath($id);

              foreach($imagePaths as $imagePath){
          ?>
            <div><img src="../../assets/images/<?php echo $imagePath->image ?>" onclick="showImage(this.src)"></div>
          <?php }} ?>
        </div>
        
        <!-- The overlay container -->
        <div id="overlay" class="overlay" onclick="hideImage()">
            <img id="zoomed-image" src="" alt="Zoomed Image">
        </div>

    
        <hr class="line">

        <ul class="details-list">
            <li><ion-icon name="bed-outline"></ion-icon>
                <span>You will have the entire flat for you.</span>
            </li>
            <li><i class="fas fa-paint-brush"></i>Enhanced Clean
                <span>This host has committed to StayBnB's cleaning process.</span>
            </li>
            <li><i class="fas fa-map-marker-alt"></i>Great Location
                <span>90% of recent guests gave the location a 5 star rating.</span>
            </li>
            <li><i class="fas fa-heart"></i>Great Check-in Experience
                <span>100% of recent guests gave the check-in process a 5 star rating.</span>
            </li>
        </ul>

        <hr class="line">
        <h2>Description</h2>
        <br>

        <p class="home-description">Guests will be allocated on the ground floor according to availability. You get a comfortable Two bedroom apartment that has a true city feeling. The price quoted is for two guests, at the guest list please mark the number of guest to get the exact price for groups. The guests will be allocated ground floor according to availability. You get the comfortable two bedroom apartment that has a true city feeling.</p>

        <hr class="line">

        <div class="map">
            <h3>Location on map</h3>
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3947.666983691001!2d80.41028307470498!3d8.335848991700383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOMKwMjAnMDkuMSJOIDgwwrAyNCc0Ni4zIkU!5e0!3m2!1sen!2slk!4v1707666774021!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    
    </div>

  
        <!-- #BACK TO TOP -->
        <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
            <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
        </a>
        <!-- custom js link -->
        <script src="./assets/js/script.js" defer></script>
        <!-- ionicon link -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <script>
            // Function to display the zoomed image
            function showImage(src) {
                var overlay = document.getElementById('overlay');
                var zoomedImg = document.getElementById('zoomed-image');
                zoomedImg.src = src;
                overlay.style.display = 'flex';
            }
        
            // Function to hide the zoomed image
            function hideImage() {
                var overlay = document.getElementById('overlay');
                overlay.style.display = 'none';
            }
        </script>
</body>
</html>