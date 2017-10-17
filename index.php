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
//sku model list   
$skuResult = mysqli_query($conn, 'SELECT DISTINCT sku FROM settlements');

//total Cost and Settlement Date list
$totalResult = mysqli_query($conn, 'SELECT * FROM `settlements` WHERE `total_amount`');

//show all the Cost on each table 
$sqlCostAmount = "SELECT `currency`,SUM(COALESCE(total_amount, 0.00)) AS`total_amount_sum` FROM `settlements` WHERE `total_amount`";
$allamountresult = mysqli_query($conn, $sqlCostAmount);

//Principle on Promotion 
$sqlPromotion = "SELECT  Settlement_ID,amount_description,amount_type,amount FROM amazon.settlements Where amount_type='Promotion' and amount_description='Principal'";
$allPrincipal = mysqli_query($conn, $sqlPromotion);

//total on Promoted cost
$sqlPromotionAmount = "SELECT SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM `settlements` WHERE `amount` and amount_description='Principal' and amount_type='Promotion'";
$allPromotedPrincipal = mysqli_query($conn, $sqlPromotionAmount);

//total on Shipping Cost
$sqlshipping = "SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM `settlements` WHERE `amount` and amount_description='shipping'  ";
$allshippingAmount = mysqli_query($conn, $sqlshipping);

//total Shipping chargeback
$sqlShippingback = "SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description='shippingChargeback'";
$allShippingChargeback = mysqli_query($conn, $sqlShippingback);

//List Service fee 
$sqlListServiceFee = "SELECT settlement_id, transaction_type, amount FROM amazon.settlements WHERE transaction_type = 'ServiceFee'";
$allListServiceFee = mysqli_query($conn, $sqlListServiceFee);

//Total Service fee
$sqlServiceFee = "SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE transaction_type = 'ServiceFee'";
$allServiceFee = mysqli_query($conn, $sqlServiceFee);

//Total Refund fee
$sqlTotalRefundfee = "SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE transaction_type = 'Refund'";
$allrefundFee = mysqli_query($conn, $sqlTotalRefundfee);

//Total Order Fee
$sqlTotalOrder = " SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE transaction_type = 'order'";
$AllTotalFee = mysqli_query($conn, $sqlTotalOrder);

//another Transation
$sqlTransationOther ="SELECT transaction_type, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE transaction_type = 'other-transaction'";
$AllOtherTransation = mysqli_query($conn, $sqlTransationOther);

//Each Statement ID with Refund total fee need more work on it.
$sqlStatmentfund ="SELECT settlement_id ,  transaction_type, currency, sum(COALESCE(amount, 0.00)) AS`Amount_Refund` FROM Settlements GROUP BY Settlement_id AND transaction_type = 'Refund'";
$eachStatmentRefund = mysqli_query($conn, $sqlStatmentfund);

//Warehouse Damage Total 
$sqlWarehouseDamageTotal ="SELECT transaction_type, amount_description, SUM(amount) AS`amount_sum` FROM settlements WHERE amount_description = 'WAREHOUSE_DAMAGE'";
$allWarehouseDamageTotal = mysqli_query($conn, $sqlWarehouseDamageTotal);

//Total Reversal Reimbursement
$sqlTotalReversalReimbursement ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'REVERSAL_REIMBURSEMENT'";
$allTotalReversalReimbursement = mysqli_query($conn, $sqlTotalReversalReimbursement);

//Total Refund Commission 
$sqlTotalRefundCommission ="SELECT transaction_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Commission' and transaction_type='refund'";
$allTotalRefundCommission = mysqli_query($conn, $sqlTotalRefundCommission);

//Total Order Commission 
$sqlTotalOrderCommission ="SELECT transaction_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Commission' and transaction_type='order'";
$allTotalOrderCommission = mysqli_query($conn, $sqlTotalOrderCommission);

//Total FBA Transportation Fee
$sqlTotalFBAfee ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'FBA transportation fee'";
$allTotalFBAfee = mysqli_query($conn, $sqlTotalFBAfee);

//total FBA PER Units Fulfillment Fee
$sqlTotalFBAperUnits ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'FBAPerUnitFulfillmentFee'";
$alltotalFBAperUnits = mysqli_query($conn, $sqlTotalFBAperUnits);

//Total goodwill
$sqlTotoalGoodwill ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Goodwill'";
$allTotalGoodwill = mysqli_query($conn, $sqlTotoalGoodwill);

//Total Refund Commission
$sqlTotalAmountRefundCommission ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'RefundCommission'";
$allTotalAmountRefundCommission = mysqli_query($conn, $sqlTotalAmountRefundCommission);

//Total Cost of Adversting
$sqlTotalCostAdvert ="SELECT amount_type, amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements where amount_type='Cost of Advertising'";
$alltotalCostAdvert = mysqli_query($conn, $sqlTotalCostAdvert);

//Total Cost of Principle
$sqlTotalCostPrincipal ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Principal'";
$alltotalCostPrincipal = mysqli_query($conn, $sqlTotalCostPrincipal);

//Total Cost of Shipping
$sqlTotalCostShipping ="SELECT amount_description, SUM(COALESCE(amount, 0.00)) AS`amount_sum` FROM settlements WHERE amount_description = 'Shipping'";
$alltotalCostShipping = mysqli_query($conn, $sqlTotalCostShipping);

//for upload CSV
include('upload-functions.php');
?>


<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Amazon Settlement Project</title>

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
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Amazon Settlement Project</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#portfolio">Database</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">About</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="masthead">
            <div class="container">
                <img class="img-fluid" src="img/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">
                        <?php require 'config.php'; ?>
                    </span>
                    <hr class="star-light">

                </div>
            </div>
        </header>

        <!-- Portfolio Grid Section -->
        <section id="portfolio">
            <div class="container">
                <h2 class="text-center">Database</h2>
                <hr class="star-primary">
                <div class="row">
                    <div class="col-sm-4 portfolio-item">
                        <a class="portfolio-link" href="#portfolioModal1" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                    <p>Total Settlement Cost and date</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/cabin.png" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a class="portfolio-link" href="#portfolioModal2" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <p>Full Statement</p>
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/cake.png" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a class="portfolio-link" href="#portfolioModal3" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <P> All SKU model</p>
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/circus.png" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a class="portfolio-link" href="#portfolioModal4" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <p>uploaded CSV data</p>
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/upload.png" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a class="portfolio-link" href="#portfolioModal5" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <p>Total of all different cost</p>
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/safe.png" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a class="portfolio-link" href="#portfolioModal6" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <p>Range of Settlement Total</p>
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/submarine.png" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a class="portfolio-link" href="#portfolioModal7" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <p>Search and Find</p>
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/search.png" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a class="portfolio-link" href="#portfolioModal8" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <p>Refunding Breakdown</p>
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/refund.png" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a class="portfolio-link" href="#portfolioModal9" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <p>List of Amazon Site Pages</p>
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/portfolio/amazon.png" alt="">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- About Section -->
<section class="success" id="about">
    <div class="container">
        <h2 class="text-center">About</h2>
        <hr class="star-light">
        <div class="row">
            <div class="col-lg-4 ml-auto">
                <p>Amazon Statement database project. part of the CRUD, displayed, Edit, View,on Amazon Statement Flatfile</p>
            </div>
            <div class="col-lg-4 mr-auto">
                <p>this project is build for Ishka and Monhike only, this is an strict internal only</p>
            </div>
        </div>
    </div>
</section>


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

<!-- Portfolio Modals Database -->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="modal-body">
                            <h2>Settlement total Cost, Start date and End date</h2>
                            <hr class="star-primary">
                            <?php
                            //total cost on each fornight
                            echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
                            echo '<tr>';
                            echo '<th>Settlement ID</th>';
                            echo '<th>settlement start date</th>';
                            echo '<th>settlement end date</th>';
                            echo '<th>Currency</th>';
                            echo '<th>Total Amount</th>';
                            echo '</tr>';

                            while (($totalcostrow = mysqli_fetch_array($totalResult, MYSQLI_ASSOC)) != NULL) {
                                echo '<tr>';
                                echo '<td>' . $totalcostrow['settlement_id'] . '</td>';
                                echo '<td>' . $totalcostrow['settlement_start_date'] . '</td>';
                                echo '<td>' . $totalcostrow['settlement_end_date'] . '</td>';
                                echo '<td>' . $totalcostrow['currency'] . '</td>';
                                echo '<td>' . $totalcostrow['total_amount'] . '</td>';
                                echo '</tr>';
                            }
                            mysqli_free_result($totalResult);
                            echo '</table>';
                            ?>
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-size: 11px; font-weight: bold;">    
                                        <th><h2>Total of all Amount</h2></th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allamountresult)) {
                                        ?>  
                                        <tr class="table-smaller-text">  
                                            <td><?php echo $row["currency"]; ?></td> 
                                            <td><?php echo $row["total_amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table>  



                            <ul class="list-inline item-details">

                                <button class="btn btn-success" type="button" data-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                    Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <h2>Full Statement</h2>
                            <hr class="star-primary">
                            <a href="<?php echo 'full-statement.php'; ?>" class="btn btn-lg btn-default">Full Statement</a><br>
                            <button class="btn btn-success" type="button" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <h2>SKU List Database</h2>
                            <hr class="star-primary">

                            <?php
                            echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
                            echo '<tr>';
                            echo '</tr>';
                            while (($row = mysqli_fetch_array($skuResult, MYSQLI_ASSOC)) != NULL) {
                                echo '<tr>';
                                echo '<td>' . $row['sku'] . '</td>';
                                echo '</tr>';
                            }
                            mysqli_free_result($skuResult);
                            echo '</table>';
                            ?>
                            <button class="btn btn-success" type="button" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <h2>Upload data</h2>
                            <hr class="star-primary">

                            <div id="wrap">
                                <div class="container">
                                    <div class="row">
                                        <form class="form-horizontal" action="upload-functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                            <fieldset>

                                                <!-- Form Name -->
                                                <legend>Import  data</legend>

                                                <!-- File Button -->
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="filebutton">Select File</label>
                                                    <div class="col-md-4">
                                                        <input type="file" name="file" id="file" class="input-large" required>
                                                    </div>
                                                </div>

                                                <!-- Button -->
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                                                    <div class="col-md-4">
                                                        <button type="submit" id="submit" name="Import" class="btn btn-success" data-loading-text="Loading...">Upload</button>
                                                    </div>
                                                </div>

                                            </fieldset>
                                        </form>

                                    </div>
                                    <?php
                                    get_all_records();
                                    ?>
                                </div>
                                <!--
                                  <div class="container">
                                    <div class="row">
                                      
                                        <form class="form-horizontal" action="upload-functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                                           <fieldset>
                                <!-- Form Name 
                                <legend>Export data</legend>
                                
                                <!-- Button -->
                                <!-- <div class="form-group">
                                            
                                           <div class="col-md-4">
                                                <input type="submit" name="Export" class="btn btn-success" value="Export to excel"/>
                                            </div>
                                        </div> 
                               </fieldset>
                            </form> 
                        </div>   
                       </div>-->
                            </div>
                        </div>
                        <button class="btn btn-success" type="button" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                            Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <h2>Total of different Amount</h2>
                            <hr class="star-primary">

                            <p>

                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Amount on Promoted with Principal</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allPromotedPrincipal)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table> 

                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Shipping Amount</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allshippingAmount)) {
                                        ?>  
                                        <tr class="table-smaller-text">  
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table> 

                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Shipping ChargeBack</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allShippingChargeback)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table> 

                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Service Fee</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allServiceFee)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table> 

                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" > 
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Order</th>
                                    </tr>  
                                </thead> 
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($AllTotalFee)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table>
                            
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Other Transaction</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($AllOtherTransation)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table> 
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Warehouse Damage</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allWarehouseDamageTotal)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table> 
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Reversal Reimbursement</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allTotalReversalReimbursement)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table> 
                            
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Refund Commission</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allTotalRefundCommission)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table> 

                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Order Commission</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allTotalOrderCommission)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table> 
                            
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total FBA Per Unit Fulfillment Fee</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($alltotalFBAperUnits)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table> 

                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Goodwill</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allTotalGoodwill)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table>
                            
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Amount Refund Commission</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allTotalAmountRefundCommission)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table>
                            
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total of Cost Advertising</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($alltotalCostAdvert)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table>

                             <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total of Principe</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($alltotalCostPrincipal)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table>

                             <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total of Shipping</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($alltotalCostShipping)) {
                                        ?>  
                                        <tr class="table-smaller-text"> 
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table>
                            </p>
                            

                            <button class="btn btn-success" type="button" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <h2>Settlement Total</h2>
                            <hr class="star-primary">
                            <img class="img-fluid img-centered" src="img/portfolio/submarine.png" alt="">
                            <p>
                                Show all Settlement in Database<br>
                               <a href="<?php echo 'each_settlement.php'; ?>" class="btn btn-lg btn-default">Settlement Section</a><br>

                            </p>

                            <button class="btn btn-success" type="button" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-lg-10 mx-auto"><!--this layout need tweak-->
                        <div class="modal-body">
                            <h2 align="center">Amazon's Live Data Search</h2><br />
                            <hr class="star-primary">
                            <div class="container">
                                <br />
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Search</span>
                                        <input type="text" name="search_text" id="search_text" placeholder="Search on Amazon Settlement Details" class="form-control" />
                                    </div>
                                </div>
                                <br />
                                <div id="result"></div>
                            </div>
                            <button class="btn btn-success" type="button" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portfolio-modal modal fade" id="portfolioModal8" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <h2>Refund Breakdown</h2>
                            <hr class="star-primary">

                            <p>
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total Refund Fee</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allrefundFee)) {
                                        ?>  
                                        <tr class="table-smaller-text">
                                            <td><?php echo $row["amount_sum"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table>     
                                
                            
                            <h4> breakdown Statement on each fornight </h4>
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-size: 11px; font-weight: bold;">  <h4>Total List of Breakdown</h4>  
                                <th>Settlement ID </th>
                                <th>Transaction Type</th>
                                <th>Currency</th>
                                <th>Amount</th>
                                </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($eachStatmentRefund)) {
                                        ?>  
                                        <tr class="table-smaller-text">  

                                            <td><?php echo $row["settlement_id"]; ?></td>
                                            <td><?php echo $row["transaction_type"]; ?></td>
                                            <td><?php echo $row["currency"]; ?></td>
                                            <td><?php echo $row["Amount_Refund"]; ?></td> 
                                        </tr>  
                                        <?php
                                    };
                                    ?>
                                </tbody>  
                            </table>  
                                
                                
                            </p>

                            <button class="btn btn-success" type="button" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portfolio-modal modal fade" id="portfolioModal9" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="modal-body">
                            <h2>Amazon Pages Link</h2>
                            <hr class="star-primary">
                            <p>
                                <a href="https://www.amazon.co.uk/stores/page/331E95DF-4741-494D-971F-BE6FDAFF09A6" target="_blank">H-root United Kingdom</a><br>
                                <a href="https://www.amazon.de/h-root" target="_blank">H-root Germany</a><br>
                                <a href="https://www.amazon.fr/h-root" target="_blank">H-root France</a><br>
                                <a href="https://www.amazon.it/h-root " target="_blank">H-root Italy</a><br>
                                <a href="https://www.amazon.es/h-root" target="_blank">H-root Spain</a><br>
                                <a href="https://sellercentral.amazon.co.uk/gp/homepage.html/ref=ag_home_logo_xx" target="_blank">Amazon Seller Central</a>
                            </p>

                            <button class="btn btn-success" type="button" data-dismiss="modal">
                                <i class="fa fa-times"></i>
                                Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="js/jqBootstrapValidation.js"></script>
<script src="js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="js/freelancer.min.js"></script>

<script>
    $(document).ready(function () {

        load_data();

        function load_data(query)
        {
            $.ajax({
                url: "searchdata.php",
                method: "POST",
                data: {query: query},
                success: function (data)
                {
                    $('#result').html(data);
                }
            });
        }
        $('#search_text').keyup(function () {
            var search = $(this).val();
            if (search != '')
            {
                load_data(search);
            } else
            {
                load_data();
            }
        });
    });
</script>

</body>

</html>