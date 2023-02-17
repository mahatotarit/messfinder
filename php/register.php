
<?php
if (!empty($_POST['register-name'])) {
    $user_name = $_POST['register-name'];
    if (preg_match('/^[A-z 0-9 ]/', trim($user_name))) {
    } else {
        echo "Please Enter Username";
        die();
    }
}

if (!empty($_POST['register-phone'])) {
    $user_phone = $_POST['register-phone'];
    if (preg_match('/^[0-9]{10}$/', trim($user_phone))) {
    } else {
        echo "Invalid Phone Number";
        die();
    }
}

if (!empty($_POST['register-email'])) {
    $user_email = $_POST['register-email'];
    $regex = '/^[_a-z0-9-]+@[a-z0-9-]{5}+(\.[a-z0-9-]+)*(\.[a-z]{3})$/';
    if (preg_match($regex, $user_email)) {
    } else {
        echo  "Enter Valid Email";
        die();
    }
}
//Validates password 
$real_password="";
$passwordn="";
if (!empty($_POST["register-password"])) {
    $password = $_POST["register-password"];

    if (strlen($_POST["register-password"]) <= '3') {
        echo  "Your Password Must Contain At Least 4 Characters!";
        die();
    }
    $real_password = $password;
    $passwordn = md5($password);
}

include "config.php";


$phone_check_sql = "SELECT * FROM user WHERE phone = '{$user_phone}'";
$default_image = "profile_image.png";
$phone_check_result = mysqli_query($conn, $phone_check_sql);
if (mysqli_num_rows($phone_check_result)) {
    echo "Phone Already Register";
    die();
} else {
    $phone_check_sql1 = "SELECT * FROM user WHERE email = '{$user_email}'";
    $email_check = mysqli_query($conn, $phone_check_sql1);
    if (mysqli_num_rows($email_check)) {
        echo "Email Address Allready Register";
        die();
    } else {
        echo $insert_register_data_sql = "INSERT INTO user (name,phone,email,password,image,real_password) VALUES ('{$user_name}','{$user_phone}','{$user_email}','{$passwordn}','{$default_image}','{$real_password}')";
        $insert_register_data_result = mysqli_query($conn, $insert_register_data_sql) or die("register failed");;
        if ($insert_register_data_result) {
            session_start();
            $_SESSION['name'] = $user_name;
            $_SESSION['phone'] = $user_phone;
            $_SESSION['email'] = $user_email;
            $_SESSION['password'] = $real_password;
            echo "%()";
        } else {
        }
    }
}
mysqli_close($conn);
?>