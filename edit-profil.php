<?php 
	session_start();
	require "utilities/connect.php";
	if(!isset($_GET['id']) && isset($_SESSION['user'])){
		header("location: ./login.php");
	}
	$userid = $_GET['id'];
	$getUser = mysqli_query($conn,"SELECT * FROM user WHERE userid = $userid");
	if(mysqli_num_rows($getUser)){
		foreach ($getUser as $user) {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
	<link rel="stylesheet" type="text/css" href="style/edit-profil.css">
	<title>EDIT PROFILE</title>
</head>
<body>
	<?php require 'components/topbar.php'; ?>
	<div class="container">
		<form action="utilities/login.php" method="POST">
			<div class="row ">
				<div class="col-6 text-center wrapper">
					<div class="img-container position-relative mx-auto">
						<div class="edit-profile-pict text-white">
							<label for="profile" class=" p-0 fw-bold"><i class="fa-solid fa-pen"></i> Edit Profile</label>
							<input type="file" hidden name="profile" id="profile" onchange>
						</div>
						<img src="./profile/<?= $_SESSION['user']['profile'] ?>" class="w-100 h-100 image-profile" id="profile-pict">
					</div>
				</div>
				<div class="col-6">
					<h5 class="text-center">Edit Your Profile</h5>
					<form>
						<div class="mt-4">
							<label for="username" class="fw-bold">Username</label>
							<input type="text" name="username" class="form-control" id="username" value="<?= $user['username'] ?>">
						</div>
						<div class="mt-4">
							<label for="alamat" class="fw-bold">Password</label>
							<input type="text" name="alamat" class="form-control" id="alamat" value="<?= $user['namalengkap'] ?>">
						</div>
						<div class="mt-4">
							<label for="namalengkap" class="fw-bold">Nama Lengkap</label>
							<input type="text" name="namalengkap" class="form-control" id="namalengkap" value="<?= $user['namalengkap'] ?>">
						</div>
						<div class="mt-4">
							<label for="alamat" class="fw-bold">Alamat</label>
							<input type="text" name="alamat" class="form-control" id="alamat" value="<?= $user['namalengkap'] ?>">
						</div>
						<div class="mt-4 text-center">
							<button class="btn btn-danger px-4 py-2 rounded-pill fw-semibold">Save</button>
						</div>
					</form>
				</div>
			</div>
		</form>
	</div>
	<script src="script/image.js"></script>
</body>
</html>		
<?php 
}
	}
 ?>