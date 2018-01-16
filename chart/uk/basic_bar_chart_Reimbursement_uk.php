<?php
// Database Connection
$querybasicbarchartReimbursement = "SELECT 
    sku, 
    COUNT(sku) AS 'SKU Reimbursement'
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
ORDER BY `SKU Reimbursement` DESC
limit 10";
$resultReimbursement = mysqli_query($conn, $querybasicbarchartReimbursement);
?>  
<script type="text/javascript">


    google.charts.setOnLoadCallback(drawBasic);
    function drawBasic() {

        var data = google.visualization.arrayToDataTable([
            ['sku', 'SKU Reimbursement'],
    <?php
    while ($row = mysqli_fetch_array($resultReimbursement)) {
        echo "['" . $row["sku"] . "', " . $row["SKU Reimbursement"] . "],";
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

        var chart = new google.visualization.BarChart(document.getElementById('chart_div_Reimbursement'));

        chart.draw(data, options);
    }
</script>
