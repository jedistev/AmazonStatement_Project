<?php

//VAT model
function fill_settlement($conn) {
    $outputData = '';

    $sqlListboxSKU = "SELECT  * FROM `settlements`  group by sku ORDER by sku ASC;";
    $ListboxSKU = mysqli_query($conn, $sqlListboxSKU);
    while ($row = mysqli_fetch_array($ListboxSKU)) {
        $outputData .= '<option value="' . $row["sku"] . '">' . $row["sku"] . '</option>';
    }
    return $outputData;
}

function fill_date($conn) {
    $outputData = '';
    $sqlDropDowntransactionID = "SELECT  *  FROM `settlements` GROUP BY settlement_id DESC ORDER BY settlement_start_date DESC;";
    $DropDowntransactionID = mysqli_query($conn, $sqlDropDowntransactionID);
    while ($row = mysqli_fetch_array($DropDowntransactionID)) {
        $outputData .= '<option value=" ' . $row["settlement_start_date"] . ' ' . $row["settlement_end_date"] . '">' . $row["settlement_start_date"] . '&nbsp-&nbsp' . $row["settlement_end_date"] . '</option>';
    }
    return $outputData;
}

function fill_transaction($conn) {
    $outputData = '';
    $sqlDropDowntransactionID = "SELECT  *  FROM `settlements` GROUP BY transaction_type DESC HAVING transaction_type IS NOT NULL AND LENGTH(transaction_type) > 0 ORDER BY transaction_type asc;";
    $DropDowntransactionID = mysqli_query($conn, $sqlDropDowntransactionID);
    while ($row = mysqli_fetch_array($DropDowntransactionID)) {
        $outputData .= '<option value="  ' . $row["transaction_type"] . '">' . $row["transaction_type"] . '</option>';
    }
    return $outputData;
}
?>
<div>
    <div class="row">
        <div class="col-12">    
            <br>
            <p class="text-center">Select a List from Marketplace SKU.</p>
            <br>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-2">  
            <label class="control-label">SKU list</label>
            <div>
                <select class="form-control input-sm listbox-height" id="SKUproduct"  multiple="multiple" rows=2>
                    <option value=""> Select SKU </option>  
                    <?php echo fill_settlement($conn); ?>  
                </select> 
                <!--<button class="btn btn-primary left-space-button each-settlement-button-margin-left" id="getSettlementbutton">VAT Date details</button>  -->
            </div>
        </div>
        <div class="col-sm-1 button-area text-center">
            <!-- Indicates a successful or positive action -->
            <button type="button" id="buttonaddsku" class="btn btn-success button-margin fa fa-angle-right "></button><BR>
            <!--<button type="button" class="btn btn-success button-margin">>></button>-->
            <button type="button" id="buttonremovesku" class="btn btn-success button-margin fa fa-angle-left"></button>
            <!--<button type="button" class="btn btn-success button-margin"><<</button>-->
        </div>
        <div class="col-sm-2">  
            <label class="control-label">List SKU Select</label>
            <div>
                <select class="form-control input-sm listbox-height" id="SKUproduct2"  multiple="multiple" rows=2>
                    <option value=""> Selected SKU </option>  
                </select> 
                <!--<button class="btn btn-primary left-space-button each-settlement-button-margin-left" id="getSettlementbutton">VAT Date details</button>  -->
            </div>
            <br>

            <br><br>
        </div>
        <div class="col-sm-1 button-area-final">
            <button type="button" class="btn btn-secondaryn" id="getSettlementbutton">Calcuation</button>
        </div>

        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-6">            
                    <label class="control-label">Date</label>
                    <div>
                        <div class="input-group">
                            <select class="form-control input-sm" id="selproduct">
                                <?php echo fill_date($conn); ?>  
                            </select>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="getSettlementbutton2">
                                    <i class="fa fa-filter"></i>
                                </button>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="col-sm-5">
                    <label class="control-label">Transation</label>
                    <div>

                        <div class="input-group">
                            <select class="form-control input-sm" id="selproduct">
                                <?php echo fill_transaction($conn); ?> 
                            </select>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="getSettlementbutton1">
                                    <i class="fa fa-filter"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    <div class="col-12">
        <div id="presentsku">
        </div>
    </div>
</div>

