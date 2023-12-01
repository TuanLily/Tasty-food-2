<!-- <?php $load_tt = $_SESSION['info_datban'];
      var_dump($load_tt);
      ?> -->



<div class="boxcontent">

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
              $thanh_tien = $item['gia'] * $item['so_luong']; // Tính thành tiền cho mỗi món
              $tong_tien += $thanh_tien; // Cộng vào tổng tiền
              $i++;
            ?>
                <tr>
                    <td><img src="<?php echo $item['hinh']; ?>" alt=""></td>
                    <td><?php echo $item['ten']; ?></td>
                    <td><?php echo number_format($item['gia'], 0, ',', '.') . 'đ'; ?></td>
                    <td><?php echo $item['so_luong']; ?></td>
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
        <a href="index.php?act=datbanngay" class="btn btn-primary">
            Chọn thêm món
        </a>
        <a href="index.php?act=thongtindatban" class="btn btn-primary">tiếp tục đặt hàng</a>

    </div>
</div>