<?php

// Database Connection
$RevenuechartAmount = "SELECT 
    settlement_id,
    CONCAT(settlement_start_date,
            ' - ',
            settlement_end_date) AS 'Date',
    total_amount as 'Total Amount'
FROM
    settlements
GROUP BY settlement_id
ORDER BY Date DESC";
$ResultRevenuechartAmount = mysqli_query($conn, $RevenuechartAmount);
?> 
<script>
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Date');
    data.addColumn('number', 'Total Amount');
    data.addRows([
<?php

while ($row = mysqli_fetch_array($ResultRevenuechartAmount )) {
    echo "['" . $row['Date'] . "'," . $row['Total Amount'] . "],";
}
?>
    ]);

    var table = new google.visualization.Table(document.getElementById('arrowformat_div'));

    var formatter = new google.visualization.ArrowFormat({width: 120});
    formatter.format(data, 1); // Apply formatter to second column
    
    table.draw(data, {allowHtml: true, showRowNumber: true, width: '100%', height: '100%'});
</script>




