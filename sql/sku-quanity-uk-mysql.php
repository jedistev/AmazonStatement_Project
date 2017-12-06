<?php
require('config/config.php');


$AllTableSKUQTY = mysqli_query($conn, 'SELECT `snapshot-date`, fnsku, sku, `product-name`, quantity, `fulfillment-center-id`, `detailed-disposition`, country FROM `tbl-sku-quantity`');

?>
