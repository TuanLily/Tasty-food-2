<?php
// Truy vấn sử dụng PDO
$pdo = pdo_get_connection();

// !Làm phân trang
$stmt = $pdo->query("SELECT MAX(id) as id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id FROM dat_ban GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC");
$list_datban = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Tổng các bảng ghi
$total = count($list_datban);

//Giới hạn hiển thị
$limit = 10;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;

// Hàm để lấy danh sách sản phẩm với giới hạn
$listdatban_limit = getDatBan_limit($start, $limit);


if (isset($_GET['page']) && !empty($_GET['page'])) {
    $listdatban = $listdatban_limit;
}

?>

<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">QUẢN LÝ ĐẶT BÀN ĂN</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">QUẢN LÝ ĐẶT BÀN ĂN</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh Sách
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="table-dark text-center">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Họ Tên khách hàng</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Số lượng người</th>
                                <th scope="col">Ngày & giờ đặt bàn</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">CHỨC NĂNG</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($listdatban as $list): ?>

                            <?php
                                $trang_thai = $list['trang_thai'];
                                ?>
                            <tr>
                                <td scope="row">
                                    <?= $list['id'] ?>
                                </td>
                                <td scope="row">
                                    <?= $list['ten_kh'] ?>
                                </td>
                                <td scope="row">
                                    <?= $list['sdt'] ?>
                                </td>
                                <td scope="row" class="text-center">
                                    <?= $list['so_nguoi'] ?>
                                </td>
                                <td scope="row">
                                    <?= date('d/m/Y - H:i:s ', strtotime($list['thoi_gian_dat_ban'])) ?>
                                </td>
                                <td scope="row" class="text-center">
                                    <?php
                                        $trang_thai_styles = array(
                                            1 => 'btn-danger',
                                            2 => 'btn-light',
                                            3 => 'btn-warning',
                                            4 => 'btn-info',
                                            5 => 'btn-success',
                                        );

                                        ?>

                                    <?php foreach ($trang_thai_styles as $i => $style_class): ?>
                                    <?php

                                            if ($i == $trang_thai) {
                                                echo '<span class="btn btn-sm cs-default ' . $style_class . '" readonly>' . get_trang_thai_datban($i) . '</span>';
                                            }
                                            ?>
                                    <?php endforeach; ?>
                                </td>

                                <td>
                                    <?php $ct_datban = "index.php?act=chi_tiet_dat_ban&id=" . $list['id']; ?>
                                    <a href="<?= $ct_datban ?>" class="btn btn-primary"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <!-- Phân trang  -->
                    <div class="pag float-end">
                        <nav aria-label="Page navigation example" class="pag">
                            <ul class="pagination">
                                <?php if ($cr_page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?act=ds_dat_ban&page=<?= $cr_page - 1 ?>"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $total_page; $i++): ?>
                                <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>">
                                    <a class="page-link" href="index.php?act=ds_dat_ban&page=<?= $i ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                                <?php endfor; ?>

                                <?php if ($cr_page < $total_page): ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?act=ds_dat_ban&page=<?= $cr_page + 1 ?>"
                                        aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
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