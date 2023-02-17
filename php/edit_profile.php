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
	<title>Profile Card UI Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="all-css/userprofile.css">
	<style>
		input {
			outline: none;
			border-radius: 4px;
			width: 100%;
		}
	</style>
</head>

<body>
	<section class="main-content">
		<div class="container" style="margin-top: 100px;">
			<div class="row">
				<div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
					<h4 style="text-align:center; user-select:none;">Update Profile</h4>
				</div>
				<div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
					<?php $image = "c.jpg"; ?>
					<form method="POST" enctype="multipart/form-data">
						<div class="profile-card card rounded-lg shadow p-4 p-xl-5 mb-4 text-center position-relative overflow-hidden">
							<label for="logo" style="width:120px; height:120px; margin-left:55px; margin-top:-20px;">
								<img for="logo" style="border-radius: 50%; width: 100%; height: 100%; display: inline-block;" src="../assets/<?php
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
								<span style="display:inline-block; position:relative; top:-70px; left:57px; transform:rotateZ(90deg); background-color:white; border-radius:50%; padding:3px; box-shadow:0px 0px 1px black;">&#x270E;</span>
							</label>
							<input type="file" name="logo" id="logo" hidden>
							<input type="text" name="username" placeholder="Username" value="<?php echo $_SESSION['name']; ?>" required><br><br>
							<input type="email" name="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>" required><br><br>
							<input type="text" name="password" placeholder="Password" value="<?php echo $_SESSION['password']; ?>" required><br><br>
							<input type="submit" name="btn" placeholder="Updata" value="Update">
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
if (isset($_POST['btn'])) {
	if (!empty(($_FILES['logo']))) {
		$errors = array();
		$file_name = $_FILES["logo"]['name'];
		$file_size = $_FILES["logo"]['size'];
		$file_type = $_FILES["logo"]['type'];
		$file_tmp_name = $_FILES["logo"]['tmp_name'];

		$type = explode('.', $file_name);
		$a = strtolower(end($type));
		$extensions = array("jpeg", "jpg", "png", "webp");
		if (in_array($a, $extensions) === false) {
			$errors[] = "this extensions file not allowed. please choose a jpg or png file";
		}
		if ($file_size > 5242880) {
			$errors[] = "File size must be 5mb or lower";
		}
		if (empty($errors) == true) {
			move_uploaded_file($file_tmp_name, "../assets/user_profile_image/" . $file_name);

			$ulink_profile_image = "SELECT image FROM user WHERE phone='{$_SESSION['phone']}'";
			$unlink_result = mysqli_query($conn, $ulink_profile_image);
			if (mysqli_num_rows($unlink_result)) {
				while ($prodile_image_name = mysqli_fetch_assoc($unlink_result)) {
					$delete_image = $prodile_image_name['image'];
					unlink("../assets/user_profile_image/{$delete_image}");
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

	$sql = "UPDATE user SET name='{$username}' , email='{$email}' , password='{$filter_updata_password}',image='{$file_name}' WHERE phone='{$_SESSION['phone']}' AND password='{$old_hash_password}'";
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

<?php
// include 'config.php';
// $get_prifile_image = "SELECT image FROM user WHERE phone='{$_SESSION['phone']}'";
// $get_prifile_image_result = mysqli_query($conn, $get_prifile_image);
// if (mysqli_num_rows($get_prifile_image_result)) {
// 	$image_name5 = mysqli_fetch_assoc($get_prifile_image_result);
// 	if ("profile.png" == $image_name5['image']) {
// 		echo "default_image/profile.png";
// 	} else {
// 		echo $image_name5['image'];
// 	}
// }
?>

<!-- ../assets/profile_image/profile_image.png -->