<?php
//sql files for calucated
include ('sql/mainSql-it.php');
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
        <link rel="stylesheet" href="css/freelancer.css" />

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
            <label>Italy H-root Total Settlement Start and End Date</label>
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
                            <th class="text-primary">Breakdown Details </th><br>
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
        </div>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>


    </body>
</html>