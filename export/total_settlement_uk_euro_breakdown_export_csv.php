<?php

// Database Connection
include ('../sql/mainSql-uk-euro.php');

// filename for export
$csv_filename = 'Total_Settlement_Breakdown_UK_in_Euro_'.date('Y-m-d').'.csv';
 
// get Users
$query = "SELECT 
    Sum(total_amount),
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

FROM settlementsukeuro";
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
header("Content-Disposition: attachment; filename=".$csv_filename."");
$output = fopen('php://output', 'w');
fputcsv($output, array('total_amount','Order','Refund','ServiceFee','REVERSAL_REIMBURSEMENT',
    'RemovalComplete','Storage Fee','LightningDealFee','Subscription Fee','StorageRenewalBilling',
    'WAREHOUSE_DAMAGE','DisposalComplete','StorageRenewalBilling','Missing From Inbound','MULTICHANNEL_ORDER_LOST'));
 
if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>