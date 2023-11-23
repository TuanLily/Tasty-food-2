<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">THÊM DANH MỤC</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php?act=dsdm">Dashboard</a>
                </li>
                <a href="index.php?act=dsdm&page=1" class="breadcrumb-item">QUẢN LÝ DANH MỤC</a>
                <li class="breadcrumb-item active">THÊM DANH MỤC</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    THÊM DANH MỤC
                </div>
                <form class="row g-3" action="index.php?act=themdm" method="post" enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="row g-3">
                            <p><span class="thongbao">* Trường bắt buộc</span></p>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="tenDanhMuc"
                                    placeholder="Gà Rán">
                                <div class="thongbao mt-xxl-3">

                                    <?php

                                    if (isset($_SESSION['error']['tenDanhMuc']) && $_SESSION['error']['tenDanhMuc'] != "") {
                                        if (isset($_SESSION['error']['tenDanhMuc']['invalid'])) {
                                            echo $_SESSION['error']['tenDanhMuc']['invalid'];
                                            unset($_SESSION['error']['tenDanhMuc']);
                                        }

                                        if (isset($_SESSION['error']['tenDanhMuc']['numbers_word'])) {
                                            echo $_SESSION['error']['tenDanhMuc']['numbers_word'];
                                            unset($_SESSION['error']['tenDanhMuc']);
                                        }

                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer mb-12">
                        <input type="submit" class="btn btn-info me-lg-2 float-end" name="them" value="Thêm mới">
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