<?php
//include auth.php file on all secure pages
require('config/config.php');
include("auth.php");

//sql files for calucated
include ('sql/mainSql.php');

//for upload CSV
include('upload-functions.php');
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
                <?php include 'nav/home-nav.php'; ?>
                <?php include 'nav/home-header.php'; ?>
                <?php include 'nav/gridsection.php'; ?>
                <?php include 'nav/about.php'; ?>
                <?php include 'nav/home-footer.php'; ?>
                <?php include 'nav/modal.php'; ?>
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