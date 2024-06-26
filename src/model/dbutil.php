<?php     

require_once('../model/dbconnect.php');
require_once('../model/Student.php');
require_once('../model/Landlord.php');
require_once('../model/AdDetails.php');
require_once('../model/ImagePaths.php');
require_once('../model/Blog.php');
require_once('../model/StudentRequests.php');

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

    public static function checkRegisteredUser($email, $type){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            if($type == 'student'){
                // $sql = "select * from student where email = '$email' and password = '$password' ";
                $sql = "select * from student where email = '$email' ";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    $isSuccess = true;
                }else $isSuccess = false;
            }
            elseif($type == 'landlord'){
                $sql = "select * from landlord where email = '$email' ";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    $isSuccess = true;
                }else $isSuccess = false;
            }
            else{
                $sql = "select * from warden where email = '$email' ";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    $isSuccess = true;
                }else $isSuccess = false;
            }
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
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
            $sql = "update student set name = ?, email = ?, contact = ? where id = ? ";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $name, $email, $contact, $id);

            // Set the parameters and execute the statement
            $name = $name;
            $email = $email;
            $contact = $contact;
            $id = $id;
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $isSuccess = true;
            } else {
                $isSuccess = false;
            }
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function editLandlordProfile($id, $name, $email, $contact){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "update landlord set name = ?, email = ?, contact = ? where id = ? ";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $name, $email, $contact, $id);

            // Set the parameters and execute the statement
            $name = $name;
            $email = $email;
            $contact = $contact;
            $id = $id;
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $isSuccess = true;
            } else {
                $isSuccess = false;
            }
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

    public static function addPost($id, $bed, $baths, $category, $phone, $price, $description, $location, $latitude, $longitude){
        $conn = DbConnect::dbConnect();
        $foreignId = null;

        try{
            $sql = "insert into adpost values (0, ?, ?, ?, ?, ?, ?, ?, 'pending', ?, ' ', ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssidd", $bed, $baths, $category, $phone, $price, $description, $location, $id, $latitude, $longitude);

            // Set the parameters and execute the statement
            $bed = $bed;
            $baths = $baths;
            $category = $category;
            $phone = $phone;
            $price = $price;
            $description = $description;
            $location = $location; 
            $id = $id;
            $latitude = $latitude;
            $longitude = $longitude;   
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $foreignId = mysqli_insert_id($conn);   //returns the id of an auto incremented row
            } else {
                $foreignId = null;
            }
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

    public static function deleteImagePath($id){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "delete from ad_image where ad_id = '$id'";
            $result = mysqli_query($conn, $sql);

            if($result){
                $isSuccess = true;
            }else $isSuccess = false;
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function updatePost($id, $bed, $bath, $category, $phone, $price, $description, $location, $latitude, $longitude){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "update adpost set bed = ?, baths = ?, category = ?, phone = ?, price = ?, 
            description = ?, location = ?, latitude = ?, longitude = ? where id = ? ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssddi", $bed, $bath, $category, $phone, $price, $description, $location, $latitude, $longitude, $id);

            // Set the parameters and execute the statement
            $bed = $bed;
            $bath = $bath;
            $category = $category;
            $phone = $phone;
            $price = $price;
            $description = $description;
            $location = $location;
            $latitude = $latitude;
            $longitude = $longitude; 
            $id = $id;
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $isSuccess = true;
            } else {
                $isSuccess = false;
            }
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function getPost($landlordid){
        $conn = DbConnect::dbConnect();
        $adDetails = [];

        try{
            $sql = "select * from adpost where landlord_id = '$landlordid' ";
            $result = mysqli_query($conn, $sql);

            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $adDetail = new AdDetails();
                    $adDetail->setId($row['id']);
                    $adDetail->setBed($row['bed']);
                    $adDetail->setBath($row['baths']);
                    $adDetail->setCategory($row['category']);
                    $adDetail->setPhone($row['phone']);
                    $adDetail->setPrice($row['price']);
                    $adDetail->setDescription($row['description']);
                    $adDetail->setLocation($row['location']);
                    $adDetail->setStaus($row['status']);
                    $adDetail->setLatitude($row['latitude']);
                    $adDetail->setLongitude($row['longitude']);
                    $adDetail->setRejectReason($row['reject_reason']);
                    $adDetail->setLandlord($row['landlord_id']);

                    $adDetails[] = $adDetail;   //adding each row to the array
                }
            }
        } catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }

        return $adDetails;
    }

    public static function getOnePost($id){
        $conn = DbConnect::dbConnect();
        $adDetail = null;

        try{
            $sql = "select * from adpost where id = '$id' ";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $adDetail = new AdDetails();
                $adDetail->setId($row['id']);
                $adDetail->setBed($row['bed']);
                $adDetail->setBath($row['baths']);
                $adDetail->setCategory($row['category']);
                $adDetail->setPhone($row['phone']);
                $adDetail->setPrice($row['price']);
                $adDetail->setDescription($row['description']);
                $adDetail->setLocation($row['location']);
                $adDetail->setStaus($row['status']);
                $adDetail->setLandlord($row['landlord_id']);
                $adDetail->setLatitude($row['latitude']);
                $adDetail->setLongitude($row['longitude']);
                $adDetail->setRejectReason($row['reject_reason']);
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }

        return $adDetail;
    }

    public static function getImagePath($adId){
        $conn = DbConnect::dbConnect();
        $imagePaths = [];

        try{
            $sql = "select * from ad_image where ad_id = '$adId' ";
            $result = mysqli_query($conn, $sql);

            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $imagePath = new ImagePaths();
                    $imagePath->setImage($row['image_path']);

                    $imagePaths[] = $imagePath;
                }
            }
        } catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $imagePaths;
    }

    public static function addBlog($title, $description, $image){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "insert into admin_blog values (0, ?, ?, ?) ";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $title, $description, $image);

            // Set the parameters and execute the statement
            $title = $title;
            $description = $description;
            $image = $image;    
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $isSuccess = true;
            } else {
                $isSuccess = false;
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function getBlog(){
        $conn = DbConnect::dbConnect();
        $blogs = [];

        try{
            $sql = "select * from admin_blog";
            $result = mysqli_query($conn, $sql);
            
            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $blog = new Blog();
                    $blog->setId($row['id']);
                    $blog->setTitle($row['title']);
                    $blog->setDescription($row['description']);
                    $blog->setImage($row['image']);

                    $blogs[] = $blog;
                }
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $blogs;
    }

    public static function getOneBlog($id){
        $conn = DbConnect::dbConnect();
        $blog = null;

        try{
            $sql = "select * from admin_blog where id = '$id' ";
            $result = mysqli_query($conn, $sql);
            
            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $blog = new Blog();
                    $blog->setId($row['id']);
                    $blog->setTitle($row['title']);
                    $blog->setDescription($row['description']);
                    $blog->setImage($row['image']);
                }
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $blog;
    }

    public static function updateBlog($id, $title, $description){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "update admin_blog set title = ?, description = ? where id = ? ";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $title, $description, $id);

            // Set the parameters and execute the statement
            $title = $title;
            $description = $description;
            $id = $id;
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $isSuccess = true;
            } else {
                $isSuccess = false;
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function deleteBlog($id){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "delete from admin_blog where id = '$id' ";
            $result = mysqli_query($conn, $sql);

            if($result) $isSuccess = true;
            else $isSuccess = false;
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function wardenApproval($id, $status, $description){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            //for sql injection and also to accept special characters like commas and stuff
            $sql = "update adpost set status = ?, reject_reason = ? where id = ?";

            // Bind parameters to the statement
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $status, $description, $id);   //string, string, int

            // Set the parameters and execute the statement
            $status = $status;
            $description = $description;
            $id = $id;
            $stmt->execute();

            // Check for success or handle errors as needed
            if ($stmt->affected_rows > 0) {
                $isSuccess = true;
            } else {
                $isSuccess = false;
            }

            // Close the statement
            $stmt->close();
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function getAllPosts(){
        $conn = DbConnect::dbConnect();
        $posts = [];

        try{
            $sql = "select * from adpost";
            $result = mysqli_query($conn, $sql);

            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $post = new AdDetails();
                    $post->setId($row['id']);
                    $post->setBed($row['bed']);
                    $post->setBath($row['baths']);
                    $post->setCategory($row['category']);
                    $post->setPhone($row['phone']);
                    $post->setPrice($row['price']);
                    $post->setDescription($row['description']);
                    $post->setLocation($row['location']);
                    $post->setStaus($row['status']);
                    $post->setLandlord($row['landlord_id']);
                    $post->setLatitude($row['latitude']);
                    $post->setLongitude($row['longitude']);

                    $posts[] = $post;   //adding each row to the array
                }
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $posts;
    }

    public static function getApprovedPosts(){
        $conn = DbConnect::dbConnect();
        $posts = [];

        try{
            $sql = "select * from adpost where status = 'approved' ";
            $result = mysqli_query($conn, $sql);

            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $post = new AdDetails();
                    $post->setId($row['id']);
                    $post->setBed($row['bed']);
                    $post->setBath($row['baths']);
                    $post->setCategory($row['category']);
                    $post->setPhone($row['phone']);
                    $post->setPrice($row['price']);
                    $post->setDescription($row['description']);
                    $post->setLocation($row['location']);
                    $post->setStaus($row['status']);
                    $post->setLandlord($row['landlord_id']);
                    $post->setLatitude($row['latitude']);
                    $post->setLongitude($row['longitude']);

                    $posts[] = $post;   //adding each row to the array
                }
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $posts;
    }

    public static function addStudentRequest($ad_id, $std_id, $landlord_id, $std_name, $std_contact){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "insert into student_request values (0, '$std_id', '$ad_id', '$landlord_id', '$std_name', '$std_contact', 'pending') ";
            $result = mysqli_query($conn, $sql);

            if($result){
                $isSuccess = true;
            }else $isSuccess = false;
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function getStudentRequest($landlord_id){
        $conn = DbConnect::dbConnect();
        $stdRequests = [];

        try{
            $sql = "select * from student_request where landlord_id = '$landlord_id' ";
            $result = mysqli_query($conn, $sql);

            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $stdRequest = new StudentRequest();
                    $stdRequest->setId($row['id']);
                    $stdRequest->setAdId($row['ad_id']);
                    $stdRequest->setStdName($row['name']);
                    $stdRequest->setStdContact($row['contact']);
                    $stdRequest->setStatus($row['status']);

                    $stdRequests[] = $stdRequest;   //adding each row to the array
                }
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $stdRequests;
    }

    public static function getStudentRequestJoin($stdId){
        $conn = DbConnect::dbConnect();
        $stdRequests = [];

        try{
            $sql = "select req.std_id, req.ad_id, ad.location, req.status, ad.price, ad.phone from student_request req 
            inner join adpost ad on 
            req.ad_id = ad.id where req.std_id = '$stdId' ";
            $result = mysqli_query($conn, $sql);

            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $stdRequest = new StudentRequest();
                    $stdRequest->setAdId($row['ad_id']);
                    $stdRequest->setLocation($row['location']);
                    $stdRequest->setPrice($row['price']);
                    $stdRequest->setLandlordContact($row['phone']);
                    $stdRequest->setStatus($row['status']);

                    $stdRequests[] = $stdRequest;   //adding each row to the array
                }
            }
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $stdRequests;
    }

    public static function updateStdRequest($id, $status){
        $conn = DbConnect::dbConnect();
        $isSuccess = false;

        try{
            $sql = "update student_request set status = '$status' where id = '$id' ";
            $result = mysqli_query($conn, $sql);

            if($result) $isSuccess = true;
            else $isSuccess = false;
        }catch (mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $isSuccess;
    }

    public static function getRelatedAdIds($landlordId){
        $conn = DbConnect::dbConnect();
        $adIds = [];
    
        try{
            $sql = "select id from adpost where landlord_id = '$landlordId'";
            $result = mysqli_query($conn, $sql);
    
            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $adIds[] = $row['id'];
                }
            }
        }catch(mysqli_sql_exception $e){
            echo "<script>alert('An error occurred. Try again later');</script>";
        }
        return $adIds;
    }
}


?>