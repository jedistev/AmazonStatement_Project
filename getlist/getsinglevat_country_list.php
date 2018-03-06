<?php

$allsettlementreport = $_GET['VATCountryID'];
include ('../sql/europeeachsettlementsql.php');

//Getting setltlement name sent by Post method
$sql_dropdownlist = "select 

    MARKETPLACE,
    ACTIVITY_PERIOD,
    SALE_ARRIVAL_COUNTRY,
    tbl_countries.Country,
    VAT_Standard_Rate,
    Format (SUM(COALESCE(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)+(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)/(VAT_Standard_Rate + 1)-(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)),2) AS 'NET',
    Format (SUM(COALESCE((TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)-(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)/(VAT_Standard_Rate + 1))),2) AS 'VAT',
    Format (SUM(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL),2) AS 'Total',
    TRANSACTION_CURRENCY_CODE 
From    
amazon.tbl_vat 
INNER JOIN amazon.tbl_countries
INNER JOIN amazon.tbl_vat_rate
ON amazon.tbl_vat.SALE_ARRIVAL_COUNTRY=tbl_countries.alpha_2 AND tbl_countries.Country=tbl_vat_rate.Country_of_Purchase
  where SALE_ARRIVAL_COUNTRY = '" . $allsettlementreport . "'
GROUP BY SALE_ARRIVAL_COUNTRY,TRANSACTION_CURRENCY_CODE,ACTIVITY_PERIOD   
HAVING TRANSACTION_CURRENCY_CODE  IS NOT NULL AND LENGTH(TRANSACTION_CURRENCY_CODE) > 0
Order by SALE_ARRIVAL_COUNTRY ASC";
$alldropdownlist = mysqli_query($conn, $sql_dropdownlist);

if (!$alldropdownlist) {
    die('Could not retrieve data: ' . mysql_error());
}

//Displaying fetched records to HTML table 
// Using mysql_fetch_array() to get the next row until end of table rows
while ($row = mysqli_fetch_array($alldropdownlist)) {

    // Print out the contents of each row into a table

    echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
    echo '<tr>';
    echo '<th>Marketplace</th>';
    echo '<th>Date</th>';
    echo '<th>Country Code</th>';
    echo '<th>Country</th>';
    echo '<th>Net</th>';
    echo '<th>VAT</th>';
    echo '<th>Total</th>';
    echo '<th>Currency</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td style="width:10%;">' . $row['MARKETPLACE'] . '</td>';
    echo '<td style="width:10%;">' . $row['ACTIVITY_PERIOD'] . '</td>';
    echo '<td style="width:11%;">' . $row['SALE_ARRIVAL_COUNTRY'] . '</td>';
    echo '<td style="width:12%;">' . $row['Country'] . '</td>';
    echo '<td style="width:10%;">' . $row['NET'] . '</td>';
    echo '<td style="width:10%;">' . $row['VAT'] . '</td>';
    echo '<td style="width:10%;">' . $row['Total'] . '</td>';
    echo '<td style="width:10%;">' . $row['TRANSACTION_CURRENCY_CODE'] . '</td>';

    echo '</tr>';
    echo '</table>';
}
?>


