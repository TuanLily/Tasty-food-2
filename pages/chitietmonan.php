<div class="khungchitietsanpham single-productctsp">
  <?php extract($onemonan); ?>

  <div class="heading_container heading_center">
    <h2>Chi tiết món ăn</h2>
  </div>

  <div class="row">
    <?php
    $hinh_ma = "uploads/" . $hinh;
    $gia_km = $gia - $gia_giam;
    echo '
          <div class="col2">
              <img src="' . $hinh_ma . '" width="100%" id="ProductImg" />
          </div>
          <div class="col2">
              <h1>' . $ten . '</h1>
              <h4>Giá niêm yết: ' . number_format($gia, 0, ',', '.') . 'đ</h4>
              <h3>Giá khuyến mãi: <span class="sale_price">' . number_format($gia_km, 0, ',', '.') . 'đ</span></h3>
              <br /><br />
              <h3>Thông tin chi tiết sản phẩm</h3>
              <p>
              ' . $mo_ta . '
              </p>
          </div>
        ';
    ?>
  </div>
</div>

<div class="khungchitietsanpham">
  <div class="heading_container heading_center">
    <h2>Món ăn liên quan</h2>
  </div>
  <div class="row">

    <?php
    foreach ($macungloai as $ma) {
      extract($ma);
      $hinh_ma = "uploads/" . $hinh;
      $link_ma_ct = "index.php?act=monanct&id_ma=" . $id;
      $gia_km = $gia - $gia_giam;
      echo '
        <div class=" col4">
            <a href="' . $link_ma_ct . '"> <img src="' . $hinh_ma . '" /></a>
            <h5>' . $ten . '</h5>
            <div class="rating">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <div class="">
            <span class="mini_price">' . number_format($gia, 0, ',', '.') . 'đ</span>
             <span class="sale_price">' . number_format($gia_km, 0, ',', '.') . 'đ</span>
            </div>
            </div>
            ';
    }
    ?>



  </div>
</div>