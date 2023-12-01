<?php


function viewcart()
{
    global $img_path;
    $tong = 0;
    $i = 0;

    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart['img'];
        $thanhtien = $cart['so_luong'] * $cart['gia'];
        $gia = $cart['gia'];
        $tong += $thanhtien;
        $xoasp = '<a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a>';
        echo '
                <tr> 
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart['name'] . '</td>
                <td>$' . number_format($gia, 0, ",", ".") . '</td>
                <td>
                     <form action="index.php?act=viewcart" method="post">
                        <input type="number" style="text-align:center; width:50px;" name="edit_qty" value="' . $cart['soluong'] . '" onchange="this.form.submit();" min="1">
                        <input type="hidden" name="id" value="' . $cart['id'] . '">
                     </form>
                </td>
                             
                <td>$' . number_format($thanhtien, 0, ",", ".") . '</td>
                <td>' . $xoasp . '</td>
                
                            
                </tr> 
                ';
        $i += 1;
    }
    echo '
              <td colspan="5">Tổng đơn hàng</td>
                    
              <td>' . number_format($tong, 0, ",", ".") . '</td>

            ';

    if (isset($_POST['dathang']) && ($_POST['dathang'])) {
        $_SESSION['mycart'] = [];
    }
}
// Hàm tăng số lượng sản phẩm giỏ hàng
if (isset($_POST['edit_qty']) && ($_POST['edit_qty']) && isset($_POST['id'])) {
    if (isset($_SESSION['mycart'])) {
        $id = $_POST['id'];
        // Trong $_SESSION['cart'] láy mảng là id mấy và láy số lượng của nó
        $_SESSION['mycart']["$id"]['soluong'] = $_POST['edit_qty'];
    }
}


function bill()
{
    global $img_path;
    $tong = 0;
    $i = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart['img'];
        $thanhtien = $cart['soluong'] * $cart['price'];
        $gia = $cart['price'];
        $tong += $thanhtien;
        $i += 1;
        echo '
                <tr> 
                <td>' . $i . '</td>
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart['name'] . '</td>
                <td>$' . number_format($gia, 0, ",", ".") . '</td>
                <td>' . $cart['soluong'] . '</td>
                <td>$' . number_format($thanhtien, 0, ",", ".") . '</td>
                            
                </tr> 
                ';
    }
    echo '
              <td colspan="5">Tổng đơn hàng</td>
                    
              <td>$' . number_format($tong, 0, ",", ".") . '</td>

            ';
}

function bill_chi_tiet($listbill)
{

    global $img_path;
    $tong = 0;
    $i = 0;
    foreach ($listbill as $cart) {
        $hinh = $img_path . $cart['img'];
        $thanhtien = $cart['soluong'] * $cart['price'];
        $tong += $thanhtien;
        $i += 1;
        echo '
                <tr> 
                <td>' . $i . '</td>
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart['name'] . '</td>
                <td>$' . number_format($cart['price'], 0, ",", ".") . '</td>
                <td>' . $cart['soluong'] . '</td>
                <td>$' . number_format($thanhtien, 0, ",", ".") . '</td>
                            
                </tr> 
                ';
    }
    echo '
            <tr style="background-color:rgba(194, 255, 233);">
              <td colspan="5">Tổng đơn hàng</td>      
              <td><strong>$' . number_format($tong, 0, ",", ".") . '</strong></td>
            </tr>
            ';
}




function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "insert into bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_lastInsertId($sql);
}

function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $cart = pdo_query($sql);
    return $cart;
}

function loadall_cart_count($idbill)
{
    $sql = "select * from cart inner join bill on cart.idbill = bill.id where idbill=" . $idbill;
    $cart = pdo_query($sql);
    return count($cart);
}

function loadall_bill($keyw = "", $iduser = 0)
{
    $sql = "select * from bill where 1";
    if ($iduser > 0) {
        $sql .= " and iduser=" . $iduser;
    }
    if ($keyw != "") {
        $sql .= " and id like '%" . $keyw . "%'";
    }
    $sql .= " order by id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}

function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = 'Đơn hàng mới';
            break;
        case '1':
            $tt = 'Đang xử lý';
            break;
        case '2':
            $tt = 'Đang giao hàng';
            break;
        case '3':
            $tt = 'Giao hàng thành công';
            break;

        default:
            $tt = 'Đơn hàng mới';
            break;
    }
    return $tt;
}
function get_pttt($n)
{
    switch ($n) {
        case '1':
            $tt = 'Thanh toán khi nhận hàng';
            break;
        case '2':
            $pttt = 'Chuyển khoàn ngân hàng';
            break;
        case '3':
            $pttt = 'Thanh toán online';
            break;
        default:
            $pttt = 'Thanh toán khi nhận hàng';
            break;
    }
    return $pttt;
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

function loadall_thongke()
{
    $sql = "select danh_muc.ten_dm as ten_dm, danh_muc.id as ma_dm, count(mon_an.id) as count_ma, min(mon_an.gia) as min_gia, max(mon_an.gia) as max_gia, avg(mon_an.gia) as avg_gia";
    $sql .= " from mon_an left join danh_muc on danh_muc.id=mon_an.danh_muc_id where 1";
    $sql .= " group by danh_muc.id order by danh_muc.id asc";
    $listthongke = pdo_query($sql);
    return $listthongke;
}


function getBill_limit($start, $limit)
{

    $sql = "select * from bill order by id desc limit $start,$limit";
    $tk = pdo_query($sql);
    return $tk;
}


function xemgiohang()
{
    echo '<tbody>';
    global $img_path;
    $i = 0;
    $tong_tien = 0; // Khởi tạo biến tổng tiền
    foreach ($_SESSION['mycart'] as $item) {
        $thanh_tien = $item[2] * $item[3]; // Tính thành tiền cho mỗi món
        $tong_tien += $thanh_tien; // Cộng vào tổng tiền
        $i++;
?>
        <tr>
            <td><img src="<?php echo $item[0]; ?>" alt=""></td>
            <td><?php echo $item[1]; ?></td>
            <td><?php echo number_format($item[2], 0, ',', '.') . 'đ'; ?></td>
            <td><?php echo $item[3]; ?></td>
            <td>
                <a href="index.php?act=xoagiohang&idgiohang=<?php echo $i - 1; ?>">Xóa</a>
            </td>
            <td><?php echo isset($thanh_tien) ? number_format($thanh_tien, 0, ',', '.') . 'đ' : '0đ'; ?></td>
        </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="5"><strong>Tổng thành tiền:</strong></td>
        <td colspan="5"><?php echo number_format($tong_tien, 0, ',', '.') . 'đ'; ?></td>
    </tr>
    </tbody>
<?php


}

function tongdonhang()
{
    $tong_tien = 0; // Khởi tạo biến tổng tiền
    foreach ($_SESSION['mycart'] as $item) {
        $thanh_tien = $item[2] * $item[3]; // Tính thành tiền cho mỗi món
        $tong_tien += $thanh_tien; // Cộng vào tổng tiền
    }

    return $tong_tien;
}
function thanhtoan()
{
}

// function insert_thanhtoan($thanh_toan_ten, $thanh_toan_email, $thanh_toan_sdt, $thanh_toan_so_nguoi, $thanh_toan_thoigiandatban, $thanh_toan_ghi_chu, $ngay_thanh_toan, $tongtien)
// {
//     $sql = "INSERT INTO bill (thanh_toan_ten,thanh_toan_email,thanh_toan_sdt,thanh_toan_so_nguoi,thanh_toan_thoigiandatban,thanh_toan_ghi_chu,ngay_thanh_toan,tongtien)
//     VALUES (?, ?, ?, ?, ?, ?, ?,?)";

//     return pdo_execute_lastInsertId($sql, [$thanh_toan_ten, $thanh_toan_email, $thanh_toan_sdt, $thanh_toan_so_nguoi, $thanh_toan_thoigiandatban, $thanh_toan_ghi_chu, $ngay_thanh_toan, $tongtien]);
// }

function insert_thanhtoan($phuong_thuc, $tong_tien, $ngay_thanh_toan, $dat_ban_id)
{
    $sql = "INSERT INTO thanh_toan (phuong_thuc, tong_tien, ngay_thanh_toan, dat_ban_id) VALUES (?, ?, ?, ?)";
    return pdo_execute_lastInsertId($sql, [$phuong_thuc, $tong_tien, $ngay_thanh_toan, $dat_ban_id]);
}

// function insert_datban($khach_hang_id, $mon_an_id, $hinh, $ten, $gia, $so_luong, $thanh_tien, $id_thanh_toan)
// {
//     $sql = "insert into cart(khach_hang_id,mon_an_id,hinh,ten,gia,so_luong,thanh_tien,id_thanh_toan) values('$khach_hang_id','$mon_an_id','$hinh','$ten','$gia','$so_luong','$thanh_tien','$id_thanh_toan')";
//     return pdo_execute($sql);
// }
?>