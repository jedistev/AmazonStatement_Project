<?php
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
        <?php include './views/sku/fr/sku_refund_fr.php'; ?>
        <script>
                    function Exportskuukrefund()
                    {
                        var conf = confirm("Export users to CSV?");
                        if (conf == true)
                        {
                            window.open("views/sku/fr/export_sku_fr_refund.php", '_blank');
                        }
                    }
                </script> 
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
    </body>
</html>
