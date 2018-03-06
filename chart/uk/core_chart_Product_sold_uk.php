<?php
// Database Connection
$queryCoreChartProductSold = " 
Select 
    Product_code as Product_code, 
    settlements.sku as 'sku', 
    tbl_list_sku.sku as 'list_sku', 
    tbl_list_sku.model_code,
    SUM(IF (transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) AS 'SKU Sold'
	
FROM settlements

INNER JOIN tbl_list_sku
ON settlements.sku=tbl_list_sku.sku
WHERE settlement_id
GROUP BY tbl_list_sku.Product_code
HAVING sku IS NOT NULL AND LENGTH(sku) > 0
Order by sku ASC";
$resultCoreChartProductSold = mysqli_query($conn, $queryCoreChartProductSold);
?>

<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Product_code', 'SKU Sold'],
<?php
while ($row = mysqli_fetch_array($resultCoreChartProductSold)) {
    echo "['" . $row["Product_code"] . "', " . $row["SKU Sold"] . "],";
}
?>
        ]);

        var options = {
            height: 450,
            hAxis: {minValue: 0},
            vAxis: {title: 'SKU SOLD', minValue: 0},
            legend: 'none'
        };

        var chart = new google.visualization.ScatterChart(document.getElementById('Core_product_sold_chart_div'));

        chart.draw(data, options);
    }

    $(window).resize(function () {
        drawChart();
    });
</script>