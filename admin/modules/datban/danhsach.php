<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">QUẢN LÝ BÀN ĂN</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">QUẢN LÝ BÀN ĂN</li>
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
                                <th scope="col">Tất cả</th>
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
                                    <td><input type="checkbox" name="" id="" /></td>
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
                                            0 => 'btn-danger',
                                            1 => 'btn-light',
                                            2 => 'btn-warning',
                                            3 => 'btn-info',
                                            4 => 'btn-success',
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
                    <a href="#" class="btn btn-warning">Chọn tất cả</a>
                    <a href="#" class="btn btn-danger">Xóa các mục đã chọn</a>

                    <!-- Phân trang  -->
                    <div class="float-end">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
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