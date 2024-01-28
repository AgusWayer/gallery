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
	<?php if(isset($_GET['msg']) && $_GET['msg'] == '201'){
		?>
		<div class="modal fade" id="modalMsg">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						Message
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Bukan Merupakan Image!</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<?php }else if(isset($_GET['msg']) && $_GET['msg'] == '202'){?>
		<div class="modal fade" id="modalMsg">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						Message
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Size Image Melebihi 5 Mb!</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class=" w-75 mx-auto">
		<div class="">
				<div class="row">
					<div class="upload-container col-6 d-flex justify-content-center align-items-center" id="upload-container" >	
						
						<label for="photo" id="photoLabel" class="w-75 p-3 h-75 d-flex justify-content-center align-items-center photo-upload flex-column text-secondary">

							<i class="fa-solid fa-upload fs-3"></i>
							<h3>Upload a Photo</h3>
						</label>
					</div>
					<div class="col-6">
					<form class="w-75" action="utilities/image.php" method="POST" enctype="multipart/form-data">
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
							<button name="add-image" class="btn btn-danger rounded-pill px-4 py-2">Submit</button>
						</div>
						<input type="file" id="photo" name="photo" hidden onchange="previewImage('photo','preview','upload-container')">
						<input type="text" name="userid" value="<?= $_SESSION['user']['id'] ?>" hidden>
					</form>
					</div>
				</div>
			
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="script/image.js"></script>
	<script type="text/javascript">
		$(window).on('load',()=>{
			$('#modalMsg').modal('show')
			
		})
		// if(photo){
		// 	console.log(photo.value)
		// }
		
	</script>
</body>
</html>
<?php ?>