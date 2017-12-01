<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="modal-body">
                <h2>SKU Refund in Germany</h2>
                <hr class="star-primary">
                <p>
                <div class="form-group">
                    <button onclick="Exportskuukrefund()" class="btn btn-success">Export to CSV File</button>
                </div>
                <br>
                <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                    <thead>  
                        <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  Total of SKU Refund in Amazon.de 
                        </tr>  
                    </thead>
                </table>
                <div class="row">
                    <div class="col-8">                
                        <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                            <thead>  
                                <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;"> 
                                    <th>Sku</th>
                                    <th>currency</th>
                                    <th>Sku Refund total</th>
                                </tr>  
                            </thead>  
                            <tbody> 
                                <?php
                                // total all together
                                while ($row = mysqli_fetch_array($allSkuRefund)) {
                                    ?>  
                                    <tr class="table-smaller-text">  

                                        <td><?php echo $row["sku"]; ?></td>
                                        <td>Euro</td>
                                        <td><?php echo $row["sku_total"]; ?></td>

                                        <?php
                                    };
                                    ?>
                                </tr>
                            </tbody>  
                        </table>
                    </div>
                    <div class="col-4"> 
                        <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                            <thead>  
                                <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;"> 
                                    <th>Sku UNITS Sold</th>
                                </tr>  
                            </thead>  
                            <tbody> 
                                <?php
                                while ($row = mysqli_fetch_array($allskuRefundUnit)) {
                                    ?>  
                                    <tr class="table-smaller-text">  
                                        <td><?php echo $row["sku_unit_sold"]; ?></td>
                                    </tr> 
                                    <?php
                                };
                                ?>
                            </tbody>  
                        </table>  
                    </div>
                </div>
                </p>
            </div>
        </div>
    </div>
</div>