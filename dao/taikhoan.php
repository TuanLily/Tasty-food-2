<?php

/**
 * Thêm tài khoản
 * @param mixed $tenloai
 * @return void
 */
function insert_taikhoan($email, $ten, $mat_khau)
{
    $sql = "insert into khach_hang(email, ten, mat_khau) values('$email', '$ten', '$mat_khau')";
    pdo_execute($sql);
}


/**
 * Kiểm tra thông tin tài khoản
 * @param mixed $id
 * @return array
 */
function check_user($email, $mat_khau)
{
    $sql = "select * from khach_hang where email='" . $email . "' and mat_khau='" . $mat_khau . "'";
    $tk = pdo_query_one($sql);
    return $tk;
}
function check_user_validate($ten)
{
    $sql = "select * from khach_hang where ten ='" . $ten . "' ";
    $tk = pdo_query_one($sql);
    return $tk;
}
function check_email_validate($email)
{
    $sql = "select * from khach_hang where email ='" . $email . "' ";
    $tk = pdo_query_one($sql);
    return $tk;
}
/**
 * Cập nhật tài khoản
 * @param mixed $id
 * @param mixed $ten
 * @param mixed $email
 * @param mixed $sdt
 * @param mixed $dia_chi
 * @param mixed $mat_khau
 * @return void
 */
function capnhat_taikhoan($id, $ten, $email, $sdt, $dia_chi, $mat_khau)
{
    try {
        $sql = "update taikhoan set user = '" . $ten . "', email ='" . $email . "', sdt = '" . $sdt . "', dia_chi = '" . $dia_chi . "', mat_khau = '" . $mat_khau . "' where id=" . $id;
        pdo_execute($sql);
        return 1;
    } catch (Exception $e) {
        echo $e;
        return 0;
    }
}
function capnhat_taikhoan_kh($id, $ho_ten, $email, $sdt)
{
    try {
        $sql = "update khach_hang set ho_ten = '" . $ho_ten . "', email ='" . $email . "', sdt = '" . $sdt . "'where id=" . $id;
        pdo_execute($sql);
        return 1;
    } catch (Exception $e) {
        echo $e;
        return 0;
    }
}
/**
 * Kiểm tra thông tin tài khoản
 * @param mixed $id
 * @return array
 */
function check_email($email)
{
    $sql = "select * from khach_hang where email='" . $email . "' ";
    $tk = pdo_query_one($sql);
    return $tk;
}
function check_pass($id)
{
    $sql = "select mat_khau from khach_hang where id ='" . $id . "' ";
    $tk = pdo_query_one($sql);
    return $tk;
}

function update_password($email, $mat_khau)
{
    $sql = "update khach_hang set mat_khau='" . $mat_khau . "' where email='" . $email . "' ";
    pdo_execute($sql);
}


/**
 * Hiển thị tất cả tài khoản
 * @return array
 */
function loadall_dskh()
{
    $sql = "SELECT * FROM khach_hang WHERE 1";
    $list_dskh = pdo_query($sql);
    return $list_dskh;
}


/**
 * Xóa tài khoản
 * @param mixed $id
 * @return void
 */
function delete_taikhoan($id)
{
    $sql = "delete from taikhoan where id=" . $id;
    pdo_execute($sql);
}


/**
 * Hiển thị 1 tài khoản
 * @param mixed $id
 * @return array
 */
function loadone_khachhang($id)
{
    $sql = "select * from khach_hang where id=" . $id;
    $dskh = pdo_query_one($sql);
    return $dskh;
}

function update_dskh($id, $ten, $ho_ten, $email, $sdt, $dia_chi)
{
    $sql = "UPDATE khach_hang SET ten = ?, ho_ten = ?, email = ?, sdt = ?, dia_chi = ? WHERE id = ?";
    pdo_execute($sql, $ten, $ho_ten, $email, $sdt, $dia_chi, $id);
}
function check_only_user($ten)
{
    $sql = "select * from taikhoan where user='" . $ten . "'";
    $tk = pdo_query_one($sql);
    return $tk;
}


function login_user($email, $mat_khau)
{
    // Kiểm tra xem thông tin đăng nhập hợp lệ hay không
    if (!check_user($email, $mat_khau)) {
        // Thông tin đăng nhập không hợp lệ
        return false;
    }

    // Đăng nhập người dùng
    $_SESSION["email"] = $email;
    $_SESSION["logged_in"] = true;

    // Chuyển hướng người dùng đến trang chủ
    header("Location: index.php");

    return true;
}

function getTaiKhoan_limit($start, $limit)
{

    $sql = "select * from taikhoan order by id desc limit $start,$limit";
    $tk = pdo_query($sql);
    return $tk;
}