<link rel="stylesheet" type="text/css" href="./style/topbar.css">
<div class="navbar navbar-expand-md bg-white" id="navbar">
	<div class="container">
		<div class="logo">
			<a href="./index.php" class="text-decoration-none text-black fw-bold fs-5">Deezz</a>
		</div>
		<div class="">
			<div class="navbar-nav">
				<span class="nav-item"><a href="./index.php" class="nav-link">Home</a></span>
				<span class="nav-item"><a href="./discover.php" class="nav-link">Discover</a></span>
			</div>
		</div>
		<div class="d-flex align-items-center ">
			<div class="search">
				<a href="./index.php?view=search" class="nav-link fs-5 pe-3 "><i class="fa-solid fa-magnifying-glass"></i></a>
			</div>
			<div class="notif">
				<a href="./index.php?view=notification" class="nav-link fs-5 pe-3 "><i class="fa-solid fa-bell"></i></a>
			</div>
			<div class="profile">
				<a href="./profile.php?id=">
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