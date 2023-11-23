<section class="food_section layout_padding">
    <div class="container">
        <div class="mt-5"></div>
        <div class="heading_container heading_center">
            <h2>Menu món ăn</h2>
        </div>

        <div class="filters-content">

            <div class="heading_container ">
                <h2>Món Khai Vị</h2>
            </div>
            <div class="row grid">
                <?php
                $i = 0;
                if (empty($dsma)) {
                    echo '
                        <h3 class="text-center">Món ăn bạn tìm nhà hàng không có!</h3>
                        <div class="loading_img">
                            <img src="./extentions/images/loading.gif" alt="IMG">
                        </div>                    
                    ';
                } else {
                    $mon_an = load_monAn_by_danhMuc(9);
                    foreach ($mon_an as $ma) {
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
                }
                ?>
            </div>
            <div class="heading_container ">
                <h2>Món Chính</h2>
            </div>
            <div class="row grid">
                <?php
                $i = 0;
                if (empty($dsma)) {
                    echo '
                        <h3 class="text-center">Món ăn bạn tìm nhà hàng không có!</h3>
                        <div class="loading_img">
                            <img src="./extentions/images/loading.gif" alt="IMG">
                        </div>                    
                    ';
                } else {
                    $mon_an = load_monAn_by_danhMuc(10);
                    foreach ($mon_an as $ma) {
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
                }
                ?>
            </div>
            <div class="heading_container ">
                <h2>Món Tráng Miệng</h2>
            </div>
            <div class="row grid">
                <?php
                $i = 0;
                if (empty($dsma)) {
                    echo '
                        <h3 class="text-center">Món ăn bạn tìm nhà hàng không có!</h3>
                        <div class="loading_img">
                            <img src="./extentions/images/loading.gif" alt="IMG">
                        </div>                    
                    ';
                } else {
                    $mon_an = load_monAn_by_danhMuc(12);
                    foreach ($mon_an as $ma) {
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
                }
                ?>
            </div>
            <div class="heading_container ">
                <h2>Nước Uống</h2>
            </div>
            <div class="row grid">
                <?php
                $i = 0;
                if (empty($dsma)) {
                    echo '
                        <h3 class="text-center">Món ăn bạn tìm nhà hàng không có!</h3>
                        <div class="loading_img">
                            <img src="./extentions/images/loading.gif" alt="IMG">
                        </div>                    
                    ';
                } else {
                    $mon_an = load_monAn_by_danhMuc(11);
                    foreach ($mon_an as $ma) {
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
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- end food section -->

<!-- footer section -->