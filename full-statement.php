<?php
//include auth.php file on all secure pages
include("auth.php");

//sql database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amazon";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} 
  
$limit = 15;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  

$sql = "SELECT * FROM settlements ORDER BY id ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql);  
?> 


<html>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

        <title>Amazon Statement Project</title>
        <!-- Bootstrap core CSS -->
        <?php include 'nav/css.php';?>
  
    <link rel="stylesheet" href="css/simplePagination.css" />
    <script src="js/jquery.simplePagination.js"></script>

  </head>

 <body id="page-top">
<?php include 'nav/nav.php';?>
<?php include 'nav/header.php';?>
        <div class="">
            <div class="table-responsive"> </div>
                        <div style="padding-top:20px;">
                        <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                            <thead>  
                                <tr style="font-size: 11px; font-weight: bold;">    
                                    <th>transaction type</th>
                                    <th>order id</th>
                                    <th>merchant order id</th>      
                                    <th>marketplace name</th>
                                    <th>amount type</th>
                                    <th>amount description</th>
                                    <th>amount</th>
                                    <th>fulfillment id</th>
                                    <th>posted date</th>
                                    <th>posted date time</th>
                                    <th>order item code</th>
                                    <th>merchant order item id</th>
                                    <th>merchant adjustment item id</th>
                                    <th>sku</th>
                                    <th>quantity purchased</th>
                                    <th>promotion id</th>
                                </tr>  
                            </thead>  
                        <tbody>  
                        <?php  
                        while ($row = mysqli_fetch_assoc($rs_result)) {
                        ?>  
                                <tr class="table-smaller-text">  
                                    <td><?php echo $row["transaction_type"]; ?></td>  
                                    <td><?php echo $row["order_id"]; ?></td>  
                                    <td><?php echo $row["merchant_order_id"]; ?></td>  
                                    <td><?php echo $row["marketplace_name"]; ?></td>
                                    <td><?php echo $row["amount_type"]; ?></td>  
                                    <td><?php echo $row["amount_description"]; ?></td> 
                                    <td><?php echo $row["amount"]; ?></td>  
                                    <td><?php echo $row["fulfillment_id"]; ?></td>
                                    <td><?php echo $row["posted_date"]; ?></td>  
                                    <td><?php echo $row["posted_date_time"]; ?></td>  
                                    <td><?php echo $row["order_item_code"]; ?></td>  
                                    <td><?php echo $row["merchant_order_item_id"]; ?></td>  
                                    <td><?php echo $row["merchant_adjustment_item_id"]; ?></td> 
                                    <td><?php echo $row["sku"]; ?></td>
                                    <td><?php echo $row["quantity_purchased"]; ?></td> 
                                    <td><?php echo $row["promotion_id"]; ?></td> 
                                </tr>  
                            <?php  
                            };  
                            ?>  
                        </tbody>  
                        </table>
                        </div>
                        <div class="container" style="padding-bottom:30px;">
                            <div class="row">
                                <div class="col-sm-offset-5 col-sm-7">
                                     <?php  
                                        $sql = "SELECT COUNT(id) FROM settlements";  
                                        $rs_result = mysqli_query($conn, $sql);  
                                        $row = mysqli_fetch_row($rs_result);  
                                        $total_records = $row[0];  
                                        $total_pages = ceil($total_records / $limit);  
                                        $pagLink = "<nav class='center'><ul class='pagination pagination-sm'>";  
                                        for ($i=1; $i<=$total_pages; $i++) {  
                                                 $pagLink .= "<li><a href='full-statement.php?page=".$i."'>".$i."</a></li>";  
                                        };  
                                        echo $pagLink . "</ul></nav>";  
                                         ?>

                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                        $(document).ready(function(){
                        $('.pagination').pagination({
                                items: <?php echo $total_records;?>,
                                itemsOnPage: <?php echo $limit;?>,
                                cssStyle: 'light-theme',
                                        currentPage : <?php echo $page;?>,
                                        hrefTextPrefix : 'full-statement.php?page='
                            });
                                });
                </script>
        </div>
<?php include 'nav/footer.php';?>
<?php include 'nav/script.php';?>

  </body>

</html>