<?php

$allsettlementreport = $_GET['SettlementID'];
include ('../sql/europeeachsettlementsql.php');


//Getting setltlement name sent by Post method
$sql_dropdownlist = "SELECT 
    settlement_id,
    tbl_list_sku.Product_code as 'Product_code', 
    settlementses.sku as 'Settlement_sku', 
    tbl_list_sku.sku as 'list_sku', 
    tbl_list_sku.model_code,
    SUM(IF (transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) AS 'Total_Order_Quantity',
    SUM(IF( amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0)) AS 'Total_Reimbursement_Quantity', 
    SUM((IF( transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) + (IF( amount_type = 'FBA Inventory Reimbursement' AND amount_description = 'REVERSAL_REIMBURSEMENT', quantity_purchased, 0))) AS 'Total_Quantity',
    SUM((transaction_type = 'Refund'
        AND amount_description = 'Principal'
        AND amount_type = 'ItemPrice')) AS Total_Refund_Quantity
	

FROM settlementses
INNER JOIN tbl_list_sku
ON settlementses.sku=tbl_list_sku.sku
Where settlement_id  = '" . $allsettlementreport . "'
GROUP BY tbl_list_sku.Product_code
HAVING Settlement_sku IS NOT NULL AND LENGTH(Settlement_sku) > 0
Order by Settlement_sku ASC";
$alldropdownlist = mysqli_query($conn, $sql_dropdownlist);

if (!$alldropdownlist) {
    die('Could not retrieve data: ' . mysql_error());
}


//Displaying fetched records to HTML table 
// Using mysql_fetch_array() to get the next row until end of table rows
while ($row = mysqli_fetch_array($alldropdownlist)) {

    // Print out the contents of each row into a table

    echo "<table class='table table-bordered table-striped table-hover table-condensed table-responsive'>";
    echo "<thead>";
    echo "<tr> ";
    echo "<td style='width:30%'>";
    echo $row['Product_code'];
    echo "</td><td  style='width:15%'class='table-smaller-text OTY-color-bg'>";
    echo $row['Total_Order_Quantity'];
    echo "</td><td style='width:15%' class='table-smaller-text QTY-color-bg-reim'>";
    echo $row['Total_Reimbursement_Quantity'];
    echo "</td><td  style='width:15%' class='table-smaller-text QTY-color-bg-TQTY'>";
    echo $row['Total_Quantity'];
    echo "</td><td  style='width:15%' class='table-smaller-text QTY-color-bg-refund'>";
    echo $row['Total_Refund_Quantity'];
    echo "</td></tr>";
    echo "</tr></thead>";
    echo "</table>";
}


