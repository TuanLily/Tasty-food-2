<?php
// Truy vấn sử dụng PDO
$pdo = pdo_get_connection();

$stmt = $pdo->query("SELECT * FROM khach_hang WHERE 1 ");
$dskh = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Tổng các bảng ghi
$total = count($dskh);

//Giới hạn hiển thị
$limit = 5;

//Tổng trang
$total_page = ceil($total / $limit);

// Lấy trang hiện tại
$cr_page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($cr_page - 1) * $limit;

// Hàm để lấy danh sách sản phẩm với giới hạn
$list_dskh = getdskh_limit($start, $limit);


if (isset($_GET['page']) && !empty($_GET['page'])) {
    $listmonan = $list_dskh;
}

?>
<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">QUẢN LÝ KHÁCH HÀNG</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">QUẢN LÝ KHÁCH HÀNG</li>
            </ol>

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
                                <th scope="col">Username</th>
                                <th scope="col">Họ Và Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($list_dskh as $dskh){
                                extract($dskh);
                                $sua_dskh = "index.php?act=sua&id=".$id; // Fix the URL

                                echo '<tr>
                                    <td><input type="checkbox" name="" id="" /></td>
                                    <td>'.$id.'</td>
                                    <td>'.$ten.'</td>
                                    <td>'.$ho_ten.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$sdt.'</td>
                                    <td>'.$dia_chi.'</td>
                                    <td>
                                        <a href="'.$sua_dskh.'" class="btn btn-primary"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <!-- You can add a delete button here if needed -->
                                    </td>
                                </tr>';
                            }
                            ?>
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
                                    <a class="page-link" href="index.php?act=dskh&page=<?= $cr_page - 1 ?>"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $total_page; $i++): ?>
                                <li class="page-item <?php echo (($cr_page == $i) ? 'active' : '') ?>">
                                    <a class="page-link" href="index.php?act=dskh&page=<?= $i ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                                <?php endfor; ?>

                                <?php if ($cr_page < $total_page): ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?act=dskh&page=<?= $cr_page + 1 ?>"
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