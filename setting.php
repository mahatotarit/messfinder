<?php
   session_start();
   if(isset($_SESSION['phone'])){
       if(isset($_SESSION['password'])){
          
       }else{
        header("location:loginpage.php");    
       }
   }else{
    header("location:loginpage.php");
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Profile</title>
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
  <div class="container">
    <div class="img__profile">
      <img src="assets/image/profile.png" class="three-width" alt="profile" width="200" height="200"
        style="text-align:center; width:100px; height:100px;">
      <div>
        <?php echo $_SESSION['name'];?>
      </div>
      <div>
        <?php echo $_SESSION['email'];?>
      </div>
    </div>

    <div class="item">
      <!-- <img src="assets/img/icon/Profile.png" alt="profile"> -->
      <i class="fa-regular fa-user icon_color"></i>
      <span><a href="userprofile.php"
          style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">My
          Profile</a></span>
      <div class="icon">
        <img src="assets/icon/chevron-right.png" alt="more">
      </div>
    </div>
    <div class="item">
      <i class="fa-solid fa-circle-half-stroke icon_color"></i>
      <span>Color Theme</span>
      <div class="icon">
        <img src="assets/icon/chevron-right.png" alt="more">
      </div>
    </div>
    <div class="item">
      <i class="fa-regular fa-bell icon_color"></i>
      <span><a href="settings/notification.php"
          style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Notifications</a></span>
      <div class="icon">
        <img src="assets/icon/chevron-right.png" alt="more">
      </div>
    </div>
    <div class="item">
      <i class="fa-solid fa-fingerprint icon_color"></i>
      <span><a href="settings/privacy_policy.php"
          style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Privacy
          Policy</a></span>
      <div class="icon">
        <img src="assets/icon/chevron-right.png" alt="more">
      </div>
    </div>
    <div class="item">
      <i class="fa-regular fa-address-book icon_color"></i>
      <span><a href="settings/contactus.php"
          style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Contact
          Us</a></span>
      <div class="icon">
        <img src="assets/icon/chevron-right.png" alt="more">
      </div>
    </div>
    <div class="item">
      <i class="fa-regular fa-circle-question icon_color"></i>
      <span><a href="settings/aboutus.php"
          style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">About
          Us</a></span>
      <div class="icon">
        <img src="assets/icon/chevron-right.png" alt="more">
      </div>
    </div>

    <div class="item">
      <i class="fa-solid fa-user-plus icon_color"></i>
      <span><a href="settings/your_activity.php"
          style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Your Activity</a></span>
      <div class="icon">
        <img src="assets/icon/chevron-right.png" alt="more">
      </div>
    </div>

    <div class="item">
      <i class="fa-regular fa-comment icon_color"></i>
      <span><a href="settings/feedback.php"
          style="color:black; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Feedback</a></span>
      <div class="icon">
        <img src="assets/icon/chevron-right.png" alt="more">
      </div>
    </div>
    <div class="item">
      <i class="fa-regular fa-share-from-square icon_color"></i>

      <!-- invite friends popup -->
      <!-- invite friends popup -->
      <!-- invite friends popup -->
      <!-- invite friends popup -->
      <!-- invite friends popup -->

      <span><a class="invite_friends_button"
          style="color:black; cursor: pointer; text-decoration: none; font-size: 17px; width: 100%; display:inline-block;">Invite
          Friends</a></span>
      <div class="popup">
        <header>
          <span>Share Modal</span>
          <div class="close"><i class="fa-solid fa-xmark"></i></div>
        </header>
        <div class="content">
          <p>Share this link via</p>
          <ul class="icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-telegram-plane"></i></a>
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
        <img src="assets/icon/chevron-right.png" alt="more">
      </div>
    </div>

    <!--  logout -->

    <div class="item__logout">
      <i class="fa-solid fa-arrow-up-from-bracket icon_color" style="transform: rotateZ(90deg); color: red;"></i>
      <span><a href="php/logout.php"
          style="color: red; width: 100%;display: inline-block;padding: 5px; font-size: 23px; text-decoration: none;">Logout</a></span>
      <div class="icon">
        <img class="logout" src="assets/icon/chevron-right.png" alt="more">
      </div>
    </div>
  </div>
</body>

</html>
<!-- invite friends popup -->
<!-- invite friends popup -->
<!-- invite friends popup -->
<!-- invite friends popup -->
<script>
  const viewBtn = document.querySelector(".invite_friends_button"),
    popup = document.querySelector(".popup"),
    close = popup.querySelector(".close"),
    field = popup.querySelector(".field"),
    input = field.querySelector("input"),
    copy = field.querySelector("button");

  viewBtn.onclick = () => {
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