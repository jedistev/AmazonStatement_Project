<?php
// Database Connection
$sqltableChartTotal = "
SELECT 
    marketplace_name,
    currency,
    SUM(total_amount) AS 'total_amount'
FROM
    settlements 
UNION SELECT 
    marketplace_name,
    currency,
    SUM(total_amount) AS 'total_amount'
FROM
    settlementsukeuro 
UNION SELECT 
    marketplace_name,
    currency,
    SUM(total_amount) AS 'total_amount'
FROM
    settlementsde 
UNION SELECT 
    marketplace_name,
    currency,
    SUM(total_amount) AS 'total_amount'
FROM
    settlementsfr 
UNION SELECT 
    marketplace_name,
    currency,
    SUM(total_amount) AS 'total_amount'
FROM
    settlementsit 
UNION SELECT 
    marketplace_name,
    currency,
    SUM(total_amount) AS 'total_amount'
FROM
    settlementses";
$totalresultchart = mysqli_query($conn, $sqltableChartTotal);
?> 

<script type="text/javascript">
    //begin columns chart 
    google.charts.setOnLoadCallback(columnCharttotal);
    function columnCharttotal() {
        var data = google.visualization.arrayToDataTable([
            ["marketplace_name", "total_amount", {role: "style"}],
<?php
while (($rowResult = mysqli_fetch_array($totalresultchart, MYSQLI_ASSOC)) != NULL) {
    ?>
                [ "<?php echo $rowResult["marketplace_name"]; ?>", "<?php echo $rowResult["total_amount"]; ?>", "color: #e5e4e2"],
    <?php
}
mysqli_free_result($totalresultchart);
?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"},
            2]);

        var options = {
            title: "Total of all Europe sold",
            height: 400,
            bar: {groupWidth: "95%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    };
    //end of column chart
</script>

