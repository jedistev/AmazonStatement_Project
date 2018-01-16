<?php
// Database Connection
$querypiebasicbarchartrefund = "SELECT 
    sku, 
    SUM((transaction_type = 'Refund'
        AND amount_description = 'Principal'
        AND amount_type = 'ItemPrice')) AS 'SKU Refund'
FROM
    settlements
WHERE
	(sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
GROUP BY sku
HAVING sku IS NOT NULL AND LENGTH(sku) > 0
ORDER BY `SKU Refund` DESC
limit 10";


$resultpierefund = mysqli_query($conn, $querypiebasicbarchartrefund);
?>

<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['sku', 'SKU Refund'],
<?php
while ($row = mysqli_fetch_array($resultpierefund)) {
    echo "['" . $row["sku"] . "', " . $row["SKU Refund"] . "],";
}
?>
        ]);

        var options = {
            height: 400,
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_refund'));

        chart.draw(data, options);
    }
</script>