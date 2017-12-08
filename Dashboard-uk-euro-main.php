<?php
//include auth.php file on all secure pages
include("auth.php");

//sql database
include ('sql/mainSql-uk-euro.php');
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
        <?php include './views/Dashboard/uk-euro/Dashboard_display_uk-euro.php'; ?>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
        <!-- Chart/Loader.js Google -->
        <?php include 'chart/uk-euro/chart-script-uk-euro.php'; ?>
    </body>
</html>
