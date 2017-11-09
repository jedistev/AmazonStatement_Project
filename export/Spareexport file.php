<?php

// Database Connection
include ('../sql/mainSql.php');

// filename for export
$csv_filename = 'Total_Settlement_UK_' . date('Y-m-d') . '.csv';

// get Users
$query = "SELECT sku, COUNT(sku) as sku_sold, Sum(`amount`) as sku_sold_each From settlements Where amount_description ='Principal' Group by sku ORDER BY `sku_sold` DESC";
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
    '£ GBP',
    'sku_sold_each'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>

