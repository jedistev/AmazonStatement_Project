<?php

$allsettlementreport = $_GET['SettlementID'];
include ('../sql/europeeachsettlementsql.php');


//Getting setltlement name sent by Post method
$sql_dropdownlist = "select 
SELECT 
     date_format(`snapshot-date`, '%d/%m/%Y') as `snapshot-date`,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    country
FROM
    `tbl-sku-quantity 
    
    where date  = '" . $allsettlementreport . "'";
$alldropdownlist = mysqli_query($conn, $sql_dropdownlist);

if (!$alldropdownlist) {
    die('Could not retrieve data: ' . mysql_error());
}

//Displaying fetched records to HTML table 
// Using mysql_fetch_array() to get the next row until end of table rows
while ($row = mysqli_fetch_array($alldropdownlist)) {

    // Print out the contents of each row into a table

    echo "<h2 class='text-center'>SKU TESTING</h2><table class='table table-bordered table-striped table-hover table-condensed table-responsive'>";
    echo "<thead>";
    echo "<tr> ";
    echo "<th > </th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['date'];
    echo "</td></tr>";

    echo "</tr></thead>";
    echo "</table>";
}
?>

