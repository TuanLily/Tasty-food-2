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
                <!-- <div class="col-sm-6 col-lg-4 all pizza" data-name="p-1">
					<div class="box product" data-name="p-1">
						<div>
							<div class="img-box">
								<img src="./extentions/images/f1.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Pizza Hải Sản</h5>
								<p>
									Món pizza hải sản là một tuyệt phẩm ẩm thực kết hợp giữa
									hương vị độc đáo của hải sản tươi ngon và sự phong phú của
									các thành phần khác trên một nền bánh pizza đẹp mắt
								</p>
								<div class="options">
									<h6>235,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 all burger">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/f2.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Burger Phô mai</h5>
								<p>
									Món ăn phô mai là một tráng miệng ngon lành, thường làm từ
									các loại phô mai truyền thống hoặc phô mai mềm. Với hương
									vị đặc biệt và độ béo ngậy, phô mai được tạo nên từ quá
									trình chế biến và ủ chất liệu từ sữa.
								</p>
								<div class="options">
									<h6>70,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 all pizza">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/f3.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Pizza Sốt Cà Chua</h5>
								<p>
									Pizza sốt cà chua là món ăn phổ biến với nền bánh mỏng và
									sốt cà chua đậm đà. Hương vị tươi ngon của cà chua kết hợp
									với gia vị như tỏi, hành, oregano và muối. Mỗi miếng pizza
									thơm ngon
								</p>
								<div class="options">
									<h6>150,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 all pasta">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/f4.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Mì ống với salad</h5>
								<p>
									Mì ống với salad Món ăn Ý kết hợp giữa mì ống và salad
									tươi. Mì ống chín vừa, salad gồm rau tươi như xà lách, cà
									chua, dưa leo và hành tây, gia vị bằng dấm balsamic, dầu
									ô-liu. Hòa quyện vị ngọt
								</p>
								<div class="options">
									<h6>75,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 all fries">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/f5.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Khoai tây chiên</h5>
								<p>
									Khoai tây chiên Món ăn phổ biến, khoai tây cắt mỏng, chiên
									vàng giòn. Vị mặn, gia vị muối, hành tỏi. Kèm sốt cà chua,
									mayonnaise hoặc BBQ. Đơn giản, thơm ngon, giòn hấp dẫn.
								</p>
								<div class="options">
									<h6>35,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 all pizza">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/f6.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Pizza Rau củ thập cẩm</h5>
								<p>
									Pizza Rau củ thập cẩm: Bánh pizza sốt cà chua đậm đà, rau
									củ đa dạng như cà rốt, hành tây, nấm, ớt. Món Pizza Rau củ
									thập cẩm không chỉ ngon mà còn bổ dưỡng, phù hợp cho người
									ưa thích chế độ ăn rau.
								</p>
								<div class="options">
									<h6>90,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 all burger">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/f7.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Burger Gà bơ Tây Nam</h5>
								<p>
									Burger Gà bơ Bánh burger tròn, gà nướng với lớp bơ mềm
									mượt. Kèm rau xanh, cà chua, hành tây và sốt gia vị. Hương
									vị độc đáo từ bơ kết hợp với gà, một trải nghiệm thú vị
									cho người thích burger.
								</p>
								<div class="options">
									<h6>85,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 all burger">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/f8.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Burger Gà nướng</h5>
								<p>
									Burger Gà nướng Bánh burger tròn, gà nướng thịt mềm và
									thơm ngon. Kèm rau xanh, cà chua, hành tây và sốt gia vị.
									Hương vị đậm đà từ gà nướng, trải nghiệm burger ngon lành
									cho người thích gà và burger.
								</p>
								<div class="options">
									<h6>80,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4 all pasta">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/f9.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Mì ống Hummus với Thịt</h5>
								<p>
									mì ống được trộn đều với hummus và thịt để tạo ra một món
									ăn ngon miệng. Hương vị độc đáo của hummus kết hợp với
									thịt thơm ngon tạo nên sự kết hợp hài hòa và đa dạng. Bạn
									có thể thêm các loại rau sống
								</p>
								<div class="options">
									<h6>85,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 all thucuong">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/T_U1.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Chai Coca-Cola 390ml</h5>
								<p>
									Nước ngọt Coca-Cola 390ml Bottle có ga mát lạnh sảng khoái
									với vị Cola đặc trưng, giúp bữa tiệc pizza thêm phần hứng
									khởi.
								</p>
								<div class="options">
									<h6>20,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 all thucuong">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/T_U2.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Chai Fanta 390ml</h5>
								<p>
									chai Fanta 390ml Với một hương vị trái cây tươi mát, là
									một loại nước giải khát có mùi hương và vị ngon đặc trưng.
								</p>
								<div class="options">
									<h6>20,000₫</h6>
									<a href="">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 all thucuong product" data-name="p-1">
					<div class="box">
						<div>
							<div class="img-box">
								<img src="./extentions/images/T_U3.png" alt="" />
							</div>
							<div class="detail-box">
								<h5>Chai Sprite 390ml</h5>
								<p>
									Chai Sprite 390ml Với hương vị tươi nhẹ và một chút chua
									ngọt, Sprite có thể mang lại cảm giác sảng khoái cho người
									uống.
								</p>
								<div class="options">
									<h6 class="price">20,000₫</h6>
									<a href="#">
										<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
											xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											viewBox="0 0 456.029 456.029"
											style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
											<g>
												<g>
													<path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
						 c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
						 C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
						 c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
						 C457.728,97.71,450.56,86.958,439.296,84.91z" />
												</g>
											</g>
											<g>
												<g>
													<path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
						 c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
												</g>
											</g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
											<g></g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div> -->


            </div>
        </div>


        <div class="btn-box">
            <a href=""> Xem thêm </a>
        </div>
    </div>

</section>

<!-- end food section -->

<!-- footer section -->