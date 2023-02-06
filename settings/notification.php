<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- displays site properly based on user's device -->
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png" />
  <link rel="stylesheet" href="../all-css/notification.css" />
  <title>Frontend Mentor | Notifications page</title>
  <style>
    .container {
      background-color: white;
      box-shadow: 0px 0px 1px black;
      overflow: auto;
    }

    .delete a {
      text-decoration: none;
      color: black;
    }

    .delete {
      border-radius: 3px;
    }
  </style>
</head>

<body>
  <div class="container">
    <header>
      <div class="notif_box">
        <h2 class="title">Notifications</h2>
      </div>
    </header>
    <main>
      <?php
      include "../php/config.php";
      session_start();
      $sql = "SELECT * FROM notificatioin ORDER BY id DESC";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="notif_card" style="border:1px solid rgb(100,100,100);">
            <img style="width:50px; height:50px; border-radius:50%;" src="../mess_image/<?php echo $row['image']; ?>" alt="avatar" />
            <div class="description">
              <p class="user_activity">
                <strong><?php echo $row['heading']; ?></strong><br><?php echo $row['about']; ?>
              </p>
              <p class="time" style="font-size:10px;"><?php echo $row['time']; ?></p>
            </div>
            <?php
            $admin_name = $_SESSION['name'];
            $admin_phone = $_SESSION['phone'];
            $admin_password = $_SESSION['password'];

            $admin_button_show_sql = "SELECT * FROM admin WHERE phone= '{$admin_phone}' and password = '{$admin_password}'";
            $admin_button_show_result = mysqli_query($conn, $admin_button_show_sql);
            if (mysqli_num_rows($admin_button_show_result)) {
              echo "<button class='delete' style=' margin-left:auto; display:inline-block; border:1px solid black; padding:4px; text-align:center;'><a href='notification.php' class='delete_a'>Delete</a></button>";
            }
            ?>
          </div>

      <?php }
      }

      if (isset($_GET['delete_noti'])) {
        $delete_noti_id = $_GET['delete_noti'];
        $select_image = "SELECT * FROM notificatioin WHERE id={$delete_noti_id}";
        $select_result = mysqli_query($conn, $select_image);
        $image_name = mysqli_fetch_assoc($select_result);
        $delete_image = $image_name['image'];
        unlink("../mess_image/{$delete_image}");
        $delete_sql = "DELETE FROM notificatioin WHERE id={$delete_noti_id}";
        $delte_noti_data = mysqli_query($conn, $delete_sql);
        if (isset($delte_noti_data)) {
          header("location:notification.php");
        }
      }
      ?>

    </main>
  </div>

  <script src="app.js"></script>
</body>

</html>