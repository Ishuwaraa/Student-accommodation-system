<?php
    session_start();
    require_once('../model/dbutil.php');

    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Test cards</h2>
    <a href="index.php">index page</a>

    <?php
        if(isset($_SESSION['user']) && $_SESSION['user_type'] == 'warden'){
            $posts = DbUtil::getAllPosts();
            foreach($posts as $post){
    ?>
        <div>
            <p>ad id: <?php echo $post->getId()?></p>
            <p>landlord id: <?php echo $post->getLandlord()?></p>
            status: <?php echo $post->getStatus()?>
            <a href="card.php?id=<?php echo $post->getId()?>">view post</a>
        </div><br>
    <?php }} ?>

    <?php
        if(isset($_SESSION['user']) && $_SESSION['user_type'] == 'student'){
            $posts = DbUtil::getApprovedPosts();
            foreach($posts as $post){
    ?>
        <div>
            <p>ad id: <?php echo $post->getId()?></p>
            <p>landlord id: <?php echo $post->getLandlord()?></p>
            status: <?php echo $post->getStatus()?>
            <a href="card.php?id=<?php echo $post->getId()?>&landlord=<?php echo $post->getLandlord() ?>">view post</a>
        </div><br>
    <?php }} ?>
</body>
</html>