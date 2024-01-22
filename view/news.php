<div class=" my-3">
	<h3 class="text-center">What's New Today!</h3>
	<p class="text-center">Let's Discover something new here!</p>
	<div class="grid mx-auto my-3">
		<?php 
		$i = 0;
		while($i < 3){
			?>
		<div class="collection">
			<h4>Art</h4>
		</div>
		<div class="grid-item">
				<div class="content-container">
					<a href="./image.php?id=">
						<div class="overlay"></div>
						<img src="./assets/image1.jpg" class="h-100">
					</a>
					<div class="content ">
						<div class="save p-2">
							<a href=""  class="btn btn-danger rounded-pill px-4 py-1">Save</a>
						</div>	
						<div class="  d-flex icons p-2">
							<a href="./assets/image1.jpg" download class="icon-container text-white"><i class="fa-solid fa-download fs-5 "></i></a>
							<a href="./utiities/photo/php?action=delete&id=" class="icon-container text-white	"><i class="fa-solid fa-trash fs-5"></i></a>
							
						</div>
					</div>

				</div>	
		</div>
		<div class="grid-item">
				<div class="content-container">
					<a href="./image.php?id=">
						<div class="overlay"></div>
						<img src="./assets/suguru.jpeg" class="h-100">
					</a>
					<div class="content ">
						<div class="save p-2">
							<a href="" class="btn btn-danger rounded-pill px-4 py-1">Save</a>
						</div>	
						<div class="  d-flex icons p-2">
							<a href="./assets/suguru.jpeg" download="file.jpeg" class="icon-container text-white	"><i class="fa-solid fa-download fs-5 "></i></a>
							<a href="./utiities/photo/php?action=delete&id=" class="icon-container text-white	"><i class="fa-solid fa-trash fs-5"></i></a>
							
						</div>
					</div>

				</div>	
		</div>
		<?php 
		$i++;
	} ?>
	</div>
</div>
