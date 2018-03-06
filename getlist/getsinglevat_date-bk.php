<?php

$allsettlementreport = $_GET['ACTIVITY_PERIOD'];

include ('../sql/europeeachsettlementsql.php');

//Getting setltlement name sent by Post method
$sql_dropdownlist = "select 
SELECT 
    MARKETPLACE,
    ACTIVITY_PERIOD,
    SALE_ARRIVAL_COUNTRY,
    #tbl_countries.Country,
    VAT_Standard_Rate,
    Format (SUM(COALESCE(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)+(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)/(VAT_Standard_Rate + 1)-(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)),2) AS 'NET',
    Format (SUM(COALESCE((TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)-(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)/(VAT_Standard_Rate + 1))),2) AS 'VAT',
    Format (SUM(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL),2) AS 'Total',
    TRANSACTION_CURRENCY_CODE 
FROM
    amazon.tbl_vat
INNER JOIN tbl_countries
INNER JOIN tbl_vat_rate
ON amazon.tbl_vat.SALE_ARRIVAL_COUNTRY=tbl_countries.alpha_2 AND tbl_countries.Country=tbl_vat_rate.Country_of_Purchase
Where ACTIVITY_PERIOD  = '" . $allsettlementreport . "'
GROUP BY SALE_ARRIVAL_COUNTRY,TRANSACTION_CURRENCY_CODE  
HAVING TRANSACTION_CURRENCY_CODE  IS NOT NULL AND LENGTH(TRANSACTION_CURRENCY_CODE) > 0;
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
    echo "<th >MARKETPLACE</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['MARKETPLACE'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>ACTIVITY_PERIOD</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['ACTIVITY_PERIOD']; 
    echo "</td></tr>";

    
    
    echo "<tr> ";
    echo "<th>SALE_ARRIVAL_COUNTRY</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['SALE_ARRIVAL_COUNTRY'];
    echo "</td></tr>";


    echo "</tr></thead>";
    echo "</table>";
}
?>

