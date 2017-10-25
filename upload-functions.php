<?php

include('config/connection.php');
$con = getdb();

//Imported the CSV to upload 
if (isset($_POST["Import"])) {
    echo $filename = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        while (($getData = fgetcsv($file, 3000000, ",")) !== FALSE) {
            $sql = "INSERT into settlements (id,settlement_id,settlement_start_date,settlement_end_date,deposit_date,total_amount,currency,transaction_type,order_id,merchant_order_id,adjustment_id,shipment_id,marketplace_name,amount_type,amount_description,amount,fulfillment_id,posted_date,posted_date_time,order_item_code,merchant_order_item_id,merchant_adjustment_item_id,sku,quantity_purchased,promotion_id) 
			   values ('" . $getData[0] . "','" . $getData[1] . "','" . $getData[2] . "','" . $getData[3] . "','" . $getData[4] . "','" . $getData[5] . "','" . $getData[6] . "','" . $getData[7] . "','" . $getData[8] . "','" . $getData[9] . "','" . $getData[10] . "','" . $getData[11] . "','" . $getData[12] . "','" . $getData[13] . "','" . $getData[14] . "','" . $getData[15] . "','" . $getData[16] . "','" . $getData[17] . "','" . $getData[18] . "','" . $getData[19] . "','" . $getData[20] . "','" . $getData[21] . "','" . $getData[22] . "','" . $getData[23] . "','" . $getData[24] . "')";

            $uploadresult = mysqli_query($con, $sql);
            // var_dump(mysqli_error_list($con));
            // exit();
            if (!isset($uploadresult)) {
                echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						  </script>";
            } else {
                echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
            }
        }

        fclose($file);
    }
}

function get_all_records() {
    $con = getdb();
    $Sql = "SELECT * FROM settlements WHERE total_amount";
    $uploadresult = mysqli_query($con, $Sql);
    if (mysqli_num_rows($uploadresult) > 0) {
        echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
     <thead>
     <tr>
     	<th>Settlement Start Date</th>
	<th>Settlement Start End</th>
     </tr>
     </thead>
    <tbody>";

        while ($row = mysqli_fetch_assoc($uploadresult)) {
            echo "<tr>
         
                   <td>" . $row['settlement_start_date'] . "</td>
                   <td>" . $row['settlement_end_date'] . "</td>
				</tr>";
        }
        echo "</tbody></table></div>";
    } else {
        echo "you have no recent Amazon Statement orders, Please check your mySQL or Your Techincal Support";
    }
}

?>