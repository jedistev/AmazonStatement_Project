<?php
//include auth.php file on all secure pages
include("auth.php");

//sql database
include ('sql/mainSql-fr.php');
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
        <?php include './views/sku/fr/sku_sold_fr.php'; ?>
        <script>
                    function Exportskuuk()
                    {
                        var conf = confirm("Export users to CSV?");
                        if (conf == true)
                        {
                            window.open("views/sku/fr/export_sku_fr_sold.php", '_blank');
                        }
                    }
                </script> 
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
    </body>
</html>