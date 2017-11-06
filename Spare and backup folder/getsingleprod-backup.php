<?php
$allsettlementreport = $_GET['SettlementID'];
include ('sql/mainSql.php');

//Displaying fetched records to HTML table 
// Using mysql_fetch_array() to get the next row until end of table rows
while($row = mysqli_fetch_array( $alldropdownlist )) {
 
                // Print out the contents of each row into a table
 
                echo "<table class='table table-bordered table-striped table-hover table-condensed table-responsive'>"; 
                echo "<tr> ";
                echo "<th>Settlement ID</th> ";
                echo "<tr><td>"; 
                echo $row['settlement_id']; 
                echo "</td></tr>"; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo ""; 
                echo "";
                echo "<th>Start Date </th> <th>End Date </th> <th>total </th></tr>";
                
                
 
                
 
                echo "</td><td>";
                
                echo $row['settlement_start_date'];
 
                echo "</td><td>";

                echo $row['settlement_end_date'];
 
                echo "</td><td>";
                
                echo $row['total_amount'];
 
                echo "</td></tr>";   

}

?>

