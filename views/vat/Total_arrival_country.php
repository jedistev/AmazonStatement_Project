
<div class="container">
    <br>
    <label>Total H-root VAT Breakdown on Arrival country</label>
    <br>
    <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >
        <?php
        //total cost on each fornight
        echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
        echo '<tr>';
        echo '<th>Marketplace</th>';
        echo '<th>Country Code</th>';
        echo '<th>Country</th>';
        echo '<th>Net</th>';
        echo '<th>VAT</th>';
        echo '<th>Total</th>';
        echo '<th>Currency</th>';
        echo '</tr>';

        while (($totalcostrow = mysqli_fetch_array($allVatListCountry, MYSQLI_ASSOC)) != NULL) {
            echo '<tr>';
            echo '<td>' . $totalcostrow['MARKETPLACE'] . '</td>';
            echo '<td>' . $totalcostrow['SALE_ARRIVAL_COUNTRY'] . '</td>';
            echo '<td>' . $totalcostrow['Country'] . '</td>';
            echo '<td>' . $totalcostrow['NET'] . '</td>';
            echo '<td>' . $totalcostrow['VAT'] . '</td>';
            echo '<td>' . $totalcostrow['Total'] . '</td>';
            echo '<td>' . $totalcostrow['TRANSACTION_CURRENCY_CODE'] . '</td>';

            echo '</tr>';
        }
        mysqli_free_result($allVatListCountry);
        echo '</table>';
        ?>
    <br>

        </div>