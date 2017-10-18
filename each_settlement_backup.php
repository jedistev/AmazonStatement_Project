<?php
//sql files for calucated
include ('mainSql.php');
?> 
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
        <link rel="stylesheet" href="css/ishka.css" />

    </head>

    <body id="page-top">
        <?php include 'nav.php'; ?>
        <?php include 'header.php'; ?>
        <!--Each Settlement goes there -->

        <div class="container">
               <br>
                <br>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Settlement ID</label>
                        <div class="col-sm-3">
                            <select class="form-control">
                                <?php
                                while ($rows = mysqli_fetch_array($DropDownSettlementID)) {
                                    echo "<option value=" . $rows['settlement_id'] . ">" . $rows['settlement_id'] . "</option>";
                                }
                                ?> 
                            </select>
                        </div>
                    </div>    
                </form>
                <br>
                
            
            
            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                <thead> 
                    <?php
                      // total all together
                    while ($row = mysqli_fetch_array($allamountresult)) {
                        ?>  
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Order</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr> 
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Chargeback Refund</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr> 
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Refund</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr> 
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Service fee (advertising)</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr> 
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Payable to Amazon</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr>
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Disposal Complete</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr>
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Storage Fee</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr>
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Successful Charge</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr> 
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Storage Renewal Billing</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr> 
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Reversal Reimbursement</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr>
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Missing From Inbound</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr>
                        <tr style="font-size: 11px font-weight: bold;">    
                            <th>Warehouse Damage</th>
                            <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td> 
                        </tr>
                    </thead>  
                    <tbody> 
                        <?php
                    };
                    ?>
                </tbody>  



            </table> 
        </div>
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>

    </body>
</html>