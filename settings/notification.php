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

    a {
      color: black;
      text-decoration: none;
      padding: 00px;
      margin: 00px;
      box-sizing: border-box;
    }

    .read_div {
      width: 100vw;
      height: 100vh;
      background-color: rgba(139, 189, 251, 0.714);
      position: fixed;
      top: 00px;
      left: 00px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .box_show {
      display: block;
    }

    .box_hide {
      display: none;
    }

    #read_div_first {
      width: 50%;
      background-color: rgb(235, 246, 255);
      height: 8%;
      border-radius: 7px 7px 0px 0px;
      border: none;
      border-bottom: 0.8px solid black;
      display: flex;
    }

    #read_div_second {
      width: 50%;
      background-color: rgb(235, 246, 255);
      height: 50%;
      border-radius: 0px 0px 7px 7px;
      padding: 10px 20px 10px 20px;
    }

    #close_n_b {
      cursor: pointer;
    }

    @media(min-width:1300px) {

      #read_div_second,
      #read_div_first {
        width: 40%;
      }
    }

    @media(max-width:1300px) {

      #read_div_second,
      #read_div_first {
        width: 60%;
      }
    }

    @media(max-width:1000px) {

      #read_div_second,
      #read_div_first {
        width: 70%;
      }
    }

    @media(max-width:800px) {

      #read_div_second,
      #read_div_first {
        width: 80%;
      }
    }

    @media(max-width:600px) {

      #read_div_second,
      #read_div_first {
        width: 95%;
      }
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
      <script>
        let id;
        let div;
      </script>
      <?php
      include "../php/config.php";
      session_start();
      $sql = "SELECT * FROM notificatioin ORDER BY id DESC";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $div_id = $row['id']; ?>
          <div class="notif_card" style="border:1px solid rgb(100,100,100);" id="<?php echo $row['id']; ?>">
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
            $admin_password = md5($_SESSION['password']);

            $admin_button_show_sql = "SELECT * FROM admin WHERE phone= '{$admin_phone}' and password = '{$admin_password}'";
            $admin_button_show_result = mysqli_query($conn, $admin_button_show_sql);
            if (mysqli_num_rows($admin_button_show_result)) {
              echo "<button class='delete' style=' margin-left:63%; display:inline-block; border:1px solid black; padding:4px; text-align:center;'><a href='../php/notification_data.php?delete_no=".$div_id = $row['id']."' class='delete_a'>Delete</a></button>";
            } else {
              echo "not admin";
            }
            ?>
            <a href="notification.php?r_id=<?php echo $row['id']; ?>" style="text-decoration: underline; color:blue; margin-left:auto;">Read</a>
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

      // show single notification
      $row1;
      if (isset($_GET['r_id'])) {
        $single_comment_sql = "SELECT * FROM notificatioin WHERE id={$_GET['r_id']}";
        $single_comment_sql_result = mysqli_query($conn, $single_comment_sql);
        if (mysqli_num_rows($single_comment_sql_result) > 0) {
          $row1 = mysqli_fetch_assoc($single_comment_sql_result);
        }
      }
      ?>

    </main>
    <!-- notification read div -->

    <div class="read_div">
      <div id="read_div_first">
        <span style="display:inline-block; height:100%; margin-top:1.8vh; padding:00px 10px 00px 30px; font-size:25px;"><?php echo $row1['heading']; ?></span>
        <span style="display:inline-block; height:100%; padding:5px; margin-left:auto; padding:1.3vh 3vh 00px 00px; font-size:35px;" id="close_n_b">&#10539;</span>
      </div>
      <div id="read_div_second">
        <?php echo $row1['about']; ?>
      </div>
    </div>


    <script>
      let close_n_b = document.querySelector("#close_n_b");
      close_n_b.addEventListener("click", function() {
        let read_box1 = document.querySelector('.read_div');
        read_box1.setAttribute("class", "read_div box_hide");
        window.location.href = 'notification.php';
      });
    </script>

    <?php
    if (isset($_GET['r_id'])) {
      echo "
        <script>
          let read_box = document.querySelector('.read_div');
         read_box.setAttribute('class','read_div');
      </script>
        ";
    } else {
      echo "
      <script>
        let read_box = document.querySelector('.read_div');
        read_box.setAttribute('class','read_div box_hide');
    </script>
      ";
    }
    ?>

  </div>
  </div>


  <script src="app.js"></script>
</body>

</html>