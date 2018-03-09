<div class="container">
        <br>
    <label>H-root VAT Sold from Marketplace</label>
    <br>
    <?php

    //VAT model

    function fill_settlement($conn) {
        $outputData = '';
        #$sqlDropDownVatID = "SELECT  *  FROM `tbl_vat`  ORDER by SALE_ARRIVAL_COUNTRY ASC;";
        $sqlDropDownVatID = "SELECT  *  FROM `tbl_vat`  group by ACTIVITY_PERIOD ORDER by ACTIVITY_PERIOD ASC;";
        $DropDownSettlementID = mysqli_query($conn, $sqlDropDownVatID);
        while ($row = mysqli_fetch_array($DropDownSettlementID)) {
            $outputData .= '<option value="' . $row["ACTIVITY_PERIOD"] . '">' . $row["ACTIVITY_PERIOD"] . '</option>';
        }
        return $outputData;
    }
    ?>  
    <div class="container">  
        <label class="col-sm-3 control-label">Select a Date</label>
        <div class="col-sm-9">

            <select id="selproduct">
                <option value=""> VAT </option>  
                <?php echo fill_settlement($conn); ?>  
            </select> 
            <button class="btn btn-primary left-space-button each-settlement-button-margin-left" id="getSettlementbutton">VAT Date details</button>  
        </div>
        <br>
        <div id="presentprod">
        </div> 
        <br><br>
       
    </div>  
</div>