<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TastyFood - Đăng nhập</title>
    <link rel="stylesheet" href="./extentions/css/style_login.css">
    <link rel="icon" href="./extentions/images/f7.png" type="image/x-icon">

</head>

<body>

    <div class="wrapper ">

        <form action="index.php?act=dangnhap" method="post">
            <div class="style_text">
                <a href="index.php?act=trangchu"><span> Tasty Food </span></a>

            </div>

            <h2>Đăng Nhập</h2>

            <div class="form-group">
                <div class="icon">

                    <ion-icon name="mail-outline"></ion-icon>

                </div>

                <input type="text" placeholder="Nhập email" name="email" class="form-control">
                <div class="thongbao">
                    <?php echo (isset($_SESSION['error']['email'])) ? $_SESSION['error']['email'] : '' ?>
                </div>

            </div>
            <div class="form-group">
                <div class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </div>
                <input type="password" placeholder="Nhập mật khẩu" id="mat_khau" name="mat_khau" class="form-control"
                    minlength="3">
                <div class="thongbao">
                    <?php echo (isset($_SESSION['error']['mat_khau'])) ? $_SESSION['error']['mat_khau'] : '' ?>
                </div>
                <div class="icon_eye" id="show-password">
                    <ion-icon name="eye-off-outline" class="eye-close md hydrated"></ion-icon>
                    <ion-icon name="eye-outline" class="eye-open md hydrated hidden"></ion-icon>
                </div>

            </div>

            <div class="forgot-pass">
                <input type="checkbox" name="remember_me">
                <label for="">Ghi nhớ</label>
                <a href="index.php?act=quenmatkhau">Quên mật khẩu?</a>
            </div>


            <input type="submit" value="Đăng nhập" name="dangnhap" class="dangnhap">
            <div class="sign">
                <p>bạn chưa có tài khoản<a href="index.php?act=dangky">Đăng Ký</a></p>
            </div>
        </form>
    </div>

    <script>
    const password = document.querySelector('#mat_khau');
    const eyeOpen = document.querySelector('.eye-open');
    const eyeClose = document.querySelector('.eye-close');

    eyeOpen.addEventListener('click', function() {
        eyeOpen.classList.add('hidden');
        eyeClose.classList.remove('hidden');
        password.setAttribute("type", "password");

    });
    eyeClose.addEventListener('click', function() {
        eyeOpen.classList.remove('hidden');
        eyeClose.classList.add('hidden');
        password.setAttribute("type", "text");

    });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>