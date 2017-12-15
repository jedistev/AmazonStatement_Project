<?php

echo '<div class="container"><div class="row">';
echo '<table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0">';
echo '<tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">';
echo '<th>snapshot date</th>';
echo '<th>fnsku</th>';
echo '<th>sku</th>';
echo '<th>product name</th>';
echo '<th>quantity</th>';
echo '<th>fulfillment center id</th>';
echo '<th>detailed disposition</th>';
echo '<th>country</th>';
echo '</tr>';

while (($row = mysqli_fetch_array($AllTableSKUQTY, MYSQLI_ASSOC)) != NULL) {
    echo '<tr>';
    echo '<td>' . $row['snapshot_date'] . '</td>';
    echo '<td>' . $row['fnsku'] . '</td>';
    echo '<td>' . $row['sku'] . '</td>';
    echo '<td>' . $row['product-name'] . '</td>';
    echo '<td>' . $row['quantity'] . '</td>';
    echo '<td>' . $row['fulfillment-center-id'] . '</td>';
    echo '<td>' . $row['detailed-disposition'] . '</td>';
    echo '<td>' . $row['country'] . '</td>';
    echo '</tr>';
}
mysqli_free_result($AllTableSKUQTY);
echo '</table>';
echo '</div></div>';

?>

