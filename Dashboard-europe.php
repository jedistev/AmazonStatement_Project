<?php

//sql files for calucated
include ('sql/mainSql.php');
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
        <?php include './views/Dashboard/Dashboard_display_Europe.php'; ?>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
        <!-- Chart/Loader.js Google -->
        <?php include 'chart/europe/chart-script-europe.php'; ?>
        
    </body>
</html>
