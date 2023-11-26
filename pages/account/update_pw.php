<div class="wrapper">
    <form action="index.php?act=updatepw" method="post" class="fc-reset">
        <h2>Đổi mật khẩu</h2>
        <?php
                        
                        if(isset($_SESSION['id']) && ($_SESSION['id'])){
                          extract($_SESSION['id']);
                          
                        }
                        ?>
        <input type="hidden" name="email" value="<?= $email?>">
        <div class="form-group">

            <input type="password" id="mat_khau_1" class="form-control" aria-describedby="emailHelp" name="mat_khau_1"
                placeholder="Nhập mật khẩu cũ">
            <div class="thongbao mt-2">

                <?php

                if (isset($_SESSION['error']['mat_khau_1']) && $_SESSION['error']['mat_khau_1'] != "") {
                    if (isset($_SESSION['error']['mat_khau_1']['not_empty'])) {
                        echo $_SESSION['error']['mat_khau_1']['not_empty'];
                        unset($_SESSION['error']['mat_khau_1']);
                    }

                    if (isset($_SESSION['error']['mat_khau_1']['dinhdang'])) {
                        echo $_SESSION['error']['mat_khau_1']['dinhdang'];
                        unset($_SESSION['error']['mat_khau_1']);
                    }
                } else {
                    unset($_SESSION['error']['mat_khau_1']);
                }
                ?>
            </div>
            <div class="icon_eye" id="show-password">
                <ion-icon name="eye-off-outline" class="eye-close2 md hydrated"></ion-icon>
                <ion-icon name="eye-outline" class="eye-open2 md hydrated hidden"></ion-icon>
            </div>
        </div>
        <div class="form-group">

            <input type="password" id="mat_khau" class="form-control" aria-describedby="emailHelp" name="mat_khau"
                placeholder="Nhập mật khẩu mới">
            <div class="thongbao mt-2">

                <?php echo (isset($_SESSION['error']['mat_khau'])) ? $_SESSION['error']['mat_khau'] : '' ?>

            </div>
            <div class="icon_eye" id="show-password">
                <ion-icon name="eye-off-outline" class="eye-close md hydrated"></ion-icon>
                <ion-icon name="eye-outline" class="eye-open md hydrated hidden"></ion-icon>
            </div>
        </div>
        <div class="form-group">
            <input type="password" id="rpass" class="form-control" name="rpass" placeholder="Xác nhận mật khẩu">
            <div class="thongbao mt-2">
                <div>
                    <?php echo (isset($_SESSION['error']['rpass'])) ? $_SESSION['error']['rpass'] : '' ?>
                </div>
            </div>
            <div class="icon_eye" id="show-rpassword">
                <ion-icon name="eye-off-outline" class="eye-close1 md hydrated"></ion-icon>
                <ion-icon name="eye-outline" class="eye-open1 md hydrated hidden"></ion-icon>
            </div>
        </div>



        <div class="input-group float-end mb-3">
            <input type="submit" class="form-control submit" value="Cập Nhật" name="update" id="update">
        </div>
    </form>
</div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
const password = document.querySelector('#mat_khau');
const rpassword = document.querySelector('#rpass');
const password_old = document.querySelector('#mat_khau_1');
const eyeOpen = document.querySelector('.eye-open');
const eyeClose = document.querySelector('.eye-close');
const eyeOpen1 = document.querySelector('.eye-open1');
const eyeClose1 = document.querySelector('.eye-close1');
const eyeOpen2 = document.querySelector('.eye-open2');
const eyeClose2 = document.querySelector('.eye-close2');

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
eyeOpen2.addEventListener('click', function() {
    eyeOpen2.classList.add('hidden');
    eyeClose2.classList.remove('hidden');
    mat_khau_1.setAttribute("type", "password");

});
eyeClose2.addEventListener('click', function() {
    eyeOpen2.classList.remove('hidden');
    eyeClose2.classList.add('hidden');
    mat_khau_1.setAttribute("type", "text");

});
</script>