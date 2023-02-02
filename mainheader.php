<?php
// // Start the session
// session_start();
// // Set session variables
// if(isset($_SESSION["phone"])){
// }else{
//     header('location:loginpage.php');
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Mess Finder</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="all-css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="all-css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="all-css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
     
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap');
  *{
  margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
 }
  body{
  background: #f2f2f2;
}
nav{
  background:#337ab7 ;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  height: 70px;
  padding: 0 100px;
}
nav .logo{
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  letter-spacing: -1px;
}
nav .nav-items{
  display: flex;
  flex: 1;
  padding: 0 0 0 40px;
}
nav .nav-items li{
  list-style: none;
  padding: 0 15px;
}
nav .nav-items li a{
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-decoration: none;
}
nav .nav-items li a:hover{
  color: #333;
}
nav form{
  display: flex;
  height: 40px;
  padding: 2px;
  background: white ;
  min-width: 18%!important;
  border-radius: 2px;
  border: 1px solid rgba(155,155,155,0.2);
}
nav form .search-data{
  width: 100%;
  height: 100%;
  padding: 0 10px;
  font-size: 17px;
  border: none;
  font-weight: 500;
  background: none;
}
nav form button{
  padding: 0 15px;
  color: #fff;
  font-size: 17px;
  background:#337ab7 ;
  border: none;
  border-radius: 2px;
  cursor: pointer;
}
nav form button:hover{
  background:#333;
}
nav .menu-icon,
nav .cancel-icon,
nav .search-icon{
  width: 40px;
  text-align: center;
  margin: 0 50px;
  font-size: 18px;
  color: #fff;
  cursor: pointer;
  display: none;
}
nav .menu-icon span,
nav .cancel-icon,
nav .search-icon{
  display: none;
}
.search-data{
    color:black;
}
@media (max-width: 1245px) {
  nav{
    padding: 0 50px;
  }
}
@media (max-width: 1054px){
  #main-content{
    padding-top:100px;
  }
  nav{
    padding: 0px;
    position:fixed;
    width:100vw;
    z-index: +99;
  }
  nav .logo{
    flex: 2;
    text-align: center;
  }
  nav .nav-items{
    position: fixed;
    z-index: 99;
    top: 70px;
    width: 100%;
    left: -100%;
    height: 100%;
    padding: 10px 50px 0 50px;
    text-align: center;
    background: #286090;
    display: inline-block;
    transition: left 0.3s ease;
  }
  nav .nav-items.active{
    left: 0px;
  }
  nav .nav-items li{
    line-height: 40px;
    margin: 30px 0;
  }
  nav .nav-items li a{
    font-size: 20px;
  }
  nav form{
    position: absolute;
    width:85%;
    top: 80px;
    right: 50px;
    opacity: 0;
    pointer-events: none;
    transition: top 0.3s ease, opacity 0.1s ease;
  }
  nav form.active{
    top: 95px;
    opacity: 1;
    pointer-events: auto;
    z-index: +1;
  }
  nav form:before{
    position: absolute;
    content: "";
    top: -13px;
    right: 0px;
    width: 0;
    height: 0;
    z-index: -1;
    border: 10px solid transparent;
    border-bottom-color: #1e232b;
    margin: -20px 0 0;
  }
  nav form:after{
    position: absolute;
    content: '';
    height: 60px;
    padding: 2px;
    background: white;
    border:1.5px solid #286090;
    border-radius: 2px;
    min-width: calc(100% + 20px);
    z-index: -2;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }
  nav .menu-icon{
    display: block;
  }
  nav .search-icon,
  nav .menu-icon span{
    display: block;
  }
  nav .menu-icon span.hide,
  nav .search-icon.hide{
    display: none;
  }
  nav .cancel-icon.show{
    display: block;
  }
  .search-data{
   color:white;
}

}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  text-align: center;
  transform: translate(-50%, -50%);
}
.content header{
  font-size: 30px;
  font-weight: 700;
}
.content .text{
  font-size: 30px;
  font-weight: 700;
}
.space{
  margin: 10px 0;
}
nav .logo.space{
  color:black;
  padding: 0 5px 0 0;
}

@media (max-width: 980px){
  nav .menu-icon,
  nav .cancel-icon,
  nav .search-icon{
    margin: 0 20px;
  }
  nav form{
    right: 30px;
  }
}
@media (max-width: 350px){
  nav .menu-icon,
  nav .cancel-icon,
  nav .search-icon{
    margin: 0 10px;
    font-size: 16px;
  }
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.content header{
  font-size: 30px;
  font-weight: 700;
}
.content .text{
  font-size: 30px;
  font-weight: 700;
}
.content .space{
  margin: 10px 0;
}
.search-data{
 color:black;
}
.cover{
  background-size: cover;
background-size: contain;
}
</style>
</head>
<body> 
<!-- style="position:fixed; z-index:+99; width:100vw;" -->
  <nav>
    <div class="menu-icon">
      <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            <a  style = "color:white;user-select: none; " href="index.php">Mess Finder</a>
         </div>
         <div class="nav-items">
           <li><a style="user-select: none;" href="index.php">Home</a></li>
           <li><a style="user-select: none;" href="addmess.php">Register Mess</a></li>
           <li><a style="user-select: none;" href="userprofile.php">Profile</a></li>
           <li><a style="user-select: none;" href="setting.php">Settings</a></li>

           <!-- admin button show using admin user -->
           <!-- admin button show using admin user -->
           <?php 
             include "php/config.php";
             $admin_name = $_SESSION['name'];
             $admin_phone = $_SESSION['phone'];
             $admin_password = $_SESSION['password'];

             $admin_button_show_sql = "SELECT * FROM admin WHERE phone= '{$admin_phone}' and password = '{$admin_password}'";
             $admin_button_show_result = mysqli_query($conn,$admin_button_show_sql);
             if(mysqli_num_rows($admin_button_show_result)){
                
               echo '<li><a style="user-select: none;" href="admin.php">Admin</a></li>';
               echo '<li><a style="user-select: none;" href="send_notification.php">Send Notification</a></li>';
             }
           ?>
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
           <span class="fas fa-times"></span>
          </div>
         <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <input type="search" class="search-data" style="font-weight:bold;" name="home_search" placeholder="Search Location" required>
            <button type="submit" class="fas fa-search" name="s_b"></button>
         </form>
      </nav>
      <script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
          }
          cancelBtn.onclick = ()=>{
            items.classList.remove("active");
            menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "white";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>
   </body>
   