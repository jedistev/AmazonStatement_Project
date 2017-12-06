<?php
//include auth.php file on all secure pages
include("auth.php");

//sql database
include ('sql/mainSql-de.php');
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'nav/meta.php'; ?>
        <?php include 'nav/css.php'; ?>
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
                $sqlDropDownSettlementID = "SELECT  *  FROM `settlementsde` GROUP BY settlement_id ORDER BY settlement_start_date ASC;";
                $DropDownSettlementID = mysqli_query($conn, $sqlDropDownSettlementID);
                while ($row = mysqli_fetch_array($DropDownSettlementID)) {
                    $outputData .= '<option value="' . $row["settlement_id"] . ' ' . $row["settlement_start_date"] . ' ' . $row["settlement_end_date"] . '">' . $row["settlement_id"] . '&nbsp &nbsp' . $row["settlement_start_date"] . '&nbsp-&nbsp' . $row["settlement_end_date"] . '</option>';
                }
                return $outputData;
            }
            ?>  
            <div class="container">  
                <label class="col-sm-3 control-label"> Settlement ID &amp; Date</label>
                <div class="col-sm-9">

                    <select id="selproduct">
                        <option value=""> Settlement ID &amp; Date</option>  
                        <?php echo fill_settlement($conn); ?>  
                    </select> 
                    <button class="btn btn-primary left-space-button each-settlement-button-margin-left" id="getSettlementbutton">Settlement details</button>  
                </div>
                <br>
                <div id="presentprod">
                </div> 


                <br><br>
                <!--            <div class="form-group">
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
                    $.get("getlist/getsingleprod_de.php", {SettlementID: prodname}, function (getresult) {
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