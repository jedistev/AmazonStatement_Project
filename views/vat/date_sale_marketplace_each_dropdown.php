<div class="container">
        <br>
    <label>H-root VAT Marketplace breakdown</label>
    <br>
    <?php

    //VAT model

    function fill_settlement($conn) {
        $outputData = '';
        #$sqlDropDownVatID = "SELECT  *  FROM `tbl_vat`  ORDER by marketplace ASC;";
        $sqlDropDownVatID = "SELECT  *  FROM `tbl_vat` where(MARKETPLACE NOT LIKE 'MCF UK' AND MARKETPLACE NOT LIKE 'N/A' AND MARKETPLACE NOT LIKE 'Off-Amazon') group by Marketplace ORDER by marketplace ASC;";
        $DropDownSettlementID = mysqli_query($conn, $sqlDropDownVatID);
        while ($row = mysqli_fetch_array($DropDownSettlementID)) {
            $outputData .= '<option value="' . $row["MARKETPLACE"] . '">' . $row["MARKETPLACE"] . '</option>';
        }
        return $outputData;
    }
    ?>  
    <div class="container">  
        <label class="col-sm-3 control-label">Select a Marketplace</label>
        <div class="col-sm-9">

            <select id="selproduct">
                <option value=""> Marketplace</option>  
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