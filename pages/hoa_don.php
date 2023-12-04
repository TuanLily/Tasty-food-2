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
        <p class="header_top_left"><i class="fa-regular fa-calendar-days"></i>
            <?= $_SESSION['info_datban']['thoi_gian_dat_ban'] ?>
        </p>
        <p class="header_top_right"><i class="fa-solid fa-money-bills"></i> Hóa đơn : TF -
            <?= $_SESSION['info_datban']['id'] + 22 ?>
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
                <td>
                    <?php echo $item['ten']; ?>
                </td>
                <td>
                    <?php echo number_format($item['gia'], 0, ',', '.') . 'đ'; ?>
                </td>
                <td>
                    <?php echo $item['so_luong']; ?>
                </td>
                <td>
                    <?php echo isset($thanh_tien) ? number_format($thanh_tien, 0, ',', '.') . 'đ' : '0đ'; ?>
                </td>
            </tr>
            <?php } ?>

        </tbody>
    </table>

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



    <div class="footer_hoadon">
        <!-- <input type="text" name="payment-method" value="<?= $dat_ban_id ?>" checked />Thanh toán toàn bộ</td> -->
        <p>Cảm ơn bạn đã mua hàng!</p>
    </div>
</div>

<style>
.container_hoadon {
    max-width: 1040px;
    margin: 0 auto;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
}

.header_top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f8f8f8;
    padding: 10px 20px;
}

.header_top p {
    margin: 0;
}

.header_top_left i,
.header_top_right i {
    margin-right: 5px;
}

.header_bottom_taikhoan i,
.header_bottom_giohang i {
    margin-right: 5px;
}

.header_bottom_taikhoan a,
.header_bottom_giohang a {
    color: #000;
}

.header_top_left i:hover,
.header_top_right i:hover {
    color: #ea8025;
}

p.header_top_left:hover,
p.header_top_right:hover {
    color: #ea8025;
}

.header_bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    border-bottom: 1px solid #ccc;
}

.logo_header a {
    font-family: 'Roboto Mono', monospace;
    font-size: 40px;
    font-weight: bold;
    text-decoration: none;
    color: black;
}

.header_title a {
    font-family: 'Roboto Mono', monospace;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
    color: black;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    background-color: #f1f1f1;
}

.logo h2 {
    margin: 0;
    font-size: 28px;
    color: #333333;
}

.contact-info p {
    margin: 0;
    font-size: 14px;
    color: #333333;
}

h2 {
    color: #333333;
    font-size: 20px;
    margin-top: 30px;
    margin-bottom: 15px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.table th,
.table td {
    padding: 12px;
    border: 1px solid #cccccc;
}

.table th {
    background-color: #f2f2f2;
    text-align: left;
    font-size: 14px;
    color: #333333;
}

.table td img {
    max-width: 80px;
    height: auto;
}

.footer_hoadon {
    background-color: #f2f2f2;
    padding: 20px;
    text-align: center;
    font-size: 14px;
    color: #333;
}

.footer_hoadon p {
    margin: 0;
}
</style>