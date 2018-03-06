<?php
// Database Connection
$TableChartAmount = "SELECT 
    settlement_id,
    CONCAT(settlement_start_date,
            ' - ',
            settlement_end_date) AS 'Date',
    total_amount as 'Total Amount'
FROM
    settlements
GROUP BY settlement_id
ORDER BY Date DESC";
$ResulttablechartAmount = mysqli_query($conn, $TableChartAmount);
?> 

<script type="text/javascript">

    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Total Amount');


        data.addRows([

<?php
while ($row = mysqli_fetch_array($ResulttablechartAmount)) {
    echo "['" . $row['Date'] . "'," . $row['Total Amount'] . "],";
}
?>
        ]);


        var table = new google.visualization.Table(document.getElementById('table_chart_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
    }
    $(window).resize(function () {
        drawTable();
    });
</script>


