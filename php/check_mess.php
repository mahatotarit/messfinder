<?php 
  if(isset($_GET['sid'])){
      include "config.php";
     $check_id = $_GET['sid'];
     $show = "show";    
     $mess_check_sql = "UPDATE allmess SET messcheck='{$show}' WHERE id={$check_id}";
     $mess_check_result = mysqli_query($conn,$mess_check_sql);
     if($mess_check_result){
        header("location:../admin.php");
     }else{
        echo "not ok";
     }

  }
  if(isset($_GET['hid'])){
      include "config.php";
     $check_id1 = $_GET['hid'];
     $show1 = "hide";    
     $mess_check_sql1 = "UPDATE allmess SET messcheck='{$show1}' WHERE id={$check_id1}";
     $mess_check_result1 = mysqli_query($conn,$mess_check_sql1);
     if($mess_check_result1){
        header("location:../admin.php");
     }else{
        echo "not ok";
     }

  }
?>