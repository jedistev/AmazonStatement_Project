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
            <br>
            <h4>Fortnight Statement Details </h4>
            <br>

            

        <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >
                <thead>
                    <tr  Class="table-header-total">
                        <th>Date</th>
                        <?php
                           while (($grouptotalrow = mysqli_fetch_array($Groupresult, MYSQLI_BOTH)) != NULL) {
                            ?>   
                            <td  class="table-smaller-text-bolder"><?php echo $grouptotalrow["settlement_start_date"];?> - <?php echo $grouptotalrow["settlement_end_date"];?></td>
                            <?php
                            }
                            mysqli_free_result($Groupresult);
                        ?>    
                    </tr>
                   
                   
                    <tr  Class="table-header-total">
                        <?php
                           while (($grouptotalrow = mysqli_fetch_array($grouptotalorder1, MYSQLI_BOTH)) != NULL) {
                            ?>  
                           <th  class="table-smaller-text-bolder"><?php echo $grouptotalrow["transaction_type"];?></th>
                            <?php
                            }
                            mysqli_free_result($grouptotalorder1);
                        ?>    
                        <?php
                           while (($grouptotalrow = mysqli_fetch_array($grouptotalorder, MYSQLI_BOTH)) != NULL) {
                            ?>  
                           <td  class="table-smaller-text-bolder"><?php echo $grouptotalrow["Each_group_Amount"];?></td>
                            <?php
                            }
                            mysqli_free_result($grouptotalorder);
                        ?>    
                    </tr>

                </thead>
                <tbody>
                </tbody>
            </table>    

        
        </div>
        
        
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
    </body>
</html>