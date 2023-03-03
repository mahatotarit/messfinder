<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include "php/dynimic_title.php";
    ?>
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="all-css/registerpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!--<title>Login & Registration Form</title>-->
    <style>
        .loading_hide {
            display: none;
        }

        .loader {
            position: absolute;
            z-index: +1111;
            top: 35%;
            left: 47%;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 100px;
            height: 100px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Register</span>

                <form method="POST" id="register_from" autocomplete="off">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="register-name" class="register-name" placeholder="Enter Your Name  " id="register-name" required>
                        <small>
                            <!-- user name validate -->
                        </small>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <input type="number" name="register-phone" placeholder="Enter Phone No" id="register-number" required>
                        <span>
                            <!-- phone number validation -->

                        </span>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="register-email" class="login-email" placeholder="Enter Your Email" id="register-email" required>
                        <small>
                            <!-- email validation -->
                        </small>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="register-password" class="login-password" placeholder="Enter Your password" id="register-password" required>
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
                <div class="error_div" style="color:red; text-align: center; font-size:12px; padding:3px 0px 2px 0px;"></div>
            </div>
        </div>
    </div>
    <div class="loading_animation_div loading_hide" style=" position:absolute; justify-content:center; align-items:center; top:00px; left:00px; width:100vw; height:100vh; background-color:rgba(132, 132, 132, 0.642);">
        <div class="loader"></div>
    </div>
</body>

</html>
<script>
    let form = document.querySelector('#register_from');
    form.addEventListener("submit", registerfun);

    function registerfun(e) {
        e.preventDefault();
        document.querySelector(".loading_animation_div").setAttribute("class", "loading_animation_div");

        let aj = new XMLHttpRequest();
        aj.open("POST", "php/register.php", true);
        aj.responseType = "text";
        aj.onload = () => {
            if (aj.status === 200) {

                aj.responseTextv = aj.responseText;
                console.log(aj.responseTextv);
                a = /[%()]/;
                // check response text
                if (a.test(aj.responseTextv)) {
                    form.reset();
                    document.querySelector(".loading_animation_div").setAttribute("class", "loading_animation_div");
                    window.location.href = "index.php";
                } else {
                    document.querySelector(".loading_animation_div").setAttribute("class", "loading_animation_div loading_hide");
                    document.querySelector(".error_div").innerHTML = aj.responseTextv;
                }

            } else {
                console.log("register falied");
            }
        }
        let form_data = new FormData(form);
        aj.send(form_data);
    }
</script>