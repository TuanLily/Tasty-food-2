<?php
if (is_array($monan)) {
    extract($monan);
}
$hinhpath = $img_path . $hinh;
if (is_file($hinhpath)) {
    $hinhanh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinhanh = "Không có hình ảnh";
}
?>
<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">SỬA MÓN ĂN</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <a href="index.php?act=dsma" class="breadcrumb-item">QUẢN LÝ MÓN ĂN</a>
                <li class="breadcrumb-item active">SỬA MÓN ĂN</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Chỉnh sửa món ăn
                </div>
                <form class="row g-3" method="post" action="index.php?act=updatema" enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Mã Sản Phẩm</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="id"
                                    placeholder="Mã tự động" disabled value="<?= $id ?>">
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="tensp"
                                    value="<?= $ten ?>">
                            </div>
                            <div class="row mt-3">
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Giá Niêm Yết
                                        <span class="thongbao">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="giasp"
                                        value="<?= $gia ?>">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput2" class="form-label">Giá Khuyến Mãi
                                        <span class="thongbao">(*)</span>
                                    </label>
                                    <input type="text" class="form-control" id="exampleFormControlInput2"
                                        name="gia_giam" value="<?= $gia_giam ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Ảnh Sản Phẩm </label>
                                <input class="form-control" type="file" id="formFile" name="hinh">
                                <div class="mt-4" style="width: auto; height: 80;">
                                    <?= $hinhanh ?> (Hình cũ)
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="editor" class="form-label">Mô Tả</label>
                                <textarea id="summernote" placeholder="Nhập nội dung ở đây"
                                    name="mo_ta"><?= $mo_ta ?></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="formSelect" class="form-label">Danh Mục</label>
                                <select name="danh_muc_id" class="form-select">
                                    <option value="0" selected>Vui lòng chọn danh mục</option>
                                    <?php
                                    foreach ($listdanhmuc as $danhmuc) {
                                        extract($danhmuc);
                                        // Sử dụng $danh_muc_id để đặt giá trị của selected
                                        echo '<option value="' . $id . '" ' . ($danh_muc_id == $id ? 'selected' : '') . '>' . $ten_dm . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer mb-12 float-end">
                        <input type="hidden" name="id" value="<?= $monan['id'] ?>">
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