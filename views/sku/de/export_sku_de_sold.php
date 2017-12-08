<?php

// Database Connection
include ('../../../config/Export_config.php');

// filename for export
$csv_filename = 'sku_sold_in_de_' . date('Y-m-d') . '.csv';

// get Users
$query = "
SELECT DISTINCT
    sku, transaction_type, COUNT(sku) AS sku_unit_sold
FROM
    settlementsde
WHERE
    (sku NOT LIKE '%loc%'
        AND sku NOT LIKE 'isc%'
        AND sku NOT LIKE 'trek%')
        AND transaction_type = 'order'
        AND amount_description = 'Principal'
GROUP BY sku
ORDER BY sku_unit_sold DESC";


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
    'transaction_type',
    'sku_unit_sold'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>

