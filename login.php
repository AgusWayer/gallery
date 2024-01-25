<?php 
session_start();
if(isset($_SESSION['user'])){
	header("location: ./index.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="style/login.css">
	<title>DEEZ | LOGIN</title>
</head>
<body>
	<?php if(isset($_GET['msg']) && $_GET['msg'] == '101'){
		?>
		<div class="modal fade" id="modalMsg">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						Message
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Username atau Password Salah!</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="w-75 d-flex card-container">
		<?php if(isset($_GET['view']) && $_GET['view'] == 'register'){ ?>
			<aside class="w-50 side text-end pe-2 d-flex justify-content-end order-2">
				<img src="assets/register-img.png" class="w-75 ">
			</aside>
			<div class="content w-50 p-5 order-1">
				<h4 class="text-center title fs-3 fw-bold">Register</h4>
				<p class="text-center">Hello! Let's Make an Account First!</p>
				<?php  ?>
				<?php if(!isset($_GET['page']) || $_GET['page'] == 1){ ?>
				<form action="utilities/login.php" method="POST">
					<div>
						<label for="" class="mb-2 fw-semibold">Nama Lengkap</label>
						<input type="text" name="namalengkap" required class="form-control">
					</div>
					<div class="mt-4">
						<label class="mb-2 fw-semibold">Alamat</label>
						<div class="form-control w-fi d-flex justify-content-center align-items-center">
							<input type="text" name="alamat" required class="border-0 w-100">
						</div>
					</div>
					<div class="mt-4">
						<label class="mb-2 fw-semibold">Email</label>
						<div class="form-control w-fi d-flex justify-content-center align-items-center">
							<input type="email" name="email" required class="border-0 w-100">
						</div>
					</div>
					<div class="text-center my-4">
						<button type="submit" name="register_1" class="rounded-pill login-btn fw-semibold py-2">Next</button>
					</div>
				</form>
				<?php }else if(isset($_GET['page']) && $_GET['page'] == 2){?>
				<form action="utilities/login.php" method="POST">
					<div>
						<label for="" class="mb-2 fw-semibold">Username</label>
						<input type="text" name="username" required class="form-control">
					</div>
					<div class="mt-4">
						<label class="mb-2 fw-semibold">Password</label>
						<div class="form-control w-fi d-flex justify-content-center align-items-center">
							<input type="password" name="password" class="border-0 w-100" id="password">
							<i class="fa-solid fa-eye text-secondary" id="eye"></i>
						</div>
					</div>
					<div class="text-center my-4">
						<button type="submit" name="register_2" class="rounded-pill login-btn fw-semibold py-2">Create Account</button>
					</div>
				</form>
				<?php } ?>

			</div>
		<?php }else{?>
			<aside class="w-50 side text-end pe-2 d-flex justify-content-end">
				<img src="assets/login-img.png" class="w-75 ">
			</aside>
			<div class="content w-50 p-5">
				<h4 class="text-center title fs-3 fw-bold">Login</h4>
				<p class="text-center">Hello! Welcome back, first of all let's log in first and you can enjoy the gallery!</p>
				<form action="utilities/login.php" method="POST">
					<div>
						<label for="" class="mb-2 fw-semibold">Username</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="mt-4">
						<label class="mb-2 fw-semibold">Password</label>
						<div class="form-control w-fi d-flex justify-content-center align-items-center">
							<input type="password" name="password" class="border-0 w-100" id="password">
							<i class="fa-solid fa-eye text-secondary" id="eye"></i>
						</div>
					</div>
					<div class="text-center my-4">
						<button type="submit" name="submit" class="rounded-pill login-btn fw-semibold py-2">Log In</button>
					</div>
				</form>
				<div class="text-center">
					<span>Don't Have an Account? <a href="./login.php?view=register	">Register</a></span>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="color">	
	</div>
	<div class="color">	
	</div>
	<div class="color">	
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="script/login.js"></script>
	<script type="text/javascript">
		$(window).on('load',()=>{
			$('#modalMsg').modal('show')
			
		})
	</script>
</body>
</html>