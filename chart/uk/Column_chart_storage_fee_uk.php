<?php
// Database Connection
$queryColumnstoragefee = "SELECT 
    settlement_id, 	
    CONCAT(settlement_start_date,
            ' - ',
            settlement_end_date) AS 'Date',
    SUM(IF(amount_description = 'Storage Fee',amount,0)) AS 'Storage Fee'
    
FROM settlements
Group by settlement_id";
$resulColumnstoragefee = mysqli_query($conn, $queryColumnstoragefee);
?>
<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var colorPallette = ['blue'];
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Storage Fee'],
<?php
while ($row = mysqli_fetch_array($resulColumnstoragefee)) {
    echo "['" . $row["Date"] . "', " . $row["Storage Fee"] . "], ";
}
?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1]);

        var options = {
            colors: colorPallette,
            legend: {position: "none"},
        };



        var chart = new google.visualization.ColumnChart(document.getElementById("Storage_fee_chart_div"));
        chart.draw(view, options);

    }
</script>


