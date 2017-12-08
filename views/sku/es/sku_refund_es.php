<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="modal-body">
                <h2>SKU Refund in Spain </h2>
                <hr class="star-primary">
                <p>
                <div class="form-group">
                    <button onclick="Exportskuuk()" class="btn btn-success">Export to CSV File</button>
                </div>
                <br>
                <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                    <thead>  
                        <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  Total of SKU UNIT Refund in Amazon.es
                        </tr>  
                    </thead>
                </table>
                <div class="row">
                    <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                        <thead>  
                            <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;"> 
                                <th>Sku</th>
                                <th>transaction type</th>
                                <th>Sku UNITS Refund</th>
 
                            </tr>  
                        </thead>  
                        <tbody> 
                            <?php
                            while ($row = mysqli_fetch_array($allskuRefundUnit)) {
                                ?>  
                                <tr class="table-smaller-text">  
                                    <td><?php echo $row["sku"]; ?></td>
                                    <td><?php echo $row["transaction_type"]; ?></td>
                                    <td><?php echo $row["sku_unit_refund"]; ?></td>
                                </tr> 
                                <?php
                            };
                            ?>
                        </tbody>  
                    </table>                    
                </div>
                </p>
            </div>
        </div>
    </div>
</div>