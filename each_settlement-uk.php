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
        <link href="css/freelancer.min.css" rel="stylesheet">
        <link href="css/freelancer.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        
       

    </head>

    <body id="page-top">
        <?php include 'nav/nav.php'; ?>
        <?php include 'nav/header.php'; ?>
        <!--Each Settlement goes there -->

        <div class="container">

            <br>
            <br>
            <?php

            //load_data_select.php  
            function fill_settlement($conn) {
                $outputData = '';
                $sqlDropDownSettlementID = "SELECT  * FROM `settlements` where total_amount";
                $DropDownSettlementID = mysqli_query($conn, $sqlDropDownSettlementID);
                while ($row = mysqli_fetch_array($DropDownSettlementID)) {
                    $outputData .= '<option value="' . $row["settlement_id"] . '">' . $row["settlement_id"] . '</option>';
                }
                return $outputData;
            }

            ?>  
            <div class="container">  
                <label class="col-sm-3 control-label">Settlement ID</label>
                <div class="col-sm-9">
               
                <select id="selproduct">
                    <option value="">Settlement ID </option>  
                    <?php echo fill_settlement($conn); ?>  
                </select> 
                <button class="btn btn-primary left-space-button" id="getSettlementbutton">Settlement details</button>  
            </div>
                <br>
                <div id="presentprod">
                </div> 
            
           
            <br><br>
            <div class="form-group">
                    <button onclick="Export()" class="btn btn-success">Export to CSV File</button>
                </div>
            </div>  
        </div>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
        <script>
                     
            //dropdown list
            $(document).ready(function () {
                $("#getSettlementbutton").click(function () {
                    var prodname = $('#selproduct :selected').text();
                    $.get("getsingleprod.php", {SettlementID: prodname}, function (getresult) {
                        $("#presentprod").html(getresult);
                    });
                });
            });

        
            function Export()
            {
                var conf = confirm("Export users to CSV?");
                if (conf == true)
                {
                    window.open("export/each_settlement_uk_export_csv.php", '_blank');
                }
            }
        </script>

    </body>
</html>