<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">SỬA THÔNG TIN KHÁCH HÀNG</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">SỬA THÔNG TIN KHÁCH HÀNGG</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Sửa thông tin khách hàng
                </div>
                <form class="row g-3" method="post" enctype="multipart/form-data">

                    <div class="card-body">
                        <div class="row g-3">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="user"
                                    placeholder="abcxyz">
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Họ và Tên</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                                    placeholder="Nguyễn Văn A">
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="tel"
                                    placeholder="0123456789">
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="address"
                                    placeholder="134 Nguyễn Văn Cừ">
                            </div>

                        </div>

                    </div>
                    <div class="card-footer mb-12" style="float:right;">
                        <a href="#" class="btn btn-info float-end" name="sua">
                            Lưu thay đổi
                        </a>
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