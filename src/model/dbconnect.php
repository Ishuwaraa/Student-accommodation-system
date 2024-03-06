<?php

class DbConnect {
    public static $db_server = 'localhost';
    public static $db_user = 'root';
    public static $db_password = 'password';
    public static $db_name = 'student_accommodation';    
    
    public static function dbConnect(){        
        try{
            $conn = mysqli_connect(self::$db_server, self::$db_user, self::$db_password, self::$db_name);
            // if($conn) echo 'connection succesful';
        }catch(mysqli_sql_exception){
            echo 'Could not connect. Try again later!';
        }

        return $conn;
    }
}
?>