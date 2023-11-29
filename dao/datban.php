<?php
function insert_datban($ten_kh, $email, $sdt, $so_nguoi, $thoi_gian_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id)
{
  $ngay_dat_ban = date('Y-m-d', strtotime($thoi_gian_dat_ban));
  $gio_dat_ban = date('H:i:s', strtotime($thoi_gian_dat_ban));
  $trang_thai = 1; // Giá trị mặc định cho trạng thái là 1 (đơn mới)

  $sql = "INSERT INTO dat_ban (ten_kh, email, sdt, so_nguoi, thoi_gian_dat_ban, ghi_chu, so_luong, gia, hinh, ten, mon_an_id, trang_thai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  try {
    pdo_execute($sql, $ten_kh, $email, $sdt, $so_nguoi, $thoi_gian_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id, $trang_thai);
  } catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
  }
}

function loadMonAn_tu_danhMuc($danh_muc_id)
{
  $pdo = pdo_get_connection();

  $sql = "SELECT dm.id AS danh_muc_id, dm.ten_dm, ma.id AS mon_an_id, ma.ten, ma.hinh, ma.gia, ma.trang_thai";
  $sql .= " FROM danh_muc dm JOIN mon_an ma ON dm.id = ma.danh_muc_id";
  $sql .= " WHERE dm.id = :danh_muc_id and ma.trang_thai = 1";
  $sql .= " ORDER BY ma.gia DESC";

  $stmt = pdo_prepare($pdo, $sql);
  $stmt->bindParam(':danh_muc_id', $danh_muc_id);
  $stmt->execute();
  return $stmt->fetchAll();
}


function loadall_tt_datban()
{

  $sql = "SELECT * FROM dat_ban ORDER BY id DESC";
  $listdatban = pdo_query($sql);
  return $listdatban;
}

function getDatBan_limit($start, $limit)
{
  $sql = "SELECT MAX(id) as id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id";
  $sql .= " FROM dat_ban GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC LIMIT $start,$limit";
  $datban_limit = pdo_query($sql);
  return $datban_limit;
}

function loadall_tt_datban_theo_ten()
{
  $sql = "SELECT MAX(id) as id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id";
  $sql .= " FROM dat_ban GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC";
  $listdatban = pdo_query($sql);
  return $listdatban;
}
// SELECT MAX(id) as id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id FROM dat_ban GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC
/**
 * Hiển thị 1 list thông tin đặt bàn
 * @param mixed $id
 * @return array
 */
function loadone_tt_datban($id)
{
  $sql = "SELECT MAX(id) as id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id";
  $sql .= " FROM dat_ban WHERE id = '" . $id . "' GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC";
  $info_datban = pdo_query_one($sql);
  return $info_datban;
}
// SELECT MAX(id) as id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id FROM dat_ban WHERE id = id GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC


function load_tt_monan_theo_ten($ten_kh, $thoi_gian_dat_ban)
{
  $sql = "SELECT GROUP_CONCAT(id) AS id, ten_kh, thoi_gian_dat_ban, GROUP_CONCAT(mon_an_id) AS mon_an_id, GROUP_CONCAT(ten) AS ten, GROUP_CONCAT(gia) AS gia, GROUP_CONCAT(hinh) AS hinh, GROUP_CONCAT(so_luong) AS so_luong";
  $sql .= " FROM dat_ban WHERE  ten_kh= '" . $ten_kh . "' AND thoi_gian_dat_ban= '" . $thoi_gian_dat_ban . "' GROUP BY ten_kh, thoi_gian_dat_ban";
  $info_datban_monan = pdo_query($sql);
  return $info_datban_monan;
}

//* GROUP_CONCAT là một hàm tính toán trong SQL được sử dụng để kết hợp các giá trị của một cột thành một chuỗi duy nhất, 
//* với các giá trị được phân tách bằng một ký tự hoặc chuỗi được chỉ định.

// SELECT MAX(id) as id, ten_kh, thoi_gian_dat_ban, GROUP_CONCAT(mon_an_id ORDER BY thoi_gian_dat_ban ASC) AS mon_an_id, GROUP_CONCAT(ten ORDER BY thoi_gian_dat_ban ASC) AS danh_sach_mon_an, GROUP_CONCAT(so_luong ORDER BY thoi_gian_dat_ban ASC) AS so_luong_mon_an, GROUP_CONCAT(gia ORDER BY thoi_gian_dat_ban ASC) AS gia_mon_an, MAX(trang_thai) AS trang_thai FROM dat_ban WHERE id = id GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC
function get_trang_thai_datban($n)
{
  switch ($n) {
    case '0':
      $tt = 'Hủy đơn';
      break;
    case '1':
      $tt = 'Đơn hàng mới';
      break;
    case '2':
      $tt = 'Chờ thanh toán cọc';
      break;
    case '3':
      $tt = 'Đặt cọc thành công';
      break;
    case '4':
      $tt = 'Đơn đặt bàn đã hoàn thành';
      break;
    default:
      $tt = 'Đơn hàng mới';
      break;
  }
  return $tt;
}