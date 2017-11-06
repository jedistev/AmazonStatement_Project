<!-- Portfolio Modal Database -->

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
                                            <td><?php echo $row["Reversal_amount_sum"]; ?></td> 
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

                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-weight: bold;"> 
                                        <th>Total of Storage Fee</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allTotalCostStorage)) {
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


<div class="portfolio-modal modal fade" id="portfolioModal10" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>Sku Model Sold</h2>
                            <hr class="star-primary">
                            <p>
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  total Sku sold 
                                        <th>Sku</th>
                                        <th>Sku Sold</th>
                                        <th>current</th>
                                        <th>Sku Sold total</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                    // total all together
                                    while ($row = mysqli_fetch_array($allSkuModelSold)) {
                                        ?>  
                                        <tr class="table-smaller-text">  

                                            <td><?php echo $row["sku"]; ?></td>
                                            <td><?php echo $row["sku_sold"]; ?></td>
                                            <td>£ GBP</td>
                                            <td><?php echo $row["sku_sold_each"]; ?></td>
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

<div class="portfolio-modal modal fade" id="portfolioModal12" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>stuff goes there</h2>
                            <hr class="star-primary">
                            <p>
                                <a href="<?php echo 'dropdown.php'; ?>" class="btn btn-lg btn-default">Settlement Section</a><br>
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

<?php include 'nav/modal-country.php';?>
