<?php
//include auth.php file on all secure pages
include("auth.php");

//sql database
include ('sql/mainSql-es.php');
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
        <?php include './views/sku/es/sku_sold_es.php'; ?>
        <script>
                    function Exportskuuk()
                    {
                        var conf = confirm("Export users to CSV?");
                        if (conf == true)
                        {
                            window.open("views/sku/es/export_sku_es_sold.php", '_blank');
                        }
                    }
                </script> 
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
    </body>
</html>