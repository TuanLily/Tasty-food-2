<!-- <?php $load_tt = $_SESSION['info_datban'];
      var_dump($load_tt);
      ?> -->
<form id="dat_ban_form" action="thongtinmonan.php" method="post"></form>
<div class="khung_thông_tin_dat_ban">
  <div class="order-info">
    <div class="boxtitle">THÔNG TIN NGƯỜI ĐẶT BÀN</div>
    <div class="boxcontent">
      <div class="padding_margin">
        <table class="user-table">
          <tr>
            <td>Người đặt hàng:</td>
            <td><?php echo $load_tt['ten_kh']; ?></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><?php echo $load_tt['email']; ?></td>
          </tr>
          <tr>
            <td>Điện thoại:</td>
            <td><?php echo $load_tt['sdt']; ?></td>
          </tr>
          <tr>
            <td>Số người:</td>
            <td><?php echo $load_tt['so_nguoi']; ?></td>
          </tr>
          <tr>
            <td>Thời gian đặt bàn:</td>
            <td><?php echo date('H:i:s, d/m/Y', strtotime($load_tt['thoi_gian_dat_ban'])); ?></td>
          </tr>
          <tr>
            <td>Ghi chú:</td>
            <td><?php echo $load_tt['ghi_chu']; ?></td>
          </tr>
        </table>
      </div>
      <div class="boxtitle_thong_tin_gio_hang">THÔNG TIN MÓN ĂN</div>
      <div class="boxcontent_thong_tin_gio_hang">
        <table class="bang_thongtin_mon_an">
          <thead>
            <tr>
              <th>Hình ảnh</th>
              <th>Tên món ăn</th>
              <th>Giá bán</th>
              <th>Số lượng</th>
              <th>Sửa/Xóa</th>
              <th>Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 0;
            $tong_tien = 0; // Khởi tạo biến tổng tiền
            foreach ($_SESSION['mycart'] as $item) {
              $thanh_tien = $item[2] * $item[3]; // Tính thành tiền cho mỗi món
              $tong_tien += $thanh_tien; // Cộng vào tổng tiền
              $i++;
            ?>
              <tr>
                <td><img src="<?php echo $item[0]; ?>" alt=""></td>
                <td><?php echo $item[1]; ?></td>
                <td><?php echo number_format($item[2], 0, ',', '.') . 'đ'; ?></td>
                <td><?php echo $item[3]; ?></td>
                <td>
                  <a href="index.php?act=xoagiohang&idgiohang=<?php echo $i - 1; ?>">Xóa</a>
                </td>
                <td><?php echo isset($thanh_tien) ? number_format($thanh_tien, 0, ',', '.') . 'đ' : '0đ'; ?></td>
              </tr>
            <?php } ?>
            <tr>
              <td colspan="5"><strong>Tổng thành tiền:</strong></td>
              <td colspan="5"><?php echo number_format($tong_tien, 0, ',', '.') . 'đ'; ?></td>
            </tr>
          </tbody>
        </table>
        <br>
        <a href="<?php echo isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'javascript:history.back()'; ?>" class="btn btn-primary">Chọn thêm món</a>

      </div>
    </div>
  </div>
  <div class="payment-info">
    <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
    <div class="boxcontent">
      <?php
      $i = 0;
      $tong_tien = 0; // Khởi tạo biến tổng tiền
      foreach ($_SESSION['mycart'] as $item) {
        $thanh_tien = $item[2] * $item[3]; // Tính thành tiền cho mỗi món
        $tong_tien += $thanh_tien; // Cộng vào tổng tiền
        $i++;
      }
      $khuyen_mai = $tong_tien * 0.1;
      $tong_cong = $tong_tien - $khuyen_mai;
      ?>


      <table>
        <tr>
          <td>Tạm tính</td>
          <td><?php echo number_format($tong_tien, 0, ',', '.') . 'đ'; ?></td>
        </tr>
        <tr>
          <td>Khuyến mãi</td>
          <td><?php echo number_format($khuyen_mai, 0, ',', '.') . 'đ'; ?></td>
        </tr>
      </table>
      <hr class="hr_thong_tin_dat_ban">
      <table>
        <tr>
          <td>Tổng cộng (sau khuyến mãi)</td>
          <td><?php echo number_format($tong_cong, 0, ',', '.') . 'đ'; ?></td>
        </tr>
      </table>
      <hr class="hr_thong_tin_dat_ban">
      <table>
        <tr>
          <td><input type="radio" name="payment-method" value="cash" checked />Thanh toán tại nhà hàng</td>
        </tr>
        <tr>
          <td><input type="radio" name="payment-method" value="bank-transfer" />Chuyển khoản ngân hàng</td>
        </tr>
        <tr>
          <td><input type="radio" name="payment-method" value="online-payment" />Thanh toán Momo</td>
        </tr>
      </table>
      <hr class="hr_thong_tin_dat_ban">
      <table>
        <tr>
          <td><input type="radio" name="payment-method" value="cash" checked />Thanh toán toàn bộ</td>
        </tr>
        <tr>
          <td><input type="radio" name="payment-method" value="bank-transfer" />Đặt cọc một phần</td>
        </tr>
      </table>
      <button class="btn-thanh-toan">Thanh toán</button>
    </div>
  </div>
</div>