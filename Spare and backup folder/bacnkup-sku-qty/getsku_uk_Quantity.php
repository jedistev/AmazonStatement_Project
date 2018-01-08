<?php

$allsettlementreport = $_GET['SettlementID'];
include ('../../../config/sqlsku.php');


//Getting setltlement name sent by Post method
$sql_dropdownlist = "select 
    `snapshot_date`,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    country
FROM
    `tbl-sku-quantity`
where
	    `snapshot_date`= '" . $allsettlementreport . "'";
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
    echo $row['snapshot_date'];
    echo "</td></tr>";


    echo "<tr> ";
    echo "<th>Total Amount</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['sku'];
    echo "</td></tr>";


    echo "<tr> ";
    echo "<th>Order</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['product-name'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Refund</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['detailed-disposition'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Service Fee Adversting</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['country'];
    echo "</td></tr>";

    


    echo "</tr></thead>";
    echo "</table>";
}
?>

