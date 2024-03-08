<?php
    session_start();
    require_once '../model/DbUtil.php';

    if(isset($_GET['id']) && isset($_GET['status'])){
        $id = $_GET['id'];
        $status = $_GET['status'];

        //else statment wont work if used truthy in php - if($status)
        if($status == 'true'){
            $isSuccess = DbUtil::wardenApproval($id, 'approved');
            if($isSuccess){
                header('Location: ../view/index.php');
            }else{
                echo "<script>alert('Sorry, could not update the status.')</script>";
                echo "<script>window.setTimeout(function(){window.location.href='../view/index.php'}, 500);</script>";
            }
        }elseif($status == 'false'){
            $isSuccess = DbUtil::wardenApproval($id, 'rejected');
            if($isSuccess){
                header('Location: ../view/index.php');
            }else{
                echo "<script>alert('Sorry, could not update the status.')</script>";
                echo "<script>window.setTimeout(function(){window.location.href='../view/index.php'}, 500);</script>";
            }
        }
    }
?>