<?php
// Database Connection
$TableChartTotalAmountskuList = "SELECT 
    sku as 'SKU',
    SUM(IF(transaction_type = 'order'
            AND transaction_type = 'order'
            AND amount_description IN ('Principal' , 'Shipping',
            'FBAPerUnitFulfillmentFee',
            'Commission',
            'ShippingChargeback',
            'FBA transportation fee',
            'FBAPerOrderFulfillmentFe',
            'ShippingHB')
            AND amount_type IN ('ItemPrice' , 'ItemFees', 'Promotion'),
        amount,
        0)) AS 'Total Order',
    
    SUM(IF(amount_type = 'FBA Inventory Reimbursement'
            AND amount_description = 'REVERSAL_REIMBURSEMENT',
        amount,
        0)) AS 'Total Reimbursement',
    
    
    SUM(IF(transaction_type = 'refund'
            AND transaction_type = 'refund'
            AND amount_description IN ('Principal' , 'Shipping',
            'FBAPerUnitFulfillmentFee',
            'Commission',
            'RefundCommission',
            'ShippingChargeback',
            'FBA transportation fee',
            'FBAPerOrderFulfillmentFe',
            'ShippingHB')
            AND amount_type IN ('ItemPrice' , 'ItemFees', 'Promotion'),
        amount,
        0)) AS 'Total Refund'
FROM
    settlements
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
GROUP BY SKU
HAVING sku IS NOT NULL AND LENGTH(sku) > 0
ORDER BY SKU ASC";
$ResulttableChartTotalAmountskuList = mysqli_query($conn, $TableChartTotalAmountskuList);
?> 

<script type="text/javascript">

    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'SKU');
        data.addColumn('number', 'Total Order');
        data.addColumn('number', 'Ttotal Reimbursement');
        data.addColumn('number', 'Total Refund');


        data.addRows([

<?php
while ($row = mysqli_fetch_array($ResulttableChartTotalAmountskuList)) {
    echo "['" . $row['SKU'] . "'," . $row['Total Order'] . "," . $row['Total Reimbursement'] . "," . $row['Total Refund'] . "],";
}
?>
        ]);


        var table = new google.visualization.Table(document.getElementById('table_chart_amount_sku_list_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
    }
    $(window).resize(function () {
        drawTable();
    });
</script>



