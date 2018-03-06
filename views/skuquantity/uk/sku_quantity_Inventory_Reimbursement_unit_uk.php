<p class="text-center">UK Marketplace</p>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="modal-body">
                <h2>SKU total Inventory Reimbursement</h2>
                <hr class="star-primary">
                <p>
                    <!--                <div class="form-group">
                                        <button onclick="Exportskuuk()" class="btn btn-success">Export to CSV File</button>
                                    </div>-->
                    <br>
                <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                    <thead>  
                        <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  Details of breakdown Reimbursement in QTY  
                        </tr>  
                    </thead>
                </table>
                <div class="row">

                    <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                        <thead>  
                            <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;"> 
                                <th>sku</th>
                                <th>Total QTY Reimbursement</th>
                                <th>Missing From Inbound</th>
                                <th>Reversal Reimbursement</th>
                                <th>Warehouse Damage</th>
                                
                            </tr>  
                        </thead>  
                        <tbody> 
                            <?php
                            // total all together
                            while ($row = mysqli_fetch_array($allInventory_ReimbursementResult)) {
                                ?>  
                                <tr class="table-smaller-text">  
                                    <td><?php echo $row["sku"]; ?></td>
                                    <td><?php echo $row["total_QTY_Reimbursement"]; ?></td>
                                    <td><?php echo $row["Missing From Inbound"]; ?></td>
                                    <td><?php echo $row["Reversal Reimbursement"]; ?></td>
                                    <td><?php echo $row["Warehouse Damage"]; ?></td>
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

