<?php
session_start();
if (isset($_SESSION['phone'])) {
	if (isset($_SESSION['password'])) {
	} else {
		header("location:loginpage.php");
	}
} else {
	header("location:loginpage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<?php
	include "dynimic_title.php";
	?>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="all-css/userprofile.css">
	<style>
		body {
			background-color: rgb(223, 223, 223);
		}

		input {
			outline: none;
			border-radius: 4px;
			width: 100%;
			padding: 5px;
			border: 1px solid black;
			border-color: rgba(0, 0, 0, 0.499);
			margin: 00px;
		}

		input:focus {
			box-shadow: 0px 0px 5px skyblue;
		}

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

		.btn {
			border: none;
			border: 3px outset rgba(4, 130, 255, 0.641);
			;
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
			<div class="row">
				<div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
					<h4 style="text-align:center; user-select:none;">Update Profile</h4>
				</div>
				<div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
					<?php $image = "c.jpg"; ?>
					<form method="POST" enctype="multipart/form-data">
						<div class="profile-card card rounded-lg shadow p-4 p-xl-5 mb-4 text-center position-relative overflow-hidden" style="text-align:center;">
							<label for="logo" style="height:170px; margin-top:-20px;">
								<img for="logo" style="border-radius: 50%; width: 150px; height: 150px; display: inline-block;" src="../assets/<?php
																																				include 'config.php';
																																				$get_prifile_image = "SELECT image FROM user WHERE phone='{$_SESSION['phone']}'";
																																				$get_prifile_image_result = mysqli_query($conn, $get_prifile_image);
																																				if (mysqli_num_rows($get_prifile_image_result)) {
																																					$image_name5 = mysqli_fetch_assoc($get_prifile_image_result);
																																					if ("profile_image.png" == $image_name5['image']) {
																																						echo "profile_image/profile_image.png";
																																					} else {
																																						echo "user_profile_image/" . $image_name5['image'];
																																					}
																																				}
																																				?>" alt="Profile Logo">
								<div class="edit_icon_div" style="margin-top:-2.2vh; padding:00px 00px 10px 00px;"> <span style="display:inline-block; transform:rotateZ(90deg); background-color:white; border-radius:50%; padding:3px; box-shadow:0px 0px 1px black;">&#x270E;</span></div>
							</label>
							<input type="file" name="logo" id="logo" hidden accept="image/jpg, image/jpeg, image/png">
							User Name: <input type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['name']; ?>" required>
							Email: <input type="email" name="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" required>
							Password: <input type="text" name="password" placeholder="Password" value="<?php echo $_SESSION['password']; ?>" required><br>
							<input type="submit" name="btn" placeholder="Updata" value="Update" class="btn">
					</form>
				</div>
			</div>
		</div>

		</div>
	</section>

	<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>


<?php

$file_name = "profile.png";
$finalname = "";
if (isset($_POST['btn'])) {
	if (!empty(($_FILES['logo']))) {
		$errors = array();
		$file_name = $_FILES["logo"]['name'];
		$file_size = $_FILES["logo"]['size'];
		$file_type = $_FILES["logo"]['type'];
		$file_tmp_name = $_FILES["logo"]['tmp_name'];

		if ($file_size > 5242880) {
			$errors[] = "File size must be 5mb or lower";
		} else {
		}


		if (empty($errors) == true) {
			// move_uploaded_file($file_tmp_name, "../assets/user_profile_image/" . $file_name);
			function compress_image($source_url, $destination_url, $quality)
			{
				$info = getimagesize($source_url);

				if ($info['mime'] == 'image/jpeg') {
					$image = imagecreatefromjpeg($source_url);
				} elseif ($info['mime'] == 'image/gif') {
					$image = imagecreatefromgif($source_url);
				} elseif ($info['mime'] == 'image/png') {
					$image = imagecreatefrompng($source_url);
				} elseif ($info['mime'] == 'image/jpg') {
					$image = imagecreatefromjpeg($source_url);
				} else {
					echo "only select jpeg,png,jpg image";
					die();
				}

				//save it
				imagejpeg($image, $destination_url, $quality);

				//return destination file url
				return $destination_url;
			}
			function filter_image($tmp_name, $image1_name)
			{
				global $finalname;
				$imname = $tmp_name;
				$source_photo = $imname;
				$finalname = $image1_name . ".jpeg";
				$dest_photo = '../assets/user_profile_image/' . $finalname;
				$compressimage = compress_image($source_photo, $dest_photo, 20);
			}
			filter_image($file_tmp_name, $file_name);


			$ulink_profile_image = "SELECT image FROM user WHERE phone='{$_SESSION['phone']}'";
			$unlink_result = mysqli_query($conn, $ulink_profile_image);
			if (mysqli_num_rows($unlink_result)) {
				while ($prodile_image_name = mysqli_fetch_assoc($unlink_result)) {
					$delete_image = $prodile_image_name['image'];
					if ($delete_image == "profile_image.png") {
					} else {
						unlink("../assets/user_profile_image/{$delete_image}");
					}
				}
			}
		} else {
			print_r($errors);
			die();
		}
	}
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$filter_updata_password = md5($password);
	$old_password = $_SESSION['password'];
	$old_hash_password = md5($old_password);

	$sql = "UPDATE user SET name='{$username}' , email='{$email}' , password='{$filter_updata_password}',image='{$finalname}' WHERE phone='{$_SESSION['phone']}' AND password='{$old_hash_password}'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['password'] = $password;
		// $_SESSION['image'] = $file_name;
		header("location:../index.php");
	}
}
?>