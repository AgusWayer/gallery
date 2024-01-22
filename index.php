<?php  
	session_start();
	$view = '';
	if(isset($_GET['view'])){
		$view = $_GET['view'];
	}
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
	<title>DEEZ GALLERY</title>
</head>
<body >
	<?php require("components/topbar.php") ?>
	<?php 
	if(!$view){
		require"view/index.php";
	}else if($view == "search"){
		echo "search";
	}
	?>
	<div class="add-content">
		<a href="./add-image.php" class="text-white">
			<i class="fa-solid fa-plus"></i>
		</a>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	
</body>
</html>