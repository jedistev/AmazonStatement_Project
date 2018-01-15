<?php
// Database Connection
$querydountchartAmountBreakdown = "
    SELECT 
    sku, 
    COUNT(sku) AS 'sku sold'
FROM
    settlements
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND amount_description = 'Principal'
        AND transaction_type = 'order'
        AND amount_type = 'ItemPrice'
GROUP BY sku
ORDER BY `sku sold` DESC
limit 10";
$resultdountchartAmountBreakdown = mysqli_query($conn, $querydountchartAmountBreakdown);
?>



<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['sku', 'sku sold'],
<?php
while ($row = mysqli_fetch_array($resultdountchartAmountBreakdown)) {
    echo "['" . $row["sku"] . "', " . $row["sku sold"] . "],";
}
?>

        ]);

        var options = {
            height: 400,
            pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    }
</script>-->
