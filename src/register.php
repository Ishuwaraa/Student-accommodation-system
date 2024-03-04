<?php

    session_start();
    include('database.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // $email = $_POST['email'];
        // $name = $_POST['name'];
        // $contact = $_POST['contact'];
        $type = $_POST['acctype'];
        $password = $_POST['password'];

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_NUMBER_INT);

        if($_POST['password'] == $_POST['conpassword']){

            if($type == 'student'){
                try{
                    $sql = "insert into student (name, email, password, contact) values ('$name', '$email', '$password', '$contact')";
                    $result = mysqli_query($conn, $sql);

                    //since its an insert query it returns a boolean.
                    if($result){
                        $_SESSION['user'] = $email;
                        $_SESSION['user_type'] = 'student';
                        header("Location: test.php");
                    }

                }catch(mysqli_sql_exception){
                    echo "<script>alert('An error occurred. Try again later');</script>";
                }
            }else{
                try{
                    $sql = "insert into landlord (name, email, password, contact) values ('$name', '$email', '$password', '$contact')";
                    $result = mysqli_query($conn, $sql);

                    if($result){
                        $_SESSION['user'] = $email;
                        $_SESSION['user_type'] = 'landlord';
                        header("Location: test.php");
                    }
                }catch(mysqli_sql_exception){
                    echo "<script>alert('An error occurred. Try again later');</script>";
                }
            }            
        }else {
            echo "<script>alert('Passwords do not match')</script>";
        }

        mysqli_close($conn);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
     <!--Box icons-->
     <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
    /*Google Fonts*/
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;500;600;700;900&display=swap');
    *{
        font-family: 'Poppins',sans-serif;
    }
    .register-main{
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0; 
        animation: slideDown 0.5s ease-in-out 0.3s forwards; 
    }
    .btn-login {
        background-color: #3cb815;
        border-radius: 0.5rem;
        color:#fff;
        display: flex;
        align-items: center;
        justify-content:space-between;
        column-gap: 00.5rem;
        max-width: 220px;
    }
    .btn-login .bx{
        padding: 4px;
        background: #fff;
        color: #1a2428;
        border-radius: 1rem;
        font-size: 15px;
        margin: auto;
    }
    .btn-login:hover {
        background-color: #ff7e00;
        border-color: #ff7e00;
        transition: 0.2s ease;
    }
    .input-group-text .bi{
        padding: 4px;
        background: #fff;
        color: #1a2428;
        border-radius: 0.5rem;
        font-size: 15px;
        margin: auto;
    }
    @keyframes slideDown {
        from {
            transform: translate(-50%, -60%); 
            opacity: 0; 
        }
        to {
            transform: translate(-50%, -50%);
            opacity: 1;
        }
    }
</style>

</head>
<body style="background: url(login_background.jpg);">
    <div class="container-lg register-main border border-1 " style="background:#fef4ea; border-radius: 0.5rem; backdrop-filter: blur(5px);" >
        <div class="row justify-content-center align-items-center py-4">
            <div class="col-8 col-md-4 mb-5">
                <h4 class="fw-bold"style="color: #3cb815;">Student Accommodation</h4>
                <p class="fw-bold" >Create Account</p>
                <div class="mt-3" >
                    <h6 style="color: #ff7e00; font-family: 'Poppins',sans-serif; font-weight:200 ;">Already has an account?</h6> 
                    <a href="login.php" class="btn btn-login">Click here to Log in<i class='bx bx-right-arrow-alt'></i></a>
                    <br>
                </div>
            </div>
            <div class="col-8 col-md-6">
                <form action="register.php" method="post">
                    <label for="name" class="form-label">Name <span style="color: red">*</span></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" class="form-control" id="name" name="name" placeholder="enter your name" required>
                    </div>

                    <label for="email" class="form-label">Email <span style="color: red">*</span></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="enter email" required>
                    </div>

                    <label for="phone" class="form-label">Account Type <span style="color: red">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="bi bi-person-fill"></i></label>
                            <select class="form-select" id="inputGroupSelect01" name="acctype" required>
                                <option value="">Choose...</option>
                                <option value="student">Student</option>
                                <option value="landlord">Landlord</option>
                                <!-- <option value="3">Three</option> -->
                            </select>
                        </div>
                    </div>

                    <label for="contact" class="form-label">Contact <span style="color: red">*</span></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-phone-fill"></i></span>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="e.g. 0774463785" required>
                    </div>

                    <label for="password" class="form-label">Password <span style="color: red">*</span></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                    </div>

                    <label for="confirm" class="form-label">Confirm password <span style="color: red">*</span></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="confirm" name="conpassword" placeholder="confirm password" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-login" type="submit" name="register">Register<i class='bx bx-right-arrow-alt'></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
    
</body>
</html>