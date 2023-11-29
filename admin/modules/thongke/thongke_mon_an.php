

<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">THỐNG KÊ</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Thống Kê Món Ăn Theo Danh Mục</li>
            </ol>
            <form action="index.php?act=thongke-monan" method="POST">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Thống Kê Món Ăn

                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="table-dark text-center">
                                <tr>

                                    <th scope="col">Danh mục món ăn</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá nhỏ nhất</th>
                                    <th scope="col">Giá cao nhất</th>
                                    <th scope="col">Giá trung bình</th>

                            </thead>
                            <tbody>
                                <?php
                                echo '<form>';
                                foreach ($listthongke as $thongkema) {
                                    extract($thongkema);
                                    
                                    echo '
                                <tr>
                                    
                                    <td scope="row">' . $ten_dm . '</td>
                                    <td scope="row" class="text-center">' . $count_ma . '</td>
                                    <td scope="row" class="text-center">' . number_format($min_gia,0,'.',',') . 'đ</td>
                                    <td scope="row" class="text-center">' . number_format($max_gia,0,'.',',') . 'đ</td>
                                    <td scope="row" class="text-center">' . number_format($avg_gia,0,'.',',') . 'đ</td>
                                    
                                    </tr>
                                    ';
                                }
                                echo '</form>';
                                ?>
                            </tbody>
                        </table>
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