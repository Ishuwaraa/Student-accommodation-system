<?php

  require_once('../model/dbutil.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Accommodation - NSBM</title>
  <!-- <link rel="icon" type="image/x-icon" href="./assets/logo/favicon.ico"> -->
  <link rel="stylesheet" href="../../public/styles/index.css">


  <!-- favicon -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
  <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap"rel="stylesheet">
</head>
<style>

  .post-description-container::-webkit-scrollbar {
    width: 4px; /* Width of the scrollbar */
    height: 2px; /* Height of the scrollbar */
}

.post-description-container::-webkit-scrollbar-thumb {
    background-color: #34CC33; /* Color of the scrollbar thumb */
    border-radius: 10px; /* Border radius of the scrollbar thumb */
}

.post-description-container::-webkit-scrollbar-track {
    background-color: transparent; /* Color of the scrollbar track */
    border-radius: 10px; /* Border radius of the scrollbar track */
}


</style>

<body id="top">

<?php include_once('header.php'); ?>
  
  <main>
    <article class="article">

      <!-- #HERO -->
      <section class="section hero" aria-label="hero">
        <div class="container">
          <div class="hero-bg">
            <div class="hero-content">
              <h1 class="h1 hero-title">Welcome to <span class="span"> N-Home  </span></h1>
              <p class="hero-text">
                Accommodation finder for NSBM students.
                
              </p>
            </div>
          </div>
        </div>
      </section>

      <!--  #SERVICE -->
      <section class="section service" aria-label="service">
        <div class="container" id="#howitworks">
          <h2 class="h2 section-title">How N-Home Works?</h2><br>
          <!-- <p class="section-text">
            A great plateform to buy, sell and rent your properties without any agent or commisions.
          </p> -->
          <ul class="service-list">
            <li>
              <div class="service-card">
                <div class="card-icon">
                  <ion-icon name="home-outline"></ion-icon>
                </div>
                <h3 class="h3 card-title">Evaluate Property</h3>
                <p class="card-text">
                "Thoroughly assess various properties showcased on our platform to find the perfect match for your accommodation needs effortlessly."
                </p>
              </div>
            </li>

            <li>
              <div class="service-card">
                <div class="card-icon">
                  <ion-icon name="briefcase-outline"></ion-icon>
                </div>
                <h3 class="h3 card-title">Request Property</h3>
                <p class="card-text">
                "Simply select the property you like and request it with ease, making finding your ideal accommodation straightforward and stress-free."
                </p>
              </div>
            </li>

            <li>
              <div class="service-card">
                <div class="card-icon">
                  <ion-icon name="key"></ion-icon>
                </div>
                <h3 class="h3 card-title">Close the Deal</h3>
                <p class="card-text">
                "Close the deal swiftly and securely, ensuring a seamless transition into your new accommodation with our hassle-free closing process."
                </p>
              </div>
            </li>

          </ul>

        </div>
      </section>
      <br>
     
      <section id="aboutus">
        <div class="about-section">
          <div class="inner-container">
              <h1>About Us</h1>
              <p class="text">
              Welcome to N-Homes, your premier accommodation booking service tailored specifically for students of NSBM Green University. <br>

At NSBM Green University, we prioritize sustainability and excellence in education. As an integral part of this esteemed institution, N-Homes is committed to providing a seamless and convenient platform for NSBM students to find suitable accommodation options.<br><br>

Our website offers a curated selection of rental properties, ensuring that students can easily browse and book accommodations that meet their preferences and budgetary needs. Whether you're seeking a cozy apartment, a shared house, or a private room, N-Homes has you covered.<br><br>

With our user-friendly interface and dedicated support team, navigating the process of securing accommodation has never been easier. We understand the importance of a comfortable living environment conducive to academic success, and we are here to ensure that every NSBM student finds their perfect home away from home.
              </p>
          </div>
      </div>
      </section>

      <section class="property" id="property">
        <div class="container">
          <h2 class="h2 section-title">Blog Posts</h2>
        </div>
      </section>

      <section id="blogs">
        <div class="post container">

          <?php 
            $blogs = DbUtil::getBlog();

            foreach($blogs as $blog){
          ?>        
            <!-- Post 1 -->
            <div class="post-box food">
              <img src="../../assets/blogimages/<?php echo $blog->getImage()?>" alt="" class="post-img">
              <br>
              <a href="#" class="post-title"><?php echo $blog->getTitle() ?></a>
              <div class="post-description-container">
                  <p class="post-description"><?php echo $blog->getDescription() ?></p>
              </div>
            </div>
          <?php } ?>   

        </div>
      </section>

    </article>
  </main>
<?php include_once('footer.html') ?>

  <!-- custom js link -->
  <script src="./assets/js/script.js" defer></script>
  <!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>