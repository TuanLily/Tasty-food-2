<?php

function loadone_hoa_don($id)
{
    $sql = "select * from thanh_toan where id=" . $id;
    $tt_thanh_toan = pdo_query_one($sql);
    return $tt_thanh_toan;
}
function loadall_cart($id)
{
    $sql = "select * from dat_ban where id=" . $id;
    $thanh_toan = pdo_query($sql);
    return $thanh_toan;
}

/**
 * Xóa bill
 * @param mixed $id
 * @return void
 */
function delete_bill($id)
{
    $sql = "delete from bill where id=" . $id;
    pdo_execute($sql);
}

function xemgiohang()
{
    echo '<tbody>';
    global $img_path;
    $mon_an_info = []; // Mảng để lưu thông tin mỗi món ăn
    $tong_tien = 0; // Khởi tạo biến tổng tiền

    foreach ($_SESSION['mycart'] as $item) {
        $mon_an_id = $item['mon_an_id'];

        // Kiểm tra xem món ăn đã tồn tại trong mảng chưa
        if (isset($mon_an_info[$mon_an_id])) {
            // Nếu đã tồn tại, tăng số lượng và cập nhật thành tiền
            $mon_an_info[$mon_an_id]['so_luong'] += $item['so_luong'];
            $mon_an_info[$mon_an_id]['thanh_tien'] += $item['gia'] * $item['so_luong'];
        } else {
            // Nếu chưa tồn tại, thêm mới thông tin của món ăn
            $mon_an_info[$mon_an_id] = [
                'hinh' => $item['hinh'],
                'ten' => $item['ten'],
                'gia' => $item['gia'],
                'so_luong' => $item['so_luong'],
                'thanh_tien' => $item['gia'] * $item['so_luong'],
            ];
        }
    }

    $i = 0;

    // Hiển thị thông tin từ mảng đã gộp
    foreach ($mon_an_info as $mon_an_id => $info) {
        $i++;
        ?>
<tr>
    <td><img src="<?php echo $info['hinh']; ?>" alt=""></td>
    <td>
        <?php echo $info['ten']; ?>
    </td>
    <td>
        <?php echo number_format($info['gia'], 0, ',', '.') . 'đ'; ?>
    </td>
    <td>
        <?php echo $info['so_luong']; ?>
    </td>
    <td>
        <a href="index.php?act=xoagiohang&idgiohang=<?php echo $i - 1; ?>">Xóa</a>
    </td>
    <td>
        <?php echo number_format($info['thanh_tien'], 0, ',', '.') . 'đ'; ?>
    </td>
</tr>
<?php
        $tong_tien += $info['thanh_tien'];
    }
    ?>
<tr>
    <td colspan="5"><strong>Tổng thành tiền:</strong></td>
    <td colspan="5">
        <?php echo number_format($tong_tien, 0, ',', '.') . 'đ'; ?>
    </td>
</tr>
</tbody>
<?php
}

function hienthi_thongtin_donhang($hoa_don_chi_tiet)
{
    $mon_an_info = []; // Mảng để lưu thông tin mỗi món ăn
    $tong_tien = 0; // Khởi tạo biến tổng tiền

    foreach ($hoa_don_chi_tiet as $item) {
        $mon_an_id = $item['mon_an_id'];

        // Kiểm tra xem món ăn đã tồn tại trong mảng chưa
        if (isset($mon_an_info[$mon_an_id])) {
            // Nếu đã tồn tại, tăng số lượng và cập nhật thành tiền
            $mon_an_info[$mon_an_id]['so_luong'] += $item['so_luong'];
            $mon_an_info[$mon_an_id]['thanh_tien'] += $item['gia'] * $item['so_luong'];
        } else {
            // Nếu chưa tồn tại, thêm mới thông tin của món ăn
            $mon_an_info[$mon_an_id] = [
                'hinh' => $item['hinh'],
                'ten' => $item['ten'],
                'gia' => $item['gia'],
                'so_luong' => $item['so_luong'],
                'thanh_tien' => $item['gia'] * $item['so_luong'],
            ];
        }
    }

    foreach ($mon_an_info as $info) {
        ?>
<tr>
    <td><img src="<?php echo $info['hinh']; ?>" alt=""></td>
    <td>
        <?php echo $info['ten']; ?>
    </td>
    <td>
        <?php echo number_format($info['gia'], 0, ',', '.') . 'đ'; ?>
    </td>
    <td>
        <?php echo $info['so_luong']; ?>
    </td>
    <td>
        <?php echo number_format($info['thanh_tien'], 0, ',', '.') . 'đ'; ?>
    </td>
</tr>
<?php
        $tong_tien += $info['thanh_tien'];
    }
    ?>
<tr>
    <td colspan="4"><strong>Tổng thành tiền:</strong></td>
    <td>
        <?php echo number_format($tong_tien, 0, ',', '.') . 'đ'; ?>
    </td>
</tr>
<?php
}



function hoa_don_chi_tiet($cartItems)
{
    $tableHTML = '<table class="table">
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên món ăn</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>';

    $i = 0;
    $tong_tien = 0; // Khởi tạo biến tổng tiền

    foreach ($cartItems as $item) {
        $thanh_tien = $item['gia'] * $item['so_luong']; // Tính thành tiền cho mỗi món
        $tong_tien += $thanh_tien; // Cộng vào tổng tiền
        $i++;

        $tableHTML .= '<tr>
                        <td><img src="' . $item['hinh'] . '" alt=""></td>
                        <td>' . $item['ten'] . '</td>
                        <td>' . number_format($item['gia'], 0, ',', '.') . 'đ</td>
                        <td>' . $item['so_luong'] . '</td>
                        <td>' . (isset($thanh_tien) ? number_format($thanh_tien, 0, ',', '.') . 'đ' : '0đ') . '</td>
                    </tr>';
    }

    $tableHTML .= '</tbody>
                </table>';

    return $tableHTML;
}



function tongdonhang()
{
    if (empty($_SESSION['mycart'])) {
        return 0; // Return 0 when the shopping cart is empty
    }

    $tong_tien = 0; // Khởi tạo biến tổng tiền

    foreach ($_SESSION['mycart'] as $item) {
        $thanh_tien = $item['gia'] * $item['so_luong']; // Tính thành tiền cho mỗi món
        $tong_tien += $thanh_tien; // Cộng vào tổng tiền
    }

    $km = $tong_tien * 0.1;
    $tong_cong = $tong_tien - $km;

    return $tong_cong;
}


function insert_thanhtoan($ten_kh, $email, $sdt, $thoi_gian_dat_ban, $ghi_chu, $so_nguoi, $phuong_thuc, $tong_tien, $ngay_thanh_toan, $dat_ban_id, $khach_hang_id)
{
    $sql = "INSERT INTO thanh_toan (thanh_toan_ten,thanh_toan_email,thanh_toan_sdt,thanh_toan_thoigiandatban,thanh_toan_ghi_chu,thanh_toan_so_nguoi,phuong_thuc, tong_tien, ngay_thanh_toan, dat_ban_id,khach_hang_id) VALUES (?, ?, ?, ?,?,?,?, ?, ?,?,?)";
    return pdo_execute($sql, $ten_kh, $email, $sdt, $thoi_gian_dat_ban, $ghi_chu, $so_nguoi, $phuong_thuc, $tong_tien, $ngay_thanh_toan, $dat_ban_id, $khach_hang_id);
}




function insert_datban($ten_kh, $email, $sdt, $so_nguoi, $thoi_gian_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id)
{
    global $conn;

    $sql = "INSERT INTO dat_ban (ten_kh, email, sdt, so_nguoi, thoi_gian_dat_ban, ghi_chu, so_luong, gia, hinh, ten, mon_an_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    pdo_execute($sql, $ten_kh, $email, $sdt, $so_nguoi, $thoi_gian_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id);
}


function delete_dat_ban($id)
{
    $sql = "DELETE FROM dat_ban WHERE id = ?";
    return pdo_execute($sql, $id);
}


function loadall_don_hang_da_dat($khach_hang_id)
{
    $sql = "select * from thanh_toan where khach_hang_id=" . $khach_hang_id;
    $danh_sach_don_hang_da_dat = pdo_query($sql);
    return $danh_sach_don_hang_da_dat;
}
function loadone_id_datban($id)
{
    $sql = "SELECT tt.*, db.id AS dat_ban_id FROM thanh_toan AS tt";
    $sql .= "JOIN dat_ban AS db ON tt.dat_ban_id = db.id WHERE tt.id = '" . $id . "'";
    $danh_sach_don_hang_da_dat = pdo_query($sql);
    return $danh_sach_don_hang_da_dat;
}
function load_ma_hoa_don()
{
    $sql = "select * from thanh_toan where 1 order by id desc limit 0,9";
    $load_ma_hoa_don = pdo_query($sql);
    return $load_ma_hoa_don;
}

function get_phuong_thuc_don_hang($n)
{
    switch ($n) {
        case 1:
            $phuong_thuc = 'Thanh toán tại nhà hàng';
            break;
        case 2:
            $phuong_thuc = 'Cọc 20% giá trị đơn hàng';
            break;
        default:
            $phuong_thuc = 'Thanh toán tại nhà hàng';
            break;
    }
    return $phuong_thuc;
}


function get_lich_su_limit($start, $limit)
{
    // Lấy id từ session, giả sử key là 'id'
    $khach_hang_id = isset($_SESSION["email"]["id"]) ? $_SESSION["email"]["id"] : null;

    // Kiểm tra xem có giá trị id hay không
    if ($khach_hang_id !== null) {
        // Câu truy vấn SQL
        $sql = "SELECT * FROM thanh_toan WHERE khach_hang_id = :khach_hang_id ORDER BY id DESC LIMIT :start, :limit";


        // Tham số của câu truy vấn
        $params = array(
            ':khach_hang_id' => $khach_hang_id,
            ':start' => $start,
            ':limit' => $limit

        );

        try {
            // Thực hiện câu truy vấn và lấy kết quả
            $danh_sach_don_hang_da_dat = pdo_query($sql, $params);

            // Trả về kết quả
            return $danh_sach_don_hang_da_dat;
        } catch (PDOException $e) {
            // Xử lý nếu có lỗi PDO
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Trả về một giá trị mặc định hoặc xử lý khác tùy thuộc vào yêu cầu của bạn
        return null;
    }
}


function findItemIndex($mon_an_id, $mycart)
{
    foreach ($mycart as $index => $item) {
        if ($item['mon_an_id'] == $mon_an_id) {
            return $index;
        }
    }
    return -1;
}


function themMonVaoGioHang($mon_an)
{
    $mon_an_id = $mon_an['mon_an_id'];
    $so_luong = $mon_an['so_luong'];

    // Kiểm tra xem món ăn đã tồn tại trong giỏ hàng hay chưa
    $index = findItemIndex($mon_an_id, $_SESSION['mycart']);

    if ($index !== -1) {
        // Món ăn đã tồn tại trong giỏ hàng, tăng số lượng
        $_SESSION['mycart'][$index]['so_luong'] += $so_luong;
    } else {
        // Món ăn chưa tồn tại trong giỏ hàng, thêm món mới
        $_SESSION['mycart'][] = $mon_an;
    }
}
function itemExistsInCart($mon_an_id, $mycart)
{
    foreach ($mycart as $index => $item) {
        if ($item['mon_an_id'] == $mon_an_id) {
            return $index;
        }
    }
    return -1;
}

function load_so_luong_mon_an($dat_ban_id)
{
    $sql = "SELECT * FROM thanh_toan INNER JOIN dat_ban ON thanh_toan.dat_ban_id = dat_ban.id WHERE dat_ban_id=" . $dat_ban_id;
    $thanh_toan = pdo_query($sql);

    // Kiểm tra xem $thanh_toan có phải là mảng hoặc đối tượng trước khi sử dụng count()
    if (is_array($thanh_toan) || is_object($thanh_toan)) {
        return count($thanh_toan);
    } else {
        return 0; // Trả về 0 nếu $thanh_toan không phải là mảng hoặc đối tượng
    }
}



function get_booking_history_by_customer_and_time($ten_kh, $thoi_gian_dat_ban)
{
    $sql = "SELECT
    dat_ban.id as dat_ban_id,
    thanh_toan.id as thanh_toan_id,
    thanh_toan.thanh_toan_ten,
    SUM(thanh_toan.tong_tien) as total_price,
    COUNT(mon_an.id) as total_items,
    thanh_toan.ngay_thanh_toan,
    GROUP_CONCAT(mon_an.id) AS mon_an_id,
    GROUP_CONCAT(mon_an.ten) AS ten,
    GROUP_CONCAT(mon_an.gia) AS gia,
    GROUP_CONCAT(mon_an.hinh) AS hinh,
    GROUP_CONCAT(dat_ban.so_luong) AS so_luong
FROM
    dat_ban
INNER JOIN thanh_toan ON dat_ban.id = thanh_toan.dat_ban_id
INNER JOIN mon_an ON dat_ban.mon_an_id = mon_an.id
WHERE
    thanh_toan.thanh_toan_ten = :ten_kh
    AND thanh_toan.ngay_thanh_toan = :thoi_gian_dat_ban
GROUP BY
    dat_ban.id, thanh_toan.id, thanh_toan.thanh_toan_ten, thanh_toan.ngay_thanh_toan
ORDER BY
    thanh_toan.ngay_thanh_toan DESC";

    $params = array(
        ':ten_kh' => $ten_kh,
        ':thoi_gian_dat_ban' => $thoi_gian_dat_ban
    );

    $result = pdo_query($sql, $params);

    return $result;
}


function lay_thong_tin_hoa_don_theo_id($hoa_don_id)
{
    $sql = "SELECT
        dat_ban.id AS dat_ban_id,
        thanh_toan.id AS thanh_toan_id,
        thanh_toan.thanh_toan_ten,
        SUM(thanh_toan.tong_tien) AS total_price,
        COUNT(mon_an.id) AS total_items,
        thanh_toan.ngay_thanh_toan,
        GROUP_CONCAT(mon_an.id) AS mon_an_id,
        GROUP_CONCAT(mon_an.ten) AS ten,
        GROUP_CONCAT(mon_an.gia) AS gia,
        GROUP_CONCAT(mon_an.hinh) AS hinh,
        GROUP_CONCAT(dat_ban.so_luong) AS so_luong
    FROM
        dat_ban
    INNER JOIN thanh_toan ON dat_ban.id = thanh_toan.dat_ban_id
    INNER JOIN mon_an ON dat_ban.mon_an_id = mon_an.id
    WHERE
        thanh_toan.id = :hoa_don_id
    GROUP BY
        dat_ban.id, thanh_toan.id, thanh_toan.thanh_toan_ten, thanh_toan.ngay_thanh_toan
    ORDER BY
        thanh_toan.ngay_thanh_toan DESC";

    $params = array(':hoa_don_id' => $hoa_don_id);

    $result = pdo_query($sql, $params);

    return $result;
}


function loadone_in_hoa_don($id)
{
    $sql = "SELECT * FROM dat_ban
            INNER JOIN thanh_toan ON dat_ban.id = thanh_toan.dat_ban_id
            WHERE dat_ban.id = :id";

    $params = array(':id' => $id);

    $in_hoa_don = pdo_query_one($sql, $params);
    return $in_hoa_don;
}
function loadall_hoadon($dat_ban_id)
{
    $sql = "select * from thanh_toan where dat_ban_id=" . $dat_ban_id;
    $thanh_toan = pdo_query($sql);
    return $thanh_toan;
}


?>