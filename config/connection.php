
<?php
//for upload files only

function getdb(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "amazon";

try {
   
    $conn = mysqli_connect($servername, $username, $password, $dbname);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
?>