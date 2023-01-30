<?php
//   if(isset($_POST['btn'])){
//     echo "ok";
//     if(isset($_FILES['image'])){
//         $errors = array();
//         $file_name = $_FILES["image"]['name'];
//         $file_size = $_FILES["image"]['size'];
//         $file_type = $_FILES["image"]['type'];
//         $file_tmp_name = $_FILES["image"]['tmp_name'];

//         $type = explode('.',$file_name);
//         $a = strtolower(end($type));
//         $extensions = array("jpeg","jpg","png");
//         if(in_array($a,$extensions) === false){
//             $errors[] = "this extensions file not allowed. please choose a jpg or png file";
//         }
//         if($file_size > 5242880){
//             $errors[] = "File size must be 5mb or lower";
//         }
//         if(empty($errors) == true){
//            move_uploaded_file($file_tmp_name,"mess_image/".$file_name);
//         }else{
//             print_r($errors);
//             die();
//         }

//     }
//   }
?>
<!-- <body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image"><br><br>
        <input type="submit">
    </form>
</body>
</html> -->


<?php 
// include "php/config.php";
//             $get_data_sql = "SELECT * FROM allmess WHERE allmess.messname LIKE '%dd%'" or die("query incurrect");
//               $get_data_result = mysqli_query($conn,$get_data_sql) or die("query failed");
//                       if(mysqli_num_rows($get_data_result)){
//                         while($row1 = mysqli_fetch_assoc($get_data_result)){
//                             echo $row1['messname'];
//                             echo "<br>";
//                              }
//                         }
                          ?>