<?php

// Database Connection
include ('../../../config/Export_config.php');

// filename for export
$csv_filename = 'Total_Settlement_UK_' . date('Y-m-d') . '.csv';

// get Users
$query = "SELECT settlement_id, settlement_start_date,settlement_end_date,total_amount FROM settlements WHERE total_amount";
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
    'settlement_id',
    'settlement_start_date',
    'settlement_end_date',
    'total_amount'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>

