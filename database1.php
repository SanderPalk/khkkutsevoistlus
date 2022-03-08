<?php
$servername='localhost';
$username='meeskond2iktkhk';
$password='^XOxgaI+~mX@';
$dbname="meeskond2iktkhk_lg";
$conn=mysqli_connect($servername, $username, $password, "$dbname");
if(!$conn){
    die("Could not conenct My Sql: " . mysql_error());
}
?>