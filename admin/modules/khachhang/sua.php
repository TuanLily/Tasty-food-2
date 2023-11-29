<?php
if (is_array($khachhang)) {
    extract($khachhang);
}
?>

<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">SỬA THÔNG TIN KHÁCH HÀNG</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php?act=dskh">Dashboard</a>
                </li>
                <a href="index.php?act=dskh" class="breadcrumb-item">QUẢN LÝ KHÁCH HÀNG</a>
                <li class="breadcrumb-item active">SỬA THÔNG TIN KHÁCH HÀNG</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    SỬA DANH MỤC
                </div>
                <form class="row g-3" action="index.php?act=capnhatds" method="post" enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="mb-2">
                                <label for="username" class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" id="username" name="ten" value="<?php echo isset($ten) ? htmlspecialchars($ten) : ''; ?>" required>
                            </div>
                            <div class="mb-2">
                                <label for="fullName" class="form-label">Họ tên</label>
                                <input type="text" class="form-control" id="fullName" name="ho_ten" value="<?php echo isset($ho_ten) ? htmlspecialchars($ho_ten) : ''; ?>" required>
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                            </div>
                            <div class="mb-2">
                                <label for="phoneNumber" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="phoneNumber" name="sdt" value="<?php echo isset($sdt) ? htmlspecialchars($sdt) : ''; ?>" required>
                            </div>
                            <div class="mb-2">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="dia_chi" value="<?php echo isset($dia_chi) ? htmlspecialchars($dia_chi) : ''; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer mb-12" style="float:right;">
                        <input type="hidden" name="id" value="<?php echo isset($id) ? htmlspecialchars($id) : ''; ?>">
                        <input type="submit" class="btn btn-info me-lg-2 float-end" name="updateds" value="Lưu thay đổi">
                        <input type="reset" class="btn btn-warning me-2 float-end" value="Nhập lại">
                    </div>
                </form>

            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted"><span class="text-ft">Fasty Food</span> - Copyright &copy; 2023 All Rights Reserved.</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
