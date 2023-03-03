<?php
  if(isset($_GET['logout'])){
    session_start();
    session_reset();
    session_destroy();
    echo "1";
  }else{
   echo "0";
  }
?>

