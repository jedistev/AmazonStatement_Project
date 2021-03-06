<?php

// Database Connection
include ('../../../config/Export_config.php');

// filename for export
$csv_filename = 'sku_refund_in_UK_in_Euro' . date('Y-m-d') . '.csv';

// get Users
$query = "
SELECT 
      transaction_type,sku, SUM(amount) AS sku_total
FROM
    settlementsukeuro
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'refund'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'FBAPerUnitFulfillmentFee',
        'VariableClosingFee')

GROUP BY sku
ORDER BY sku_total ASC" 
        
//"SELECT
//    DISTINCT sku, COUNT(sku) AS sku_unit_sold
//FROM
//    settlements
//WHERE
//    (sku NOT LIKE '%loc%'
//        AND sku NOT LIKE 'isc%'
//        AND sku NOT LIKE 'trek%')
//        AND amount_description = 'Principal'
//GROUP BY sku 
//Order by sku_unit_sold DESC"
        ;


if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=" . $csv_filename . "");
$output = fopen('php://output', 'w');
fputcsv($output, array(
    'transaction',
    'SKU',
    'SKU_Refund'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>