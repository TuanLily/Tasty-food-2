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
                                <th scope="col">Tên khách đặt</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Số lượng người</th>
                                <th scope="col">Ngày & giờ đặt bàn</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">CHỨC NĂNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($listdatban as $list): ?>
                            <tr>
                                <td><input type="checkbox" name="" id="" /></td>
                                <th scope="row">
                                    <?= $list['id'] ?>
                                </th>
                                <td scope="row">
                                    <?= $list['ten_kh'] ?>
                                </td>
                                <td scope="row">
                                    <?= $list['sdt'] ?>
                                </td>
                                <td scope="row">
                                    <?= $list['so_nguoi'] ?>
                                </td>
                                <td scope="row">
                                    <?= $list['thoi_gian_dat_ban'] ?>
                                </td>
                                <td scope="row">
                                    <select class="form-select form-select-lg mb-3"
                                        aria-label=".form-select-lg example">
                                        <option value="0">Hủy đơn</option>
                                        <option value="1" selected>Đơn hàng mới</option>
                                        <option value="2">Chờ thanh toán cọc</option>
                                        <option value="3">Đặt bàn thành công</option>
                                        <option value="4">Đã hoàn thành đơn hàng</option>
                                    </select>
                                </td>

                                <td>
                                    <a href="index.php?act=suakh" class="btn btn-primary"><i
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