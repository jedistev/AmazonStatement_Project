<?php
// Database Connection
$queryColumnSubscriptionfee = "SELECT 
    settlement_id, 	
    CONCAT(settlement_start_date,
            ' - ',
            settlement_end_date) AS 'Date',
         SUM(IF(amount_description = 'Subscription Fee',amount,0)) AS 'Subscription Fee'
    
FROM settlements
Group by settlement_id";
$resulColumnSubscriptionfee = mysqli_query($conn, $queryColumnSubscriptionfee);
?>
<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var colorPallette = ['#A46F3D'];
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Subscription Fee'],
<?php
while ($row = mysqli_fetch_array($resulColumnSubscriptionfee)) {
    echo "['" . $row["Date"] . "', " . $row["Subscription Fee"] . "], ";
}
?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1]);

        var options = {
            colors: colorPallette,
            legend: {position: "none"},
        };



        var chart = new google.visualization.ColumnChart(document.getElementById("subscription_fee_chart_div"));
        chart.draw(view, options);

    }
    $(window).resize(function () {
        drawChart();
    });
</script>


