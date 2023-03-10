<?php
session_start();
if (isset($_SESSION['phone'])) {
	if (isset($_SESSION['password'])) {
	} else {
		header("location:loginpage.php?p=userprofile.php");
	}
} else {
	header("location:loginpage.php?p=userprofile.php");
}
include 'php/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<?php
	include "php/dynimic_title.php";
	?>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="all-css/userprofile.css">
	<style>
		section {
			width: 100%;
			height: 100vh;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}

		.container {
			width: 50%;
			text-align: center;
			padding: 20px;
			box-shadow: 0px 0px 1px black;
			border-radius: 10px;
			background-color: white;
			/* background-color: rgb(253, 253, 253); */
		}

		.row {
			background-color: white;
		}

		@media(min-width:800px) {
			section {
				width: 50%;
				margin: 0px auto;
			}
		}

		@media(max-width:600px) {
			section {
				width: 100%;
				margin: 0px auto;
			}

			.container {
				width: 80%;
			}
		}

		@media(min-width:600px) {
			section {
				width: 100%;
				margin: 0px auto;
			}

			.container {
				width: 100%;
			}
		}
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
					<div class="profile-card card rounded-lg shadow p-4 p-xl-5 mb-4 text-center position-relative overflow-hidden">
						<img src="assets/<?php
											$get_prifile_image = "SELECT image FROM user WHERE phone='{$_SESSION['phone']}'";
											$get_prifile_image_result = mysqli_query($conn, $get_prifile_image);
											if (mysqli_num_rows($get_prifile_image_result)) {
												$image_name5 = mysqli_fetch_assoc($get_prifile_image_result);
												if ("profile_image.png" == $image_name5['image']) {
													echo "profile_image/profile_image.png";
												} else {
													echo "user_profile_image/" . $image_name5['image'];
												}
											} ?>" alt="Profile Image" class="img-circle mx-auto mb-3">
						<h3 class="mb-4"><?php echo $_SESSION['name']; ?></h3>
						<div class="text-left mb-4">
							<p class="mb-2"><i class="fa fa-envelope mr-2"></i>Email: <?php echo $_SESSION['email']; ?></p>
							<p class="mb-2"><i class="fa fa-phone mr-2"></i>Phone: +91 <?php echo $_SESSION['phone']; ?></p>
							<p class="mb-2"><i class="fa fa-phone mr-2"></i>Password: <?php echo $_SESSION['password']; ?></p>
							<!-- <p class="mb-2"><i class="fa fa-phone mr-2"></i></p> -->
						</div>
						<!-- <div class="social-links d-flex justify-content-center">
							<a href="#!" class="mx-2"><img src="img/social/dribbble.svg" alt="Dribbble"></a>
							<a href="#!" class="mx-2"><img src="img/social/facebook.svg" alt="Facebook"></a>
							<a href="#!" class="mx-2"><img src="img/social/linkedin.svg" alt="Linkedin"></a>
							<a href="#!" class="mx-2"><img src="img/social/youtube.svg" alt="Youtube"></a>
						</div> -->
						<div class="edit_div_btn">
							<button class="edit_btn" style="border-radius:5px; width:90px;"><a href="php/edit_profile.php">Edit</a></button>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>