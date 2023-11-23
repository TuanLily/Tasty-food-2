<?php
if (is_array($danhMuc)) {
    extract($danhMuc);
}
?>

<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">SỬA DANH MỤC</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php?act=dsdm">Dashboard</a>
                </li>
                <a href="index.php?act=dsdm&page=1" class="breadcrumb-item">QUẢN LÝ DANH MỤC</a>
                <li class="breadcrumb-item active">SỬA DANH MỤC</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    SỬA DANH MỤC
                </div>
                <form class="row g-3" action="index.php?act=capnhatdm" method="post" enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Mã Danh Mục</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="id" value="<?php if (isset($id) && ($id != ""))
                                    echo $id ?>" disabled>
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Tên Danh Mục</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="tenDanhMuc"
                                        value="<?php if (isset($ten_dm) && ($ten_dm != ""))
                                    echo $ten_dm ?>">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer mb-12" style="float:right;">
                            <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0))
                                    echo $id ?>">
                            <input type="submit" class="btn btn-info me-lg-2 float-end" name="capnhat" value="Lưu thay đổi">
                            <input type="reset" class="btn btn-warning me-2 float-end" value="Nhập lại">
                        </div>
                    </form>

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