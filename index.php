<?php
//sql files for calucated
include ('sql/mainSql.php');

//for upload CSV
include('upload-functions.php');
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

    <?php include 'nav/home-nav.php';?>
    <?php include 'nav/home-header.php';?>
    <?php include 'nav/gridsection.php';?>
    <?php include 'nav/about.php';?>
    <?php include 'nav/home-footer.php';?>
    <?php include 'nav/modal.php';?>
    <?php include 'nav/script.php';?>
    <script>
        $(document).ready(function() {

            load_data();

            function load_data(query) {
                $.ajax({
                    url: "config/searchdata.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            }
            $('#search_text').keyup(function() {
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