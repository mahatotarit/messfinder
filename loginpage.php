
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
        <?php
        if(isset($_POST['login-btn'])){
            $login_btn = $_POST['login-btn'];
            $login_phone = $_POST['login-phone'];
            $login_password = $_POST['login-password'];

            include "php/config.php";

            $login_sql = "SELECT * FROM user WHERE phone='{$login_phone}' and password='{$login_password}'";
            $login_sql_result = mysqli_query($conn,$login_sql);
            if(mysqli_num_rows($login_sql_result)){
                while($row = mysqli_fetch_assoc($login_sql_result)){

                    session_start();
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    header("location:index.php");
                }
            }else{
                echo "<div style='color:red; text-align:center; font-size:15px; padding:10px 00px 00px 00px; '>user does't exit</div>";
            }
        }
        ?>
        </div>
        </div>
    </div>
</body>
</html>