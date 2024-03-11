<?php
    session_start();
    require_once('../model/dbutil.php');

    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    }else{
        if($_SESSION['user_type'] !== 'admin') header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/styles/index.css">
    <link rel="stylesheet" href="../../public/styles/style.css">
      <!-- google font link -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .cart-container {
            max-width: 1080px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .cart-heading {
            margin-bottom: 10px;
        }

        .post-box {
            position: relative;
        }
        .edit-icon {
            margin-top: 6px;
            margin-right: 6px;
            background-color: white;
            padding: 5px;
            border-radius: 0.5rem;
          
        }

        .edit-dropdown {
            position: absolute;
            top: 0;
            right: 0;
            display: none;
            background-color: #fff;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .edit-dropdown button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background: none;
            cursor: pointer;
            text-align: left;
        }

        .edit-dropdown button:hover {
            background-color: #f1f1f1;
        }

        .edit-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php include_once('header.php') ?>
<br><br>
<div class="cart-container">
    <h2 class="cart-heading" style="color: black;">Blogs</h2>
    <section>
        <div class="post container">
            <?php $blogs = DbUtil::getBlog();
                    foreach($blogs as $blog){
            ?>
            <!-- Post 1 -->
            <div class="post-box food">
                <div class="edit-dropdown">
                    <button onclick="window.location.href = 'editblog.php?id=<?php echo $blog->getId() ?>'" class="change-blog-btn">Edit Blog</button>
                    <button onclick="if (confirm('Are you sure you want to delete this blog?')) { window.location.href = '../controller/deleteBlogController.php?id=<?php echo $blog->getId()?>'; }" class="delete-blog-btn">Delete Blog</button>
                </div>
                <img src="../../assets/blogimages/<?php echo $blog->getImage() ?>" alt="" class="post-img">
                <br>
                <!-- <input type="text" value="<php echo $blog->getId() ?>" style="display: none;"> -->
                <a href="#" class="post-title"><?php echo $blog->getTitle() ?></a>
                <span class="edit-icon"><ion-icon name="create-outline"></ion-icon></span>
                <div class="post-description-container">
                    <p class="post-description"><?php echo $blog->getDescription() ?></p>
                </div>
            </div>
            <?php } ?>

        </div>
    </section>
</div>

<?php include_once('footer.html') ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var editIcons = document.querySelectorAll('.edit-icon');
        var editDropdowns = document.querySelectorAll('.edit-dropdown');

        // Function to toggle dropdown visibility
        function toggleDropdown(index) {
            if (editDropdowns[index].style.display === 'block') {
                editDropdowns[index].style.display = 'none';
            } else {
                editDropdowns[index].style.display = 'block';
            }
        }

        // Click event listener for the edit icon of each post
        editIcons.forEach((editIcon, index) => {
            editIcon.addEventListener('click', function (event) {
                event.stopPropagation(); // Prevent the event from bubbling up to the document
                toggleDropdown(index);
            });
        });

        // Click event listener for the document to hide dropdown when clicking outside
        document.addEventListener('click', function (event) {
            editDropdowns.forEach((dropdown) => {
                var isClickInside = dropdown.contains(event.target);
                if (!isClickInside) {
                    dropdown.style.display = 'none';
                }
            });
        });
    });

</script>
<!-- ionicon link -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>
</html>
