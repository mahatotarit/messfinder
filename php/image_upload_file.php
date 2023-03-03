<?php
if ($_FILES['imagename1']['size'] > 1048576 * 10) {
    echo "first image must be 10mb";
    die();
}
if ($_FILES['imagename2']['size'] > 1048576 * 10) {
    echo "second image  must be 10mb";
    die();
}
if ($_FILES['imagename3']['size'] > 1048576 * 10) {
    echo "third image must be 10mb";
    die();
}
if ($_FILES['imagename4']['size'] > 1048576 * 10) {
    echo "fourth image must be 10mb";
    die();
}

include 'config.php';
$current_mess_id = 0;
session_start();
$phone = $_SESSION['phone'];
$email = $_SESSION['email'];

$img1;
$img2;
$img3;
$img4;
//  check first image
if (isset($_FILES['imagename1'])) {
    $image1 = $_FILES['imagename1'];
    $image1_name = $image1['name'];
    $image1_tmp = $image1['tmp_name'];
    $image1_size = $image1['size'];
    if ($image1_size < 1048576 * 10) {
        $image_name1 = time() . "1" . str_replace(' ', "", $image1_name);
        filter_image($image1_tmp, $image_name1, 1, $image1_size);
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
    if ($image2_size < 1048576 * 10) {
        $image_name2 = time() . "2" . str_replace(' ', "", $image2_name);
        filter_image($image2_tmp, $image_name2, 2, $image2_size);
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
    if ($image3_size < 1048576 * 10) {
        $image_name3 = time() . "3" . str_replace(' ', "", $image3_name);
        filter_image($image3_tmp, $image_name3, 3, $image3_size);
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
    if ($image4_size < 1048576 * 10) {
        $image_name4 = time() . "4" . str_replace(' ', "", $image4_name);
        filter_image($image4_tmp, $image_name4, 4, $image4_size);
    } else {
        echo "Image 4 must be 10mb";
        die();
    }
} else {
    echo "Please Choose Image 4";
    die();
}


// compress and upload image into folderr code

function compress_image($source_url, $destination_url, $quality)
{
    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source_url);
    } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source_url);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source_url);
    } elseif ($info['mime'] == 'image/jpg') {
        $image = imagecreatefromjpeg($source_url);
    } else {
        echo "only select jpeg,gif,png,jpg image";
        die();
    }

    //save it
    imagejpeg($image, $destination_url, $quality);

    //return destination file url
    return $destination_url;
}
function filter_image($tmp_name, $image1_name, $image_roll, $image_size)
{
    $imname = $tmp_name;
    $source_photo = $imname;
    $finalname = $image1_name . ".jpeg";
    $dest_photo = '../mess_image/' . $finalname;

    if ($image_size > 1024 * 1024 * 9) {
        $compressimage = compress_image($source_photo, $dest_photo, 1);
    } elseif ($image_size > 1024 * 1024 * 8) {
        $compressimage = compress_image($source_photo, $dest_photo, 1);
    } elseif ($image_size > 1024 * 1024 * 7) {
        $compressimage = compress_image($source_photo, $dest_photo, 2);
    } elseif ($image_size > 1024 * 1024 * 6) {
        $compressimage = compress_image($source_photo, $dest_photo, 3);
    } elseif ($image_size > 1024 * 1024 * 5) {
        $compressimage = compress_image($source_photo, $dest_photo, 4);
    } elseif ($image_size > 1024 * 1024 * 4) {
        $compressimage = compress_image($source_photo, $dest_photo, 10);
    } elseif ($image_size > 1024 * 1024 * 3) {
        $compressimage = compress_image($source_photo, $dest_photo, 23);
    } elseif ($image_size > 1024 * 1024 * 2) {
        $compressimage = compress_image($source_photo, $dest_photo, 35);
    } elseif ($image_size > 1024 * 1024 * 1) {
        $compressimage = compress_image($source_photo, $dest_photo, 40);
    } else {
        $compressimage = compress_image($source_photo, $dest_photo, 50);
    }
    // image roll app
    if ($image_roll == 1) {
        global $img1;
        $img1 = $image1_name . ".jpeg";
    }
    if ($image_roll == 2) {
        global $img2;
        $img2 = $image1_name . ".jpeg";
    }
    if ($image_roll == 3) {
        global $img3;
        $img3 = $image1_name . ".jpeg";
    }
    if ($image_roll == 4) {
        global $img4;
        $img4 = $image1_name . ".jpeg";
    }
}

// compress and upload image into folderr code end
// compress and upload image into folderr code end


$sql = "SELECT id FROM allmess WHERE authorphone='{$phone}' and authoremail='{$email}' ORDER BY id DESC LIMIT 1";
$id = mysqli_query($conn, $sql);
if (mysqli_num_rows($id)) {
    while ($idno = mysqli_fetch_assoc($id)) {
        $current_mess_id = $idno['id'];
    }
} else {
    echo "failed 80";
    die();
}

$has_image_sql = "SELECT * FROM allmess WHERE id={$current_mess_id}";
$has_image_sql_result = mysqli_query($conn, $has_image_sql);
if (mysqli_num_rows($has_image_sql_result) > 0) {
    while ($delete_image = mysqli_fetch_assoc($has_image_sql_result)) {
        if ($delete_image['messimage1'] == "") {
        } else {
            unlink("../mess_image/{$delete_image['messimage1']}");
            unlink("../mess_image/{$delete_image['messimage2']}");
            unlink("../mess_image/{$delete_image['messimage3']}");
            unlink("../mess_image/{$delete_image['messimage4']}");
        }
    }
}

if (isset($_GET['c'])) {
    $current_mess_id = $_GET['c'];
}

$update_sql = "UPDATE allmess SET messimage1='{$img1}',messimage2='{$img2}',messimage3='{$img3}',messimage4='{$img4}' WHERE id={$current_mess_id}";

$result = mysqli_query($conn, $update_sql);
if ($result) {

    echo "ok";
} else {
    echo "Image Upload Failed";
    die();
}
