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

            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0">
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
            echo '<table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0">';
            echo' <thead>
                <tr>
                <th>Settlement ID</th>
                <th>Settlement Date</th>
                <th>Total Amount</th>
                <th>Order</th>
                <th>Refund</th>
                <th>Service Fee</th>
                <th>Reversal Reimbursement</th>
                <th>Removal Complete</th>
                <th>Storage Fee</th>
                <th>LightningDealFee</th>
                <th>Subscription Fee</th>
                <th>StorageRenewalBilling</th>
                <th>WAREHOUSE_DAMAGE</th>
                <th>DisposalComplete</th>
                <th>StorageRenewalBilling</th>
                <th>Missing From Inbound</th>
                <th>MULTICHANNEL_ORDER_LOST</th>
                </tr></thead>';
            echo '<tbody>';
            echo '<tr>Break down of transation sale</tr>';
            $resultTranscationColumn = mysqli_query($conn, $sqlbreakdowntransaction_column);
            while (($row1 = mysqli_fetch_array($resultTranscationColumn, MYSQLI_ASSOC)) != NULL) {
                echo '<tr>';
                echo '<th class="table-smaller-text">' . $row1['settlement_id'] . '</th>';
                echo '<th class="table-smaller-text">' . $row1['settlement_start_date'] . ' to ' . $row1['settlement_end_date'] . '</th>';
                echo '<th class="table-smaller-text">' . $row1['total_amount'] . '</th>';
                echo '<th class="table-header-total">' . $row1['Order'] . '</th>';
                echo '<th class="table-header-total">' . $row1['Refund'] . '</th>';
                echo '<th class="table-header-total">' . $row1['Servicefee'] . '</th>';
                echo '<th class="table-header-total">' . $row1['REVERSAL_REIMBURSEMENT'] . '</th>';
                echo '<th class="table-header-total">' . $row1['RemovalComplete'] . '</th>';
                echo '<th class="table-header-total">' . $row1['Storage Fee'] . '</th>';
                echo '<th class="table-header-total">' . $row1['LightningDealFee'] . '</th>';
                echo '<th class="table-header-total">' . $row1['Subscription Fee'] . '</th>';
                echo '<th class="table-header-total">' . $row1['StorageRenewalBilling'] . '</th>';
                echo '<th class="table-header-total">' . $row1['WAREHOUSE_DAMAGE'] . '</th>';
                echo '<th class="table-header-total">' . $row1['DisposalComplete'] . '</th>';
                echo '<th class="table-header-total">' . $row1['StorageRenewalBilling'] . '</th>';
                echo '<th class="table-header-total">' . $row1['Missing From Inbound'] . '</th>';
                echo '<th class="table-header-total">' . $row1['MULTICHANNEL_ORDER_LOST'] . '</th>';
                echo '</tr>';
            }
            mysqli_free_result($resultTranscationColumn);
            echo '</tbody>';
            echo '</table>'
            ?>




        </div>


        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
    </body>
</html>