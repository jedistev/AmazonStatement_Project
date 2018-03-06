<?php
//include auth.php file on all secure pages
include("auth.php");

//sql database
include ('sql/mainSql.php');
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
        <div class="wrapper">
            <?php include 'nav/sidebar.php'; ?>
            <!-- Page Content Holder -->
            <div id="content">
                <?php include 'nav/nav.php'; ?>
                <?php include 'nav/header.php'; ?>
                <br><br>
                <?php include 'views/test/sku_settlement_filter_uk.php'; ?>
                <br><br>
                <?php include 'nav/footer.php'; ?>
                <?php include 'nav/jquery.php'; ?> 
            </div>
        </div>
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
                    url: "views/test/date-filter-uk.php",
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
//        $("#sidebar").mCustomScrollbar({
//            theme: "minimal"
//        });
//        $('#dismiss, .overlay').on('click', function () {
//            $('#sidebar').removeClass('active');
//        });
//        $('#sidebarCollapse').on('click', function () {
//            $('#sidebar').addClass('active');
//            $('.collapse.in').toggleClass('in');
//            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
//        });
    });

</script>


