<?php
// Database Connection
$querypiebasicbarchartrebur = "SELECT 
    sku, 
    COUNT(sku) AS 'SKU Refund'
FROM
    settlements
WHERE
	(sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
	AND transaction_type ='other-transaction'
        AND amount_description = 'REVERSAL_REIMBURSEMENT'
        AND amount_type = 'FBA Inventory Reimbursement'
GROUP BY sku
ORDER BY `SKU Refund` DESC
limit 10";
$resultpierebur = mysqli_query($conn, $querypiebasicbarchartrebur);
?>

<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['sku', 'SKU Refund'],
<?php
while ($row = mysqli_fetch_array($resultpierebur)) {
    echo "['" . $row["sku"] . "', " . $row["SKU Refund"] . "],";
}
?>
        ]);

        var options = {
            height: 400,
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

    $(window).resize(function () {
        drawChart();
    });
</script>