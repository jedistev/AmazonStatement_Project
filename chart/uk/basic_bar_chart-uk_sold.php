<?php
// Database Connection
$querybasicbarchart = "SELECT 
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
limit 5";
$result = mysqli_query($conn, $querybasicbarchart);
?>  
<script type="text/javascript">


    google.charts.setOnLoadCallback(drawBasic);
    function drawBasic() {

        var data = google.visualization.arrayToDataTable([
            ['sku', 'sku sold'],
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "['" . $row["sku"] . "', " . $row["sku sold"] . "],";
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

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
</script>
