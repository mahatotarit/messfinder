<?php
include "config.php";

// home page per.... mess code
if (isset($_GET['success_id'])) {
   $success_id = $_GET['success_id'];
   $success_id_sql = "UPDATE allmess SET p='show' WHERE id={$success_id}";
   if (mysqli_query($conn, $success_id_sql)) {
      header("location:../admin1.php");
   }
}

// delete from allmess
if (isset($_GET['delete_post_from_allmess'])) {
   include 'config.php';
   $delete_post_from_allmess = $_GET['delete_post_from_allmess'];

   $collect_delete_post_from_showpost_sql = "SELECT * FROM allmess WHERE id = {$delete_post_from_allmess}";
   $collect_delete_post_from_showpost_result = mysqli_query($conn, $collect_delete_post_from_showpost_sql);
   $collect_delete_post_row = mysqli_fetch_assoc($collect_delete_post_from_showpost_result);

   unlink("../mess_image/{$collect_delete_post_row['messimage1']}");
   unlink("../mess_image/{$collect_delete_post_row['messimage2']}");
   unlink("../mess_image/{$collect_delete_post_row['messimage3']}");
   unlink("../mess_image/{$collect_delete_post_row['messimage4']}");

   $delete_comment_sql = "DELETE FROM mess_comment WHERE mess_id='{$delete_post_from_allmess}'";
   $delete_comment_sql_result = mysqli_query($conn,$delete_comment_sql);

   $delete_data = "DELETE FROM allmess WHERE id={$delete_post_from_allmess}";
   if(mysqli_query($conn,$delete_data)){
      header("location:../admin.php");
   }else{
      echo "<script>
        alert('mess delete unsuccessful');
      </script>";
   }
}


// hide from allmess
if (isset($_GET['hide_from_allmess'])) {
   include 'config.php';
   $hide_from_showpost = $_GET['hide_from_allmess'];

   $hide_id_sql = "UPDATE allmess SET p='hide' WHERE id={$hide_from_showpost}";
   if (mysqli_query($conn, $hide_id_sql)) {
      header("location:../admin.php");
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

   unlink("../mess_image/{$image_row['messimage1']}");
   unlink("../mess_image/{$image_row['messimage2']}");
   unlink("../mess_image/{$image_row['messimage3']}");
   unlink("../mess_image/{$image_row['messimage4']}");

   $delete_comment_sql = "DELETE FROM mess_comment WHERE mess_id='{$check_id2}'";
   $delete_comment_sql_result = mysqli_query($conn,$delete_comment_sql);

   $mess_check_sql2 = "DELETE FROM allmess WHERE id={$check_id2}";
   $mess_check_result2 = mysqli_query($conn, $mess_check_sql2);
   if ($mess_check_result2) {
      header("location:../admin1.php");
   } else {
      echo "not ok";
   }
}


if (isset($_GET['d_c'])) {
   $delete_comment = $_GET['d_c'];
   $d_c_sql = "DELETE FROM mess_comment WHERE id = '{$delete_comment}'";
   $delete_comment_result = mysqli_query($conn, $d_c_sql);
   if ($delete_comment_result) {
      header("location:../admin3.php");
   } else {
      echo "comment delete failed";
   }
}


mysqli_close($conn);
