<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
              <a class="nav-link js-scroll-trigger" href="<?php
echo 'index.php';
?>">home</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
          <p class="name">Full Statement <br>
              <?php
require 'config.php';
?>
         </p>

      </div>
    </header>
    <div class="">

    <div class="table-responsive"> </div>
       
     <?php
            $conn = mysqli_connect('localhost', 'root', '', 'amazon', '3306');
            if (!$conn) {
                die('Could not connect to MySQL: ' . mysqli_connect_error());
            }

            $limit = 3;  
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
            $start_from = ($page-1) * $limit;  

            $sql = "SELECT * FROM statements ORDER BY settlement-id ASC LIMIT $start_from, $limit";  
            $rs_result = mysqli_query($conn, $sql); 

            echo '<table id="tabelku" class="tabelku table table-bordered table-striped table-hover table-condensed dt-responsove wrap" cellspacing="0" width="10%">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>settlement id</th>';
            echo '<th>transaction type</th>';
            echo '<th>order id</th>';
            echo '<th>merchant order id</th>';            
            echo '<th>marketplace name</th>';
            echo '<th>amount type</th>';
            echo '<th>amount description</th>';
            echo '<th>amount</th>';
            echo '<th>fulfillment id</th>';
            echo '<th>posted date</th>';
            echo '<th>posted date time</th>';
            echo '<th>order item code</th>';
            echo '<th>merchant order item id</th>';
            echo '<th>merchant adjustment item id</th>';
            echo '<th>sku</th>';
            echo '<th>quantity purchased</th>';
            echo '<th>promotion id</th>';
            echo '</tr>';
            $result = mysqli_query($conn, 'SELECT `settlement-id`, `transaction-type`, `order-id`, `merchant-order-id`,  `marketplace-name`, `amount-type`, `amount-description`, amount, `fulfillment-id`, `posted-date`, `posted-date-time`, `order-item-code`, `merchant-order-item-id`, `merchant-adjustment-item-id`, sku, `quantity-purchased`, `promotion-id` FROM settlements');
            
            
            while (($row1 = mysqli_fetch_array($result, MYSQLI_ASSOC)) ) {
                echo '<thead>';
                echo '<tr>';
                echo '<td>' . $row1['settlement-id'] . '</td>';
                echo '<td>' . $row1['transaction-type'] . '</td>';
                echo '<td>' . $row1['order-id'] . '</td>';
                echo '<td>' . $row1['merchant-order-id'] . '</td>';
                echo '<td>' . $row1['marketplace-name'] . '</td>';
                echo '<td>' . $row1['amount-type'] . '</td>';
                echo '<td>' . $row1['amount-description'] . '</td>';
                echo '<td>' . $row1['amount'] . '</td>';
                echo '<td>' . $row1['fulfillment-id'] . '</td>';
                echo '<td>' . $row1['posted-date'] . '</td>';
                echo '<td>' . $row1['posted-date-time'] . '</td>';
                echo '<td>' . $row1['order-item-code'] . '</td>';
                echo '<td>' . $row1['merchant-order-item-id'] . '</td>';
                echo '<td>' . $row1['merchant-adjustment-item-id'] . '</td>';
                echo '<td>' . $row1['sku'] . '</td>';
                echo '<td>' . $row1['quantity-purchased'] . '</td>';
                echo '<td>' . $row1['promotion-id'] . '</td>';
                echo '</tr>';
            }
            mysqli_free_result($result);
            echo '</table>';

            /*mysqli_close($conn);*/
 
        $sql = "SELECT COUNT(settlement-id) FROM statements";  
        $result = mysqli_query($conn, 'SELECT `settlement-id`, `transaction-type`, `order-id`, `merchant-order-id`,  `marketplace-name`, `amount-type`, `amount-description`, amount, `fulfillment-id`, `posted-date`, `posted-date-time`, `order-item-code`, `merchant-order-item-id`, `merchant-adjustment-item-id`, sku, `quantity-purchased`, `promotion-id` FROM settlements');  
        $row = mysqli_fetch_row($rs_result);  
        $total_records = $row[0];  
        $total_pages = ceil($total_records / $limit);  
        $pagLink = "<nav><ul class='pagination'>";  
        for ($i=1; $i<=$total_pages; $i++) {  
                     $pagLink .= "<li><a href='full-statement.php?page=".$i."'>".$i."</a></li>";  
        };  
        echo $pagLink . "</ul></nav>";  
        
         mysqli_close($conn);
        ?>
   
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
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-google-plus"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-linkedin"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a class="btn-social btn-outline" href="#">
                    <i class="fa fa-fw fa-dribbble"></i>
                  </a>
                </li>
              </ul>
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


