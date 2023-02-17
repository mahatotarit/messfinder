<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- displays site properly based on user's device -->
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png" />
  <link rel="stylesheet" href="../all-css/your_activity.css" />
  <title>Frontend Mentor | Notifications page</title>
  <style>
  </style>
</head>

<body>
  <div class="container">
    <header>
      <div class="notif_box">
        <h2 class="title">My Post</h2>
      </div>
    </header>
    <main>



      <!-- post card start -->
      <?php
      include '../php/config.php';
      session_start();
      $authorphone = $_SESSION['phone'];
      $authorpassword = $_SESSION['password'];
      $get_my_post_sql = "SELECT * FROM allmess WHERE authorphone = '{$authorphone}' and authorpassword =  '{$authorpassword}' ";
      $get_my_post_result = mysqli_query($conn, $get_my_post_sql) or die("query failed 33");
      if (mysqli_num_rows($get_my_post_result) > 0) {
        while ($row = mysqli_fetch_assoc($get_my_post_result)) {
      ?>
          <div class="notif_card unread">
            <img style="width:50px; height:50px; border-radius:50%; overflow:hidden;" src="../mess_image/<?php echo $row['messimage1']; ?>" alt="mess image" />
            <div class="description">
              <p class="user_activity">
                <strong><?php echo $row['messname']; ?></strong><br><?php echo $row['messlocation']; ?>
              </p>
              <p class="time" style="font-size:10px;"><?php echo $row['postdate']; ?></p>
            </div>
            <button id="edit_btn" style="margin-left:auto; padding:3px;"><a href="../php/edit_mess.php?allmesseditid=<?php echo  $row['id']; ?>" style="text-decoration: none; font-weight: bold; color: black;">Edit</a></button>
          </div>
      <?php }
      }
      ?>

      <!-- second table  -->
      <!-- second table  -->
      <?php
      include '../php/config.php';
      $authorphone1 = $_SESSION['phone'];
      $authorpassword1 = $_SESSION['password'];
      $get_my_post_sql1 = "SELECT * FROM showpost WHERE authorphone = '{$authorphone1}' and authorpassword =  '{$authorpassword1}' ";
      $get_my_post_result1 = mysqli_query($conn, $get_my_post_sql1) or die("query failed 33");
      while ($row1 = mysqli_fetch_assoc($get_my_post_result1)) { ?>
        <div class="notif_card unread">
          <img style="width:50px; height:50px; border-radius:50%; overflow:hidden;" src="../mess_image/<?php echo $row1['messimage1']; ?>" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong><?php echo $row1['messname']; ?></strong><br> <?php echo $row1['messlocation']; ?>
            </p>
            <p class="time" style="font-size:10px;"><?php echo $row1['postdate']; ?></p>
          </div>
          <button id="edit_btn" style="margin-left:auto; padding:3px;"><a href="../php/edit_mess.php?showposteditid=<?php echo  $row1['id']; ?>" style="text-decoration: none; font-weight: bold; color: black;">Edit</a></button>
        </div>
      <?php  }
      ?>
      <!-- post card end -->
      <!-- post card end -->







  </div>

  </main>
  </div>

  <!-- <script src="app.js"></script> -->
</body>

</html>
<?php
mysqli_close($conn);
?>