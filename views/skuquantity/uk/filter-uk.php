<?php
//filter.php  
if (isset($_POST["from_date"], $_POST["to_date"])) {
   include ('../../../config/config.php');
    $output = '';
    $query = "  
           SELECT * FROM tbl_sku_quantity 
           WHERE snapshot_date BETWEEN '" . $_POST["from_date"] . "' AND '" . $_POST["to_date"] . "' 
           and country='GB'
           order by snapshot_date DESC
      ";
    $result = mysqli_query($conn, $query);
    $output .= '  
           <table class="table table-bordered">  
                <tr>  
                      
                     <th width="20%">Date</th> 
                     <th width="9%">fnsku</th> 
                     <th width="15%">sku</th>  
                     <th width="50%">product name</th>  
                     <th width="5%">quantity</th>  
                     <th width="12%">fulfillment center id</th>
                     <th width="15%">detailed disposition</th>  
                     
                </tr>  
      ';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '  
                     <tr>  
                        <td>' . $row["snapshot_date"] . '</td> 
                        <td>' . $row["fnsku"] . '</td> 
                        <td>' . $row["sku"] . '</td>
                        <td>' . $row["product-name"] . '</td> 
                        <td>' . $row["quantity"] . '</td>
                        <td>' . $row["fulfillment-center-id"] . '</td>
                        <td>' . $row["detailed-disposition"] . '</td>
                     </tr>  
                ';
        }
    } else {
        $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';
    }
    $output .= '</table>';
    echo $output;
}
?>




