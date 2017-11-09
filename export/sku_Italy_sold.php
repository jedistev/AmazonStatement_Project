<?php

// Database Connection
include ('../sql/mainSql-it.php');

// filename for export
$csv_filename = 'sku_sold_in_Italy_' . date('Y-m-d') . '.csv';

// get Users
$query = "SELECT sku, COUNT(sku) as sku_sold, currency, Sum(`amount`) as sku_sold_each From settlementsit Where amount_description ='Principal' Group by sku ORDER BY `sku_sold` DESC";
if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=" . $csv_filename . "");
$output = fopen('php://output', 'w');
fputcsv($output, array(
    'sku',
    'sku_sold',
    'currency',
    'sku_sold_each'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>

