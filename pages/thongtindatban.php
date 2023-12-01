<form action="index.php?act=thanhtoan" method="post">
  <div class="khung_thông_tin_dat_ban">

    <div class="order-info">
      <div class="boxtitle">THÔNG TIN NGƯỜI ĐẶT BÀN</div>
      <div class="boxcontent">
        <div class="padding_margin">
          <table class="user-table">

            <?php if (isset($_SESSION['info_datban'])) {
              $ten_kh = $_SESSION['info_datban']['ten_kh'];
              $email = $_SESSION['info_datban']['email'];
              $sdt = $_SESSION['info_datban']['sdt'];
              $so_nguoi = $_SESSION['info_datban']['so_nguoi'];
              $thoi_gian_dat_ban = $_SESSION['info_datban']['thoi_gian_dat_ban'];
              $ghi_chu = $_SESSION['info_datban']['ghi_chu'];
            } else {
              $ten_kh = "";
              $email = "";
              $sdt = "";
              $so_nguoi = "";
              $thoi_gian_dat_ban = "";
              $ghi_chu = "";
            }
            ?>
            <tr>
              <td>Tên khách hàng:</td>
              <td><input type="text" name="ten_kh" value="<?php echo $ten_kh; ?>"></td>

            </tr>
            <tr>
              <td>Email:</td>
              <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
              <td>Điện thoại:</td>
              <td><input type="text" name="sdt" value="<?php echo $sdt; ?>"></td>
            </tr>
            <tr>
              <td>Số người:</td>
              <td><input type="text" name="so_nguoi" value="<?php echo $so_nguoi; ?>"></td>
            </tr>
            <tr>
              <td>Thời gian đặt bàn:</td>
              <td><input type="text" name="thoi_gian_dat_ban" value="<?php echo $thoi_gian_dat_ban; ?>">
              </td>
            </tr>
            <tr>
              <td>Ghi chú:</td>
              <td><input type="text" name="ghi_chu" value="<?php echo $ghi_chu; ?>"></td>
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
            <?php xemgiohang(); ?>
          </table>
          <br>
          <a href="index.php?act=datban" class="btn btn-primary">
            Chọn thêm món
          </a>

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
          $thanh_tien = $item['gia'] * $item['so_luong']; // Tính thành tiền cho mỗi món
          $tong_tien += $thanh_tien; // Cộng vào tổng tiền
          $i++;
        }
        $khuyen_mai = $tong_tien * 0.1;
        $tong_cong = $tong_tien - $khuyen_mai;
        ?>


        <table>
          <tr>
            <td>Tạm tính</td>
            <td>
              <?php echo number_format($tong_tien, 0, ',', '.') . 'đ'; ?>
            </td>
          </tr>
          <tr>
            <td>Khuyến mãi</td>
            <td>
              <?php echo number_format($khuyen_mai, 0, ',', '.') . 'đ'; ?>
            </td>
          </tr>
        </table>
        <hr class="hr_thong_tin_dat_ban">
        <table>
          <tr>
            <td>Tổng cộng (sau khuyến mãi)</td>
            <td>
              <?php echo number_format($tong_cong, 0, ',', '.') . 'đ'; ?>
            </td>
          </tr>
        </table>
        <hr class="hr_thong_tin_dat_ban">
        <table>
          <tr>
            <td><input type="radio" name="phuong_thuc" value="cash" checked />Thanh toán tại nhà hàng</td>
          </tr>
          <tr>
            <td><input type="radio" name="phuong_thuc" value="bank-transfer" />Chuyển khoản ngân hàng</td>
          </tr>
          <tr>
            <td><input type="radio" name="phuong_thuc" value="online-payment" />Thanh toán Momo</td>
          </tr>
        </table>
        <hr class="hr_thong_tin_dat_ban">
        <table>
          <tr>
            <td><input type="radio" name="phuong_thuc" value="cash" checked />Thanh toán toàn bộ</td>
          </tr>
          <tr>
            <td><input type="radio" name="phuong_thuc" value="bank-transfer" />Đặt cọc một phần</td>
          </tr>
        </table>
        <div class="nut_thanh_toan">
          <input type="submit" name="thanhtoan" value="Thanh toán" class="btnthanhtoan">
          <input type="hidden" name="ten_kh" value="<?= $infor_datban['ten_kh'] ?>" class="btnthanhtoan">
          <input type="hidden" name="thoi_gian_dat_ban" value="<?= $infor_datban['thoi_gian_dat_ban'] ?>"
            class="btnthanhtoan">
        </div>



      </div>
    </div>
  </div>

</form>