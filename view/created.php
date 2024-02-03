<?php require './utilities/connect.php'; ?>
<div class=" container-fluid my-4 d-flex">
	<div class="container-add-album bg-secondary rounded-4  px-4 d-flex justify-content-center align-items-center me-4  bg-danger">
		<a href="./add-album.php" class="d-flex text-white">
			<div class=" ">
				<i class="fa-solid fa-plus"></i>
			</div>
		</a>
	</div>
	<div class="album-container ">
		<?php
		require './utilities/connect.php'; 
		$userid = $_GET['id'];			
		$selectAllAlbum = mysqli_query($conn,"SELECT album.albumid,album.namaalbum FROM album INNER JOIN user on album.userid = user.userid WHERE user.userid = $userid");
		
		if(mysqli_num_rows($selectAllAlbum)){
			foreach($selectAllAlbum as $album){
		 ?>	
		<a href="./album.php?id=<?=$album['albumid'] ?>" class="album-wrapper  text-decoration-none text-black">
			<section class="row section-wrapper rounded-4 m-0 position-relative">
				<div class="overlay"></div>
				<div class="col-6 p-0 left-side">
					<?php 
					$getAlbumThumbnail = mysqli_query($conn,"SELECT album.albumid,foto.lokasifile FROM foto INNER JOIN album on foto.albumid = album.albumid INNER JOIN user on album.userid = user.userid WHERE album.albumid =".$album['albumid']." AND user.userid = $userid LIMIT 3");
					$gambar = [];
					if(mysqli_num_rows($getAlbumThumbnail)){
						// $albumThumb = $getAlbumThumbnail->fetch_assoc();
						foreach ($getAlbumThumbnail as $albumThumb) {
							$gambar[] = $albumThumb['lokasifile'];
							
						}

					 ?>
					<img src="<?= (isset($gambar[0])) ? "./image/$gambar[0]" : "./assets/no-profile.webp" ?>" class="w-100 ">
				</div>
				<div class="col-6 p-0 right-side">
					<div class="row ">
						<div class="col-12 p-0">
							<img src="<?= (isset($gambar[1])) ? "./image/$gambar[1]" : "./assets/no-profile.webp"  ?>" class="w-100 top">
						</div>
						<div class="col-12 p-0">
							<img src="<?= (isset($gambar[2])) ? "./image/$gambar[2]" : "./assets/no-profile.webp"  ?>" class="w-100 bottom">
						</div>
					</div>
				</div>	
			<?php } ?>
			</section>
			<section>
				<h5 class="fs-4 mb-0"><?= $album['namaalbum'] ?></h5>
			</section>
		</a>
		<?php 
		}
	}
		 ?>
	</div>
</div>