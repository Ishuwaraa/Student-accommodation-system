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
        <form action="">
        <hr class="line">
        <h2>  
          <li>
          <input type="text" placeholder="Great Location" id="location" name="location" style="margin-left: 5px;">
        </li>
      </h2>

      <ul class="details-list">
        <li>
            <ion-icon class="icon-green" name="bed-outline"></ion-icon>
            <label for="beds">Beds:</label>
            <input type="text" placeholder=" Beds" id="beds" name="beds" style="margin-left: 5px;">
        </li>
        <li>
            <ion-icon class="icon-green" name="man-outline"></ion-icon>
            <label for="baths">Baths:</label>
            <input type="text" placeholder="Baths " id="baths" name="baths" style="margin-left: 5px;">
        </li>
        <li>
            <ion-icon class="icon-green" name="male-female-outline"></ion-icon>
            <label for="category">Category:</label>
            <input type="text" placeholder=" Male/Female" id="category" name="category" style="margin-left: 5px;">
        </li>
        <li>
            <ion-icon class="icon-green" name="call-outline"></ion-icon>
            <label for="contact">Contact:</label>
            <input type="text" placeholder=" Phone Number" id="contact" name="contact" style="margin-left: 5px;">
        </li>
        <li>
            <ion-icon class="icon-green" name="pricetag-outline"></ion-icon>
            <label for="price">Price:</label>
            <input type="text" placeholder=" Your Price Here" id="price" name="price" style="margin-left: 5px;">
        </li>
    </ul>
    
      
      <hr class="line">
      <h2 style="color: black;">Description</h2>
      <br>
      <div style="position: relative;">
        <textarea placeholder="Description" id="description" name="description"></textarea>
     <br>
     <br>
     <br>
     <br>
     <div style="text-align: right;  right: 0; bottom: 0; display: flex;">
      <button style="margin-right: 5px;" class="btn btn-secondary"> Save Changes</button>
      <button class="btn btn-secondary">Cancel</button>
    </div>
  
      </div>

    </form>
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