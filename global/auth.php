<?php

// Kiểm tra xem "admin" có trong đường dẫn không
if (strpos($_SERVER['REQUEST_URI'], 'admin') !== false) {
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!isset($_SESSION['email'])) {
        // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
        echo '<script>
                setTimeout(function() {
                    window.location.href = "/index.php?act=dangnhap";
                    alert("Vui lòng đăng nhập tài khoản admin!");
                }, 0);
            </script>';
    } else {
        // Kiểm tra vai trò của người dùng
        if (isset($_SESSION['email']['vai_tro']) && $_SESSION['email']['vai_tro'] != 0) {
            echo '<script>
                    setTimeout(function() {
                        alert("Bạn không được phép truy cập vào trang admin!");
                        window.location.href = "/index.php?act=trangchu";
                    }, 0);
                </script>';
        }
    }
}


?>