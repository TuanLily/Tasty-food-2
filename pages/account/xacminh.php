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
        <form action="index.php?act=xacminh" method="post">
            <div class="style_text">
                <a href="index.php?act=trangchu"><span > Tasty Food </span></a>
            </div>
            

            <h2>MÃ XÁC MINH</h2>

            <div class="form-group">
                <span class="icon" style="margin-top: 12px">
                    <ion-icon name="mail-outline"></ion-icon>
                </span>
                <input type="text" placeholder="Nhập mã xác minh" name="maxacminh" class="form-control">
                <span class="thongbao">
                    <?php echo (isset($_SESSION['error']['maxacminh'])) ? $_SESSION['error']['maxacminh'] : '' ?>
                </span>

            </div>
            <input type="submit" value="Xác nhận" name="xacminh" class="xacminh">
        </form>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>