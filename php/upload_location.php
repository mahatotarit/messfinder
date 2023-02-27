<?php
if (isset($_GET['lat'])) {

    include 'config.php';
    $current_mess_id = 0;
    session_start();
    $phone = $_SESSION['phone'];
    $email = $_SESSION['email'];

    $lat = $_GET['lat'];
    $lng = $_GET['lng'];

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

    $update_sql = "UPDATE allmess SET lat='{$lat}', lng='{$lng}' WHERE id={$current_mess_id}";
    $result = mysqli_query($conn,$update_sql);

    if($result){
          echo "1";
    }else{
        echo "0";
    }
}
?>