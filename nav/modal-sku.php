<!-- Portfolio Modal Sku -->

<!-- SKu List in Amazon UK-->
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

<!-- SKu Sold in Amazon UK-->
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
                            <h2>SKU Sold in UK </h2>
                            <hr class="star-primary">
                            <p>
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  Total of SKU sold in Amazon.co.uk 
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

<!-- SKU Sold in Amazon de-->
<div class="portfolio-modal modal fade" id="portfolioModalSkuGermany" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>SKU Sold in Germany </h2>
                            <hr class="star-primary">
                            <p>
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  Total of SKU sold in Amazon.de 
                                        <th>Sku</th>
                                        <th>Sku Sold</th>
                                        <th>current</th>
                                        <th>Sku Sold total</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                     include ('sql/mainSql-de.php');
                                    // total all together
                                    while ($row = mysqli_fetch_array($allSkuModelSold)) {
                                        ?>  
                                        <tr class="table-smaller-text">  

                                            <td><?php echo $row["sku"]; ?></td>
                                            <td><?php echo $row["sku_sold"]; ?></td>
                                            <td>Euro</td>
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


<!-- SKU Sold in Amazon Italy-->
<div class="portfolio-modal modal fade" id="portfolioModalSkuItaly" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>SKU Sold in Italy</h2>
                            <hr class="star-primary">
                            <p>
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  Total of SKU sold in Amazon.it 
                                        <th>Sku</th>
                                        <th>Sku Sold</th>
                                        <th>current</th>
                                        <th>Sku Sold total</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                     include ('sql/mainSql-it.php');
                                    // total all together
                                    while ($row = mysqli_fetch_array($allSkuModelSold)) {
                                        ?>  
                                        <tr class="table-smaller-text">  

                                            <td><?php echo $row["sku"]; ?></td>
                                            <td><?php echo $row["sku_sold"]; ?></td>
                                            <td>Euro</td>
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

<!-- SKU Sold in Amazon Spain-->
<div class="portfolio-modal modal fade" id="portfolioModalSkuSpain" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>SKU Sold in Spain</h2>
                            <hr class="star-primary">
                            <p>
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  Total of SKU sold in Amazon.es 
                                        <th>Sku</th>
                                        <th>Sku Sold</th>
                                        <th>current</th>
                                        <th>Sku Sold total</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                     include ('sql/mainSql-es.php');
                                    // total all together
                                    while ($row = mysqli_fetch_array($allSkuModelSold)) {
                                        ?>  
                                        <tr class="table-smaller-text">  

                                            <td><?php echo $row["sku"]; ?></td>
                                            <td><?php echo $row["sku_sold"]; ?></td>
                                            <td>Euro</td>
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

<!-- SKU Sold in Amazon France-->
<div class="portfolio-modal modal fade" id="portfolioModalSkuFrance" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>SKU Sold in France</h2>
                            <hr class="star-primary">
                            <p>
                            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                                <thead>  
                                    <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  Total of SKU sold in Amazon.fr 
                                        <th>Sku</th>
                                        <th>Sku Sold</th>
                                        <th>current</th>
                                        <th>Sku Sold total</th>
                                    </tr>  
                                </thead>  
                                <tbody> 
                                    <?php
                                     include ('sql/mainSql-fr.php');
                                    // total all together
                                    while ($row = mysqli_fetch_array($allSkuModelSold)) {
                                        ?>  
                                        <tr class="table-smaller-text">  

                                            <td><?php echo $row["sku"]; ?></td>
                                            <td><?php echo $row["sku_sold"]; ?></td>
                                            <td>Euro</td>
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