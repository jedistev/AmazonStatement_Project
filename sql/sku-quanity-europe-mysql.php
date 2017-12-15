<?php

require('config/config.php');



$sqlskuQuantity = "
SELECT 
    Distinct sku,
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    fnsku,
    `product-name`,
    quantity,
    `fulfillment-center-id`,
    `detailed-disposition`,
    country
FROM
    `tbl_sku_quantity`
Where 
	country='GB'";
$AllTableSKUQTY = mysqli_query($conn, $sqlskuQuantity);


$sqlskuQuantity1 = "
SELECT 
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    fnsku,
    sku,
    `product-name`,
    quantity,
    `fulfillment-center-id`,
    `detailed-disposition`,
    country
FROM
    `tbl_sku_quantity`";
$AllTableSKUQTY1 = mysqli_query($conn, $sqlskuQuantity1);

$sqlskuQuantityDamaged = "SELECT 
    Distinct `fulfillment-center-id`,
    sku,
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    fnsku,
    `product-name`,
    quantity,
    `detailed-disposition`,
    country
FROM
    `tbl_sku_quantity`
Where 
	country='GB'
	AND  `detailed-disposition`NOT LIKE 'SELLABLE'
Order by 
     quantity DESC";

$AllTableSKUQTYdamaged = mysqli_query($conn, $sqlskuQuantityDamaged);

$sqlskuDefectiveIT = "
SELECT 
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    country
FROM
    `tbl_sku_quantity`
WHERE
    country = 'IT'
    AND`detailed-disposition` ='DEFECTIVE'        
GROUP BY `sku`
ORDER BY  quantity DESC";
$allSkuDefectiveIT = mysqli_query($conn, $sqlskuDefectiveIT);


$sqlskuWHSE_DAMAGEDIT = "
SELECT 
    date_format(snapshot_date, '%d/%m/%Y') as snapshot_date,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    quantity,
    country
FROM
    `tbl_sku_quantity`
WHERE
    country = 'IT'
        AND `detailed-disposition` = 'WHSE_DAMAGED'
group by sku
Order by quantity desc";
$alltableWHSE_DAMAGEDIT = mysqli_query($conn, $sqlskuWHSE_DAMAGEDIT);

$sqlskuCust_DAMAGEDIT = "
SELECT 
    DATE_FORMAT(snapshot_date, '%d/%m/%Y') AS snapshot_date,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    quantity,
    country
FROM
    `tbl_sku_quantity`
WHERE
    country = 'IT'
        AND `detailed-disposition` = 'Cust_DAMAGED'
GROUP BY sku
ORDER BY quantity DESC";
$alltableCust_DAMAGEDIT = mysqli_query($conn, $sqlskuCust_DAMAGEDIT);
?>


