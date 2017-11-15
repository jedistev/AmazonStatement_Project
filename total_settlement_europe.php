<?php
// sql files for calucated
include('sql/mainSql.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Amazon Statement Project</title>
        <!-- Bootstrap core CSS -->
        <?php include 'nav/css.php';?>
    </head>
    
    <body id="page-top">
        <?php include 'nav/nav.php';?>
        <?php include 'nav/header.php'; ?>
        <!--Each Settlement goes there -->

        <div class="container">
            <br />
            <label>Total All Europe for H-root Settlement Start and End Date</label>
            <br />
            <br />
            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0">
                <?php
                    // total cost on each fornight
                    echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
                    echo '<tr>';
                    echo '<th>Marketplace Name</th>';
                    echo '<th>Settlement ID</th>';
                    echo '<th>Settlement Start Date</th>';
                    echo '<th>Settlement End Date</th>';
                    echo '<th>Currency</th>';
                    echo '<th>Europe Total Amount</th>';
                    echo '</tr>';

                while ($totalcostrow = mysqli_fetch_array($europedisplayGroupAmount)) {
                    echo '<tr>';
                    echo '<td>' . $totalcostrow['marketplace_name'] . '</td>';
                    echo '<td>' . $totalcostrow['settlement_id'] . '</td>';
                    echo '<td>' . $totalcostrow['settlement_start_date'] . '</td>';
                    echo '<td>' . $totalcostrow['settlement_end_date'] . '</td>';
                    echo '<td>' . $totalcostrow['currency'] . '</td>';
                    echo '<td>' . $totalcostrow['Europe_total_Amount'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                ?>
                    <br />

                    <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0">
                        <?php
                        echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
                        echo '<tr>';
                        echo '<th>Marketplace Name</th>';
                        echo '<th>Settlement ID</th>';
                        echo '<th>Settlement Start Date</th>';
                        echo '<th>Settlement End Date</th>';
                        echo '<th>Currency</th>';
                        echo '<th>Total Amount</th>';
                        echo '</tr>';

                    while (($row = mysqli_fetch_array($GroupsumUKtotal, MYSQLI_ASSOC)) != NULL) {
                        echo '<tr>';
                        echo '<td>' . $row['marketplace_name'] . '</td>';
                        echo '<td>' . $row['settlement_id'] . '</td>';
                        echo '<td>' . $row['settlement_start_date'] . '</td>';
                        echo '<td>' . $row['settlement_end_date'] . '</td>';
                        echo '<td>' . $row['currency'] . '</td>';
                        echo '<td>' . $row['total_amount_uk'] . '</td>';
                        echo '</tr>';
                    }

                    mysqli_free_result($GroupsumUKtotal);
                    echo '</table>';
                    ?>
                            <br />
                            <!--<div class="form-group"> 
                            <button onclick="Export()" class="btn btn-success">Export to CSV File</button> 
                        </div>-->
        </div>
        <?php include 'nav/footer.php'; ?>

        <?php include 'nav/script.php'; ?>
        <script>
            function Export() {
                var conf = confirm("Export users to CSV?");
                if (conf == true) {
                    window.open("export/total_settlement_uk_export_csv.php", '_blank');
                }
            }
        </script>
    </body>
</html>