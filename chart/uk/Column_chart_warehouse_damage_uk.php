<?php
// Database Connection
$queryColumnwarehouseDamage = "SELECT 
    settlement_id, 	
    CONCAT(settlement_start_date,
            ' - ',
            settlement_end_date) AS 'Date',
     SUM(IF(amount_description = 'WAREHOUSE_DAMAGE',amount,0)) AS 'Warehouse Damage'
    
FROM settlements
Group by settlement_id";
$resulColumnwarehouseDamage = mysqli_query($conn, $queryColumnwarehouseDamage);
?>
<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var colorPallette = ['#FFA500'];
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Warehouse Damage'],
<?php
while ($row = mysqli_fetch_array($resulColumnwarehouseDamage)) {
    echo "['" . $row["Date"] . "', " . $row["Warehouse Damage"] . "], ";
}
?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1]);

        var options = {
            colors: colorPallette,
            legend: {position: "none"},
        };



        var chart = new google.visualization.ColumnChart(document.getElementById("warehouse_damage_chart_div"));
        chart.draw(view, options);

    }
</script>


