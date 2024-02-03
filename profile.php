<?php 
require "utilities/connect.php";
session_start(); 
if(!isset($_SESSION['user'])){
	header("location: ./login.php");
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="style/profile.css">
	
	<title>DEEZ PROFILE</title>
</head>
<body>
	<?php require"components/topbar.php" ?>
	<div class="container-fluid">
		<div class="my-3 text-center">
			<div class="avatar text-center mb-2">
				<?php
					$userid = $_GET['id'];
					$query = mysqli_query($conn,"SELECT * FROM USER WHERE userid =$userid");
					if(mysqli_num_rows($query)){
						foreach($query as $user){
				?>
						<img src="./profile/<?= $user['profile'] ?>">
						<h2 class=" "><?= $user['namalengkap'] ?></h2>
						<p class=" text-secondary"><?= $user['email'] ?></p>
				<?php 
						}
					}?>
			</div>
			<?php 
				if($_SESSION['user']['id'] == $_GET['id']){
				?>
			<div class="">
				<a href="./edit-profil.php?id=<?= $_SESSION['user']['id'] ?>" class="btn edit-button fw-semibold rounded-pill py-2 px-4">Edit Profil
				</a>
				
				<a href="utilities/login.php?action=logout" class="btn fw-semibold rounded-pill py-2 px-4 btn-danger">Log Out</a>
				
			</div>
			<?php
				} ?>
		</div>
		<div class="my-4">
			<div class="d-flex justify-content-center">
				<a href="./profile.php?view=created&id=<?=$userid ?>" class=" text-decoration-none text-black <?php if(isset($_GET['view']) && $_GET['view'] == 'created'){echo "border-bottom border-black";}else if(!isset($_GET['view'])){echo "border-bottom border-black";} ?>"><h5>Created</h5></a>
			</div>
			<div>
				<?php
				 if(isset($_GET['view']) && $_GET['view'] == "created"){
						require("view/created.php");
					}else{
						require("view/created.php");
					}
				 ?>
			</div>
		</div>
	</div>
</body>
</html>