<?php
session_start();
if (isset($_SESSION['phone'])) {
  if (isset($_SESSION['password'])) {
  } else {
    // header("location:loginpage.php");    
  }
} else {
  // header("location:loginpage.php");
}
include "php/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  include "php/dynimic_title.php";
  ?>
  <!-- Custom css -->
  <link rel="stylesheet" href="all-css/settings.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="all-css/infite_friends_popup.css">
  <style>
    .icon_color {
      color: blue;
      font-size: 25px;
      margin: auto;
    }
  </style>
</head>

<body>
  <div class="top-div" style="width: 00px; height: 5%;">

  </div>
  <div class="container" style="background-color:rgb(245,245,245); border-radius:10px;">
    <div class="img__profile" style="overflow:hidden;">
      <img style="border:0.1px solid black; border-radius:50%; overflow:hidden;" src="assets/<?php if (isset($_SESSION['phone'])) {
                                                                                                $phone =  $_SESSION['phone'];
                                                                                              }
                                                                                              $get_prifile_image = "SELECT image FROM user WHERE phone='{$phone}'";
                                                                                              $get_prifile_image_result = mysqli_query($conn, $get_prifile_image);
                                                                                              if (mysqli_num_rows($get_prifile_image_result)) {
                                                                                                $image_name5 = mysqli_fetch_assoc($get_prifile_image_result);
                                                                                                if ("profile_image.png" == $image_name5["image"]) {
                                                                                                  echo "profile_image/profile_image.png";
                                                                                                } else {
                                                                                                  echo "user_profile_image/" . $image_name5["image"];
                                                                                                }
                                                                                              } ?>" class='three-width' alt='Profile Image' width='200' height='200' style='text-align:center; width:100px; height:100px; border-radius: 50%;'>

      <div>
        <?php
        if (isset($_SESSION['name'])) {
          echo $_SESSION['name'];
        } else {
          echo "";
        }
        ?>
      </div>
      <div>
        <?php
        if (isset($_SESSION['email'])) {
          echo $_SESSION['email'];
        } else {
          echo "";
        }
        ?>
      </div>
    </div>

    <div class="item">
      <?php
      if (isset($_SESSION['name'])) { ?>
        <i class="fa-regular fa-user icon_color"></i>
        <span><a href="userprofile.php" style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">My
            Profile</a></span>

        <div class="icon">
          <a href="userprofile.php"><img src="assets/icon/chevron-right.png" alt="more"></a>
        </div>
      <?php  }
      ?>
    </div>
    <div class="item" style="user-select:none;">
      <i class="fa-solid fa-circle-half-stroke icon_color"></i>
      <span>Color Theme</span>
      <div class="icon">
        <a href="#"><img src="assets/icon/chevron-right.png" alt="more"></a>
      </div>
    </div>
    <?php
    if (isset($_SESSION['name'])) { ?>
      <div class="item">
        <i class="fa-regular fa-bell icon_color"></i>
        <span><a href="settings/notification.php" style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Notifications</a></span>
        <div class="icon">
          <a href="settings/notification.php"><img src="assets/icon/chevron-right.png" alt="more"></a>
        </div>
      </div>
    <?php   }
    ?>

    <div class="item">
      <i class="fa-solid fa-fingerprint icon_color"></i>
      <span><a href="settings/privacy_policy.php" style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Privacy
          Policy</a></span>
      <div class="icon">
        <a href="settings/privacy_policy.php"><img src="assets/icon/chevron-right.png" alt="more"></a>
      </div>
    </div>
    <?php
    if (isset($_SESSION['name'])) { ?>
      <div class="item">
        <i class="fa-regular fa-address-book icon_color"></i>
        <span><a href="settings/contactus.php" style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Contact
            Us</a></span>
        <div class="icon">
          <a href="settings/contactus.php"><img src="assets/icon/chevron-right.png" alt="more"></a>
        </div>
      </div>
    <?php    }
    ?>
    <div class="item">
      <i class="fa-regular fa-circle-question icon_color"></i>
      <span><a href="settings/aboutus.php" style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">About
          Us</a></span>
      <div class="icon">
        <a href="settings/aboutus.php"><img src="assets/icon/chevron-right.png" alt="more"></a>
      </div>
    </div>
    <?php
    if (isset($_SESSION['name'])) { ?>
      <div class="item">
        <i class="fa-solid fa-user-plus icon_color"></i>
        <span><a href="settings/your_activity.php" style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Your Activity</a></span>
        <div class="icon">
          <a href="settings/your_activity.php"><img src="assets/icon/chevron-right.png" alt="more"></a>
        </div>
      </div>
      <div class="item">
        <i class="fa-regular fa-comment icon_color"></i>
        <span><a href="settings/feedback.php" style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Feedback</a></span>
        <div class="icon">
          <a href="settings/feedback.php"><img src="assets/icon/chevron-right.png" alt="more"></a>
        </div>
      </div>
    <?php   }
    ?>

    <div class="item">
      <i class="fa-regular fa-share-from-square icon_color"></i>

      <!-- invite friends popup -->
      <!-- invite friends popup -->
      <!-- invite friends popup -->
      <!-- invite friends popup -->
      <!-- invite friends popup -->

      <span><a class="invite_friends_button" style="color:black; cursor: pointer; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Invite
          Friends</a></span>
      <div class="popup">
        <header>
          <span>Share Modal</span>
          <div class="close"><i class="fa-solid fa-xmark"></i></div>
        </header>
        <div class="content">
          <p>Share this link via</p>
          <ul class="icons">
            <a href="https://www.facebook.com/sharer.php?u=https://messfinder.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="http://twitter.com/share?text=WebsiteLink-&url=https://messfinder.com&hashtags=#PHP" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="https://api.whatsapp.com/send?phone=&text=<?php urlencode("Refer-Your-Friends-"); ?>https://messfinder.com" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="https://telegram.me/share/url?url=https://messfinder.com.php&text=Share-Your-Friends" target="_blank"><i class="fab fa-telegram-plane"></i></a>
          </ul>
          <p>Or copy link</p>
          <div class="field">
            <i class="url-icon uil uil-link icon_color"></i>
            <input type="text" readonly value="https://messfinder.com">
            <button>Copy</button>
          </div>
        </div>
      </div>
      <div class="icon">
        <img src="assets/icon/chevron-right.png" alt="more" style="cursor: pointer;" class='i_btn'>
      </div>
    </div>

    <!--  logout -->

    <?php
    if (isset($_SESSION['name'])) { ?>
      <div class="item__logout">
        <i class="fa-solid fa-arrow-up-from-bracket icon_color" id="logout_btn2" style="transform: rotateZ(90deg); color: red; cursor: pointer;"></i>
        <span id="logout_btn1"><a style="color: red; width: 100%;display: inline-block;padding: 5px; font-size: 23px; text-decoration: none;  cursor: pointer;">Logout</a></span>
        <div class="icon" style=" cursor: pointer;">
          <a id="logout_btn"><img src="assets/icon/chevron-right.png" alt="more"></a>
        </div>
      </div>
    <?php    }
    ?>
  </div>
</body>

</html>
<!-- invite friends popup -->
<!-- invite friends popup -->
<!-- invite friends popup -->
<!-- invite friends popup -->
<script>
  const viewBtn = document.querySelector(".invite_friends_button"),
    i_btn = document.querySelector(".i_btn"),
    popup = document.querySelector(".popup"),
    close = popup.querySelector(".close"),
    field = popup.querySelector(".field"),
    input = field.querySelector("input"),
    copy = field.querySelector("button");

  viewBtn.onclick = () => {
    popup.classList.toggle("show");
  }
  i_btn.onclick = () => {
    popup.classList.toggle("show");
  }
  close.onclick = () => {
    viewBtn.click();
  }

  copy.onclick = () => {
    input.select(); //select input value
    if (document.execCommand("copy")) { //if the selected text copy
      field.classList.add("active");
      copy.innerText = "Copied";
      setTimeout(() => {
        window.getSelection().removeAllRanges(); //remove selection from document
        field.classList.remove("active");
        copy.innerText = "Copy";
      }, 3000);
    }
  }
</script>

<!-- logout script  -->
<!-- logout script  -->
<script>
  const logout_btn = document.querySelector("#logout_btn");
  const logout_btn1 = document.querySelector("#logout_btn1").addEventListener("click", logout_fun);
  const logout_btn2 = document.querySelector("#logout_btn2").addEventListener("click", logout_fun);
  logout_btn.addEventListener("click", logout_fun);

  function logout_fun() {
    let confirm_logout = confirm("Logout");

    if (confirm_logout) {
      let xhr = new XMLHttpRequest();
      xhr.open("GET", "php/logout.php?logout=logout", true);
      xhr.onload = () => {
        if (xhr.status === 200) {
          let type = xhr.responseText;
          console.log(typeof type);
          if (xhr.responseText = "1") {
            window.location.href = "index.php";
          }
        } else {
          alert("logout failed");
        }
      }
      xhr.send();
    } else {

    }
  }
</script>