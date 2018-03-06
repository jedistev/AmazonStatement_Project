<?php
// Database Connection
$queryPie = "SELECT  
    CONCAT(settlement_start_date,' - ', settlement_end_date) As Date,
    total_amount as 'Total Amount'
FROM settlements
GROUP BY settlement_id";
$result = mysqli_query($conn, $queryPie);
?>  
<script type="text/javascript">

    //begin curve chart
    google.charts.setOnLoadCallback(drawChart);
    function drawChart()
    {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Amount'],
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "['" . $row["Date"] . "', " . $row["Total Amount"] . "],";
}
?>
        ]);
        var options = {
            curveType: 'function',
            height: 600,
            vAxis: {minValue: 0} 
        };
        var chart = new google.visualization.LineChart(document.getElementById('piechartTotalamountuk'));
        chart.draw(data, options);
    }
    
$(window).resize(function(){
  drawChart();
});
</script>
