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
        <?php include 'nav/css.php'; ?>
        <?php echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.0-RC3/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">'; ?>
    </head>

    <body id="page-top">
        <div class="wrapper">
            <?php include 'nav/sidebar.php'; ?>
            <!-- Page Content Holder -->
            <div id="content">
                <?php include 'nav/nav.php'; ?>
                <?php include 'nav/header.php'; ?>
                <!--Each Settlement goes there -->
                <?php include './views/skuquantity/uk/sku_quantity_each_uk.php'; ?>
                <?php include 'nav/footer.php'; ?>
            </div>
        </div>
        <div class="overlay"></div>

        <?php include 'nav/script.php'; ?>
        <?php echo '<script src="js/bootstrap-datepicker.js"></script>'; ?>

        <script>
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