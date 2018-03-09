<table class="table table-bordered table-condensed table-responsive">
    <tr>
        <th style="width:100%;">SKU</th>
        
        
    </tr>
</table>
    
 <?php

//$allsettlementreport = $_GET['listSKUID'];
//$allsettlementreport = print_r($_GET['listSKUID']);
$allsettlementreport = file_put_contents('debug.txt', print_r($_GET['listSKUID'], 1));
include ('../sql/europeeachsettlementsql.php');


//Getting setltlement name sent by Post method
$sql_multiplelist = "
SELECT 
    sku
FROM settlements

Where sku  = '" . $allsettlementreport . "'
group by sku 
ORDER by sku ASC";
$multiplelist = mysqli_query($conn, $sql_multiplelist);

if (!$multiplelist) {
    die('Could not retrieve data: ' . mysqli_error());
}

//Displaying fetched records to HTML table 
// Using mysql_fetch_array() to get the next row until end of table rows
while ($row = mysqli_fetch_array($multiplelist)) {

    // Print out the contents of each row into a table

    echo "<table class='table table-bordered table-striped table-hover table-condensed table-responsive'>";
    echo "<thead>";
    echo "<tr> ";
    echo "<td style='width:30%'>";
    echo $row['sku'];
    echo "</td></tr>";
    echo "</tr></thead>";
    echo "</table>";
}
?>

