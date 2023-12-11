<?php
session_start();
ob_start();
//Add thư viện
include 'dao/pdo.php';
include 'dao/cookie.php';
require_once './mail/index.php';
include 'global/global.php';

// DAO
include "dao/datban.php";
include 'dao/danhmuc.php';
include 'dao/cart.php';
include 'dao/monan.php';
include "dao/taikhoan.php";
$mail = new Mailer();

$show_monan = loadall_monan_home();
if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = [];

// Gọi hàm kiểm tra đăng nhập tự động
if (autoLoginIfRemembered()) {
    // Người dùng đã đăng nhập tự động, bạn có thể thực hiện các hành động liên quan ở đây
    header('Location: index.php?act=trangchu');
    exit();
}
include "view/header.php";
$load_ma_hoa_don = load_ma_hoa_don();
$show_monan = loadall_monan_home();
$danhsachdanhmuc = loadall_danhmuc(); // làm cho form dat bàn


if (isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch ($act) {
        case 'trangchu':
            include "view/header.php";
            include "view/nav.php";
            include "view/slider.php";
            include "view/giamgiatrongtuan.php";
            include "view/home.php";
            include "view/footer.php";
            break;

        case 'monan':
            include "view/header.php";
            include "view/nav.php";
            if ((isset($_POST['keyw']) && $_POST['keyw'] != "")) {
                $keyw = $_POST['keyw'];
            } else {
                $keyw = "";
            }
            $dsma = loadall_monan($keyw, $danh_muc_id = '');
            include "view/margintop.php";
            include "pages/menu.php";
            include "view/footer.php";
            break;

        case 'monanct':
            include "view/header.php";
            include "view/nav.php";
            if ((isset($_GET['id_ma']) && $_GET['id_ma'] > 0)) {
                $id = $_GET['id_ma'];
                $onemonan = loadone_monan($id);
                extract($onemonan);

                $macungloai = load_monan_cungloai($id, $danh_muc_id);
                include 'pages/chitietmonan.php';
                include "view/footer.php";
            } else {
                include "view/header.php";
                include "view/nav.php";
                include "view/slider.php";
                include "view/giamgiatrongtuan.php";
                include "view/home.php";
                include "view/footer.php";
            }
            break;

        case 'search':
            include "view/header.php";
            include "view/nav.php";
            if (isset($_GET['keyw']) && $_GET['keyw'] != "") {
                $keyw = $_GET['keyw'];
            } else {
                $keyw = "";
            }

            $dsma = loadall_monan($keyw, $danh_muc_id = '');

            include "pages/searchMA.php";
            include "view/footer.php";
            break;



        case 'gioithieu':
            include "view/header.php";
            include "view/nav.php";
            include "pages/gioithieu.php";
            include "view/footer.php";
            break;

        case 'lienhe':
            include "view/header.php";
            include "view/nav.php";
            include "pages/lienhe.php";
            include "view/footer.php";
            break;


        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $ten = $_POST['ten'];
                $mat_khau = $_POST['mat_khau'];
                $rpass = $_POST['rpass'];
                $pass_hash = password_hash($mat_khau, PASSWORD_DEFAULT);
                $check = 1;

                if (empty($ten)) {
                    $_SESSION['error']['ten'] = 'Không được để trống';
                    $check = 0;
                } elseif (isset($ten)) {

                    $checkuser = check_user_validate($ten);
                    if ($checkuser !== false) {
                        $_SESSION['error']['ten'] = 'Tên người dùng này đã được đăng ký';
                        $check = 0;
                    }
                }
                if (empty($email)) {
                    $_SESSION['error']['email'] = 'Không được để trống';
                    $check = 0;
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['error']['email'] = 'Email không đúng định dạng';
                    $check = 0;
                } else {

                    $checkemail = check_email($email);
                    if ($checkemail !== false) {
                        $_SESSION['error']['email'] = 'Email này đã được đăng ký';
                        $check = 0;
                    }
                }
                if (empty($mat_khau)) {
                    $_SESSION['error']['mat_khau'] = 'Không được để trống';
                    $check = 0;
                } else if (strlen($mat_khau) < 8) {
                    $_SESSION['error']['mat_khau'] = 'Mật khẩu phải có ít nhất 8 ký tự';
                    $check = 0;
                } else {

                    $pass_hash;
                }


                if (empty($rpass)) {
                    $_SESSION['error']['rpass'] = 'Không được để trống';
                    $check = 0;
                } else {

                    if (!password_verify($rpass, $pass_hash)) {
                        $_SESSION['error']['rpass'] = 'Mật khẩu không trùng khớp';
                        $check = 0;
                    }
                }

                if ($check == 1) {
                    password_verify($rpass, $pass_hash);
                    insert_taikhoan($email, $ten, $pass_hash);
                    echo '<script>alert("Đăng ký thành công")</script>';
                    echo '<script>
                          setTimeout(function() {
                              window.location.href = "index.php?act=dangnhap";
                          }, 0);
                        </script>';
                }
            }

            include 'pages/account/register.php';
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $remember_me = isset($_POST['remember_me']) && $_POST['remember_me'] ? $_POST['remember_me'] : null; // Kiểm tra xem người dùng đã chọn "Ghi nhớ tài khoản" hay không
                $check = 1;

                if (empty($email)) {
                    $_SESSION['error']['email'] = 'Không được để trống';
                    $check = 0;
                } else {
                    unset($_SESSION['error']['email']);
                }

                if (empty($mat_khau)) {
                    $_SESSION['error']['mat_khau'] = 'Không được để trống';
                    $check = 0;
                } else {
                    unset($_SESSION['error']['mat_khau']);
                }

                if ($check == 1) {
                    $check_email_pass = check_email_validate($email);
                    if (is_array($check_email_pass)) {
                        $pass_check = password_verify($mat_khau, $check_email_pass['mat_khau']);
                        if ($pass_check == true) {
                            $_SESSION['email'] = $check_email_pass;

                            // Nếu người dùng chọn "Ghi nhớ tài khoản"
                            if ($remember_me) {
                                $cookieValue = base64_encode($email . ':' . $check_email_pass['mat_khau']);
                                setcookie('remember_me', $cookieValue, time() + (8 * 60 * 60), '/'); // Hết hạn sau 8 giờ
                            }

                            echo '<script>alert("Đăng nhập thành công")</script>';
                            echo '<script>
                          setTimeout(function() {
                              window.location.href = "index.php?act=trangchu";
                          }, 0);
                        </script>';
                            exit();
                        } else {
                            echo '<script>alert("Sai email hoặc sai mật khẩu")</script>';
                            include 'pages/account/login.php';
                            exit();
                        }
                    } else {
                        echo '<script>alert("Sai email hoặc sai mật khẩu")</script>';
                        include 'pages/account/login.php';
                        exit();
                    }
                }
            }
            include 'pages/account/login.php';
            break;


        case 'reset':

            if (isset($_POST['reset']) && ($_POST['reset'])) {
                $mat_khau = $_POST['mat_khau'];
                $rpass = $_POST['rpass'];
                $pass_hash = password_hash($mat_khau, PASSWORD_DEFAULT);
                $check = 1;
                if (empty($mat_khau)) {
                    $_SESSION['error']['mat_khau'] = 'Không được để trống';
                    $check = 0;
                } else if (strlen($mat_khau) < 8) {
                    $_SESSION['error']['mat_khau'] = 'Mật khẩu phải có ít nhất 8 ký tự';
                    $check = 0;
                } else {

                    $pass_hash;
                }

                if (empty($rpass)) {
                    $_SESSION['error']['rpass'] = 'Không được để trống';
                    $check = 0;
                } else {

                    if (!password_verify($rpass, $pass_hash)) {
                        $_SESSION['error']['rpass'] = 'Mật khẩu không trùng khớp';
                        $check = 0;
                    }
                }
                if ($check == 1) {
                    password_verify($rpass, $pass_hash);
                    update_password($_SESSION['email'], $pass_hash);
                    echo '<script>alert("Cập nhật thành công, vui lòng đăng nhập")</script>';
                    echo '
                        <script>
                            setTimeout(function() {
                                window.location.href = "index.php?act=dangnhap";
                            }, 0); // Đợi 0 giây (1 giây = 1000 milliseconds)
                        </script>
                        ';
                }
            }
            include "view/header.php";

            include 'pages/account/reset_pw.php';

            break;

        case 'quenmatkhau':
            if (isset($_POST['guiemail']) && $_POST['guiemail']) {
                $arr = array();
                $email = $_POST['email'];

                if (empty($email)) {
                    $_SESSION['error']['email'] = 'Email không được để trống';
                }

                if (!isset($email)) {
                    $_SESSION['error']['email'] = 'Email không không tồn tại';
                }
                if (empty($_SESSION['error']['email'])) {
                    $checkemail = check_email($email);
                    $code = substr(rand(0, 999999), 0, 6);
                    $title = "Quên mật khẩu";
                    $content = "Mã xác minh là: <span style='font-size: 20px; color:orange;'>" . $code . "</span>";
                    $mail->sendEmailPass($title, $content, $email);

                    $_SESSION["email"] = $email;
                    $_SESSION["code"] = $code;
                    header('Location: index.php?act=xacminh');
                }
            }
            include 'pages/account/quenmatkhau.php';
            break;

        case 'xacminh':
            if (isset($_POST['xacminh'])) {
                $arr = array();
                if ($_POST['maxacminh'] != $_SESSION['code']) {
                    $_SESSION['error']['maxacminh'] = 'Mã xác minh không hợp lệ';
                } else {
                    header('Location: index.php?act=reset');
                }
            }
            include 'pages/account/xacminh.php';
            break;

        case 'update':
            include "view/header.php";
            include "view/nav.php";
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {

                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $id = $_POST['id'];
                $phonePattern = '/^(84|0[3|5|7|8|9])+([0-9]{8})\b$/'; // Đã thêm dấu / ở đầu và cuối để biểu thức chính quy

                $check = 1;

                if (empty($ho_ten)) {
                    $_SESSION['error']['ho_ten'] = 'Không được để trống';
                    $check = 0;
                } else {
                    unset($_SESSION['error']['ho_ten']);
                }

                if (empty($email)) {
                    $_SESSION['error']['email'] = 'Không được để trống';
                    $check = 0;
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['error']['email'] = 'Email không đúng định dạng';
                    $check = 0;
                } else {
                    unset($_SESSION['error']['email']);
                }

                if (empty($sdt)) {
                    $_SESSION['error']['sdt'] = 'Không được để trống';
                    $check = 0;
                } else if (!preg_match($phonePattern, $sdt)) { // Sử dụng preg_match để so khớp với biểu thức chính quy
                    $_SESSION['error']['sdt'] = 'Không đúng định dạng số điện thoại';
                    $check = 0;
                } else {
                    unset($_SESSION['error']['sdt']);
                }

                if ($check == 1) {
                    capnhat_taikhoan_kh($id, $ho_ten, $email, $sdt);
                    echo '<script>alert("Cập nhật thành công thành công, đăng nhập lại để cập nhật lại thông tin")</script>';
                    echo '<script>
                              setTimeout(function() {
                                  window.location.href = "index.php?act=trangchu";
                              }, 0);
                          </script>';
                }
            }


            include 'pages/account/update.php';
            include "view/footer.php";
            break;


        case 'xemgiohang':
            if (isset($_SESSION['mycart']) && isset($_SESSION['info_datban'])) {
                // Hiển thị giỏ hàng
                include "view/header.php";
                include "view/nav.php";
                include "view/margintop.php";
                include "./pages/xemgiohang.php";
                include "view/footer.php";

            } else {
                include "view/header.php";
                include "pages/pocup.php";
                include "view/nav.php";
                include "view/slider.php";
                include "view/giamgiatrongtuan.php";
                include "view/home.php";
                include "view/footer.php";
            }
            break;

        case 'datbanngay':
            include 'view/header.php';
            include 'view/nav.php';
            include "view/margintop.php";

            if (isset($_POST['datbanngay']) && $_POST['datbanngay']) {
                $ten_kh = $_POST['ten_kh'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $so_nguoi = $_POST['so_nguoi'];
                $thoi_gian_dat_ban = $_POST['thoi_gian_dat_ban'];
                $ghi_chu = $_POST['ghi_chu'];
                $check = 1;
                $tong_tien = 0;

                if (empty($ten_kh)) {
                    $_SESSION['error']['ten_kh']['invalid'] = 'Không được để trống';
                    $check = 0;
                } elseif (strlen($ten_kh) > 30) {
                    $_SESSION['error']['ten_kh']['dinhdang'] = 'Không quá 30 ký tự';
                    $check = 0;
                }

                // Kiểm tra trường "Số điện thoại"
                if (empty($sdt)) {
                    $_SESSION['error']['sdt']['invalid'] = 'Không được để trống';
                    $check = 0;
                } elseif (!preg_match('/^\+?\d{10,15}$/', $sdt)) {
                    $_SESSION['error']['sdt']['dinhdang'] = 'Không quá 15 số';
                    $check = 0;
                }

                // Kiểm tra trường "Số người"
                if (empty($so_nguoi)) {
                    $_SESSION['error']['so_nguoi']['invalid'] = 'Không được để trống';
                    $check = 0;
                } elseif ($so_nguoi > 20) {
                    $_SESSION['error']['so_nguoi']['dinhdang'] = 'Không quá 20 người';
                    $check = 0;
                }

                // Kiểm tra trường "Thời gian đặt bàn"
                $min_date = date('Y-m-d\TH:i');
                $max_date = date('Y-m-d\TH:i', strtotime('+1 month'));

                if (empty($thoi_gian_dat_ban)) {
                    $_SESSION['error']['thoi_gian_dat_ban']['invalid'] = 'Không được để trống';
                    $check = 0;
                } elseif (strtotime($thoi_gian_dat_ban) < time() || strtotime($thoi_gian_dat_ban) > strtotime($max_date)) {
                    $_SESSION['error']['thoi_gian_dat_ban']['dinhdang'] = 'Không quá 30 ngày';
                    $check = 0;
                }

                // Bắt đầu xử lý nếu không có lỗi
                if ($check == 1) {
                    $listmonan = loadall_monan();

                    foreach ($listmonan as $monan) {
                        $id = $monan['id'];
                        $so_luong = $_POST['so_luong' . $id];
                        $gia = $_POST['gia_' . $id];
                        $hinh = $monan['hinh'];
                        $ten = $monan['ten'];
                        $mon_an_id = $id;

                        if ($so_luong > 0) {
                            insert_datban($ten_kh, $email, $sdt, $so_nguoi, $thoi_gian_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id);
                            $thanh_tien = $gia * $so_luong;
                            $tong_tien += $thanh_tien;

                            $hinh_ma = "uploads/" . $hinh;

                            $themvaogiohang = [
                                'hinh' => $hinh_ma,
                                'ten' => $ten,
                                'gia' => $gia,
                                'so_luong' => $so_luong,
                                'thoi_gian_dat_ban' => $thoi_gian_dat_ban,
                                'so_nguoi' => $so_nguoi,
                                'ghi_chu' => $ghi_chu,
                                'ten_kh' => $ten_kh,
                                'email' => $email,
                                'sdt' => $sdt,
                                'id' => $id,
                                'mon_an_id' => $mon_an_id
                            ];

                            $_SESSION['mycart'][] = $themvaogiohang;


                            // Lưu thông tin vào session
                            $selectedItems = [
                                'id' => $id,
                                'ten_kh' => $ten_kh,
                                'email' => $email,
                                'sdt' => $sdt,
                                'so_nguoi' => $so_nguoi,
                                'thoi_gian_dat_ban' => $thoi_gian_dat_ban,
                                'ghi_chu' => $ghi_chu,
                                'tong_tien' => $tong_tien
                            ];
                            $_SESSION['info_datban'] = $selectedItems;
                        }
                    }

                    echo '<script>alert("Điền thông tin và chọn món thành công, sẽ chuyển đến trang thanh toán")</script>';
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "index.php?act=thongtindatban";
                            }, 0);
                        </script>';
                }
            }

            include 'pages/formdatban.php';
            include 'view/footer.php';
            break;

        case 'xoagiohang':
            if (isset($_GET['idgiohang'])) {
                $idgiohang = $_GET['idgiohang'];
                if (isset($_SESSION['mycart'][$idgiohang])) {
                    unset($_SESSION['mycart'][$idgiohang]); // Xóa sản phẩm khỏi giỏ hàng
                    $_SESSION['mycart'] = array_values($_SESSION['mycart']); // Cập nhật lại chỉ số của mảng
                }
            } else {
                $_SESSION['mycart'] = [];
            }

            header('Location: index.php?act=thongtindatban');
            exit();
            break;




        case "thongtindatban":
            include "view/header.php";
            include "view/nav.php";
            include "view/margintop.php";

            // Gọi hàm $_SESSION['info_datban'] ra để lấy thông tin 
            $infor_datban = $_SESSION['info_datban'];

            // Kiểm tra xem có tồn tại giá trị của ten_kh và thoi_gian_dat_ban không
            $ten_kh = $infor_datban['ten_kh'];
            $thoi_gian_dat_ban = $infor_datban['thoi_gian_dat_ban'];

            // Kiểm tra nếu cả hai giá trị đều tồn tại trước khi gọi hàm
            if ($ten_kh !== null && $thoi_gian_dat_ban !== null) {
                $lay_id_dat_ban = lay_id_datban_moi_nhat($ten_kh, $thoi_gian_dat_ban);

                // Lưu dat_ban_id vào Session nếu có giá trị
                if (!empty($lay_id_dat_ban)) {
                    $_SESSION['dat_ban_id'] = $lay_id_dat_ban;
                } else {
                    // Xử lý nếu dat_ban_id không tồn tại (có thể hiển thị thông báo hoặc điều hướng người dùng)
                    echo "Không thể xác định đặt bàn. Vui lòng thử lại.";
                }
            } else {
                // Xử lý nếu giá trị không tồn tại (có thể hiển thị thông báo hoặc điều hướng người dùng)
                echo "Giỏ hàng trống. Vui lòng chọn món ăn để thanh toán.";
            }

            include "pages/thongtindatban.php";
            include "view/footer.php";
            break;




        case 'thanhtoan':
            include "view/header.php";
            include "view/nav.php";
            include "view/margintop.php";

            if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])) {
                if (isset($_SESSION["email"])) {
                    $khach_hang_id = $_SESSION["email"]['id'];
                } else {
                    $khach_hang_id = 0;
                }

                $dat_ban_id = isset($_SESSION['dat_ban_id']) ? $_SESSION['dat_ban_id'] : null;
                $ten_kh = $_POST['ten_kh'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $so_nguoi = $_POST['so_nguoi'];
                $thoi_gian_dat_ban = $_POST['thoi_gian_dat_ban'];
                $ghi_chu = $_POST['ghi_chu'];
                $phuong_thuc = isset($_POST['phuong_thuc']) ? intval($_POST['phuong_thuc']) : 1;
                $phuong_thuc = ($phuong_thuc >= 1 && $phuong_thuc <= 2) ? $phuong_thuc : 1;
                $phuong_thuc = isset($_POST['phuong_thuc']) ? intval($_POST['phuong_thuc']) : null;

                if (empty($phuong_thuc)) {
                    // Người dùng không chọn phương thức thanh toán
                    $_SESSION['error_phuong_thuc']['phuong_thuc']['invalid'] = 'Vui lòng chọn phương thức thanh toán!';
                    $check = 0;
                    echo '<script>window.location.href = "index.php?act=thongtindatban";</script>';
                }


                // Check if the total amount is greater than 0
                $tong_tien = tongdonhang();
                if ($tong_tien > 0) {
                    $ngay_thanh_toan = date('Y-m-d H:i:s');

                    // Proceed with payment processing
                    insert_thanhtoan($ten_kh, $email, $sdt, $thoi_gian_dat_ban, $ghi_chu, $so_nguoi, $phuong_thuc, $tong_tien, $ngay_thanh_toan, $dat_ban_id, $khach_hang_id);

                    // Clear the dat_ban_id from session after successful payment
                    unset($_SESSION['dat_ban_id']);

                    echo '<script>alert("Đặt bàn thành công! Sau đây là trang xem lại đơn đặt hàng, cám ơn vì đã sử dụng dịch vụ")</script>';
                    echo '<script>
                setTimeout(function() {
                    window.location.href = "index.php?act=cam_on";
                }, 0);
            </script>';
                } else {
                    // Display a message if the total amount is empty
                    echo '<script>alert("Bạn chưa chọn món để thanh toán. Vui lòng quay lại chọn món!")</script>';
                    echo '<script>

                    window.location.href = "index.php?act=datbanngay"; // Redirect to the appropriate page

            </script>';
                }
            }

            include "./pages/hoa_don.php";
            include "view/footer.php";
            break;


        case "cam_on":
            include "view/header.php";
            include "view/nav.php";
            include "view/margintop.php";
            include "./pages/hoa_don.php";
            $_SESSION['mycart'] = [];
            include "view/margintop.php";
            break;
        case "don_hang_da_dat":
            $danh_sach_don_hang_da_dat = loadall_don_hang_da_dat($_SESSION["email"]['id']);
            include "view/header.php";
            include "view/nav.php";
            include "view/margintop.php";
            include "./pages/don_hang_da_dat.php";
            include "view/footer.php";
            break;

        case "in_hoa_don":
            // Kiểm tra xem có ID được truyền qua POST không
            if (isset($_GET['id_hoa_don']) && $_GET['id_hoa_don']) {

                $id_hoa_don = $_GET['id_hoa_don'];

                // Gọi hàm để load thông tin đơn hàng theo ID
                $danh_sach_don_hang_da_dat = loadall_don_hang_da_dat($_SESSION['email']['id']);

                if ($danh_sach_don_hang_da_dat) {
                    include "view/header.php";
                    include "view/nav.php";
                    include "view/margintop.php";
                    loadone_id_datban($id_hoa_don);
                    include "pages/in_hoa_don.php";
                } else {
                    echo "Không có đơn hàng nào.";
                }
            } else {
                echo "Không có ID đơn hàng được cung cấp.";
            }
            break;








        case "thoat":
            session_unset();
            header("Location:index.php?act=trangchu");

            break;



        case 'updatepw':
            include "view/header.php";
            include "view/nav.php";
            if (isset($_POST['update']) && ($_POST['update'])) {
                $email = $_POST['email'];
                $mat_khau1 = $_POST['mat_khau_1'];
                $mat_khau = $_POST['mat_khau'];
                $rpass = $_POST['rpass'];
                $check = 1;

                if (empty($mat_khau1)) {
                    $_SESSION['error']['mat_khau_1']['not_empty'] = 'Mật khẩu không được để trống';
                    $check = 0;
                }

                // Check if new password is empty
                if (empty($mat_khau)) {
                    $_SESSION['error']['mat_khau'] = 'Mật khẩu không được để trống';
                    $check = 0;
                } else if (strlen($mat_khau) < 8) {
                    $_SESSION['error']['mat_khau'] = 'Mật khẩu phải có ít nhất 8 ký tự';
                    $check = 0;
                } else {
                    // Hash the new password
                    $pass_hash = password_hash($mat_khau, PASSWORD_DEFAULT);
                }

                // Check if retyped password is empty
                if (empty($rpass)) {
                    $_SESSION['error']['rpass'] = 'Vui lòng nhập lại mật khẩu';
                    $check = 0;
                } else {
                    // Verify if retyped password matches the new password
                    if (!password_verify($rpass, $pass_hash)) {
                        $_SESSION['error']['rpass'] = 'Mật khẩu không trùng khớp';
                        $check = 0;
                    }
                }

                // Update password if all checks pass
                if ($check == 1) {
                    // Check if email exists in the database
                    $check_email_pass = check_email_validate($email);

                    if (is_array($check_email_pass)) {
                        // Verify if current password matches the stored password
                        $pass_check = password_verify($mat_khau1, $check_email_pass['mat_khau']);

                        if ($pass_check == true) {
                            // Update the password in the database
                            update_password($email, $pass_hash);

                            // Set session variable to indicate successful password update
                            $_SESSION['update_success'] = true;

                            // Redirect to the homepage with success message
                            echo '<script>alert("Cập nhật mật khẩu thành công")</script>';
                            echo '<script>
                          setTimeout(function() {
                              window.location.href = "index.php?act=trangchu";
                          }, 0);
                      </script>';
                            exit();
                        } else {
                            $_SESSION['error']['mat_khau_1']['dinhdang'] = 'Mật khẩu hiện tại không chính xác';
                        }
                    }
                }
            }

            // update_password($email, $mat_khau);

            include 'pages/account/update_pw.php';
            include "view/footer.php";
            break;

        default:
            include "view/header.php";
            include "view/nav.php";
            include "view/slider.php";
            include "view/giamgiatrongtuan.php";
            include "view/home.php";
            include "view/footer.php";
            break;
    }
} else {
    include "view/header.php";
    include "view/nav.php";
    include "view/slider.php";
    include "view/giamgiatrongtuan.php";
    include "view/home.php";
    include "view/footer.php";
}