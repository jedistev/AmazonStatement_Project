<?php
// Database Connection
$querywaterfallservicefee = "SELECT 
    settlement_id, 	
    CONCAT(settlement_start_date,
            ' - ',
            settlement_end_date) AS 'Date',
    SUM(IF(transaction_type = 'ServiceFee',amount,0)) AS 'Service fee'
    
FROM settlements
Group by settlement_id";
$resultwaterfallservicefee = mysqli_query($conn, $querywaterfallservicefee);
?>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mon', 28, 28, 38, 38],
          ['Tue', 38, 38, 55, 55],
          ['Wed', 55, 55, 77, 77],
          ['Thu', 77, 77, 66, 66],
          ['Fri', 66, 66, 22, 22]
          // Treat the first row as data.
        ], true);

        var options = {
          legend: 'none',
          bar: { groupWidth: '100%' }, // Remove space between bars.
          candlestick: {
            fallingColor: { strokeWidth: 0, fill: '#a52714' }, // red
            risingColor: { strokeWidth: 0, fill: '#0f9d58' }   // green
          }
        };

        var chart = new google.visualization.CandlestickChart(document.getElementById('waterfall_chart_service_fee_div'));
        chart.draw(data, options);
      }
    </script>