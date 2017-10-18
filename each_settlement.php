<?php
//sql files for calucated
include ('mainSql.php');
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
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="css/freelancer.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/ishka.css" />

    </head>

    <body id="page-top">
        <?php include 'nav.php'; ?>
        <?php include 'header.php'; ?>
        <!--Each Settlement goes there -->

        <div class="container">
            <br>
            <br>
            <?php
            //load_data_select.php  
            function fill_settlement($conn) {
                $output = '';
                $sqlDropDownSettlementID = "SELECT  * FROM `settlements` where total_amount";
                $DropDownSettlementID = mysqli_query($conn, $sqlDropDownSettlementID);
                while ($row = mysqli_fetch_array($DropDownSettlementID)) {
                    $output .= '<option value="' . $row["settlement_id"] . '">' . $row["settlement_id"] . '</option>';
                }
                return $output;
            }
            function fill_product($connect) {
                $output = '';
                $sql = "SELECT * FROM `settlements` where total_amount";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '<div class="col-md-3">';
                    $output .= '<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">' . $row["total_amount"] . '';

                    $output .= '</div>';
                    $output .= '</div>';
                }
                return $output;
            }
            ?>  

            <div class="container">  
                <label class="col-sm-3 control-label">Settlement ID</label>
                 <div class="col-sm-3">
                <select class="form-control" name="Settlement" id="Settlement">  
                    <option value="">Show All Product</option>  
                    <?php echo fill_settlement($conn); ?>  
                </select> 
                 </div>
                <br /><br />  
                <div class="row" id="show_product">  
                    <?php echo fill_product($conn); ?>  
                </div>  

            </div>  

        </div>
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
        <script>
            $(document).ready(function () {
                $('#settlement').change(function () {
                    var settlement_id = $(this).val();
                    $.ajax({
                        url: "searchdata.php",
                        method: "POST",
                        data: {settlement_id: settlement_id},
                        success: function (data) {
                            $('#show_product').html(data);
                        }
                    });
                });
            });
        </script>  

    </body>
</html>