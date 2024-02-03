<?php require"./utilities/connect.php"; ?>
<div class=" my-3">
	<h3 class="text-center"><?php 
	if(isset($_SESSION['user'])){
		echo "Welcome, ".$_SESSION['user']['username'];
	}else{
		echo "Hello";
	}; ?></h3>
	<p class="text-center">Let's Discover something new here!</p>
	<div class="categories mx-auto p-0 m-0 swiper">
		<div class="swiper-wrapper">
			<?php 
			$userid = $_SESSION['user']['id'];
			$selectAllAlbum = mysqli_query($conn,"SELECT album.albumid,album.namaalbum,foto.lokasifile from album INNER JOIN foto on album.albumid = foto.albumid WHERE album.userid = $userid");
			function getRandomColor($colorArray) {
				$randomIndex = rand(0, count($colorArray) - 1);
				return $colorArray[$randomIndex];
			}
			if(mysqli_num_rows($selectAllAlbum)){
				$background = ['#43766C','#B19470','#92C7CF','#92C7CF','#65B741','#025464','#4C4C6D','#FFE194'];
				foreach($selectAllAlbum as $album){
			 ?>
			<a href="./album.php?id=<?= $album['albumid'] ?>" class="category d-flex align-items-center swiper-slide text-decoration-none" style="<?php 
				$color = getRandomColor($background);
				echo "background-color : $color";
				 ?>">
				<?php 
					$getAlbumThumbnail = mysqli_query($conn,"SELECT album.albumid,foto.lokasifile FROM foto INNER JOIN album on foto.albumid = album.albumid WHERE album.albumid =".$album['albumid']." LIMIT 3");
					$gambar = [];
					
					
					if(mysqli_num_rows($getAlbumThumbnail)){
						// $albumThumb = $getAlbumThumbnail->fetch_assoc();
						foreach ($getAlbumThumbnail as $albumThumb) {
							$gambar[] = $albumThumb['lokasifile'];
							
						}
					}

				 ?>
				<div class="img-container" >
					<img src="<?= (isset($gambar[0])) ? "./image/$gambar[0]" : "./assets/no-profile.webp"  ?>">
					<img src="<?= (isset($gambar[1])) ? "./image/$gambar[1]" : "./assets/no-profile.webp"  ?>">
					<img src="<?= (isset($gambar[2])) ? "./image/$gambar[2]" : "./assets/no-profile.webp"  ?>">
				</div>
				<div class="">
					<h4 class="text-white"><?= $album['namaalbum'] ?></h4>
				</div>	
			</a>
		<?php }
		} ?>
		</div>
		
	</div>
	<div class="grid mx-auto my-3">
		<?php 
		$query = mysqli_query($conn,"SELECT * FROM foto");
		if(mysqli_num_rows($query)){
			foreach ($query as $foto) {
			?>
		<div class="grid-item">
				<div class="content-container">
					<a href="./image.php?id=<?= $foto['fotoid']?>">
						<div class="overlay"></div>
						<img src="./image/<?= $foto['lokasifile'] ?>" class="h-100">
					</a>
					<div class="content ">
						<div class="  d-flex icons p-2">
							<a href="./image/<?=$foto['lokasifile'] ?>" download class="icon-container text-white"><i class="fa-solid fa-download fs-5 "></i></a>
							<?php if($foto['userid'] == $_SESSION['user']['id']){
							?>
							<a href="./utilities/image.php?action=delete&id=<?=$foto['fotoid'] ?>" onclick="return alert('Are u Sure?')" class="icon-container text-white"><i class="fa-solid fa-trash fs-5"></i></a>
							<?php 
							}  ?>
						</div>
					</div>
				</div>	
		</div>
		<?php 
	}
	} ?>
	</div>
</div>
