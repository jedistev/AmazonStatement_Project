<?php
//include auth.php file on all secure pages
include("auth.php");

//sql database
include ('sql/sku-quanity-uk-mysql.php');
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
        <?php include './views/skuquantity/uk/sku_quantity_uk_fortnight.php'; ?>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
        <script>
            function Export()
            {
                var conf = confirm("Export users to CSV?");
                if (conf == true)
                {
                    window.open("export/fortnight_settlement_uk_export_csv.php", '_blank');
                }
            }
        </script>
    </body>
</html>
