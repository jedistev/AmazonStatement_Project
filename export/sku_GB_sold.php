<?php

// Database Connection
include ('../config/Export_config.php');

// filename for export
$csv_filename = 'sku_sold_in_UK_' . date('Y-m-d') . '.csv';

// get Users
$query = "SELECT 
sku, COUNT(sku) AS sku_sold, SUM(`amount`) AS sku_sold_each
FROM
settlements
WHERE
(sku NOT LIKE '%loc%'
    AND sku NOT LIKE 'isc%'
    AND sku NOT LIKE 'trek%')
    AND amount_description = 'Principal'
GROUP BY sku
ORDER BY `sku_sold` DESC";
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

