<?php


 if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		


		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {


                $sql = "INSERT into statements-new ( id,settlement_id,settlement_start-date,settlement_end_date,deposit_date,total_amount,currency,transaction_type,order-id,merchant_order_id,adjustment_id,shipment_id,marketplace_name,amount_type,amount_description,amount,fulfillment_id,posted_date,posted_date_time,order_item_code,merchant_order_item_id,merchant_adjustment_item_id,sku,quantity_purchased,promotion_id) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."',,'".$getData[6]."',,'".$getData[7]."',,'".$getData[8]."',,'".$getData[9]."',,'".$getData[10]."',,'".$getData[11]."',,'".$getData[12]."',,'".$getData[13]."',,'".$getData[14]."',,'".$getData[15]."',,'".$getData[16]."',,'".$getData[17]."',,'".$getData[18]."',,'".$getData[19]."',,'".$getData[20]."',,'".$getData[21]."',,'".$getData[22]."',,'".$getData[23]."',,'".$getData[24]."',,'".$getData[25]."')";
                   $result = mysqli_query($con, $sql);
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}	 

 ?>