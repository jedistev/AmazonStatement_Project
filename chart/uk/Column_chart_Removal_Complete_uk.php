<?php
// Database Connection
$queryColumnOrderLost = "SELECT 
    settlement_id, 	
    CONCAT(settlement_start_date,
            ' - ',
            settlement_end_date) AS 'Date',
         SUM(IF(amount_description = 'MULTICHANNEL_ORDER_LOST',amount,0)) AS 'MULTICHANNEL ORDER LOST'
    
FROM settlements
Group by settlement_id";
$resulColumnOrderLost = mysqli_query($conn, $queryColumnOrderLost);
?>
<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var colorPallette = ['#B2BEB5'];
        var data = google.visualization.arrayToDataTable([
            ['Date', 'MULTICHANNEL ORDER LOST'],
<?php
while ($row = mysqli_fetch_array($resulColumnOrderLost)) {
    echo "['" . $row["Date"] . "', " . $row["MULTICHANNEL ORDER LOST"] . "], ";
}
?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1]);

        var options = {
            colors: colorPallette,
            legend: {position: "none"},
        };

        var chart = new google.visualization.ColumnChart(document.getElementById("MM_order_lost_chart_div"));
        chart.draw(view, options);

    }
    $(window).resize(function () {
        drawChart();
    });
</script>


