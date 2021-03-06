<?php
//sql files for calucated
include ('sql/mainSql.php');
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
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/freelancer.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/ishka.css" />

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">



    </head>

    <body id="page-top">
        <?php include 'nav/nav.php'; ?>
        <?php include 'nav/header.php'; ?>
        <!--Each Settlement goes there -->

        <div class="container">
            <br>
            <label>Total Breakdown for Europe H-root (in Euro)</label>
            <br><br>
            <?php
            echo '<table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0">';
            echo '<tr>';
            echo '<th>Marketplace name</th>';
            echo '<th>Settlement id</th>';
            echo '<th>Settlement start_date</th>';
            echo '<th>Settlement end_date</th>';
            echo '<th>Total amount</th>';


            echo '</tr>';
            while (($rowGBPDisplay = mysqli_fetch_array($europeDisplayList, MYSQLI_ASSOC)) != NULL) {
                echo '<tr>';
                echo '<td>' . $rowGBPDisplay['marketplace_name'] . '</td>';
                echo '<td>' . $rowGBPDisplay['settlement_id'] . '</td>';
                echo '<td>' . $rowGBPDisplay['settlement_start_date'] . '</td>';
                echo '<td>' . $rowGBPDisplay['settlement_end_date'] . '</td>';
                echo '<td>' . $rowGBPDisplay['total_amount'] . '</td>';
                echo '</tr>';
            }
            mysqli_free_result($europeDisplayList);
            while (($rowGBPDisplay1 = mysqli_fetch_array($totalGBinEUdisplayedlist, MYSQLI_ASSOC)) != NULL) {
                echo '<tr>';
                echo '<td>' . $rowGBPDisplay1['marketplace_name'] . '</td>';
                echo '<td>' . $rowGBPDisplay1['settlement_id'] . '</td>';
                echo '<td>' . $rowGBPDisplay1['settlement_start_date'] . '</td>';
                echo '<td>' . $rowGBPDisplay1['settlement_end_date'] . '</td>';
                echo '<td>' . $rowGBPDisplay1['total_amount'] . '</td>';
                echo '</tr>';
            }
            mysqli_free_result($totalGBinEUdisplayedlist);
            echo '</table>';
            ?>
            <Br><br>
            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0">
                <thead>

                    <tr>
                        <th>Total Balance of Marketplace Europe Cost (in Euro)</th>
                        <?php
                        // total Order
                        while ($row = mysqli_fetch_array($showeuropeamountcost)) {
                            ?>
                            <td><b><?php echo $row["total_europe_price"]; ?></b></td>
                            <?php
                        };
                        ?>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <br><br>
            <label>Total Breakdown for Europe H-root (in GBP)</label>
            <br><br>
 <?php
            echo '<table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0">';
            echo '<tr>';
            echo '<th>Marketplace name</th>';
            echo '<th>Settlement id</th>';
            echo '<th>Settlement start_date</th>';
            echo '<th>Settlement end_date</th>';
            echo '<th>Total amount</th>';


            echo '</tr>';
            while (($rowGBPDisplay = mysqli_fetch_array($totalGBPdisplayedlist, MYSQLI_ASSOC)) != NULL) {
                echo '<tr>';
                echo '<td>' . $rowGBPDisplay['marketplace_name'] . '</td>';
                echo '<td>' . $rowGBPDisplay['settlement_id'] . '</td>';
                echo '<td>' . $rowGBPDisplay['settlement_start_date'] . '</td>';
                echo '<td>' . $rowGBPDisplay['settlement_end_date'] . '</td>';
                echo '<td>' . $rowGBPDisplay['total_amount'] . '</td>';
                echo '</tr>';
            }
            mysqli_free_result($totalGBPdisplayedlist);
            echo '</table>';
            ?>



        </div>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>


    </body>
</html>