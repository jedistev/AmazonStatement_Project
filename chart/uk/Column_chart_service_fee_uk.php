<?php
// Database Connection
$queryColumnservicefee = "SELECT 
    settlement_id, 	
    CONCAT(settlement_start_date,
            ' - ',
            settlement_end_date) AS 'Date',
    SUM(IF(transaction_type = 'ServiceFee',amount,0)) AS 'Service fee'
    
FROM settlements
Group by settlement_id";
$resulColumnservicefee = mysqli_query($conn, $queryColumnservicefee);
?>
<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var colorPallette = ['red'];
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Service fee'],
<?php
while ($row = mysqli_fetch_array($resulColumnservicefee)) {
    echo "['" . $row["Date"] . "', " . $row["Service fee"] . "], ";
}
?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1]);

        var options = {
            colors: colorPallette,
            legend: {position: "none"},
        };



        var chart = new google.visualization.ColumnChart(document.getElementById("Service_fee_chart_div"));
        chart.draw(view, options);

    }
    $(window).resize(function () {
        drawChart();
    });
</script>


