<p class="text-center">France Marketplace</p>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="modal-body">
                <h2>SKU total Order OTY and Reimbursement QTY </h2>
                <hr class="star-primary">
                <p>
                    <!--                <div class="form-group">
                                        <button onclick="Exportskuuk()" class="btn btn-success">Export to CSV File</button>
                                    </div>-->
                    <br>
                <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                    <thead>  
                        <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;"> Details of breakdown Order and Reimbursement in QTY and cost  
                        </tr>  
                    </thead>
                </table>
                <div class="row">

                    <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                        <thead>  
                            <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;"> 

                                <th>SKU</th>
                                <th style="width:2%"></th>
                                <th>Total Order</th>
                                <th>Total QTY Order</th>
                                <th style="width:5%"></th>
                                <th>Total Reimbursement</th>
                                <th>Total QTY Reimbursement</th>
                                <th style="width:5%"></th>
                                <th>Total Refund</th>
                                <th>Total QTY Refund</th>

                            </tr>  
                        </thead>  
                        <tbody> 
                            <?php
                            // total all together
                            while ($row = mysqli_fetch_array($alltableQTYTotalOrderRefund)) {
                                ?>  
                                <tr class="table-smaller-text">  

                                    <td><?php echo $row["sku"]; ?></td>
                                    <th style="width:2%"></th>
                                    <td>€&nbsp<?php echo $row["total_Order"]; ?></td>
                                    <td><?php echo $row["total_QTY_Order"]; ?></td>
                                    <td style="width:5%"></td>
                                    <td>€&nbsp<?php echo $row["total_reimbursement"]; ?></td>
                                    <td><?php echo $row["total_QTY_Reimbursement"]; ?></td>
                                    <td style="width:5%"></td>
                                    <td>€&nbsp<?php echo $row["total_refund_cost"]; ?></td>
                                    <td><?php echo $row["refund_QTY_Order"]; ?></td>
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

