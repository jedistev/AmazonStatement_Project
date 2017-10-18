<?php

//searchdata.php
$connect = mysqli_connect("localhost", "root", "", "amazon");
$output = '';
if (isset($_POST["query"])) {
    $searchList = mysqli_real_escape_string($connect, $_POST["query"]);
    $querySearch = "
  SELECT * FROM settlements 
  WHERE amount_description LIKE '%" . $searchList . "%'
  OR sku LIKE '%" . $searchList . "%'
  OR amount_description LIKE '%" . $searchList . "%' 
  OR amount_type LIKE '%" . $searchList . "%' 
  OR transaction_type LIKE '%" . $searchList . "%' 

 ";
} else {
    $querySearch = "
  SELECT * FROM settlements 
 ";
}
$searchResult = mysqli_query($connect, $querySearch);
if (mysqli_num_rows($searchResult) > 0) {
    $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>transaction type</th>
     <th>Marketplace Name</th>
     <th>amount description</th>
     <th>amount type</th>
     <th>amount</th>
     <th>posted date</th>
     <th>Sku</th>

    </tr>
 ';
    while ($row = mysqli_fetch_array($searchResult)) {
        $output .= '
   <tr>
    <td>' . $row["transaction_type"] . '</td>
    <td>' . $row["marketplace_name"] . '</td>
    <td>' . $row["amount_description"] . '</td>
    <td>' . $row["amount_type"] . '</td>
    <td>' . $row["amount"] . '</td>
    <td>' . $row["posted_date"] . '</td>
    <td>' . $row["sku"] . '</td>

   </tr>
  ';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}


//load_data.php  
if (isset($_POST["settlement_id"])) {
    if ($_POST["settlement_id"] != '') {
        $sqlDropDownSettlementID = "SELECT * FROM `settlements` where total_amount = '" . $_POST["settlement_id"] . "'";
    } else {
        $sql = "SELECT * FROM settlements";
    }
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">' . $row["total_amount"] . '</div></div>';
        $output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">' . $row["settlement_id"] . '</div></div>';
    }
    echo $output;
}
?> 