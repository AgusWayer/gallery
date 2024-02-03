<?php 
require 'utilities/connect.php';
session_start();
if(!isset($_SESSION['user'])){
	header("location: ./login.php");
}else{
	$userid = $_SESSION['user']['id'];
	$getUser= mysqli_query($conn,"SELECT userid from user WHERE userid = $userid");
	if(mysqli_num_rows($getUser)){
		foreach($getUser as $user){
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
	<link rel="stylesheet" type="text/css" href="style/album.css">
	<title>ADD ALBUM</title>
</head>
<body>
	<?php require 'components/topbar.php'; ?>
	<?php if(isset($_GET['msg']) && $_GET['msg'] == '701'){
		?>
		<div class="modal fade" id="modalMsg">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						Message
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<p>Berhasil Menambahkan Album</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="mx-auto body container">
		<h5 class="text-center my-3 fs-2">Add New Album</h5>
		<div class=" w-75 mx-auto">
			<div class="text-center w-75 mx-auto">
						<form class="" action="utilities/album.php" method="POST" >
							<div class="my-4">
								<label class="d-block mb-2 fs-5 fw-bold">Judul Album</label>
								<input type="text" name="namaalbum" class="form-control ">
							</div>
							<div class="my-4">
								<label class="d-block mb-2 fs-5 fw-bold">Deskripsi</label>
								<textarea name="deskripsi" rows="4" class="form-control "></textarea>
							</div>

							<div class="my-4 text-center">
								<button name="add-album" class="btn btn-danger rounded-pill px-4 py-2">Submit</button>
							</div>
							<input type="hidden" hidden name="userid" value="<?= $user['userid']  ?>">
						</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(window).on('load',()=>{
			$('#modalMsg').modal('show')
			
		})
	</script>
</body>
</html>

<?php
		} 
	}
} ?>