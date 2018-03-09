<?php
//include auth.php file on all secure pages
include("auth.php");
//sql files for calucated
include ('sql/vat_queries_sql.php');
include('PtcDebug.php');
$_GET['debug']=true;        // turn on the debug
//$_GET['debug_off']=true;    // turn off debug
PtcDebug::load();

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
                <!--SELECT CALUCATIon -->
                <!--Each Settlement goes there -->
                <?php include './views/select/select_each.php'; ?>
                <?php include 'nav/footer.php'; ?>
            </div>
        </div>
        <div class="overlay"></div>

        <?php include 'nav/script.php'; ?>
        <script type="text/javascript">
            //dropdown list
            $(document).ready(function () {
                $("#getSettlementbutton").click(function () {
                    var prodname = $('#SKUproduct :selected').text();
                    $.get("getlist/gets_list_sku.php", {listSKUID: prodname}, function (getresult) {
                        $("#presentsku").html(getresult);
                    });
                });
            });

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
                $("#buttonaddsku").click(function () {
                    $("#SKUproduct > option:selected").each(function () {
                        $(this).remove().appendTo("#SKUproduct2");
                    });
                });

                $("#buttonremovesku").click(function () {
                    $("#SKUproduct2 > option:selected").each(function () {
                        $(this).remove().appendTo("#SKUproduct");
                    });
                });
            });

        </script>
    </body>
</html>

