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
        <?php include 'nav/css.php';?>
    </head>

    <body id="page-top">
        <?php include 'nav/nav.php'; ?>
        <?php include 'nav/header.php'; ?>
        <!--Each Settlement goes there -->

        <div class="container">
            <br>
            <label>Total Breakdown for Uk H-root</label>
            <br>
            <!-- <form class="form-horizontal">
                  <div class="form-group">
                      <label class="col-sm-3 control-label">Settlement ID</label>
                      <div class="col-sm-3">
                        <select class="form-control">
            <?php
            //while ($rows = mysqli_fetch_array($DropDownSettlementID)) {
            //echo "<option value=" . $rows['settlement_id'] . ">" . $rows['settlement_id'] . "</option>";
            //}
            ?>
                          </select>
                      </div>
                  </div>
             </form> -->
            <br>

            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >
                <thead>

                    <tr  Class="table-header-total">
                        <th>Order</th>
                        <?php
                        // total Order
                        while ($row = mysqli_fetch_array($AllTotalFee)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["amount_sum"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr  Class="table-header-total">
                        <!-- not sure if will be used or not -->
                        <!--<th>Chargeback Refund</th>-->
                        <?php
                        // total shipping Chargeback
                        // while ($row = mysqli_fetch_array($allShippingChargeback)) {
                        //
                        ?>
                         <!--  <td  class="table-smaller-text"><?php echo $row["amount_sum"]; ?></td> -->
                        <?php
                        // };
                        ?>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Refund</th>
                        <?php
                        // total Service Fee
                        while ($row = mysqli_fetch_array($allrefundFee)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["amount_sum"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Service fee (advertising)</th>
                        <?php
                        // total Service Fee
                        while ($row = mysqli_fetch_array($allServiceFee)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["amount_sum"]; ?></td>
                            <?php
                        };
                        ?>
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
                        while ($row = mysqli_fetch_array($allTotalRemovalComplete)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["amount_sum"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Subscription Fee</th>
                        <?php
                        // total Subscription fee
                        while ($row = mysqli_fetch_array($allSubscriptionFee)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["amount_sum"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>

                    <tr Class="table-header-total">
                        <th>Storage Fee</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($allTotalCostStorage)) {
                            ?>
                            <td  class="table-smaller-text"><?php echo $row["amount_sum"]; ?></td>

                            <?php
                        };
                        ?>
                    </tr>
                    <!--<tr Class="table-header-total">
                        <th>Successful Charge</th>
                        <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td>
                    </tr>
                    <tr  Class="table-header-total">
                        <th>Storage Renewal Billing</th>
                        <td class="table-smaller-text"><?php echo $row["total_amount_sum"]; ?></td>
                    </tr> -->
                    <tr Class="table-header-total">
                        <th>Reversal Reimbursement</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($allTotalReversalReimbursement)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["Reversal_amount_sum"]; ?></td>
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
                        while ($row = mysqli_fetch_array($allWarehouseDamageTotal)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["amount_sum"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>

                    <tr  Class="table-header-total">
                        <th>Lighting Deal Fee</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($allLightningDealFee)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["amount_sum"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>


            <p class="text-primary">Total of Settle cost and match</p>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="table-header-total">
                        <th>Total</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($totalMatchResult)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["match_amount_sum"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                    <tr class="table-header-total">
                        <th>Total from Amazon Settlement</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($settlementTotalAmount)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["total_amount_all_together"]; ?></td>
                            <?php
                        };
                        ?>
                    <tr class="table-header-total">
                        <th>Difference</th>
                        <?php
                        // total all together
                        while ($row = mysqli_fetch_array($allbalanceTotal)) {
                            ?>
                            <td class="table-smaller-text"><?php echo $row["total_match"]; ?></td>
                            <?php
                        };
                        ?>
                    </tr>
                </thead>
            </table>
            <br>
        </div>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
        <script>
            function Export()
            {
                var conf = confirm("Export users to CSV?");
                if (conf == true)
                {
                    window.open("export/total_settlement_uk_breakdown_export_csv.php", '_blank');
                }
            }
        </script>
    </body>
</html>