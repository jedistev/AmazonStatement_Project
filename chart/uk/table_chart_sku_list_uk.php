<?php
// Database Connection
$TableChartAmountskuList = "Select 
    sku as 'SKU', 
    SUM(IF (transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) AS 'Order Quantity',
    SUM(IF( amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0)) AS 'Reimbursement Quantity', 
    SUM((IF( transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) + (IF( amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0))) AS 'Total_Quantity',
    SUM((transaction_type = 'Refund'
        AND amount_description = 'Principal'
        AND amount_type = 'ItemPrice')) AS 'Refund Quantity'
	

FROM settlements
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
GROUP BY sku
HAVING sku IS NOT NULL AND LENGTH(sku) > 0
Order by sku ASC";
$ResulttableChartAmountskuList = mysqli_query($conn, $TableChartAmountskuList);
?> 

<script type="text/javascript">

    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'SKU');
        data.addColumn('number', 'Order Quantity');
        data.addColumn('number', 'Reimbursement Quantity');
        data.addColumn('number', 'Refund Quantity');


        data.addRows([

<?php
while ($row = mysqli_fetch_array($ResulttableChartAmountskuList)) {
    echo "['" . $row['SKU'] . "'," . $row['Order Quantity'] . "," . $row['Reimbursement Quantity'] . "," . $row['Refund Quantity'] . "],";
}
?>
        ]);


        var table = new google.visualization.Table(document.getElementById('table_chart_sku_list_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
    }
</script>



