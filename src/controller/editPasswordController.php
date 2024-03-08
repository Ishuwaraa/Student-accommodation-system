<?php

    session_start();
    require_once('../model/dbutil.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $curpass = $_POST['curpass'];
        $newpass = $_POST['newpass'];
        $conpass = $_POST['conpass'];

        if($newpass == $conpass){
            if($_SESSION['user_type'] == 'student'){
                $isSuccess = DbUtil::editStudentPass($_SESSION['user_id'], $newpass, $curpass);
                if($isSuccess){
                    header('Location: ../view/profile.php');
                }else{
                    echo "<script>alert('Could not update password. Try again')</script>";
                    echo "<script>window.setTimeout(function(){window.location.href='../view/profile.php'}, 500);</script>";
                }
            }else{
                $isSuccess = DbUtil::editLandlordPass($_SESSION['user_id'], $newpass, $curpass);
                if($isSuccess){
                    header('Location: ../view/profile.php');
                }else{
                    echo "<script>alert('Could not update password. Try again')</script>";
                    echo "<script>window.setTimeout(function(){window.location.href='../view/profile.php'}, 500);</script>";
                }
            }
        }else{
            echo "<script>alert('Passwords do not match')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/profile.php'}, 500);</script>";
        }
    }

?>