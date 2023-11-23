<div class="wrapper">
    <form action="index.php?act=reset" method="post" class="fc-reset">
        <h2>Đổi mật khẩu</h2>
        <div class="form-group">

            <input type="password" id="mat_khau" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" name="mat_khau" placeholder="Nhập mật khẩu mới">
            <div class="thongbao mt-2">
                <span>
                    <?php echo (isset($_SESSION['error']['mat_khau'])) ? $_SESSION['error']['mat_khau'] : '' ?>
                </span>
            </div>
            <div class="icon_eye" id="show-password">
                <ion-icon name="eye-off-outline" class="eye-close md hydrated"></ion-icon>
                <ion-icon name="eye-outline" class="eye-open md hydrated hidden"></ion-icon>
            </div>
        </div>
        <div class="form-group">
            <input type="password" id="rpass" class="form-control" id="exampleInputPassword1" name="rpass"
                placeholder="Xác nhận mật khẩu">
            <div class="thongbao mt-2">
                <span>
                    <?php echo (isset($_SESSION['error']['rpass'])) ? $_SESSION['error']['rpass'] : '' ?>
                </span>
            </div>
            <div class="icon_eye" id="show-rpassword">
                <ion-icon name="eye-off-outline" class="eye-close1 md hydrated"></ion-icon>
                <ion-icon name="eye-outline" class="eye-open1 md hydrated hidden"></ion-icon>
            </div>
        </div>



        <div class="input-group float-end mb-3">
            <input type="submit" class="form-control" value="Cập Nhật" name="reset" id="reset">
        </div>
    </form>
</div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    const password = document.querySelector('#mat_khau');
    const rpassword = document.querySelector('#rpass');
    const eyeOpen = document.querySelector('.eye-open');
    const eyeClose = document.querySelector('.eye-close');
    const eyeOpen1 = document.querySelector('.eye-open1');
    const eyeClose1 = document.querySelector('.eye-close1');

    eyeOpen.addEventListener('click', function () {
        eyeOpen.classList.add('hidden');
        eyeClose.classList.remove('hidden');
        password.setAttribute("type", "password");

    });
    eyeClose.addEventListener('click', function () {
        eyeOpen.classList.remove('hidden');
        eyeClose.classList.add('hidden');
        password.setAttribute("type", "text");

    });
    eyeOpen1.addEventListener('click', function () {
        eyeOpen1.classList.add('hidden');
        eyeClose1.classList.remove('hidden');
        rpassword.setAttribute("type", "password");

    });
    eyeClose1.addEventListener('click', function () {
        eyeOpen1.classList.remove('hidden');
        eyeClose1.classList.add('hidden');
        rpassword.setAttribute("type", "text");

    });
</script>