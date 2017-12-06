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
        <?php include './views/sku/de/sku_refund_de.php'; ?>
        <script>
                    function Exportskuukrefund()
                    {
                        var conf = confirm("Export users to CSV?");
                        if (conf == true)
                        {
                            window.open("views/sku/de/export_sku_de_refund.php", '_blank');
                        }
                    }
                </script> 
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
    </body>
</html>
