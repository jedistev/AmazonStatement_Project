<p class="text-center">Germany Marketplace</p>
<div class="container">
    <br>
    <br>
    <?php

    //sku unit model

    function fill_settlement($conn) {
        $outputData = '';
        $sqlDropDownSettlementID = "SELECT  *  FROM `settlementsde` GROUP BY settlement_id DESC ORDER BY settlement_start_date ASC;";
        $DropDownSettlementID = mysqli_query($conn, $sqlDropDownSettlementID);
        while ($row = mysqli_fetch_array($DropDownSettlementID)) {
            $outputData .= '<option value="' . $row["settlement_id"] . ' ' . $row["settlement_start_date"] . ' ' . $row["settlement_end_date"] . '">' . $row["settlement_id"] . '&nbsp &nbsp' . $row["settlement_start_date"] . '&nbsp-&nbsp' . $row["settlement_end_date"] . '</option>';
        }
        return $outputData;
    }
    ?>  
    <div class="container">  
        <label class="col-sm-3 control-label">SKU UNIT LIST Settlement ID &amp; Date</label>
        <div class="col-sm-9">

            <select id="selproduct">
                <option value=""> Settlement ID &amp; Date</option>  
                <?php echo fill_settlement($conn); ?>  
            </select> 
            <button class="btn btn-primary left-space-button each-settlement-button-margin-left" id="getSettlementbutton">Settlement details</button>  
        </div>
        <br>

        <table class='table table-bordered table-striped table-hover table-condensed table-responsive'>
            <thead>
                <tr>
<!--                <th style="width:10%"></th> -->
                    <td style="width:30%">Product SKU Code</td>
                    <td style="width:15%" class="OTY-color-bg">Order</td>
                    <td style="width:15%" class="QTY-color-bg-reim">Reimbursment</td>
                    <td style="width:15%" class="QTY-color-bg-TQTY">Total</td>
                    <td style="width:15%" class="QTY-color-bg-refund">Refund</td>
                </tr>
                </thead>
        </table>
        <div id="presentprod">
        </div> 


        <br><br>
<!--        <div class="form-group">
            <button onclick="Export()" class="btn btn-success">Export to CSV File</button>
        </div>-->
    </div>  
</div>

