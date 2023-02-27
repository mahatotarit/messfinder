<?php
include 'config.php';
$comment1 = "";
if (!empty($_POST['comment'])) {

    $comment1 = trim($_POST['comment']);
    if (preg_match('/^[A-z0-9]/', trim($comment1))) {
    } else {
        echo "Please Enter Some Text";
        die();
    }
}
$mess_id = "";
$image = "";
$name = "";

$mess_id = $_POST['id'];

session_start();
$password = md5($_SESSION['password']);
$cmt_phone = $_SESSION['phone'];
$get_image_name_and_other_sql = "SELECT * FROM user WHERE phone='{$_SESSION['phone']}' and password='{$password}'";

$result = mysqli_query($conn, $get_image_name_and_other_sql);
if (mysqli_num_rows($result)) {
    while ($user_d = mysqli_fetch_assoc($result)) {
        $name = $user_d['name'];
        $image = $user_d['image'];
    }
}
$comment_sql = "INSERT INTO mess_comment (ownername,commenttext,mess_id,ownerimage,owner_phone) VALUES ('{$name}','{$comment1}','{$mess_id}','{$image}','{$cmt_phone}')";
$result1 = mysqli_query($conn, $comment_sql);
if ($result1) {
       echo $mess_id;
} else {
    echo "comment failed";
}
?>