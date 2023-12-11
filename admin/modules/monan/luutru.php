<!-- Phân trang -->
<?php
// Truy vấn sử dụng PDO
$pdo = pdo_get_connection();

$stmt = $pdo->query("SELECT * FROM mon_an WHERE trang_thai = 0 ORDER BY id DESC");
$listdm = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Tổng các bảng ghi
$total = count($listdm);

//Giới hạn hiển thị
$limit = 5;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;

// Hàm để lấy danh sách sản phẩm với giới hạn
$list_monan = getMonAn_luutru_limit($start, $limit);


if (isset($_GET['page']) && !empty($_GET['page'])) {
    $listmonan_luutru = $list_monan;
}

?>

<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">LƯU TRŨ MÓN ĂN ĐÃ XÓA</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">LƯU TRŨ MÓN ĂN ĐÃ XÓA</li>
            </ol>
            <form action="<?php
            if (isset($_POST['restore']) && $_POST['restore'])
                echo 'index.php?act=restore_list_ma';
            else
                echo 'index.php?act=mon_an_luu_tru&page=1';
            ?>" method="POST">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Danh Sách
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Tất cả</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá niêm yết</th>
                                    <th scope="col">Giá khuyến mãi</th>
                                    <th scope="col">Hình Món Ăn</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($listmonan_luutru as $monan) {
                                    extract($monan);
                                    $hinhpath = $img_path . $hinh;
                                    if (is_file($hinhpath)) {
                                        $hinhanh = "<img src='" . $hinhpath . "' height='60'>";
                                    } else {
                                        $hinhanh = "Không có hình ảnh";
                                    }
                                    $suama = "index.php?act=suama&id=" . $id;
                                    $khoiphuc = "index.php?act=khoi_phuc_mon_an&id=" . $id;
                                    echo '
                                <tr>
                                    <td><input type="checkbox" name="check_del[]" class="checkbox" value="' . $id . '" /></td>
                                    <th scope="row">' . $id . '</th>
                                    <td scope="row">' . $ten . '</td>
                                    <td scope="row">' . number_format($gia, 0, ',', '.') . 'đ</td>
                                    <td scope="row">' . number_format($gia_giam, 0, ',', '.') . 'đ</td>
                                    <td scope="row">' . $hinhanh . '</td>
                                    <td scope="row" class="text-center"><span class="btn btn-danger btn-sm cs-default">Đã xóa</span></td>
                                    <td>
                                    <a href="' . $khoiphuc . '" class="btn btn-info" onclick="return confirm(`Bạn có chắc muốn khôi phục không?`)"><i class="fa-solid fa-window-restore"></i></a>
                                    </td>
                                </tr>
                                ';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <label for="checkAll" class="btn btn-primary chon">Chọn tất cả</label>
                        <label for="checkAll" class="btn btn-warning bochon" style="display: none;">Bỏ chọn</label>
                        <input type="checkbox" hidden id="checkAll">
                        <input class="btn btn-warning" type="submit" value="Khôi phục mục đã chọn" name="restore"
                            onclick="return confirm(`Bạn có chắc muốn khôi phục không?`)">

                        <!-- Phân trang  -->
                        <div class="pag float-end">
                            <nav aria-label="Page navigation example" class="pag">
                                <ul class="pagination">
                                    <?php if ($cr_page > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="index.php?act=mon_an_luu_tru&page=<?= $cr_page - 1 ?>"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <?php for ($i = 1; $i <= $total_page; $i++): ?>
                                    <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>">
                                        <a class="page-link" href="index.php?act=mon_an_luu_tru&page=<?= $i ?>">
                                            <?= $i ?>
                                        </a>
                                    </li>
                                    <?php endfor; ?>

                                    <?php if ($cr_page < $total_page): ?>
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="index.php?act=mon_an_luu_tru&page=<?= $cr_page + 1 ?>"
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