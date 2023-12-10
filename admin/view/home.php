<div class="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <?php foreach ($listthongketk as $thongketk) {
                    extract($thongketk); ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Tài khoản khách hàng</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white stretched-link " href="#">Số tài khoản:
                                    <?= $count_tk ?>
                                </p>


                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="index.php?act=dskh" class="small text-white stretched-link">Xem Chi tiết</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php foreach ($listthongkedb as $thongkedb) {
                    extract($thongkedb); ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Số lượng đơn hàng</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white stretched-link " href="#">Số đơn hàng:
                                    <?= $count_db ?>
                                </p>


                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="index.php?act=ds_dat_ban" class="small text-white stretched-link">Xem Chi tiết</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php foreach ($listthongkedb as $thongkedbtc) {
                    extract($thongkedbtc);
                    $count = getCountOrders();
                    ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">Số lượng đơn đặt thành công</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white stretched-link " href="#">Số đơn đặt thành công:
                                    <?= $count ?>
                                </p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="index.php?act=ds_dat_ban" class="small text-white stretched-link">Xem Chi tiết</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php foreach ($listthongkedb as $thongkedbdh) {
                    extract($thongkedbdh);

                    // Assuming you have a variable $count_canceled containing the total number of canceled orders
                    $count_canceled = getCountCanceledOrders(); // Replace this with your actual data
                    ?>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Số lượng đơn đã hủy</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="small text-white stretched-link">Số đơn đặt đã hủy:
                                    <?= $count_canceled ?>
                                </p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a href="index.php?act=ds_dat_ban" class="small text-white stretched-link">Xem Chi tiết</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Thống kê đơn đặt theo 7 ngày
                        </div>
                        <div class="card-body">
                            <div id="areaChart">

                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <script type="text/javascript">
                                    google.charts.load('current', {
                                        'packages': ['corechart']
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Ngày', 'Số lượng đơn đặt bàn'],
                                            <?php

                                            $listdatban = getdatban_thanhtoan_limit(0, 7);

                                            if (is_array($listdatban) && !empty($listdatban)) {

                                                foreach ($listdatban as $dat_ban) {
                                                    extract($dat_ban);
                                                    $thoi_gian_dat_ban = date('d/m/Y', strtotime($dat_ban['thoi_gian_dat_ban']));

                                                    echo "['" . $thoi_gian_dat_ban . "'," . $dat_ban['id'] . "],";
                                                }
                                            }
                                            ?>
                                        ]);

                                        var options = {
                                            title: 'Biểu đồ đơn đặt bàn theo ngày',
                                            curveType: 'function',
                                            legend: {
                                                position: 'bottom'
                                            },
                                            width: 940,
                                            height: 380
                                        };

                                        var chart = new google.visualization.AreaChart(document.getElementById(
                                            'areaChart'));
                                        chart.draw(data, options);
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 col-xl-6">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Thống kê món ăn
                </div>
                <div class="card-body">



                    <div id="piechart">
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                        <script type="text/javascript">
                            // Load google charts
                            google.charts.load('current', {
                                'packages': ['corechart']
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            // Draw the chart and set the chart values
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Danh mục', 'Số lượng sản phẩm'],
                                    <?php
                                    $tongdm = count($listthongke);
                                    $i = 1;
                                    foreach ($listthongke as $thongke) {
                                        extract($thongke);
                                        if ($i == $tongdm)
                                            $dauphay = "";
                                        else
                                            $dauphay = ",";
                                        echo "  ['" . $thongke['ten_dm'] . "'," . $thongke['count_ma'] . "]" . $dauphay;
                                        $i += 1;
                                    }
                                    ?>

                                ]);

                                // Optional; add a title and set the width and height of the chart
                                var options = {
                                    'title': 'Biểu đồ món ăn theo danh mục',
                                    'width': 450,
                                    'height': 350
                                };

                                // Display the chart inside the <div> element with id="piechart"
                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                chart.draw(data, options);
                            }
                        </script>
                    </div>


                </div>
            </div>
        </div>


    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted"><span class="text-ft">Fasty Food</span> - Copyright &copy; 2023 All Rights
                    Reserved.</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>