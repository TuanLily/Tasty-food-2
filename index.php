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
include 'dao/monan.php';
include "dao/taikhoan.php";

$mail = new Mailer();

$show_monan = loadall_monan_home();

// Gọi hàm kiểm tra đăng nhập tự động
if (autoLoginIfRemembered()) {
    // Người dùng đã đăng nhập tự động, bạn có thể thực hiện các hành động liên quan ở đây
    header('Location: index.php?act=trangchu');
    exit();
}
include "view/header.php";

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
            $dsma = loadall_monan($keyw, $danh_muc_id);
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

            $dsma = loadall_monan($keyw, $danh_muc_id);

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
            session_unset();
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
            session_unset();
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

            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {

                $ten = $_POST['ten'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $id = $_POST['id'];
                $phonePattern = '/^(84|0[3|5|7|8|9])+([0-9]{8})\b$/'; // Đã thêm dấu / ở đầu và cuối để biểu thức chính quy

                $check = 1;

                if (empty($ten)) {
                    $_SESSION['error']['ten'] = 'Không được để trống';
                    $check = 0;
                }

                if (empty($email)) {
                    $_SESSION['error']['email'] = 'Không được để trống';
                    $check = 0;
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['error']['email'] = 'Email không đúng định dạng';
                    $check = 0;
                }


    case 'datbanngay':
      session_unset();
      if (isset($_POST['datbanngay']) && $_POST['datbanngay']) {
        $ten_kh = $_POST['ten_kh'];
        $email = $_POST['email'];
        $sdt = $_POST['sdt'];
        $so_nguoi = $_POST['so_nguoi'];
        $thoi_gian_dat_ban = $_POST['thoi_gian_dat_ban'];
        $ghi_chu = $_POST['ghi_chu'];
        $check = 1;


        // Kiểm tra trường "Họ và tên"
        if (empty($ten_kh)) {
          $_SESSION['error']['ten_kh']['invalid'] = 'Không được để trống';
          $check = 0;
        } elseif (strlen($ten_kh) > 30) {
          $_SESSION['error']['ten_kh']['dinhdang'] = 'Không quá 30 ký tự';
          $check = 0;
        }

        // Kiểm tra trường "Email"
        if (empty($email)) {
          $_SESSION['error']['email']['invalid'] = 'Không được để trống';
          $check = 0;
        } elseif (!preg_match("/^[\w\-]+(\.[\w\-]+)*@[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,})$/", $email)) {
          $_SESSION['error']['email']['dinhdang'] = 'Không đúng dịnh dạng email';
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

        if ($check == 1) {
          $listmonan = loadall_monan();
          $selectedItems = array(); // Mảng chứa thông tin về các món ăn được chọn

          foreach ($listmonan as $monan) {
            $hinh_ma = "uploads/" . $monan['hinh'];
            $id = $monan['id'];
            $so_luong = $_POST['so_luong' . $id];
            $gia = $_POST['gia_' . $id];
            $hinh = $monan['hinh'];
            $ten = $monan['ten'];
            $mon_an_id = $id;

            if ($so_luong > 0) {
              insert_datban($ten_kh, $email, $sdt, $so_nguoi, $thoi_gian_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id);

              // Lưu thông tin về món ăn được chọn vào mảng $selectedItems
              $selectedItems[] = array(
                'hinh' => $hinh_ma,
                'ten' => $ten,
                'gia' => $gia,
                'so_luong' => $so_luong,
                'thanh_tien' => $gia * $so_luong
              );
            }
          }
        }

        // Tính tổng thành tiền
        $totalPrice = 0;
        foreach ($selectedItems as $item) {
          $totalPrice += $item['thanh_tien'];
        }

        // Cấu hình hiển thị lỗi (chỉ sử dụng trong quá trình phát triển)
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
      }
      if (!empty($_SESSION['error'])) {
        include "./pages/formdatban.php";
      } else {
        include "view/margintop.php";
        include "./pages/thongtindatban.php";
      }


      // Hiển thị biểu mẫu sau khi đặt bàn thành công hoặc có lỗi
      include "view/header.php";
      include "view/nav.php";
      include "view/margintop.php";





      include "view/footer.php";
      break;

                if (empty($sdt)) {
                    $_SESSION['error']['sdt'] = 'Không được để trống';
                    $check = 0;
                } else if (!preg_match($phonePattern, $sdt)) { // Sử dụng preg_match để so khớp với biểu thức chính quy
                    $_SESSION['error']['sdt'] = 'Không đúng định dạng số điện thoại';
                    $check = 0;
                }

                if ($check == 1) {
                    capnhat_taikhoan_kh($id, $ten, $email, $sdt);
                    echo '<script>alert("Cập nhật thành công thành công")</script>';
                    echo '<script>
                              setTimeout(function() {
                                  window.location.href = "index.php?act=trangchu";
                              }, 0);
                          </script>';
                }
            }

            include "view/header.php";
            include "view/nav.php";
            include 'pages/account/update.php';
            include "view/footer.php";
            break;

        case "thoat":
            session_unset();
            header("Location:index.php?act=trangchu");

            break;

        case 'datbanngay':
            include "view/header.php";
            include "view/nav.php";

            if (isset($_POST['datbanngay']) && $_POST['datbanngay']) {
                $ten_kh = $_POST['ten_kh'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $so_nguoi = $_POST['so_nguoi'];
                $thoi_gian_dat_ban = $_POST['thoi_gian_dat_ban'];
                $ghi_chu = $_POST['ghi_chu'];

                // Lưu thông tin món ăn vào cơ sở dữ liệu
                $listmonan = loadall_monan();
                $pdo = pdo_get_connection();
                $stmt = pdo_prepare($pdo, 'INSERT INTO datban (ten_kh, email, sdt, so_nguoi, thoi_gian_dat_ban, ghi_chu) VALUES (:ten_kh, :email, :sdt, :so_nguoi, :thoi_gian_dat_ban, :ghi_chu)');

                foreach ($listmonan as $monan) {
                    $id = $monan['id'];
                    $so_luong = isset($_POST['so_luong' . $id]) ? $_POST['so_luong' . $id] : 0;
                    $gia = $monan['gia'];
                    $hinh = $monan['hinh'];
                    $ten = $monan['ten'];
                    $mon_an_id = $id;

                    if ($so_luong > 0) {
                        insert_datban($ten_kh, $email, $sdt, $so_nguoi, $thoi_gian_dat_ban, $ghi_chu, $so_luong, $gia, $hinh, $ten, $mon_an_id);
                    }
                }
            }

            // Hiển thị biểu mẫu sau khi đặt bàn thành công
            include "./pages/formdatban.php";
            include "view/footer.php";
            break;

        case 'updatepw':

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
            include "view/header.php";
            include "view/nav.php";
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