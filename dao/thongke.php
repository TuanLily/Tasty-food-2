<?php

function loadall_thongke()
{
    $sql = "select danh_muc.ten_dm as ten_dm, danh_muc.id as ma_dm, count(mon_an.id) as count_ma, min(mon_an.gia) as min_gia, max(mon_an.gia) as max_gia, avg(mon_an.gia) as avg_gia";
    $sql .= " from mon_an left join danh_muc on danh_muc.id=mon_an.danh_muc_id where 1";
    $sql .= " group by danh_muc.id order by danh_muc.id asc";
    $listthongke = pdo_query($sql);
    return $listthongke;
}

function loadall_thongke_taikhoan()
{
    $sql = "select count(id) as count_tk from khach_hang";
    $listthongke_tk = pdo_query($sql);
    return $listthongke_tk;
}
function loadall_thongke_datban()
{
    $sql = "SELECT COUNT(DISTINCT ten_kh) AS count_db FROM dat_ban";
    $listthongke_db = pdo_query($sql);
    return $listthongke_db;
}
// Hàm DISTINCT trong SQL được sử dụng để lọc các giá trị duy nhất từ một cột hoặc nhiều cột trong kết quả của một truy vấn SELECT. Nó giúp loại bỏ các giá trị trùng lặp, chỉ giữ lại mỗi giá trị duy nhất một lần


?>