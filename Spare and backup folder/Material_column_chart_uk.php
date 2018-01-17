 <?php
// Database Connection
$querybasicbarchartrefund = "SELECT 
    sku, 
    SUM(quantity_purchased) AS 'SKU Refund'
FROM
    settlements
WHERE
	transaction_type ='other-transaction'
        AND amount_description = 'REVERSAL_REIMBURSEMENT'
        AND amount_type = 'FBA Inventory Reimbursement'
GROUP BY SKU
ORDER BY 'SKU Refund' DESC
limit 8";
$resultrefund = mysqli_query($conn, $querybasicbarchartrefund);
?>  
<script type="text/javascript">
    
    
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('material_column_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

//        var btns = document.getElementById('btn-group');
//
//        btns.onclick = function (e) {
//
//          if (e.target.tagName === 'BUTTON') {
//            options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
//            chart.draw(data, google.charts.Bar.convertOptions(options));
//          }
//        }
      }
  </script>