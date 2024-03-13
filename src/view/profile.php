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
    <title>Student Accommodation - NSBM</title>
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


                .requests-table {
                width: 100%;
                border-collapse: collapse;
                border-radius: 10px; /* Adding rounded corners to the table */
                overflow: hidden; /* Ensure that the border-radius is applied properly */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Adding a subtle shadow effect */
            }

            .requests-table th, .requests-table td {
                padding: 8px;
                border: none; /* Remove border from table cells */
            }

            .requests-table th {
                background-color: #f2f2f2;
                text-align: left;
                border-bottom: 1px solid #ddd; /* Add border only to table headers */
            }

            .requests-table tr:nth-child(even) {
                background-color: #f2f2f2;
            }


            .approve-btn, .reject-btn {
                padding: 6px 10px;
                border: none;
                cursor: pointer;
            }

            .approve-btn {
                background-color: #34CC33;
                color: white;
                width: 90px;
                border-radius: 10rem;
            }

            .reject-btn {
                background-color: #f44336;
                color: white;
                margin-top: 5px;
                width: 90px;
                border-radius: 10rem;
            }
            .card {
                    position: relative;
                    display: flex;
                    width: 900px; /* Adjust the card width as needed */
                    border: 1px solid #ccc;
                    border-radius: 8px;
                    overflow: hidden;
                    height: 250px;
                    margin-top: 10px;
                }

                .card img {
                    width: 350px; /* Adjust the image width as needed */
                    height: auto; /* Keep the image height unchanged */
                    object-fit: cover;
                    border-top-right-radius:10px ;
                    border-bottom-right-radius:10px ;
                }

                .card-content {
                    position: relative;
                    flex: 1;
                    padding: 20px;
                    margin-left: 40px;
                }

                .title {
                    font-size: 22px;
                    font-weight: bold;
                    margin-bottom: 10px;
                    margin-top: 20px;
                }

                .beds-baths {
                    margin-bottom: 10px;
                }

                .price {
                    font-size: 20px;
                    font-weight: bold;
                    color: #4CAF50; /* Green color for price, you can change it */
                }

                .status {
                    font-size: 18px;
                    color: #888; /* Gray color for status, you can change it */
                }
                .vertical-line {
                    border-left: 1px solid black; /* You can adjust the width and color as needed */
                    height: 150px; /* Adjust the height of the line */
                    margin-top: 10px;
                    margin-left: 20px;
                }
                /* Style for ion-icons */
                ion-icon {
                    font-size: 24px; /* Icon size */
                    color: #34CC33; /* Icon color */
                    padding-top: 10px;
                }

                .action-buttons {
                    position: absolute;
                    top: 10px;
                    right: 10px;
                    display: flex;
                    gap: 10px;
                
                }

                .action-buttons button {
                    padding: 5px 10px;
                    border: none;
                    border-radius: 10rem;
                    cursor: pointer;

                }
                .Change-button{
                    background-color: #34CC33; /* Red color for button background */
                    color: white; /* Text color */
                    transition: background-color 0.3s; 
                }
                .Change-button:hover {
                    background-color: #FFD149; /* Darker red color on hover */
                }

                /* Style for "Delete Ads" button */
                .delete-button {
                    background-color: #ccc; /* Red color for button background */
                    color: white; /* Text color */
                    transition: background-color 0.3s; /* Smooth transition for background color change */
                }

                /* Hover effect for "Delete Ads" button */
                .delete-button:hover {
                    background-color: #f44336; /* Darker red color on hover */
                }


            /* CSS for default card size */
            .card {
                width: 900px; /* Default width */
            }

            /* Media query for smaller screens */
            @media screen and (max-width: 768px) {
                .card {
                    width: 100%; /* Change width to 100% for smaller screens */
                }
            }

            /* Media query for even smaller screens, e.g., mobile devices */
            @media screen and (max-width: 480px) {
                .card {
                    width: 100%; /* Adjust width for smaller mobile screens */
                    /* You can also adjust other properties like font size or padding here */
                }
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
                <label class="profile-label" for="email"><span style="color: red;">*</span>Email:</label>
                <input class="profile-input" type="text" id="email" value="<?php echo $student->getEmail() ?>" name="email" required>
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
                <label class="profile-label" for="email"><span style="color: red;">*</span>Email:</label>
                <input class="profile-input" type="text" id="email" value="<?php echo $landlord->getEmail() ?>" name="email" required>
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
            <label class="profile-label" for="currentPassword"><span style="color: red;">*</span>Current Password:</label>
            <input class="profile-input" type="password" id="currentPassword" name="curpass" required>
            <label class="profile-label" for="newPassword"><span style="color: red;">*</span>New Password: </label>
            <input class="profile-input" type="password" id="newPassword" name="newpass" required>
            <label class="profile-label" for="confirmPassword"><span style="color: red;">*</span>Confirm New Password: </label>
            <input class="profile-input" type="password" id="confirmPassword" name="conpass" required>
            <button class="btn btn-secondary change-btn" type="submit" name="editpass">Save Changes</button>
        </form>
    </div>

    <div class="profile-content" id="deleteAcc" style="display: none;">
        <h3  style="color: black;">Delete Account</h3>
        <br>
        <form action="../controller/deleteProfileController.php" method="post" id="deleteForm">
            <label class="profile-label" for="currentPassword"><span style="color: red;">*</span>Enter Password:</label>
            <input class="profile-input" type="password" id="currentPassword" name="curpass" required>
            <button class="btn btn-secondary change-btn" type="submit" name="deleteacc" style="background-color: #f44336;">Delete Account</button>
        </form>
    </div>
</div>

<?php if($_SESSION['user_type'] == 'landlord') { ?>
    <div class="cart-container" style="margin-top: -50px;">
        <h2 class="cart-heading" style="color: black;">Student Requests</h2>
        <table class="requests-table">
            <thead>
                <tr>
                    <th>Ad ID</th>
                    <th>Student Name</th>
                    <th>Phone Number</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $stdRequests = DbUtil::getStudentRequest($_SESSION['user_id']);
                    foreach($stdRequests as $stdRequest){
                ?>
                    <tr>
                        <td><?php echo $stdRequest->getAdId() ?></td>
                        <td><?php echo $stdRequest->getStdName() ?></td>
                        <td><?php echo $stdRequest->getStdContact() ?></td>
                        <td><?php echo $stdRequest->getStatus() ?></td>
                        <td style="text-align: center;">
                            <a href="../controller/stdReqApproveController.php?id=<?php echo $stdRequest->getId() ?>&status=true" class="approve-btn">Approve</a>
                            <a href="../controller/stdReqApproveController.php?id=<?php echo $stdRequest->getId() ?>&status=false" class="reject-btn">Reject</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div><br>
<?php } elseif($_SESSION['user_type'] == 'student') {?>
    <div class="cart-container" style="margin-top: -50px;">
        <h2 class="cart-heading" style="color: black;">My Requests</h2>
        <table class="requests-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price (Rs.)</th>
                    <th>Contact</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $stdRequests = DbUtil::getStudentRequestJoin($_SESSION['user_id']);
                    foreach($stdRequests as $stdRequest){
                ?>
                    <tr>
                        <td><?php echo $stdRequest->getLocation() ?></td>
                        <td><?php echo $stdRequest->getPrice() ?></td>
                        <td><?php echo $stdRequest->getLandlordContact() ?></td>
                        <td><?php echo $stdRequest->getStatus() ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div><br>
<?php } ?>

<?php if($_SESSION['user_type'] == 'landlord') {?>
    <!-- Card 1-->
    <div class="cart-container">
        <h2  class="cart-heading" style="color: black;">My Ads</h2>
        <section class="property" id="property">
            <div class="container">

                <?php
                    $adDetails = DbUtil::getPost($_SESSION['user_id']);

                    foreach($adDetails as $adDetail){
                        $imagePaths = DbUtil::getImagePath($adDetail->getId());
                ?>
                    <div class="card">
                        <img src="../../assets/images/<?php echo $imagePaths[0]->getImage() ?>" alt="Property Image">
                        <div class="card-content">
                            <div class="title"><?php echo $adDetail->getLocation()?></div>
                            <div style="display: flex; ">
                                <div style=" width: 100px;">
                                    <div class="beds-baths" style="display: flex;"><ion-icon name="bed-outline"></ion-icon> <div style="margin-left: 10px; margin-top: 15px;"> Beds: <?php echo $adDetail->getBed()?> </div></div>
                                    <div class="beds-baths" style="display: flex;"><ion-icon name="man-outline"></ion-icon> <div style="margin-left: 10px; margin-top: 15px;"> Baths: <?php echo $adDetail->getBath()?> </div></div>
                                    <div class="beds-baths" style="display: flex;"> <ion-icon name="key"></ion-icon> <div style="margin-left: 10px; margin-top: 15px;">Ad ID: <?php echo $adDetail->getId()?> </div></div>                           
                                </div>
                                <div class="vertical-line"></div>
                    
                                <div style=" margin-left: 40px; margin-top: 30px;">
                                    <div style="font-size: 24px;">Rs.<?php echo $adDetail->getPrice()?></div>
                                    <div class="status" style="margin-top: 40px; margin-left: 0px;">Status: <?php echo $adDetail->getStatus()?></div>                            
                                    <div>
                                        <?php if($adDetail->getRejectReason() !== null){ ?>
                                        <p style="color: red; font-size: 1.3rem;">Reason: <?php echo $adDetail->getRejectReason()?></p>
                                        <?php } ?>
                                    </div>
                                </div>                        
                            </div>               
                            <div class="action-buttons">
                                <a href="editcard.php?id=<?php echo $adDetail->getId()?>&landlord=<?php echo $adDetail->getLandlord() ?>"><button class="Change-button">Edit Ad</button></a>
                                <button class="delete-button"
                                    onclick="if (confirm('Are you sure you want to delete this post?')) { window.location.href = '../controller/deletePostController.php?id=<?php echo $adDetail->getId()?>'; }">
                                            Delete Ad
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>                  
            </div>
        </section>
    </div>
<?php } ?>


<?php include_once('footer.html') ?>

<!-- custom js link -->
<script src="src/scripts/main.js" defer></script>
<!-- ionicon link -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
document.getElementById("deleteForm").addEventListener("submit", function(event) {
    event.preventDefault();
    if (confirm("Are you sure you want to delete this account?")) {
        this.submit();
    }
});

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
