<?php
    session_start();
    require_once '../model/DbUtil.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['cardid'];
        $location = $_POST['location'];
        $beds = $_POST['beds'];
        $baths = $_POST['baths'];
        $category = $_POST['category'];
        $phone = $_POST['phone'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];

        $isSuccess = DbUtil::updatePost($id, $beds, $baths, $category, $phone, $price, $description, $location, $latitude, $longitude);
        if($isSuccess){
            echo "<script>alert('Your Ad updated successfully.')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/profile.php'}, 500);</script>";
        }else{
            echo "<script>alert('Sorry, we could not update your ad.')</script>";
            echo "<script>window.setTimeout(function(){window.location.href='../view/profile.php'}, 500);</script>";
        }
    }
?>