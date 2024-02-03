<?php 
	session_start();
	require "utilities/connect.php"; 
	if(isset($_GET['id'])){
		$fotoid = $_GET['id'];
		$userid = $_SESSION['user']['id'];
		$query = mysqli_query($conn,"SELECT * FROM foto WHERE fotoid = $fotoid");
		if(mysqli_num_rows($query)){
			foreach($query as $foto){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
	<link rel="stylesheet" type="text/css" href="style/image.css">
	<title>JUDUL</title>
</head>
<body>
	<?php require "components/topbar.php" ?>
	<div class="container my-3 shadow rounded-5 position-relative">
		<div class="row">
			<div class="col-6 p-0">
				<img src="./image/<?=$foto['lokasifile'] ?>" class="w-100">
			</div>
			<div class="col-6 p-4 position-relative">
				<section class="text-end">
					<button class="btn me-3" onclick="handleCategory()">Category <i class="fa-solid fa-chevron-down ms-2"></i></button>
					<a href="" class="btn btn-danger rounded-pill px-4 py-2">Save</a>
				</section>
				<h1><?= $foto['judulfoto'] ?></h1>
				<p><?= $foto['deskripsifoto'] ?></p>
				<!-- add category -->
				<div class="category-container p-3 rounded-4 text-center position-relative">
					<div class="position-absolute end-0 text-end top-0 p-3">
						<button class="btn" onclick="handleCategory()">
							<i class="fa-solid fa-x"></i>
						</button>
					</div>
					
					<h5 class="text-center">Simpan</h5>
					<form method="POST">

						<input type="text" name="searchAlbum" placeholder="Search..." class="rounded-pill form-control text-secondary my-3 px-4 py-2">
					</form>
					<section class="category-body">
						<div class="category-teratas">
							<p class="text-start mb-0 fw-semibold ms-1">Top Choices</p>
							<?php
							$i = 0;
							while($i < 3){
							 ?>
							<div class="category-wrapper row align-items-center rounded-3 py-2 pe-4">
								<div class="col-3">
									<img src="assets/image1.jpg" class="img-category rounded-3">
								</div>
								<div class="col-6 text-start">
									<h5>Cover</h5>
								</div>
								<div class="col-3">
									<a href="" class="btn btn-danger rounded-pill px-4 py-2 save-button">Save</a>
								</div>
							</div>
							<?php $i++;
							} ?>
						</div>
						<div class="category-all">
							<p class="text-start mb-0 fw-semibold ms-1">All Choices</p>
							<?php
							$i = 0;
							while($i < 3){
							 ?>
							<div class="category-wrapper row align-items-center rounded-3 py-2 pe-4">
								<div class="col-3">
									<img src="assets/image1.jpg" class="img-category rounded-3">
								</div>
								<div class="col-6 text-start">
									<h5>Cover</h5>
								</div>
								<div class="col-3">
									<a href="" class="btn btn-danger rounded-pill px-4 py-2 save-button">Save</a>
								</div>
							</div>
							<?php $i++;
							} ?>
						</div>
					</section>
					<section class="py-3 ">
						<div class="row align-items-center">
							<div class="col-3 ">
								<button  class="btn bg-secondary px-3 fs-4"><i class="fa-solid fa-plus"></i></button>
							</div>
							<div class="col-9 text-start">
								<h5>Add Album</h5>
							</div>
						</div>
					</section>
				</div>
				<!-- add category end -->

				<!-- profile  -->
				<?php 
					$ambilUser = mysqli_query($conn,"SELECT user.userid,user.username,user.profile from user inner join foto on user.userid = foto.userid WHERE foto.fotoid = $fotoid");
					if(mysqli_num_rows($ambilUser)){
						foreach($ambilUser as $user){
					
					?>
				<div class="row my-4">
					<div class="col-2">
						<a href="./profile.php?id=<?= $user['userid'] ?>" class="mx-0 p-0">
							<img src="./profile/<?=$user['profile'] ?>" class="img-profile">
						</a>
					</div>	
					<div class="col-7 text-start">
						<div class="d-block mx-0">
							<h5 class="mb-0"><?= $user['username'] ?></h5>
						</div>
					</div>
				</div>
			<?php }
			} ?>
				<!-- profile end -->
				<!-- comment start -->
				<div class="comment">
					<h5 class="fw-semibold">Comments</h5>
					
					<div class="comment-container">
						
						<div class="comment-wrapper row my-3">
							<div class="col-2">
								<a href="">
									<img src="assets/suguru.jpeg" class="img-profile">
								</a>
							</div>
							<div class="col-10">
								<div class="d-block">
									<h5 class="mb-0">Nama</h5>
									<p>lorem ipsumasdkasjdlkajkldjlajdljakldjakljqiojjns</p>
								</div>
								<div class="d-flex align-items-center">
									<p class="waktu-comment my-0 me-3">5 mnt </p>
									<a href="" class="text-secondary me-3"><i class="fa-regular fa-heart "></i></a>
									<a class=" text-decoration-none text-secondary fw-bold me-3">Reply</a>
									<button class="btn p-0 m-0"><i class="fa-solid fa-ellipsis"></i></button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<!-- comment end -->
				<div class="upload-comment ">
					<div class="d-flex justify-content-between ">
						<?php 
						$ambilComment = mysqli_query($conn,"SELECT COUNT(komentarfoto.komentarid) as jumlahkomen FROM komentarfoto INNER JOIN foto ON komentarfoto.fotoid = foto.fotoid INNER JOIN user ON komentarfoto.userid = user.userid WHERE komentarfoto.fotoid = $fotoid AND komentarfoto.userid = $userid");
						if(mysqli_num_rows($ambilComment)){
							foreach($ambilComment as $comment){
						 ?>
						<h5><?= $comment['jumlahkomen'] ?> Comment</h5>
						<?php 
							}
						}
						 ?>
					</div>
					<div class="row py-1 align-items-center	">
						<?php 
						if(mysqli_num_rows($ambilUser)){
							foreach ($ambilUser as $user) {
						 ?>
						<div class="col-2">
							<a href="">
								<img src="./profile/<?= $user['profile'] ?>" class="img-profile">
							</a>
						</div>
						<div class="col-10">
							<form method="POST" action="utilities/comment.php" class="d-flex w-100">
								<input type="number" hidden name="fotoid" value="<?= $fotoid ?>">
								<input type="number" hidden name="userid" value="<?= $userid ?>">
								<div>
									<input type="text" name="isikomentar" placeholder="Tambahan Komentar" class="form-control rounded-pill py-2 px-4 w-">
								</div>
								<div>
									<button type="submit" name="submit-comment" class="btn ms-3"> <i class="fa-solid fa-paper-plane"></i></button>
								</div>
							</form>
						</div>
					<?php
						}
					 } ?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<script type="text/javascript">
		const categoryContainer = document.querySelector(".category-container");
		const handleCategory = ()=>{
			categoryContainer.classList.toggle("active")
		}
	</script>
</body>
</html>
<?php 
		}
	}
} ?>