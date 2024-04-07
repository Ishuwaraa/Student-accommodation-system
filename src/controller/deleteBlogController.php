<?php
    session_start();
    require_once('../model/dbutil.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $isSuccess = DbUtil::deleteBlog($id);
        if($isSuccess){
            header('Location: ../view/adminBlog.php');
        }else{
            echo "<script>alert('Sorry. we could not delete your blog.')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/adminblog.php'}, 500);</script>";
        }
    }
?>