<?php
function insert_datban($ten_kh, $email, $sdt, $so_nguoi, $so_ban, $thoi_gian_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id)
{
  $ngay_dat_ban = date('Y-m-d', strtotime($thoi_gian_dat_ban));
  $gio_dat_ban = date('H:i:s', strtotime($thoi_gian_dat_ban));
  $trang_thai = 1; // Giá trị mặc định cho trạng thái là 1 (đơn mới)

  $sql = "INSERT INTO dat_ban (ten_kh, email, sdt, so_nguoi, so_ban, thoi_gian_dat_ban, ghi_chu, so_luong, gia, hinh, ten, mon_an_id, trang_thai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  try {
    pdo_execute($sql, $ten_kh, $email, $sdt, $so_nguoi, $so_ban, $ngay_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id, $trang_thai);
  } catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
  }
}
