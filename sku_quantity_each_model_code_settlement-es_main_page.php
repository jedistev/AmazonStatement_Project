<?php
//include auth.php file on all secure pages
include("auth.php");


//sql database
include ('sql/sku-quanity-es-mysql.php');
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
                <?php include 'views/skuquantity/es/sku_quantity_model_code_es_each_settlement.php'; ?>
                <?php include 'nav/footer.php'; ?>


            </div>
        </div>
        <div class="overlay"></div>

        <?php include 'nav/script.php'; ?>
        <script type="text/javascript">
            //dropdown list
            $(document).ready(function () {
                $("#getSettlementbutton").click(function () {
                    var prodname = $('#selproduct :selected').text();
                    $.get("getlist/getsingleskues_model_code.php", {SettlementID: prodname}, function (getresult) {
                        $("#presentprod").html(getresult);
                    });
                });
            });

            //sidebar
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