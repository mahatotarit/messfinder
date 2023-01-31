<?php

if(isset($_FILES['imagename'])){

    if(isset($_FILES['imagename'])){
        $errors = array();
        $file_name = $_FILES["imagename"]['name'];
        $file_size = $_FILES["imagename"]['size'];
        $file_type = $_FILES["imagename"]['type'];
        $file_tmp_name = $_FILES["imagename"]['tmp_name'];

        $type = explode('.',$file_name);
        $a = strtolower(end($type));
        $extensions = array("jpeg","jpg","png","webp");
        if(in_array($a,$extensions) === false){
            $errors[] = "this extensions file not allowed. please choose a jpg or png file";
        }
        if($file_size > 5242880){
            $errors[] = "File size must be 5mb or lower";
        }
        if(empty($errors) == true){
           move_uploaded_file($file_tmp_name,"../mess_image/".$file_name);
        }else{
            print_r($errors);
            die();
        }

    }
  }

  // collect add_mess form data
  // collect add_mess form data

if($_POST['add_mess_button']){
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
    $messcheck = "hide";
    $authorname = $_SESSION['name'];
    $authorphone = $_SESSION['phone'];
    $authoremail = $_SESSION['email'];
    $authorpassword = $_SESSION['password'];

   $insert_sql = "INSERT INTO allmess (messname,price,messlocation,messcontactno,messtype,messabout,foodfacility,ownername,bedavailable,electricity,extrafacility,bathroom,imagename,messcheck,authorname,authorphone,authoremail,authorpassword) VALUES 
   ('{$messname}',{$price},'{$messlocation}','{$messcontactno}','{$messtype}','{$messabout}','{$foodfacility}','{$ownername}','{$bedavailable}','{$electricity}','{$extrafacility}','{$bathroom}','{$file_name}','{$messcheck}','{$authorname}','{$authorphone}','{$authoremail}','{$authorpassword}')";
   
   $insert_result = mysqli_query($conn,$insert_sql);
   if($insert_result){
    header("location:../index.php");
   }else{
    echo "failed";
   }
}
?>