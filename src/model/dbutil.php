<?php     

require_once('../model/dbconnect.php');
require_once('../model/Student.php');
require_once('../model/Landlord.php');

class DbUtil {

    public static function getStudent($email, $password){
        $conn = DbConnect::dbConnect();
        $student = null;

        try{
            $sql = "select * from student where email = '$email' and password = '$password'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                // $student = new Student($row['id'], $row['name'], $row['email'], $row['contact']);
                $student = new Student();
                $student->setId($row['id']);
                $student->setName($row['name']);
                $student->setEmail($row['email']);
                $student->setContact($row['contact']);
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        
        return $student;
    }

    public static function getLandlord($email, $password){
        $conn = DbConnect::dbConnect();
        $landlord = null;

        try{
            $sql = "select * from landlord where email = '$email' and password = '$password'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $landlord = new Landlord();
                $landlord->setId($row['id']);
                $landlord->setName($row['name']);
                $landlord->setEmail($row['email']);
                $landlord->setContact($row['contact']);
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        
        return $landlord;
    }

    public static function getWarden($email, $password){
        $conn = DbConnect::dbConnect();
        $result = false;

        try{
            $sql = "select * from warden where email = '$email' and password = '$password'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                $result = true;
            }else $result = false;
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $result;
    }

    public static function getAdmin($email, $password){
        $conn = DbConnect::dbConnect();
        $result = false;

        try{
            $sql = "select * from admin where email = '$email' and password = '$password'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                $result = true;
            }else $result = false;
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $result;
    }

    public static function registerUser($name, $email, $contact, $password, $type){
        $conn = DbConnect::dbConnect();
        $result = false;

        try{
            if($type == 'student'){
                try{
                    $sql = "insert into student (name, email, password, contact) values ('$name', '$email', '$password', '$contact')";
                    $result = mysqli_query($conn, $sql); //since its an insert query it returns a boolean.
                }catch(mysqli_sql_exception){
                    echo "<script>alert('An error occurred. Try again later');</script>";
                }
            }elseif($type == 'landlord'){
                try{
                    $sql = "insert into landlord (name, email, password, contact) values ('$name', '$email', '$password', '$contact')";
                    $result = mysqli_query($conn, $sql);
                }catch(mysqli_sql_exception){
                    echo "<script>alert('An error occurred. Try again later');</script>";
                }
            }else{
                try{
                    $sql = "insert into warden (name, email, password, contact) values ('$name', '$email', '$password', '$contact')";
                    $result = mysqli_query($conn, $sql);
                }catch(mysqli_sql_exception){
                    echo "<script>alert('An error occurred. Try again later');</script>";
                }
            }
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $result;
    }

    public static function getStudentDetails($id){
        $conn = DbConnect::dbConnect();
        $student = null;

        try{
            $sql = "select * from student where id = '$id' ";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $student = new Student();
                $student->setId($row['id']);
                $student->setName($row['name']);
                $student->setEmail($row['email']);
                $student->setContact($row['contact']);
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        
        return $student;
    }

    public static function getLandlordDetails($id){
        $conn = DbConnect::dbConnect();
        $landlord = null;

        try{
            $sql = "select * from landlord where id = '$id' ";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $landlord = new Landlord();
                $landlord->setId($row['id']);
                $landlord->setName($row['name']);
                $landlord->setEmail($row['email']);
                $landlord->setContact($row['contact']);
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        
        return $landlord;
    }

    public static function editStudentProfile($id, $name, $email, $contact){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "update student set name = '$name', email = '$email', contact = '$contact' where id = '$id' ";
            $result = mysqli_query($conn, $sql);

            if($result){
                $isSuccess = true;
            }else $isSuccess = false;
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function editLandlordProfile($id, $name, $email, $contact){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "update landlord set name = '$name', email = '$email', contact = '$contact' where id = '$id' ";
            $result = mysqli_query($conn, $sql);

            if($result){
                $isSuccess = true;
            }else $isSuccess = false;
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function editStudentPass($id, $newpass, $curpass){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "select * from student where id = '$id' and password = '$curpass'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                $q = "update student set password = '$newpass' where id = '$id '";
                $rs = mysqli_query($conn, $q);
                if($rs){
                    $isSuccess = true;
                }else $isSuccess = false;
            }else $isSuccess = false;
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later . $e');</script>";
        }
        return $isSuccess;
    }

    public static function editLandlordPass($id, $newpass, $curpass){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "select * from landlord where id = '$id' and password = '$curpass'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                $q = "update landlord set password = '$newpass' where id = '$id '";
                $rs = mysqli_query($conn, $q);
                if($rs){
                    $isSuccess = true;
                }else $isSuccess = false;
            }else $isSuccess = false;
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function deleteStudentAcc($id, $curpass){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "select * from student where id = '$id' and password = '$curpass'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                $q = "delete from student where id = '$id' ";
                $rs = mysqli_query($conn, $q);
                if($rs){
                    $isSuccess = true;
                }else $isSuccess = false;
            }else $isSuccess = false;
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function deleteLandlordAcc($id, $curpass){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "select * from landlord where id = '$id' and password = '$curpass'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                $q = "delete from landlord where id = '$id' ";
                $rs = mysqli_query($conn, $q);
                if($rs){
                    $isSuccess = true;
                }else $isSuccess = false;
            }else $isSuccess = false;
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function addPost($id, $bed, $category, $phone, $price, $description, $location){
        $conn = DbConnect::dbConnect();
        $foreignId = null;

        try{
            $sql = "insert into adpost values (0, '$bed', '$category', '$phone', '$price', '$description', '$location', 'pending', '$id')";
            $result = mysqli_query($conn, $sql);

            if($result){
                // $row = mysqli_fetch_assoc($result);
                // $foreignId = $row['id'];
                $foreignId = mysqli_insert_id($conn);   //returns the id of an auto incremented row
            }else $foreignId = null;
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $foreignId;
    }

    public static function addImages($adId, $path){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "insert into ad_image values (0, '$adId', '$path') ";
            $result = mysqli_query($conn, $sql);

            if($result){
                $isSuccess = true;
            }else $isSuccess = false;
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function deletePost($id){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "delete from adpost where id = '$id'";
            $result = mysqli_query($conn, $sql);

            if($result){
                $isSuccess = true;
            }else $isSuccess = false;
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }
}

?>