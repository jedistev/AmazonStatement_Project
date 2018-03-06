<?php

$allsettlementreport = $_GET['ACTIVITY_PERIOD'];
include ('../sql/europeeachsettlementsql.php');


//Getting setltlement name sent by Post method
$sql_dropdownlist = "select 
    *


    from `tbl_vat`
    
    where settlement_id  = '" . $allsettlementreport . "'";
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
    echo "<th >Settlement ID</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['settlement_id'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Date</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['settlement_start_date']; 
    echo " &minus; "; 
    echo $row['settlement_end_date'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Total Amount</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['total_amount'];
    echo "</td></tr>";


    echo "<tr> ";
    echo "<th>Order</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Order'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Refund</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Refund'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Service Fee Adversting</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Servicefee'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Reversal Reimbursment</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['REVERSAL_REIMBURSEMENT'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Removal Complete</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['RemovalComplete'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Storage Fee</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Storage Fee'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Lightning Deal Fee</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['LightningDealFee'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Subscription Fee</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Subscription Fee'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Storage Renewal Billing</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['StorageRenewalBilling'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>WAREHOUSE DAMAGE</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['WAREHOUSE_DAMAGE'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Disposal Complete</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['DisposalComplete'];
    echo "</td></tr>";

    echo "<th>StorageRenewalBilling</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['StorageRenewalBilling'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Missing From Inbound</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Missing From Inbound'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Multichannel Order Lost</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['MULTICHANNEL_ORDER_LOST'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th class='text-primary'>Total of Settlement cost and match Balance</th> ";
    echo "<td class='table-smaller-text'>";
    echo "</td></tr>";
    
    echo "<tr> ";
    echo "<th>Total Amount</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['total_amount'];
    echo "</td></tr>";
    
    echo "<tr> ";
    echo "<th>Transcation Amount</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Transcation_Amount'];
    echo "</td></tr>";
    
    echo "<tr> ";
    echo "<th>Differnce</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Differnce'];
    echo "</td></tr>";


    echo "</tr></thead>";
    echo "</table>";
}
?>

