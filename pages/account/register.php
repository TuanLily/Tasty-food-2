<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TastyFood - Đăng ký</title>
    <link rel="stylesheet" href="./extentions/css/style_login.css">
    <link rel="icon" href="./extentions/images/f7.png" type="image/x-icon">

</head>

<body>

    <div class="wrapper">


        <form action="index.php?act=dangky" method="post">
            <div class="style_text">
                <a href="index.php?act=trangchu"><span> Tasty Food </span></a>
            </div>

            <h2>Đăng Ký</h2>

            <div class="form-group">
                <div class="icon">
                    <ion-icon name="person"></ion-icon>
                </div>
                <input id="ten" name="ten" type="text" placeholder="Nhập tên người dùng" class="form-control">
                <div class="thongbao">
                    <?php echo (isset($_SESSION['error']['ten'])) ? $_SESSION['error']['ten'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <div class="icon">
                    <ion-icon name="mail-outline"></ion-icon>
                </div>
                <input id="email" name="email" type="email" placeholder="Nhập Email" class="form-control">
                <div class="thongbao">
                    <?php echo (isset($_SESSION['error']['email'])) ? $_SESSION['error']['email'] : '' ?>
                </div>

            </div>
            <div class="form-group">
                <div class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </div>
                <input id="mat_khau" name="mat_khau" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <div class="thongbao">
                    <?php echo (isset($_SESSION['error']['mat_khau'])) ? $_SESSION['error']['mat_khau'] : '' ?>
                </div>
                <div class="icon_eye" id="show-password">
                    <ion-icon name="eye-off-outline" class="eye-close md hydrated"></ion-icon>
                    <ion-icon name="eye-outline" class="eye-open md hydrated hidden"></ion-icon>
                </div>
            </div>

            <div class="form-group">
                <span class="icon">
                    <ion-icon name="lock-closed"></ion-icon>
                </span>
                <input id="rpass" name="rpass" type="password" placeholder="Nhập lại mật khẩu" class="form-control"
                    minlength="3">
                <span class="thongbao">
                    <?php echo (isset($_SESSION['error']['rpass'])) ? $_SESSION['error']['rpass'] : '' ?>
                </span>
                <div class="icon_eye" id="show-rpassword">
                    <ion-icon name="eye-off-outline" class="eye-close1 md hydrated"></ion-icon>
                    <ion-icon name="eye-outline" class="eye-open1 md hydrated hidden"></ion-icon>
                </div>
            </div>


            <input type="submit" value="Đăng ký" name="dangky" class="dangky">
            <div class="sign">
                <p>bạn đã có tài khoản?<a href="index.php?act=dangnhap">Đăng nhập</a></p>
            </div>
        </form>
        <?php
        if (isset($thongbao) && ($thongbao)) {
            echo $thongbao;
        }
        ?>
    </div>
    <script>
    const password = document.querySelector('#mat_khau');
    const rpassword = document.querySelector('#rpass');
    const eyeOpen = document.querySelector('.eye-open');
    const eyeClose = document.querySelector('.eye-close');
    const eyeOpen1 = document.querySelector('.eye-open1');
    const eyeClose1 = document.querySelector('.eye-close1');

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
    eyeOpen1.addEventListener('click', function() {
        eyeOpen1.classList.add('hidden');
        eyeClose1.classList.remove('hidden');
        rpassword.setAttribute("type", "password");

    });
    eyeClose1.addEventListener('click', function() {
        eyeOpen1.classList.remove('hidden');
        eyeClose1.classList.add('hidden');
        rpassword.setAttribute("type", "text");

    });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>