<?php
//sql files for calucated
include ('sql/mainSql.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Amazon Statement Project</title>
        <!-- Bootstrap core CSS -->
        <?php include 'nav/css.php'; ?>
    </head>

    <body id="page-top">
        <?php include 'nav/nav.php'; ?>
        <?php include 'nav/header.php'; ?>
        <!--Each Settlement goes there -->


        <h1>UK dashboard</h1>
        <div id="piechartTotalamountuk" style="width: max; height: 400px; background-color: pink;"></div>

        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
        <!-- Chart/Loader.js Google -->
        <?php include 'nav/charts-script.php'; ?>
    </body>
</html>
