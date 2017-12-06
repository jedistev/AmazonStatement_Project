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
    </head>
    <body id="page-top">
        <?php include 'nav/nav.php'; ?>
        <?php include 'nav/header.php'; ?>
        <!--Each Settlement goes there -->
        <?php include './views/sku/uk/sku_list_uk.php'; ?>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/script.php'; ?>
    </body>
</html>
