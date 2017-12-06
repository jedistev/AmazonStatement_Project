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

        <?php include 'nav/home-nav.php'; ?>
        <?php include 'nav/home-header.php'; ?>
        <BR>
        <div class="form">
            <p class="text-center">Welcome <?php echo $_SESSION['username']; ?>!</p>
            <p class="text-center">This is secure area.</p>
        </div>
        <?php include 'nav/gridsection.php'; ?>
        <?php include 'nav/about.php'; ?>
        <?php include 'nav/home-footer.php'; ?>
        <?php include 'nav/modal.php'; ?>
        <?php include 'nav/script.php'; ?>
        <script>
            $(document).ready(function () {

                load_data();

                function load_data(query) {
                    $.ajax({
                        url: "config/searchdata.php",
                        method: "POST",
                        data: {
                            query: query
                        },
                        success: function (data) {
                            $('#result').html(data);
                        }
                    });
                }
                $('#search_text').keyup(function () {
                    var search = $(this).val();
                    if (search != '') {
                        load_data(search);
                    } else {
                        load_data();
                    }
                });
            });
        </script>

    </body>

</html>