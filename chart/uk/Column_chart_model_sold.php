<?php
// Database Connection
$queryColumnModelSold = " 
Select 
    Product_code as Product_code, 
    settlements.sku as 'sku', 
    tbl_list_sku.sku as 'list_sku', 
    tbl_list_sku.model_code as 'Model_code',
    SUM(IF (transaction_type = 'order'AND amount_description = 'Principal' AND amount_type = 'ItemPrice', quantity_purchased, 0)) AS 'SKU_Sold'
	
FROM settlements

INNER JOIN tbl_list_sku
ON settlements.sku=tbl_list_sku.sku
WHERE settlement_id
GROUP BY tbl_list_sku.model_code
HAVING sku IS NOT NULL AND LENGTH(sku) > 0
Order by SKU_Sold DESC";
$resultColumnModelSold = mysqli_query($conn, $queryColumnModelSold);
?>  



<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var colorPallette = ['red','yellow','green'];
      var data = google.visualization.arrayToDataTable([
        ['Model_code', 'SKU Sold', ],
<?php
while ($row = mysqli_fetch_array($resultColumnModelSold)) {
    echo "['" . $row["Model_code"] . "', " . $row["SKU_Sold"] . "],";
}
?>
          
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1]);

      var options = {
        colors: colorPallette,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      
      
      
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_model_sold"));
      chart.draw(view, options);
      
  }
  </script>