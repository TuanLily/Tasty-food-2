<?php
function insert_datban($ten_kh, $email, $sdt, $so_nguoi, $thoi_gian_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id)
{
  $ngay_dat_ban = date('Y-m-d H:i:s', strtotime($thoi_gian_dat_ban));

  $sql = "INSERT INTO dat_ban (ten_kh, email, sdt, so_nguoi , thoi_gian_dat_ban, ghi_chu, so_luong, gia, hinh, ten, mon_an_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  try {
    pdo_execute($sql, $ten_kh, $email, $sdt, $so_nguoi, $ngay_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id);
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

// SELECT dm.id AS danh_muc_id, dm.ten_dm, ma.id AS mon_an_id, ma.ten, ma.hinh, ma.gia, ma.trang_thai FROM danh_muc dm JOIN mon_an ma ON dm.id = ma.danh_muc_id WHERE dm.id = danh_muc_id and ma.trang_thai = 1 ORDER BY ma.gia DESC