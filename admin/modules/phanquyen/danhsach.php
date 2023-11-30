<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">QUẢN LÝ VAI TRÒ</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">QUẢN LÝ VAI TRÒ</li>
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
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Vai trò</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_dskh as $dskh) {
                                extract($dskh);
                                $vai_tro = $dskh['vai_tro'];
                                $sua_vaitro = "index.php?act=sua_vaitro&id=" . $id; // Fix the URL
                            
                                echo '<tr>
                                    <td>' . $id . '</td>
                                    <td>' . $ten . '</td>
                                    <td>' . $email . '</td>
                                    <td>' . get_vai_tro($vai_tro) . '</td>
                                    <td>
                                        <a href="' . $sua_vaitro . '" class="btn btn-primary"><i
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