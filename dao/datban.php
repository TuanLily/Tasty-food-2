<?php
function insert_datban($ten_kh, $email, $sdt, $so_nguoi, $thoi_gian_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id)
{
  $ngay_dat_ban = date('Y-m-d', strtotime($thoi_gian_dat_ban));
  $gio_dat_ban = date('H:i:s', strtotime($thoi_gian_dat_ban));
  $trang_thai = 1; // Giá trị mặc định cho trạng thái là 1 (đơn mới)

  $sql = "INSERT INTO dat_ban (ten_kh, email, sdt, so_nguoi , thoi_gian_dat_ban, ghi_chu, so_luong, gia, hinh, ten, mon_an_id, trang_thai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  try {
    pdo_execute($sql, $ten_kh, $email, $sdt, $so_nguoi, $ngay_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id, $trang_thai);
  } catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
  }
}


// function loadMonAn_tu_danhMuc()
// {
//   $sql = "SELECT dm.id AS danh_muc_id, dm.ten_dm, ma.id AS mon_an_id, ma.ten, ma.hinh, ma.gia";
//   $sql .= " FROM danh_muc dm JOIN mon_an ma ON dm.id = ma.danh_muc_id";
//   $sql .= " GROUP BY dm.id, dm.ten_dm, ma.id, ma.ten ORDER BY dm.id, ma.id";
//   $ma_dm = pdo_query($sql);
//   return $ma_dm;
// }

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

// SELECT dm.id AS danh_muc_id, dm.ten_dm, ma.id AS mon_an_id, ma.ten, ma.hinh, ma.gia, ma.trang_thai FROM danh_muc dm JOIN mon_an ma ON dm.id = ma.danh_muc_id WHERE dm.id = :danh_muc_id and trang_thai = 1 ORDER BY ma.gia DESC