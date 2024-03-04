<?php

    session_start();
    include('database.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $password = $_POST['password'];
        $type = $_POST['acctype'];
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if($type == 'student'){
            try{
                $sql = "select * from student where email = '$email' and password = '$password'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0){
                    $_SESSION['user'] = $email;
                    $_SESSION['user_type'] = 'student';
                    header('Location: test.php');
                }else echo "<script>alert('Incorrect email or password')</script>";
            }catch (mysqli_sql_exception){
                echo "<script>alert('An error occurred. Try again later');</script>";
            }
        }elseif($type == 'landlord'){
            try{
                $sql = "select * from landlord where email = '$email' and password = '$password'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0){
                    $_SESSION['user'] = $email;
                    $_SESSION['user_type'] = 'landlord';
                    header('Location: test.php');
                }else echo "<script>alert('Incorrect email or password')</script>";
            }catch (mysqli_sql_exception){
                echo "<script>alert('An error occurred. Try again later');</script>";
            }
        }elseif($type == 'warden'){
            try{
                $sql = "select * from warden where email = '$email' and password = '$password'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0){
                    $_SESSION['user'] = $email;
                    $_SESSION['user_type'] = 'warden';
                    header('Location: test.php');
                }else echo "<script>alert('Incorrect email or password')</script>";
            }catch (mysqli_sql_exception){
                echo "<script>alert('An error occurred. Try again later');</script>";
            }
        }else{
            try{
                $sql = "select * from admin where email = '$email' and password = '$password'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)>0){
                    $_SESSION['user'] = $email;
                    $_SESSION['user_type'] = 'admin';
                    header('Location: test.php');
                }else echo "<script>alert('Incorrect email or password')</script>";
            }catch (mysqli_sql_exception $e){
                // echo "<script>alert('An error occurred. Try again later');</script>";
                echo $e;
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
    body{
        background:url(login_background.JPG);
    
    }
    
    .login-main{
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
        max-width: 230px;
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
<body style="background: url(login_background.jpg);  background-size: cover; background-repeat: no-repeat;">
    <div class="container-lg login-main border border-1 " style="background:#fef4ea; border-radius: 0.5rem; backdrop-filter: blur(5px);">
        <div class="row justify-content-center align-items-center py-4">
            <div class="col-8 col-md-4">
                <h4 class="fw-bold" style="color: #3cb815;">Student Accommodation</h4>
                <p class="fw-bold">Log in</p>
                <div class="mt-3" >
                    <h6 style="color: #ff7e00; font-weight: 200;">New member?</h6>
                   
                   <a href="register.php" class="btn btn-login">Click here to register<i class='bx bx-right-arrow-alt'></i></a><br>
                   
                </div>
            </div>
            <div class="col-8 col-md-6">
                <form action="login.php" method="post">
                    <label for="phone" class="form-label">Account Type <span style="color: red">*</span></label>
                    <div class="input-group mb-3">
                        <div class="input-group">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="bi bi-person-fill"></i></label>
                            <select class="form-select" id="inputGroupSelect01" name="acctype" required>
                                <option value="">Choose...</option>
                                <option value="student">Student</option>
                                <option value="landlord">Landlord</option>
                                <option value="warden">Warden</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>

                    <label for="email" class="form-label">Email <span style="color: red">*</span></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="enter email" required>
                    </div>

                    <label for="password" class="form-label">Password <span style="color: red">*</span></label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-login" type="submit" name="login">Log in<i class='bx bx-right-arrow-alt'></i></button>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>