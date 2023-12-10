<?php

// Biến để kiểm tra xem đã hiển thị hóa đơn hay chưa
$daHienThiHoaDon = false;

if (isset($danh_sach_don_hang_da_dat) && is_array($danh_sach_don_hang_da_dat) && count($danh_sach_don_hang_da_dat) > 0) {
  foreach ($danh_sach_don_hang_da_dat as $thanh_toan) {

    // Nếu đã hiển thị hóa đơn hoặc hóa đơn không phải là hóa đơn có ID là 1, bỏ qua vòng lặp
    // var_dump($thanh_toan['id']);

    $hienThiDonHangId = $thanh_toan['id'];
    if ($daHienThiHoaDon || $id_hoa_don != $hienThiDonHangId) {
      continue;
    }

    $ten_kh = $thanh_toan['thanh_toan_ten'];
    $thoi_gian_dat_ban = $thanh_toan['thanh_toan_thoigiandatban'];
    $phuong_thuc_don_hang = get_phuong_thuc_don_hang($thanh_toan['phuong_thuc']);
    $dem_so_luong_mon = load_so_luong_mon_an($thanh_toan['dat_ban_id']);
    $tong_tien = number_format($thanh_toan['tong_tien'], 0, ',', '.') . 'đ';
    $ngay_thanh_toan = date('d/m/Y H:i:s', strtotime($thanh_toan['ngay_thanh_toan']));

    // Đánh dấu đã hiển thị hóa đơn
    $daHienThiHoaDon = true;
?>
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

        <?php
        $info_datban_monan = load_tt_monan_theo_ten($ten_kh, $thoi_gian_dat_ban);
        if ($info_datban_monan) {
          foreach ($info_datban_monan as $info) {
            $mon_an_ids = explode(',', $info['mon_an_id']);
            $total_items = count(array_unique($mon_an_ids));
        ?>
            <div class="lsdb-items">
              <div class="lsdb-item">Số lượng món ăn:
                <?php echo $total_items; ?>
              </div>
              <div class="lsdb-item">Thời gian đặt bàn:
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
                          <?php echo $ten_mon_ans[$i]; ?>
                        </td>
                        <td>
                          <?php echo $gia_mon_ans[$i]; ?>
                        </td>
                        <td><img src="uploads/<?php echo $hinh_mon_ans[$i]; ?>" alt="<?php echo $ten_mon_ans[$i]; ?>" width="50">
                        </td>
                        <td>
                          <?php echo $so_luong_mon_ans[$i]; ?>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>

                  </tbody>
                </table>
                <table class="history-table">
                  <tr>
                    <td>
                      <div class="my-3 float-end">
                        <button id="printPage" class="btn btn-success" onclick="printAndHide()"> <i class="fa-solid fa-print"></i>
                          In</button>
                      </div>
                    </td>
                  </tr>
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

<?php
  }
} else {
  echo "<div class='lsdb-container'>Không có đơn hàng nào.</div>";
}
?>

<script>
  // In hóa đơn
  document.addEventListener("DOMContentLoaded", function() {
    // Lắng nghe sự kiện nhấp chuột vào nút in
    document.getElementById("printPage").addEventListener("click", function() {
      // Gọi hàm in của trình duyệt
      window.print();
    });
  });
</script>