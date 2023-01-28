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
     <style>
        i{
           color:blue; 
           font-size:25px;
           margin: auto;
        }
     </style>
</head>

<body>
    <div class="top-div" style="width: 00px; height: 5%;">

    </div>
    <div class="container">
        <div class="img__profile">
            <img src="assets/image/profile.png" class="three-width" alt="profile" width="200" height="200" style="text-align:center; width:100px; height:100px;">
            <div></div>
            <div></div>
        </div>

        <div class="item">
            <!-- <img src="assets/img/icon/Profile.png" alt="profile"> -->
            <i class="fa-regular fa-user"></i>
            <span>My Profile</span>
            <div class="icon">
                <img src="assets/icon/chevron-right.png" alt="more">
            </div>
        </div>
        <div class="item">
            <i class="fa-solid fa-circle-half-stroke"></i>
            <span>Color Theme</span>
            <div class="icon">
              <img  src="assets/icon/chevron-right.png" alt="more">
            </div>
        </div>
        <div class="item">
            <i class="fa-regular fa-bell"></i>
            <span>Notification</span>
            <div class="icon">
              <img  src="assets/icon/chevron-right.png" alt="more">
            </div>
        </div>
        <div class="item">
            <i class="fa-solid fa-fingerprint"></i>
            <span>Privacy Policy</span>
            <div class="icon">
              <img  src="assets/icon/chevron-right.png" alt="more">
            </div>
        </div>
        <div class="item">
            <i class="fa-regular fa-address-book"></i>
            <span>Contact Us</span>
            <div class="icon">
              <img  src="assets/icon/chevron-right.png" alt="more">
            </div>
        </div>
        <div class="item">
            <i class="fa-regular fa-circle-question"></i>
            <span>About Us</span>
            <div class="icon">
              <img  src="assets/icon/chevron-right.png" alt="more">
            </div>
        </div>
        <div class="item">
            <i class="fa-regular fa-comment"></i>
            <span>Feedback</span>
            <div class="icon">
              <img  src="assets/icon/chevron-right.png" alt="more">
            </div>
        </div>
        <div class="item">
            <i class="fa-regular fa-share-from-square"></i>
            <span>Invite Friends</span>
            <div class="icon">
              <img  src="assets/icon/chevron-right.png" alt="more">
            </div>
        </div>

          <!--  logout -->
          
        <div class="item__logout">
            <i class="fa-solid fa-arrow-up-from-bracket" style="transform: rotateZ(90deg); color: red;"></i>
            <span><a href="p/logout.php" style="color: red; width: 100%;display: inline-block;padding: 5px; font-size: 23px; text-decoration: none;">Logout</a></span>
            <div class="icon">
                <img class="logout" src="assets/icon/chevron-right.png" alt="more">
            </div>
        </div>
    </div>
</body>

</html>