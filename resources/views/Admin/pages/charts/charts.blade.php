<div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>
 
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Month Name', 'Registered User Count'],
 
                <?php
                foreach($pieChart as $d) {
                    echo "['".$d->product_name."', ".$d->price."],";
                }
                ?>
        ]);
 
          var options = {
            title: 'Users Detail',
            is3D: false,
          };
 
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 
          chart.draw(data, options);
        }
      </script>