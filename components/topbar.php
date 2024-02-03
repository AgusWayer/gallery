<link rel="stylesheet" type="text/css" href="./style/topbar.css">
<div class="navbar navbar-expand-md bg-white" id="navbar">
	<div class="container ">
		<div class="logo">
			<a href="./index.php" class="text-decoration-none text-black fw-bold fs-5">Deezz</a>
		</div>
		<div class="input-search w-50">
			<form action="utilities/image.php" method="POST">
				<div class="form-control px-2 py-1 rounded-pill d-flex justify-content-center align-items-center">
					<input type="text" name="search" class="w-100 border-0 px-2">
					<button class="btn" type="submit" name="search-image"><i class="fa-solid fa-magnifying-glass "></i></button>
				</div>
				
			</form>
		</div>
		<div class="d-flex align-items-center ">
			<div class="profile">
				<a href="./profile.php?id=<?=$_SESSION['user']['id'] ?>">
					<?php if(isset($_SESSION['user']['profile']))	{
					?>
						<img src="profile/<?= $_SESSION['user']['profile']?>" class="rounded-circle">
					<?php
					}else{?>
						<img src="./assets/no-profile.webp" class="rounded-circle">
					<?php } ?>
					
				</a>
				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="./script/topbar.js"></script>