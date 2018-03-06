<?php
// Database Connection
$queryColumnRemovalComplete = "SELECT 
    settlement_id, 	
    CONCAT(settlement_start_date,
            ' - ',
            settlement_end_date) AS 'Date',
    SUM(IF(amount_description = 'RemovalComplete',amount,0)) AS 'Removal Complete'
    
FROM settlements
Group by settlement_id";
$resulColumnRemovalComplete = mysqli_query($conn, $queryColumnRemovalComplete);
?>
<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var colorPallette = ['#FE6F5E'];
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Removal Complete'],
<?php
while ($row = mysqli_fetch_array($resulColumnRemovalComplete)) {
    echo "['" . $row["Date"] . "', " . $row["Removal Complete"] . "], ";
}
?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1]);

        var options = {
            colors: colorPallette,
            legend: {position: "none"},
        };

        var chart = new google.visualization.ColumnChart(document.getElementById("Removal_Complete_chart_div"));
        chart.draw(view, options);

    }
    $(window).resize(function () {
        drawChart();
    });
</script>


