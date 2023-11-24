<section class="food_section layout_padding">
	<div class="container">
		<div class="heading_container heading_center">
			<h2>Món ăn nổi bật</h2>
		</div>

		<div class="filters-content">

			<div class="row grid">
				<?php
				$i = 0;
				foreach ($show_monan as $ma) {
					extract($ma);
					$gia_km = $gia - $gia_giam;
					$link_ma_ct = "index.php?act=monanct&id_ma=" . $id;
					$hinh_ma = "uploads/" . $hinh;
					echo '
					<div class="col-sm-6 col-lg-4 all pizza" data-name="p-1">
						<div class="box product" data-name="p-1">
							<div>
								<div class="img-box">
									<a href="' . $link_ma_ct . '" class="image">
										<img src="' . $hinh_ma . '" alt="IMG" >
									</a>
								</div>
								<div class="detail-box">
									<h5>' . $ten . '</h5>
									<div class="options">
										<h6>' . number_format($gia_km, 0, ',', '.') . 'đ</h6>
										<a href="' . $link_ma_ct . '" class="btn btn-warning">
										<i class="fa-solid fa-circle-info"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					';
					$i += 1;

				}
				?>
			</div>
		</div>


		<div class="btn-box">
			<a href="index.php?act=monan"> Xem thêm </a>
		</div>
	</div>

</section>

<!-- end food section -->

<!-- footer section -->