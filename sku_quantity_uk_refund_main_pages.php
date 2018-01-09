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
        <div class="wrapper">
            <?php include 'nav/sidebar.php'; ?>
            <!-- Page Content Holder -->
            <div id="content">
                <?php include 'nav/nav.php'; ?>
                <?php include 'nav/header.php'; ?>
                <!--Each Settlement goes there -->
                <?php include './views/skuquantity/uk/sku_quantity_refund_unit_uk.php'; ?>
                <?php include 'nav/footer.php'; ?>
            </div>
        </div>
        <div class="overlay"></div>

        <?php include 'nav/script.php'; ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#dismiss, .overlay').on('click', function () {
                    $('#sidebar').removeClass('active');
                    $('.overlay').fadeOut();
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').addClass('active');
                    $('.overlay').fadeIn();
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>
    </body>
</html>