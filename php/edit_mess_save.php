<?php
include 'config.php';
if (isset($_POST['edit_mess_button'])) {

   //   $file_name = $_POST['edit_old_image'];

   if (isset($_POST['edit_mess_button'])) {
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
      $id;
      $authorname;
      $authorphone;
      $authoremail;
      $authorpassword;
      $postdate;
      $lat;
      $lng;

      $edit_r_table = $_POST['edit_r_table'];

      $edit_id = $_POST['edit_id'];
      if ($edit_r_table == "allmesseditid") {
         $get_details_mess = "SELECT * FROM allmess WHERE id='{$edit_id}'";
      } else {
         $get_details_mess = "SELECT * FROM showpost WHERE id='{$edit_id}'";
      }
      $get_details_mess_result = mysqli_query($conn, $get_details_mess);
      if (mysqli_num_rows($get_details_mess_result)) {
         while ($row = mysqli_fetch_assoc($get_details_mess_result)) {
            $id = $row['id'];
            $authorname = $row['authorname'];
            $authorphone = $row['authorphone'];
            $authoremail = $row['authoremail'];
            $authorpassword = $row['authorpassword'];
            $postdate = $row['postdate'];
            $lat = $row['lat'];
            $lng = $row['lng'];
         }
      }
      // check almess table
      if ($edit_r_table == "allmesseditid") {
         //  update data from all mess
         $update_data_from_allmess_sql = "UPDATE allmess SET id={$id}, messname = '{$messname}', price = '{$price}', messlocation = '{$messlocation}', messcontactno = '{$messcontactno}', messtype = '{$messtype}', messabout = '{$messabout}', foodfacility = '{$foodfacility}', ownername = '{$ownername}', bedavailable = '{$bedavailable}', electricity = '{$electricity}', extrafacility = '{$extrafacility}', bathroom = '{$bathroom}',authorname='{$authorname}',authorphone='{$authorphone}',authoremail='{$authoremail}',authorpassword='{$authorpassword}',postdate='{$postdate}',lat='{$lat}',lng='{$lng}',p='hide' WHERE id={$edit_id}";

         $result2 = mysqli_query($conn, $update_data_from_allmess_sql);
         if ($result2) {
            header('location:../settings/your_activity.php');
         } else {
            echo "update failed 57";
         }
      } else {
         echo "next step  ";
      }

      // check showpost table
      if ($edit_r_table == "showposteditid") {
         include "config.php";

         $get_image_from_showtable =  "SELECT messimage1,messimage2,messimage3,messimage4 FROM showpost WHERE id='{$edit_id}'";
         $result = mysqli_query($conn, $get_image_from_showtable);
         $final_image = mysqli_fetch_assoc($result);

         $messimage1 = $final_image['messimage1'];
         $messimage2 = $final_image['messimage2'];
         $messimage3 = $final_image['messimage3'];
         $messimage4 = $final_image['messimage4'];

         session_start();
         $authorname = $_SESSION['name'];
         $authorphone = $_SESSION['phone'];
         $authoremail = $_SESSION['email'];
         $authorpassword = $_SESSION['password'];
         $postdate = date("d m y");
         $insert_sql1 = "INSERT INTO allmess (id,messname,price,messlocation,messcontactno,messtype,messabout,foodfacility,ownername,bedavailable,electricity,extrafacility,bathroom,authorname,authorphone,authoremail,authorpassword,postdate,messimage1,messimage2,messimage3,messimage4,lat,lng) VALUES ({$id},'{$messname}',{$price},'{$messlocation}','{$messcontactno}','{$messtype}','{$messabout}','{$foodfacility}','{$ownername}','{$bedavailable}','{$electricity}','{$extrafacility}','{$bathroom}','{$authorname}','{$authorphone}','{$authoremail}','{$authorpassword}','{$postdate}','{$messimage1}','{$messimage2}','{$messimage3}','{$messimage4}','{$lat}','{$lng}')";
         $result3 = mysqli_query($conn, $insert_sql1);
         if ($result3) {
            $delete_showpost_sql = "DELETE FROM showpost WHERE id = {$edit_id}";
            $result34 = mysqli_query($conn, $delete_showpost_sql);
            if ($result34) {
               header("location:../settings/your_activity.php");
            } else {
               echo "failed 53";
            }
         } else {
            echo "insert failed 56";
         }
      }
   }
}else{
   header("location:edit_mess.php?allmesseditid={$_POST['edit_id']}&c_s=0");
}
?>

