<?php
$conn = mysqli_connect('localhost', 'root', '', 'amazon', '3306');
print ("database  connected");
if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}
mysqli_query($conn, 'SET NAMES \'utf8\'');
// TODO: insert your code here.
mysqli_close($conn);

?>