<?php
require('config/config.php');

//all table 
$sql = "SELECT * FROM settlementsit";

//sku model list   
$skuResult = mysqli_query($conn, "
SELECT 
    DISTINCT sku 
FROM settlementsit
WHERE(
    sku NOT LIKE '%loc%' 
    AND sku NOT LIKE 'isc%' 
    AND sku NOT LIKE 'trek%')
");

//total Cost and Settlement Date list
$totalResult = mysqli_query($conn, '
Select 
   settlement_id, 
   settlement_start_date as formatdate,
   date_format(settlement_start_date, "%d/%m/%Y") as settlement_start_date, 
   date_format(settlement_end_date, "%d/%m/%Y") as settlement_end_date,
   currency,
   total_amount
from settlementsit
Where total_amount
order by formatdate DESC');

//show all the Cost on each table 
$sqlCostAmount = "SELECT `currency`,SUM(COALESCE(total_amount, 0.00)) AS`total_amount_sum` FROM `settlementsit` WHERE `total_amount`";
$allamountresult = mysqli_query($conn, $sqlCostAmount);

//Principle on Promotion 
$sqlPromotion = "SELECT  Settlement_ID,amount_description,amount_type,amount FROM amazon.settlementsit Where amount_type='Promotion' and amount_description='Principal'";
$allPrincipal = mysqli_query($conn, $sqlPromotion);

//total on Promoted cost
$sqlPromotionAmount = "SELECT SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM `settlementsit` WHERE `amount` and amount_description='Principal' and amount_type='Promotion'";
$allPromotedPrincipal = mysqli_query($conn, $sqlPromotionAmount);

//total on Shipping Cost
$sqlshipping = "SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM `settlementsit` WHERE `amount` and amount_description='shipping'  ";
$allshippingAmount = mysqli_query($conn, $sqlshipping);

//total Shipping chargeback
$sqlShippingback = "SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description='shippingChargeback'";
$allShippingChargeback = mysqli_query($conn, $sqlShippingback);

//List Service fee 
$sqlListServiceFee = "SELECT settlement_id, transaction_type, amount FROM amazon.settlementsit WHERE transaction_type = 'ServiceFee'";
$allListServiceFee = mysqli_query($conn, $sqlListServiceFee);

//Total Service fee
$sqlServiceFee = "SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE transaction_type = 'ServiceFee'";
$allServiceFee = mysqli_query($conn, $sqlServiceFee);

//Total Refund fee
$sqlTotalRefundfee = "SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE transaction_type = 'Refund'";
$allrefundFee = mysqli_query($conn, $sqlTotalRefundfee);

//Total Order Fee
$sqlTotalOrder = " SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE transaction_type = 'order'";
$AllTotalFee = mysqli_query($conn, $sqlTotalOrder);

//another Transation
$sqlTransationOther ="SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE transaction_type = 'other-transaction'";
$AllOtherTransation = mysqli_query($conn, $sqlTransationOther);

//Each Statement ID with Refund total fee need more work on it.
$sqlStatmentfund ="SELECT settlement_id ,  transaction_type, currency, sum(COALESCE(amount, 0.00)) AS`Amount_Refund` FROM settlementsit GROUP BY Settlement_id AND transaction_type = 'Refund'";
$eachStatmentRefund = mysqli_query($conn, $sqlStatmentfund);

//Warehouse Damage Total 
$sqlWarehouseDamageTotal ="SELECT transaction_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'WAREHOUSE_DAMAGE'";
$allWarehouseDamageTotal = mysqli_query($conn, $sqlWarehouseDamageTotal);

//Total Reversal Reimbursement
$sqlTotalReversalReimbursement ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`Reversal_amount_sum` FROM settlementsit WHERE amount_description = 'REVERSAL_REIMBURSEMENT'";
$allTotalReversalReimbursement = mysqli_query($conn, $sqlTotalReversalReimbursement);

//Total Refund Commission 
$sqlTotalRefundCommission ="SELECT transaction_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'Commission' and transaction_type='refund'";
$allTotalRefundCommission = mysqli_query($conn, $sqlTotalRefundCommission);

//Total Order Commission 
$sqlTotalOrderCommission ="SELECT transaction_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'Commission' and transaction_type='order'";
$allTotalOrderCommission = mysqli_query($conn, $sqlTotalOrderCommission);

//Total FBA Transportation Fee
$sqlTotalFBAfee ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'FBA transportation fee'";
$allTotalFBAfee = mysqli_query($conn, $sqlTotalFBAfee);

//total FBA PER Units Fulfillment Fee
$sqlTotalFBAperUnits ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'FBAPerUnitFulfillmentFee'";
$alltotalFBAperUnits = mysqli_query($conn, $sqlTotalFBAperUnits);

//Total goodwill
$sqlTotoalGoodwill ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'Goodwill'";
$allTotalGoodwill = mysqli_query($conn, $sqlTotoalGoodwill);

//Total Refund Commission
$sqlTotalAmountRefundCommission ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'RefundCommission'";
$allTotalAmountRefundCommission = mysqli_query($conn, $sqlTotalAmountRefundCommission);

//Total Cost of Adversting
$sqlTotalCostAdvert ="SELECT amount_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit where amount_type='Cost of Advertising'";
$alltotalCostAdvert = mysqli_query($conn, $sqlTotalCostAdvert);

//Total Cost of Principle
$sqlTotalCostPrincipal ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'Principal'";
$alltotalCostPrincipal = mysqli_query($conn, $sqlTotalCostPrincipal);

//Total Cost of Shipping
$sqlTotalCostShipping ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'Shipping'";
$alltotalCostShipping = mysqli_query($conn, $sqlTotalCostShipping);

//Total Cost of Storage Fee
$sqlTotalCostStorage ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'Storage fee'";
$allTotalCostStorage = mysqli_query($conn, $sqlTotalCostStorage);

//dropdown Settlement
$sqlDropDownSettlementID = "SELECT * FROM `settlementsit` where total_amount";
$DropDownSettlementID = mysqli_query($conn, $sqlDropDownSettlementID);  

//SKU model sold
$sqlSkuModelSold = "
SELECT 
      sku, transaction_type, SUM(amount) AS sku_total
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
        'FBAPerUnitFulfillmentFee',
        'VariableClosingFee')

GROUP BY transaction_type , sku
ORDER BY sku_total DESC";
$allSkuModelSold = mysqli_query($conn, $sqlSkuModelSold);

$sqlSkuUnitsSold="
     SELECT DISTINCT
    sku, transaction_type, COUNT(sku) AS sku_unit_sold
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


$sqlskuRefund="
SELECT 
    transaction_type, sku, SUM(amount) AS sku_total
FROM
    settlementsit
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'Refund'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'FBAPerUnitFulfillmentFee',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'VariableClosingFee')
GROUP BY transaction_type, sku 
ORDER BY sku_total ASC";
$allSkuRefund = mysqli_query($conn, $sqlskuRefund);

$sqlskuRefundUNIT="
SELECT DISTINCT
    sku, transaction_type, COUNT(sku) AS sku_unit_refund
FROM
    settlementsit
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'refund'
        AND amount_description = 'Principal'
GROUP BY sku
ORDER BY sku_unit_refund DESC";
$allskuRefundUnit = mysqli_query($conn, $sqlskuRefundUNIT);

//$sqlSkuModelSold = "Select sku, COUNT(sku) as sku_sold, Sum(`amount`) as sku_sold_each From settlements Where amount_description ='Principal' Group by sku ORDER BY `sku_sold` DESC";


//RemovalComplete total
$sqlTotalRemovalComplete ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'RemovalComplete'";
$allTotalRemovalComplete = mysqli_query($conn, $sqlTotalRemovalComplete);

//DisposalComplete Total
$sqlTotalDisposalComplete ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'DisposalComplete'";
$allTotalDisposalComplete = mysqli_query($conn, $sqlTotalDisposalComplete);


//Finally Settlement Balance
$sqlTotalamountSettlement = "SELECT SUM(total_amount) AS 'total_amount_all_together' from settlementsit ";
$settlementTotalAmount = mysqli_query($conn, $sqlTotalamountSettlement);

//totalbalance
$sqlTotalMatch= "Select total_amount, Sum(amount) AS match_amount_sum from settlementsit";
$totalMatchResult = mysqli_query($conn, $sqlTotalMatch);

//finallmatchbalance
$sqlbalancematch ="Select total_amount, Sum(amount) AS match_amount_sum, Sum(total_amount - amount) AS total_match from settlementsit";
$allbalanceTotal = mysqli_query($conn, $sqlbalancematch);

//subscription fee
$sqlSubscriptionFee ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'Subscription Fee'";
$allSubscriptionFee = mysqli_query($conn, $sqlSubscriptionFee);

//Storage Renewal Billing total
$sqlStorageRenewalBilling ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE amount_description = 'StorageRenewalBilling'";
$allStorageRenewalBilling = mysqli_query($conn, $sqlStorageRenewalBilling);

//rburiesnet list 
$sqlSkuReversal ="SELECT amount_description, sku FROM settlementsit WHERE amount_description = 'REVERSAL_REIMBURSEMENT'";
$allskuReversal = mysqli_query($conn, $sqlSkuReversal);

//Lightning Deal Fee Amazon
$sqlLightningDealFee ="SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlementsit WHERE transaction_type = 'Lightning Deal Fee'";
$allLightningDealFee = mysqli_query($conn, $sqlLightningDealFee);

//Getting setltlement name sent by Post method
//$sql_dropdownlist = "select settlement_id, settlement_start_date, settlement_end_date, deposit_date, currency, total_amount from settlementsit where settlement_start_date and settlement_id = '" .$allsettlementreport ."'"; 
//$alldropdownlist = mysqli_query( $conn, $sql_dropdownlist);
//if(! $alldropdownlist )
//{
// die('Could not retrieve data: ' . mysql_error());
//}
 
 
//break down in each group settlement
$sqlGroupSettlementidOrder = "SELECT DISTINCT settlement_id, transaction_type , sum(amount) AS 'Each_group_Amount' FROM settlementsit WHERE transaction_type = 'order'  Group By settlement_id";
$Allgroupsettlementidorder = mysqli_query($conn, $sqlGroupSettlementidOrder);

$sqlGroupRefund = "SELECT DISTINCT settlement_id, transaction_type , sum(amount) AS 'Each_group_Amount' FROM settlementsit WHERE transaction_type = 'refund'  Group By settlement_id";
$allgrouprefund = mysqli_query($conn, $sqlGroupRefund);

//Settlement Date list
$sqldatelist = "SELECT * FROM `settlementsit` WHERE `total_amount";
$allStartandenddate = mysqli_query($conn, $sqldatelist);

//Group service fee breakdwown
$sqlgroupservicefee = "SELECT DISTINCT settlement_id, transaction_type , SUM(COALESCE(amount, 0.00)) AS 'Each_group_Amount' FROM settlementsit WHERE transaction_type = 'ServiceFee'  Group By settlement_id";
$allservicefeegroup = mysqli_query($conn, $sqlgroupservicefee);

//group service lighting fee 
$sqlLightningDealFeeGroup = "SELECT DISTINCT settlement_id, transaction_type , SUM(COALESCE(amount, 0.00)) AS 'Each_group_Amount' FROM settlementsit WHERE transaction_type = 'Lightning Deal Fee'  Group By settlement_id";
$allLightningDealFeeGroup = mysqli_query($conn, $sqlLightningDealFeeGroup);

//Group Removal item Complete
$sqlremoveitemgroup = "SELECT DISTINCT settlement_id, amount_description, SUM(COALESCE(amount, 0.00)) AS`Each_group_Amount` FROM settlementsit WHERE amount_description = 'RemovalComplete' Group By settlement_id";
$allremoveitemgroup = mysqli_query($conn, $sqlremoveitemgroup);

//Group Scubscrption Complete
$sqlSubscriptionFeegroup = "SELECT DISTINCT settlement_id, amount_description, SUM(COALESCE(amount, 0.00)) AS`Each_group_Amount` FROM settlementsit WHERE amount_description = 'Subscription Fee' Group By settlement_id";
$allSubscriptionFeegroup = mysqli_query($conn, $sqlSubscriptionFeegroup);

//group settlement
$sqlgroupsettlmentID = "SELECT DISTINCT settlement_id FROM settlementsit Group By settlement_id";
$allGroupsettlementgroupID = mysqli_query($conn, $sqlgroupsettlmentID);

//froup storage fee
$sqlgroupstoragefee = "SELECT DISTINCT settlement_id, amount_description, SUM(COALESCE(amount, 0.00)) AS`Each_group_Amount` FROM settlementsit WHERE amount_description = 'Storage fee' Group By settlement_id";
$allgroupstoragefee = mysqli_query($conn, $sqlgroupstoragefee);

//Group Reversal Reimbursement
$sqlgroupreversalreimbursement = "SELECT DISTINCT settlement_id, amount_description, SUM(amount) AS`Each_group_Amount` FROM settlementsit WHERE amount_description = 'REVERSAL_REIMBURSEMENT' Group By settlement_id";
$allgroupreversalreimbursement = mysqli_query($conn, $sqlgroupreversalreimbursement);

//Warehouse damage
$sqlgroupwarehousedamage = "SELECT DISTINCT settlement_id, amount_description, SUM(amount) AS`Each_group_Amount` FROM settlementsit WHERE amount_description = 'WAREHOUSE_DAMAGE' Group By settlement_id";
$allgroupwarehousedamage = mysqli_query($conn, $sqlgroupwarehousedamage);

//grouptotalamount
$sqltotalamountgroup = "
SELECT 
    settlement_id,
    settlement_start_date,
    settlement_end_date,
    total_amount
FROM
    settlementsit
GROUP BY settlement_id
ORDER BY settlement_start_date DESC
";
$allgrouptotalamount = mysqli_query($conn, $sqltotalamountgroup);

//grouptotalmatch
$sqlgrouptotalmatch = "
SELECT 
    total_amount, SUM(amount) AS total_match_amount_sum
FROM
    settlementsit
GROUP BY settlement_id
ORDER BY settlement_start_date DESC
";
$grouptotalmatch = mysqli_query($conn, $sqlgrouptotalmatch);

//groupbalancematch
$sqlgroupbalancematch = "
SELECT 
    total_amount,
    SUM(amount) AS match_amount_sum,
    SUM(total_amount - amount) AS total_match
FROM
    settlementsit
GROUP BY settlement_id
ORDER BY settlement_start_date DESC
";
$groupbalancematch = mysqli_query($conn, $sqlgroupbalancematch);



$sqlGroupEachAmount = "
SELECT 
    settlement_id,
    settlement_start_date,
    settlement_end_date,
    total_amount,
    transaction_type,
    amount_description,
    SUM(amount) AS `Each_group_Amount`
FROM
    settlementsit
WHERE
    transaction_type = 'order'
        OR transaction_type = 'refund'
        OR transaction_type = 'ServiceFee'
        OR transaction_type = ''
        OR amount_description = 'REVERSAL_REIMBURSEMENT'
        OR amount_description = 'RemovalComplete'
        OR amount_description = 'Storage Fee'
        OR amount_description = 'LightningDealFee'
        OR amount_description = 'Subscription Fee'
        OR amount_description = 'StorageRenewalBilling'
        OR amount_description = 'WAREHOUSE_DAMAGE'
        OR amount_description = 'DisposalComplete'
        OR amount_description = 'StorageRenewalBilling'
        OR amount_description = 'Missing From Inbound'
        OR amount_description = 'MULTICHANNEL_ORDER_LOST'
GROUP BY settlement_id ASC , transaction_type , amount_description

";
$Groupresult = mysqli_query($conn, $sqlGroupEachAmount);
$settlementIDresult = mysqli_query($conn, $sqlGroupEachAmount);
$GroupTotalamount = mysqli_query($conn, $sqlGroupEachAmount);
$grouptotalorder = mysqli_query($conn, $sqlGroupEachAmount);
$grouptotalorder1 = mysqli_query($conn, $sqlGroupEachAmount);


$sqlBreakdownAmountGroup ="
SELECT 
    amount_description,
    SUM(amount) AS `Each_group_Amount`
FROM
    settlementsit
WHERE
    transaction_type = 'order'
        OR transaction_type = 'refund'
        OR transaction_type = 'ServiceFee'
        OR transaction_type = ''
        OR amount_description = 'REVERSAL_REIMBURSEMENT'
        OR amount_description = 'RemovalComplete'
        OR amount_description = 'Storage Fee'
        OR amount_description = 'LightningDealFee'
        OR amount_description = 'Subscription Fee'
        OR amount_description = 'StorageRenewalBilling'
        OR amount_description = 'WAREHOUSE_DAMAGE'
        OR amount_description = 'DisposalComplete'
        OR amount_description = 'StorageRenewalBilling'
        OR amount_description = 'Missing From Inbound'
        OR amount_description = 'MULTICHANNEL_ORDER_LOST'
GROUP BY settlement_id ASC ,  amount_description ASC

";


$sqlbreakdowntransaction_type ="
SELECT 
    settlement_id,
    total_amount,
    transaction_type,
    amount_description,
    SUM(amount) AS `Each_group_Amount`
FROM
    settlementsit
WHERE
    transaction_type = 'order'
        OR transaction_type = 'Refund'
        OR transaction_type = 'ServiceFee'
	OR transaction_type = 'other-transaction'
       
        
GROUP BY settlement_id ASC ,  transaction_type ASC
";

$sqlbreakdowntransaction_column ="
SELECT settlement_id, 
    settlement_start_date,
    settlement_end_date,
    total_amount,
    SUM(IF(transaction_type = 'order',amount,0)) AS 'Order',
    SUM(IF(transaction_type = 'refund',amount,0)) AS 'Refund',
    SUM(IF(transaction_type = 'ServiceFee',amount,0)) AS 'Servicefee',
    SUM(IF(amount_description = 'REVERSAL_REIMBURSEMENT',amount,0)) AS 'REVERSAL_REIMBURSEMENT',
    SUM(IF(amount_description = 'RemovalComplete',amount,0)) AS 'RemovalComplete',
    SUM(IF(amount_description = 'Storage Fee',amount,0)) AS 'Storage Fee',
    SUM(IF(amount_description = 'LightningDealFee',amount,0)) AS 'LightningDealFee',
    SUM(IF(amount_description = 'Subscription Fee',amount,0)) AS 'Subscription Fee',
    SUM(IF(amount_description = 'StorageRenewalBilling',amount,0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'WAREHOUSE_DAMAGE',amount,0)) AS 'WAREHOUSE_DAMAGE',
    SUM(IF(amount_description = 'DisposalComplete',amount,0)) AS 'DisposalComplete',
    SUM(IF(amount_description = 'StorageRenewalBilling',amount,0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'Missing From Inbound',amount,0)) AS 'Missing From Inbound',
    SUM(IF(amount_description = 'MULTICHANNEL_ORDER_LOST',amount,0)) AS 'MULTICHANNEL_ORDER_LOST'

FROM settlementsit
GROUP BY settlement_id
ORDER BY settlement_start_date DESC
";


//total amount settlement breakdown
$sqlTotalSettlementBreakdown = "
SELECT settlement_id, 
    SUM(total_amount) As 'total_amount',
    SUM(IF(transaction_type = 'order',amount,0)) AS 'Order',
    SUM(IF(transaction_type = 'refund',amount,0)) AS 'Refund',
    SUM(IF(transaction_type = 'ServiceFee',amount,0)) AS 'Servicefee',
    SUM(IF(amount_description = 'REVERSAL_REIMBURSEMENT',amount,0)) AS 'REVERSAL_REIMBURSEMENT',
    SUM(IF(amount_description = 'RemovalComplete',amount,0)) AS 'RemovalComplete',
    SUM(IF(amount_description = 'Storage Fee',amount,0)) AS 'Storage Fee',
    SUM(IF(amount_description = 'LightningDealFee',amount,0)) AS 'LightningDealFee',
    SUM(IF(amount_description = 'Subscription Fee',amount,0)) AS 'Subscription Fee',
    SUM(IF(amount_description = 'StorageRenewalBilling',amount,0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'WAREHOUSE_DAMAGE',amount,0)) AS 'WAREHOUSE_DAMAGE',
    SUM(IF(amount_description = 'DisposalComplete',amount,0)) AS 'DisposalComplete',
    SUM(IF(amount_description = 'StorageRenewalBilling',amount,0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'Missing From Inbound',amount,0)) AS 'Missing From Inbound',
    SUM(IF(amount_description = 'MULTICHANNEL_ORDER_LOST',amount,0)) AS 'MULTICHANNEL_ORDER_LOST'

FROM settlementsit";
?>