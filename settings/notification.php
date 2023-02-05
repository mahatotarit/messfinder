<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- displays site properly based on user's device -->
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./images/favicon-32x32.png"
    />
    <link rel="stylesheet" href="../all-css/notification.css" />
    <title>Frontend Mentor | Notifications page</title>
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
           $sql = "SELECT * FROM notificatioin";
           $result = mysqli_query($conn,$sql);
           if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){?>
               <div class="notif_card">
          <img style="width:50px; height:50px; border-radius:50%;" src="../mess_image/<?php echo $row['image'];?>" alt="avatar" />
          <div class="description">
            <p class="user_activity">
              <strong><?php echo $row['heading'];?></strong><br><?php echo $row['about'];?></p>
            <p class="time" style="font-size:10px;"><?php echo $row['time'];?></p>
          </div>
        </div>

            <?php }
           }
        ?>
        
      </main>
    </div>

    <script src="app.js"></script>
  </body>
</html>
