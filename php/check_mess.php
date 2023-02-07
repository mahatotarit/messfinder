<?php
if (isset($_GET['success_id'])) {
   include "config.php";
   $success_id = $_GET['success_id'];

   //  collect all post data
   $collect_all_post_data_from_allmess_sql = "SELECT * FROM allmess WHERE id={$success_id}";
   $collect_all_post_data_from_allmess_result = mysqli_query($conn, $collect_all_post_data_from_allmess_sql);
   $collect_all_post_data_row = mysqli_fetch_assoc($collect_all_post_data_from_allmess_result);

   $post_id = $collect_all_post_data_row['id'];
   $post_messname = $collect_all_post_data_row['messname'];
   $post_price = $collect_all_post_data_row['price'];
   $post_messlocation = $collect_all_post_data_row['messlocation'];
   $post_messcontactno = $collect_all_post_data_row['messcontactno'];
   $post_messtype = $collect_all_post_data_row['messtype'];
   $post_messabout = $collect_all_post_data_row['messabout'];
   $post_foodfacility = $collect_all_post_data_row['foodfacility'];
   $post_ownername = $collect_all_post_data_row['ownername'];
   $post_bedavailable = $collect_all_post_data_row['bedavailable'];
   $post_electricity = $collect_all_post_data_row['electricity'];
   $post_extrafacility = $collect_all_post_data_row['extrafacility'];
   $post_imagename = $collect_all_post_data_row['imagename'];
   $post_bathroom = $collect_all_post_data_row['bathroom'];
   $post_authorname = $collect_all_post_data_row['authorname'];
   $post_authorphone = $collect_all_post_data_row['authorphone'];
   $post_authoremail = $collect_all_post_data_row['authoremail'];
   $post_authorpassword = $collect_all_post_data_row['authorpassword'];

   $insert_showpost = "INSERT INTO showpost (id,messname,price,messlocation,messcontactno,messtype,messabout,foodfacility,ownername,bedavailable,electricity,extrafacility,imagename,bathroom,authorname,authorphone,authoremail,authorpassword) VALUES ({$post_id},'{$post_messname}','{$post_price}','{$post_messlocation}','{$post_messcontactno}','{$post_messtype}','{$post_messabout}','{$post_foodfacility}','{$post_ownername}','{$post_bedavailable}','{$post_electricity}','{$post_extrafacility}','{$post_imagename}','{$post_bathroom}','{$post_authorname}','{$post_authorphone}','{$post_authoremail}','{$post_authorpassword}')";

   $insert_showpost_result = mysqli_query($conn, $insert_showpost);
   if ($insert_showpost_result) {
      //delete post from allmess
      $delete_post_from_allmess_sql = "DELETE FROM allmess WHERE id={$success_id}";
      $delete_post_from_allmess_result = mysqli_query($conn, $delete_post_from_allmess_sql);
      if ($delete_post_from_allmess_result) {
         header("location:../admin.php");
      } else {
         echo "delete failed 40";
      }
   } else {
      echo "insert failed 36";
   }
}
if (isset($_GET['delete_post_from_showpost'])) {
   include 'config.php';
   $delete_post_from_showpost = $_GET['delete_post_from_showpost'];

   $collect_delete_post_from_showpost_sql = "SELECT * FROM showpost WHERE id = {$delete_post_from_showpost}";
   $collect_delete_post_from_showpost_result = mysqli_query($conn, $collect_delete_post_from_showpost_sql);
   $collect_delete_post_row = mysqli_fetch_assoc($collect_delete_post_from_showpost_result);

   $post_imagename1 = $collect_delete_post_row['imagename'];
   $post_id1 = $collect_delete_post_row['id'];

   $delete_post_image_sql = "SELECT * FROM showpost WHERE id={$delete_post_from_showpost}";
   $delete_post_image_result = mysqli_query($conn, $delete_post_image_sql);
   $image_row = mysqli_fetch_assoc($delete_post_image_result);
   $image_namae_array = explode(",", $image_row['imagename']);
   
   foreach($image_namae_array as $delete_image){
      unlink("../mess_image/{$delete_image}");
   }


   if (true) {
      $delete_post_from_showpost = "DELETE FROM showpost WHERE id={$post_id1}";
      $delete_post_from_result = mysqli_query($conn, $delete_post_from_showpost);
      if ($delete_post_from_result) {
         header("location:../admin.php");
      } else {
         echo "delete data failed 64";
      }
   }
}

if (isset($_GET['hide_from_showpost'])) {
   include 'config.php';
   $hide_from_showpost = $_GET['hide_from_showpost'];

   $collect_all_post_data_from_allmess_sql1 = "SELECT * FROM showpost WHERE id={$hide_from_showpost}";
   $collect_all_post_data_from_allmess_result1 = mysqli_query($conn, $collect_all_post_data_from_allmess_sql1);
   $collect_all_post_data_row1 = mysqli_fetch_assoc($collect_all_post_data_from_allmess_result1);

   $post_id = $collect_all_post_data_row1['id'];
   $post_messname = $collect_all_post_data_row1['messname'];
   $post_price = $collect_all_post_data_row1['price'];
   $post_messlocation = $collect_all_post_data_row1['messlocation'];
   $post_messcontactno = $collect_all_post_data_row1['messcontactno'];
   $post_messtype = $collect_all_post_data_row1['messtype'];
   $post_messabout = $collect_all_post_data_row1['messabout'];
   $post_foodfacility = $collect_all_post_data_row1['foodfacility'];
   $post_ownername = $collect_all_post_data_row1['ownername'];
   $post_bedavailable = $collect_all_post_data_row1['bedavailable'];
   $post_electricity = $collect_all_post_data_row1['electricity'];
   $post_extrafacility = $collect_all_post_data_row1['extrafacility'];
   $post_imagename = $collect_all_post_data_row1['imagename'];
   $post_bathroom = $collect_all_post_data_row1['bathroom'];
   $post_authorname = $collect_all_post_data_row1['authorname'];
   $post_authorphone = $collect_all_post_data_row1['authorphone'];
   $post_authoremail = $collect_all_post_data_row1['authoremail'];
   $post_authorpassword = $collect_all_post_data_row1['authorpassword'];

   $insert_showpost1 = "INSERT INTO allmess (id,messname,price,messlocation,messcontactno,messtype,messabout,foodfacility,ownername,bedavailable,electricity,extrafacility,imagename,bathroom,authorname,authorphone,authoremail,authorpassword) VALUES ({$post_id},'{$post_messname}','{$post_price}','{$post_messlocation}','{$post_messcontactno}','{$post_messtype}','{$post_messabout}','{$post_foodfacility}','{$post_ownername}','{$post_bedavailable}','{$post_electricity}','{$post_extrafacility}','{$post_imagename}','{$post_bathroom}','{$post_authorname}','{$post_authorphone}','{$post_authoremail}','{$post_authorpassword}')";

   $insert_showpost_result1 = mysqli_query($conn, $insert_showpost1);
   if ($insert_showpost_result1) {
      //delete post from showpost
      $delete_post_from_allmess_sql1 = "DELETE FROM showpost WHERE id={$hide_from_showpost}";
      $delete_post_from_allmess_result1 = mysqli_query($conn, $delete_post_from_allmess_sql1);
      if ($delete_post_from_allmess_result1) {
         header("location:../admin.php");
      } else {
         echo "delete failed 40";
      }
   } else {
      echo "insert failed 36";
   }
}

if (isset($_GET['delete_from_allmess'])) {
   include "config.php";
   $check_id2 = $_GET['delete_from_allmess'];

   //   delete post image
   //   delete post image

   $delete_post_image_sql = "SELECT * FROM allmess WHERE id={$check_id2}";
   $delete_post_image_result = mysqli_query($conn, $delete_post_image_sql);
   $image_row = mysqli_fetch_assoc($delete_post_image_result);
   $image_namae_array = explode(",", $image_row['imagename']);
   print_r($image_namae_array);
   foreach($image_namae_array as $delete_image){
      unlink("../mess_image/{$delete_image}");
   }
   $mess_check_sql2 = "DELETE FROM allmess WHERE id={$check_id2}";
   $mess_check_result2 = mysqli_query($conn, $mess_check_sql2);
   if ($mess_check_result2) {
      header("location:../admin1.php");
   } else {
      echo "not ok";
   }
}
mysqli_close($conn);
