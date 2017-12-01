<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="modal-body">
                <h2>SKU Sold in Spain</h2>
                <hr class="star-primary">
                <p>
                <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
                    <thead>  
                        <tr style="font-size: 11px; font-weight: bold; text-transform: uppercase; text-align: center;">  Total of SKU sold in Amazon.es 
                            <th>Sku</th>
                            <th>Sku Sold</th>
                            <th>current</th>
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
                                <td><?php echo $row["sku_sold"]; ?></td>
                                <td>Euro</td>
                                <td><?php echo $row["sku_sold_each"]; ?></td>
                            </tr>  
                            <?php
                        };
                        ?>
                    <br>
                    <br>
                    <div class="form-group">
                        <button onclick="Exportskuspain()" class="btn btn-success">Export to CSV File</button>
                    </div>
                    </tbody>  
                </table>  
                </p>

                <script>
                    function Exportskuspain()
                    {
                        var conf = confirm("Export users to CSV?");
                        if (conf == true)
                        {
                            window.open("export/sku_Spain_sold.php", '_blank');
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>