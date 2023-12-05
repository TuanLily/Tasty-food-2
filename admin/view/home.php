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
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Success Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Danger Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart Example
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart Example
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas>
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