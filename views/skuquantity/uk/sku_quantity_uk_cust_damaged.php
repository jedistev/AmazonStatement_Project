<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="modal-body">
                <h2>SKU Quantity in Customers Damaged </h2>
                <hr class="star-primary">
                <p>
                    <!--                <div class="form-group">
                                        <button onclick="Exportskuuk()" class="btn btn-success">Export to CSV File</button>
                                    </div>-->
                    <br>
                <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                    <thead>  
                        <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  SKU Quantity Customer Damaged
                        </tr>  
                    </thead>
                </table>
                <div class="row">

                    <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                        <thead>  
                            <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;"> 
                                <th>Date</th>
                                <th>sku</th>
                                <th>Product name</th>
                                <th>detailed disposition</th>
                                <th>fulfillment-center-id</th>

                            </tr>  
                        </thead>  
                        <tbody> 
                            <?php
                            // total all together
                            while ($row = mysqli_fetch_array($alltableCust_DAMAGED)) {
                                ?>  
                                <tr class="table-smaller-text">  
                                    <td><?php echo $row["snapshot_date"]; ?></td>
                                    <td><?php echo $row["sku"]; ?></td>
                                    <td><?php echo $row["product-name"]; ?></td>
                                    <td><?php echo $row["detailed-disposition"]; ?></td>
                                    <td><?php echo $row["fulfillment-center-id"]; ?></td>
                                    <?php
                                };
                                ?>
                            </tr>
                        </tbody>  
                    </table>
                </div>
            </div>
            </p>
        </div>
    </div>
</div>

