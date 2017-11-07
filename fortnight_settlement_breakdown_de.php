<?php
//sql files for calucated
include ('sql/mainSql-de.php');
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
        <link rel="stylesheet" href="css/freelancer.css" />

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
            <h4>Fortnight Statement Details Germany</h4>
            <br>




            <!--testing  -->
            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >
                <thead>
                    <tr  Class="table-header-total">
                        <th>Date</th>
                        <?php
                        // total Order
                        $resultTranscationDate = mysqli_query($conn, $sqlbreakdowntransaction_column);
                        while (($rowResult = mysqli_fetch_array($resultTranscationDate, MYSQLI_ASSOC)) != NULL) {
                            ?>
                            <td><?php echo $rowResult["settlement_start_date"]; ?> - <?php echo $rowResult["settlement_end_date"]; ?></td>
                            <?php
                        }
                        mysqli_free_result($resultTranscationDate);
                        ?>
                    </tr>


                    <tr  Class="table-header-total">
                        <th>Settlement ID </th>
                        <?php
                        // total Order
                        $resultTranscationID = mysqli_query($conn, $sqlbreakdowntransaction_column);
                        while (($rowResult = mysqli_fetch_array($resultTranscationID, MYSQLI_ASSOC)) != NULL) {
                            ?>
                            <td  class="table-smaller-text-bolder"><?php echo $rowResult["settlement_id"]; ?></td>
                            <?php
                        }
                        mysqli_free_result($resultTranscationID);
                        ?>
                    </tr>

                    <tr  Class="table-header-total">
                        <th>Total Amount</th>
                        <?php
                        // total Order
                        $resultTranscationTotalAmount = mysqli_query($conn, $sqlbreakdowntransaction_column);
                        while (($rowResult = mysqli_fetch_array($resultTranscationTotalAmount, MYSQLI_ASSOC)) != NULL) {
                            ?>
                            <td  class="table-smaller-text-bolder"><?php echo $rowResult["total_amount"]; ?></td>
                            <?php
                        }
                        mysqli_free_result($resultTranscationTotalAmount);
                        ?>
                    </tr>

                    <tr>
                        <th class="text-primary">Breakdown Details </th><br>
                </tr>

                <tr  Class="table-header-total">
                    <th>Order</th>
                    <?php
                    // total Order
                    $resultTranscationOrder = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationOrder, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["Order"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationOrder);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Refund</th>
                    <?php
                    // total Order
                    $resultTranscationRefund = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationRefund, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["Refund"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationRefund);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Service Fee (advertising)</th>
                    <?php
                    // total Order
                    $resultTranscationServicefee = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationServicefee, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["Servicefee"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationServicefee);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Reversal Reimbursement</th>
                    <?php
                    // total Order
                    $resultTranscationREVERSAL_REIMBURSEMENT = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationREVERSAL_REIMBURSEMENT, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["REVERSAL_REIMBURSEMENT"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationREVERSAL_REIMBURSEMENT);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Removal Complete</th>
                    <?php
                    // total Order
                    $resultTranscationRemovalComplete = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationRemovalComplete, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["RemovalComplete"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationRemovalComplete);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Storage Fee</th>
                    <?php
                    // total Order
                    $resultTranscationStorageFee = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationStorageFee, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["Storage Fee"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationStorageFee);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Lightning Deal Fee</th>
                    <?php
                    // total Order
                    $resultTranscationLightningDealFee = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationLightningDealFee, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["LightningDealFee"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationLightningDealFee);
                    ?>
                </tr>
                <tr  Class="table-header-total">
                    <th>Subscription Fee</th>
                    <?php
                    // total Order
                    $resultTranscationSubscriptionFee = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationSubscriptionFee, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["Subscription Fee"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationSubscriptionFee);
                    ?>
                </tr>
                <tr  Class="table-header-total">
                    <th>Storage Renewal Billing</th>
                    <?php
                    // total Order
                    $resultTranscationStorageRenewalBilling = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationStorageRenewalBilling, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["StorageRenewalBilling"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationStorageRenewalBilling);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Warehouse Damage</th>
                    <?php
                    // total Order
                    $resultTranscationWAREHOUSE_DAMAGE = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationWAREHOUSE_DAMAGE, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["WAREHOUSE_DAMAGE"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationWAREHOUSE_DAMAGE);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Disposal Complete</th>
                    <?php
                    // total Order
                    $resultTranscationDisposalComplete = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationDisposalComplete, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["DisposalComplete"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationDisposalComplete);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Storage Renewal Billing</th>
                    <?php
                    // total Order
                    $resultTranscationStorageRenewalBilling = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationStorageRenewalBilling, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["StorageRenewalBilling"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationStorageRenewalBilling);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Missing From Inbound</th>
                    <?php
                    // total Order
                    $resultTranscationMissingFromInbound = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationMissingFromInbound, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["Missing From Inbound"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationMissingFromInbound);
                    ?>
                </tr>

                <tr  Class="table-header-total">
                    <th>Multichannel Order Lost</th>
                    <?php
                    // total Order
                    $resultTranscationMULTICHANNEL_ORDER_LOST = mysqli_query($conn, $sqlbreakdowntransaction_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationMULTICHANNEL_ORDER_LOST, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["MULTICHANNEL_ORDER_LOST"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationMULTICHANNEL_ORDER_LOST);
                    ?>
                </tr>

                <tr>
                    <th class="text-primary">Total of Settlement cost and match Balance</th><br>
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