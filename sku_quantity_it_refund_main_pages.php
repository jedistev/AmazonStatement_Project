<?php
//include auth.php file on all secure pages
include("auth.php");

//sql database
include ('sql/sku-quanity-it-mysql.php');
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
        <?php include './views/skuquantity/it/sku_quantity_refund_unit_it.php'; ?>
<!--        <script>
            function Exportskuukrefund()
            {
                var conf = confirm("Export users to CSV?");
                if (conf == true)
                {
                    window.open("views/sku/uk/export_sku_uk_refund.php", '_blank');
                }
            }
        </script> -->
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
    </body>
</html>
