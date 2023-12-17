<div class="container_hoadon">
  <?php
  if (isset($danh_sach_don_hang_da_dat) && is_array($danh_sach_don_hang_da_dat) && count($danh_sach_don_hang_da_dat) > 0) {
    $pdo = pdo_get_connection();
    $stmt = $pdo->prepare("SELECT * FROM thanh_toan WHERE khach_hang_id = :khach_hang_id ORDER BY id DESC LIMIT :start, :limit");

    // ...


    // Bind giá trị cho tham số
    $stmt->bindParam(':khach_hang_id', $khach_hang_id, PDO::PARAM_INT);
    $stmt->bindParam(':start', $vi_tri_bat_dau, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $so_luong_tren_trang, PDO::PARAM_INT);

    $so_luong_tren_trang = 3;

    // Tính toán số trang
    $so_trang = ceil(count($danh_sach_don_hang_da_dat) / $so_luong_tren_trang);

    // Lấy trang hiện tại từ URL hoặc mặc định là trang 1
    $trang_hien_tai = isset($_GET['trang']) ? intval($_GET['trang']) : 1;

    // Kiểm tra xem trang hiện tại có hợp lệ không
    if ($trang_hien_tai < 1 || $trang_hien_tai > $so_trang) {
      // Xử lý khi trang hiện tại không hợp lệ
      echo "<div class='lsdb-container'>Trang không tồn tại.</div>";
    } else {
      // Tính toán vị trí bắt đầu của dữ liệu trên trang hiện tại
      // Sắp xếp mảng $danh_sach_don_hang_da_dat theo id giảm dần
      usort($danh_sach_don_hang_da_dat, function ($a, $b) {
        return $b['id'] - $a['id'];
      });

      // Tính toán vị trí bắt đầu của dữ liệu trên trang hiện tại
      $vi_tri_bat_dau = ($trang_hien_tai - 1) * $so_luong_tren_trang;

      // Lọc dữ liệu để chỉ hiển thị trên trang hiện tại
      $danh_sach_don_hang_hien_thi = array_slice($danh_sach_don_hang_da_dat, $vi_tri_bat_dau, $so_luong_tren_trang);

      foreach ($danh_sach_don_hang_hien_thi as $thanh_toan) {
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
                  //chuyển  chuổi thành 1 mnag
                  $mon_an_ids = explode(',', $info['mon_an_id']);
                  $total_items = count(array_unique($mon_an_ids));
                  //loại bỏ các giá trị trùng lặp giữ lại 1 giá trị duy nhất
              ?>
                  <div class="lsdb-items">
                    <div class="lsdb-item">Tổng cộng có
                      <?php echo $total_items; ?> món được chọn
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

                    // Mảng kết hợp để lưu thông tin về món ăn
                    $mon_an_info = array();

                    // Lặp qua từng món ăn
                    for ($i = 0; $i < count($mon_an_ids); $i++) {
                      $mon_an_id = $mon_an_ids[$i];

                      // Nếu món ăn đã tồn tại trong mảng kết hợp, tăng số lượng lên
                      if (isset($mon_an_info[$mon_an_id])) {
                        $mon_an_info[$mon_an_id]['so_luong'] += $so_luong_mon_ans[$i];
                      } else {
                        // Nếu chưa tồn tại, thêm mới vào mảng kết hợp
                        $mon_an_info[$mon_an_id] = array(
                          'ten' => $ten_mon_ans[$i],
                          'gia' => $gia_mon_ans[$i],
                          'hinh' => $hinh_mon_ans[$i],
                          'so_luong' => $so_luong_mon_ans[$i]
                        );
                      }
                    }

                    // Hiển thị thông tin món ăn gộp lại
                    ?>
                    <div class="lsdb-items">
                      <table class="bang_thongtin_mon_an">
                        <thead>
                          <tr>
                            <th>Tên món ăn</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Hình ảnh</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($mon_an_info as $mon_an_id => $mon_an) { ?>
                            <tr>
                              <td><?php echo $mon_an['ten']; ?></td>
                              <td><?php echo number_format($mon_an['gia'], 0, ',', '.') . 'đ'; ?></td>
                              <td><?php echo $mon_an['so_luong']; ?></td>
                              <td><img src="uploads/<?php echo $mon_an['hinh']; ?>" alt="<?php echo $mon_an['ten']; ?>" width="50"></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>

                  </div>
              <?php
                }
              } else {
                echo "<div class='lsdb-item'>Không có đơn hàng nào.</div>";
              }
              ?>
            </div>
          </div>

        </form>

  <?php
      }
      echo '<div class="pagination">';
      for ($i = 1; $i <= $so_trang; $i++) {
        $activeClass = ($trang_hien_tai == $i) ? 'active' : '';
        echo '<a href="index.php?act=don_hang_da_dat&trang=' . $i . '" class="btn btn-default ' . $activeClass . '">' . $i . '</a> ';
      }
      echo '</div>';
    }
  } else {
    echo "<div class='lsdb-container'>lịch sử đặt bàn trống.</div>";
  }
  ?>
</div>



<script>
  document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.querySelectorAll(".btnlsdb");

    buttons.forEach(function(button) {
      button.addEventListener("click", function() {
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