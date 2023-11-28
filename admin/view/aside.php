<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Trang chủ</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Chức năng</div>
                    <!-- Bắt đầu chức năng quản lý khách hàng -->
                    <div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#quan_ly_khach_hang" aria-expanded="false"
                            aria-controls="quan_ly_khach_hang">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            Khách Hàng
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="quan_ly_khach_hang" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index.php?act=dskh">Danh Sách</a>
                            </nav>
                        </div>
                    </div>

                    <!-- Kết thúc chức năng quản lý khách hàng -->

                    <!-- Bắt đầu chức năng quản lý danh mục -->
                    <div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#quan_ly_danh_muc" aria-expanded="false" aria-controls="quan_ly_danh_muc">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-list"></i>
                            </div>
                            Danh Mục
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="quan_ly_danh_muc" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index.php?act=dsdm&page=1">Danh Sách</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index.php?act=danh_muc_luu_tru&page=1">Lưu Trữ Danh Mục Đã
                                    Xóa</a>
                            </nav>
                        </div>
                    </div>


                    <!-- Kết thúc chức năng quản lý danh mục -->

                    <!-- Bắt đầu chức năng quản lý Món Ăn -->
                    <div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#quan_ly_mon_an" aria-expanded="false" aria-controls="quan_ly_mon_an">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-burger"></i>
                            </div>
                            Món Ăn
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="quan_ly_mon_an" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index.php?act=dsma&page=1">Danh Sách</a>
                            </nav>
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index.php?act=mon_an_luu_tru&page=1">Lưu Trữ Món Ăn Đã
                                    Xóa</a>
                            </nav>
                        </div>
                    </div>
                    <!-- Kết thúc chức năng quản lý Món Ăn -->

                    <!-- Bắt đầu chức năng quản lý Bàn -->
                    <!-- <div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#quan_ly_ban"
                            aria-expanded="false" aria-controls="quan_ly_ban">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-table"></i>
                            </div>
                            Bàn
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="quan_ly_ban" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index.php?act=dsdh">Danh Sách</a>
                            </nav>
                        </div>
                    </div> -->
                    <!-- Kết thúc chức năng quản lý Bàn -->

                    <!-- Bắt đầu chức năng quản lý Đặt Bàn -->
                    <div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dat_bang"
                            aria-expanded="false" aria-controls="quan_ly_don_hang">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-chair"></i>
                            </div>
                            Đặt Bàn
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="dat_bang" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index.php?act=ds_dat_ban&page=1">Danh Sách</a>
                            </nav>
                        </div>
                    </div>
                    <!-- Kết thúc chức năng quản lý Đặt Bàn -->

                    <!-- Bắt đầu chức năng quản lý Đơn Hàng -->
                    <div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#thong_ke"
                            aria-expanded="false" aria-controls="thong_ke">
                            <div class="sb-nav-link-icon">
                                <i class="fa-solid fa-chart-simple"></i>
                            </div>
                            Thống Kê
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="thong_ke" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Danh Sách</a>
                            </nav>
                        </div>
                    </div>
                    <!-- Kết thúc chức năng quản lý Đơn Hàng -->

                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-columns"></i>
                        </div>
                        Layouts
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="#">Static Navigation</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                aria-controls="pagesCollapseAuth">
                                Authentication
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="login.html">Login</a>
                                    <a class="nav-link" href="register.html">Register</a>
                                    <a class="nav-link" href="password.html">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#pagesCollapseError" aria-expanded="false"
                                aria-controls="pagesCollapseError">
                                Error
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="401.html">401 Page</a>
                                    <a class="nav-link" href="404.html">404 Page</a>
                                    <a class="nav-link" href="500.html">500 Page</a>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Addons</div>
                    <a class="nav-link" href="charts.html">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-chart-area"></i>
                        </div>
                        Charts
                    </a>
                    <a class="nav-link" href="tables.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Tables
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Project as:</div>
                Team 10 New
            </div>
        </nav>
    </div>