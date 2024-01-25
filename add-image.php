<?php 
	session_start();
	if(!isset($_SESSION['user'])){
		header("location: ./login.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<title>UPLOAD IMAGE</title>
</head>
<body>
	<?php require "components/topbar.php"; ?>
	<div class=" w-75 mx-auto">
		<div class="">
				<div class="row">
					<div class="upload-container col-6 d-flex justify-content-center align-items-center">
						<label for="photo" id="photoLabel" class="w-75 p-3 h-75 d-flex justify-content-center align-items-center photo-upload flex-column text-secondary">
							<i class="fa-solid fa-upload fs-3"></i>
							<h3>Upload a Photo</h3>
						</label>
					</div>
					<div class="col-6">
					<form class="w-75">
						<div class="my-4">
							<label class="d-block mb-2 fs-5 fw-bold">Judul Foto</label>
							<input type="text" name="judulfoto" class="form-control ">
						</div>
						<div class="my-4">
							<label class="d-block mb-2 fs-5 fw-bold">Deskripsi Foto</label>
							<textarea name="deskripsifoto" rows="4"   class="form-control "></textarea>
						</div>
						<div class="my-4">
							<select name="album" class="form-control ">
								<option hidden selected>Album</option>
								<option value="1">Anime</option>
							</select>
						</div>
						<div class="my-4 text-center">
							<button class="btn btn-danger rounded-pill px-4 py-2">Submit</button>
						</div>
						<input type="file" id="photo" name="photo" class="d-none" >
					</form>
					</div>
				</div>
			
		</div>
	</div>
	<script type="text/javascript">
		const photo = document.getElementById("photo")
		if(photo){
			console.log(photo);
		}
		
		// if(photo){
		// 	console.log(photo.value)
		// }
		
	</script>
</body>
</html>
<?php ?>