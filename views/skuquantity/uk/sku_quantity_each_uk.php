<div class="container">
    <br>
    <h4 class="text-center">SKU Quantity</h4>
    <br>
    <br>
    <?php

    //sku unit model

    function fill_settlement($conn) {
        $outputData = '';
        $sqlDropDownskuQuantity = "SELECT 
     date_format(`snapshot-date`, '%d/%m/%Y') as `snapshot-date`,
    sku,
    `product-name`,
    `detailed-disposition`,
    `fulfillment-center-id`,
    country
FROM
    `tbl-sku-quantity`  ORDER BY `snapshot-date`;";
        $DropDownSkuQuantity = mysqli_query($conn, $sqlDropDownskuQuantity);
        while ($row = mysqli_fetch_array($DropDownSkuQuantity)) {
            $outputData .= '<option value="' . $row["snapshot-date"] . ' ">' . $row["snapshot-date"] . '</option>';
        }
        return $outputData;
    }
    ?>  

    <div class="container">  

        <select id="selproduct">
            <option value=""> Settlement ID &amp; Date</option>  
            <?php echo fill_settlement($conn); ?>  
        </select> 
        <button class="btn btn-primary left-space-button" id="getSettlementbutton">Settlement details</button>  
    </div>
    <div id="presentprod"></div> 

    
    
    <br><BR><BR><Br>
    <label class="col-sm-3 control-label">SKU Quantity Date</label>
    <br><br>
    <div class="col-sm-9">
        <div id="sku-date-range-container">
            <div class="input-daterange input-group" id="datepicker">
                <div class="input-group-addon">
                    <span class="fa fa-calendar-check-o"></span>
                </div>
                <input type="text" class="input-sm form-control" name="start" />

                <span class="input-group-addon">to</span>

                <input type="text" class="input-sm form-control" name="end" />
                <div class="input-group-addon">
                    <span class="fa fa-calendar-check-o"></span>
                </div>
            </div>
            <br>
            <button class="btn btn-primary left-space-button each-settlement-button-margin-left" id="getSettlementbutton">SKU Quantity details</button>
        </div>
        <br><br>

    </div>
    <br>
    <div id="presentprod">
    </div> 


    <br><br>
    <!--        <div class="form-group">
                <button onclick="Export()" class="btn btn-success">Export to CSV File</button>
            </div>-->
</div>  
</div>