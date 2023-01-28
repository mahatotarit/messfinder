<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="all-css/registerpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!--<title>Login & Registration Form</title>-->
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Register</span>

                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="register-from">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="register-name" class="register-name" placeholder="Enter Your Name  "
                            id="register-name" required>
                        <small>
                            <!-- user name validate -->
                        </small>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <input type="number" name="register-phone" placeholder="Enter Phone No" id="register-number"
                            required>
                            <span>
                                <!-- phone number validation -->

                            </span>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="register-email" class="login-email" placeholder="Enter Your Email"
                            id="register-email" required>
                        <small>
                            <!-- email validation -->
                        </small>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="register-password" class="login-password"
                            placeholder="Enter Your password" id="register-password" required>
                        <small>
                            <!-- password validate -->
                        </small>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <!-- <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label> -->
                        </div>

                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Register" name="register-btn">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Already member?
                        <a href="loginpage.php" class="text signup-link">Login</a>
                    </span>
                </div>

                 <?php  
                   if(isset($_POST['register-btn'])){
                    $register_btn = $_POST['register-btn'];
                    $register_name = $_POST['register-name'];
                    $register_phone = $_POST['register-phone'];
                    $register_email = $_POST['register-email'];
                    $register_password = $_POST['register-password'];

                    include "php/config.php";
                     
                    $phone_check_sql = "SELECT * FROM user WHERE phone = '{$register_phone}'";
                    $phone_check_result = mysqli_query($conn,$phone_check_sql);
                    if(mysqli_num_rows($phone_check_result)){
                        echo "<div style='color:red; text-align:center; font-size:15px; padding:5px 00px 00px 00px;'>Phone Already Register</div>";
                    }else{
                        $insert_register_data_sql = "INSERT INTO user (name,phone,email,password) VALUES ('{$register_name}','{$register_phone}','{$register_email}','{$register_password}')";
                        $insert_register_data_result = mysqli_query($conn,$insert_register_data_sql) or die("register failed");;
                        if($insert_register_data_result){
                            session_start();
                            $_SESSION['name'] = $register_name;
                            $_SESSION['phone'] = $register_phone;
                            $_SESSION['email'] = $register_email;
                            $_SESSION['password'] = $register_password;
                            header("location:index.php");
                        }else{
                            
                        }
                    }
                   }
                 ?>

            </div>
        </div>
    </div>
</body>

</html>