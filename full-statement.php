<?php
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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/simplePagination.css" />
    <link rel="stylesheet" href="css/ishka.css" />

    
   
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/jquery.simplePagination.js"></script>

  </head>

 <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Amazon Statement Project</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo 'index.php'; ?>">home</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    
    <!-- Header -->
    <header class="masthead">
      <div class="container">
          <p class="name">Full Statement <br>
         </p>

      </div>
    </header>
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
    <!-- Footer -->
    <footer class="text-center">
      <div class="footer-above">
        <div class="container">
          <div class="row">
            <div class="footer-col col-md-4">
            
            </div>
            <div class="footer-col col-md-4">
              <h3>Ishka Website</h3>
            </div>
            <div class="footer-col col-md-4">
            </div>
          </div>
        </div>
      </div>
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              Copyright &copy; Ishka 2017
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top d-lg-none">
      <a class="btn btn-primary js-scroll-trigger" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/jquery.simplePagination.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>