<?php
    session_start();
    require_once('../model/dbutil.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $id = $_POST['id'];

        $isSuccess = DbUtil::updateBlog($id, $title, $description);
        if($isSuccess){
            echo "<script>alert('Blog updated successfully')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/adminblog.php'}, 500);</script>";
        }else{
            echo "<script>alert('Sorry. we could not update your blog.')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/adminblog.php'}, 500);</script>";
        }
    }
?>