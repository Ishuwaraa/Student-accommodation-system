<?php

session_start();
require_once('../model/dbutil.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $curpass = $_POST['curpass'];

    if($_SESSION['user_type'] == 'student'){
        $isSuccess = DbUtil::deleteStudentAcc($_SESSION['user_id'], $curpass);
        if($isSuccess){
            session_destroy();
            header('Location: ../view/index.php');
        }else{
            echo "<script>alert('Could not delete account. Try again')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/profile.php'}, 500);</script>";
        }
    }else{
        $isSuccess = DbUtil::deleteLandlordAcc($_SESSION['user_id'], $curpass);
        if($isSuccess){
            session_destroy();
            header('Location: ../view/index.php');
        }else{
            echo "<script>alert('Could not delete account. Try again')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/profile.php'}, 500);</script>";
        }
    }
}

?>