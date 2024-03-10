<?php
  session_start();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_destroy();
    // echo "<script>window.setTimeout(function(){window.location.href='./login.php'}, 300);</script>";
    echo "<script>window.location.href='./index.php'</script>";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accommodation</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <!-- custom css link -->
  <link rel="stylesheet" href="./style/style.css">
  <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="top">
  
  <!-- #HEADER -->

  <header class="header" data-header>
    <div class="container">

      <a href="index.php" class="logo">
        <ion-icon name="business-outline"></ion-icon> Student Accommodation
      </a>

      <nav class="navbar container" data-navbar>
        <ul class="navbar-list">
          <!-- <li>
            <a href="test.php" class="navbar-link" data-nav-link>Test</a>
          </li>
          <li>
            <a href="testcard.php" class="navbar-link" data-nav-link>Testcards</a>
          </li> -->

          <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] !== 'admin') {?>
          <li>
            <a href="home.php" class="navbar-link" data-nav-link>Map</a>
          </li>
          <?php } ?>

          <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'landlord'){ ?>
            <li>
              <a href="addpost.php" class="navbar-link" data-nav-link>Post your Ad</a>
            </li>
          <?php }?>

          <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin'){ ?>
            <li>
              <a href="addblogpost.php" class="navbar-link" data-nav-link>Add a blog</a>
            </li>
          <?php }?>
          
          <?php if(isset($_SESSION['user']) && ($_SESSION['user_type'] == 'student' || $_SESSION['user_type'] == 'landlord')){ ?>
            <li>
              <a href="profile.php" class="navbar-link" data-nav-link>Profile</a>
            </li>
          <?php }?>
          
          <li>
            <a href="index.php#aboutus" class="navbar-link" data-nav-link>About Us</a>
          </li>

          <li>
            <a href="index.php#blogs" class="navbar-link" data-nav-link>Blogs</a>
          </li>
        </ul>
      </nav>

      <?php if(!isset($_SESSION['user'])){ ?>
        <button onclick="window.location.href = 'login.php'" class="btn btn-secondary">Login</button>
      <?php } else {?>
        <form action="header.php" method="post">
          <button type="submit" name="logout" class="btn btn-secondary">Logout</button>
        </form>
      <?php } ?>


      <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true" class="menu-icon"></ion-icon>
        <ion-icon name="close-outline" aria-hidden="true" class="close-icon"></ion-icon>
      </button>

    </div>
  </header>
</body>
</html>