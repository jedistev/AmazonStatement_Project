<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="modal-body">
                <h2>SKU Sold in UK </h2>
                <hr class="star-primary">
                <p>
                <div class="form-group">
                    <button onclick="Exportskuuk()" class="btn btn-success">Export to CSV File</button>
                </div>
                <br>
                <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                    <thead>  
                        <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  Total of SKU sold in Amazon.co.uk 
                        </tr>  
                    </thead>
                </table>
                <div class="row">
                    <div class="col-8">                
                        <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                            <thead>  
                                <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;"> 
                                    <th>Sku</th>
                                    <th>currency</th>
                                    <th>Sku Sold total</th>
                                </tr>  
                            </thead>  
                            <tbody> 
                                <?php
                                // total all together
                                while ($row = mysqli_fetch_array($allSkuModelSold)) {
                                    ?>  
                                    <tr class="table-smaller-text">  

                                        <td><?php echo $row["sku"]; ?></td>
                                        <td>£ GBP</td>
                                        <td><?php echo $row["sku_total"]; ?></td>

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
</div>

<?php
echo '<div class="container"><div class="row">';
echo '<table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0">';
echo '<tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">';
echo '<th>snapshot date</th>';
echo '<th>fnsku</th>';
echo '<th>sku</th>';
echo '<th>product name</th>';
echo '<th>quantity</th>';
echo '<th>fulfillment center id</th>';
echo '<th>detailed disposition</th>';
echo '<th>country</th>';
echo '</tr>';

while (($row = mysqli_fetch_array($AllTableSKUQTY, MYSQLI_ASSOC)) != NULL) {
    echo '<tr>';
    echo '<td>' . $row['snapshot-date'] . '</td>';
    echo '<td>' . $row['fnsku'] . '</td>';
    echo '<td>' . $row['sku'] . '</td>';
    echo '<td>' . $row['product-name'] . '</td>';
    echo '<td>' . $row['quantity'] . '</td>';
    echo '<td>' . $row['fulfillment-center-id'] . '</td>';
    echo '<td>' . $row['detailed-disposition'] . '</td>';
    echo '<td>' . $row['country'] . '</td>';
    echo '</tr>';
}
mysqli_free_result($AllTableSKUQTY);
echo '</table>';
echo '</div></div>';
?>


