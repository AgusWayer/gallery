<div class="saved container-fluid my-4">
	<div class="album-container ">
		<?php 
		$i = 0;
		while($i < 10):
		 ?>	
		<a href="" class="album-wrapper  text-decoration-none text-black">
			<section class="row section-wrapper rounded-4 m-0 position-relative">
				<div class="overlay"></div>
				<div class="col-6 p-0 left-side">
					<img src="./assets/suguru.jpeg" class="w-100 ">
				</div>
				<div class="col-6 p-0 right-side">
					<div class="row ">
						<div class="col-12 p-0">
							<img src="./assets/suguru.jpeg" class="w-100 top">
						</div>
						<div class="col-12 p-0">
							<img src="./assets/image1.jpg" class="w-100 bottom">
						</div>
					</div>
				</div>	
			</section>
			<section>
				<h5 class="fs-4 mb-0">Semua Pin</h5>
				<span class="d-flex detail-pin">
					<p class="me-3">134 pin</p>
					<p class="text-secondary">1 tahun</p>
				</span>
			</section>
		</a>
		<?php $i++;
	endwhile; ?>
	</div>
</div>