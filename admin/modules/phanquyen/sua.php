<?php
if (is_array($khachhang)) {
    extract($khachhang);
}
?>

<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">SỬA VAI TRÒ</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php?act=dskh">Dashboard</a>
                </li>
                <a href="index.php?act=phanquyen" class="breadcrumb-item">QUẢN LÝ VAI TRÒ</a>
                <li class="breadcrumb-item active">CẬP NHẬT VAI TRÒ</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    SỬA VAI TRÒ
                </div>
                <form class="row g-3" action="index.php?act=sua_vaitro" method="post" enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="mb-2">
                                <label for="username" class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" id="username" name="ten"
                                    value="<?php echo isset($ten) ? htmlspecialchars($ten) : ''; ?>" disabled>
                            </div>
                            <div class="mb-2">
                                <label for="username" class="form-label">Email</label>
                                <input type="email" class="form-control" id="username" name="ten"
                                    value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" disabled>
                            </div>
                            <div class="mb-2">
                                <label for="fullName" class="form-label">Vai trò</label>
                                <select class="form-select form-select-lg mb-3" name="vai_tro"
                                    style="height: 2.6rem; font-size: 0.8rem;" aria-label=".form-select-lg example">
                                    <?php for ($i = 0; $i <= 1; $i++): ?>
                                        <option value="<?php echo $i; ?>" <?php echo ($vai_tro == $i) ? 'selected' : ''; ?>>
                                            <?php echo get_vai_tro($i); ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer mb-12" style="float:right;">
                        <input type="hidden" name="id" value="<?php echo isset($id) ? htmlspecialchars($id) : ''; ?>">
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