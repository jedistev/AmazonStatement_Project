<?php

require('config/config.php');



$sqlskuQuantity = "
SELECT 
    Distinct sku,
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    fnsku,
    `product-name`,
    quantity,
    `fulfillment-center-id`,
    `detailed-disposition`,
    country
FROM
    `tbl_sku_quantity`
Where 
	country='GB'";
$AllTableSKUQTY = mysqli_query($conn, $sqlskuQuantity);


$sqlskuQuantity1 = "
SELECT 
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    fnsku,
    sku,
    `product-name`,
    quantity,
    `fulfillment-center-id`,
    `detailed-disposition`,
    country
FROM
    `tbl_sku_quantity`";
$AllTableSKUQTY1 = mysqli_query($conn, $sqlskuQuantity1);

$sqlskuQuantityDamaged = "SELECT 
    Distinct `fulfillment-center-id`,
    sku,
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    fnsku,
    `product-name`,
    quantity,
    `detailed-disposition`,
    country
FROM
    `tbl_sku_quantity`
Where 
	country='GB'
	AND  `detailed-disposition`NOT LIKE 'SELLABLE'
Order by 
     quantity DESC";

$AllTableSKUQTYdamaged = mysqli_query($conn, $sqlskuQuantityDamaged);

$sqlskuDefective = "
SELECT 
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    country
FROM
    `tbl_sku_quantity`
WHERE
    country = 'GB'
    AND`detailed-disposition` ='DEFECTIVE'        
GROUP BY `sku`";
$allSkuDefective = mysqli_query($conn, $sqlskuDefective);


$sqlskuWHSE_DAMAGED = "
SELECT 
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    country
FROM
    `tbl_sku_quantity`
WHERE
    country = 'GB'
        AND `detailed-disposition` = 'WHSE_DAMAGED'
GROUP BY `sku`";
$alltableWHSE_DAMAGED = mysqli_query($conn, $sqlskuWHSE_DAMAGED);

$sqlskuCust_DAMAGED = "
SELECT 
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    country
FROM
    `tbl_sku_quantity`
WHERE
    country = 'GB'
        AND `detailed-disposition` = 'Cust_DAMAGED'
GROUP BY `sku`";
$alltableCust_DAMAGED = mysqli_query($conn, $sqlskuCust_DAMAGED);


$sqlSkuQtyRefund = "
SELECT 
    transaction_type,
    sku, 
    SUM(quantity_purchased) AS Total_QTY,
    SUM(amount) AS Total_Reimbursement
FROM
    settlementsde
WHERE
	transaction_type ='other-transaction'
        AND amount_description = 'REVERSAL_REIMBURSEMENT'
        AND amount_type = 'FBA Inventory Reimbursement'
GROUP BY SKU
ORDER BY Total_QTY DESC";
$alltableSkuQTYRefund = mysqli_query($conn, $sqlSkuQtyRefund);



$sqlSkuQTYTotalOrderRefund = "
SELECT 
    sku,
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
        0)) AS 'total_Order',
    SUM(IF(transaction_type = 'order'
            AND amount_description = 'Principal'
            AND amount_type = 'ItemPrice',
        quantity_purchased,
        0)) AS 'total_QTY_Order',
    SUM(IF(amount_type = 'FBA Inventory Reimbursement'
            AND amount_description = 'REVERSAL_REIMBURSEMENT',
        amount,
        0)) AS 'total_reimbursement',
    SUM(IF(amount_type = 'FBA Inventory Reimbursement'
            AND amount_description = 'REVERSAL_REIMBURSEMENT',
        quantity_purchased,
        0)) AS 'total_QTY_Reimbursement',
    SUM((IF(transaction_type = 'order'
            AND amount_description = 'Principal'
            AND amount_type = 'ItemPrice',
        quantity_purchased,
        0)) + (IF(amount_type = 'FBA Inventory Reimbursement'
            AND amount_description = 'REVERSAL_REIMBURSEMENT',
        quantity_purchased,
        0))) AS 'TotaL_Quantity_Order_and_reimbursement',
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
        0)) AS 'total_refund_cost',
    SUM((transaction_type = 'Refund'
        AND amount_description = 'Principal'
        AND amount_type = 'ItemPrice')) AS refund_QTY_Order
FROM
    settlementsde
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
GROUP BY SKU
HAVING sku IS NOT NULL AND LENGTH(sku) > 0
ORDER BY SKU ASC";
$alltableQTYTotalOrderRefund = mysqli_query($conn, $sqlSkuQTYTotalOrderRefund);



$sqlbreakdownsku_column = "
SELECT 
    settlement_id, 
    date_format(settlement_start_date, '%d/%m/%Y') as settlement_start_date, 
    date_format(settlement_end_date, '%d/%m/%Y') as settlement_end_date,
    total_amount,
    	
    SUM(IF(sku= 'BT01- Cream Half'AND transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) AS 'BT01-Cream Half',
    SUM(IF(sku= 'BT01- Cream Half' AND amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0)) AS 'BT01-Cream Half_R',
    SUM((IF(sku= 'BT01- Cream Half'AND transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) 
    + (IF(sku= 'BT01- Cream Half' AND amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0))) AS BT01_Cream_Half_QTY_TOTAL,
    
    SUM(IF(sku= 'BT01-Black Half'AND transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) AS 'BT01-Black Half',
    SUM(IF(sku= 'BT01-Black Half' AND amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0)) AS 'BT01-Black Half_R',
    SUM((IF(sku= 'BT01-Black Half'AND transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) 
    + (IF(sku= 'BT01-Black Half' AND amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0))) AS BT01_Black_Half_QTY_TOTAL,

    SUM(IF(sku= 'BT01-Navy Half' AND transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) AS 'BT01-Navy Half',
    SUM(IF(sku= 'BT01-Navy Half' AND amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0)) AS 'BT01-Navy Half_R',
    SUM((IF(sku= 'BT01-Navy Half'AND transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0))
    + (IF(sku= 'BT01-Navy Half' AND amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0))) AS BT01_Navy_Half_QTY_TOTAL,
    

    SUM(IF(sku= 'BT02-Black Full' AND transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) AS 'BT02-Black Full',
    SUM(IF(sku= 'BT02-Black Full' AND amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0)) AS 'BT02-Black Full_R',
    SUM((IF(sku= 'BT02-Black Full'AND transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0))  
    + (IF(sku= 'BT02-Black Full' AND amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0))) AS BT02_Black_Full_QTY_TOTAL


FROM settlementsde
GROUP BY settlement_id

ORDER BY settlement_start_date DESC";



/*dropdown */
$allskudropdown ="
SELECT 
	settlement_id,
    sku,
    SUM(IF (transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)),
	SUM(IF( amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0)), 
	SUM((IF( transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) 
    + (IF( amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0)))

FROM settlementsde
GROUP BY Sku 
HAVING sku IS NOT NULL AND LENGTH(sku) > 0
ORDER BY settlement_id DESC";



?>
