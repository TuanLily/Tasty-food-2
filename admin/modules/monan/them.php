<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">THÊM MÓN ĂN </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>
                <a href="index.php?act=dsma" class="breadcrumb-item">QUẢN LÝ MÓN ĂN</a>
                <li class="breadcrumb-item active">THÊM MÓN ĂN</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Thêm món ăn mới
                </div>

                <form class="row g-3" method="post" action="index.php?act=them" enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="row g-3">
                            <p><span class="thongbao">(*) Trường bắt buộc</span></p>

                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Tên Sản Phẩm
                                    <span class="thongbao">(*)</span>
                                </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="tensp"
                                    placeholder="Gà Rán">
                                <div class="thongbao mt-2">
                                    <span>
                                        <?php echo (isset($_SESSION['error']['tensp'])) ? $_SESSION['error']['tensp'] : '' ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Giá Niêm Yết
                                        <span class="thongbao">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="giasp"
                                        placeholder="90000">
                                    <div class="thongbao mt-2">
                                        <span>
                                            <?php echo (isset($_SESSION['error']['giasp'])) ? $_SESSION['error']['giasp'] : '' ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput2" class="form-label">Giá Khuyến Mãi
                                        <span class="thongbao">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput2"
                                        name="gia_giam" placeholder="9000">
                                    <div class="thongbao mt-2">
                                        <span>
                                            <?php echo (isset($_SESSION['error']['gia_giam'])) ? $_SESSION['error']['gia_giam'] : '' ?>
                                        </span>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="formFile" class="form-label">Ảnh Sản Phẩm
                                    <span class="thongbao">(*)</span>
                                </label>
                                <input class="form-control" type="file" id="formFile" name="hinh">
                                <div class="thongbao mt-2">

                                    <?php

                                    if (isset($_SESSION['error']['hinh']) && $_SESSION['error']['hinh'] != "") {
                                        if (isset($_SESSION['error']['hinh']['required'])) {
                                            echo $_SESSION['error']['hinh']['required'];
                                            unset($_SESSION['error']['hinh']);
                                        }

                                        if (isset($_SESSION['error']['hinh']['incorrect'])) {
                                            echo $_SESSION['error']['hinh']['incorrect'];
                                            unset($_SESSION['error']['hinh']);
                                        }

                                        if (isset($_SESSION['error']['hinh']['maxSize'])) {
                                            echo $_SESSION['error']['hinh']['maxSize'];
                                            unset($_SESSION['error']['hinh']);
                                        }
                                    } else {
                                        unset($_SESSION['error']['hinh']);
                                    }
                                    ?>

                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="editor" class="form-label">Mô Tả</label>
                                <textarea id="summernote" placeholder="Nhập nội dung ở đây" name="mo_ta"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="formSelect" class="form-label">Danh Mục
                                    <span class="thongbao">(*)</span>
                                </label>
                                <select name="danh_muc_id" class="form-select" id="formSelect">
                                    <option selected>Vui lòng chọn danh mục</option>
                                    <?php
                                    foreach ($listdanhmuc as $danhmuc) {
                                        extract($danhmuc);
                                        echo '<option value="' . $id . '">' . $ten_dm . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>

                    </div>
                    <div class="card-footer mb-12 float-end">
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