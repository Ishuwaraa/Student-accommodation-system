<?php
    session_start();
    require_once '../model/DbUtil.php';

    if(isset($_POST['approve']) && isset($_POST['cardid'])){
        $cardId = $_POST['cardid'];
        $description = $_POST['description'];
        $isSuccess = DbUtil::wardenApproval($cardId, 'approved', $description);
        if($isSuccess){
            echo "<script>alert('Post approved successfully.')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/home.php'}, 500);</script>";
            // header('Location: ../view/index.php');
        }else{
            echo "<script>alert('Sorry, could not update the status.')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/home.php'}, 500);</script>";
        }
    }elseif(isset($_POST['reject']) && isset($_POST['cardid'])){
        $cardId = $_POST['cardid'];
        $description = $_POST['description'];
        $isSuccess = DbUtil::wardenApproval($cardId, 'rejected', $description);
        if($isSuccess){
            echo "<script>alert('Post rejected successfully.')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/home.php'}, 500);</script>";
        }else{
            echo "<script>alert('Sorry, could not update the status.')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/home.php'}, 500);</script>";
        }
    }
?>