<?php
if (is_array($datban)) {
    extract($datban);
}
$tong_tien = 0;

$ten_kh = $datban['ten_kh']; // Thay bằng tên khách hàng cần tìm kiếm
$thoi_gian_dat_ban = $datban['thoi_gian_dat_ban']; // Thay bằng thời gian đặt bàn cần tìm kiếm

$info_datban_monan = load_tt_monan_theo_ten($ten_kh, $thoi_gian_dat_ban);

foreach ($info_datban_monan as $n => $item) {
    $item['mon_an_id'] = explode(',', $item['mon_an_id']);
    $item['ten'] = explode(',', $item['ten']);
    $item['gia'] = explode(',', $item['gia']);
    $item['so_luong'] = explode(',', $item['so_luong']);
}

?>

?>

<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">CHI TIẾT ĐƠN ĐẶT BÀN </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>
                <a href="index.php?act=ds_dat_ban" class="breadcrumb-item">QUẢN LÝ ĐẶT BÀN</a>
                <li class="breadcrumb-item active">CHI TIẾT ĐƠN ĐẶT BÀN</li>
            </ol>
            <form class="row g-3" method="post" action="index.php?act=chi_tiet_dat_ban" enctype="multipart/form-data">

                <div class="card mb-2">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Chi tiết thông tin khách đặt bàn - <strong>id = <?= $datban['id']?></strong>
                    </div>


                    <div class="card-body">
                        <div class="row g-3">

                            <div class="row mt-3">
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Tên khách hàng</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="ten_kh"
                                        value="<?= $datban['ten_kh'] ?>">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                                        value="<?= $datban['email'] ?>">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput2" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput2" name="sdt"
                                        value="<?= $datban['sdt'] ?>">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput2" class="form-label">Số người</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput2"
                                        name="so_nguoi" value="<?= $datban['so_nguoi'] ?>">
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput2" class="form-label">Ngày đặt bàn</label>
                                    <input type="datetime-local" class="form-control" id="exampleFormControlInput2"
                                        name="thoi_gian_dat_ban" value="<?= $datban['thoi_gian_dat_ban'] ?>">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Trạng thái</label>
                                    <select class="form-select form-select-lg mb-3"
                                        style="height: 2.6rem; font-size: 0.8rem;" aria-label=".form-select-lg example">
                                        <?php for ($i = 0; $i <= 4; $i++) : ?>
                                        <option value="<?php echo $i; ?>"
                                            <?php echo ($trang_thai == $i) ? 'selected' : ''; ?>>
                                            <?php echo get_trang_thai_datban($i); ?>
                                        </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <label for="exampleFormControlInput2" class="form-label">Ghi chú của khách</label>
                                    <textarea name="" id="exampleFormControlInput2" cols="107" rows="3"
                                        style="resize: none" readonly="readonly"><?= $datban['ghi_chu'] ?></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-bowl-food"></i>
                        Chi tiết món ăn
                    </div>


                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="table-warning">
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col" class="text-center">Ngày đặt bàn</th>
                                    <th scope="col" class="text-center">Thông tin món ăn khách đặt </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-light">
                                    <?php $tong_tien = 0?>
                                    <td><?= $item['ten_kh'] ?></td>
                                    <td class="text-center">
                                        <?= date('d/m/Y - H:i:s ', strtotime($item['thoi_gian_dat_ban'])) ?></td>
                                    <td>
                                        <?php foreach ($item['ten'] as $index => $ten): ?>
                                        <?php
                                        ?>
                                        <div>
                                            <strong>Tên món:</strong> <?= $ten ?><br>
                                            <strong>Giá:</strong>
                                            <?= number_format($item['gia'][$index],0,',','.') ?>đ<br>
                                            <strong>Số lượng:</strong> <?= $item['so_luong'][$index] ?><br>
                                        </div>
                                        <hr>
                                        <?php 
                                            $thanh_tien = $item['gia'][$index] * $item['so_luong'][$index];
                                            $tong_tien += $thanh_tien;
                                            $thanh_tien_format = number_format($tong_tien, 0, ',', '.');
                                            ?>
                                        <?php endforeach; ?>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="row mt-3">
                            <div class="mb-3 col-6">
                                <label for="exampleFormControlInput2" class="form-label">Tổng tiền</label>
                                <input type="text" class="form-control" id="exampleFormControlInput2" name="tong_tien"
                                    value="<?= $thanh_tien_format ?>đ" disabled>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleFormControlInput2" class="form-label">Tiền cọc</label>
                                <input type="text" class="form-control" id="exampleFormControlInput2" name="tien_coc"
                                    value="0đ" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mb-12 float-end">
                        <input type="hidden" name="id" value="<?= $datban['id'] ?>">
                        <input type="hidden" name="id" value="<?= $datban['ten_kh'] ?>">
                        <input type="hidden" name="id" value="<?= $datban['thoi_gian_dat_ban'] ?>">
                        <input type="submit" class="btn btn-warning me-lg-2 float-end" name="capnhat" value="Cập nhật">
                    </div>
                </div>
            </form>

        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted"><span class="text-ft">Fasty Food</span> - Copyright &copy; 2023 All Rights
                    Reserved.</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>