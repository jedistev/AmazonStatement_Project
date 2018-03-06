<?php

require('config/config.php');


$sqlVatArrivalCountry = "
SELECT 
    MARKETPLACE,
    ACTIVITY_PERIOD,
    SALE_ARRIVAL_COUNTRY,
    tbl_countries.Country AS 'Country',
    VAT_Standard_Rate,
    Format (SUM(COALESCE(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)+(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)/(VAT_Standard_Rate + 1)-(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)),2) AS 'NET',
    Format (SUM(COALESCE((TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)-(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)/(VAT_Standard_Rate + 1))),2) AS 'VAT',
	Format (SUM(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL),2) AS 'Total',
    TRANSACTION_CURRENCY_CODE as 'Currency'
FROM
    amazon.tbl_vat
INNER JOIN tbl_countries
INNER JOIN tbl_vat_rate
ON amazon.tbl_vat.SALE_ARRIVAL_COUNTRY=tbl_countries.alpha_2 AND tbl_countries.Country=tbl_vat_rate.Country_of_Purchase
Where MARKETPLACE  not like 'amazon.co.uk' 
GROUP BY tbl_countries.Country 
HAVING TRANSACTION_CURRENCY_CODE  IS NOT NULL AND LENGTH(TRANSACTION_CURRENCY_CODE) > 0 ";
$VatArrivalCountry = mysqli_query($conn, $sqlVatArrivalCountry);



$sqlVatArrivalCountryGBP = "
SELECT 
    MARKETPLACE,
    ACTIVITY_PERIOD,
    SALE_ARRIVAL_COUNTRY,
    tbl_countries.Country AS 'Country',
    VAT_Standard_Rate,
    Format (SUM(COALESCE(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)+(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)/(VAT_Standard_Rate + 1)-(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)),2) AS 'NET',
    Format (SUM(COALESCE((TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)-(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL)/(VAT_Standard_Rate + 1))),2) AS 'VAT',
	Format (SUM(TOTAL_ACTIVITY_VALUE_AMT_VAT_INCL),2) AS 'Total',
    TRANSACTION_CURRENCY_CODE as 'Currency'
FROM
    amazon.tbl_vat
INNER JOIN tbl_countries
INNER JOIN tbl_vat_rate
ON amazon.tbl_vat.SALE_ARRIVAL_COUNTRY=tbl_countries.alpha_2 AND tbl_countries.Country=tbl_vat_rate.Country_of_Purchase
Where MARKETPLACE like 'amazon.co.uk'
GROUP BY tbl_countries.Country 
HAVING total IS NOT NULL AND LENGTH(total) > 0 ";
$VatArrivalCountryGBP = mysqli_query($conn, $sqlVatArrivalCountryGBP);


$sqlallVATlist = "
SELECT 
    MARKETPLACE,
    ACTIVITY_PERIOD,
    SALE_ARRIVAL_COUNTRY,
    tbl_countries.Country,
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
GROUP BY SALE_ARRIVAL_COUNTRY,TRANSACTION_CURRENCY_CODE  
HAVING TRANSACTION_CURRENCY_CODE  IS NOT NULL AND LENGTH(TRANSACTION_CURRENCY_CODE) > 0";

$allVatListCountry = mysqli_query($conn, $sqlallVATlist);
?>