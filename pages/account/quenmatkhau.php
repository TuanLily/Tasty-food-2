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

    <div class="wrapper">
        <form action="index.php?act=quenmatkhau" method="post">
    <div class="style_text">
        <a href="index.php?act=trangchu"><span > Tasty Food </span></a>
    </div>
            

            <h2>Quên mật khẩu</h2>

            <div class="form-group">
                <div class="icon">
                    <ion-icon name="mail-outline"></ion-icon>
                </div>
                <input type="email" placeholder="Nhập email" name="email" class="form-control">
                <div class="thongbao">
                    <?php echo (isset($_SESSION['error']['email'])) ? $_SESSION['error']['email'] : '' ?>
                </div>

            </div>
            <input type="submit" value="Nhận mã xác minh" name="guiemail" class="guiemail">
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>