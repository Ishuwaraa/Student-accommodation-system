<?php

  session_start();
  require_once('../model/dbutil.php');

  if(isset($_SESSION['user'])){
    if(time() - $_SESSION['login_time_stamp'] > 3600){
      session_destroy();
    }
    
    if($_SESSION['user_type'] !== 'landlord'){
        header('Location: index.php');
    }

    if(isset($_GET['landlord']) && isset($_GET['id'])){
        $adIds = DbUtil::getRelatedAdIds($_SESSION['user_id']);
        $notAllowed = true;

        foreach($adIds as $adId){
            if($_GET['id'] == $adId){
                $notAllowed = false;
                break;
            }
        }

        if($notAllowed){
            header('Location: index.php');
        }
    }else{
      header('Location: index.php');
    }
  }else header('Location: login.php');

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

    <?php 
          $latitude = null;
          $longitude = null;
          // if(!empty($_SESSION['user_type'])) $user = $_SESSION['user_type'];
          if($_SESSION['user_type'] == 'landlord'){ 
            $adDetail = DbUtil::getOnePost($id);
            $latitude = $adDetail->getLatitude();
            $longitude = $adDetail->getLongitude();
    ?>
    <form action="../controller/editPostController.php" method="post">
        <hr class="line">

          <h2>  
            <li>
              <input type="text" value="<?php echo $id ?>" name='cardid' style="margin-left: 5px; display: none;" >
              <input type="text" placeholder="Great Location" value="<?php echo $adDetail->getLocation() ?>" id="location" name="location" required style="margin-left: 5px;" >
            </li>
          </h2>

          <ul class="details-list">
            <li>
                <ion-icon class="icon-green" name="bed-outline"></ion-icon>
                <label for="beds">Beds:</label>
                <!-- <input type="text" placeholder=" Beds" value="<php echo $adDetail->bed ?>" id="beds" name="beds" style="margin-left: 5px;"> -->
                <select id="beds" name="beds" required style="margin-left: 5px;">
                  <option value="">Select an option</option>
                  <option value="1" <?php echo ($adDetail->getBed() == '1') ? 'selected' : ''; ?>>1</option>
                  <option value="2" <?php echo ($adDetail->getBed() == '2') ? 'selected' : ''; ?>>2</option>
                  <option value="3" <?php echo ($adDetail->getBed() == '3') ? 'selected' : ''; ?>>3</option>
                  <option value="4" <?php echo ($adDetail->getBed() == '4') ? 'selected' : ''; ?>>4</option>
                  <option value="5" <?php echo ($adDetail->getBed() == '5') ? 'selected' : ''; ?>>5</option>
                </select>

            </li>
            <li>
                <ion-icon class="icon-green" name="man-outline"></ion-icon>
                <label for="baths">Baths:</label>
                <!-- <input type="text" placeholder="Baths " value="<php echo $adDetail->bath ?>" id="baths" name="baths" style="margin-left: 5px;"> -->
                <select id="baths" name="baths" required style="margin-left: 5px;">
                  <option value="">Select an option</option>
                  <option value="1" <?php echo ($adDetail->getBath() == '1') ? 'selected' : ''; ?>>1</option>
                  <option value="2" <?php echo ($adDetail->getBath() == '2') ? 'selected' : ''; ?>>2</option>
                  <option value="3" <?php echo ($adDetail->getBath() == '3') ? 'selected' : ''; ?>>3</option>
                </select>
            </li>
            <li>
                <ion-icon class="icon-green" name="male-female-outline"></ion-icon>
                <label for="category">Category:</label>
                <select id="category" name="category" required style="margin-left: 5px;">
                  <option value="">Choose category</option>
                  <option value="female" <?php echo ($adDetail->getCategory() == 'female') ? 'selected' : ''; ?>>Female</option>
                  <option value="male" <?php echo ($adDetail->getCategory() == 'male') ? 'selected' : ''; ?>>Male</option>
                </select>
                <!-- <input type="text" placeholder=" Male/Female" value="<php echo $adDetail->category ?>" id="category" name="category" style="margin-left: 5px;"> -->
            </li>
            <li>
                <ion-icon class="icon-green" name="call-outline"></ion-icon>
                <label for="contact">Contact:</label>                
                <input type="text" placeholder=" Phone Number" value="<?php echo $adDetail->getPhone() ?>" id="contact" name="phone" required style="margin-left: 5px;">
            </li>
            <li>
                <ion-icon class="icon-green" name="pricetag-outline"></ion-icon>
                <label for="price">Price (Rs.):</label>
                <input type="text" placeholder=" Your Price Here" value="<?php echo $adDetail->getPrice() ?>" id="price" name="price" required style="margin-left: 5px;">
            </li>
            <li>
                <ion-icon class="icon-green" name="location-outline"></ion-icon>
                <label for="latitude">Latitude:</label>
                <input type="text" placeholder="Latitude" value="<?php echo $adDetail->getLatitude() ?>" id="latitude" name="latitude" required style="margin-left: 5px;">
            </li>
            <li>
                <ion-icon class="icon-green" name="location-outline"></ion-icon>
                <label for="longitude">Longitude:</label>
                <input type="text" placeholder="Longitude" value="<?php echo $adDetail->getLongitude() ?>" id="longitude" name="longitude" required style="margin-left: 5px;">
            </li>
          </ul>    
          <hr class="line">
          <h2 style="color: black;">Description</h2><br>
          <textarea placeholder="Description" id="description" name="description" required style="padding: 10px; padding-top: 20px"><?php echo $adDetail->getDescription() ?></textarea><br><br><br><br>
          
          <div style="position: relative; margin-bottom: 50px">
            <div style="text-align: right;  right: 0; bottom: 0; display: flex;">
                <?php if($_GET['landlord'] == $_SESSION['user_id']){ ?>
                    <button type="submit" style="margin-right: 5px;" class="btn btn-secondary"> Save Changes</button>
                <?php } ?>
            </div>
          </div>

        <?php } ?>
        
    </form>
    
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