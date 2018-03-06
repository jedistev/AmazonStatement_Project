<?php

//filter.php  
if (isset($_POST["from_date"], $_POST["to_date"])) {
    include ('../../config/config.php');
    $output = '';
    $query = "  
    SELECT
    date_format(settlement_start_date, '%d/%m/%Y') as settlement_start_date, 
    date_format(settlement_end_date, '%d/%m/%Y') as settlement_end_date,
    Count(settlement_end_date) as 'Fornight_Date',
    SUM(total_amount) as total_Sum,
    settlement_id,
    total_amount,
    SUM(IF(transaction_type = 'order',amount,0)) AS 'Order',
    SUM(IF(transaction_type = 'refund',amount,0)) AS 'Refund',
    SUM(IF(transaction_type = 'ServiceFee',amount,0)) AS 'Servicefee', 
    SUM(IF(amount_description = 'REVERSAL_REIMBURSEMENT',amount,0)) AS 'REVERSAL_REIMBURSEMENT',
    SUM(IF(amount_description = 'RemovalComplete',amount,0)) AS 'RemovalComplete',
    SUM(IF(amount_description = 'Storage Fee',amount,0)) AS 'Storage Fee',
    SUM(IF(amount_description = 'LightningDealFee',amount,0)) AS 'LightningDealFee',
    SUM(IF(amount_description = 'Subscription Fee',amount,0)) AS 'Subscription Fee',
    SUM(IF(amount_description = 'StorageRenewalBilling',amount,0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'WAREHOUSE_DAMAGE',amount,0)) AS 'WAREHOUSE_DAMAGE',
    SUM(IF(amount_description = 'DisposalComplete',amount,0)) AS 'DisposalComplete',
    SUM(IF(amount_description = 'StorageRenewalBilling',amount,0)) AS 'StorageRenewalBilling',
    SUM(IF(amount_description = 'Missing From Inbound',amount,0)) AS 'Missing From Inbound',
    SUM(IF(amount_description = 'MULTICHANNEL_ORDER_LOST',amount,0)) AS 'MULTICHANNEL_ORDER_LOST',
    SUM(amount) AS Transcation_Amount,
    SUM(total_amount - amount) as Differnce
    
    From settlements
    
    WHERE settlement_end_date BETWEEN '" . $_POST["from_date"] . "' AND  '" . $_POST["to_date"] . "' 
        OR settlement_end_date = '0000-00-00'
";
    

    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '  
                <table class="table table-bordered table-striped table-hover table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <td class="table-smaller-text"> ' . $_POST["from_date"] . ' To ' . $_POST["to_date"] . '</td>
                        </tr>
                        <tr>
                            <th>How Many Fortnight</th>
                            <td class="table-smaller-text">' . $row["Fornight_Date"] . '</td>
                        </tr>
                        <tr>

                        <tr>
                            <th>Total Amount</th>
                            <td class="table-smaller-text">' . $row["total_Sum"] . '</td>
                        </tr>
                        <tr>
                            <th>Total Order</th>
                            <td class="table-smaller-text">' . $row["Order"] . '</td>
                        </tr>


                    </thread>
                </table>
                ';
        }
    } else {
        $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';
    }
    $output .= '</table>';
    echo $output;
}
?>




