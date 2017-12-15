<div class="container">
    <br>
    <br>
    <h4>Fortnight QTY SKU </h4>
    <br>
    <!--UK Settlement Fortnight  -->
    <div class="scrollmenu">
        <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >
            <thead>
                <tr  Class="table-header-total">
                    <th>Date</th>
                    <?php
                    // total Order
                    $resultTranscationDate = mysqli_query($conn, $sqlbreakdownsku_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationDate, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td><?php echo $rowResult["settlement_start_date"]; ?> - <?php echo $rowResult["settlement_end_date"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationDate);
                    ?>
                </tr>


                <tr  Class="table-header-total">
                    <th>Settlement ID </th>
                    <?php
                    // total Order
                    $resultTranscationID = mysqli_query($conn, $sqlbreakdownsku_column);
                    while (($rowResult = mysqli_fetch_array($resultTranscationID, MYSQLI_ASSOC)) != NULL) {
                        ?>
                        <td  class="table-smaller-text-bolder"><?php echo $rowResult["settlement_id"]; ?></td>
                        <?php
                    }
                    mysqli_free_result($resultTranscationID);
                    ?>
                </tr>

<!--             <tr  Class="table-header-total">
                 <th>Total Amount</th>
//               <?php
//                // total Order
//                $resultTranscationTotalAmount = mysqli_query($conn, $sqlbreakdownsku_column);
//                while (($rowResult = mysqli_fetch_array($resultTranscationTotalAmount, MYSQLI_ASSOC)) != NULL) {
//                    
                ?>
                                            <td  class="table-smaller-text-bolder">//<?php echo $rowResult["total_amount"]; ?></td>
                    //<?php
//                }
//                mysqli_free_result($resultTranscationTotalAmount);
//                
                ?>
                </tr>-->

                <tr>
                    <th class="text-primary">Breakdown Details </th><br>
            </tr>


            <tr>
                <th></th>
                <?php
                // total Order
                $resultTranscationOrder = mysqli_query($conn, $sqlbreakdownsku_column);
                while (($rowResult = mysqli_fetch_array($resultTranscationOrder, MYSQLI_ASSOC)) != NULL) {
                    ?>

                    <td class="table-smaller-text-bolder">
                        <div>
                            <span class="text-center QTY-color-code-order">ORD</span>
                            <span class="text-center QTY-color-code-reim">REIM</span>
                            <span class="QTY-color-code-TQTY">T-QTY</span>
                        </div>
                    </td>

                    <?php
                }
                mysqli_free_result($resultTranscationOrder);
                ?>
            </tr>
            <tr class="table-header-total">
                <th>BT01 Cream Half</th>
                <?php
                // total Order
                $resultTranscationOrder = mysqli_query($conn, $sqlbreakdownsku_column);
                while (($rowResult = mysqli_fetch_array($resultTranscationOrder, MYSQLI_ASSOC)) != NULL) {
                    ?>

                    <td class="table-smaller-text-bolder">
                        <span class="QTY-color-code-order"><?php echo $rowResult["BT01-Cream Half"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="QTY-color-code-reim"><?php echo $rowResult["BT01-Cream Half_R"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="QTY-color-code-TQTY"><?php echo $rowResult["BT01_Cream_Half_QTY_TOTAL"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </td>

                    <?php
                }
                mysqli_free_result($resultTranscationOrder);
                ?>
            </tr>

            <tr class="table-header-total">
                <th>BT01 Black Half</th>
                <?php
                // total Order
                $resultTranscationRefund = mysqli_query($conn, $sqlbreakdownsku_column);
                while (($rowResult = mysqli_fetch_array($resultTranscationRefund, MYSQLI_ASSOC)) != NULL) {
                    ?>
                    <td  class="table-smaller-text-bolder">
                        <span class="QTY-color-code-order"><?php echo $rowResult["BT01-Black Half"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="QTY-color-code-reim"><?php echo $rowResult["BT01-Black Half_R"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="QTY-color-code-TQTY"><?php echo $rowResult["BT01_Black_Half_QTY_TOTAL"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </td>
                    <?php
                }
                mysqli_free_result($resultTranscationRefund);
                ?>
            </tr>
            
            <tr class="table-header-total">
                <th>BT01 Navy Half</th>
                <?php
                // total Order
                $resultTranscationRefund = mysqli_query($conn, $sqlbreakdownsku_column);
                while (($rowResult = mysqli_fetch_array($resultTranscationRefund, MYSQLI_ASSOC)) != NULL) {
                    ?>
                    <td  class="table-smaller-text-bolder">
                        <span class="QTY-color-code-order"><?php echo $rowResult["BT01-Navy Half"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="QTY-color-code-reim"><?php echo $rowResult["BT01-Navy Half_R"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="QTY-color-code-TQTY"><?php echo $rowResult["BT01_Navy_Half_QTY_TOTAL"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </td>
                    <?php
                }
                mysqli_free_result($resultTranscationRefund);
                ?>
            </tr>     

            <tr class="table-header-total">
                <th>BT02 Black Full</th>
                <?php
                // total Order
                $resultTranscationRefund = mysqli_query($conn, $sqlbreakdownsku_column);
                while (($rowResult = mysqli_fetch_array($resultTranscationRefund, MYSQLI_ASSOC)) != NULL) {
                    ?>
                    <td  class="table-smaller-text-bolder">
                        <span class="QTY-color-code-order"><?php echo $rowResult["BT02-Black Full"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="QTY-color-code-reim"><?php echo $rowResult["BT02-Black Full_R"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <span class="QTY-color-code-TQTY"><?php echo $rowResult["BT02_Black_Full_QTY_TOTAL"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    </td>
                    <?php
                }
                mysqli_free_result($resultTranscationRefund);
                ?>
            </tr>
            


            </thead>
            <tbody>
            </tbody>
        </table>  
    </div>
    <br>
    <!--            
    <div class="form-group">
          <button onclick="Export()" class="btn btn-success">Export to CSV File</button>
    </div>-->
</div>