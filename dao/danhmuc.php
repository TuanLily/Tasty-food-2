<?php
/**
 * Thêm danh mục
 * @param mixed $tenDanhMuc
 * @return void
 */
function insert_danhmuc($tenDanhMuc)
{
    $sql = "insert into danh_muc(ten_dm) values('$tenDanhMuc')";
    pdo_execute($sql);
}

/**
 * Xóa danh mục
 * @param mixed $id
 * @return void
 */
function delete_danhmuc($id)
{
    $sql = "UPDATE danh_muc SET trang_thai = 0 WHERE id = " . $id;
    pdo_execute($sql);
}

/**
 * Khôi phục danh mục
 * @param mixed $id
 * @return void
 */
function khoi_phuc_danhmuc($id)
{
    $sql = "UPDATE danh_muc SET trang_thai = 1 WHERE id = " . $id;
    pdo_execute($sql);
}

/**
 * Hiển thị tất cả danh mục với trang_thai = 1
 * @return array
 */
function loadall_danhmuc()
{

    $sql = "SELECT * FROM danh_muc WHERE trang_thai = 1 ORDER BY id DESC";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
/**
 * Hiển thị tất cả danh mục trang_thai = 0
 * @return array
 */
function loadall_danhmuc_luutru()
{

    $sql = "SELECT * FROM danh_muc WHERE trang_thai = 0 ORDER BY id ASC";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadall_monan_danhmuc()
{

    $sql = "SELECT *
    FROM danh_muc as dm
    INNER JOIN mon_an as ma
    ON ma.danh_muc_id = dm.id;";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

/**
 * Hiển thị 1 danh mục
 * @param mixed $id
 * @return array
 */
function loadone_danhmuc($id)
{
    $sql = "select * from danh_muc where id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
/**
 * Sửa danh mục
 * @param mixed $id
 * @param mixed $tenDanhMuc
 * @return void
 */
function update_danhmuc($id, $tenDanhMuc)
{
    $sql = "update danh_muc set ten_dm='" . $tenDanhMuc . "' where id=" . $id;
    pdo_execute($sql);
}


function getDanhMuc_limit($start, $limit)
{
    $sql = "SELECT * FROM danh_muc WHERE trang_thai = 1 ORDER BY id DESC LIMIT $start,$limit";
    $dm = pdo_query($sql);
    return $dm;
}

function getDanhMuc_luutru_limit($start, $limit)
{
    $sql = "SELECT * FROM danh_muc WHERE trang_thai = 0 ORDER BY id DESC LIMIT $start,$limit";
    $dm = pdo_query($sql);
    return $dm;
}

function get_trang_thai($n)
{
    switch ($n) {
        case '0':
            $tt = 'Đã xóa';
            break;
        case '1':
            $tt = 'Hoạt động';
            break;
        default:
            $tt = 'Hoạt động';
            break;
    }
    return $tt;
}


?>