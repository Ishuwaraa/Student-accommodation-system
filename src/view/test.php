<?php
    session_start();
    require_once('../model/Student.php');
    require_once('../model/dbutil.php');

    // echo $_SESSION['user'] . " " . $_SESSION['user_type'] . " " . $_SESSION['user_id'];
    echo $_SESSION['user_type'] ;

    //if no sessions running redirect to login
    if(!isset($_SESSION['user'])){
        header('Location: login.php');
    }else{
        if($_SESSION['user_type'] == 'student'){
            $student = DbUtil::getStudentDetails($_SESSION['user_id']);
            echo "<br>id: " . $student->getId();
            echo "<br>name: " . $student->getName();
            echo "<br>email: " . $student->getEmail();
            echo "<br>contact: " . $student->getContact();
        }elseif($_SESSION['user_type'] == 'landlord'){
            $landlord = DbUtil::getLandlordDetails($_SESSION['user_id']);
            echo "<br>id: " . $landlord->getId();
            echo "<br>name: " . $landlord->getName();
            echo "<br>email: " . $landlord->getEmail();
            echo "<br>contact: " . $landlord->getContact();
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_destroy();
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
    <!-- <php require('./view/header.html'); ?> -->
    <form action="test.php" method="post">
        <input type="submit" value="logout" name="logout">
    </form>
    <h2>hello</h2>
    <h6>todo: check if the user alr has an account when registering</h6>
    <a href="index.php">index page</a>
    <!-- <php require('./view/footer.html'); ?> -->
</body>
</html>