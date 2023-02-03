<?php 
  if(isset($_POST['send_btn'])){
    include 'config.php';
   $name = $_POST['name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $message = $_POST['message'];
   session_start();
   $authorphone = $_SESSION['phone'];

   $sql = "INSERT INTO contactus (name,phone,email,message,authorphone) VALUES ('{$name}','{$phone}','{$email}','{$message}','{$authorphone}')";
   $result = mysqli_query($conn,$sql);
   if($result){
     header('location:../setting.php');
   }
  }
?>