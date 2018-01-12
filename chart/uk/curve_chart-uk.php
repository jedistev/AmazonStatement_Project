<?php
// Database Connection
$queryPie = "SELECT  
    CONCAT(settlement_start_date,' - ', settlement_end_date) As Date,
    total_amount
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
            ['Date', 'total_amount'],
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "['" . $row["Date"] . "', " . $row["total_amount"] . "],";
}
?>
        ]);
        var options = {
            curveType: 'function',
            height: 400,
            legend: {position: 'bottom'},
            vAxis: {minValue: 0} 
        };
        var chart = new google.visualization.AreaChart(document.getElementById('piechartTotalamountuk'));
        chart.draw(data, options);
    }
</script>
