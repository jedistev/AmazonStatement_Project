<div class="container">
        <br>
    <label>H-root VAT for Arrival Country</label>
    <br>
    <?php

    //VAT model

    function fill_settlement($conn) {
        $outputData = '';
        #$sqlDropDownVatID = "SELECT  *  FROM `tbl_vat`  group by SALE_ARRIVAL_COUNTRY ORDER by SALE_ARRIVAL_COUNTRY ASC;";
        $sqlDropDownVatID = "SELECT  *  FROM `tbl_vat` INNER JOIN tbl_countries ON amazon.tbl_vat.SALE_ARRIVAL_COUNTRY=tbl_countries.alpha_2 group by SALE_ARRIVAL_COUNTRY ORDER by SALE_ARRIVAL_COUNTRY ASC;";
        $DropDownSettlementID = mysqli_query($conn, $sqlDropDownVatID);
        while ($row = mysqli_fetch_array($DropDownSettlementID)) {
            $outputData .= '<option value="' . $row["SALE_ARRIVAL_COUNTRY"] . '">' . $row["SALE_ARRIVAL_COUNTRY"] . '</option>';
            #$outputData .= '<option value="' . $row["SALE_ARRIVAL_COUNTRY"] . ' ' . $row["Country"] . '">' . $row["SALE_ARRIVAL_COUNTRY"] . '&nbsp &nbsp &nbsp &nbsp' . $row["Country"] . '</option>';
        }
        return $outputData;
    }
    ?>  
    <div class="container">  
        <label class="col-sm-3 control-label">Select a Country</label>
        <div class="col-sm-9">

            <select id="selproduct">
                <option value="">Country ID </option>  
                <?php echo fill_settlement($conn); ?>  
            </select> 
            <button class="btn btn-primary left-space-button each-settlement-button-margin-left" id="getSettlementbutton">Vat Country details</button>  
        </div>
        <br>
        <div id="presentprod">
        </div> 
        <br><br>
       
    </div>  
</div>