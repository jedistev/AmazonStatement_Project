<?php
// Database Connection
$totalbarformatbreakdownchart = "SELECT settlement_id, 
    settlement_id,
    CONCAT(settlement_start_date,
            ' - ',
            settlement_end_date) AS 'Date',
    SUM(total_amount) As 'Total Amount',
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

FROM settlements";
$Resultbarformatbreakdownchart = mysqli_query($conn, $totalbarformatbreakdownchart);
?> 

<script>
var data = new google.visualization.DataTable();
data.addColumn('string', 'Department');
data.addColumn('number', 'Revenues');
data.addRows([
  ['Shoes', 10700],
  ['Sports', -15400],
  ['Toys', 12500],
  ['Electronics', -2100],
  ['Food', 22600],
  ['Art', 1100]
]);

var table = new google.visualization.Table(document.getElementById('barformat_div'));

var formatter = new google.visualization.BarFormat({width: 120});
formatter.format(data, 1); // Apply formatter to second column

table.draw(data, {allowHtml: true, showRowNumber: true, width: '100%', height: '100%'});
</script>
<!--<script>
   var data = new google.visualization.DataTable();
data.addColumn('number', 'Total Amount');
data.addColumn('string', 'Details ');

data.addRows([
  ['Total Amount', 
 <?php
//while ($row = mysqli_fetch_array($Resultbarformatbreakdownchart)) {
//    echo "['" . $row['Total Amount'] . "'],";
//}
?>],
  ['Order', -15400],
  ['Refund', 12500],
  ['Servicefee', -2100],
  ['REVERSAL_REIMBURSEMENT', 22600],
  ['RemovalComplete', 10700],
  ['Storage Fee', -15400],
  ['LightningDealFee', 12500],
  ['Subscription Fee', -2100],
  ['StorageRenewalBilling', 22600],
  ['WAREHOUSE_DAMAGE', 10700],
  ['DisposalComplete', -15400],
  ['StorageRenewalBilling', 12500],
  ['Missing From Inbound', -2100],
  ['MULTICHANNEL_ORDER_LOST', 1100]
]);

var table = new google.visualization.Table(document.getElementById('barformat_div'));

var formatter = new google.visualization.BarFormat({width: 120});
formatter.format(data, 0); // Apply formatter to second column

table.draw(data, {allowHtml: true, showRowNumber: true, width: '100%', height: '100%'});
</script>-->
