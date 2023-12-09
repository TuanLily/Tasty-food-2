<section class="food_section layout_padding">
    <div class="container">
        <div class="mt-5 mt-3"></div>
        <br>
        <div class="heading_container heading_center">
            <h2>Món ăn được tìm với từ khóa
                <span>
                    "
                    <?= $keyw ?>
                    "
                </span>
            </h2>
        </div>

        <div class="filters-content">

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
                    foreach ($dsma as $ma) {
                        extract($ma);
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
                                                <h6>' . number_format($gia, 0, ',', '.') . 'đ</h6>
                                                <a href="" class="btn btn-warning">
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
    <div class="btn-box">
        <a href="index.php?act=monan"> Xem thêm </a>
    </div>
    </div>
</section>

<!-- end food section -->

<!-- footer section -->