<?php

$allsettlementreport = $_GET['SettlementID'];

include ('../../../config/sqlsku.php');


//Getting setltlement name sent by Post method
$sql_dropdownlist = "SELECT 
      sku, transaction_type, SUM(amount) AS sku_total, settlement_id
FROM
    settlements
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'refund'
        AND amount_description IN ('Principal' , 'Commission',
        'RefundCommission',
        'Goodwill',
        'Shipping',
        'ShippingChargeback',
        'FBAPerUnitFulfillmentFee',
        'VariableClosingFee')

GROUP BY settlement_id = '" . $allsettlementreport . "'";
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
    echo "<th>Total Amount</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['sku'];
    echo "</td></tr>";


    echo "<tr> ";
    echo "<th>SKU</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['sku_total'];
    echo "</td></tr>";

   echo "<tr> ";
    echo "<th>Transcation</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['transaction_type'];
    echo "</td></tr>";
    


    echo "</tr></thead>";
    echo "</table>";
}
?>

