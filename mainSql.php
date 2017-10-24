<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amazon";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//all table 
$sql = "SELECT * FROM settlements";

//sku model list   
$skuResult = mysqli_query($conn, 'SELECT DISTINCT sku FROM settlements');

//total Cost and Settlement Date list
$totalResult = mysqli_query($conn, 'SELECT * FROM `settlements` WHERE `total_amount`');

//show all the Cost on each table 
$sqlCostAmount = "SELECT `currency`,SUM(COALESCE(total_amount, 0.00)) AS`total_amount_sum` FROM `settlements` WHERE `total_amount`";
$allamountresult = mysqli_query($conn, $sqlCostAmount);

//Principle on Promotion 
$sqlPromotion = "SELECT  Settlement_ID,amount_description,amount_type,amount FROM amazon.settlements Where amount_type='Promotion' and amount_description='Principal'";
$allPrincipal = mysqli_query($conn, $sqlPromotion);

//total on Promoted cost
$sqlPromotionAmount = "SELECT SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM `settlements` WHERE `amount` and amount_description='Principal' and amount_type='Promotion'";
$allPromotedPrincipal = mysqli_query($conn, $sqlPromotionAmount);

//total on Shipping Cost
$sqlshipping = "SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM `settlements` WHERE `amount` and amount_description='shipping'  ";
$allshippingAmount = mysqli_query($conn, $sqlshipping);

//total Shipping chargeback
$sqlShippingback = "SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description='shippingChargeback'";
$allShippingChargeback = mysqli_query($conn, $sqlShippingback);

//List Service fee 
$sqlListServiceFee = "SELECT settlement_id, transaction_type, amount FROM amazon.settlements WHERE transaction_type = 'ServiceFee'";
$allListServiceFee = mysqli_query($conn, $sqlListServiceFee);

//Total Service fee
$sqlServiceFee = "SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE transaction_type = 'ServiceFee'";
$allServiceFee = mysqli_query($conn, $sqlServiceFee);

//Total Refund fee
$sqlTotalRefundfee = "SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE transaction_type = 'Refund'";
$allrefundFee = mysqli_query($conn, $sqlTotalRefundfee);

//Total Order Fee
$sqlTotalOrder = " SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE transaction_type = 'order'";
$AllTotalFee = mysqli_query($conn, $sqlTotalOrder);

//another Transation
$sqlTransationOther ="SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE transaction_type = 'other-transaction'";
$AllOtherTransation = mysqli_query($conn, $sqlTransationOther);

//Each Statement ID with Refund total fee need more work on it.
$sqlStatmentfund ="SELECT settlement_id ,  transaction_type, currency, sum(COALESCE(amount, 0.00)) AS`Amount_Refund` FROM Settlements GROUP BY Settlement_id AND transaction_type = 'Refund'";
$eachStatmentRefund = mysqli_query($conn, $sqlStatmentfund);

//Warehouse Damage Total 
$sqlWarehouseDamageTotal ="SELECT transaction_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'WAREHOUSE_DAMAGE'";
$allWarehouseDamageTotal = mysqli_query($conn, $sqlWarehouseDamageTotal);

//Total Reversal Reimbursement
$sqlTotalReversalReimbursement ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`Reversal_amount_sum` FROM settlements WHERE amount_description = 'REVERSAL_REIMBURSEMENT'";
$allTotalReversalReimbursement = mysqli_query($conn, $sqlTotalReversalReimbursement);

//Total Refund Commission 
$sqlTotalRefundCommission ="SELECT transaction_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Commission' and transaction_type='refund'";
$allTotalRefundCommission = mysqli_query($conn, $sqlTotalRefundCommission);

//Total Order Commission 
$sqlTotalOrderCommission ="SELECT transaction_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Commission' and transaction_type='order'";
$allTotalOrderCommission = mysqli_query($conn, $sqlTotalOrderCommission);

//Total FBA Transportation Fee
$sqlTotalFBAfee ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'FBA transportation fee'";
$allTotalFBAfee = mysqli_query($conn, $sqlTotalFBAfee);

//total FBA PER Units Fulfillment Fee
$sqlTotalFBAperUnits ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'FBAPerUnitFulfillmentFee'";
$alltotalFBAperUnits = mysqli_query($conn, $sqlTotalFBAperUnits);

//Total goodwill
$sqlTotoalGoodwill ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Goodwill'";
$allTotalGoodwill = mysqli_query($conn, $sqlTotoalGoodwill);

//Total Refund Commission
$sqlTotalAmountRefundCommission ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'RefundCommission'";
$allTotalAmountRefundCommission = mysqli_query($conn, $sqlTotalAmountRefundCommission);

//Total Cost of Adversting
$sqlTotalCostAdvert ="SELECT amount_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements where amount_type='Cost of Advertising'";
$alltotalCostAdvert = mysqli_query($conn, $sqlTotalCostAdvert);

//Total Cost of Principle
$sqlTotalCostPrincipal ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Principal'";
$alltotalCostPrincipal = mysqli_query($conn, $sqlTotalCostPrincipal);

//Total Cost of Shipping
$sqlTotalCostShipping ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Shipping'";
$alltotalCostShipping = mysqli_query($conn, $sqlTotalCostShipping);

//Total Cost of Storage Fee
$sqlTotalCostStorage ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Storage fee'";
$allTotalCostStorage = mysqli_query($conn, $sqlTotalCostStorage);

//dropdown Settlement
$sqlDropDownSettlementID = "SELECT * FROM `settlements` where total_amount";
$DropDownSettlementID = mysqli_query($conn, $sqlDropDownSettlementID);  

//SKU model sold
$sqlSkuModelSold ="Select sku, COUNT(sku) as sku_sold, Sum(`amount`) as sku_sold_each From settlements Where amount_description ='Principal' Group by sku ORDER BY `sku_sold` DESC";
$allSkuModelSold =mysqli_query($conn, $sqlSkuModelSold);

//RemovalComplete total
$sqlTotalRemovalComplete ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'RemovalComplete'";
$allTotalRemovalComplete = mysqli_query($conn, $sqlTotalRemovalComplete);

//DisposalComplete Total
$sqlTotalDisposalComplete ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'DisposalComplete'";
$allTotalDisposalComplete = mysqli_query($conn, $sqlTotalDisposalComplete);

//Finally Settlement Balance
$sqlTotalamountSettlement ="select settlement_start_date,settlement_end_date, total_amount from settlements WHERE `total_amount`";
$SettlementTotalAmount = mysqli_query($conn, $sqlTotalamountSettlement);

//totalbalance
$sqlTotalMatch= "Select total_amount, Sum(amount) AS match_amount_sum from settlements";
$totalMatchResult = mysqli_query($conn, $sqlTotalMatch);

//finallmatchbalance
$sqlbalancematch ="Select total_amount, Sum(amount) AS match_amount_sum, Sum(total_amount - amount) AS total_match from settlements";
$allbalanceTotal = mysqli_query($conn, $sqlbalancematch);

//subscription fee
$sqlSubscriptionFee ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Subscription Fee'";
$allSubscriptionFee = mysqli_query($conn, $sqlSubscriptionFee);

//Storage Renewal Billing total
$sqlStorageRenewalBilling ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'StorageRenewalBilling'";
$allStorageRenewalBilling = mysqli_query($conn, $sqlStorageRenewalBilling);

//rburiesnet list 
$sqlSkuReversal ="SELECT amount_description, sku FROM settlements WHERE amount_description = 'REVERSAL_REIMBURSEMENT'";
$allskuReversal = mysqli_query($conn, $sqlSkuReversal);

//Lightning Deal Fee Amazon
$sqlLightningDealFee ="SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE transaction_type = 'Lightning Deal Fee'";
$allLightningDealFee = mysqli_query($conn, $sqlLightningDealFee);

//Getting setltlement name sent by Post method
$sql_dropdownlist = "select settlement_id, settlement_start_date, settlement_end_date, deposit_date, currency, total_amount from settlements where settlement_start_date and settlement_id = '" .$allsettlementreport ."'"; 
$alldropdownlist = mysqli_query( $conn, $sql_dropdownlist);
 
if(! $alldropdownlist )
{
  die('Could not retrieve data: ' . mysql_error());
}
 
?>