<?php 
session_start();
if(!isset($_SESSION['user']) && !isset($_GET['id'])){
	header("location: ./login.php");
}else {
	require 'utilities/connect.php';
	$id = $_GET['id'];
	$getAlbumJudul = mysqli_query($conn,"SELECT namaalbum,deskripsi from album WHERE albumid = $id ");

	$getAlbumData = mysqli_query($conn,"SELECT album.namaalbum,album.deskripsi,foto.fotoid,foto.lokasifile,foto.userid FROM foto INNER JOIN album on foto.albumid = album.albumid WHERE album.albumid = $id");
	if(!mysqli_num_rows($getAlbumData)){
		echo mysqli_error($conn);
		
	}
	$row = mysqli_fetch_assoc($getAlbumJudul);
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>	
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<title>ALBUM</title>
</head>
<body>
	<?php require 'components/topbar.php'; ?>
	<div>
		<h3 class="fs-2 text-center"><?= $row['namaalbum'] ?></h3>
		<p class="text-center"> <?= $row['deskripsi'] ?></p>
		<div class="grid mx-auto my-3">
			<?php foreach($getAlbumData as $albumData){ ?>
				<div class="grid-item">
					<div class="content-container">
						<a href="./image.php?id=<?= $albumData['fotoid']?>">
							<div class="overlay"></div>
							<img src="./image/<?= $albumData['lokasifile'] ?>" class="h-100">
						</a>
						<div class="content ">
							<div class="  d-flex icons p-2">
								<a href="./image/<?=$albumData['lokasifile'] ?>" download class="icon-container text-white"><i class="fa-solid fa-download fs-5 "></i></a>
								<?php if($albumData['userid'] == $_SESSION['user']['id']){
								?>
								<a href="./utilities/image.php?action=delete&id=<?=$albumData['fotoid'] ?>" onclick="return alert('Are u Sure?')" class="icon-container text-white"><i class="fa-solid fa-trash fs-5"></i></a>
								<?php 
								}  ?>
							</div>
						</div>
					</div>	
			</div>
			<?php } ?>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="script/masonry.pkgd.min.js">
	</script>
	<script type="text/javascript">
		var elem = document.querySelector('.grid');

		var msnry = new Masonry( elem, {
		  // options
		  itemSelector: '.grid-item',
		  columnWidth: 200,
		  gutter: 10,
		});
		const swiper = new Swiper('.swiper',{
			slidesPerView: 3,
	      	spaceBetween: 10,
			})
		$(window).on('load',()=>{
			$('#modalMsg').modal('show')
			
		})
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
<?php 
} ?>