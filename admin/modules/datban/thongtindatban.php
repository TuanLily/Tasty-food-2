<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">CHI TIẾT ĐƠN ĐẶT BÀN </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="index.php">Dashboard</a>
                </li>
                <a href="index.php?act=ds_dat_ban" class="breadcrumb-item">QUẢN LÝ ĐẶT BÀN</a>
                <li class="breadcrumb-item active">CHI TIẾT ĐƠN ĐẶT BÀN</li>
            </ol>
            <form class="row g-3" method="post" action="index.php?act=them" enctype="multipart/form-data">

                <div class="card mb-2">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Chi tiết thông tin khách đặt bàn
                    </div>


                    <div class="card-body">
                        <div class="row g-3">

                            <div class="row mt-3">
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Tên khách hàng</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="ten_kh"
                                        value="">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                                        value="">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="mb-3 col-4">
                                    <label for="exampleFormControlInput2" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput2" name="sdt"
                                        value="">
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="exampleFormControlInput2" class="form-label">Số người</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput2"
                                        name="so_nguoi" value="">
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="exampleFormControlInput2" class="form-label">Ngày đặt bàn</label>
                                    <input type="datetime-local" class="form-control" id="exampleFormControlInput2"
                                        name="thoi_gian_dat_ban" value="">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="mb-3 col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Trạng thái</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="trang_thai" value="">
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="exampleFormControlInput2" class="form-label">Tổng tiền</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput2"
                                        name="tong_tien" value="" disabled>
                                </div>
                                <div class="mb-3 col-4">
                                    <label for="exampleFormControlInput2" class="form-label">Tiền cọc</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput2"
                                        name="tien_coc" value="" disabled>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-bowl-food"></i>
                        Chi tiết món ăn
                    </div>


                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="table-warning">
                                    <th scope="col">#</th>
                                    <th scope="col">Tên món ăn</th>
                                    <th scope="col" class="text-center">Số lượng món</th>
                                    <th scope="col" class="text-center">Giá tiền món ăn</th>
                                    <th scope="col">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="table-light">
                                    <th scope="row">1</th>
                                    <td>Pizza</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">100.000</td>
                                    <td>
                                        <a href="#" class="btn btn-danger"
                                            onclick="return confirm(`Bạn có chắc muốn xóa không?`)"><i
                                                class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <th scope="row">1</th>
                                    <td>Pizza</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">100.000</td>
                                    <td>
                                        <a href="#" class="btn btn-danger"
                                            onclick="return confirm(`Bạn có chắc muốn xóa không?`)"><i
                                                class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr class="table-light">
                                    <th scope="row">1</th>
                                    <td>Pizza</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">100.000</td>
                                    <td>
                                        <a href="#" class="btn btn-danger"
                                            onclick="return confirm(`Bạn có chắc muốn xóa không?`)"><i
                                                class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer mb-12 float-end">
                        <input type="submit" class="btn btn-warning me-lg-2 float-end" name="capnhat" value="Cập nhật">
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