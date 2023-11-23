<?php
/**
 * Thêm sản phẩm
 * @param mixed $tenloai
 * @return void
 */
function insert_monan($tensp, $giasp, $gia_giam, $hinh, $mo_ta, $danh_muc_id)
{
    $sql = "insert into mon_an(ten,gia,gia_giam,hinh,mo_ta,danh_muc_id) values('$tensp','$giasp','$gia_giam','$hinh','$mo_ta','$danh_muc_id')";
    pdo_execute($sql);
}

/**
 * Xóa sản phẩm
 * @param mixed $id
 * @return void
 */
function delete_monan($id)
{
    $sql = "UPDATE mon_an SET trang_thai = 0 WHERE id = " . $id;
    pdo_execute($sql);
}

/**
 * Khôi phục sản phẩm
 * @param mixed $id
 * @return void
 */
function khoi_phuc_monan($id)
{
    $sql = "UPDATE mon_an SET trang_thai = 1 WHERE id = " . $id;
    pdo_execute($sql);
}

/**
 * Hiển thị tất cả sản phẩm
 * @return array
 */
function loadall_monan($keyw = '', $danh_muc_id = 0)
{
    $sql = "SELECT * FROM mon_an WHERE trang_thai = 1";

    if ($keyw != "") {
        $sql .= " AND ten LIKE '%" . $keyw . "%'";
    }

    if ($danh_muc_id > 0) {
        $sql .= " AND danh_muc_id = '" . $danh_muc_id . "'";
    }

    $sql .= " ORDER BY id DESC";

    // Thực hiện truy vấn và trả về kết quả
    $listmonan = pdo_query($sql);

    return $listmonan;
}
/**
 * Hiển thị tất cả sản phẩm lưu trữ khi đã xóa
 * @return array
 */
function loadall_monan_luutru($keyw = '', $danh_muc_id = 0)
{
    $sql = "SELECT * FROM mon_an WHERE trang_thai = 0";

    if ($keyw != "") {
        $sql .= " AND ten LIKE '%" . $keyw . "%'";
    }

    if ($danh_muc_id > 0) {
        $sql .= " AND danh_muc_id = '" . $danh_muc_id . "'";
    }

    $sql .= " ORDER BY id DESC";

    // Thực hiện truy vấn và trả về kết quả
    $listmonan = pdo_query($sql);

    return $listmonan;
}


/**
 * Hiển thị tất cả sản phẩm ra ngoài trang chủ với top 10 lượt xem
 * @return array
 */
function loadall_sanpham_top10()
{
    $sql = "select * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
/**
 * Hiển thị tất cả sản phẩm ra ngoài trang chủ
 * @return array
 */
function loadall_monan_home()
{
    $sql = "select * from mon_an where 1 and trang_thai = 1 order by id desc limit 0,9";
    $listmonan = pdo_query($sql);
    return $listmonan;
}

/**
 * Hiển thị 1 sản phẩm
 * @param mixed $id
 * @return array
 */
function loadone_monan($id)
{
    $sql = "select * from mon_an where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

/**
 * Load sản phẩm cùng loại
 * @param mixed $id
 * @return array
 */
function load_monan_cungloai($id, $danh_muc_id)
{
    $sql = "select * from mon_an where danh_muc_id =" . $danh_muc_id . " and id <>" . $id;
    $sql .= " limit 0,4";
    $listmonan = pdo_query($sql);
    return $listmonan;
}

/**
 * Hiển thị tên danh mục
 * @return array
 */
function load_ten_danhmuc($danh_muc_id)
{
    if ($danh_muc_id > 0) {
        $sql = "select * from danh_muc where id=" . $danh_muc_id;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}

/**
 * Sửa sản phẩm
 * @param mixed $id
 * @param mixed $tenloai
 * @return void
 */
function update_monan($id, $danh_muc_id, $tensp, $giasp, $gia_giam, $mo_ta, $hinh)
{
    if ($hinh != "") {
        $sql = "update mon_an set ten='" . $tensp . "', gia='" . $giasp . "', gia_giam='" . $gia_giam . "',hinh='" . $hinh . "',mo_ta='" . $mo_ta . "', danh_muc_id='" . $danh_muc_id . "' where id=" . $id;
    } else {
        $sql = "update mon_an set ten='" . $tensp . "', gia='" . $giasp . "', gia_giam='" . $gia_giam . "',mo_ta='" . $mo_ta . "', danh_muc_id='" . $danh_muc_id . "' where id=" . $id;
    }
    pdo_execute($sql);
}


function getMonAn_limit($start, $limit)
{
    $sql = "SELECT * FROM mon_an WHERE trang_thai = 1 ORDER BY id DESC LIMIT $start,$limit";
    $dm = pdo_query($sql);
    return $dm;
}
function getMonAn_luutru_limit($start, $limit)
{
    $sql = "SELECT * FROM mon_an WHERE trang_thai = 0 ORDER BY id DESC LIMIT $start,$limit";
    $dm = pdo_query($sql);
    return $dm;
}

function update_luotxem($id)
{
    $one_sp = loadone_monan($id);


    if (isset($one_sp)) {
        $luotxem = $one_sp['luotxem'] + 1;
        $sql = "update sanpham set luotxem = '" . $luotxem . "' where id = '" . $id . "'";
    }
    pdo_execute($sql);
}

function count_monan_danhmuc($danh_muc_id)
{
    $sql = "SELECT COUNT(id) as so_luong FROM mon_an WHERE danh_muc_id = '" . $danh_muc_id . "' GROUP BY danh_muc_id;";
    $count = pdo_query_value($sql);
    return $count;
}

function load_monAn_by_danhMuc($danh_muc_id)
{
    $sql = "SELECT * FROM mon_an WHERE trang_thai = 1 AND danh_muc_id=" . $danh_muc_id;
    $listmonan = pdo_query($sql);
    return $listmonan;
}

?>