<?php
// Database Connection
$querybasicbarchartrefund = "SELECT 
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
limit 8";
$resultrefund = mysqli_query($conn, $querybasicbarchartrefund);
?>  
<script type="text/javascript">


    google.charts.setOnLoadCallback(drawBasic);
    function drawBasic() {

        var data = google.visualization.arrayToDataTable([
            ['sku', 'SKU Refund'],
    <?php
    while ($row = mysqli_fetch_array($resultrefund)) {
        echo "['" . $row["sku"] . "', " . $row["SKU Refund"] . "],";
    }
    ?>
        ]);

        var options = {
            height: 400,
            chartArea: {width: '50%'},
            hAxis: {
                minValue: 0
            },
            vAxis: {
                title: 'Product'
            }
        };

        function getRandomColor() {
            var letters = '0123456789ABCDEF'.split('');
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

        options.series = {};
        for (var i = 0; i < data.getNumberOfRows(); i++) {
            options.series[i] = {color: getRandomColor()}
        }

        var chart = new google.visualization.BarChart(document.getElementById('chart_div_refund'));

        chart.draw(data, options);
    }
</script>
