<?php
require('config/config.php');



$sqlskuQuantity="
SELECT 
    Distinct sku,
    date_format(`snapshot-date`, '%d/%m/%Y') as`snapshot-date`,
    fnsku,
    `product-name`,
    quantity,
    `fulfillment-center-id`,
    `detailed-disposition`,
    country
FROM
    `tbl-sku-quantity_test`
Where 
	country='GB'";
$AllTableSKUQTY = mysqli_query($conn,$sqlskuQuantity);


$sqlskuQuantity1="
SELECT 
    date_format(`snapshot-date`, '%d/%m/%Y') as `snapshot-date`,
    fnsku,
    sku,
    `product-name`,
    quantity,
    `fulfillment-center-id`,
    `detailed-disposition`,
    country
FROM
    `tbl-sku-quantity_test`";
$AllTableSKUQTY1 = mysqli_query($conn,$sqlskuQuantity1);

$sqlskuQuantityDamaged="SELECT 
    Distinct `fulfillment-center-id`,
    sku,
    date_format(`snapshot-date`, '%d/%m/%Y') as`snapshot-date`,
    fnsku,
    `product-name`,
    quantity,
    `detailed-disposition`,
    country
FROM
    `tbl-sku-quantity_test`
Where 
	country='GB'
	AND  `detailed-disposition`NOT LIKE 'SELLABLE'
Order by 
     quantity DESC";

$AllTableSKUQTYdamaged = mysqli_query($conn, $sqlskuQuantityDamaged);
        
$sqlskuDefective="
SELECT 
    `snapshot-date`,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    country
FROM
    `tbl-sku-quantity`
WHERE
    country = 'GB'
    AND`detailed-disposition` ='DEFECTIVE'        
GROUP BY `sku`";
$allSkuDefective = mysqli_query($conn, $sqlskuDefective);


$sqlskuWHSE_DAMAGED="
SELECT 
    `snapshot-date`,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    country
FROM
    `tbl-sku-quantity`
WHERE
    country = 'GB'
        AND `detailed-disposition` NOT LIKE 'SELLABLE'
		AND`detailed-disposition` ='WHSE_DAMAGED'        
GROUP BY `sku`";
$alltableWHSE_DAMAGED = mysqli_query($conn, $sqlskuWHSE_DAMAGED);

?>

        
        