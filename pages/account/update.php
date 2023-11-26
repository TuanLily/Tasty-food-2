<section class="food_section layout_padding">
    <div class="container">
        <div class="khungcapnhattaikhoan">
            <h1 class="form-title">Cập nhật tài khoản</h1>
            <form action="index.php?act=update" method="post">
                <?php
                if (isset($_SESSION['email']) && ($_SESSION['email'])) {
                    extract($_SESSION['email']);

                }
                ?>
                <div class="form-group-capnhattaikhoan">
                    <label for="name">Họ và tên:</label>
                    <input type="text" id="ten" name="ho_ten" value="<?= $ho_ten ?>" />
                    <div class="thongbao">
                        <?php echo (isset($_SESSION['error']['ho_ten'])) ? $_SESSION['error']['ho_ten'] : '' ?>
                    </div>
                </div>

                <div class="form-group-capnhattaikhoan">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= $email ?>" />
                    <div class="thongbao">
                        <?php echo (isset($_SESSION['error']['email'])) ? $_SESSION['error']['email'] : '' ?>
                    </div>
                </div>

                <div class="form-group-capnhattaikhoan">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="sdt" name="sdt" value="<?= $sdt ?>" />
                    <div class="thongbao">
                        <?php echo (isset($_SESSION['error']['sdt'])) ? $_SESSION['error']['sdt'] : '' ?>
                    </div>
                </div>



                <div class="form-group-capnhattaikhoan">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="submit" name="capnhat" value="Cập nhật">
                </div>
            </form>
        </div>
    </div>
</section>