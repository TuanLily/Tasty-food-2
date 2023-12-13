<?php
$phuong_thuc_don_hang_default = get_phuong_thuc_don_hang(1);
$phuong_thuc_don_hang = isset($phuong_thuc) ? get_phuong_thuc_don_hang($phuong_thuc) : $phuong_thuc_don_hang_default;

if (isset($danh_sach_don_hang_da_dat) && is_array($danh_sach_don_hang_da_dat) && count($danh_sach_don_hang_da_dat) > 0) {
    foreach ($danh_sach_don_hang_da_dat as $thanh_toan) {
        extract($thanh_toan);
        if (isset($thanh_toan['phuong_thuc'])) {
            $phuong_thuc_don_hang = get_phuong_thuc_don_hang($thanh_toan['phuong_thuc']);
        } else {
            // Sử dụng giá trị mặc định nếu 'phuong_thuc_don_hang' không tồn tại
            $phuong_thuc_don_hang = $phuong_thuc_don_hang_default;
        }
        $dem_so_luong_mon = load_so_luong_mon_an($thanh_toan['dat_ban_id']);

        // Định dạng số tiền với đuôi "đ"
        $tong_tien = number_format($thanh_toan['tong_tien'], 0, ',', '.') . 'đ';

        // Định dạng ngày giờ
        $ngay_thanh_toan = date('d/m/Y H:i:s', strtotime($thanh_toan['ngay_thanh_toan']));

?>
<?php
    }
}
?>







<div class="container_hoadon">
    <div class="header_bottom">
        <div class="logo_header"><a href="">Tasty Food</a></div>

        <div class="header_bottom_taikhoan">
            <p class="header_top_right"><i class="fa-solid fa-location-dot"></i><a href="#"> Địa chỉ: FPT Polytechnic
                    Cần Thơ </a></p>
            <p class="header_top_right"><i class="fa-solid fa-phone"></i> <a href="#">Đăt hàng : 036 534 7890</a></p>
        </div>
        <div class="header_bottom_taikhoan">
            <p class="header_top_right"><i class="fa-solid fa-globe"></i><a href="#">Website: Tastyfood.com</a></p>
            <p class="header_top_right"><i class="fa-solid fa-envelope"></i> <a href="#">Email: Tastyfood@gmail.com</a>
            </p>
        </div>

    </div>


    <div class="footer_hoadon">
        <div class="header_title"><a href="">Hóa đơn thanh toán dịch vụ</a></div>
    </div>
    <div class="header_top">
        <?php foreach ($load_ma_hoa_don as $hoa_don) {
            extract($hoa_don);
            break; // Thêm break để chỉ lấy giá trị đầu tiên trong mảng
        } ?>
        <p class="header_top_right"><i class="fa-solid fa-money-bills"></i> <strong>Hóa đơn :</strong>
            TF -
            <?php echo $id; ?>
        </p>
        <p class="header_top_left"><i class="fa-regular fa-calendar-days"></i> <strong>Ngày thanh toán:</strong>
            <?php echo date('d/m/Y H:i:s', strtotime($ngay_thanh_toan)); ?>
        </p>
    </div>
    <h2>Thông tin đặt bàn</h2>
    <table class="table">



        <tr>
            <th>Người đặt hàng:</th>
            <td>
                <?php echo $_SESSION['info_datban']['ten_kh']; ?>
            </td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>
                <?php echo $_SESSION['info_datban']['email']; ?>
            </td>
        </tr>
        <tr>
            <th>Điện thoại:</th>
            <td>
                <?php echo $_SESSION['info_datban']['sdt']; ?>
            </td>
        </tr>
        <tr>
            <th>Số người:</th>
            <td>
                <?php echo $_SESSION['info_datban']['so_nguoi']; ?>
            </td>
        </tr>
        <tr>
            <th>Thời gian đặt bàn:</th>
            <td>
                <?php echo $_SESSION['info_datban']['thoi_gian_dat_ban']; ?>
            </td>
        </tr>
        <tr>
            <th>Ghi chú:</th>
            <td>
                <?php echo $_SESSION['info_datban']['ghi_chu']; ?>
            </td>
        </tr>
    </table>
    <h2>Thông tin món ăn</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên món ăn</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php hienthi_thongtin_donhang($_SESSION['mycart']); ?>
            </tbody>
        </table>
    </div>
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
            <td> <?php echo $phuong_thuc_don_hang; ?></td>
        </tr>
    </table>
    <hr class="hr_thong_tin_dat_ban">

    <table class="history-table">
        <tr>
            <td>
                <div class="mx-1 float-right">
                    <button id="printPage" class="btn btn-success" onclick="printAndHide()"> <i class="fa-solid fa-print"></i>
                        In</button>
                </div>
                <table class="history-table">
                    <tr>
                        <td>
                            <div class="float-right my-3">
                                <a href="index.php?act=don_hang_da_dat">Xem Lịch sử đơn hàng</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


    <div class="footer_hoadon">
        <p>Cảm ơn bạn đã mua hàng!</p>
    </div>
</div>

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

</div>