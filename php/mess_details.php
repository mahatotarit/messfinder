<?php
if (isset($_FILES['imagename'])) {
    $image = "";

    if (isset($_FILES['imagename'])) {
        foreach ($_FILES['imagename']['name'] as $key => $val) {

            $type = explode('.', $_FILES['imagename']['name'][$key]);
            $a = strtolower(end($type));
            $extensions = array("jpeg", "jpg", "png", "webp");
            if (in_array($a, $extensions) === false) {
                $errors[] = "this extensions file not allowed. please choose a jpg or png file";
                print_r($errors);
                die();
            }
            if ($_FILES['imagename']['size'][$key] < 5242880) {
            } else {
                echo "file size must be 5mb" . $_FILES['imagename']['name'][$key];
                die();
            }

            move_uploaded_file($_FILES['imagename']['tmp_name'][$key], '../mess_image/' . $val.time());
        }

        // collect all image 
        // collect all image 
        foreach ($_FILES['imagename']['name'] as $key => $val) {
            $image = $image . "," . $_FILES["imagename"]['name'][$key].time();
        }
    }
}

//   collect add_mess form data
//   collect add_mess form data

if (isset($_POST['add_mess_button'])) {
    include "config.php";
    $messname = $_POST['messname'];
    $price = $_POST['price'];
    $messlocation = $_POST['messlocation'];
    $messcontactno = $_POST['messcontactno'];
    $messtype = $_POST['messtype'];
    $messabout = $_POST['messabout'];
    $foodfacility = $_POST['foodfacility'];
    $ownername = $_POST['ownername'];
    $bedavailable = $_POST['bedavailable'];
    $electricity = $_POST['electricity'];
    $extrafacility = $_POST['extrafacility'];
    $bathroom = $_POST['bathroom'];
    $add_mess_btn = $_POST['add_mess_button'];

    session_start();
    $authorname = $_SESSION['name'];
    $authorphone = $_SESSION['phone'];
    $authoremail = $_SESSION['email'];
    $authorpassword = $_SESSION['password'];
    $postdate = date("d m y");
    $final_image = substr($image, 1);

    $insert_sql = "INSERT INTO allmess (messname,price,messlocation,messcontactno,messtype,messabout,foodfacility,ownername,bedavailable,electricity,extrafacility,bathroom,imagename,authorname,authorphone,authoremail,authorpassword,postdate) VALUES 
   ('{$messname}',{$price},'{$messlocation}','{$messcontactno}','{$messtype}','{$messabout}','{$foodfacility}','{$ownername}','{$bedavailable}','{$electricity}','{$extrafacility}','{$bathroom}','{$final_image}','{$authorname}','{$authorphone}','{$authoremail}','{$authorpassword}','{$postdate}')";

    $insert_result = mysqli_query($conn, $insert_sql);
    if ($insert_result) {
            header("location:../index.php");
    } else {
        echo "failed  63";
    }
}
mysqli_close($conn);
