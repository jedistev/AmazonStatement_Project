<table class="table table-bordered table-condensed table-responsive">
    <tr>
        <th style="width:12%;">Marketplace</th>
        <th style="width:10%;">Date</th>
        <th style="width:11%;">Transaction Type</th>
        <th style="width:10%;">Total</th>
        <th style="width:10%;">Currency</th>
        
    </tr>
</table>

<?php

$allsettlementreport = $_GET['vatdateID'];
include ('../sql/europeeachsettlementsql.php');

//Getting setltlement name sent by Post method
$sql_dropdownlist = "
Select
    ACTIVITY_PERIOD,
    MARKETPLACE,
    TRANSACTION_TYPE,
    sum(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL) as 'Total',
    TRANSACTION_CURRENCY_CODE 
FROM
    amazon.tbl_vat
WHERE
    MARKETPLACE  = '" . $allsettlementreport . "'
Group by
	TRANSACTION_TYPE, ACTIVITY_PERIOD
order by 
	ACTIVITY_PERIOD";
$alldropdownlist = mysqli_query($conn, $sql_dropdownlist);

if (!$alldropdownlist) {
    die('Could not retrieve data: ' . mysql_error());
}

//Displaying fetched records to HTML table 
// Using mysql_fetch_array() to get the next row until end of table rows
while ($row = mysqli_fetch_array($alldropdownlist)) {

    // Print out the contents of each row into a table

    echo '<table class="table table-bordered table-hover table-condensed table-responsive">';
//    echo '<tr>';
//    echo '<th>Marketplace</th>';
//    echo '<th>Date</th>';
//    echo '<th>Transaction Type</th>';
//    echo '<th>Total</th>';
//    echo '</tr>';
    echo '<tr>';
    echo '<td style="width:12%;">' . $row['MARKETPLACE'] . '</td>';
    echo '<td style="width:10%;">' . $row['ACTIVITY_PERIOD'] . '</td>';
    echo '<td style="width:11%;">' . $row['TRANSACTION_TYPE'] . '</td>';
    echo '<td style="width:10%;">' . $row['Total'] . '</td>';
    echo '<td style="width:10%;">' . $row['TRANSACTION_CURRENCY_CODE'] . '</td>';
 
    echo '</tr>';
    echo '</table>';
}
?>


