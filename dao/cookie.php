<?php

function autoLoginIfRemembered()
{
    if (!isset($_SESSION['email']) && isset($_COOKIE['remember_me'])) {
        // Giải mã thông tin từ cookie
        $credentials = explode(':', base64_decode($_COOKIE['remember_me']));

        // Lấy thông tin đăng nhập từ cơ sở dữ liệu hoặc bất kỳ nguồn dữ liệu nào khác
        $email = $credentials[0];
        $password = $credentials[1];

        // Kiểm tra thông tin đăng nhập
        $user = check_email_validate($email);
        if ($user && password_verify($password, $user['mat_khau'])) {
            $_SESSION['email'] = $user;
            // Đăng nhập thành công
        } else {
            // Xóa cookie nếu thông tin không hợp lệ
            setcookie('remember_me', '', time() - 3600, '/');
        }
    }
}

?>