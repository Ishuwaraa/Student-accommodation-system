<?php

    $db_server = 'localhost';
    $db_user = 'root';
    $db_password = 'password';
    $db_name = 'student_accommodation';    

    try{
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
        // if($conn) echo 'connection succesful';
    }catch(mysqli_sql_exception){
        echo 'Could not connect. Try again later!';
    }

?>