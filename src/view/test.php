<?php
    session_start();
    // require_once('../model/Student.php');

    echo $_SESSION['user'] . " " . $_SESSION['user_type'] . " " . $_SESSION['user_id'];

    //if no sessions running redirect to login
    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_destroy();
        header('Location: login.php');
    }

    // $student = new Student();
    // echo "<br>email: " .$student->getEmail();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <php require('./view/header.html'); ?> -->
    <form action="test.php" method="post">
        <input type="submit" value="logout" name="logout">
    </form>
    <h2>hello</h2>
    <!-- <php require('./view/footer.html'); ?> -->
</body>
</html>