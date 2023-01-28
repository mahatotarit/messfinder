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
    <link rel="stylesheet" href="all-css/loginpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!--<title>Login & Registration Form</title>-->
</head>

<body>

    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" id="login-from">
                    <div class="input-field">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <input type="number" name="login-phone" placeholder="Enter Phone No" id="login-number" required>
                        <small></small>
                    </div>
                    <div class="input-field">
                        <input type="password" name="login-password" class="login-password" placeholder="Enter Your password" id="login-password" required>
                        <i class="uil uil-lock icon"></i>
                        <small></small>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <!-- <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div> -->

                        <a href="#" class="text">Forgot password?</a>
                    </div>

                        <!-- login button -->

                    <div class="input-field button">
                        <input type="submit" name="login-btn" value="Login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="registerpage.php" class="text signup-link">Signup Now</a>
                    </span>
                </div>
         </div>
        </div>
        <?php
        $error = " ";
    if(isset($_POST['login-btn'])){
        include "p/conn.php";
        $phone = $_POST['login-phone'];
        $pass = $_POST['login-password'];
        
        $sql = "SELECT * FROM users WHERE phone='{$phone}' and password='{$pass}'";
        $error = "user does't exit";

        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['phone'] = $row['password'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];

                header('location:index.php');
            }
        }else{
            echo "<div style='color:red; text-align:center; font-size:15px; padding:10px; margin-top:-30px;'>". $error."</div>";
        }
    }
?>
    </div>
</body>
</html>