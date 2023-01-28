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

                <form action="p/register-data-set.php" method="POST" id="register-from">
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
            </div>
        </div>
    </div>
</body>

</html>