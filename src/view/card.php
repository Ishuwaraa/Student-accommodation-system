<?php

  session_start();
  require_once('../model/dbutil.php');
  if(isset($_SESSION['user'])){
    if(time() - $_SESSION['login_time_stamp'] > 3600){
      session_destroy();
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Accommodation - NSBM</title>
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
  <style>
    .details-list {
        list-style: none;
        padding: 0;
    }

    .details-list li {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .details-list .icon-green {
        color: #34CC33;
        margin-right: 10px;
    }

    .line {
        border: 1px solid #ccc;
    }

    h2 {
        margin-top: 20px;
    }
    .icon-green {
            font-size: 34px; /* Adjust the size as needed */
        }

    #description {
      height: 30vh; /* Set the height as a percentage of the viewport height */
        border: none; /* Hide the border */
        resize: none; /* Prevent resizing of the textarea */
        box-sizing: border-box; /* Include padding and border in the element's total width and height */
        width: 100%; /* Ensure the textarea takes up the full width */
      }
  </style>
<body>
  <?php require('header.php'); ?>
   
  <br>
  <div class="house-details"><br><br><br>
  
    <div class="gallery"> 
      <?php
        if(isset($_GET['id'])) {
          $id = $_GET['id'];
          $imagePaths = DbUtil::getImagePath($id);
      ?>

        <div class="gallery-img-1"><img src="../../assets/images/<?php echo $imagePaths[0]->getImage() ?>" onclick="showImage(this.src)"></div>
      
      <?php
          for($i = 1; $i < count($imagePaths); $i++){
      ?>
            <div><img src="../../assets/images/<?php echo $imagePaths[$i]->getImage() ?>" onclick="showImage(this.src)"></div>
      <?php }} else echo "<script>window.location.href = 'home.php' </script>";?>
    </div>
        
    <!-- The overlay container -->
    <div id="overlay" class="overlay" onclick="hideImage()">
      <img id="zoomed-image" src="" alt="Zoomed Image">
    </div>
    <hr class="line">          

    <?php 
      $adDetail = DbUtil::getOnePost($_GET['id']);  
      $latitude = $adDetail->getLatitude();
      $longitude = $adDetail->getLongitude();
      $locationName = $adDetail->getLocation();
    ?>

    <h2>  
      <li>
        <input type="text" placeholder="Great Location" value="<?php echo $adDetail->getLocation() ?>" id="location" name="location" style="margin-left: 5px;"  readonly>
      </li>
    </h2>

    <ul class="details-list">
      <li>
          <ion-icon class="icon-green" name="bed-outline"></ion-icon>
          <label for="beds">Beds: </label>
          <!-- <input type="text" placeholder=" Beds" value="<php echo $adDetail->getBed() ?>" id="beds" name="beds" style="margin-left: 5px;" readonly> -->
          <p>&nbsp;&nbsp;<?php echo $adDetail->getBed() ?></p>
      </li>
      <li>
          <ion-icon class="icon-green" name="man-outline"></ion-icon>
          <label for="baths">Baths:</label>
          <p>&nbsp;&nbsp;<?php echo $adDetail->getBath() ?></p>
      </li>
      <li>
          <ion-icon class="icon-green" name="male-female-outline"></ion-icon>
          <label for="category">Category:</label>
          <p>&nbsp;&nbsp;<?php echo $adDetail->getCategory() ?></p>
      </li>
      <li>
          <ion-icon class="icon-green" name="call-outline"></ion-icon>
          <label for="contact">Contact:</label>
          <p>&nbsp;&nbsp;<?php echo $adDetail->getPhone() ?></p>
      </li>
      <li>
          <ion-icon class="icon-green" name="pricetag-outline"></ion-icon>
          <label for="price">Price (Rs.):</label>
          <p>&nbsp;&nbsp;<?php echo $adDetail->getPrice() ?></p>
      </li>
    </ul>    
    <hr class="line">    
    <h2 style="color: black;">Description</h2><br>
    <p style="margin-bottom: 50px;">&nbsp;&nbsp;<?php echo $adDetail->getDescription() ?></p>

    <div style="position: relative;">
      <?php
        if(isset($_SESSION['user']) && isset($_GET['id'])){
          $id = $_GET['id'];
          
          if($_SESSION['user_type'] == 'student'){
            $std_id = $_SESSION['user_id'];
            $landlord_id = $_GET['landlord'];
      ?>

            <div style="text-align: right;  right: 0; bottom: 0; display: flex;">
              <a href="../controller/studentRequestController.php?id=<?php echo $id ?>&std=<?php echo $std_id ?>&landlord=<?php echo $landlord_id ?>" style="margin-right: 5px;" class="btn btn-secondary">Reserve Property</a>
            </div>

      <?php 
          }elseif($_SESSION['user_type'] == 'warden'){
      ?>
      
            <hr class="line">
            <form action="../controller/postApproveController.php" method="post">
              <h2 style="color: black; margin-bottom: 10px">State a reason for the rejection</h2>
              <textarea placeholder="Type your reason for the rejection" id="description" name="description" style="padding: 10px; padding-top: 20px"></textarea>              
              <div style="text-align: right;  right: 0; bottom: 0; display: flex;">
                <input type="text" name="cardid" value="<?php echo $id ?>" style="display: none;">
                <button type="submit" name="approve" style="margin-right: 5px;" class="btn btn-secondary">Approve</button>
                <button type="submit" name="reject"  class="btn btn-secondary">Reject</button>
              </div>
            </form>

      <?php }} ?>
    </div>


    <hr class="line">
    <div class="map">
        <h3>Location on map </h3>  
        <div id="map"style="width: 100%; height: 400px;"></div>
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

      function initMap() {
        const latitude = <?php echo $latitude; ?>;
        const longitude = <?php echo $longitude; ?>;
        const locationName = '<?php echo $locationName;?>';
        
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13, // Adjust the zoom level as needed
            center: { lat: latitude, lng: longitude }, // Centered on the specified coordinates
        });

        // Create a marker at the specified coordinates
        const marker = new google.maps.Marker({
            position: { lat: latitude, lng: longitude },
            map: map,
            title: locationName //title for the marker
        });
      }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeO69AAyaPeO5KxDmvtgPZ4goRcgMlUjY&callback=initMap" async defer></script>
</body>
</html>