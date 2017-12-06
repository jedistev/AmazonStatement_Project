<div class="container">
    <br>
    <label>UK H-root Total Settlement Start and End Date</label>
    <br>

    <br>

    <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >
        <?php
        //total cost on each fornight
        echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
        echo '<tr>';
        echo '<th>Settlement ID</th>';
        echo '<th>settlement start date</th>';
        echo '<th>settlement end date</th>';
        echo '<th>Currency</th>';
        echo '<th>Total Amount</th>';
        echo '</tr>';

        while (($totalcostrow = mysqli_fetch_array($totalResult, MYSQLI_ASSOC)) != NULL) {
            echo '<tr>';
            echo '<td>' . $totalcostrow['settlement_id'] . '</td>';
            echo '<td>' . $totalcostrow['settlement_start_date'] . '</td>';
            echo '<td>' . $totalcostrow['settlement_end_date'] . '</td>';
            echo '<td>' . $totalcostrow['currency'] . '</td>';
            echo '<td>' . $totalcostrow['total_amount'] . '</td>';
            echo '</tr>';
        }
        mysqli_free_result($totalResult);
        echo '</table>';
        ?>
        <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >  
            <thead>  
                <tr style="font-size: 14px; font-weight: bold;">    
                    <th class="text-primary">Total All Together</th><br>
            </tr>  
            </thead>  
            <tbody> 
                <?php
                // total all together
                while ($row = mysqli_fetch_array($allamountresult)) {
                    ?>  
                    <tr class="table-smaller-text">  
                        <td><?php echo $row["currency"]; ?></td> 
                        <td><?php echo $row["total_amount_sum"]; ?></td> 
                    </tr>  
                    <?php
                };
                ?>
            </tbody>  
        </table>  
        <br>
        <div class="form-group">
            <button onclick="Export()" class="btn btn-success">Export to CSV File</button>
        </div>
</div>
