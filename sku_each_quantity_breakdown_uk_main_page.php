<?php
//include auth.php file on all secure pages
include("auth.php");


//sql database
include ('sql/mainSql.php');
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'nav/meta.php'; ?>
        <?php include 'nav/meta.php'; ?>
        <?php include 'nav/css.php'; ?>
        <?php echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC3/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">'; ?>
    </head>

    <body id="page-top">
        <?php include 'nav/nav.php'; ?>
        <?php include 'nav/header.php'; ?>
        <!--Each Settlement goes there -->
        <?php include './views/skuquantity/uk/sku_quantity_each_uk.php'; ?>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
        <?php echo '<script src="js/bootstrap-datepicker.js"></script>'; ?>

        <script>

            //dropdown list
//            $(document).ready(function () {
//                $("#getSettlementbutton").click(function () {
//                    var prodname = $('#selproduct :selected').text();
//                    $.get("views/skuquantity/uk/getsku_uk_Quantity.php", {SettlementID: prodname}, function (getresult) {
//                        $("#presentprod").html(getresult);
//                    });
//                });
//            });
//            function Export()
//            {
//                var conf = confirm("Export users to CSV?");
//                if (conf == true)
//                {
//                    window.open("export/each_settlement_uk_export_csv.php", '_blank');
//                }
//            }
//

            $('#sku-date-range-container .input-daterange').datepicker({
                format: "dd/mm/yyyy",
                todayBtn: "linked",
                todayHighlight: true
            });
            
            
             $(document).ready(function () {
                $("#getSettlementbutton").click(function () {
                    var prodname = $('#selproduct :selected').text();
                    $.get("getlist/getsingleprod_sku_test.php", {SettlementID: prodname}, function (getresult) {
                        $("#presentprod").html(getresult);
                    });
                });
            });
        </script>

    </body>
</html>