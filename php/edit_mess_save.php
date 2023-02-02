<?php
   if(isset($_POST['edit_mess_button'])){
      echo "ok";

        $file_name = $_POST['edit_old_image'];

    if(isset($_POST['edit_mess_button'])){
          $messname = $_POST['edit_messname'];
          $price = $_POST['edit_price'];
          $messlocation = $_POST['edit_messlocation'];
          $messcontactno = $_POST['edit_messcontactno'];
          $messtype = $_POST['edit_messtype'];
          $messabout = $_POST['edit_messabout'];
          $foodfacility = $_POST['edit_foodfacility'];
          $ownername = $_POST['edit_ownername'];
          $bedavailable = $_POST['edit_bedavailable'];
          $electricity = $_POST['edit_electricity'];
          $extrafacility = $_POST['edit_extrafacility'];
           $bathroom = $_POST['edit_bathroom'];

      $edit_id = $_POST['edit_id'];
      $edit_r_table = $_POST['edit_r_table'];
      
      // check almess table
     if($edit_r_table == "allmesseditid"){
        include 'config.php';
        //  update data from all mess
        $update_data_from_allmess_sql = "UPDATE allmess SET messname = '{$messname}', price = '{$price}', messlocation = '{$messlocation}', messcontactno = '{$messcontactno}', messtype = '{$messtype}', messabout = '{$messabout}', foodfacility = '{$foodfacility}', ownername = '{$ownername}', bedavailable = '{$bedavailable}', electricity = '{$electricity}', extrafacility = '{$extrafacility}', bathroom = '{$bathroom}' WHERE id={$edit_id}";

        $result2 = mysqli_query($conn,$update_data_from_allmess_sql);
        if($result2){
           header('location:../settings/your_activity.php');
        }else{
            echo "update failed 57";
        }
     }else{
        echo "next step  ";
     }

     // check showpost table
     if($edit_r_table == "showposteditid"){
        include "config.php";

       $insert_sql1 = "INSERT INTO allmess (messname,price,messlocation,messcontactno,messtype,messabout,foodfacility,ownername,bedavailable,electricity,extrafacility,bathroom) VALUES ('{$messname}',{$price},'{$messlocation}','{$messcontactno}','{$messtype}','{$messabout}','{$foodfacility}','{$ownername}','{$bedavailable}','{$electricity}','{$extrafacility}','{$bathroom}')";
       
      $result3 = mysqli_query($conn,$insert_sql1);
      if($result3){
         $delete_showpost_sql = "DELETE FROM showpost WHERE id = {$edit_id}";
         $result34 = mysqli_query($conn,$delete_showpost_sql);
         if($result34){
            header("location:../settings/your_activity.php");
         } else{
            echo "failed 53";
         }
      }else{
        echo "insert failed 56";
      }
     }
    }
  }
  mysqli_close($conn);
?>