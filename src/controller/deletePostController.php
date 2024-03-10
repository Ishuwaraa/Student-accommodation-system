<?php
    require_once '../model/DbUtil.php';
    session_start();

    if(isset($_GET['id'])){
        $isSuccess = DbUtil::deleteImagePath($_GET['id']);
        if($isSuccess){
            $postDeleted = DbUtil::deletePost($_GET['id']);
            if($postDeleted){
                echo "<script>window.setTimeout(function(){window.location.href='../view/profile.php'}, 500);</script>";
            }else{
                echo "<script>alert('Sorry. we had trouble deleting your post Try again later.')</script>";
                echo "<script>window.setTimeout(function(){window.location.href='../view/profile.php'}, 500);</script>";
            }
        }else{
            echo "<script>alert('Sorry. we had trouble deleting your post Try again later.')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/profile.php'}, 500);</script>";
        }
    }
?>