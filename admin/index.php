<?php
session_start();
ob_start();
session_unset();

require_once "../dao/pdo.php";
require_once "../global/global.php";


include "../dao/danhmuc.php";
include "../dao/monan.php";
include "../dao/delete_list.php";


// Giao diện
include('view/header.php');
include('view/navbar.php');
include('view/aside.php');

$previousPage = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // *Bắt đầu chức năng danh mục


        case 'themdm': //Kiểm tra người dùng có ấn vào nút add hay không?
            if (isset($_POST['them']) && ($_POST['them'])) {
                $tenDanhMuc = $_POST['tenDanhMuc'];
                $check = 1;
                if ($tenDanhMuc == "") {
                    $_SESSION['error']['tenDanhMuc']['invalid'] = 'Không được để trống';
                    $check = 0;
                }

                if (strlen($tenDanhMuc) < 3) {
                    $_SESSION['error']['tenDanhMuc']['numbers_word'] = 'Phải có ít nhất 3 ký tự';
                    $check = 0;
                }

                if ($check == 1) {
                    insert_danhmuc($tenDanhMuc);
                    echo '<script>alert("Thêm thành công!")</script>';
                }
            }
            include('modules/danhmuc/them.php');
            break;



        case 'dsdm':
            $listdanhmuc = loadall_danhmuc();
            include('modules/danhmuc/danhsach.php');
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);

            }
            $listdanhmuc = loadall_danhmuc();
            include('modules/danhmuc/danhsach.php');
            break;

        case 'danh_muc_luu_tru':
            $listdanhmuc_luutru = loadall_danhmuc_luutru();
            include('modules/danhmuc/luutru.php');
            break;

        case 'khoi_phuc_danhmuc':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                khoi_phuc_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include('modules/danhmuc/danhsach.php');
            break;

        case 'suadm';
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $danhMuc = loadone_danhmuc($_GET['id']);
            }
            include('modules/danhmuc/sua.php');
            break;

        case 'capnhatdm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenDanhMuc = $_POST['tenDanhMuc'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenDanhMuc);
                echo '<script>alert("Cập nhật thành công")</script>';
            }
            $listdanhmuc = loadall_danhmuc();
            header('location: index.php?act=dsdm&page=1');
            // include('modules/danhmuc/danhsach.php');
            break;

        case 'delete_list_dm':
            if (isset($_POST['delete']) && isset($_POST['check_del'])) {
                $arr = $_POST['check_del'];
                $del = implode(',', $arr);
                RemoveSelect_dm($del);
            } else {
                echo '<script>
                        alert("Vui lòng chọn mục cần xóa");
                        setTimeout(function() {
                            window.location.href = "index.php?act=dsdm&page=1";
                        }, 0); // Đợi 0 giây (1 giây = 1000 milliseconds)
                    </script>';
            }
            $listdanhmuc = loadall_danhmuc();
            include('modules/danhmuc/danhsach.php');
            break;
        case 'restore_list_dm':
            if (isset($_POST['restore']) && isset($_POST['check_del'])) {
                $arr = $_POST['check_del'];
                $del = implode(',', $arr);
                RestoreSelect_dm($del);
            } else {
                echo '<script>
                        alert("Vui lòng chọn mục cần khôi phục");
                        setTimeout(function() {
                            window.location.href = "index.php?act=danh_muc_luu_tru&page=1";
                        }, 0); // Đợi 0 giây (1 giây = 1000 milliseconds)
                    </script>';
            }
            $listdanhmuc = loadall_danhmuc();
            include('modules/danhmuc/danhsach.php');
            break;

        // *Kết thúc chức năng danh mục

        // !Bắt đầu chức năng sản phẩm
        case 'them':
            if (isset($_POST['them']) && ($_POST['them'])) {
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $gia_giam = $_POST['gia_giam'];
                $mo_ta = $_POST['mo_ta'];
                $danh_muc_id = $_POST['danh_muc_id'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($hinh);
                $max_size = 5242880;
                $uploadOk = 1;


                // Kiểm tra các giá trị trống
                if ($tensp == "") {
                    $_SESSION['error']['tensp'] = 'Không được để trống';
                    $uploadOk = 0;
                } else {
                    unset($_SESSION['error']['tensp']);
                }

                if ($giasp == "" || $giasp < 0) {
                    $_SESSION['error']['giasp'] = 'Không được để trống hoặc giá trị âm';
                    $uploadOk = 0;
                } else {
                    unset($_SESSION['error']['giasp']);
                }

                if ($gia_giam == $giasp || $giasp < 0) {
                    $_SESSION['error']['gia_giam'] = 'Không được trùng với giá niêm yết hoặc giá trị âm';
                    $uploadOk = 0;
                } else {
                    unset($_SESSION['error']['gia_giam']);
                }

                if (empty($hinh)) {
                    $_SESSION['error']['hinh']['required'] = 'Ảnh không được trống';
                    $uploadOk = 0;
                }

                // Kiểm tra định dạng file
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" && $imageFileType != "dng" && $imageFileType != "webp"
                ) {
                    $_SESSION['error']['hinh']['incorrect'] = 'Định dạng ảnh không phù hợp';
                    $uploadOk = 0;
                }

                // Kiểm tra dung lượng file
                if ($_FILES['hinh']['size'] > $max_size) { // kiểm tra 1MB = 1048576 Bytes
                    $_SESSION['error']['hinh']['maxSize'] = 'Hình không vượt quá 1MB';
                    $uploadOk = 0;
                }


                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        insert_monan($tensp, $giasp, $gia_giam, $hinh, $mo_ta, $danh_muc_id);
                        echo '<script>alert("Món ăn đã được thêm")</script>';
                    }
                }
            }
            $listdanhmuc = loadall_danhmuc();
            include('modules/monan/them.php');
            break;

        case 'dsma':
            if (isset($_POST['listcheck']) && ($_POST['listcheck'])) {
                $keyw = $_POST['keyw'];
                $danh_muc_id = $_POST['danh_muc_id'];
            } else {
                $keyw = '';
                $danh_muc_id = 0;
            }

            $listmonan = loadall_monan($keyw, $danh_muc_id);
            $listdanhmuc = loadall_danhmuc();

            include('modules/monan/danhsach.php');
            break;

        case 'mon_an_luu_tru':
            $listmonan_luutru = loadall_monan_luutru();
            include('modules/monan/luutru.php');
            break;


        case 'xoama':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_monan($_GET['id']);
                header("Location: $previousPage");
            }
            $listmonan = loadall_monan();

            include('modules/monan/danhsach.php');
            break;

        case 'khoi_phuc_mon_an':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                khoi_phuc_monan($_GET['id']);
                header("Location: $previousPage");
            }
            $listmonan = loadall_monan();

            include('modules/monan/danhsach.php');
            break;

        case 'suama':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $monan = loadone_monan($_GET['id']);
            }
            $listmonan = loadall_monan();
            $listdanhmuc = loadall_danhmuc();
            include('modules/monan/sua.php');
            break;

        case 'updatema':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $danh_muc_id = $_POST['danh_muc_id'];

                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $gia_giam = $_POST['gia_giam'];
                $mo_ta = $_POST['mo_ta'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($hinh);
                $max_size = 5242880;
                $uploadOk = 1;

                if ($giasp < 0) {
                    $_SESSION['error']['giasp'] = 'Không được để giá trị âm';
                    $uploadOk = 0;
                } else {
                    unset($_SESSION['error']['giasp']);
                }

                if ($gia_giam == $giasp || $giasp < 0) {
                    $_SESSION['error']['gia_giam'] = 'Không được trùng với giá niêm yết hoặc giá trị âm';
                    $uploadOk = 0;
                } else {
                    unset($_SESSION['error']['gia_giam']);
                }


                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                }
                if ($uploadOk == 1) {
                    update_monan($id, $danh_muc_id, $tensp, $giasp, $gia_giam, $mo_ta, $hinh);
                    echo '<script>alert("Cập nhật thành công")</script>';
                }
            }

            $listmonan = loadall_monan();
            $listdanhmuc = loadall_danhmuc();
            include('modules/monan/danhsach.php');
            break;

        case 'delete_list_ma':
            if (isset($_POST['delete']) && isset($_POST['check_del'])) {
                $arr = $_POST['check_del'];
                $del = implode(',', $arr);
                RemoveSelect_ma($del);
            } else {
                echo '<script>
                        alert("Vui lòng chọn mục cần xóa");
                        setTimeout(function() {
                            window.location.href = "index.php?act=dsma&page=1";
                        }, 0); // Đợi 0 giây (1 giây = 1000 milliseconds)
                    </script>';
            }
            $listmonan = loadall_monan();
            include('modules/monan/danhsach.php');
            break;
        case 'restore_list_ma':
            if (isset($_POST['restore']) && isset($_POST['check_del'])) {
                $arr = $_POST['check_del'];
                $del = implode(',', $arr);
                RestoreSelect_ma($del);
            } else {
                echo '<script>
                        alert("Vui lòng chọn mục cần khôi phục");
                        setTimeout(function() {
                            window.location.href = "index.php?act=mon_an_luu_tru&page=1";
                        }, 0); // Đợi 0 giây (1 giây = 1000 milliseconds)
                    </script>';
            }
            $listmonan = loadall_monan();
            include('modules/monan/danhsach.php');
            break;

        // !Kết thúc chức năng sản phẩm

        // *Bắt đầu chức năng khách hàng

        // *Kết thúc chức năng khách hàng

        // Bắt đầu chức năng bill

        // Kết thúc chức năng bill

        // *Bắt đầu chức năng cart

        // *Kết thúc chức năng cart

        // !Bắt đầu chức năng đặt bàn

        // !Kết thúc chức năng đặt bàn

        // *Bắt đầu chức năng thống kê

        // *Kết thúc chức năng thống kê

        case 'ds_dat_ban':
            include('modules/datban/danhsach.php');
            break;

        default:
            include('error/404.php');
    }
} else {
    include('view/home.php');
}
include('view/footer.php');