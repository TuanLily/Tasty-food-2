
<h1>My Web Page</h1>

<div id="piechart" class="bieudo">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
  <?php
  $tongdm=count($listthongke);
  $i=1;
  foreach ($listthongke as $thongke){
    extract($thongke);
    if($i==$tongdm) $dauphay="";else $dauphay=",";
    echo "  ['".$thongke['ten_dm']."',".$thongke['count_ma']."]".$dauphay;
    $i+=1;
  }
  ?>

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Biểu đồ món ăn', 'width':1100, 'height':660};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</div>

