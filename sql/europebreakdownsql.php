<?php
require('config/config.php');

//UK EURO Area only
$sqlTotalSettlementBreakdownEurope = "
SELECT 
    marketplace_name,
    settlement_id,
    SUM(total_amount) AS 'total_amount',
    currency,
    SUM(IF(transaction_type = 'order',
        amount,
        0)) AS 'Order',
    SUM(IF(transaction_type = 'refund',
        amount,
        0)) AS 'Refund',
    SUM(IF(transaction_type = 'ServiceFee',
        amount,
        0)) AS 'Servicefee',
    SUM(IF(amount_description = 'REVERSAL_REIMBURSEMENT',
        amount,
        0)) AS 'REVERSAL_REIMBURSEMENT',
    SUM(IF(amount_description = 'RemovalComplete',
        amount,
        0)) AS 'RemovalComplete',
    SUM(IF(amount_description = 'Storage Fee',
        amount,
        0)) AS 'Storage Fee',
    SUM(IF(amount_description = 'LightningDealFee',
        amount,
        0)) AS 'LightningDealFee',
    SUM(IF(amount_description = 'Subscription Fee',
        amount,
        0)) AS 'Subscription Fee',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'WAREHOUSE_DAMAGE',
        amount,
        0)) AS 'WAREHOUSE_DAMAGE',
    SUM(IF(amount_description = 'DisposalComplete',
        amount,
        0)) AS 'DisposalComplete',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'Missing From Inbound',
        amount,
        0)) AS 'Missing From Inbound',
    SUM(IF(amount_description = 'MULTICHANNEL_ORDER_LOST',
        amount,
        0)) AS 'MULTICHANNEL_ORDER_LOST'
FROM
    settlementsukeuro
UNION SELECT 
    marketplace_name,
    settlement_id,
    SUM(total_amount) AS 'total_amount',
    currency,
    SUM(IF(transaction_type = 'order',
        amount,
        0)) AS 'Order',
    SUM(IF(transaction_type = 'refund',
        amount,
        0)) AS 'Refund',
    SUM(IF(transaction_type = 'ServiceFee',
        amount,
        0)) AS 'Servicefee',
    SUM(IF(amount_description = 'REVERSAL_REIMBURSEMENT',
        amount,
        0)) AS 'REVERSAL_REIMBURSEMENT',
    SUM(IF(amount_description = 'RemovalComplete',
        amount,
        0)) AS 'RemovalComplete',
    SUM(IF(amount_description = 'Storage Fee',
        amount,
        0)) AS 'Storage Fee',
    SUM(IF(amount_description = 'LightningDealFee',
        amount,
        0)) AS 'LightningDealFee',
    SUM(IF(amount_description = 'Subscription Fee',
        amount,
        0)) AS 'Subscription Fee',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'WAREHOUSE_DAMAGE',
        amount,
        0)) AS 'WAREHOUSE_DAMAGE',
    SUM(IF(amount_description = 'DisposalComplete',
        amount,
        0)) AS 'DisposalComplete',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'Missing From Inbound',
        amount,
        0)) AS 'Missing From Inbound',
    SUM(IF(amount_description = 'MULTICHANNEL_ORDER_LOST',
        amount,
        0)) AS 'MULTICHANNEL_ORDER_LOST'
FROM
    settlementsde 
UNION SELECT 
    marketplace_name,
    settlement_id,
    SUM(total_amount) AS 'total_amount',
    currency,
    SUM(IF(transaction_type = 'order',
        amount,
        0)) AS 'Order',
    SUM(IF(transaction_type = 'refund',
        amount,
        0)) AS 'Refund',
    SUM(IF(transaction_type = 'ServiceFee',
        amount,
        0)) AS 'Servicefee',
    SUM(IF(amount_description = 'REVERSAL_REIMBURSEMENT',
        amount,
        0)) AS 'REVERSAL_REIMBURSEMENT',
    SUM(IF(amount_description = 'RemovalComplete',
        amount,
        0)) AS 'RemovalComplete',
    SUM(IF(amount_description = 'Storage Fee',
        amount,
        0)) AS 'Storage Fee',
    SUM(IF(amount_description = 'LightningDealFee',
        amount,
        0)) AS 'LightningDealFee',
    SUM(IF(amount_description = 'Subscription Fee',
        amount,
        0)) AS 'Subscription Fee',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'WAREHOUSE_DAMAGE',
        amount,
        0)) AS 'WAREHOUSE_DAMAGE',
    SUM(IF(amount_description = 'DisposalComplete',
        amount,
        0)) AS 'DisposalComplete',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'Missing From Inbound',
        amount,
        0)) AS 'Missing From Inbound',
    SUM(IF(amount_description = 'MULTICHANNEL_ORDER_LOST',
        amount,
        0)) AS 'MULTICHANNEL_ORDER_LOST'
FROM
    settlementsfr 
UNION SELECT 
    marketplace_name,
    settlement_id,
    SUM(total_amount) AS 'total_amount',
    currency,
    SUM(IF(transaction_type = 'order',
        amount,
        0)) AS 'Order',
    SUM(IF(transaction_type = 'refund',
        amount,
        0)) AS 'Refund',
    SUM(IF(transaction_type = 'ServiceFee',
        amount,
        0)) AS 'Servicefee',
    SUM(IF(amount_description = 'REVERSAL_REIMBURSEMENT',
        amount,
        0)) AS 'REVERSAL_REIMBURSEMENT',
    SUM(IF(amount_description = 'RemovalComplete',
        amount,
        0)) AS 'RemovalComplete',
    SUM(IF(amount_description = 'Storage Fee',
        amount,
        0)) AS 'Storage Fee',
    SUM(IF(amount_description = 'LightningDealFee',
        amount,
        0)) AS 'LightningDealFee',
    SUM(IF(amount_description = 'Subscription Fee',
        amount,
        0)) AS 'Subscription Fee',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'WAREHOUSE_DAMAGE',
        amount,
        0)) AS 'WAREHOUSE_DAMAGE',
    SUM(IF(amount_description = 'DisposalComplete',
        amount,
        0)) AS 'DisposalComplete',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'Missing From Inbound',
        amount,
        0)) AS 'Missing From Inbound',
    SUM(IF(amount_description = 'MULTICHANNEL_ORDER_LOST',
        amount,
        0)) AS 'MULTICHANNEL_ORDER_LOST'
FROM
    settlementsit 
UNION SELECT 
    marketplace_name,
    settlement_id,
    SUM(total_amount) AS 'total_amount',
    currency,
    SUM(IF(transaction_type = 'order',
        amount,
        0)) AS 'Order',
    SUM(IF(transaction_type = 'refund',
        amount,
        0)) AS 'Refund',
    SUM(IF(transaction_type = 'ServiceFee',
        amount,
        0)) AS 'Servicefee',
    SUM(IF(amount_description = 'REVERSAL_REIMBURSEMENT',
        amount,
        0)) AS 'REVERSAL_REIMBURSEMENT',
    SUM(IF(amount_description = 'RemovalComplete',
        amount,
        0)) AS 'RemovalComplete',
    SUM(IF(amount_description = 'Storage Fee',
        amount,
        0)) AS 'Storage Fee',
    SUM(IF(amount_description = 'LightningDealFee',
        amount,
        0)) AS 'LightningDealFee',
    SUM(IF(amount_description = 'Subscription Fee',
        amount,
        0)) AS 'Subscription Fee',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'WAREHOUSE_DAMAGE',
        amount,
        0)) AS 'WAREHOUSE_DAMAGE',
    SUM(IF(amount_description = 'DisposalComplete',
        amount,
        0)) AS 'DisposalComplete',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'Missing From Inbound',
        amount,
        0)) AS 'Missing From Inbound',
    SUM(IF(amount_description = 'MULTICHANNEL_ORDER_LOST',
        amount,
        0)) AS 'MULTICHANNEL_ORDER_LOST'
FROM
    settlementses";

$sqlTotalSettlementBreakdownEuropeukGBP = "
SELECT 
    marketplace_name,
    settlement_id,
    SUM(total_amount) AS 'total_amount',
    currency,
    SUM(IF(transaction_type = 'order',
        amount,
        0)) AS 'Order',
    SUM(IF(transaction_type = 'refund',
        amount,
        0)) AS 'Refund',
    SUM(IF(transaction_type = 'ServiceFee',
        amount,
        0)) AS 'Servicefee',
    SUM(IF(amount_description = 'REVERSAL_REIMBURSEMENT',
        amount,
        0)) AS 'REVERSAL_REIMBURSEMENT',
    SUM(IF(amount_description = 'RemovalComplete',
        amount,
        0)) AS 'RemovalComplete',
    SUM(IF(amount_description = 'Storage Fee',
        amount,
        0)) AS 'Storage Fee',
    SUM(IF(amount_description = 'LightningDealFee',
        amount,
        0)) AS 'LightningDealFee',
    SUM(IF(amount_description = 'Subscription Fee',
        amount,
        0)) AS 'Subscription Fee',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'WAREHOUSE_DAMAGE',
        amount,
        0)) AS 'WAREHOUSE_DAMAGE',
    SUM(IF(amount_description = 'DisposalComplete',
        amount,
        0)) AS 'DisposalComplete',
    SUM(IF(amount_description = 'StorageRenewalBilling',
        amount,
        0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'Missing From Inbound',
        amount,
        0)) AS 'Missing From Inbound',
    SUM(IF(amount_description = 'MULTICHANNEL_ORDER_LOST',
        amount,
        0)) AS 'MULTICHANNEL_ORDER_LOST'
FROM
    settlements";




//totalbalance match Europe
$sqlTotalMatchEurope ="
SELECT 
    marketplace_name, 
    SUM(amount) AS match_amount_sum
FROM
    settlementsukeuro 
UNION SELECT 
    marketplace_name, 
    SUM(amount) AS match_amount_sum
FROM
    settlementsde 
UNION SELECT 
    marketplace_name, 
    SUM(amount) AS match_amount_sum
FROM
    settlementsfr 
UNION SELECT 
    marketplace_name, 
    SUM(amount) AS match_amount_sum
FROM
    settlementsit 
UNION SELECT 
    marketplace_name, 
    SUM(amount) AS match_amount_sum
FROM
    settlementses";
$totalMatchResultEurope = mysqli_query($conn, $sqlTotalMatchEurope);



//finallmatchbalance Europe
$sqlbalancematchEurope = "
SELECT 
    marketplace_name,
    total_amount,
    SUM(amount) AS match_amount_sum,
    SUM(total_amount - amount) AS total_match
FROM
    settlementsukeuro 
UNION SELECT 
    marketplace_name,
    total_amount,
    SUM(amount) AS match_amount_sum,
    SUM(total_amount - amount) AS total_match
FROM
    settlementsde 
UNION SELECT 
    marketplace_name,
    total_amount,
    SUM(amount) AS match_amount_sum,
    SUM(total_amount - amount) AS total_match
FROM
    settlementsfr 
UNION SELECT 
    marketplace_name,
    total_amount,
    SUM(amount) AS match_amount_sum,
    SUM(total_amount - amount) AS total_match
FROM
    settlementsit 
UNION SELECT 
    marketplace_name,
    total_amount,
    SUM(amount) AS match_amount_sum,
    SUM(total_amount - amount) AS total_match
FROM
    settlementses";
$allbalanceTotalEurope = mysqli_query($conn, $sqlbalancematchEurope);

//totalbalance Europe
$sqlTotalMatchUk ="
SELECT 
    marketplace_name, 
    SUM(amount) AS match_amount_sum
FROM
    settlements";
$totalMatchResultuk = mysqli_query($conn, $sqlTotalMatchUk);

//finallmatchbalance uk
$sqlbalancematchuk = "
SELECT 
    marketplace_name,
    total_amount,
    SUM(amount) AS match_amount_sum,
    SUM(total_amount - amount) AS total_match
FROM
    settlements ";
$allbalanceTotaluk = mysqli_query($conn, $sqlbalancematchuk);




//sku total sold
$sqlSkuModelSold = "
SELECT  
    transaction_type, sku, SUM(amount) AS sku_total
FROM
    settlementsukeuro
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')
        
UNION SELECT  
    transaction_type, sku, SUM(amount) AS sku_total
FROM
    settlementsde
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')  

UNION SELECT  
    transaction_type, sku, SUM(amount) AS sku_total
FROM
    settlementses
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')

UNION SELECT  
    transaction_type, sku, SUM(amount) AS sku_total
FROM
    settlementsfr
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')

UNION SELECT  
    transaction_type, sku, SUM(amount) AS sku_total
FROM
	settlementsit
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')

GROUP BY transaction_type, sku 
ORDER BY sku_total DESC";
$allSkuModelSold = mysqli_query($conn, $sqlSkuModelSold);

$sqlSkuUnitsSold="
SELECT DISTINCT
    sku, COUNT(sku) AS sku_unit_sold
FROM
    settlementsukeuro
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description = 'Principal' 
UNION SELECT DISTINCT
    sku, COUNT(sku) AS sku_unit_sold
FROM
    settlementsde
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description = 'Principal' 
UNION SELECT DISTINCT
    sku, COUNT(sku) AS sku_unit_sold
FROM
    settlementses
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description = 'Principal' 
UNION SELECT DISTINCT
    sku, COUNT(sku) AS sku_unit_sold
FROM
    settlementsfr
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description = 'Principal'
UNION SELECT DISTINCT
    sku, COUNT(sku) AS sku_unit_sold
FROM
    settlementsit
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description = 'Principal'
GROUP BY sku
ORDER BY sku_unit_sold DESC";
$allskuUnitssold = mysqli_query($conn, $sqlSkuUnitsSold);


//sku total refund 
$sqlskuRefund= "
SELECT  
    transaction_type, sku, SUM(amount) AS sku_total, marketplace_name
FROM
    settlementsukeuro
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')
        
UNION SELECT  
    transaction_type, sku, SUM(amount) AS sku_total, marketplace_name
FROM
    settlementsde
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')  

UNION SELECT  
    transaction_type, sku, SUM(amount) AS sku_total, marketplace_name
FROM
    settlementses
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')

UNION SELECT  
    transaction_type, sku, SUM(amount) AS sku_total, marketplace_name
FROM
    settlementsfr
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')

UNION SELECT  
    transaction_type, sku, SUM(amount) AS sku_total, marketplace_name
FROM
    settlementsit
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')

GROUP BY transaction_type, sku 
ORDER BY sku_total ASC";
$allSkuRefund = mysqli_query($conn, $sqlskuRefund);


$sqlskuRefundUNIT="
SELECT DISTINCT
    sku, COUNT(sku) AS sku_unit_sold
FROM
    settlementsukeuro
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description = 'Principal' 
UNION SELECT DISTINCT
    sku, COUNT(sku) AS sku_unit_sold
FROM
    settlementsde
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description = 'Principal' 
UNION SELECT DISTINCT
    sku, COUNT(sku) AS sku_unit_sold
FROM
    settlementses
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description = 'Principal' 
UNION SELECT DISTINCT
    sku, COUNT(sku) AS sku_unit_sold
FROM
    settlementsfr
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description = 'Principal'
UNION SELECT DISTINCT
    sku, COUNT(sku) AS sku_unit_sold
FROM
    settlementsit
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description = 'Principal'
GROUP BY sku";
$allskuRefundUnit = mysqli_query($conn, $sqlskuRefundUNIT);