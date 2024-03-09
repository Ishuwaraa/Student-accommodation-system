<?php
    session_start();
    require_once('../model/dbutil.php');
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
            <p>ad id: <?php echo $post->id?></p>
            <p>landlord id: <?php echo $post->landlord?></p>
            status: <?php echo $post->status?>
            <a href="card.php?id=<?php echo $post->id?>">view post</a>
        </div><br>
    <?php }} ?>

    <?php
        if(isset($_SESSION['user']) && $_SESSION['user_type'] == 'student'){
            $posts = DbUtil::getApprovedPosts();
            foreach($posts as $post){
    ?>
        <div>
            <p>ad id: <?php echo $post->id?></p>
            <p>landlord id: <?php echo $post->landlord?></p>
            status: <?php echo $post->status?>
            <a href="card.php?id=<?php echo $post->id?>&landlord=<?php echo $post->landlord ?>">view post</a>
        </div><br>
    <?php }} ?>
</body>
</html>