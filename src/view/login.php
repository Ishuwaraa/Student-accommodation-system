<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Student Accommodation - NSBM</title>
    <!--Box icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
       
        body{
            font-family: 'League Spartan', sans-serif;
            background: #ececec;
        }
        /*------------ Login container ------------*/
        .box-area{
            width: 930px;
        }
        /*------------ Right box ------------*/
        .right-box{
            padding: 40px 30px 40px 40px;
        }
        /*------------ Custom Placeholder ------------*/
        ::placeholder{
            font-size: 16px;
        }
        .rounded-4{
            border-radius: 20px;
        }
        .rounded-5{
            border-radius: 30px;
        }
        /*------------ For small screens------------*/
        @media only screen and (max-width: 768px){
            .box-area{
                margin: 0 10px;
            }
            .left-box{
                height: 100px;
                overflow: hidden;
            }
            .right-box{
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
       <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #8DCA3C;">
                <div class="featured-image mb-3">
                    <img src="../../assets/images/loginbackground.jpg" class="img-fluid" style="width: 450px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Welcome to N-Home</p>
                <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Where Every Student Finds Their Home Away From Home!</small>
            </div> 
        
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Hello, Again</h2>
                            <p>We are happy to have you back.</p>
                        </div>
                        <form action="../controller/loginController.php" method="post">
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
                        
                            <div class="input-group mb-3" style="margin-top: 20px;">
                                <button class="btn btn-lg w-100 fs-6" type="submit" name="login" style="background-color: #8DCA3C; color: #fff; border-radius: 10rem;" >Login</button>
                            </div>
                        </form>
                    
                        <div class="row">
                            <small>Don't have account? <a href="register.php">Sign Up</a></small>
                        </div>
                </div>
            </div> 
        </div>
    </div>

    <!--Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>
</html>