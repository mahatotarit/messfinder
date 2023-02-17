<?php
//  check first image
if (isset($_FILES['imagename1'])) {
    $image1 = $_FILES['imagename1'];
    $image1_name = $image1['name'];
    $image1_tmp = $image1['tmp_name'];
    $image1_size = $image1['size'];
    if ($image1_size < 5000000) {
        $image_name1 = time() . "1" . str_replace(' ', "", $image1_name);
    } else {
        echo "Image 1 must be 5mb";
        die();
    }
} else {
    echo "Please Choose Image 1";
    die();
}
//  check second image
if (isset($_FILES['imagename2'])) {
    $image2 = $_FILES['imagename2'];
    $image2_name = $image2['name'];
    $image2_tmp = $image2['tmp_name'];
    $image2_size = $image2['size'];
    if ($image2_size < 5000000) {
        $image_name2 = time() . "2" . str_replace(' ', "", $image2_name);
    } else {
        echo "Image 2 must be 5mb";
        die();
    }
} else {
    echo "Please Choose Image 2";
    die();
}
//  check third image
if (isset($_FILES['imagename3'])) {
    $image3 = $_FILES['imagename3'];
    $image3_name = $image3['name'];
    $image3_tmp = $image3['tmp_name'];
    $image3_size = $image3['size'];
    if ($image3_size < 5000000) {
        $image_name3 = time() . "3" . str_replace(' ', "", $image3_name);
    } else {
        echo "Image 3 must be 5mb";
        die();
    }
} else {
    echo "Please Choose Image 3";
    die();
}
//  check fourth image
if (isset($_FILES['imagename4'])) {
    $image4 = $_FILES['imagename4'];
    $image4_name = $image4['name'];
    $image4_tmp = $image4['tmp_name'];
    $image4_size = $image4['size'];
    if ($image4_size < 5000000) {
        $image_name4 = time() . "4" . str_replace(' ', "", $image4_name);
    } else {
        echo "Image 4 must be 5mb";
        die();
    }
} else {
    echo "Please Choose Image 4";
    die();
}

 include 'config.php';
 $current_mess_id = 0;
 session_start();
 $phone = $_SESSION['phone'];
 $email = $_SESSION['email'];

  $sql = "SELECT id FROM allmess WHERE authorphone='{$phone}' and authoremail='{$email}' ORDER BY id DESC LIMIT 1";
  $id = mysqli_query($conn,$sql);
  if(mysqli_num_rows($id)){
    while($idno = mysqli_fetch_assoc($id)){
        $current_mess_id = $idno['id'];
    }
  }else{
    echo "failed 80";
    die();
  }


  $update_sql = "UPDATE allmess SET messimage1='{$image_name1}',messimage2='{$image_name2}',messimage3='{$image_name3}',messimage4='{$image_name4}' WHERE id={$current_mess_id}";

  $result = mysqli_query($conn,$update_sql);
  if($result){
       move_uploaded_file($image1_tmp, "../mess_image/" . $image_name1);
    move_uploaded_file($image2_tmp, "../mess_image/" . $image_name2);
    move_uploaded_file($image3_tmp, "../mess_image/" . $image_name3);
    move_uploaded_file($image4_tmp, "../mess_image/" . $image_name4);
    echo "ok";
  }else{
    echo "Image Upload Failed";
    die();
  }
?>