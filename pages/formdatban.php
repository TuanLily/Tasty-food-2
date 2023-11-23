<section class="food_section my-6">
    <div class="container">

        <div class="khungdatban">

            <form action="index.php?act=datbanngay" method="post">

                <div class="tieuDe">
                    <h1>Thông tin đặt bàn</h1>
                </div>
                <p class="title">Để trải nghiệm những món ăn ngon và dịch vụ tuyệt vời của chúng tôi, hãy điền thông tin
                    đặt bàn và chúng tôi sẽ sắp xếp một bàn cho bạn!</p>
                <div class="form-group">
                    <div class="form-group-input">
                        <label for="ten_kh">Họ và tên <span style="color: red;">*</span></label>
                        <input type="text" placeholder="Nhập vào họ và tên" name="ten_kh">
                    </div>

                    <div class="form-group-input">
                        <label for="email">Email <span style="color: red;">*</span></label>
                        <input type="email" name="email">
                    </div>

                    <div class="form-group-input">
                        <label for="sdt">Số điện thoại<span style="color: red;">*</span></label>
                        <input type="tel" name="sdt">
                    </div>

                    <div class="form-group-input">
                        <label for="thoi_gian_dat_ban">Thời gian đặt bàn: <span style="color: red;">*</span></label>
                        <input type="datetime-local" id="thoi_gian_dat_ban" name="thoi_gian_dat_ban">
                    </div>

                    <div class="form-group-input">
                        <label for="so_nguoi">Số lượng khách: <span style="color: red;">*</span></label>
                        <input type="number" id="so_nguoi" name="so_nguoi" min="1" />
                    </div>

                    <div class="form-group-input-note">
                        <label for="ghi_chu">Ghi chú cho nhà hàng</label>
                        <textarea name="ghi_chu" id="ghi_chu" cols="60" rows="5"></textarea>
                    </div>


                </div>


                <div class="heading_container heading_center">
                    <h2>Chọn món</h2>
                </div>

                <ul class="filters_menu">
                    <?php
                    // Kiểm tra và hiển thị danh sách danh mục
                    if (!empty($danhsachdanhmuc)) {
                        foreach ($danhsachdanhmuc as $danhMuc) {
                            extract($danhMuc);
                            echo '
                            <ul class="filters_menu">
                            <li><a href="">' . $ten_dm . '</a></li>
                            </ul>
                            ';
                        }
                    } else {
                        echo '<li>Không có danh mục món ăn.</li>';
                    }
                    ?>
                </ul>

                <table class="bang_thongtin_mon_an">
                    <tbody>
                        <?php
                        // Lấy danh sách món ăn dựa trên danh mục và gán cho biến $listmonan
                        // $iddm là ID của danh mục được chọn
                        $listmonan = loadall_monan();

                        // Duyệt qua danh sách món ăn và hiển thị thông tin mỗi món
                        foreach ($listmonan as $monan) {
                            extract($monan);
                            $hinh_ma = "uploads/" . $hinh;
                            echo '
                             <tr>
                             <td><img src="' . $hinh_ma . '" alt="Hình ảnh món ăn" /></td>
                             <td class="bang_thongtin_mon_an-ten-mon-an">' . $ten . '</td>
                             <td class="bang_thongtin_mon_an-gia-ban">' . number_format($gia, 0, ',', '.') . 'đ</td>
                             <td>
                             <select class="form-select" aria-label="Default select example">
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                             </td>
                             </tr>
                        
                            ';
                        }
                        ?>
                        <!-- Thêm các hàng dữ liệu khác nếu cần -->
                    </tbody>
                </table>

                <div class="float-right my-3">
                    <input type="submit" class="button_datbanngay float-right" name="datbanngay" value="Đặt bàn ngay">
                </div>
            </form>
        </div>
    </div>
</section>