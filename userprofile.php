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
	<title>Profile Card UI Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css"
		href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="all-css/userprofile.css">
	<style>
	</style>
</head>

<body>
	<section class="main-content">
		<div class="container">
			<div>
				<h4 style="text-align:center;">User Profile</h4>
			</div>
			<br>
			<br>

			<div class="row">
				<div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
					<div
						class="profile-card card rounded-lg shadow p-4 p-xl-5 mb-4 text-center position-relative overflow-hidden">
						<div class="banner"><img src="assets/image/banner.jpg" style="width:100%; height:100%;" alt="">
						</div>
						<img src="assets/image/profile.png" alt="" class="img-circle mx-auto mb-3">
						<h3 class="mb-4"><?php echo $_SESSION['name'];?></h3>
						<div class="text-left mb-4">
							<p class="mb-2"><i class="fa fa-envelope mr-2"></i><?php echo $_SESSION['email'];?></p>
							<p class="mb-2"><i class="fa fa-phone mr-2"></i> +91 <?php echo $_SESSION['phone'];?></p>
							<?php if(isset($_SESSION['socal_link'])){?>
							<p class="mb-2"><i class="fa fa-globe mr-2"></i><?php?></p>
							<?php }
							   if(isset($_SESSION['address'])){?>
							<p class="mb-2"><i class="fa fa-map-marker-alt mr-2"></i></p>
							<?php } ?>
						</div>
						<!-- <div class="social-links d-flex justify-content-center">
							<a href="#!" class="mx-2"><img src="img/social/dribbble.svg" alt="Dribbble"></a>
							<a href="#!" class="mx-2"><img src="img/social/facebook.svg" alt="Facebook"></a>
							<a href="#!" class="mx-2"><img src="img/social/linkedin.svg" alt="Linkedin"></a>
							<a href="#!" class="mx-2"><img src="img/social/youtube.svg" alt="Youtube"></a>
						</div> -->
					</div>
				</div>
			</div>

		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>