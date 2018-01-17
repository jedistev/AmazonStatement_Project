<?php
// Database Connection
$sqlAnnotationTotalChart = "SELECT  
    CONCAT(settlement_start_date,' - ', settlement_end_date) As date,
    total_amount as 'Total Amount'
FROM settlements
GROUP BY settlement_id";
$resultAnnotationTotalChart = mysqli_query($conn, $sqlAnnotationTotalChart);
?> 

<script type='text/javascript'>
     
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'date');
        data.addColumn('number', 'Total Amount');

        data.addRows([

          [new Date(<?php
while ($row = mysqli_fetch_array($resultAnnotationTotalChart)) { echo "['" . $row["date"] . "'],";}?>), <?php
while ($row = mysqli_fetch_array($resultAnnotationTotalChart)) { echo "['" . $row["Total Amount"] . "'],";}?>, ]                  

        ]);

        var chart = new google.visualization.AnnotationChart(document.getElementById('annotation_chart_div'));

        var options = {
          displayAnnotations: true
        };

        chart.draw(data, options, {width: '50%', height: '100%'});
      }
    </script>