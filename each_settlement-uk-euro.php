<?php
//sql files for calucated
include ('sql/mainSql-uk-euro.php');
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
        <?php include 'nav/css.php'; ?>
    </head>

    <body id="page-top">
        <?php include 'nav/nav.php'; ?>
        <?php include 'nav/header.php'; ?>
        <!--Each Settlement goes there -->

        <div class="container">
            <table class="table table-condensed table-bordered table-striped table-hover dt-responsove wrap" cellspacing="0" >
                <?php
                //total cost on each fornight
                echo '<table class="table table-bordered table-striped table-hover table-condensed table-responsive">';
                echo '<tr>';
                echo '<th class="table-smaller-text">Settlement ID</th>';
                echo '<th class="table-smaller-text">Date</th>';
                echo '</tr>';

                while (($totalcostrow = mysqli_fetch_array($totalResult, MYSQLI_ASSOC)) != NULL) {
                    echo '<tr>';
                    echo '<td class="table-smaller-text">' . $totalcostrow['settlement_id'] . '</td>';
                    echo '<td class="table-smaller-text">' . $totalcostrow['settlement_start_date'] . ' - ' . $totalcostrow['settlement_end_date'] . '</td>';

                    echo '</tr>';
                }
                mysqli_free_result($totalResult);
                echo '</table>';
                ?>
                <br>
                <br>
                <?php

                //load_data_select.php  
                function fill_settlement($conn) {
                    $outputData = '';
                    $sqlDropDownSettlementID = "SELECT  *  FROM `settlementsukeuro` GROUP BY settlement_id ORDER BY settlement_start_date ASC;";
                    $DropDownSettlementID = mysqli_query($conn, $sqlDropDownSettlementID);
                    while ($row = mysqli_fetch_array($DropDownSettlementID)) {
                        $outputData .= '<option value="' . $row["settlement_id"] . '">' . $row["settlement_id"] . '</option>';
                    }
                    return $outputData;
                }
                ?>  
                <div class="container">  
                    <label class="col-sm-3 control-label">Date</label>
                    <div class="col-sm-9">

                        <select id="selproduct">
                            <option value="">Date</option>  
                            <?php echo fill_settlement($conn); ?>  
                        </select> 
                        <button class="btn btn-primary left-space-button each-settlement-button-margin-left" id="getSettlementbutton">Settlement details</button>  
                    </div>
                    <br>
                    <div id="presentprod">
                    </div> 


                    <br><br>
                    <!--                    <div class="form-group">
                                            <button onclick="Export()" class="btn btn-success">Export to CSV File</button>
                                        </div>-->
                </div>  
        </div>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
        <script>

            //dropdown list
            $(document).ready(function () {
                $("#getSettlementbutton").click(function () {
                    var prodname = $('#selproduct :selected').text();
                    $.get("getlist/getsingleprod_uk-euro.php", {SettlementID: prodname}, function (getresult) {
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