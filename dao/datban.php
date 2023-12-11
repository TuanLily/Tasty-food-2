<?php

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
  $sql .= " FROM dat_ban GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY id DESC LIMIT $start,$limit";
  $datban_limit = pdo_query($sql);
  return $datban_limit;
}
function getdatban_thanhtoan_limit($start, $limit)
{
  $sql = "SELECT COUNT(DISTINCT id) as id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id";
  $sql .= " FROM dat_ban GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC LIMIT $start,$limit";
  $datban_limit = pdo_query($sql);
  return $datban_limit;
}

// SELECT COUNT(DISTINCT id) as id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id FROM dat_ban GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC LIMIT $start,$limit
// ..SELECT GROUP_CONCAT(id) as count_id, COUNT(*) so_luong_id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id FROM dat_ban GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC LIMIT 0, 7;
function loadall_tt_datban_theo_ten()
{
  $sql = "SELECT MAX(id) as id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id";
  $sql .= " FROM dat_ban GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC";
  $listdatban = pdo_query($sql);
  return $listdatban;
}
// SELECT MAX(id) as id, ten_kh, thoi_gian_dat_ban, MAX(email) AS email, MAX(sdt) AS sdt, MAX(so_nguoi) AS so_nguoi, MAX(ghi_chu) AS ghi_chu, MAX(trang_thai) AS trang_thai, MAX(khach_hang_id) AS khach_hang_id FROM dat_ban GROUP BY ten_kh, thoi_gian_dat_ban ORDER BY thoi_gian_dat_ban DESC
function lay_id_datban_moi_nhat($ten_kh, $thoi_gian_dat_ban)
{
  try {
    $pdo = pdo_get_connection();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id FROM dat_ban WHERE ten_kh = :ten_kh AND thoi_gian_dat_ban = :thoi_gian_dat_ban ORDER BY id DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':ten_kh', $ten_kh, PDO::PARAM_STR);
    $stmt->bindParam(':thoi_gian_dat_ban', $thoi_gian_dat_ban, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['id'] : null;
  } catch (PDOException $e) {
    // Xử lý ngoại lệ theo cách bạn muốn
    echo "Error: " . $e->getMessage();
    return null;
  }
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
    case '1':
      $tt = 'Hủy đơn';
      break;
    case '2':
      $tt = 'Đơn hàng mới';
      break;
    case '3':
      $tt = 'Chờ thanh toán cọc';
      break;
    case '4':
      $tt = 'Đặt cọc thành công';
      break;
    case '5':
      $tt = 'Đơn đặt bàn đã hoàn thành';
      break;
    default:
      $tt = 'Đơn hàng mới';
      break;
  }
  return $tt;
}
function getCountCanceledOrders()
{
  $sql = "SELECT COUNT(DISTINCT ten_kh) AS count FROM dat_ban WHERE trang_thai = 1"; // Assuming 1 is the status for canceled orders
  $result = pdo_query_one($sql);
  return $result ? $result['count'] : 0;
}
function getCountOrders()
{
  $sql = "SELECT COUNT(DISTINCT ten_kh) AS count FROM dat_ban WHERE trang_thai = 5"; // Assuming 1 is the status for canceled orders
  $result = pdo_query_one($sql);
  return $result ? $result['count'] : 0;
}
function update_trang_thai_datban($ten_kh, $thoi_gian_dat_ban, $trang_thai)
{
  $sql = "UPDATE dat_ban SET trang_thai=:trang_thai WHERE ten_kh=:ten_kh AND thoi_gian_dat_ban=:thoi_gian_dat_ban";
  $params = array(
    ':ten_kh' => $ten_kh,
    ':thoi_gian_dat_ban' => $thoi_gian_dat_ban,
    ':trang_thai' => $trang_thai
  );

  // Thêm dòng sau để đảm bảo số lượng tham số và giá trị tương ứng đúng
  $sql = bindValues($sql, $params);

  pdo_execute($sql, $params);
}


function datBan($ten_kh, $email, $sdt, $thoi_gian_dat_ban, $ghi_chu, $trang_thai, $khach_hang_id, $so_luong, $gia, $hinh, $ten, $mon_an_id)
{
  try {
    // Kết nối đến cơ sở dữ liệu (thay đổi thông tin kết nối phù hợp với hệ thống của bạn)


    $conn = pdo_get_connection();

    // Thiết lập chế độ báo lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Chuyển định dạng thời gian đặt bàn
    $formatted_time = date('Y-m-d H:i:s', strtotime($thoi_gian_dat_ban));

    // Chuẩn bị truy vấn INSERT
    $sql = "INSERT INTO dat_ban (ten_kh, email, sdt, thoi_gian_dat_ban, ghi_chu, trang_thai, khach_hang_id, so_luong, gia, hinh, ten, mon_an_id) 
              VALUES (:ten_kh, :email, :sdt, :thoi_gian_dat_ban, :ghi_chu, :trang_thai, :khach_hang_id, :so_luong, :gia, :hinh, :ten, :mon_an_id)";

    // Chuẩn bị câu lệnh truy vấn
    $stmt = $conn->prepare($sql);

    // Bind các tham số vào câu lệnh truy vấn
    $stmt->bindParam(':ten_kh', $ten_kh);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':sdt', $sdt);
    $stmt->bindParam(':thoi_gian_dat_ban', $formatted_time);
    $stmt->bindParam(':ghi_chu', $ghi_chu);
    $stmt->bindParam(':trang_thai', $trang_thai);
    $stmt->bindParam(':khach_hang_id', $khach_hang_id);
    $stmt->bindParam(':so_luong', $so_luong);
    $stmt->bindParam(':gia', $gia);
    $stmt->bindParam(':hinh', $hinh);
    $stmt->bindParam(':ten', $ten);
    $stmt->bindParam(':mon_an_id', $mon_an_id);

    // Thực hiện truy vấn
    $stmt->execute();

    // Lấy id của đơn đặt bàn vừa thêm
    $lastInsertId = $conn->lastInsertId();

    // Đóng kết nối
    $conn = null;

    return $lastInsertId;
  } catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
  }
}