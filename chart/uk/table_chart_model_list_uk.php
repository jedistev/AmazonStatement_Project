<?php
// Database Connection
$TableChartAmountModelList = "Select 
    tbl_list_sku.model_code as 'Model code',
    SUM(IF (transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) AS 'Order Quantity',
    SUM(IF( amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0)) AS 'Reimbursement Quantity', 
    SUM((IF( transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) + (IF( amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0))) AS 'Total_Quantity',
    SUM((transaction_type = 'Refund'
        AND amount_description = 'Principal'
        AND amount_type = 'ItemPrice')) AS 'Refund Quantity'
	

FROM settlements
INNER JOIN tbl_list_sku
ON settlements.sku=tbl_list_sku.sku
GROUP BY Model_code
HAVING Model_code IS NOT NULL AND LENGTH(Model_code) > 0
Order by Model_code ASC";
$ResulttableChartAmountModelList = mysqli_query($conn, $TableChartAmountModelList);
?> 

<script type="text/javascript">

    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Model code');
        data.addColumn('number', 'Order Quantity');
        data.addColumn('number', 'Reimbursement Quantity');
        data.addColumn('number', 'Refund Quantity');


        data.addRows([

<?php
while ($row = mysqli_fetch_array($ResulttableChartAmountModelList)) {
    echo "['" . $row['Model code'] . "'," . $row['Order Quantity'] . "," . $row['Reimbursement Quantity'] . "," . $row['Refund Quantity'] . "],";
}
?>
        ]);


        var table = new google.visualization.Table(document.getElementById('table_chart_modal_list_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
    }
</script>


