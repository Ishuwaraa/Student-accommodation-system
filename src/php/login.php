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
    .input-group-text:hover {
        background-color: #ff7e00;
        border-color: #ff7e00;
        transition: 0.2s ease;

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
                <h4 class="fw-bold" style="color: #3cb815;">Accommodation</h4>
                <p class="fw-bold">Log in</p>
                <p style="font-weight: 200;">Shopped with us before? Log in with your details</p>
                <div class="mt-3" >
                    <h7 style="color: #ff7e00; font-weight: 200;">New member?</h7>
                   
                   <a href="register.html" class="btn btn-login">Click here to register<i class='bx bx-right-arrow-alt'></i></a><br>
                   
                </div>
                <p style="font-weight: 200;">Have trouble logging in?<br /> Call us on <span class="text-success" style="color: #3cb815;" >0112224448 </span>(Daily operating hourse 8.00a.m to 8.00p.m)</p>
            </div>
            <div class="col-8 col-md-6">
                <form action="">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" class="form-control" id="email" placeholder="enter email">
                    </div>

                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="password" placeholder="password">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-login" type="submit">Log in<i class='bx bx-right-arrow-alt'></i></button>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>