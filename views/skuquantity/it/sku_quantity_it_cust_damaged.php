<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="modal-body">
                <h2>SKU Quantity in Customers Damaged Italy </h2>
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
                                <th>sku</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>detailed disposition</th>
                                <th>fulfillment-center-id</th>

                            </tr>  
                        </thead>  
                        <tbody> 
                            <?php
                            // total all together
                       


                                if (mysqli_num_rows($alltableCust_DAMAGEDIT) > 0) {
                                while ($row = mysqli_fetch_array($alltableCust_DAMAGEDIT)) {
                                $output .= '  
                            <tr>  
                                <td>' . $row["sku"] . '</td>
                                <td>' . $row["product-name"] . '</td> 
                                <td>' . $row["quantity"] . '</td>
                                <td>' . $row["fulfillment-center-id"] . '</td>
                                <td>' . $row["detailed-disposition"] . '</td>
                            </tr>  
                            ';
                            }
                            } else {
                            $output .= '  
                            <tr>  
                                <td colspan="5">No Order Found</td>  
                            </tr>  
                            ';
                            }
                            $output .= '</tbody></table>';
                    echo $output;
                    
                    ?>
                </div>
            </div>
            </p>
        </div>
    </div>
</div>

