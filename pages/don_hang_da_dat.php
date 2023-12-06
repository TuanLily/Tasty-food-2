<?php
if (isset($danh_sach_don_hang_da_dat) && is_array($danh_sach_don_hang_da_dat) && count($danh_sach_don_hang_da_dat) > 0) {
  foreach ($danh_sach_don_hang_da_dat as $thanh_toan) {
    $ten_kh = $thanh_toan['thanh_toan_ten'];
    $thoi_gian_dat_ban = $thanh_toan['thanh_toan_thoigiandatban'];
    $phuong_thuc_don_hang = get_phuong_thuc_don_hang($thanh_toan['phuong_thuc']);
    $dem_so_luong_mon = load_so_luong_mon_an($thanh_toan['dat_ban_id']);
    $tong_tien = number_format($thanh_toan['tong_tien'], 0, ',', '.') . 'đ';
    $ngay_thanh_toan = date('d/m/Y H:i:s', strtotime($thanh_toan['ngay_thanh_toan']));
    ?>
    <form action="index.php?act=in_hoa_don" method="GET">
      <div class="lsdb-container">
        <div class="lsdb-order">
          <div class="lsdb-heading">Hóa đơn:
            <?php echo $thanh_toan['id']; ?>
          </div>
          <div class="lsdb-info">Ngày thanh toán:
            <?php echo $ngay_thanh_toan; ?>
          </div>
          <div class="lsdb-info">Tổng tiền:
            <?php echo $tong_tien; ?>
          </div>
          <div class="lsdb-info">Phương thức thanh toán:
            <?php echo $phuong_thuc_don_hang; ?>
          </div>
          <div class="lsdb-info">Tên khách hàng:
            <?php echo $thanh_toan['thanh_toan_ten']; ?>
          </div>
          <button type="button" class="btnlsdb btn btn-primary">Xem chi tiết</button>
          <button type="submit" name="in_hoa_don" id="ihd" name="btn btn-success">In Hóa Đơn</button>
          <!-- <input type="submit" name="in_hoa_don" id="ihd" name="btn btn-success" value="In hóa đơn"> -->
          <input type="hidden" name="act" value="in_hoa_don">
          <input type="hidden" name="id_hoa_don" value="<?php echo $thanh_toan['id']; ?>">
          <?php
          $info_datban_monan = load_tt_monan_theo_ten($ten_kh, $thoi_gian_dat_ban);
          if ($info_datban_monan) {
            foreach ($info_datban_monan as $info) {
              $mon_an_ids = explode(',', $info['mon_an_id']);
              $total_items = count(array_unique($mon_an_ids));
              ?>
              <div class="lsdb-items">
                <div class="lsdb-item">Tổng cộng có
                  <?php echo $total_items; ?> món ăn
                </div>
                <div class="lsdb-item">Lịch đặt bàn:
                  <?php echo $info['thoi_gian_dat_ban']; ?>
                </div>

                <?php
                $mon_an_ids = explode(',', $info['mon_an_id']);
                $ten_mon_ans = explode(',', $info['ten']);
                $gia_mon_ans = explode(',', $info['gia']);
                $hinh_mon_ans = explode(',', $info['hinh']);
                $so_luong_mon_ans = explode(',', $info['so_luong']);
                ?>

                <div class="lsdb-items">
                  <table class="bang_thongtin_mon_an">
                    <thead>
                      <tr>
                        <th>Mã món ăn</th>
                        <th>Tên món ăn</th>
                        <th>Giá</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      for ($i = 0; $i < count($mon_an_ids); $i++) {
                        ?>
                        <tr>
                          <td>
                            <?php echo $mon_an_ids[$i]; ?>
                          </td>
                          <td>
                            <?php echo $ten_mon_ans[$i]; ?>
                          </td>
                          <td>
                            <?php echo $gia_mon_ans[$i]; ?>
                          </td>
                          <td><img src="uploads/<?php echo $hinh_mon_ans[$i]; ?>" alt="<?php echo $ten_mon_ans[$i]; ?>"
                              width="50"></td>
                          <td>
                            <?php echo $so_luong_mon_ans[$i]; ?>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
              </div>
              <?php
            }
          } else {
            echo "<div class='lsdb-item'>Không tìm thấy thông tin đặt bàn và món ăn.</div>";
          }
          ?>
        </div>
      </div>
    </form>
    <?php
  }
} else {
  echo "<div class='lsdb-container'>Không có đơn hàng nào.</div>";
}
?>
</form>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var buttons = document.querySelectorAll(".btnlsdb");

    buttons.forEach(function (button) {
      button.addEventListener("click", function () {
        // Tìm phần tử cha chứa nút và hiển thị/ẩn phần tử con khi nút được nhấn
        var lsdbItems = this.closest(".lsdb-order").querySelector(".lsdb-items");
        if (lsdbItems.style.display === "none" || lsdbItems.style.display === "") {
          lsdbItems.style.display = "block";
        } else {
          lsdbItems.style.display = "none";
        }
      });

      // Mặc định ẩn lsdb-items khi trang được tải
      var lsdbItems = button.closest(".lsdb-order").querySelector(".lsdb-items");
      lsdbItems.style.display = "none";
    });
  });
</script>