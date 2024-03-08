<?php

    session_start(); 
    require_once('../model/dbutil.php');

    if(!(isset($_SESSION['user']) && ($_SESSION['user_type'] == 'student' || $_SESSION['user_type'] == 'landlord'))){
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile</title>
<link rel="stylesheet" href="../../public/styles/style.css">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
<!-- custom css link -->
<link rel="stylesheet" href="src/style/style.css">
<!-- google font link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap"
    rel="stylesheet">

<style>
  /* Styles for the profile */
  .profile-container {
      max-width: 1080px; /* Adjusted max-width */
      margin: 100px auto;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
  }

  .profile-sidebar {
      flex: 1;
      padding: 0 20px;
      border-right: 1px solid #ccc;
  }

  .profile-content {
      flex: 2;
      padding: 0 20px;
  }

  .profile-label {
      display: block;
      margin-bottom: 10px;
  }
  
  .profile-input {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
  }

  /* Styles for the cart */
  .cart-container {
      max-width: 1080px; /* Adjusted max-width */
      margin: 20px auto;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .cart-heading {
      margin-bottom: 10px;
  }
  .profile-sidebar ul {
    list-style-type: none;
    padding: 0;
}

.profile-sidebar li {
    padding: 20px 0; /* Adjust padding as needed */
}

.profile-sidebar li a {
    margin-left: 50px;
    text-decoration: none;
    color: black;
}

.profile-sidebar li.active {
    background-color: #f0f0f0; /* Change the background color to highlight */
}
.notification-panel {
    position: fixed;
    bottom: 250px;
    right: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 100px 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: none;
}

.notification-panel p {
    margin: 0;
}

.notification-panel button {
    background-color: #007bff;
    color: #fff;
    font-weight: 300;
    font-size: small;
    border: none;
    padding: 5px 10px;
    border-radius: 50px;
    cursor: pointer;
    margin-top: 5px;
 }
 /* Style the dropdown button */
 .dropbtn {
    background-color: transparent;
    color: #000;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }

  /* The container <div> - needed to position the dropdown content */
  .dropdown {
    position: relative;
    display: inline-block;
  }

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #aaffac;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 2;
    border-radius: 0.5rem;
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #ddd;
  }

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }
     /* Style the dropdown to align right */
     .dropdown-right .dropdown-content {
        right: 0; /* Align dropdown content to the right */
    }




</style>
</head>
<body>
<?php include_once('header.php') ?>
<div class="profile-container">
    <div class="profile-sidebar">
        <h2 style="color: black;">User Profile</h2>
        <br>
        <ul>
            <li class="active"><a href="#" onclick="showProfile()">Profile Info</a></li>
            <li><a href="#" onclick="showChangePassword()">Change Password</a></li>
            <li><a href="#" onclick="showDelete()" style="color: red;">Delete Account</a></li> <!-- Added delete account button -->
        </ul>
    </div>
    
    <div class="profile-content" id="profileInfo">
        <div style="display: flex;">
            <h3 style="color: black;">Profile Info</h3>
            <!-- Notification Button -->
            <!-- <button onclick="showPopupNotification()" style="margin-left: 500px;"><ion-icon name="notifications-outline" style="color: rgb(79, 241, 34);"></ion-icon></button> -->
        </div>
        <br>

        <?php 
            if($_SESSION['user_type'] == 'student'){
                $student = DbUtil::getStudentDetails($_SESSION['user_id']);
        ?>
            <form action="../controller/editProfileController.php" method="post">
                <input class="profile-input" type="text" id="id" name="id" value="<?php echo $student->getId() ?>" readonly style="display: none;">
                <label class="profile-label" for="name">Name:</label>
                <input class="profile-input" type="text" id="name" value="<?php echo $student->getName() ?>" name="name">
                <label class="profile-label" for="email">Email:</label>
                <input class="profile-input" type="text" id="email" value="<?php echo $student->getEmail() ?>" name="email">
                <label class="profile-label" for="phone">Phone Number:</label>
                <input class="profile-input" type="text" id="phone" value="<?php echo $student->getContact() ?>" name="contact">
                <button class="btn btn-secondary change-btn" type="submit" name="editprofile">Save Changes</button>
            </form>
        <?php } else{ 
                $landlord = DbUtil::getLandlordDetails($_SESSION['user_id']);
        ?>
            <form action="../controller/editProfileController.php" method="post">
                <input class="profile-input" type="text" id="id" name="id" value="<?php echo $landlord->getId() ?>" readonly style="display: none;">
                <label class="profile-label" for="name">Name:</label>
                <input class="profile-input" type="text" id="name" value="<?php echo $landlord->getName() ?>" name="name">
                <label class="profile-label" for="email">Email:</label>
                <input class="profile-input" type="text" id="email" value="<?php echo $landlord->getEmail() ?>" name="email">
                <label class="profile-label" for="phone">Phone Number:</label>
                <input class="profile-input" type="text" id="phone" value="<?php echo $landlord->getContact() ?>" name="contact">
                <button class="btn btn-secondary change-btn" type="submit" name="editprofile">Save Changes</button>
            </form>
        <?php } ?>
    </div>
    <div class="profile-content" id="changePassword" style="display: none;">
        <h3  style="color: black;">Change Password</h3>
        <br>
        <form action="../controller/editPasswordController.php" method="post">
            <label class="profile-label" for="currentPassword">Current Password:<span style="color: red;">*</span></label>
            <input class="profile-input" type="password" id="currentPassword" name="curpass" required>
            <label class="profile-label" for="newPassword">New Password: <span style="color: red;">*</span></label>
            <input class="profile-input" type="password" id="newPassword" name="newpass" required>
            <label class="profile-label" for="confirmPassword">Confirm New Password: <span style="color: red;">*</span></label>
            <input class="profile-input" type="password" id="confirmPassword" name="conpass" required>
            <button class="btn btn-secondary change-btn" type="submit" name="editpass">Save Changes</button>
        </form>
    </div>

    <div class="profile-content" id="deleteAcc" style="display: none;">
        <h3  style="color: black;">Delete Account</h3>
        <br>
        <form action="../controller/deleteProfileController.php" method="post">
            <label class="profile-label" for="currentPassword">Enter Password:<span style="color: red;">*</span></label>
            <input class="profile-input" type="password" id="currentPassword" name="curpass" required>
            <button class="btn btn-secondary change-btn" type="submit" name="deleteacc">Delete Account</button>
        </form>
    </div>
</div>

<?php if($_SESSION['user_type'] == 'landlord') {?>
<div class="cart-container">
    <h2  class="cart-heading" style="color: black;">My Ads</h2>
    <!-- Add your cart content here -->
    <section class="property" id="property">
        <div class="container">
            <ul class="property-list has-scrollbar" style="overflow-x: auto;">

                <?php
                    $adDetails = DbUtil::getPost($_SESSION['user_id']);

                    foreach($adDetails as $adDetail){
                ?>
                        <!--Card 1-->
                        <li>
                            <div class="property-card"  style="background-color: #ebf9eb;">
                                <div class="dropdown dropdown-right" style="margin-left: 290px;">
                                    <button class="dropbtn">...</button>
                                    <div class="dropdown-content">
                                        <a href="card.php?id=<?php echo $adDetail->id?>">Edit Post</a>
                                        <a href="#">Delete Post</a>
                                    </div>
                                </div>
                                <figure class="card-banner img-holder" style="--width: 800; --height: 533;">
                                    <img src="view/images/property-1.jpg" width="800" height="533" loading="lazy"
                                    alt="10765 Hillshire Ave, Baton Rouge, LA 70810, USA" class="img-cover">
                                </figure>
                                <div class="card-content">
                                    <h3 class="h3">
                                        <a href="#" class="card-title"><?php echo $adDetail->location?></a>
                                    </h3>
                                    <ul class="card-list">
                                        <li class="card-item">
                                            <div class="item-icon">
                                                <ion-icon name="bed-outline"></ion-icon>
                                            </div>
                                            <span class="item-text"><?php echo $adDetail->bed?> Beds</span>
                                        </li>
                                        <li class="card-item">
                                            <div class="item-icon">
                                                <ion-icon name="man-outline"></ion-icon>
                                            </div>
                                            <span class="item-text"><?php echo $adDetail->bath?> Baths</span>
                                        </li>
                                    </ul>
                                    <div class="card-meta">
                                        <div>
                                            <span class="meta-title">Price</span>
                                            <span class="meta-text">Rs.<?php echo $adDetail->price?></span><br>
                                            <span class="meta-title">Status</span>
                                            <span class="meta-text"><?php echo $adDetail->status?></span>
                                            <input type="text" value="<?php echo $adDetail->id?>" style="display: none" name="adId">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                <?php
                    }
                ?>
                
                <br>
            </ul>
        </div>
    </section>
</div>
<?php } ?>

<!-- Notification Panel -->
<!-- <div class="notification-panel" id="notificationPanel">
    <p id="notificationMessage"></p>
    <button onclick="closeNotification()">Close</button>
</div> -->


<?php include_once('footer.html') ?>

<!-- custom js link -->
<script src="src/scripts/main.js" defer></script>
<!-- ionicon link -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
function showProfile() {
    document.getElementById("profileInfo").style.display = "block";
    document.getElementById("changePassword").style.display = "none";
    document.getElementById("deleteAcc").style.display = "none";
}

function showChangePassword() {
    document.getElementById("profileInfo").style.display = "none";
    document.getElementById("changePassword").style.display = "block";
    document.getElementById("deleteAcc").style.display = "none";
}

function showDelete(){
    document.getElementById("deleteAcc").style.display = "block";
    document.getElementById("profileInfo").style.display = "none";
    document.getElementById("changePassword").style.display = "none";
}

function displayNotification(message) {
    var notificationPanel = document.getElementById("notificationPanel");
    var notificationMessage = document.getElementById("notificationMessage");
    notificationMessage.textContent = message;
    notificationPanel.style.display = "block";
}

function closeNotification() {
    document.getElementById("notificationPanel").style.display = "none";
}

function showPopupNotification() {
    var message = "This is a popup notification!";
    displayNotification(message);
}





</script>
<script>
    // Add functionality to close the dropdown when clicked outside of it
    window.onclick = function (event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.style.display === "block") {
            openDropdown.style.display = "none";
        }
        }
    }
    }
</script>
</body>
</html>
