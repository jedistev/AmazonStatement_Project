<?php
//sql files for calucated
include ('mainSql.php');
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
        <link href="css/ishka.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        
       

    </head>

    <body id="page-top">
        <?php include 'nav.php'; ?>
        <?php include 'header.php'; ?>
        <!--Each Settlement goes there -->

        <div class="container">

            <br>
            <br>
            <?php

            //load_data_select.php  
            function fill_settlement($conn) {
                $output = '';
                $sqlDropDownSettlementID = "SELECT  * FROM `settlements` where total_amount";
                $DropDownSettlementID = mysqli_query($conn, $sqlDropDownSettlementID);
                while ($row = mysqli_fetch_array($DropDownSettlementID)) {
                    $output .= '<option value="' . $row["settlement_id"] . '">' . $row["settlement_id"] . '</option>';
                }
                return $output;
            }

            ?>  
            <div class="container">  
                <label class="col-sm-3 control-label">Settlement ID</label>
                <div class="col-sm-9">
               
                <select id="selproduct">
                    <option value="">Show All Product</option>  
                    <?php echo fill_settlement($conn); ?>  
                </select> 
                <button class="btn btn-primary left-space-button" id="getSettlementbutton">Settlement details</button>  
            </div>
            <div id="presentprod"></div> 
                <br><br>  
            </div>  
        </div>
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
        <script>
            $(document).ready(function () {
                $('#fill_settlement').change(function () {
                    var settlement_id = $(this).val();
                    $.ajax({
                        url: "searchdata.php",
                        method: "POST",
                        data: {settlement_id: settlement_id},
                        success: function (data) {
                            $('#show_product').html(data);
                        }
                    });
                });
            });
            $(document).ready(function () {
                $("#getSettlementbutton").click(function () {
                    var prodname = $('#selproduct :selected').text();
                    $.get("getsingleprod.php", {SettlementID: prodname}, function (getresult) {
                        $("#presentprod").html(getresult);
                    });
                });
            });

        </script>

    </body>
</html>