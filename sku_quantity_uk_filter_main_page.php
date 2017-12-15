<?php
//include auth.php file on all secure pages
include("auth.php");
include ('./config/config.php');
?> 
<?php
$SkuFilter = "SELECT * FROM tbl_sku_quantity ";
$result = mysqli_query($conn, $SkuFilter);
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
        <br><br>
        <?php include 'views/skuquantity/uk/sku_quantity_uk_filter.php'; ?>
        <br><br>
        <?php include 'nav/footer.php'; ?>
        <?php include 'nav/jquery.php'; ?> 

    </body>  
</html>  
<script>
    $(document).ready(function () {
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd',
            todayBtn: "linked",
            todayHighlight: true,
            maxDate: 0
        });
        $(function () {
            $("#from_date").datepicker();
            $("#to_date").datepicker();
        });
        $('#filter').click(function () {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if (from_date != '' && to_date != '')
            {
                $.ajax({
                    url: "views/skuquantity/uk/filter-uk.php",
                    method: "POST",
                    data: {from_date: from_date, to_date: to_date},
                    success: function (data)
                    {
                        $('#order_table').html(data);
                    }
                });
            } else
            {
                alert("Please Select Date");
            }
        });
    });
</script>