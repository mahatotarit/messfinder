
<?php

include 'config.php';
if(isset($_POST['send_notification_btn'])){
if(isset($_FILES['image'])){
    $errors = array();
    $file_name = $_FILES["image"]['name'];
    $file_size = $_FILES["image"]['size'];
    $file_type = $_FILES["image"]['type'];
    $file_tmp_name = $_FILES["image"]['tmp_name'];

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
if(isset($_POST['send_notification_btn'])){
    echo  $heading = $_POST['heading'];
    echo  $about = $_POST['about'];
    echo  $time = date("d m y");
    echo  $file_name = $_FILES["image"]['name'];

      $sql = "INSERT INTO notificatioin (heading,about,image,time) VALUES ('{$heading}','{$about}','{$file_name}','{$time}')" or die("query failed 36");
      $result = mysqli_query($conn,$sql) or die("insert failed 37");
      if($result){
        header("location:../index.php");
      }
    }
}else{
    echo "<div style='text-align:center; color:red;'>Notification Send Failed</div>";
}



// delete notification code
 if(isset($_GET['delete_no'])){
    $delete_no = $_GET['delete_no'];
     $delete_no_sql = "DELETE FROM notificatioin WHERE id={$delete_no}";
    if(mysqli_query($conn,$delete_no_sql)){
        header("location:../settings/notification.php");
    }else{
        echo "<script>alert('Notificatio delete falied');</script>";
        header("location:../settings/notification.php");
    }
 }
?>