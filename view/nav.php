<body>
    <?php
    // Lấy đường dẫn hiện tại
    $current_url = $_SERVER['REQUEST_URI'];

    // Kiểm tra đường dẫn và thêm lớp active tương ứng
    function is_active($page)
    {
        global $current_url;
        return strpos($current_url, $page) !== false;
    }
    ?>

    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="index.php?act=trangchu">
                    <span> Tasty Food </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item <?php echo is_active('act=trangchu') ? 'active' : ''; ?>">
                            <a class="nav-link" href="index.php?act=trangchu">Trang chủ <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item <?php echo is_active('act=monan') ? 'active' : ''; ?>">
                            <a class="nav-link" href="index.php?act=monan">Thực Đơn</a>
                        </li>
                        <li class="nav-item <?php echo is_active('act=gioithieu') ? 'active' : ''; ?>">
                            <a class="nav-link" href="index.php?act=gioithieu">Giới thiệu</a>
                        </li>
                        <li class="nav-item <?php echo is_active('act=lienhe') ? 'active' : ''; ?>">
                            <a class="nav-link" href="index.php?act=lienhe">Liên hệ</a>
                        </li>
                    </ul>
                    <div class="user_option">
                        <!-- Button trigger modal -->
                        <form class="form-inline">
                            <button type="button" class="btn my-2 my-sm-0 nav_search-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            Tìm kiếm
                                        </h1>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="d-flex" action="index.php?act=trangchu" method="GET">
                                            <input class="form-control me-2" type="text" placeholder="Bạn muốn ăn gì?"
                                                aria-label="text" name="keyw" />
                                            <input type="hidden" name="act" value="search">
                                            <button type="submit" class="btn btn-outline-warning" name="timkiem"><i
                                                    class="fa-solid fa-magnifying-glass"></i></button>
                                            <!-- <input type="submit" class="btn btn-outline-warning" value="Tìm kiếm"
                                                name="timkiem"> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                        // var_dump($_SESSION['email']);
                        if (isset($_SESSION['email'])) {
                            extract($_SESSION['email']);

                            ?>

                            <div class="dropdown">
                                <div class="user_kh"><a href="">Xin chào,
                                        <?= $ten ?><ion-icon name="caret-down-outline">
                                        </ion-icon>
                                    </a></div>
                                <div class="dropdown-content">
                                    <a href="index.php?act=update">Cập nhật tài khoản</a>
                                    <a href="index.php?act=xemgiohang">Giỏ hàng</a>
                                    <a href="index.php?act=don_hang_da_dat">Lịch sử đơn hàng</a>
                                    <a href="index.php?act=updatepw">Đổi mật khẩu</a>

                                    <?php
                                    if ($vai_tro == 0) {
                                        ?>
                                        <a href="admin/index.php">Đăng nhập admin</a>
                                    <?php } ?>

                                    <a href="index.php?act=thoat">Đăng xuất</a>

                                </div>
                            </div>

                            <?php
                        } else {


                            ?>
                            <a href="index.php?act=dangnhap" class="user_link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <?php
                        }
                        ?>
                        <a href="index.php?act=datbanngay" class="order_online">
                            Đặt bàn Online
                        </a>

                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->