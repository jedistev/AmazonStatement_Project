<?php
//sql files for calucated
include ('mainSql.php');

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

    <title>Amazon Settlement Project</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link href="css/ishka.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php include 'home-nav.php';?>
    <?php include 'home-header.php';?>
    <?php include 'gridsection.php';?>
    <?php include 'about.php';?>
    <?php include 'home-footer.php';?>
    <?php include 'modal.php';?>
    <?php include 'script.php';?>
    <script>
        $(document).ready(function() {

            load_data();

            function load_data(query) {
                $.ajax({
                    url: "searchdata.php",
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