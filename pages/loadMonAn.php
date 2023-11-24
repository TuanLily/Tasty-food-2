<?php
// loadMonAn.php

// Include file chứa hàm loadMonAn_tu_danhMuc
include_once '../dao/datban.php';

// Lấy danh mục ID từ yêu cầu
$danh_muc_id = isset($_GET['danh_muc_id']) ? $_GET['danh_muc_id'] : null;

// Lấy danh sách món ăn dựa trên danh mục
$listmonan = loadMonAn_tu_danhMuc($danh_muc_id);

// Hiển thị danh sách món ăn
foreach ($listmonan as $monan) {
    $ten = $monan['ten'];
    $hinh_ma = "uploads/" . $monan['hinh'];
    $gia = $monan['gia'];
    echo '
        <tr>
            <td class="bang_thongtin_mon_an-ten-mon-an">' . $ten . '</td>
            <td><img src="' . $hinh_ma . '" alt="Hình ảnh món ăn" /></td>
            <td class="bang_thongtin_mon_an-gia-ban">' . number_format($gia, 0, ',', '.') . 'đ</td>
            <td>
                <div class="quantity-input">
                    <button type="button" class="decrement" onclick="decrementQuantity(' . $monan['mon_an_id'] . ')">-</button>
                    <input type="text" id="so_luong' . $monan['mon_an_id'] . '" name="so_luong' . $monan['mon_an_id'] . '" value="0"/>
                    <input type="hidden" name="gia_' . $monan['mon_an_id'] . '" value="' . $monan['gia'] . '" />
                    <button type="button" class="increment" onclick="incrementQuantity(' . $monan['mon_an_id'] . ')" max="10">+</button>
                </div>
            </td>
        </tr>
    ';
}
?>