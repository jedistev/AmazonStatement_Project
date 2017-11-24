<?php
//sql files for calucated
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
        <h1>Spain dashboard</h1>
        <div id="piechartTotalamountes" style="width: max; height: 400px; background-color: pink;"></div>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
        <!-- Chart/Loader.js Google -->
        <?php include 'chart/chart-script-es.php'; ?>
    </body>
</html>
