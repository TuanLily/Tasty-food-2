<?php

// Kiểm tra xem form đã được submit hay chưa
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['datbanngay'])) {
    // Lưu dữ liệu từ form vào session
    $_SESSION['ten_kh'] = $_POST['ten_kh'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['sdt'] = $_POST['sdt'];
    $_SESSION['thoi_gian_dat_ban'] = $_POST['thoi_gian_dat_ban'];
    $_SESSION['so_nguoi'] = $_POST['so_nguoi'];
    $_SESSION['ghi_chu'] = $_POST['ghi_chu'];
}
?>


<section class="food_section my-6">
    <div class="container">

        <div class="khungdatban">

            <form action="index.php?act=datbanngay" method="post">

                <div class="tieuDe">
                    <h1>Thông tin đặt bàn</h1>
                </div>
                <p class="title">Để trải nghiệm những món ăn ngon và dịch vụ tuyệt vời của chúng tôi, hãy điền thông tin
                    đặt bàn và chúng tôi sẽ sắp xếp một bàn cho bạn!</p>
                <div class="form-group">
                    <div class="form-group-input">
                        <label for="ten_kh">Họ và tên <span style="color: red;">*</span></label>
                        <input type="text" placeholder="Nhập vào họ và tên" name="ten_kh"
                            value="<?php echo isset($_SESSION['ten_kh']) ? $_SESSION['ten_kh'] : ''; ?>">
                    </div>

                    <div class="form-group-input">
                        <label for="email">Email <span style="color: red;">*</span></label>
                        <input type="email" name="email"
                            value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                    </div>

                    <div class="form-group-input">
                        <label for="sdt">Số điện thoại<span style="color: red;">*</span></label>
                        <input type="text" name="sdt"
                            value="<?php echo isset($_SESSION['sdt']) ? $_SESSION['sdt'] : ''; ?>">
                    </div>

                    <div class="form-group-input">
                        <label for="thoi_gian_dat_ban">Thời gian đặt bàn: <span style="color: red;">*</span></label>
                        <input type="datetime-local" id="thoi_gian_dat_ban" name="thoi_gian_dat_ban"
                            value="<?php echo isset($_SESSION['thoi_gian_dat_ban']) ? $_SESSION['thoi_gian_dat_ban'] : ''; ?>">
                    </div>

                    <div class="form-group-input">
                        <label for="so_nguoi">Số lượng khách: <span style="color: red;">*</span></label>
                        <input type="number" id="so_nguoi" name="so_nguoi" min="1"
                            value="<?php echo isset($_SESSION['so_nguoi']) ? $_SESSION['so_nguoi'] : ''; ?>" />
                    </div>

                    <div class="form-group-input-note">
                        <label for="ghi_chu">Ghi chú cho nhà hàng</label>
                        <textarea name="ghi_chu" id="ghi_chu" cols="60"
                            rows="5"><?php echo isset($_SESSION['ghi_chu']) ? $_SESSION['ghi_chu'] : ''; ?></textarea>
                    </div>

                </div>


                <div class="heading_container heading_center">
                    <h2>Chọn món</h2>
                </div>
                <ul class="nav nav-pills mb-3 filters_menu" id="pills-tab" role="tablist">
                    <!--  Kiểm tra và hiển thị danh sách danh mục -->
                    <?php if (!empty($danhsachdanhmuc)): ?>
                        <?php foreach ($danhsachdanhmuc as $danhMuc): ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-<?= $danhMuc['id'] ?>" data-bs-toggle="pill"
                                    data-bs-target="#pills-<?= $danhMuc['id'] ?>" type="button" role="tab"
                                    aria-controls="pills-<?= $danhMuc['id'] ?>" aria-selected="true">
                                    <?= $danhMuc['ten_dm'] ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <div class="tab-content" id="pills-tabContent">

                    <?php if (!empty($danhsachdanhmuc)): ?>
                        <?php foreach ($danhsachdanhmuc as $danhMuc): ?>
                            <div class="tab-pane fade show" id="pills-<?= $danhMuc['id'] ?>" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <table class="bang_thongtin_mon_an">
                                    <tbody>
                                        <?php $listmonan = loadMonAn_tu_danhMuc($danhMuc['id']); ?>
                                        <?php foreach ($listmonan as $monan): ?>
                                            <?php
                                            $ten = $monan['ten'];
                                            $hinh_ma = "uploads/" . $monan['hinh'];
                                            $gia = $monan['gia'];
                                            ?>
                                            <tr>
                                                <td class="bang_thongtin_mon_an-ten-mon-an">
                                                    <?= $ten ?>
                                                </td>
                                                <td><img src="  <?= $hinh_ma ?>" alt="Hình ảnh món ăn" /></td>
                                                <td class="bang_thongtin_mon_an-gia-ban">
                                                    <?= number_format($gia, 0, ',', '.') ?>đ
                                                </td>
                                                <td>
                                                    <div class="quantity-input">
                                                        <button type="button" class="decrement"
                                                            onclick="decrementQuantity(<?= $monan['mon_an_id'] ?>)">-</button>
                                                        <input type="text" id="so_luong<?= $monan['mon_an_id'] ?>"
                                                            name="so_luong<?= $monan['mon_an_id'] ?>" value="0" />
                                                        <input type="hidden" name="gia_<?= $monan['mon_an_id'] ?>"
                                                            value="' . $monan['gia'] . '" />
                                                        <button type="button" class="increment"
                                                            onclick="incrementQuantity(<?= $monan['mon_an_id'] ?>)"
                                                            max="10">+</button>
                                                        <input type="hidden" name="danh_muc_id" value="<?= $danh_muc_id ?>">
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

                <div class="float-right my-3">
                    <input type="submit" class="button_datbanngay float-right" name="datbanngay" value="Đặt bàn ngay">
                </div>
            </form>
        </div>
    </div>
</section>