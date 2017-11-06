<?php
//sql files for calucated
include ('sql/mainSql.php');
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
        <!-- Custom styles for this template -->
        <link href="css/freelancer.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/ishka.css" />

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">



    </head>

    <body id="page-top">
        <?php include 'nav/nav.php'; ?>
        <?php include 'nav/header.php'; ?>
        <!--Each Settlement goes there -->

        <div class="container">
            <br>
            <br>
            <h4>Fortnight Statement Details </h4>
            <br>

            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >
                <thead>
                    <tr>
                        <th>Total of Settle cost and match</th><br>
                </tr>
                <tr>
                </tr>
                <tr class="table-header-total">
                    <th>Total</th>
                    <?php
                    // total all together
                    while ($row = mysqli_fetch_array($grouptotalmatch)) {
                        ?>
                        <td class="table-smaller-text"><?php echo $row["total_match_amount_sum"]; ?></td>
                        <?php
                    };
                    ?>
                </tr>

                <tr class="table-header-total">
                    <th>Total from Amazon Settlement</th>
                    <?php
                    // total all together
                    while ($row = mysqli_fetch_array($allgrouptotalamount)) {
                        ?>
                        <td class="table-smaller-text"><?php echo $row["total_amount"]; ?></td>
                        <?php
                    };
                    ?>
                <tr class="table-header-total">
                    <th>Difference</th>
                    <?php
                    // total all together
                    while ($row = mysqli_fetch_array($groupbalancematch)) {
                        ?>
                        <td class="table-smaller-text"><?php echo $row["total_match"]; ?></td>
                        <?php
                    };
                    ?>
                </tr>
                </thead>
            
            </table>    

            <?php
            while (($grouptotalrow = mysqli_fetch_array($Groupresult, MYSQLI_ASSOC)) != NULL) {
                
                echo '<table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Total of Settle cost and match</th><br>';
                echo '</tr>'; 

                echo '<tr>';
                echo '</tr>';
                echo '<tr class="table-header-total">';
                echo ' <th>Date Start and End</th>';
                echo '<td class="table-smaller-text">' . $grouptotalrow['settlement_start_date'] . ' -- ' . $grouptotalrow['settlement_start_date'] . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '</tr>';
                echo '<tr class="table-header-total">';
                echo ' <th>Total Amount</th>';
                echo '<td class="table-smaller-text">'. $grouptotalrow['total_amount'] . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '</tr>';
                echo '<tr class="table-header-total">';
                echo ' <thTranscation type</th>';
                echo '<td class="table-smaller-text">' . $grouptotalrow['transaction_type'] . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '</tr>';
                echo '<tr class="table-header-total">';
                echo ' <th>Amount Description</th>';
                echo '<td class="table-smaller-text">' . $grouptotalrow['amount_description'] . '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '</tr>';
                echo '<tr class="table-header-total">';
                echo ' <th> Total Each amount</th>';
                echo '<td class="table-smaller-text">' . $grouptotalrow['Each_group_Amount'] . '</td>';
                echo '</tr>';
                
                

                echo '</thead>';
                echo '</table>';   
      
            }
            mysqli_free_result($Groupresult);
            ?>
            
            
        <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >
                <thead>
                    <tr  Class="table-header-total">
                        <th>Date</th>
                        <?php
                        // total Order
                        while ($row = mysqli_fetch_array($allStartandenddate)) {
                            ?>
                            <td  class="table-smaller-text-bolder"><?php echo $row["settlement_start_date"]; ?> - <?php echo $row["settlement_end_date"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Settlement ID </th>
                        <?php
                        // total Order
                        while ($row = mysqli_fetch_array($allGroupsettlementgroupID)) {
                            ?>
                            <td  class="table-smaller-text-bolder"><?php echo $row["settlement_id"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>

                    <tr  Class="table-header-total">
                        <th>Order</th>
                        <?php
                        // total Order
                        while ($row = mysqli_fetch_array($Allgroupsettlementidorder)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["Each_group_Amount"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Refund</th>
                        <?php
                        // total Service Fee
                        while ($row = mysqli_fetch_array($allgrouprefund)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["Each_group_Amount"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Service fee (advertising)</th>
                        <?php
                        // total Service Fee
                        while ($row = mysqli_fetch_array($allservicefeegroup)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["Each_group_Amount"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Payable to Amazon</th>
                        <td class="table-smaller-text"><?php echo $row["Each_group_Amount"]; ?></td>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Disposal Complete</th>
                        <?php
                        // total Removal Complete
                        while ($row = mysqli_fetch_array($allTotalDisposalComplete)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["amount_sum"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Removal Complete</th>
                        <?php
                        // total Removal Complete
                        while ($row = mysqli_fetch_array($allremoveitemgroup)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["Each_group_Amount"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Subscription Fee</th>
                        <?php
                        // total Subscription fee
                        while ($row = mysqli_fetch_array($allSubscriptionFeegroup)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["Each_group_Amount"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>

                    <tr Class="table-header-total">
                        <th>Storage Fee</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($allgroupstoragefee)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["Each_group_Amount"]; ?></td>

                            <?php
                        };
                        ?>
                    </tr>
                    <tr Class="table-header-total">
                        <th>Reversal Reimbursement</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($allgroupreversalreimbursement)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["Each_group_Amount"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <!-- Not Sure but can be use later stage
                        <tr  Class="table-header-total">
                        <th>Missing From Inbound</th>
                        <td class="table-smaller-text">0.00</td>
                    </tr>-->
                    <tr  Class="table-header-total">
                        <th>Warehouse Damage</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($allgroupwarehousedamage)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["Each_group_Amount"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>

                    <tr  Class="table-header-total">
                        <th>Lighting Deal Fee</th>
                        <?php
                        // total all together isse in wrong location
                        while ($row = mysqli_fetch_array($allLightningDealFeeGroup)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["Each_group_Amount"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr>
                        <th>Total of Settle cost and match</th><br>
                    </tr>
                <tr>
                </tr>
                    <tr class="table-header-total">
                        <th>Total</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($grouptotalmatch)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["total_match_amount_sum"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>

                    <tr class="table-header-total">
                        <th>Total from Amazon Settlement</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($allgrouptotalamount)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["total_amount"]; ?></td>
                            <?php
                        };
                        ?>
                    <tr class="table-header-total">
                        <th>Difference</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($groupbalancematch)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["total_match"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>    
        </div>
        
        
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
    </body>
</html>