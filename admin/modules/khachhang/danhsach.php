<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">QUẢN LÝ KHÁCH HÀNG</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
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
