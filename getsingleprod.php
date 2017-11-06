<?php

$allsettlementreport = $_GET['SettlementID'];
include ('sql/mainSql.php');

//Displaying fetched records to HTML table 
// Using mysql_fetch_array() to get the next row until end of table rows
while ($row = mysqli_fetch_array($alldropdownlist)) {

    // Print out the contents of each row into a table

    echo "<table class='table table-bordered table-striped table-hover table-condensed table-responsive'>";
    echo "<thead>";
    echo "<tr> ";
    echo "<th>Settlement ID</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['settlement_id'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>Start Date</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['settlement_start_date'];
    echo "</td></tr>";

    echo "<tr> ";
    echo "<th>End date</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['settlement_end_date'];
    echo "</td></tr>";



    echo "<tr> ";
    echo "<th>Total Amount</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['total_amount'];
    echo "</td></tr>";
    
    
     echo "<tr> ";
    echo "<th>Order</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Order'];
    echo "</td></tr>";
    
    echo "<tr> ";
    echo "<th>Refund</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Refund'];
    echo "</td></tr>";
    
    echo "<tr> ";
    echo "<th>Service Fee</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['Servicefee'];
    echo "</td></tr>";
    
    echo "<tr> ";
    echo "<th>Other transaction</th> ";
    echo "<td class='table-smaller-text'>";
    echo $row['other-transaction'];
    echo "</td></tr>";
    
    
    echo "</tr></thead>";
    echo "</table>";
}
?>

